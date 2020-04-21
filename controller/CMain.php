<?php
namespace controller;

class CMain extends AController{
	public function getBody(){
		parent::getBody();
		if($_POST['deletPost']){
			$_SESSION['msg'] = $this->db->deletPost($_POST);
			header("Location:{$_SERVER['PHP_SELF']}?controller=main");
			exit();
		}
		
		if($_GET['page']){
			$page = $_GET['page'];
		}else{
			$page = 1;
		}
	
		if($_GET['id_r']){
			$id_r = $_GET['id_r'];
		}else{
			$id_r = FALSE;
		}
		$countPost = $this->db->countPost($id_r);
		$text = $this->db->getMainMessage($page,$id_r);
		// $navigation = $this->db->navigation(); 	
		return $this->render('main',$text,$navigation,$countPost,$id_r);
	}
}

?>