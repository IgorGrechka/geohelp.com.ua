<?php
class Controller_Admin extends Controller {
	
	public $admin;
	
	public function __construct() {
		parent::__construct();	
		$this->admin = new Model_Admin();
	}
	
	function method_default() {
		if ($this->admin->isAdminUser()) {
			$data = true;
			$this->view->generate('admin_view.php', 'template_view.php', $data, $this->authUserName);
		}else{
			$data = false;
			$this->view->generate('admin_view.php', 'template_view.php', $data, $this->authUserName);
		}
	}
	
	function method_add_znak() {
		if ($_POST) {
			$status = $this->admin->add_znak($_POST);
			$data["status"] = $this->getErrMessage($status);
			$this->view->generate('admin_view_add_znak.php', 'template_view.php', $data, $this->authUserName);
		}else{
			$this->view->generate('admin_view_add_znak.php', 'template_view.php', null, $this->authUserName);
		}
	}
}