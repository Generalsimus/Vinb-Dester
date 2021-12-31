<?php



defined('ABSPATH') or die("connect die");


if(isset($_POST['like']) && is_numeric($_POST['like'])){
    $wpdb->query("UPDATE $wpdb->postmeta SET meta_value=meta_value + 1 WHERE post_id = ".$_POST['like']." and meta_key = 'post_like_count';");

    // setcookie( "postlike", $_COOKIE['postlike'].','.$_POST['like'].',', strtotime( '+4920 days' ) );
    $met = 'like';
    if(isset($_POST['replace'])) {
    $wpdb->query("UPDATE $wpdb->postmeta SET meta_value=meta_value - 1 WHERE post_id = ".$_POST['like']." and meta_key = 'post_dislike_count';");
    }
    
}elseif(isset($_POST['dislike']) && is_numeric($_POST['dislike'])){
    $wpdb->query("UPDATE $wpdb->postmeta SET meta_value=meta_value + 1 WHERE post_id = ".$_POST['dislike']." and meta_key = 'post_dislike_count';");
    // setcookie( "postdislike",  $_COOKIE['postdislike'].','.$_POST['dislike'].',', strtotime( '+4920 days' ) );
    $met = 'dislike';
    if(isset($_POST['replace'])) {
        $wpdb->query("UPDATE $wpdb->postmeta SET meta_value=meta_value - 1 WHERE post_id = ".$_POST['dislike']." and meta_key = 'post_like_count';");
        }
        
}


echo '{"method": "'.$met.'","location":"'.$_POST[$met].'"}';