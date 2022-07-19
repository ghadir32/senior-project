
<?php

require_once('../../DAL/DAL.class.php');

 class Admin_patients
 {
	function getAllPatients($column,$showNumber)
	{	
		$sql="select * from patients order by $column limit $showNumber";
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	function getPatients($val)//search users
	{
		$sql="select * from patients ";
		if($val!=""){
			$where="where first_name like'$val%'";
			$sql.=$where;
		}
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;		
	}
	function getPatientByID($id)
	{
		$sql="select * from patients where patient_id=$id";		
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
		
	}

	function updateUser($id)
	{		
		$sql="update users set status='0' where user_id=$id";
		$db= new DAL();
		$rows= $db->getData($sql);
		if(is_null($rows))
		return 1;
			else{
				
				return -1;

			}
		
	}
 }

?>
