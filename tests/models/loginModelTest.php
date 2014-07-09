<?php
set_include_path('/home/roberth/jaguarlabs/mvc');
require_once 'models/loginModel.php';

class LoginTest extends PHPUnit_Framework_TestCase
{
	public $test_token;

	public function  test_validate_login_test()
	{
		$obj = new Login('root', 'dba');
		$this->test_token = $obj->token;
		$this->assertTrue($this->test_token == $obj->token);
	}

	public function test_create_token()
	{
		$obj = new Login('user', 'pass');
		$token = $obj->create_token("value");
		$this->assertTrue(is_string($token));
	}

	public function test_encrypt()
	{
		$obj = new Login('user', 'pass');
		$crypt = $obj->encrypt("value");
		$this->assertTrue(is_string($crypt));
	}

}
