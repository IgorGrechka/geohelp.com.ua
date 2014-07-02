<?php
class Controller {
	
	public $model;
	public $view;
	public $isAuthUser;
	public $authUserName;
		
	function __construct() {
		session_start();
		$this->view = new View();
		$this->model = new Model();
		$this->isAuthUser = $this->model->isAuth();
		$this->isAuthUser === true? $this->authUserName = $_SESSION["login"]: $this->authUserName = null;
		if ($_POST["auth"] == "Войти") {
			$login = $_POST["login"];
			$password = $_POST["password"];
			if ($this->model->login($login, $password)) {
				header("Location: {$_SERVER["HTTP_REFERER"]}");
			}
		}
	}
	
	public function getErrMessage ($errCode) {
		$err_text = parse_ini_file ("ini/messages.ini");
		return $err_text["$errCode"];
	}
	
	function method_default() {}
}