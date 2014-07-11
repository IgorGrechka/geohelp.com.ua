<?php
	session_start();
	$rand = mt_rand(1000, 9999);
	$_SESSION["rand"] = $rand;
	$im = imageCreateTrueColor(85, 40);
	$c = imageColorAllocate($im, 255, 255, 255);
	imageTtfText($im, 20, -10, 5, 25, $c, "../../css/verdana.ttf", $rand);
	header("Content-type: image/png");
	imagePng($im);
	imageDestroy($im);
?>