<?php

	require_once('../class/admin_patients.class.php');
	$patients= new Admin_patients();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		case 0:
			$showNumber=$_GET['showNumber'];
			$column=$_GET['column'];
			$result=$patients->getAllPatients($column,$showNumber);
			break;	
		default:
		
			break;
	}	
	header("Content-type:application/json");
	echo json_encode($result);
	

?>

