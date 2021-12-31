<?php

add_action( 'init', 'my_video_cpt' );
function my_video_cpt() {
  $labels = array(
    'name' => __( 'Video' ),
    'singular_name' => __( 'Video' ),
    'add_new' => __( 'Add New' ),
    'add_new_item' => __( 'Add New Video' ),
    'edit' => __( 'Edit' ),
    'edit_item' => __( 'Edit Video' ),
    'new_item' => __( 'New Video' ),
    'view' => __( 'View Video' ),
    'view_item' => __( 'View Video' ),
    'search_items' => __( 'Search Videos' ),
    'not_found' => __( 'No Videos found' ),
    'not_found_in_trash' => __( 'No Videos found in Trash' ),
    'parent' => __( 'Parent Video' ),
  );
 
  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'video' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_rest'       => true,
    'rest_base'          => 'videos',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    'menu_icon' => 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" width="20" style="fill: white;" height="20" viewBox="0 0 175.721 175.721" xmlns="http://www.w3.org/2000/svg"><path d="M154.715,43.2l-20.994,9.697c0,0-3.604,0-8.087,0c-0.804,0-1.567,0.453-2.307,1.1V42.156
    c0-10.414-8.442-18.853-18.856-18.853H18.846C8.436,23.304,0,31.743,0,42.156v68.413c0,10.413,8.439,18.853,18.846,18.853h2.531
    l8.347,17.001c3.869,7.864,10.419,8.009,14.635,0.332l9.514-17.329h50.6c10.41,0,18.85-8.439,18.85-18.85V99.201
    c0.739,0.65,1.506,1.095,2.307,1.095h8.09c0,0,9.394,4.172,20.998,9.322c11.615,5.146,21.006-9.802,21.006-33.385
    C175.721,52.622,166.334,37.812,154.715,43.2z M25.651,86.254c-5.802,0-10.504-4.702-10.504-10.506
    c0-5.803,4.702-10.506,10.504-10.506c5.804,0,10.506,4.704,10.506,10.506C36.157,81.552,31.455,86.254,25.651,86.254z
     M62.071,86.254c-5.802,0-10.506-4.702-10.506-10.506c0-5.803,4.704-10.506,10.506-10.506c5.804,0,10.506,4.704,10.506,10.506
    C72.577,81.552,67.875,86.254,62.071,86.254z M98.49,86.254c-5.801,0-10.505-4.702-10.505-10.506
    c0-5.803,4.704-10.506,10.505-10.506c5.804,0,10.513,4.704,10.513,10.506C109.002,81.552,104.293,86.254,98.49,86.254z"/></svg>'),
  );
 
  register_post_type( 'video', $args );
}





add_action( 'init', 'my_video_taxonomy', 30 );
function my_video_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Video Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Video Categories' ),
        'popular_items' => __( 'Popular Video Categories' ),
        'all_items' => __( 'All Video Categories' ),
        'parent_item' => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item' => __( 'Edit Category' ),
        'update_item' => __( 'Update Category' ),
        'add_new_item' => __( 'Add New Category' ),
        'new_item_name' => __( 'New Video Category Name' ),
  );
 
  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'video_category' ),
    'show_in_rest'          => true,
    'rest_base'             => 'video_categories',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
  );
 
  register_taxonomy('video_categories', array( 'video' ), $args );
  
  
  
  register_taxonomy('video_tags', 'video', array(
        'hierarchical'  => false, 
        'label'         => __( 'Video Tags','taxonomy general name'), 
        'singular_name' => __( 'Tag', 'taxonomy general name' ), 
        'rewrite'               => array( 'slug' => 'video_tags' ),
        'query_var'     => true,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'rest_base'             => 'video_tags',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ));
    

}
