<?php

require_once('../../DAL/DAL.class.php');

   class customer{

    public function getAllCustomers()
	{
		
		$sql="Select * from customers where user_type = 'customer' ORDER BY username ASC;";
		
		$db = new DAL();
		
		$rows=$db->getData($sql);
		
		return $rows;
	}

    public function deleteCustomer($id){
        $sql = "delete  from customers where id=$id";
        $db = new DAL();
        $rows = $db->ExecuteQuery($sql);
        return $rows;

    }

    public function addCustomer($username, $email, $password, $address,  $status){
        $sql = "insert into customers (id, username, email, password, address, status) values('', '$username', '$email', '$password', '$address', '$status')";
        $db = new DAL();
        $rows = $db->ExecuteQuery($sql);
        return $rows;
    }

    public function searchUser($uname){
        $sql = "Select  *  from customers where username='$uname'";
        $db = new DAL();
        $rows = $db->getData($sql);

          return $rows;
    }

    public function getUserByGender($gender){
        $sql = "Select  *  from customers where gender='$gender'";
        $db = new DAL();
        $rows = $db->getData($sql);

          return $rows;
    }

    public function deactivateUser($id){
        $sql = "update customers set status='0' where id=$id";
        $db = new DAL();
        $rows = $db->getData($sql);

          return $rows;
    }

    public function activateUser($id){
        $sql = "update customers set status='1' where id=$id";
        $db = new DAL();
        $rows = $db->getData($sql);

          return $rows;
    }




   }


?>
