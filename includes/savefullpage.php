<?php
defined('ABSPATH') or die("connect die");

$save = json_decode(stripslashes($_POST['data']));

// yvela faili rac obieqtshi shesadzloa iyos
$allop = array('option.php', 'option.js','optionpost.js','reiting.php','comment.php','archive.php','option.php','option.js','option.css',['f','taxonomy-video_categories.php'],['f','taxonomy-video_tags.php'] ,['f','single-video.php'],['f','single.php'],'info.json',['f','category.php'],['f','search.php'],['f','page.php'],'.js','.css',['p','.php']);
// .......



// gadaaqvs filebi 0 failebshi da savetemplibshi
function removeDirectory($path) {
   $files = glob($path.'/*');
   foreach ($files as $file) {
       is_dir($file) ? removeDirectory($file) : unlink($file);
   }   
   rmdir($path);
}

function recurse_copy($src,$dst) {
   @mkdir($dst);
   $files = array_diff(scandir($src),['.','..']);
   foreach ($files as $file) {
      is_dir($src.'/'.$file)?recurse_copy($src.'/'.$file,$dst.'/'.$file):copy($src.'/'.$file, $dst.'/'.$file);
   }
}


$incont='';
$jsing='';

// shlis js da css is mtavar failebss
unlink($d."/tool/{$_POST['page']}.js");
unlink($d."/tool/style.css");
// ............






foreach($save as $dt){
   
   
   if($dt[2] !== 'css'):
      
   
   $fi = $d."/lib/{$dt[0]}{$dt[1]}";
   if($dt[1] !== '0'){      
      removeDirectory($d."/lib/{$dt[0]}0");
      recurse_copy($fi,$d."/lib/{$dt[0]}0");
   }

   // gadaaqvs failebi savelib shi da pirvel gverdze
foreach($allop as $key =>$si){
   $s =(is_array($si)?$si[1]:$si);
   $lb =$d."/lib/{$dt[0]}0/".$dt[0].$s;
   $co= $d.'/'.(is_array($si) && $si[0]=='f'?'':'savelib/'.$dt[0]).$s;
   
   
  
   // akopirebs savetemplibshi
   if(file_exists($lb)){
   copy($lb,$co);

   if($s == '.php'){
      
      if($dt[0] == 'head'){
         $conetenss = '<!DOCTYPE html>
         <html <?php language_attributes(); ?>>
      
      <head>
          <meta charset="<?php wp_title("|", true, "right"); ?>">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title><?php bloginfo("name"); ?></title>
          <link rel="stylesheet" type="text/css" href="/wp-content/themes/Vinb%20Dester/tool/style.css?c='.rand().'">
          <?php wp_head(); ?>
      </head>
      
      <body style="margin: 0;">'.file_get_contents($lb);
      
          file_put_contents($d.'/header.php',$conetenss);
      
          }else if($dt[0] == 'footer'){
      
          $conetenss = file_get_contents($lb);
          
          file_put_contents($d.'/footer.php',$conetenss.'</body><?php wp_footer();?> </html>');
          
      }else if($si[0]=='p'){
        
      $incont=$incont.file_get_contents($lb);
      }
      }else if($s == '.js'){
         
      file_put_contents($d."/tool/{$_POST['page']}.js", file_get_contents($lb).PHP_EOL, FILE_APPEND);
      $jsing = '<script src="/wp-content/themes/Vinb%20Dester/tool/'.$_POST['page'].'.js"></script>';
      }
      
   }else if($si[0]!=='f' && file_exists($co)){
      unlink($co);
    }
    
   // ..............
   
}
   //...............

endif;  
}
// inaxavs im csss infos romelic chirdeba yovel pages

file_put_contents($d."/savelib/json/{$_POST['page']}.json",stripslashes($_POST['data']));
// ..............................
// ..........
// inaxavs zemota incout cvlads anu pagebs htmlshi

