<?php
$bs = 'single-video';
current_user_can( 'edit_pages' ) or die(include_once "savelib/index/{$bs}.php");
$directory = dirname(__FILE__);
include_once 'includes/unic.php';
?>