<?php
namespace classes;
use controller\AController; 

class Ctegories extends AController{
	public $cat;
	public function __construct(){
		$this->getBody();
		$this->cat = $this->db->getCategories();
	}
}