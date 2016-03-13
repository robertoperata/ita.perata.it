<?php

/*
Plugin Name: Basic Plugin
Plugin URI: http://perata.itm/
Description: demo mode
Author: Priz
Author URI: http://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: Priz
Version: 0.1
*/

if( ! defined('ABSPATH')){
    exit;
}

function priz_register_post_type(){

    $singular = 'Prodotto';
    $plural = 'Prodotti';
    $labels = array(
        'name'               => $plural,
        'singular_name'         => $singular,
        'add_name'           => 'Add new',
        'add_new_item'       => 'Add new '.$singular,
        'edit'                  => 'Edit',
        'edit_item'             => 'Edit '.$singular,
        'new_item'             => 'New '.$singular,
        'view'                  => 'View '.$singular,
        'search_item'           => 'Search '.$plural,
        'parent'               => 'Parent '.$singular,
        'not_found'             => 'No '.$plural.' found',
        'not_found_in_trash'    => 'No '.$plural.' in Trash'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-products',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => true,
        'has_archive'         => true,
        'query_var'           => true,
        'capability_type'     => 'page',
        'map_meta_cap'        => true,
        'rewrite'             => array(
            'slug'    => 'jobs',
            'with_front' => true,
            'pages'       => true,
            'feeds'       => true,

        ),
        'supports'            => array(
             'title',
             'editor',
             'author',
             'custom-fields',
             'thumbnail',
        ),
       // 'taxonomies'          => array( 'category', 'post_tag' ),
    );

    register_post_type('job', $args);
}

add_action('init', 'priz_register_post_type');


function priz_register_taxonomy(){

    $labels = array(
        'name'                       => _x( 'Tipologia', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Tipologia', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Tipologia', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'SepÈÈarate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'hierarchical'               => true,
        'labels'                     => $labels,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'update_count_callback'      => '_update_post_term_count',
        'query_var'                  => true,
        'rewrite'                    => array(
            'slug' => 'location'
        ),
        'public'                     => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('location', 'job', $args);
    register_taxonomy_for_object_type('location', 'page');
}
add_action('init', 'priz_register_taxonomy');


function priz_remove_dashboard_widget(){
    remove_meta_box('dashboard_primary', 'dashboard', 'post_container_1');
}

add_action('wp_dashboard_setup', 'priz_remove_dashboard_widget');

function priz_add_google_link(){
 global $wp_admin_bar;
    $args = array();
    $wp_admin_bar->add_menu(array(
        'id'    => 'google_analytics',
        'title' => 'Google Analytics',
        'href'  => 'http://google.com/analytics'
    ));
}
add_action('wp_before_admin_bar_render', 'priz_add_google_link');


// Set columns to be used in the Pages section
function custom_set_pages_columns($columns) {
    return array(
        'cb'      => '<input type="checkbox" />',
        'title'   => __('Title'),
        'author'  => __('Author'),
        'page_id' => __('ID'),
        'date'    => __('Date')
    );
}

// Add the ID to the page ID column
function custom_set_pages_columns_page_id($column, $post_id) {
    if ($column == 'page_id') {
        echo $post_id;
    }
}

// Add custom styles to the page ID column
function custom_admin_styling() {
    echo '<style type="text/css">',
    'th#page_id { width:60px; }',
    '</style>';
}

// Add filters and actions
add_filter('manage_edit-page_columns',   'custom_set_pages_columns');
add_action('manage_pages_custom_column', 'custom_set_pages_columns_page_id', 10, 2);
add_action('admin_head',                 'custom_admin_styling');
