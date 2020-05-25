<?php

/*
 *
 * Custom Post Types
 *
 */

// Note that you only need the arguments and register_post_type function here. They are hooked into WordPress in functions.php.

// register_post_type('artist', array(
//   'menu_position' => 20,
//   'menu_icon' => 'dashicons-businessman',
//   'labels' => array(
//     'name' => __('Artistes', 'goldens'),
//     'singular_name' => __('Artiste', 'goldens')
//   ),
//   'public' => true,
//   'show_ui' => true,
//   'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'custom-fields', 'page-attributes')
// ));

// /*
//  * Add columns to artist post list
//  */
// function add_acf_columns ( $columns ) {
//   return array_merge ( $columns, array ( 
//     'show_date' => __ ( 'Date' ),
//     'show_name'   => __ ( 'Spectacle' ),
//     'menu_order'   => __ ( 'Ordre' ) 
//   ) );
// }
// add_filter ( 'manage_artist_posts_columns', 'add_acf_columns' );

//  /*
//  * Add columns to artist post list
//  */
// function artist_custom_column( $column, $post_id ) {
//   switch ( $column ) {
//     case 'show_date':
//       echo get_post_meta($post_id, 'show_date', true);
//       break;
//     case 'array_merge':
//       echo get_post_meta($post_id, 'show_name', true);
//       break;
//     case 'menu_order':
//       echo get_post_field('menu_order', $post_id);
//       break;
//   }
// }
// add_action ( 'manage_artist_posts_custom_column', 'artist_custom_column', 10, 2 );

// add_filter( 'manage_edit-artist_sortable_columns', 'my_sortable_artist_column' );
// function my_sortable_artist_column( $columns ) {
//     $columns['menu_order'] = 'menu_order';
 
//     //To make a column 'un-sortable' remove it from the array
//     //unset($columns['date']);
 
//     return $columns;
// }