<?php get_header();?><?php

            while ( have_posts() ) :
               
                the_post();
                
                $postID =  $post->ID;
                
            ?>


<div class='singvideo post'>
    <div>
        <div class='videobook' id="<?php  echo $postID; ?>">
            <div class='bokvideo'>
                <?php   
            
            
        $wppostjson = json_decode(preg_replace('~<!--(.*?)-->~s', '',$post->post_content));
        if(post_password_required()){
        the_content();
        }else if($wppostjson->desterresult == 'video'){
                if(property_exists($wppostjson, 'desteriframe')){
                    echo html_entity_decode($wppostjson->desteriframe);
                }else{                    
                    echo '<video src="'.$wppostjson->desterurl[0].'" controls=""></video>';
                }
            }
       
            
        ?>

            </div>
            <h2> <?php echo $post->post_title; ?></h2>
            <div class='reiting_bar'>


                <span><?php 
            

$cities = $wpdb->get_results("SELECT max(if(meta_key = 'post_views_count',meta_value,null)) as post_views_count,max(if(meta_key = 'post_like_count',meta_value,null)) as post_like_count,max(if(meta_key = 'post_dislike_count',meta_value,null)) as post_dislike_count FROM $wpdb->postmeta WHERE post_id = $post->ID and meta_key IN ('post_views_count', 'post_like_count', 'post_dislike_count');");



            
            echo  $cities[0]->post_views_count?$cities[0]->post_views_count:0;?>
                    views</span>




                <div class="reitling_last">
                    <button id='like'>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(127, 127, 127, 0.5);">
                            <g>
                                <path
                                    d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-1.91l-.01-.01L23 10z"
                                    class="style-scope yt-icon"></path>
                            </g>
                        </svg>
                        <span><?php echo $cities[0]->post_like_count?$cities[0]->post_like_count:0;?></span>

                    </button>


                    <button id='dislike'>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgba(127, 127, 127, 0.5);">
                            <g>
                                <path
                                    d="M15 3H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v1.91l.01.01L1 14c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 23l6.59-6.59c.36-.36.58-.86.58-1.41V5c0-1.1-.9-2-2-2zm4 0v12h4V3h-4z"
                                    class="style-scope yt-icon"></path>
                            </g>
                        </svg>
                        <span><?php echo  $cities[0]->post_dislike_count?$cities[0]->post_dislike_count:0;?></span>
                    </button>






                </div>


            </div>

            <div class="vboodata">
                <div><img src="<?php echo get_avatar_data($post->post_author)['url'];?>"></div>


                <div>
                    <span><?php echo get_the_author_meta('display_name', $pos->post_author); ?></span>
                    <div class="bookdate">
                        <?php the_excerpt();?>
                    </div>
                </div>
            </div>



            <div class='dateshow'>
                Show More
            </div>



        </div>



        <div class='vidcom' date="<?php  $usr = wp_get_current_user(); echo get_avatar_data($usr->ID)['url'];?>">
            <?php 
                if ( comments_open() || get_comments_number() ) {
                   	comments_template('/savelib/singvideocomment.php',true);
                   }
                   ?>
        </div>
    </div>
    <div class='singvideo_last'>







        <?php
                    
                   
                     $args = new WP_Query(array(
                        'post_type' => 'video',
                        'post_status'=> 'publish',
                        'posts_per_page'   => 6,
                        'orderby'        => 'rand'
                     ));
 
                     
                                          
                      foreach ( $args->posts as $post ) : 
                        
                        $meta = $wpdb->get_results("SELECT max(if(meta_key = 'post_views_count',meta_value,null)) as post_views_count,max(if(meta_key = 'post_like_count',meta_value,null)) as post_like_count FROM $wpdb->postmeta WHERE post_id = $postt->ID and meta_key IN ('post_views_count', 'post_like_count')");
                       
                      
                       ?>
        <div class="lefpos">
            <a title="<?php echo $post->post_title;?>"
                href="<?php echo apply_filters( 'the_permalink', get_permalink( $post), $post );?>">
                <img src="<?php  the_post_thumbnail_url('posttum')?>">
            </a>


            <a class='name' title="<?php the_title();?>" href="<?php the_permalink();?>">
                <?php echo $post->post_title;?></a>
            <div class="data">
                <p><?php echo human_time_diff(strtotime($post->post_date),current_time('timestamp'));?> ago</p>
                <p><?php echo $meta[0]->post_views_count?$meta[0]->post_views_count:0;?> view</p>
                <p><?php echo $meta[0]->post_like_count?$meta[0]->post_like_count:0;?> like</p>
            </div>
        </div>
        <?php
                    endforeach;
                     





                    ?>



    </div>




</div>

<?php

if($post_views_count==''){
    add_metadata('post',$postID,'post_views_count','0');
    add_metadata('post',$postID,'post_like_count','0');
    add_metadata('post',$postID,'post_dislike_count','0');
    
}


$wpdb->query("UPDATE $wpdb->postmeta SET meta_value=meta_value + 1 WHERE post_id = '$postID' and meta_key = 'post_views_count';");


endwhile;

?><script src="/wp-content/themes/Vinb%20Dester/tool/single-video.js"></script> <?php get_footer();?>