<?php
namespace controller;

class CP_mess extends AController{
	public function getBody(){
		parent::getBody();

		return $this->render('p_mess',FALSE,FALSE,FALSE,FALSE);
	}
}