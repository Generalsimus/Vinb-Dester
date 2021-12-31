

<div class="head">

<div id="lg">
    <?php echo get_custom_logo( 0 )?>
</div>


<div>
    <span id="msv"></span>

    <?php
            wp_nav_menu(array( 
    'container'=> 'ul',
	'menu_class'      => 'men menanimh', 
	'menu_id'         => 'men',
	
   ));?>
    <div id="for">
        <form action="/">
            <input type="text" autocomplete="off" placeholder="Search" name="s" id="srin">

            <button type="submit"></button>
        </form>
    </div>
</div>

</div>