
<?php

require_once('../../DAL/DAL.class.php');

 class Admin_Categories
 {
	 public function GetallCat($name)
	{
		$sql="Select * from categories order by cat_id ASC";
		
		if (!$name=="")
		{
			$sql.= " where cat_name like '%$name%'";
		}
		
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	 public function GetCatbystatus($status)
	{
		$sql="Select * from categories where cat_status like '%$status%'";
		
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	 
	 public function AddCat($image,$name,$status)	
	{
		$sql="INSERT INTO `categories` (`cat_image`, `cat_name`, `cat_status`) VALUES ('$image', '$name', '$status');";
		
		$db = new DAL();
		
		$rows = $db->ExecuteQuery($sql); 
		
	//	$rows=$db->getData($sql);
		
		return $rows;
	}
	 
	 public function EditCat($row_id,$image,$name)//,$status)
	 {
		 $sql="UPDATE `categories` SET `cat_image` = '$image',  `cat_name` = '$name' WHERE `categories`.`cat_id` = $row_id";
		 
		 $db = new DAL();
		 
		 $rows = $db->ExecuteQuery($sql);
		 
		 return $rows;
	 }
	 public function deactivateCatbyid($row_id,$dstatus)
	 {
      $sql="UPDATE `categories` SET `cat_status` = $dstatus WHERE `categories`.`cat_id` = $row_id";
		
		$db = new DAL();
		
		 $rows=$db->getData($sql);
		
		return $rows;
	 }
	 
	 public function deleteCatbyid($row_id)
	 {
      $sql="DELETE FROM `categories` WHERE `categories`.`cat_id` = $row_id";
		
		$db = new DAL();
		
		 $rows=$db->getData($sql);
		
		return $rows;
	 }
	 public function CheckIfCategoryHasItems($catname)
	 {
		$sql="Select * from `products` where `products`.`product_category`= $catname";
		
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		if(!empty($rows))
			return 1;
		else
			return 0;
	 }
	
	
 }


?>
