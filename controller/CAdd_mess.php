<?php
namespace controller;
use classes\Razd;
class CAdd_mess extends AController{
	public function getBody(){
		parent::getBody();
		$razd = new Razd();
		$categori = $this->db->getCategoriesAddMess();
		
		if($_POST['add_mess']){
			$_SESSION['msg'] = $this->db->funcAdd_mess($_POST);
			header("Location:{$_SERVER['PHP_SELF']}?controller=add_mess");
			exit();
		}

		return $this->render('add_mess',$categori,$razd,FALSE,FALSE);
	}
}