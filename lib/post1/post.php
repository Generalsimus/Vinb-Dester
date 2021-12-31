<div class="post">

    <h1 class="t">Featured</h1>
    <?php $args = array(
    'post_type' => 'video',
    'post_status'=> 'publish',
    'orderby'        => 'rand',
    'posts_per_page'=>20,
);
$query = new WP_Query( $args );
$posts = $query->posts;
?>


    <div class="b">
        <?php foreach($posts as $post): ?>
        <div class="vpost">
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <img src="<?php  the_post_thumbnail_url('posttum')?>">
            </a>
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <?php  the_title();?></a>
        </div>

        <?php endforeach ?>
    </div>
    <a class="m" href="/?s=any&orderby=rand">Show More</a>
    <h1 class="t">Last Videos</h1>



    <div class="b">
        <?php
     $args = array(
        'post_type' => 'video',
        'post_status'=> 'publish',
        'posts_per_page'=>20
    );
    $query = new WP_Query( $args );
    $posts = $query->posts;
    
    foreach($posts as $post):
    ?>
        <div class="vpost">
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <img src="<?php  the_post_thumbnail_url('posttum')?>">
            </a>
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <?php  the_title();?></a>
        </div>

        <?php
    endforeach
?>
    </div>
    <a class="m" href="/?s=any&orderby=last_videos">Show More</a>
    <h1 class="t">Most View Videos</h1>
    <div class="b">
        <?php
     $args = array(
        'post_type' => 'video',
        'post_status'=> 'publish',
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num',
        'posts_per_page'=>20
    );
    $query = new WP_Query( $args );
    $posts = $query->posts;
    
    foreach($posts as $post):
    ?>
        <div class="vpost">
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <img src="<?php  the_post_thumbnail_url('posttum')?>">
            </a>
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <?php  the_title();?></a>
        </div>

        <?php
    endforeach
?>
    </div>
    <a class="m" href="/?s=any&orderby=most_view">Show More</a>





</div>