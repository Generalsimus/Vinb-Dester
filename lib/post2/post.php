<div class="post">
    
    <div class="pos">
        <div id="lp">
            <h2>Last Videos</h2>

            <div class="spos">
                 <?php
                 
$args = array(
    'post_type' => 'video',
    'post_status'=> 'publish',
'posts_per_page'=>12,
);
$query = new WP_Query( $args );
                
$posts = $query->posts;
                for($v=0;$v<count($posts)/6;$v++):            
                echo '<i id="'.$v.'"></i>';
                 endfor;
                
?>
                
            </div>
        </div>
        <div id="laspo">
            <div>

            <?php
          for($v=0;$v<count($posts)/6;$v++):            
          ?>
                <div>
                    <?php  for($i=$v*6;$i<$v*6+6;$i++):
                         $post=$posts[$i];
                        ?>
                    <div id="vpost">
                        <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                            <img src="<?php  the_post_thumbnail_url('posttum')?>">
                        </a>

                        <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                            <?php  the_title();?></a>
                    </div>

                    <?php endfor;?>

                </div>
                <?php endfor;?>
            </div>
        </div>
        <div id="lp">
            <h2>Last Posts</h2>

            <div class="spos">
<?php
                 
$args = array(
    'post_type' => 'post',
    'post_status'=> 'publish',
    'posts_per_page'=>6
);
$query = new WP_Query($args);
                
$posts = $query->posts;

for($v=0;$v<count($posts)/3;$v++):             
 echo '<i id="'.$v.'"></i>';
  endfor;                
?>

            </div>
        </div>
      <div id="blogpos">
            <div>
            <?php for($v=0;$v<count($posts)/3;$v++): ?>

                <div> 
                <?php 
                for($i=$v*3;$i<$v*3+3;$i++):
                 $post=$posts[$i];
                 ?>
                    <div id="bpost">
                        <a title=" <?php  the_title();?>" href="<?php the_permalink();?>">                        
                            <img src="<?php  the_post_thumbnail_url('postmed')?>">
                        </a>
                        <div id="posdecr">
                            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                                <h2><?php the_title();?></h2>
                            </a>
                            <p><?php echo $post->post_excerpt; ?></p>
                        </div>
                       
                    </div>
   
 <?php endfor?>
                </div>               
 <?php endfor;?>

                 </div>
            </div>






        <div id="lp">
            <h2>Feaured Videos</h2>

            <div class="spos">
                <?php
                 
$args = array(
    'post_type' => 'video',
    'post_status'=> 'publish',
    'orderby'        => 'rand',
    'posts_per_page'=>8
);
$query = new WP_Query($args);
                
$posts = $query->posts;

for($v=0;$v<count($posts)/4;$v++):             
 echo '<i id="'.$v.'"></i>';
  endfor;                
?>
            </div>
        </div>
        <div class='twopos'>
            <div>
                <?php for($v=0;$v<count($posts)/4;$v++): ?>
                <div>
                    
                 <?php for($i=$v*4;$i<$v*4+4;$i++):
                    $post=$posts[$i];
                    ?>
                    
                    <div id="vpost">
                        <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                            <img src="<?php  the_post_thumbnail_url('posttum')?>">
                        </a>

                        <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                            <?php  the_title();?></a>
                    </div>

                    <?php
                 endfor;
                 ?></div>
                 <?php
                 endfor;
                 ?>

            </div>
        </div>









    </div>
    <ul class="pdat widget">
        <?php dynamic_sidebar('right-side_bar'); ?>
    </ul>
    

</div>
