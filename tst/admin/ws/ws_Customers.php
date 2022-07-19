<?php

	require_once('../class/Admin_Customers.class.php');
	
	$customers = new customer();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

switch ($op) {

	//add user
	case 1:
		$uname=$_POST['username'];
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$address=$_POST['address'];
 		//$gender=$_GET['gender'];
		$status=$_POST['status'];

		$result = $customers->addCustomer($uname, $email, $pass, $address,  $status);
		//echo json_encode($result);

		break;
		
	////search for user by name(not used)
	case 2:
	 
			$username = $_GET['uname'];
			$result = $customers->searchUser($username);
			header("Content-type:application/json");

		 echo json_encode($result);
	 
		break;

	//delete
	case 3:

        $id=$_GET['id'];
        $customers->deleteCustomer($id);
		break;

	//get user by gender
	case 4:
		
		  $gender=$_GET['gender'];
		  $result = $customers->getUserByGender($gender);
		  header("Content-type:application/json");

	   echo json_encode($result);
	   break;

	//get all data
	case 5:
		$result=$customers->getAllCustomers();
		header("Content-type:application/json");
		echo json_encode($result);
		break;

	//deactivate user
	case 6:
		$id=$_GET['id'];
		$result=$customers->deactivateUser($id);
		header("Content-type:application/json");
		echo json_encode($result);
		break;

		//activate user
	case 7:
		$id=$_GET['id'];
		$result=$customers->activateUser($id);
		header("Content-type:application/json");
		echo json_encode($result);
		break;

	default:
		
		break;
}		
?>