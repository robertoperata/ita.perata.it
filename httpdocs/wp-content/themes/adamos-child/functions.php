<?php
/**
 * User: Roberto Perata
 * Date: 10/08/15
 * Time: 21:47
 */
@ini_set( 'upload_max_size' , '4M' );
@ini_set( 'post_max_size', '4M');
@ini_set( 'max_execution_time', '300' );

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function add_pdf_class($content) {
    $patterns = '/<a(.*?)href=["|\'](.*?)([\.pdf|\.PDF])["|\']/';
    $replacements = '<a\1href="\2\3" class="pdf"';
    return preg_replace($patterns, $replacements, $content);
}
add_filter('the_content', 'add_pdf_class');