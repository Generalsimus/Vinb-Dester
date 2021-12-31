<?php
get_header(); 


$paged = (isset($_GET['page']) && Is_Numeric($_GET['page']))? $_GET['page'] : 1;
?>

<div class="catbox">
<h1>#<?php print $wp_query->query_vars['video_tags'];?></h1>
    <?php

if(have_posts() ) : 
?>

    <div class="catfunl">
        <?php
     foreach ($posts as $post) :
		?>




        <div id="vpost">
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <img src="<?php  the_post_thumbnail_url('thumbnail')?>">
            </a>

            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <?php  the_title();?></a>
        </div>

        <?php
    endforeach;
    
    $url = str_replace("?page=".$paged,"",$_SERVER["REQUEST_URI"])
    ?>

    </div>





    <div class="paginationcl">
    <a href="<?php echo $url?>?page=<?php echo $paged=='1'? 1 :$paged-1;?>">«</a>

        <?php
        
    
        for ($x = 1; $x <= $wp_query->max_num_pages; $x++):

    

            ?>
            
            <a class="<?php echo $x==$paged?'active':''; ?>" href="<?php echo $url?>?page=<?php echo $x;?>"><?php echo $x;?></a>
                    <?php
            endfor
?>
       <a href="<?php echo $url?>?page=<?php echo  $paged==$wp_query->max_num_pages? $paged :$paged+1;?>">»</a>
    </div>

    <?php

else:
    _e('Oops...nothing. ');


endif;
?>

</div>
<?php

get_footer();