<?php

	require_once('../../DAL/DAL.class.php');

	class login{
	

		public function actions(){
			$sql="select * from logins_registers ORDER BY id DESC";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}
		public function FilterTheTable($selected){
			$sql="SELECT * FROM `logins_registers` WHERE action_status = '$selected' ORDER BY id DESC";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}
		public function deleteAllActions(){
			$sql="Delete FROM `logins_registers`";
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
		
			return $rows;
		}
		public function deleteActionById($id){
			$sql="delete from `logins_registers` where id=$id";

			$db = new DAL();
			$rows=$db->ExecuteQuery($sql);
		
			return $rows;
		}

	}

?>