
<?php

require_once('../../DAL/DAL.class.php');

 class Admin_doctors
 {
	function getAllActiveDoctors()
	{
		$sql="select doctor_id,doctors.first_name,doctors.last_name,doctors.doctor_image,center_rules.dr_type,users.user_id  from doctors inner join users,center_rules WHERE doctors.user_id=users.user_id and doctors.dr_type=center_rules.id and users.status=1 order by doctor_id desc;";
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	function getAllInactiveDoctors()
	{
		$sql="select doctor_id,doctors.first_name,doctors.last_name,doctors.doctor_image,center_rules.dr_type,users.user_id  from doctors inner join users,center_rules WHERE doctors.user_id=users.user_id and doctors.dr_type=center_rules.id and users.status=0 order by doctor_id desc;";
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	function getDoctors($val)//search users
	{
		$sql="select * from doctors ";
		if($val!=""){
			$where="where first_name like'$val%'";
			$sql.=$where;
		}
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;		
	}
	function getDoctorByID($id)
	{
		$sql="select * from doctors where doctor_id=$id";		
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
		
	}

	function deactivateUser($id)
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
	function reactivateUser($id)
	{		
		$sql="update users set status='1' where user_id=$id";
		$db= new DAL();
		$rows= $db->getData($sql);
		if(is_null($rows))
		return 1;
			else{
				
				return -1;

			}
		
	}
	function checkBeforAddDr($uname){
		try{
			$sql="select * from users where username='$uname' ";			
			$db= new DAL();	
			$rows= $db->getData($sql);
			
			if(is_null($rows))
				return 0;//it's ok, no shuch username exists
			else
				return 1;//a user already have this uname in the DB
		}
		catch(Exception $ex)
		{
			throw $ex;
		}
	}

	function addDr($uName,$uPass){
		try{
			if(!$this->checkBeforAddDr($uName))
			{
				$uPass =password_hash($uPass,PASSWORD_DEFAULT);
				
				$sql="Insert into users (username,password,user_type,status,email) values ('$uName','$uPass','doctor','1','')";
				$db= new DAL();	
				$rows= $db->ExecuteQuery($sql);
				
				if(!is_null($rows))
					return 1;
			}
			else
				return $data="Doctor's username already exists";
		}catch(Exception $ex)
		{
			throw $ex;
		}
	
		}

	function addDrtoTable($name,$lname,$type,$uid)
	{
		try{
		

				$sql="Insert into doctors (first_name,last_name,user_id,Phone_number,dr_type,professional_statement,job_title,about_yourself,education,experience,doctor_age,doctor_gender,guild_number,doctor_image,start_date,end_date,status) values ('$name','$lname','$uid',000,'$type','','','','','','0','',0,'R.png',Null,Null,0)"				;

				$db= new DAL();	
				$rows= $db->ExecuteQuery($sql);

				if(!is_null($rows))
					return 1;
		}catch(Exception $ex)
		{
			throw $ex;
		}
	
	}

	function getLastUserId(){
		$sql="SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1";
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

 }
 ?>
