<?php

	require_once('../class/view_order.class.php');
	
	$order= new order();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		//display order
		case 1:
			session_start();
			$order_id=$_SESSION['order_id'];
			$result=$order-> AllProductsOrdered($order_id);

			break;
			//get customer information
		case 2:
			session_start();
			$customer_id=$_SESSION['customer_id'];
			$result=$order->customerinfo($customer_id);

		
			break;
		//accept order
		case 3:
			session_start();
			$order_id=$_SESSION['order_id'];
			$status=$_GET['status'];
			$result=$order->acceptorder($status,$order_id);

		
			break;
		case 4:

			$result=$order->getproductquantity();

		
			break;
		case 5:
			$product_id=$_GET['product_id'];
			$product_quantity=$_GET['product_quantity'];
			$result=$order->SubstructQuantity($product_id,$product_quantity);

			break;

		default:
		
			break;
	}	
	header("Content-type:application/json");
	echo json_encode($result);

?>

