<?php
	session_start();
	//include_once("maLibSecurisation.php");
	
	
	$_SESSION['captcha'] = str_rand();
	
	$img = imagecreate(140,40);
	$font='fonts/whitrabt.ttf';
	$bg = imagecolorallocate($img, 255, 255, 255);
	$textcolor=imagecolorallocate($img, 0, 0, 0);
	
	/*text*/
	for($i=0;$i<strlen($_SESSION['captcha']);$i++)
	{
		$char=$_SESSION['captcha'][$i];
								//imagestring ( resource $image , int $font , int $x , int $y , string $string , int $color )
								//imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
		imagettftext($img, 20, rand(-10,10),22*$i, rand(20,38), $textcolor, $font, $char);
		imageline($img, rand(0,140), 0, rand(0,140), 40, $textcolor);
	}
	
	/*trouble l'image*/
	imagefilter ($img ,IMG_FILTER_GAUSSIAN_BLUR,0);//Floue gaussien

	
	header('Content-type:image/jpeg');
	imagejpeg($img);
	imagedestroy($img);
	
	
	
	function str_rand($len = 6)
		{
		 $car = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
		 $lenMax = strlen($car);
		 $randomStr = '';
		 for ($i = 0; $i < $len; $i++)
		 {
		 $randomStr .= $car[rand(0, $lenMax - 1)];
		 }
		 return $randomStr;
		}
		
		
		//imagepsslantfont — Incline une police de caractères PostScript
		//imagepsextendfont — Étend ou condense une police de caractères
		//imagefilter — Applique un filtre à une image //IMG_FILTER_SCATTER: Applique un effet de dispersion à l'image
?>


