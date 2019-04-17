<?php
$GLOBALS['tnp_lists_general'] = array(
    ['label' => 'Hình thức', 'value' => 'type', 'type' => 'select'],
    //['label' => 'Loại nhà đất', 'value' => 'land', 'type' => 'select'],
    ['label' => 'Dự án', 'value' => 'project', 'type' => 'select'],
    ['label' => 'Tỉnh / Thành', 'value' => 'city', 'type' => 'select'],
    ['label' => 'Quận / Huyện', 'value' => 'district', 'type' => 'select'],
    ['label' => 'Phường / Xã', 'value' => 'ward', 'type' => 'select'],
    ['label' => 'Đường / Phố', 'value' => 'street', 'type' => 'select'],

    ['label' => 'Giá', 'value' => 'price', 'type' => 'price'],
    ['label' => 'Đơn vị tiền tệ', 'value' => 'currency', 'type' => 'select'],
    ['label' => 'Diện tích', 'value' => 'acreage', 'type' => 'text'],
);
$GLOBALS['tnp_lists_detail'] = array(
    ['label' => 'Mặt tiền (m)', 'value' => 'facade', 'type' => 'number'],
    ['label' => 'Đường trước nhà (m)', 'value' => 'road', 'type' => 'number'],
    ['label' => 'Hướng nhà', 'value' => 'direction', 'type' => 'select'],
    ['label' => 'Hướng ban công', 'value' => 'balcony', 'type' => 'select'],
    ['label' => 'Số tầng', 'value' => 'floor', 'type' => 'number'],
    ['label' => 'Phòng ngủ', 'value' => 'room', 'type' => 'number'],
    ['label' => 'Phòng tắm', 'value' => 'toilet', 'type' => 'number'],
    ['label' => 'Nội thất', 'value' => 'furniture', 'type' => 'textarea'],
);
$GLOBALS['tnp_lists_contact'] = array(
    ['label' => 'Họ và tên', 'value' => 'name', 'type' => 'text'],
    ['label' => 'Địa chỉ', 'value' => 'address', 'type' => 'text'],
    ['label' => 'Điện thoại', 'value' => 'telephone', 'type' => 'text'],
    ['label' => 'Email', 'value' => 'email', 'type' => 'text'],
);
if (!function_exists('tnp_post_post_type')) {
    /**
     * Registers the event post type.
     */
    function tnp_post_post_type()
    {
        $labels = array(
            'name' => __('Tin rao'),
            'singular_name' => __('Tin rao'),
            'add_new' => __('Thêm mới'),
            'add_new_item' => __('Thêm mới'),
            'edit_item' => __('Sửa'),
            'new_item' => __('Thêm mới'),
            'view_item' => __('Xem'),
            'search_items' => __('TÌm kiếm'),
            'not_found' => __('Không tìm thấy'),
            'not_found_in_trash' => __('Không tìm thấy trong thùng rác')
        );
        $supports = array(
            'title',
            'editor',
            'thumbnail',
            'comments',
            'revisions',
        );
        $args = array(
            'labels' => $labels,
            'supports' => $supports,
            'public' => true,
            'capability_type' => 'post',
            'rewrite' => array('slug' => 'posts'),
            'has_archive' => true,
            'menu_position' => 30,
            'menu_icon' => 'dashicons-megaphone',
            'register_meta_box_cb' => 'tnp_add_post_metaboxes',
        );
        register_post_type('tin_rao', $args);
    }

    add_action('init', 'tnp_post_post_type');
}
if (!function_exists('tnp_add_post_metaboxes')) {
    /**
     * Adds a metabox to the right side of the screen under the Publish box
     */
    function tnp_add_post_metaboxes()
    {
        add_meta_box(
            'tnp_posts_tin_rao',
            'Thông tin cơ bản',
            'tnp_posts_tin_rao',
            'tin_rao',
            'normal',
            'high'
        );
    }
}
if (!function_exists('tnp_save_events_meta')) {
    /**
     * Adds a metabox to the right side of the screen under the Publish box
     */
    /**
     * Save the metabox data
     */
    function tnp_save_events_meta($post_id, $post)
    {
        // Return if the user doesn't have edit permissions.
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        // Verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times.
        foreach ($GLOBALS['tnp_lists_general'] as $item) {
            $id = 'tnp_posts_' . $item['value'];
            if (!isset($_POST[$id]) || !wp_verify_nonce($_POST['event_fields'], basename(__FILE__))) {
                return $post_id;
            }
            // Now that we're authenticated, time to save the data.
            // This sanitizes the data from the field and saves it into an array $events_meta.
            $events_meta[$id] = esc_textarea($_POST[$id]);
            // Cycle through the $events_meta array.
            // Note, in this example we just have one item, but this is helpful if you have multiple.
            foreach ($events_meta as $key => $value) :
                // Don't store custom data twice
                if ('revision' === $post->post_type) {
                    return;
                }
                if (get_post_meta($post_id, $key, false)) {
                    // If the custom field already has a value, update it.
                    update_post_meta($post_id, $key, $value);
                } else {
                    // If the custom field doesn't have a value, add it.
                    add_post_meta($post_id, $key, $value);
                }
                if (!$value) {
                    // Delete the meta key if there's no value
                    delete_post_meta($post_id, $key);
                }
            endforeach;
        }
        foreach ($GLOBALS['tnp_lists_detail'] as $item) {
            $id = 'tnp_posts_' . $item['value'];
            if (!isset($_POST[$id]) || !wp_verify_nonce($_POST['event_fields'], basename(__FILE__))) {
                return $post_id;
            }
            // Now that we're authenticated, time to save the data.
            // This sanitizes the data from the field and saves it into an array $events_meta.
            $events_meta[$id] = esc_textarea($_POST[$id]);
            // Cycle through the $events_meta array.
            // Note, in this example we just have one item, but this is helpful if you have multiple.
            foreach ($events_meta as $key => $value) :
                // Don't store custom data twice
                if ('revision' === $post->post_type) {
                    return;
                }
                if (get_post_meta($post_id, $key, false)) {
                    // If the custom field already has a value, update it.
                    update_post_meta($post_id, $key, $value);
                } else {
                    // If the custom field doesn't have a value, add it.
                    add_post_meta($post_id, $key, $value);
                }
                if (!$value) {
                    // Delete the meta key if there's no value
                    delete_post_meta($post_id, $key);
                }
            endforeach;
        }
        foreach ($GLOBALS['tnp_lists_contact'] as $item) {
            $id = 'tnp_posts_' . $item['value'];
            if (!isset($_POST[$id]) || !wp_verify_nonce($_POST['event_fields'], basename(__FILE__))) {
                return $post_id;
            }
            // Now that we're authenticated, time to save the data.
            // This sanitizes the data from the field and saves it into an array $events_meta.
            $events_meta[$id] = esc_textarea($_POST[$id]);
            // Cycle through the $events_meta array.
            // Note, in this example we just have one item, but this is helpful if you have multiple.
            foreach ($events_meta as $key => $value) :
                // Don't store custom data twice
                if ('revision' === $post->post_type) {
                    return;
                }
                if (get_post_meta($post_id, $key, false)) {
                    // If the custom field already has a value, update it.
                    update_post_meta($post_id, $key, $value);
                } else {
                    // If the custom field doesn't have a value, add it.
                    add_post_meta($post_id, $key, $value);
                }
                if (!$value) {
                    // Delete the meta key if there's no value
                    delete_post_meta($post_id, $key);
                }
            endforeach;
        }
    }

    add_action('save_post', 'tnp_save_events_meta', 1, 2);
}
/**
 * Output the HTML for the metabox.
 */
