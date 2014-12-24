<?php

 header('Content-type: image/jpeg');
$imgURL	=	'img.jpg';
//echo '<img src='.$imgURL.'><br>';
$img 	=	imagecreatefromjpeg($imgURL);

$med	= array(
			array(0,-1,0),
			array(-1,4,-1),
			array(0,-1,0)
			);

$width = imagesx($img)-1;
$heigth = imagesy($img)-1;



for ($y=0; $y <= $heigth ; $y++) {
for ($x=0; $x <= $width ; $x++) { 

	$bin = imagecolorat($img, $x, $y);
	$index = imagecolorsforindex($img, $bin);
	$g = round(($index['red']+$index['green']+$index['blue'])/3);
	$val = imagecolorallocate($img, $g, $g, $g);
	imagesetpixel($img, $x, $y, $val);

}


}




// imageconvolution($img, $med, -5, 25);

imagejpeg($img);

imagedestroy($img); 

?>

