<?php
/*
 A security code generator for my forms to prevent robots and other imitators from
 filling my forms
*/
session_name("Mycode");
//begin session
session_start();
// create an image
$image = imagecreatetruecolor(100, 25);

$color1 = imagecolorallocate($image, 20,74,220);
$color2 = imagecolorallocate($image, 255,220,12);
$color3 = imagecolorallocate($image, 255,255,255);

imagefilledrectangle($image, 1, 1, 109, 23, $color1);
//imagerectangle($image, 0, 0, 110, 35, $border_col);
$_SESSION['rcode'] =="";
    $str = "";
    $length = 0;
    $myv = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";

     $str = $myv{rand(0, strlen($myv)-1)};
     $str .= $myv{rand(0, strlen($myv)-1)};
     $str .= $myv{rand(0, strlen($myv)-1)};
     $str .= $myv{rand(0, strlen($myv)-1)};
     $str .= $myv{rand(0, strlen($myv)-1)};
     $str .= $myv{rand(0, strlen($myv)-1)};

$_SESSION['rcode'] = $str;

$font = "fonts/ARLRDBD.TTF"; // it's a Bitstream font
$font_size = 10;
$angle = 6;
//$box = imagettfbbox($font_size, $angle, $font, $_SESSION['rcode']);
//$x = (int)($imgX - $box[4]) / 2;
//$y = (int)($imgY - $box[5]) / 2;
//imagettftext($image, $font_size, $angle, $x, $y, $color3, $font, $_SESSION['rcode']);
imagettftext($image, $font_size, $angle, 10, 20, $color2, $font, $_SESSION['rcode']);
imagettftext($image, $font_size, $angle, 10, 20, $color3, $font, $_SESSION['rcode']);

header("Content-type: image/png");
imagepng($image);
imagedestroy ($image);
?>