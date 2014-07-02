<?php
class View {
	
	public $template_view;
	
	function generate($content_view, $template_view, $data = null, $user = null) {
		session_start();
		$auth_err = $_SESSION["auth_err"];
		unset ($_SESSION["auth_err"]);
		include 'application/views/'.$template_view;
	}
}