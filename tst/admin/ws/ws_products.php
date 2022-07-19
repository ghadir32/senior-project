<?php

	require_once('../class/products.class.php');
	
	$products = new products();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
	
		//add
		case 1:
				$product_name=$_GET['product_name'];
				$product_category=$_GET['product_category'];
				$product_gender=$_GET['product_gender'];
				$product_quantity=$_GET['product_quantity'];
				$product_price=$_GET['product_price'];
				$product_final_price=$_GET['product_final_price'];
				$product_image=$_GET['product_image'];

				$result=$products->AddProducts($product_name,$product_category,$product_gender,$product_quantity,$product_price,$product_final_price,$product_image);
				break;

		////Update
		case 2:
				$id=$_GET['id'];
				$product_name=$_GET['product_name'];
				$product_category=$_GET['product_category'];
				$product_gender=$_GET['product_gender'];
				$product_quantity=$_GET['product_quantity'];
				$product_price=$_GET['product_price'];
				$product_final_price=$_GET['product_final_price'];
				$product_image=$_GET['product_image'];
				
				$status=$_GET['status'];
				$result=$products->UpdateProducts($id,$product_name,$product_category,$product_gender,$product_quantity,$product_price,$product_final_price,$product_image,$status);
		
				break;

		//delete
		case 3:
				$id=$_GET['id'];
				$result=$products->deleteProductsById($id);
		
			break;

		//get data to update it
		case 4:
				$id=$_GET['id'];

				$result=$products->Getproductstoedit($id);
				break;

		//get all data
		case 5:

				$result=$products->getAllproducts();
				
				break;

		//deactivate
		case 6:
				$id=$_GET['id'];
				$status=$_GET['status'];
		
				$result=$products->deactivateproduct($id,$status);
		
				break;


		//filter
		case 7:
				$selected=$_GET['selected'];
				$value=$_GET['value'];
		
				$result=$products->FilterTheTable($selected,$value);
		
				break;


	    ////// get categories 
		case 8:
		
				$result=$products->GetCategories();
		
				break;
		//get all data
		case 9:
		
		

				$more_row=$_GET['more_row'];
				$last_row=$_GET['last_row'];

				$result=$products->MoreProducts($last_row,$more_row);

				break;


		default:

			break;
		}	

	header("Content-type:application/json");
	echo json_encode($result);

	




?>

