<?php session_start();
print_r($_SERVER);
echo $_SESSION['komunikat'];
 exit();/*

$dest=ImageCreate(153,138);
$kolor_tla = ImageColorAllocate($dest,100,150,50);
$kolor = ImageColorAllocate($dest,0,0,0);
//$kolor_tla_przezroczysty = ImageColorTransparent($dest, $kolor_tla);
ImageString($dest,6,07,29,json_encode($_REQUEST),$kolor);

header('Content-Type: image/png');
imagepng($dest);
imagedestroy($dest);
imagedestroy($src); //*/

