<?php
class Controller_Uslznaki extends Controller {
	
	public $usl_znaki;
	
	public function __construct() {
		parent::__construct();
		$this->usl_znaki = new Model_Uslznaki();
	}
	
	function method_default() {
		if ($_POST["zn_name"] <> "") {
			$data = $this->usl_znaki->search_znak ($_POST["zn_name"]);
		}else{
			$data = $this->usl_znaki->getAllSymbols();
		}
		$this->view->generate('uslznaki_view.php', 'template_view.php', $data, $this->authUserName);
	}
}