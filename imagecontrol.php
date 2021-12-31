<?php function wpse_images_controls( $sizes){
   return array("hghgh"=>array("width" => 288,"height" => 192,"crop" =>1),"hghgh"=>array("width" => 360,"height" => 240,"crop" =>1));
}
add_filter("intermediate_image_sizes_advanced","wpse_images_controls");

