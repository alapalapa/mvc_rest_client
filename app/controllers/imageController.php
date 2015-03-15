<?php

$img_src = "public/img/img.png";
$imgbinary = fread(fopen($img_src, "r"), filesize($img_src));
$img_str = base64_encode($imgbinary);


require 'views/imageView.php';

?>
