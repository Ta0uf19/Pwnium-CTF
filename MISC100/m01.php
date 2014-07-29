<?php
   
	
	$width = 300;
    $height = 300;
	$lines = file('misc01.csv');
    $image = imagecreatetruecolor($width, $height);

foreach ($lines as $line_num => $line) {
    for ($j = 0; $j <= $height; ++$j) {
	$tmp=explode(";",$line);
	$index=$tmp[1];
	$col= $tmp[2];
	
	
    $col1 = imagecolorallocate($image, $col, $col, $col);
	                
    imagesetpixel($image, $index, $j, $col1);
            }
    

	
}
	   

    header("Content-type: image/png");
    imagepng($image);
    imagedestroy($image);
	
	
	
?>
  
  
