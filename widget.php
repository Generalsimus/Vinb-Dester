<?php
add_action( 'widgets_init',  function () {
    register_sidebar( array(
        'id' =>'right-side_bar',
       'name'=>'Right Side Bar',
       'before_widget' => '<li class="widthbox">',
       'after_widget' => "</li>",
       'before_title' => '<h3 class="mintitl">',
       'after_title' => "</h3>"
  ));
  register_sidebar( array(
    'id' =>'bottom-side_bar',
   'name'=>'Bottom Side Bar',
   'before_widget' => '<li>',
   'after_widget' => "</li>",
   'before_title' => '<h3 class="footit">',
   'after_title' => "</h3>"
)); 
} );

   
     add_action( 'widgets_init', function(){
       register_widget( 'most_view_video_Widget' );
       register_widget( 'most_liked_video_Widget' );
       register_widget( 'featured_video_Widget' );
     });







     class featured_video_Widget extends WP_Widget{
        public function __construct(){      
            
            parent::__construct( 'featured_video_Widget', 'Feaured Videos');
        }
        
    
        public function widget( $args, $instance ){
            $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Feaured Videos';
    
            
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
    
            
           
            
    ?>
<li class='widthbox'>
    <?php  if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }?>

    <div id="migr">
        <?php
            
            $args = array(
                'post_type' => 'video',
                'post_status'=> 'publish',
                'orderby' => 'rand',
                'posts_per_page'=>4
            );
            $query = new WP_Query( $args );
            while ( $query->have_posts() ) :
            $query->the_post();
            ?>


        <div id="vpost">
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <img src="<?php  the_post_thumbnail_url('thumbnail')?>">
            </a>

            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <?php  the_title();?></a>
        </div>

        <?php
            endwhile;
            ?>


    </div>
</li>
<?php   
    
        }
    
        public function form( $instance ){
    
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Feaured Videos' ) );
            
    echo '<p><label for="'.$this->get_field_id( 'title' ).'">'._e( 'Title:' ).'<input class="widefat"
    id="'.$this->get_field_id( 'title' ).'" name="'.$this->get_field_name( 'title' ).'"
    type="text" value="'.esc_attr($instance['title']).'" /></label></p>';
                
        }
        
        
    
         }








     class most_liked_video_Widget extends WP_Widget{
        public function __construct(){      
            
            parent::__construct( 'most_liked_Widget', 'Most Liked Videos');
        }
        
    
        public function widget( $args, $instance ){
            $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Most Liked Videos';
            
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
    
            
           
            
    ?>
<li class='widthbox'>
    <?php  if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }?>

    <div id="migr">
        <?php
            
            $args = array(
                'post_type' => 'video',
                'post_status'=> 'publish',
                'meta_key' => 'post_like_count',
                'orderby' => 'meta_value_num',
                'posts_per_page'=>4,
            );
            $query = new WP_Query( $args );
            while ( $query->have_posts() ) :
            $query->the_post();
            ?>


        <div id="vpost">
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <img src="<?php  the_post_thumbnail_url('thumbnail')?>">
            </a>

            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <?php  the_title();?></a>
        </div>

        <?php
            endwhile;
            ?>


    </div>
</li>
<?php   
    
        }
    
        public function form( $instance ){
    
            $instance = wp_parse_args( (array) $instance, array( 'title' => 'Most Liked Videos' ) );
            
    echo '<p><label for="'.$this->get_field_id( 'title' ).'">'._e( 'Title:' ).'<input class="widefat"
    id="'.$this->get_field_id( 'title' ).'" name="'.$this->get_field_name( 'title' ).'"
    type="text" value="'.esc_attr($instance['title']).'" /></label></p>';
                
        }
        
        
    
         }




         


     class most_view_video_Widget extends WP_Widget{
            public function __construct(){      
                
                parent::__construct( 'most_view_widget', 'Most Viewed Videos');
            }
            
        
            public function widget( $args, $instance ){
                $title = ! empty( $instance['title'] ) ? $instance['title'] : 'Most View Videos';
                
                $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        
                
                
        ?>


<li class='widthbox'>
    <?php  if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }?>
    <div id="migr">
        <?php
                 
                 $args = array(
                    'post_type' => 'video',
                    'post_status'=> 'publish',
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'posts_per_page'=>4,
                 );
                 $query = new WP_Query( $args );
                 while ( $query->have_posts() ) :
                 $query->the_post();
                 ?>


        <div id="vpost">
            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <img src="<?php  the_post_thumbnail_url('thumbnail')?>">
            </a>

            <a title="<?php  the_title();?>" href="<?php the_permalink();?>">
                <?php  the_title();?></a>
        </div>

        <?php
                 endwhile;
                 ?>


    </div>
</li>
<?php   
        
            }
        
            public function form( $instance ){
        
                $instance = wp_parse_args( (array) $instance, array( 'title' => 'Most Viewed Videos' ) );
                
        echo '<p><label for="'.$this->get_field_id( 'title' ).'">'._e( 'Title:' ).'<input class="widefat"
        id="'.$this->get_field_id( 'title' ).'" name="'.$this->get_field_name( 'title' ).'"
        type="text" value="'.esc_attr($instance['title']).'" /></label></p>';
                    
            }
            
            
        
             }
             