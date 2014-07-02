<?php
class Model_Registration extends Model {
	
	public function regUser() {
		$login = $_POST["login"];
		$password = $this->hashPassword($_POST["password"]);
		$captcha = $_POST["captcha"];
		$regdate = time();
		if ($login == "") return "Не указан логин и/или пароль";
		if ($password == "") return "Не указан логин и/или пароль";
		if (($_SESSION["rand"] != $captcha) and ($_SESSION["rand"] != "")) return "Неверный код подтверждения";
		if ($this->isExistsUser($login)) return "Данный логин занят";
		if (!$this->checkValid($login, $password, $regdate)) return "Ошибка во веденых данных";
		$sql = "INSERT INTO users (login, password, regdate) VALUES ('$login', '$password', '$regdate')";
		$this->db->exec($sql);
		return "SUCCESS_REG";
	}
}