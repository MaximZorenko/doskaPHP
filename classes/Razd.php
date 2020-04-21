<?php
namespace classes;
use controller\AController;

class Razd extends AController{
	public $raz;
	public function __construct(){
		$this->getBody();
		$this->raz = $this->db->getRazd();

	}

}