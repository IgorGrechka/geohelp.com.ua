<?php
class Controller_Registration extends Controller {
	
	public $reg;
	
	public function __construct() {
		parent::__construct();
			$this->reg = new Model_Registration();		
	}
	
	public function method_default() {
		if ($_POST["reg"] == "Зарегистрироваться") {
			$data["reg_info"] = $this->reg->regUser();
			if ($data["reg_info"] == "SUCCESS_REG") {
				$this->view->generate('success_reg_view.php', 'template_view.php', null, $this->authUserName);
			}else{
				$this->view->generate('reg_view.php', 'template_view.php', $data, $this->authUserName);
			}
		}else{
			$this->view->generate('reg_view.php', 'template_view.php', null, $this->authUserName);
		}
	}
}