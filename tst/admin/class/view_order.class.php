<?php

	require_once('../../DAL/DAL.class.php');

	class order{
	

		public function AllProductsOrdered($order_id){
			$sql="SELECT ordered_details.product_id,products.product_name,products.product_category,products.product_image,products.product_final_price,ordered_details.product_quantity,products.product_gender,DATE_FORMAT(ordered.date_time,'%W %e %M 20%y, %h:%i:%s') as date_time,ordered.status FROM ordered_details,products,ordered WHERE (ordered_details.ordered_id=$order_id and products.id=ordered_details.product_id and ordered_details.ordered_id=ordered.id) GROUP by ordered_details.product_id;";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}
		public function customerinfo($customer_id){
			$sql="SELECT * from customers WHERE id=$customer_id";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}
		public function acceptorder($status,$order_id){
			$sql="Update ordered SET status='$status' WHERE ordered.id=$order_id";
			$db = new DAL();
		
			$rows=$db->ExecuteQuery($sql);
		
			return $rows;
		}
		public function getproductquantity(){
			$sql="SELECT ordered.product_id,ordered.product_quantity FROM ordered WHERE ordered.status='1';";
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}

		public function SubstructQuantity($product_id,$product_quantity){
			$db = new DAL();

			$sql="update products SET product_quantity= product_quantity -'$product_quantity' WHERE products.id=$product_id";
			
		
			$rows=$db->ExecuteQuery($sql);
		
			return $rows;
		}
	}

?>