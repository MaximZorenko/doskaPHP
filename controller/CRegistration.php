<?php
namespace controller;

class CRegistration extends AController{
	public function getBody(){
		parent::getBody();
		

		// $text = $this->db->func();
		return $this->render('registration',FALSE,FALSE,FALSE,FALSE);
	}
}

?>