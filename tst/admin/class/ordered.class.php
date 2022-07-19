<?php

	require_once('../../DAL/DAL.class.php');

	class ordered{
	

		public function AllOrderes(){
			$sql="SELECT ordered.id,customers.username,ordered.customer_id,customers.email,customers.phone_number,customers.address,ordered.status,DATE_FORMAT(ordered.date_time,'%W %e %M 20%y, %h:%i:%s') as date_time FROM ordered,customers WHERE ordered.customer_id=customers.id ORDER BY ordered.id DESC;";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}
		public function FilterTheTable($selected){
			$sql="SELECT ordered.id,customers.username,customers.email,customers.phone_number,customers.address,ordered.status,DATE_FORMAT(ordered.date_time,'%W %e %M 20%y, %h:%i:%s') as date_time FROM ordered,customers WHERE (ordered.customer_id=customers.id AND ordered.status = '$selected') ORDER BY date_time DESC;";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}

		public function deleteAllActions(){
			$sql="Delete FROM `ordered`";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}
	}

?>