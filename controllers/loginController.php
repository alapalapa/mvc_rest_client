<?php
include 'models/loginModel.php';

$data = json_decode(file_get_contents("php://input"));
@$login 	= $data->user;
@$pass 	= $data->pass;

$obj = new Login($login, $pass);


include 'views/loginView.php';


?>
