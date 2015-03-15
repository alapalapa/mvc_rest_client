<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'dba');
define ('DB', 'WebServices');


class Login
{
	public $token;

	public function __construct($user, $pass)
	{
		$con = mysqli_connect(HOST, USER, PASS);
		mysqli_select_db($con, DB);

		$this->validate_login($con, $user, $pass);
	}

	public function validate_login($con, $user, $pass)
	{
		$query = "SELECT id,login,pass,birthday,json FROM user WHERE login = '$user'";
		$result = mysqli_query($con, $query) or die ('error on query');

		while($data = mysqli_fetch_assoc($result)){
			$rows[] = $data;
		}

		foreach($rows as $value){
			$compare = json_decode($value['json']);
		  if($compare->pass == $this->encrypt($pass)){
				$user_data = json_encode(array("user" => $user, "pass" => $pass));
				$this->token = array("token" => $this->encrypt($user_data), "hour" => date("H:i:s"), "limit" => date("H:i:s", strtotime('+30 minutes')));
			} else {
				$this->token = "Error o password incorrectos";
			}
		}

	}

	public function create_token($value)
	{
		return md5($value);
	}

	public function encrypt($field)
	{
		$mcrypt_module = mcrypt_module_open('rijndael-256', '', 'ecb', '');
		//Defyning long of the key
		$long = mcrypt_create_iv(mcrypt_enc_get_iv_size($mcrypt_module), MCRYPT_DEV_RANDOM);
		$key_size = mcrypt_enc_get_key_size($mcrypt_module);
		//Creating keys
		$key = substr(md5('xy1z2vw45r7s96'), 0, $key_size);
		//Init crypt
		mcrypt_generic_init($mcrypt_module, $key, $long);
		//Crypting
		$encrypted = mcrypt_generic($mcrypt_module, $field);
		//finish the crypt manager
		mcrypt_module_close($mcrypt_module);

		return base64_encode($encrypted);
	}
}






?>
