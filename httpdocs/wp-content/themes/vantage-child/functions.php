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


add_filter( 'manage_posts_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 5, 2 );


function revealid_add_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function revealid_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}
