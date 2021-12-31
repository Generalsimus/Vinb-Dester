<div class="slid">
<div id="sri" onclick="sliderfun()">
<svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.000000 175.000000"> 
 <g transform="translate(0.000000,175.000000) scale(0.100000,-0.100000)">
 <path d="M0 1738 c1 -7 81 -204 179 -438 l178 -425 -39 -95 c-22 -52 -102
 -244 -179 -426 -76 -182 -139 -337 -139 -344 0 -46 46 49 201 421 98 233 178
 432 179 443 0 10 -63 168 -139 350 -77 182 -157 373 -178 425 -35 85 -64 125
 -63 89z"/>
 </g>
 </svg>
 </div>
<div id="slf" onclick="sliderfun('back')">
<svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.000000 175.000000">
 
<g transform="translate(0.000000,175.000000) scale(0.100000,-0.100000)">
<path d="M343 1713 c-8 -21 -67 -162 -130 -313 -203 -485 -213 -509 -213 -527
1 -10 81 -209 179 -442 155 -372 201 -467 201 -421 0 7 -63 162 -139 344 -77
182 -157 374 -179 426 l-39 95 178 425 c98 234 178 431 179 438 0 26 -22 10
-37 -25z"/>
</g>
</svg>
</div>
<?php
            $args = array(
                'posts_per_page'=>10,
                'post_type' => 'video',
                'post_status'=> 'publish'
            );
            $query = new WP_Query( $args );
            
            $posts = $query->posts;
            $url = esc_url( apply_filters( 'the_permalink', get_permalink( $post ), $post ) );
            // print_r($posts);
            ?>
            
    <div class="s">


    <?php
    foreach($posts as $post):
    ?>
<div class="boxn"><span><?php  echo $post->post_title;?></span>


<a href="<?php echo $url; ?>"><img alt="<?php  echo $post->post_title;?>" src="<?php  the_post_thumbnail_url('full')?>"> </a>   </div>
        
        
        
        
        <?php
   endforeach;
        ?>
        
        
        
        </div>
        
        
        <div>

        <div class="slcou">

        <?php
        for($i=0;$i<count($posts);$i++):
            ?>
            <span></span>
            <?php
            endfor;
?>

        </div>
        
        
        <form class="search" href="/">
<input type="text" autocomplete="off" name="s" placeholder="Search">
<button type="submit">
</button>
</form>
        </div>


</div>