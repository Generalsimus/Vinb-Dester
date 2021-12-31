<div class="slid">

    <div>
        <h2>Featured</h2>
        <div id="slbox">
            <?php
            $args = array(
                'posts_per_page'=>9,
                'post_type' => 'post',
                'post_status'=> 'publish'
            );
            $query = new WP_Query( $args );
            
            $posts = $query->posts;
            for($i=0;$i<count($posts)/3;$i++):
            ?>
            <span></span>
            <?php
            endfor;
            ?>
        </div>
    </div>
    <div>
        <div id="prew">

            <?php
          for($v=0;$v<count($posts)/3;$v++):            
          ?>
            <div class="box">
                <?php
                
            for($i=$v*3;$i<$v*3+3;$i++):
           $post=$posts[$i];
    $url = esc_url( apply_filters( 'the_permalink', get_permalink( $post ), $post ) );
    $view =get_metadata( 'post', $post->ID, 'post_views_count',true);
     ?>
                <div><a href="<?php echo $url;?>"><img src="<?php  the_post_thumbnail_url('thumbnail')?>">

                    </a>
                    <div id="boxp">
                        <h3><a href="<?php echo $url;?>"><?php  echo $post->post_title;?></a>
                        </h3>
                        <div>
                            <span><?php echo human_time_diff(strtotime($post->post_date), current_time( 'timestamp' ) ) ?>
                                ago</span>
                            <span><?php echo $view==''?0:$view;?></span>
                        </div>
                    </div>
                </div>

                <?php
 endfor;
?>
            </div>
            <?php
 endfor;
?>




        </div>
    </div>


</div>