<?php

	require_once('../../DAL/DAL.class.php');

	class products{
	
		public function getAllProducts(){
		
			$sql="Select * from `products` ORDER BY id DESC";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}
	
	
	
		public function deleteProductsById($id){
			$sql="delete from products where id=$id";

			$db = new DAL();
			$rows=$db->ExecuteQuery($sql);
		
			return $rows;
		}


		public function Getproductstoedit($id){
			$sql="select * from products where id=$id";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}


	
		public function	AddProducts($product_name,$product_category,$product_gender,$product_quantity,$product_price,$product_final_price,$product_image){

			$sql="insert into products (id,product_name,product_category,product_gender,product_quantity,product_price,product_final_price,product_image,status) values ('','$product_name','$product_category','$product_gender','$product_quantity','$product_price','$product_final_price','$product_image','1')";
		
		
			$db = new DAL();
		
			$rows=$db->ExecuteQuery($sql);
		
			return $rows;
		}


		public function UpdateProducts($id,$product_name,$product_category,$product_gender,$product_quantity,$product_price,$product_final_price,$product_image,$status){
			$sql = "Update products SET product_name='$product_name',product_category='$product_category',product_gender='$product_gender',product_quantity='$product_quantity',product_price='$product_price',product_final_price='$product_final_price',product_image='$product_image',status='$status' WHERE id=$id";
			$db = new DAL();
		
			$rows=$db->ExecuteQuery($sql);
		
			return $rows;
		}


		public function deactivateproduct($id,$status){
			$sql = "Update products SET status='$status' WHERE id=$id";
			$db = new DAL();
		
			$rows=$db->ExecuteQuery($sql);
		
			return $rows;
		} 


		public function FilterTheTable($selected,$value){
			$sql="select * from products where $selected='$value' ORDER BY id DESC";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}
		public function GetCategories(){
			$sql="select * from categories ORDER BY cat_id ASC";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}

	}

?>