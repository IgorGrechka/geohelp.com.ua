<?php
require_once "config.php";
class Model {
	
	public $config;
	public $db;
	
	public function __construct() {
		$this->config = new Config();
		$this->db = new PDO("mysql:host={$this->config->host};dbname={$this->config->db}", $this->config->db_user, $this->config->db_password);
//echo "DB connected<br>";
	}
	
	public function isAuth() {
		if (isset($_SESSION["login"]) and isset($_SESSION["password"])) {
			$login = $_SESSION["login"];
			$password = $_SESSION["password"];
			$user = $this->getUserOnLogin($login);
			if ($user["password"] === $password) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function isAdmin() {
		if ($this->isAuth()) {
			$adminPass = $this->hashPassword($this->config->admin_password);
			if (($_SESSION["login"] == $this->config->admin_login) and ($_SESSION["password"] == $adminPass)) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}
	
	public function getUserOnLogin($login) {
		$sql = "SELECT login, password FROM users WHERE login = '$login'";
		$stmt = $this->db->query($sql);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public function isExistsUser($login) {
		$sql = "SELECT * FROM users WHERE login = '$login'";
		$stmt = $this->db->query($sql);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result == "") return false;
		return true;
	}
	
	public function clearStr($data) {
		return (trim(strip_tags($data)));
	}
		
	public function clearInt($data) {
		return abs((int)$data);
	}
	
	public function hashPassword($password) {
		return md5($password.$this->config->pas_secure);
	}

/*-----------------------------------------Аутентификация пользователя-----------------------------------------*/
	
	public function login($login, $password) {
		$password = $this->hashPassword($password);
		if ($this->checkUser($login, $password)) {
			$_SESSION["login"] = $login;
			$_SESSION["password"] = $password;
			return true;
		}else{
			$_SESSION["auth_err"] = "Неверное имя пользователя<br>и/или пароль";
			return false;
		}
	}
	
	public function checkUser($login, $password) {
		if (!$this->isExistsUser($login)) return false;
		$sql = "SELECT password FROM users WHERE login = '$login'";
		$stmt = $this->db->query($sql);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result["password"] === $password;
	}
	
/*------------------------------------Функции валидации данных пользователя------------------------------------*/
	public function checkValid($login, $password, $regdate) {
		if (!$this->validLogin($login)) return false;
		if (!$this->validHash($password)) return false;
		if (!$this->validTimeStamp($regdate)) return false;
		return true;
	}
	
	public function validLogin($login) {
		if ($this->isContainQuotes) return false;
		if (preg_match("/^\d*$/", $login)) return false;
		return $this->validString($login, $this->config->min_login, $this->config->max_login);
	}
	
	public function validHash($hash) {
		if (!$this->validString($hash, 32, 32)) return false;
		if (!$this->isOnlyLettersAndDigits($hash)) return false;
		return rtue;
	}
	
	public function validTimeStamp($time) {
		return $this->isNoNegativeInteger($time);
	}
	
	private function isIntNumber ($number) {
		if (!is_int($number) and !is_string($number)) return false;
		if (!preg_match("/^-?([1-9][0-9]*|0)$/", $number)) return false;
		return true;
	}
	
	private function isNoNegativeInteger($number) {
		if (!$this->isIntNumber($number)) return false;
		if ($number < 0) return false;
		return true;
	}
	
	private function isOnlyLettersAndDigits($string) {
		if (!is_int($string) and (!is_string($string))) return false;
		if (!preg_match(("/[a-zа-я0-9]*/i"), $string)) return false;
		return true;
	}
	
	private function isContainQuotes($string) {
		$array = array("\'", "'", "`", "&quot;", "&apos;");
		foreach ($array as $key => $value) {
			if (strpos($string, $value) !== false) return true;
		}
		return false;
	}
	
	private function validString($string, $min_length, $max_length) {
		if (!is_string($string))return false;
		if (strlen($string) < $min_length) return false;
		if (strlen($string) > $max_length) return false;
		return true;
	}
/*-------------------------------------------------------------------------------------------------------------*/
}