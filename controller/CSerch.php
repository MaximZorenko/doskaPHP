<?php
namespace controller;
use controller\AController;

class CSerch extends AController{
	function getBody(){
		parent::getBody();
		if($_GET['search']){
			$text = $this->db->getSearch($_GET);
		}

		return $this->render('serch',$text,FALSE,FALSE,FALSE);
	}
}
