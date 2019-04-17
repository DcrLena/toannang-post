<?php
/*
Plugin Name: Toan Nang Post
Plugin URI: https://toannang.com.vn
Description: Gói mở rộng tính năng đăng tin rao
Version: 1.0
Author: Le Phan
Author URI: https://github.com/DcrLena
License: GPLv2 or later
Text Domain: toannangpost
*/
/*
if (!function_exists('load_plugin')) {

    function tnp_plugin_activate()
    {

        add_option('Activated_Plugin', 'toan-nang-post');


    }

    register_activation_hook(__FILE__, 'tnp_plugin_activate');
}
if (!function_exists('tnp_load_plugin')) {
    function tnp_load_plugin()
    {
        if (is_admin() && get_option('Activated_Plugin') == 'toan-nang-post') {

            delete_option('Activated_Plugin');

        }
    }

    add_action('admin_init', 'tnp_load_plugin');
} */
if (!function_exists('get_tnp_option')) {
//get option plugin
    function get_tnp_option($option)
    {
        $options = array(
            'name' => 'Toàn Năng Post',
            'version' => '1.0',
            'url' => plugin_dir_url(__FILE__),
            'path' => plugin_dir_path(__FILE__),
            'pluginURI' => 'https://toannang.com.vn'
        );
        $option = trim($option);
        if (array_key_exists($option, $options)) {
            return $options[$option];
        }
    }
}
if (!function_exists('tnp_custom_wp_admin_style')) {
    /* Custom wp admin*/
    function tnp_custom_wp_admin_style()
    {
        wp_enqueue_style('tnp-admin', get_tnp_option('url') . '/assets/css/tnp-admin.css', false, get_tnp_option('version'));
        wp_enqueue_style('tnp-bootstrap', get_tnp_option('url') . '/assets/css/bootstrap.css', false, get_tnp_option('version'));

    }

    add_action('admin_enqueue_scripts', 'tnp_custom_wp_admin_style');
}

// add menu admin

if (!function_exists('tnp_customer_menu')) {
    function tnp_customer_menu()
    {
        //add_posts_page(__('Drafts') , __('Drafts') , 'edit', '?post_type=tin_rao');
        add_menu_page(
            'Tất cả tin rao',
            'Tin rao',
            'read',
            'edit.php?post_type=tin_rao',
            '',
            'dashicons-megaphone', 5);
        add_submenu_page(
            '?post_type=tin_rao',
            'Thêm mới tin rao',
            'Thêm mới',
            'red',
            '?post_type=tin_rao',
            'post-new'
        );
        add_submenu_page(
            '?post_type=tin_rao',
            'Danh mục tin rao',
            'Danh mục',
            'red',
            '?taxonomy=danh_muc&post_type=tin_rao',
            'edit-tags'
        );
    }

    add_action('admin_menu', 'tnp_customer_menu');
}

// require funtions
require_once(get_tnp_option('path') . '/inc/functions.php');
// Import data
if (is_plugin_active('toannang-post/toannang-post.php')) {
    global $wpdb;
    if ($result = $wpdb->get_results("SHOW TABLES LIKE '{$wpdb->prefix}city' ")) {
        if ($wpdb->num_rows == 1) {
            //echo "Table exists";
        }
    } else {
        $filename = get_tnp_option('path') . '/inc/tnp_city.sql';
        tnp_import_tables($filename);

    }
    if ($result = $wpdb->get_results("SHOW TABLES LIKE '{$wpdb->prefix}district' ")) {
        if ($wpdb->num_rows == 1) {
            //echo "Table exists";
        }
    } else {
        $filename = get_tnp_option('path') . '/inc/tnp_district.sql';
        tnp_import_tables($filename);

    }
    if ($result = $wpdb->get_results("SHOW TABLES LIKE '{$wpdb->prefix}ward' ")) {
        if ($wpdb->num_rows == 1) {
            //echo "Table exists";
        }
    } else {
        $filename = get_tnp_option('path') . '/inc/tnp_ward.sql';
        tnp_import_tables($filename);

    }
    if ($result = $wpdb->get_results("SHOW TABLES LIKE '{$wpdb->prefix}street' ")) {
        if ($wpdb->num_rows == 1) {
            //echo "Table exists";
        }
    } else {
        $filename = get_tnp_option('path') . '/inc/tnp_street.sql';
        tnp_import_tables($filename);

    }

}else{
    global $wpdb;
    if ($result = $wpdb->get_results("SHOW TABLES LIKE '{$wpdb->prefix}city' ")) {
        if ($wpdb->num_rows == 1) {
            $wpdb->get_results("DROP TABLES '{$wpdb->prefix}city' ");
        }
    }
    if ($result = $wpdb->get_results("SHOW TABLES LIKE '{$wpdb->prefix}district' ")) {
        if ($wpdb->num_rows == 1) {
            $wpdb->get_results("DROP TABLES '{$wpdb->prefix}district' ");
        }
    }
    if ($result = $wpdb->get_results("SHOW TABLES LIKE '{$wpdb->prefix}ward' ")) {
        if ($wpdb->num_rows == 1) {
            $wpdb->get_results("DROP TABLES '{$wpdb->prefix}ward' ");
        }
    }
    if ($result = $wpdb->get_results("SHOW TABLES LIKE '{$wpdb->prefix}street' ")) {
        if ($wpdb->num_rows == 1) {
            $wpdb->get_results("DROP TABLES '{$wpdb->prefix}street' ");
        }
    }
}