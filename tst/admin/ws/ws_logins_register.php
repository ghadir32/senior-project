<?php

	require_once('../class/login_register.class.php');
	
	$logins= new login();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

switch ($op) {

	case 1:
		$result=$logins->actions();


		break;
	//filter
	case 2:
		if(isset($_GET['selected'])){
			$selected=$_GET['selected'];
		}

	
		$result=$logins->FilterTheTable($selected);
		
		break;
	//delete all
	case 3:
		$result=$logins->deleteAllActions();
		
		break;
	//delete this
		case 4:
				$id=$_GET['id'];
				$result=$logins->deleteActionById($id);
		
			break;

	default:
		
		break;
}	
header("Content-type:application/json");
echo json_encode($result);

?>