file_put_contents($d."/savelib/index/{$_POST['page']}.php","<?php get_header();?>{$incont}{$jsing} <?php get_footer();?>");
// .................












// funcia info.json idan datas wamosagebad
function infoGEN(){
   global $jinf,$funop,$func,$d,$funcfil;
   if(isset($jinf->imagetumb)){
      foreach($jinf->imagetumb as $tu){
         $func=$func.($func==''?PHP_EOL.'add_filter("intermediate_image_sizes_advanced",function($sizes){ return array(':',')."'{$tu[1]}'=>{$tu[0]}";
         
      }
      $func=$func.');});';
      
      
   }
   if(isset($jinf->function)){
      $funcfil=$funcfil.file_get_contents($d."/lib/{$jinf->function}/functions.php");
   }
   if(isset($jinf->widget)){
      copy($d."/lib/{$jinf->widget}/widget.css",$d."/savelib/widget.css");
      $func=$func.PHP_EOL." include_once 'lib/{$jinf->widget}/widget.php';".PHP_EOL;

   }
   
   if(isset($jinf->funop)){
   // agenerirebs ifebs function.php failistvis
      if(isset($jinf->funop->if)){
         foreach($jinf->funop->if as $if){
            if(isset($funop[0][$if[0]])){
               $funop[0][$if[0]]=$funop[0][$if[0]].$if[1];
            }else{
               $funop[0][$if[0]]=$if[1];
            }
            
         }
      }

      // .................
      

   // agenerirebs functiebs function.php failistvis
      if(isset($jinf->funop->fun)){
         foreach($jinf->funop->fun as $fu){
            $fuu=array_values(array_diff($fu,[$fu[0]]));
             if(isset($funop[1][$fu[0]])){
              $obj = $funop[1][$fu[0]];
              $obj->inner=$obj->inner.$fuu[0];
            }else{
               $obj = new stdClass();
               $obj->inner=$fuu[0];
               $funop[1][$fu[0]] = $obj;
   
            }
   
            if(isset($fuu[1])){
               $obj->arg[$fuu[1][1]]=$fuu[1][0];
            }else{
               $obj->arg=array();
            }
   
            
         }
      }
      // ...........................

// amatebs info filedan inners
if(isset($jinf->funop->inner)){
   $func=$func.PHP_EOL.$jinf->funop->inner;
}
      // .............................
      
   }
   
   
   return $funop;
}
// ...................








// funqcia romelic agenrirdeba mtliani functionis fail
$files = scandir($d.'/savelib');

foreach($files as $f){
 if(strpos($f,'info.json')){
  $jinf = json_decode(file_get_contents($d.'\/savelib/'.$f));
  
  

  $funop =infoGEN();
  
 }
}






// zemot ukve dagenerirebul functiebs amatebs function.php failshi
foreach($funop[1] as $key=>$foc){
   // $func=$func." add_action( '{$key}', function() {{}});"
      $r='';
      for ($x = 0; $x < count($foc->arg); $x++) {
         $r=$r.($x==0?'':',').$foc->arg[$x];
     } 
     

   $func=$func.PHP_EOL." add_action( '{$key}', function({$r}) {{$foc->inner}});";
}
// ..................

// zemot ukve dagenerirebul ifebs amatebs function.php failshi
foreach($funop[0] as $key=>$foc){
   $func=$func.PHP_EOL."if({$key}){{$foc}}";
}
// ..................



file_put_contents($d.'/functions.php', $funcfil.$func.PHP_EOL);


// ......................











// agenerirebs saboloo css fails
$files = scandir($d.'/lib');
$aded=array();
foreach($files as $cel){
   $rg = preg_replace('/\d+/', '', $cel);
   
   $cfi = $d."/savelib/{$rg}.css";
   if(!in_array($rg,$aded) && file_exists($cfi)){
      
   file_put_contents($d.'/tool/style.css',file_get_contents($cfi).PHP_EOL, FILE_APPEND);
   array_push($aded,$rg);
}
}
// ....................