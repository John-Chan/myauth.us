<?php 
/**
by:pooy
date:18:06 2013年4月3日
http://www.pooy.net
**/
session_start();
//Settings: You can customize the captcha here
$image_width = 200;
$image_height = 70;
$characters_on_image = 6;
$font = '../../resources/monofont.ttf';

//The characters that can be used in the CAPTCHA code.
//avoid confusing characters (l 1 and i for example)
$possible_letters = '23456789bcdfghjkmnpqrstvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
$random_dots = 10;
$random_lines = 30;
$captcha_text_color[0]="0xd51010";
$captcha_text_color[1]="0x0a26d2";
$captcha_text_color[2]="0x0ad20a";

$captcha_noice_color = "0x142864";

$code = '';

$i = 0;
while ($i < $characters_on_image) { 
$code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
$i++;
}


$font_size = $image_height * 0.75;
$image = @imagecreate($image_width, $image_height);


/* setting the background, text and noise colours here */
$background_color = imagecolorallocate($image, 255, 255, 255);

$arr_text_color = hexrgb($captcha_text_color[rand(0,2)]);
$text_color = imagecolorallocate($image, $arr_text_color['red'], 
		$arr_text_color['green'], $arr_text_color['blue']);

$arr_noice_color = hexrgb($captcha_noice_color);
$image_noise_color = imagecolorallocate($image, $arr_noice_color['red'], 
		$arr_noice_color['green'], $arr_noice_color['blue']);


/* generating the dots randomly in background */
for( $i=0; $i<$random_dots; $i++ ) {
imagefilledellipse($image, mt_rand(0,$image_width),
 mt_rand(0,$image_height), 2, 3, $image_noise_color);
}


/* generating lines randomly in background of image */
for( $i=0; $i<$random_lines; $i++ ) {
imageline($image, mt_rand(0,$image_width), mt_rand(0,$image_height),
 mt_rand(0,$image_width), mt_rand(0,$image_height), $image_noise_color);
}


/* create a text box and add 6 letters code in it */
$textbox = imagettfbbox($font_size, 0, $font, $code); 
$x = ($image_width - $textbox[4])/2;
$y = ($image_height - $textbox[5])/2;
imagettftext($image, $font_size, 0, $x, $y, $text_color, $font , $code);


/* Show captcha image in the page html page */
header('Content-Type: image/jpeg');// defining the image type to be shown in browser widow
imagejpeg($image);//showing the image
imagedestroy($image);//destroying the image instance
$_SESSION['letters_code'] = md5(strtolower($code));

function hexrgb ($hexstr)
{
  $int = hexdec($hexstr);

  return array("red" => 0xFF & ($int >> 0x10),
               "green" => 0xFF & ($int >> 0x8),
               "blue" => 0xFF & $int);
}
?>