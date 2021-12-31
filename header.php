<!DOCTYPE html>
         <html <?php language_attributes(); ?>>
      
      <head>
          <meta charset="<?php wp_title("|", true, "right"); ?>">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title><?php bloginfo("name"); ?></title>
          <link rel="stylesheet" type="text/css" href="/wp-content/themes/Vinb%20Dester/tool/style.css?c=701494341">
          <?php wp_head(); ?>
      </head>
      
      <body style="margin: 0;"><div class="head">

<div>

    <div id="lg">
        <?php echo get_custom_logo(0);?>
    </div>


    <span id='mentuc'>

        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 433.5 433.5" style="height: 100%;fill: #5cacf3;" xml:space="preserve">
            <g id="view-headline">
                <path
                    d="M0,293.25h433.5v-51H0V293.25z M0,395.25h433.5v-51H0V395.25z M0,191.25h433.5v-51H0V191.25z M0,38.25v51h433.5v-51H0z" />
            </g>
        </svg>
    </span>



    <?php
            wp_nav_menu(array( 
	'menu_class'      => 'men navig', 
	'menu_id'         => 'men',
	'container' => 'ul' ,
	
   ));?>
</div>
<div id="for">
    <form action="/">
        <input type="text" autocomplete="off" placeholder="Search" name="s" id="srin">

        <button id="submit" type="submit"></button>
    </form>
</div>


</div>