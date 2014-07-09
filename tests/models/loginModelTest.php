<?php
set_include_path('/home/roberth/jaguarlabs/mvc');
require_once 'models/loginModel.php';

class LoginTest extends PHPUnit_Framework_TestCase
{
	public $token;

	public function  test_validate_login_test()
	{
		$this->token = json_encode(array("token" => "XUXOhw", "hour" => "somedate", "limit" => "somedate"));

		$this->assertTrue($this->token == '{"token":"XUXOhw","hour":"somedate","limit":"somedate"}');
	}


}
