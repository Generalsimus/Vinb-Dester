<?php
current_user_can( 'edit_pages' ) or die(include_once "savelib/index/{$bs}.php")
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset')?>">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title("|", true, "right"); ?></title>
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/Vinb%20Dester/style.css">
    <?php 


$json = json_decode(file_get_contents($directory."/savelib/json/{$bs}.json"));

foreach($json as $cs){
        if(file_exists($directory."/savelib/{$cs[0]}.css")){
    echo "<link rel='stylesheet' type='text/css' id='{$cs[0]}' href='/wp-content/themes/Vinb%20Dester/savelib/{$cs[0]}.css?c=".rand()."'>";
        }
    
}


    ?>


    <?php 
    wp_head();
     ?>
</head>

<body>
    <div class="controlpanel controlhide">
    <div>
    <span>Control Panel</span>
        <span class="c"></span></div>
        <ul>        </ul>
        <div class="b">
<button class="template-save">Save Page</button>
</div>
</div>
    <div class='<?php echo $bs;?>' id="site">





<?php 
foreach($json as $ht){
    if($ht[2]=='priority'){
        if(file_exists($directory."/savelib/{$ht[0]}.php")){
            include_once $directory."/savelib/{$ht[0]}.php";
        }else if(file_exists($directory."/lib/{$ht[0]}{$ht[1]}/{$ht[0]}.php")){
            include_once $directory."/lib/{$ht[0]}{$ht[1]}/{$ht[0]}.php";
        }else{
            include_once $directory."/lib/{$ht[0]}1/{$ht[0]}.php";
        }
    }

}
?>

    </div>

    <div id="tooltable">
        <div id="resize">
            <div id="htmbar">
            </div>
            <span id='close'>&#x274C;</span>
        </div>

        <div id="sourc">
            <div id='option'></div>
            <pre id='acehtml'></pre>
            <pre id='acecss'></pre>
            <pre id='acejs'></pre>

        </div>
        <div class="btt">
            <div class="neresize" id="resize">&swarrow;</div>
            <p></p>
            <button id="applysave" type="button">Apply</button>
        </div>


    </div>

    
    <script src="/wp-content/themes/Vinb%20Dester/tool/acesrc/ace.js" type="text/javascript"></script>
    <script src="/wp-content/themes/Vinb%20Dester/tool/js.js"></script>
    
    <?php

 foreach($json as $js){
    if($js[2] !== 'css' && file_exists($directory."/savelib/{$js[0]}.js")){        
        echo "<script id='{$js[0]}'  src='/wp-content/themes/Vinb%20Dester/savelib/{$js[0]}.js?c=".rand()."'></script>";
    }

}

 ?>
</body>

</html>

<?php 
 wp_footer();
    ?>