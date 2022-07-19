<?php

	require_once('../class/ordered.class.php');
	
	$ordered= new ordered();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		//display ordered
		case 1:
			$result=$ordered->AllOrderes();

			break;
		//filter
		case 2:
			$selected=$_GET['selected'];
	
			$result=$ordered->FilterTheTable($selected);
		
			break;
		//delete all
		case 3:
			$result=$ordered->deleteAllActions();
		
			break;
		case 4:
			$order_id=$_GET['order_id'];

			session_start();
			$_SESSION["order_id"]=$order_id;
			echo $_SESSION["order_id"];

		
			break;
		case 5:
			$customer_id=$_GET['customer_id'];

			session_start();
			$_SESSION["customer_id"]=$customer_id;
			echo $_SESSION["customer_id"];

		
			break;

		default:
		
			break;
	}	
	header("Content-type:application/json");
	echo json_encode($result);

?>

