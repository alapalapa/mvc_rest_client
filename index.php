<?php



$url = $_SERVER['REQUEST_URI'];

$uri = array(
	"/jaguarlabs/mvc/" => "controllers/loginController.php",
	"/jaguarlabs/mvc/jaguar/image" => "controllers/imageController.php",
	"/jaguarlabs/mvc/jaguar/about" => "controllers/aboutController.php",
);

foreach($uri as $key => $value){

	if($key == $url){
		require_once($value);

	}
}



?>
