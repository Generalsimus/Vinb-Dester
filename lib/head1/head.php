<div class="head">
    <div id='lg'>
        <?php echo get_custom_logo(0);?>
    </div>
    <div id="ad">
        <img src="/wp-content/themes/Vinb%20Dester/lib/images/adb.png">
    </div>
    <div id="for">
        <form action="/">
            <input type="text" autocomplete="off" placeholder="Search" value="<?php echo isset($_GET['s'])?$_GET['s']:'';?>"name="s" id="srin">
            <select name="category" id="cat">
                <option value="all">All Categories</option>
                <?php
                $terms = get_terms(array( 
                    'taxonomy' => 'video_categories',
                ) );
foreach($terms as $c) {
   echo '<option value="'.$c->taxonomy.'&'.$c->name.'">'.$c->name.'</option>';
}

?>
            </select>
            <button type="submit"></button>
        </form>
    </div>

</div>