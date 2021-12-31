<?php
defined('ABSPATH') or die("connect die");
$glob =$d.'\/lib/'.$_POST['po'].'0';

function removeDirectory($path) {
    $files = glob($path.'/*');
    foreach ($files as $file) {
        is_dir($file) ? removeDirectory($file) : unlink($file);
    }   
    rmdir($path);
 }

 



$sacer = glob($d.'\/lib/'.$_POST['po'].$_POST['num'].'/*');


function recurse_copy($src,$dst) {
    @mkdir($dst);
    $files = array_diff(scandir($src),['.','..']);
    foreach ($files as $file) {
       is_dir($src.'/'.$file)?recurse_copy($src.'/'.$file,$dst.'/'.$file):copy($src.'/'.$file, $dst.'/'.$file);
    }
 }
 

if($_POST['num'] !== '0'){
    removeDirectory($glob);
    recurse_copy($d.'\/lib/'.$_POST['po'].$_POST['num'],'../lib/'.$_POST['po'].'0');
}




$font = array("js", "css","php");
foreach($font as $fontas){
    if(isset($_POST[$fontas])){
        $file = $d.'\/lib/'.$_POST['po'].'0/'.$_POST['po'].'.'.$fontas;
        

        file_put_contents( $file, stripslashes($_POST[$fontas]));
    }

}

$fontadm = array("option.php", "option.js",'optionpost.js');
foreach($fontadm as $fontadmas){
    $file = $d.'\/lib/'.$_POST['po'].''.$_POST['num'].'/'.$_POST['po'].$fontadmas;
    if(file_exists($file)){
        copy($file,$d.'\/lib/'.$_POST['po'].'0/'.$_POST['po'].$fontadmas);
      }

}

echo 'true';