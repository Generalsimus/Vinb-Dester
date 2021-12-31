<?php


if(isset($_GET["option"])  && current_user_can( 'edit_pages' )){   
    $d= get_template_directory(); 
    switch ($_GET["option"]){
        case 'req':
        include_once 'includes/reqtemp.php';
            break;
        case 'savef':
        include_once 'includes/savefronts.php';
            break;
        case 'savefu':
        include_once 'includes/savefullpage.php';
            break;
    }
    exit;
}


 add_action('admin_menu',function() {
     add_menu_page(
        'Custom Menu Page Title',
        'Dester Setting',
        'manage_options',
        'customtheme',
        'theme_set_callback',
        'dashicons-networking',
        25 
    );
    function theme_set_callback() {
       include_once 'includes/settingtheme.php';
    }
});




add_theme_support( 'post-thumbnails' );


// logo
add_theme_support( 'custom-logo', array(
    'height'      => 229,
    'width'       => 952,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' )
	) );
// ....

    
// gutenberg
add_action('init', function () {
    wp_register_script(
        'myguten-script',
        get_template_directory_uri().'/tool/topbar.js',
        array( 'wp-blocks', 'wp-element' )
    );

    
    wp_register_style( 'my-plugin', get_template_directory_uri().'/tool/topbar.css');
    wp_enqueue_style( 'my-plugin' );

    
    register_block_type( 'myguten-script/dester-guten', array(
        'editor_script' => 'myguten-script',
    ) );

});
// .........



// ......................

//  setting
include_once 'setting.php';

// ......................

add_filter("intermediate_image_sizes_advanced",function($sizes){ return array('posttum'=>array('width' => 288,'height' => 192,'crop' =>true));});
 include_once 'lib/widget1/widget.php';

 add_action( 'pre_get_posts', function($query) {if(($query->is_archive() || $query->is_search()) && $query->is_main_query()){$query->set( 'posts_per_page', '40' );$query->set( 'paged', (isset($_GET['page']) && Is_Numeric($_GET['page']))? $_GET['page'] : 1 );if(isset($_GET['orderby'])){unset($query->query['s']);unset($query->query_vars['s']);if($_GET['orderby']=='most_view'){$query->set('orderby', 'meta_value_num');$query->set('meta_key', 'post_views_count');}}}});
if(isset($_GET['v'])){         }
if(isset($_GET['singvideoreiting'])){include_once 'savelib/singvideoreiting.php';exit;}
