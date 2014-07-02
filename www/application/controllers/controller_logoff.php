<?php
class Controller_Logoff extends Controller {
	
	public function __construct() {
		parent::__construct();
		
	}
	
	public function method_default() {
		session_start();
		unset ($_SESSION["login"]);
		unset ($_SESSION["password"]);
		header("Location: {$_SERVER["HTTP_REFERER"]}");
	}
}