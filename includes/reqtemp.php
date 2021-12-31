<?php 
defined('ABSPATH') or die("connect die");
$Obj= new stdClass();

$ar = explode(",",$_POST['array']);

// $Obj->option ='rfdddddddddddddddddddg';
if(isset($_POST['text'])){
foreach($ar as $i){
    
    if (file_exists($d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'.'.$i)){
    $Obj->$i=file_get_contents($d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'.'.$i);
  
                }
}

$arrop = array('js','php');
foreach($arrop as $i){
    
    if (file_exists($d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'option.'.$i)){
        $nm ="option".$i;
    $Obj->$nm=file_get_contents($d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'option.'.$i);
  
        }
}



if (file_exists($d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'option.css')){
    $nm ="option".$i;
$Obj->optioncss='/wp-content/themes/Vinb Dester/lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'option.css';

    }









}else{
    if (file_exists($d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'.js')){
        $Obj->js=file_get_contents($d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'.js');
      
               }
               if (file_exists($d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'.php')){
                            
                ob_start();

    include_once $d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'.php';
    $contents = ob_get_contents();
    ob_end_clean();
    
    $Obj->php = $contents;
                 }

        if (file_exists($d.'//lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'.css')){
                  $Obj->css='http://'.$_SERVER['HTTP_HOST'].'/wp-content/themes/Vinb Dester/lib/'.$_POST['po'].$_POST['temid'].'/'.$_POST['po'].'.css';                      
              }
              
}

$JSON = json_encode($Obj);

echo $JSON;