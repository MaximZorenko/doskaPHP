<?php
session_start();
header("Content-Type:text/html;charset=utf8");
use controller\{CMain,CRegistration,CAdd_mess,CP_mess,CSerch};
use classes\{Razd,Ctegories};

spl_autoload_register('autoload');
function autoload($class){
	if(file_exists(__DIR__."/{$class}.php")){
		require_once(__DIR__."/{$class}.php");
	}
}


// $user;
$razd = new Razd();
$categori = new Ctegories();

if($_GET['controller']){
	$class = $_GET['controller']; 
	switch ($class) {
		case 'registration':
			$init = new CRegistration();
			break;
		case 'add_mess':
			$init = new CAdd_mess();
			break;
		case 'p_mess':
			$init = new CP_mess();
			break;
		case 'main':
			$init = new CMain();
			break;
		case 'search':
			$init = new CSerch();
			break;
		default:
			$init = new CMain();
			break;
	}
}else{
	$init = new CMain();
}

include __DIR__."/view/index.php";