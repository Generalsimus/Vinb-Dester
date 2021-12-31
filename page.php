

<?php get_header(); ?>
	<div class='pagecon post'>


	<h1><?php the_title();?></h1>
	<?php
	
	

	while ( have_posts() ) : the_post(); ?> 
        <div>
            <?php the_content(); ?> 
        </div>

    <?php
    endwhile; 
	
	
	
	
	?>
	</div>
<?php get_footer();?>