if (!function_exists('tnp_get_location')) {
    function tnp_get_location($type)
    {
        global $wpdb;
        $results = $GLOBALS['wpdb']->get_results("SELECT DISTINCT * FROM {$wpdb->prefix}{$type} WHERE Type ='" . $type . "'", OBJECT);
        return $results;
    }
}
if (!function_exists('tnp_get_location_by_parent')) {
    function tnp_get_location_by_parent($data)
    {
        global $wpdb;
        $results = array();
        $location = $GLOBALS['wpdb']->get_results("SELECT DISTINCT Note FROM {$wpdb->prefix}{$data['type']} WHERE ID ='" . $data['tnp_parent_location'] . "' ", OBJECT);

        if (isset($location[0]->Note)) {
            $results = $GLOBALS['wpdb']->get_results("SELECT DISTINCT * FROM {$wpdb->prefix}{$data['child']} WHERE Parent ='" . $location[0]->Note . "' AND Type='" . $data['child'] . "'", OBJECT);
        }
        return $results;
    }
}
if (!function_exists('tnp_import_tables')) {
    function tnp_import_tables($filename, $tables = '*')
    {
        $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD)
        or die("Database Connection Failed");
        $selectdb = mysqli_select_db($connection, DB_NAME) or die("Database could not be selected");
        $templine = '';
        $lines = file($filename); // Read entire file
        foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 2) == '/*')
                continue;
            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                mysqli_query($connection, $templine)
                or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($connection) . '<br /><br />');
                $templine = '';
            }
        }
        echo "Tables imported successfully";
    }
}
if (isset($_GET['tnp_parent_location'])) {
    $json = array();
    $json = tnp_get_location_by_parent($_GET);
    header("Content-Type: application/json; charset=UTF-8");
    echo json_encode($json);
    die;
}
if (!function_exists('tnp_posts_tin_rao')) {
    function tnp_posts_tin_rao()
    {
        global $post;
        // Nonce field to validate form request came from current site
        wp_nonce_field(basename(__FILE__), 'event_fields');
        // Get the field data if it's already been entered
        ?>
        <div class="row">
            <?php
            foreach ($GLOBALS['tnp_lists_general'] as $key => $item) {
                $id = 'tnp_posts_' . $item['value'];
                $field = get_post_meta($post->ID, $id, true);
                $city = $district = '';
                // Output the field
                switch ($item['value']) {
                    case 'type':
                        ?>
                        <div class="col-md-6 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <select name="<?= $id ?>">
                                <option value="">-- Chọn giao dịch --</option>
                                <option value="nha-dat-ban" <?= ($field == 'nha-dat-ban') ? ' selected="selected"' : '' ?> >
                                    Nhà đất bán
                                </option>
                                <option value="nha-dat-cho-thue" <?= ($field == 'nha-dat-cho-thue') ? ' selected="selected"' : '' ?> >
                                    Nhà đất cho thuê
                                </option>
                            </select>
                        </div>
                        <?php
                        break;
                    case 'land':
                        $lists = get_terms('danh_muc', array(
                            'orderby' => 'count',
                            'hide_empty' => 0
                        ));
                        ?>
                        <div class="col-md-6 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <select name="<?= $id ?>">
                                <option value="">-- <?= $item['label'] ?> --</option>
                                <?php foreach ($lists as $row) { ?>
                                    <option value="<?= $row->term_id ?>" <?= ($field == $row->term_id) ? ' selected="selected"' : '' ?> ><?= $row->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php
                        break;
                    case 'city':
                        $lists = tnp_get_location($item['value']);
                        $child = 'district';
                        $GLOBALS['city'] = $city = $field;
                        ?>
                        <div class="col-md-6 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <select name="<?= $id ?>">
                                <option value="">-- <?= $item['label'] ?> --</option>
                                <?php if ($lists) { ?>
                                    <?php foreach ($lists as $row) { ?>
                                        <option value="<?= $row->ID ?>" <?= ($field == $row->ID) ? ' selected="selected"' : '' ?> ><?= $row->Name ?></option>
                                    <?php }
                                }
                                ?>
                            </select>
                            <script type="text/javascript"><!--
                                $("select[name=<?= $id ?>]").on('change', function () {
                                    $.ajax({
                                        url: '/wp-admin/admin.php?page=toan-nang-post&tnp_parent_location=' + this.value  + '&type=<?= $item['value'] ?>'+ '&child=<?= $child ?>',
                                        dataType: 'json',
                                        beforeSend: function () {
                                            $("select[name=<?= $id ?>]").prop('disabled', true);
                                        },
                                        complete: function () {
                                            $("select[name=<?= $id ?>]").prop('disabled', false);
                                        },
                                        success: function (json) {
                                            html = '<option value="">Quận / Huyện</option>';
                                            if (json && json != '') {
                                                for (i = 0; i < json.length; i++) {
                                                    html += '<option value="' + json[i]['ID'] + '"';
                                                    if (json[i]['ID'] == "") {
                                                        html += ' selected="selected"';
                                                    }
                                                    html += '>' + json[i]['Perfix'] + ' ' + json[i]['Name'] + '</option>';
                                                }
                                            } else {
                                                html += '<option value="0" selected="selected">Không có <?= $item['label'] ?></option>';
                                            }
                                            $('select[name=\'tnp_posts_<?= $child ?>\']').html(html);
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                        }
                                    });
                                });
                                //--></script>
                        </div>
                        <?php
                        break;
                    case 'district':
                        $child = 'ward';
                        $GLOBALS['district'] =  $district = $field;
                        $lists = array();
                        if ($field != "") $lists = tnp_get_location_by_parent(['tnp_parent_location'=>$GLOBALS['city'] ,'type'=> 'city' ,'child'=>$item['value']]);
                        ?>
                        <div class="col-md-6 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <select name="<?= $id ?>">
                                <option value="">-- <?= $item['label'] ?> --</option>
                                <?php foreach ($lists as $row) { ?>
                                    <option value="<?= $row->ID ?>" <?= ($field == $row->ID) ? ' selected="selected"' : '' ?> ><?= $row->Name ?></option>
                                <?php } ?>
                            </select>
                            <script type="text/javascript"><!--
                                $("select[name=<?= $id ?>]").on('change', function () {
                                    $.ajax({
                                        url: '/wp-admin/admin.php?page=toan-nang-post&tnp_parent_location=' + this.value  + '&type=<?= $item['value'] ?>'+ '&child=<?= $child ?>',
                                        dataType: 'json',
                                        beforeSend: function () {
                                            $("select[name=<?= $id ?>]").prop('disabled', true);
                                        },
                                        complete: function () {
                                            $("select[name=<?= $id ?>]").prop('disabled', false);
                                        },
                                        success: function (json) {
                                            html = '<option value="">Phường / Xã</option>';
                                            if (json && json != '') {
                                                for (i = 0; i < json.length; i++) {
                                                    html += '<option value="' + json[i]['ID'] + '"';
                                                    if (json[i]['ID'] == "<?=  $field ?>") {
                                                        html += ' selected="selected"';
                                                    }
                                                    html += '>' + json[i]['Perfix'] + ' ' + json[i]['Name'] + '</option>';
                                                }
                                            } else {
                                                html += '<option value="0" selected="selected">Không có <?= $item['label'] ?></option>';
                                            }
                                            $('select[name=\'tnp_posts_<?= $child ?>\']').html(html);
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                        }
                                    });
                                    <?php
                                    $child = 'street';
                                    ?>
                                    $.ajax({
                                        url: '/wp-admin/admin.php?page=toan-nang-post&tnp_parent_location=' + this.value + '&type=<?= $item['value'] ?>'+ '&child=<?= $child ?>',
                                        dataType: 'json',
                                        beforeSend: function () {
                                            $("select[name=<?= $id ?>]").prop('disabled', true);
                                        },
                                        complete: function () {
                                            $("select[name=<?= $id ?>]").prop('disabled', false);
                                        },
                                        success: function (json) {
                                            html = '<option value="">Đường / Phố</option>';
                                            if (json && json != '') {
                                                for (i = 0; i < json.length; i++) {
                                                    html += '<option value="' + json[i]['ID'] + '"';
                                                    if (json[i]['ID'] == "<?=  $field ?>") {
                                                        html += ' selected="selected"';
                                                    }
                                                    html += '>' + json[i]['Perfix'] + ' ' + json[i]['Name'] + '</option>';
                                                }
                                            } else {
                                                html += '<option value="0" selected="selected">Không có <?= $item['label'] ?></option>';
                                            }
                                            $('select[name=\'tnp_posts_<?= $child ?>\']').html(html);
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                        }
                                    });
                                });
                                //--></script>
                        </div>
                        <?php
                        break;
                    case 'ward':
                        $lists = array();
                        if ($field != "") $lists = tnp_get_location_by_parent(['tnp_parent_location'=>$GLOBALS['district'] ,'type'=> 'district' ,'child'=>$item['value']]);
                        ?>
                        <div class="col-md-6 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <select name="<?= $id ?>">
                                <option value="">-- <?= $item['label'] ?> --</option>
                                <?php foreach ($lists as $row) { ?>
                                    <option value="<?= $row->ID ?>" <?= ($field == $row->ID) ? ' selected="selected"' : '' ?> ><?= $row->Name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php
                        break;
                    case 'street':
                        $lists = array();
                        if ($field != "") $lists =  tnp_get_location_by_parent(['tnp_parent_location'=>$GLOBALS['district'] ,'type'=>'district' ,'child'=>$item['value']]);
                        ?>
                        <div class="col-md-6 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <select name="<?= $id ?>">
                                <option value="">-- <?= $item['label'] ?> --</option>
                                <?php foreach ($lists as $row) { ?>
                                    <option value="<?= $row->ID ?>" <?= ($field == $row->ID) ? ' selected="selected"' : '' ?> ><?= $row->Name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php
                        break;
                    case 'project':
                        $lists = get_posts(array('numberposts' => -1,
                            'post_type' => 'du_an',
                            'orderby' => 'title',
                            'order' => 'ASC'));
                        ?>
                        <div class="col-md-6 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <select name="<?= $id ?>">
                                <option value="">-- <?= $item['label'] ?> --</option>
                                <?php foreach ($lists as $row) { ?>
                                    <option value="<?= $row->ID ?>" <?= ($field == $row->ID) ? ' selected="selected"' : '' ?> ><?= $row->post_title ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php
                        break;
                    case 'price':
                        ?>
                        <div class="col-md-4 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <input type="text" name="<?= $id ?>" value="<?= $field ?>"
                                   placeholder="<?= $item['label'] ?>">
                        </div>
                        <?php
                        break;
                    case 'currency':
                        $lists = array(
                            ['label' => 'Triệu /m2', 'value' => 'trieu-m'],
                            ['label' => 'Trăm Nghìn /m2', 'value' => 'tram-m'],
                            ['label' => 'Tỷ', 'value' => 'ty'],
                            ['label' => 'Triệu', 'value' => 'trieu'],
                        );
                        ?>
                        <div class="col-md-2 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <select name="<?= $id ?>">
                                <option value="">-- <?= $item['label'] ?> --</option>
                                <?php foreach ($lists as $row) { ?>
                                    <option value="<?= $row['value'] ?>" <?= ($field == $row['value']) ? ' selected="selected"' : '' ?> ><?= $row['label'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php
                        break;
                    default:
                        ?>
                        <div class="col-md-6 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <input type="text" name="<?= $id ?>" value="<?= $field ?>"
                                   placeholder="<?= $item['label'] ?>">
                        </div>
                        <?php
                        break;
                }
            }
            ?>
        </div>
        <div class="row">
            <hr>
            <h2 class="hndle ui-sortable-handle"><span>Thông tin khác</span></h2>
            <?php
            foreach ($GLOBALS['tnp_lists_detail'] as $item) {
                $id = 'tnp_posts_' . $item['value'];
                $field = get_post_meta($post->ID, $id, true);
                // Output the field
                switch ($item['type']) {
                    case 'number':
                        ?>
                        <div class="col-md-4 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <input type="number" name="<?= $id ?>" placeholder="<?= $item['label'] ?>"
                                   value="<?= $field ?>"
                                   maxlength="6" numberonly="2" numbersonly="true" decimal="true">
                        </div>
                        <?php
                        break;
                    case 'textarea':
                        ?>
                        <div class="col-md-12 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <textarea rows="5" name="<?= $id ?>"
                                      placeholder="<?= $item['label'] ?>"> <?= $field ?></textarea>
                        </div>
                        <?php
                        break;
                    default:
                        $lists = array(
                            ['label' => 'Đông', 'value' => 'dong'],
                            ['label' => 'Tây', 'value' => 'tay'],
                            ['label' => 'Nam', 'value' => 'nam'],
                            ['label' => 'Bắc', 'value' => 'bac'],
                            ['label' => 'Đông-Bắc', 'value' => 'dong-bac'],
                            ['label' => 'Đông-Nam', 'value' => 'dong-nam'],
                            ['label' => 'Tây-Bắc', 'value' => 'tay-bac'],
                            ['label' => 'Tây-Nam', 'value' => 'tay-nam'],
                        );
                        ?>
                        <div class="col-md-4 tnp_customer ">
                            <label><?= $item['label'] ?></label>
                            <select name="<?= $id ?>">
                                <option value="">-- <?= $item['label'] ?> --</option>
                                <?php foreach ($lists as $row) { ?>
                                    <option value="<?= $row['value'] ?>" <?= ($field == $row['value']) ? ' selected="selected"' : '' ?> ><?= $row['label'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php
                        break;
                }
            }
            ?>
        </div>
        <div class="row">
            <hr>
            <h2 class="hndle ui-sortable-handle"><span>Thông tin liên hệ</span></h2>
            <?php
            foreach ($GLOBALS['tnp_lists_contact'] as $item) {
                $id = 'tnp_posts_' . $item['value'];
                $field = get_post_meta($post->ID, $id, true);
                // Output the field
                ?>
                <div class="col-md-12 tnp_customer ">
                    <label><?= $item['label'] ?></label>
                    <input type="text" name="<?= $id ?>" placeholder="<?= $item['label'] ?>" value="<?= $field ?>">
                </div>
                <?php
            }
            ?>
        </div>
        <?php

    }
}
