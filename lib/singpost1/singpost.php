<div class="singpost post">

    <div class="pos">

        <?php
         while ( have_posts() ) :
            the_post();
 $cities = $wpdb->get_results("SELECT max(if(meta_key = 'post_views_count',meta_value,null)) as post_views_count FROM $wpdb->postmeta WHERE post_id = $post->ID and meta_key IN ('post_views_count');");
         
 
         
         
         ?>
        <h1><?php the_title()?></h1>


        <div class="viewdat" id="<?php  the_ID();?>">
            <span>by <strong><?php the_author()?></strong></span>


            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 330" style="fill: #999999">
                    <g>
                        <path class="shp0"
                            d="M512,165.01c0,6.5 -1.9,13.09 -5.71,19.77c-26.66,43.93 -62.53,79.13 -107.58,105.58c-45.05,26.45 -92.62,39.68 -142.71,39.68c-50.1,0 -97.67,-13.27 -142.71,-39.82c-45.05,-26.54 -80.91,-61.69 -107.57,-105.44c-3.81,-6.68 -5.71,-13.27 -5.71,-19.77c0,-6.5 1.9,-13.09 5.71,-19.77c26.67,-43.74 62.52,-78.89 107.57,-105.44c45.05,-26.56 92.62,-39.83 142.71,-39.83c50.1,0 97.66,13.28 142.71,39.83c45.04,26.55 80.91,61.7 107.58,105.44c3.81,6.68 5.71,13.27 5.71,19.77zM169.14,128.33c0,3.82 1.33,7.07 4,9.74c2.67,2.67 5.91,4.01 9.72,4.01c3.81,0 7.05,-1.34 9.71,-4.01c2.66,-2.68 4,-5.92 4,-9.74c0,-16.43 5.81,-30.46 17.43,-42.12c11.62,-11.65 25.62,-17.48 42,-17.48c3.81,0 7.05,-1.34 9.72,-4.01c2.66,-2.67 4,-5.92 4,-9.74c0,-3.82 -1.34,-7.07 -4,-9.74c-2.67,-2.67 -5.91,-4.01 -9.72,-4.01c-23.81,0 -44.24,8.55 -61.29,25.64c-17.05,17.1 -25.57,37.58 -25.57,61.46zM475.42,165.01c-28.95,-45.08 -65.24,-78.8 -108.86,-101.14c11.62,19.86 17.43,41.35 17.43,64.46c0,35.34 -12.52,65.57 -37.57,90.68c-25.05,25.11 -55.19,37.68 -90.43,37.68c-35.24,0 -65.38,-12.56 -90.43,-37.68c-25.05,-25.12 -37.57,-55.34 -37.57,-90.68c0,-23.11 5.81,-44.6 17.43,-64.46c-43.62,22.34 -79.9,56.06 -108.86,101.14c25.33,39.16 57.09,70.34 95.28,93.55c38.19,23.21 79.57,34.81 124.14,34.81c44.57,0 85.95,-11.61 124.14,-34.81c38.19,-23.21 69.95,-54.39 95.28,-93.55z">
                        </path>
                    </g>
                </svg><span><?php echo number_format($cities[0]->post_views_count?$cities[0]->post_views_count:0);?></span></span>
        </div>



        <?php
            if($cities[0]->post_views_count==''){
                add_metadata('post',$post->ID,'post_views_count','0');                
            }else{
                update_post_meta($post->ID,'post_views_count',$cities[0]->post_views_count+1 );
            }
        the_content();
         endwhile;
        ?>





<div class='vidcom' date="<?php  $usr = wp_get_current_user(); echo get_avatar_data($usr->ID)['url'];?>">
        <?php 
                if ( comments_open() || get_comments_number() ) {
                   	comments_template('/savelib/singvideocomment.php',true);
                   }
                   ?>
    </div>




    </div>

    <ul class="pdat widget">
        <?php dynamic_sidebar('right-side_bar'); ?>
    </ul>


</div>