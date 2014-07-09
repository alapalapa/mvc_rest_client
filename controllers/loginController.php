<?php
include 'models/loginModel.php';


header("Content-type: application/json; Accept: application/json");
header("HTTP/1.1 200 success");

$data = json_decode(file_get_contents("php://input"));
@$login 	= $data->user;
@$pass 	= $data->pass;

$obj = new Login($login, $pass);


include 'views/loginView.php';


?>
