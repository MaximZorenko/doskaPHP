<?php
namespace controller;
use model\Model;

abstract class AController{
	
	public $db;

	public function getBody(){
		$this->db = new Model('mysql:host=localhost;dbname=doska', 'root', '');
	}

	public function render($patch,$params1,$params2,$params3,$params4){
		// extract($params);
		// $params = $params;		
		ob_start();	
		include("view/{$patch}.tpl.php");
		return ob_get_clean();
	}	


}