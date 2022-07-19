<?php

require_once('../../DAL/DAL.class.php');

 class formFilling
 {

	public function formFillingg($Pid, $fname, $mname, $lname, $age, $gender,  $famNb, $employmentStatus , $PAddress,   $referralreason,  $phonenb ,
    $StudentStatus, $PHistory , $Pcity, $emergencyphone,    $maritalStatus)
	{
		$sql="INSERT INTO patients (`patient_id`, `p_user_id`, `p_first_name`, `p_middle_name`, `p_last_name`, `p_age`, `p_gender`, `nb_of_family`, `employed_or_not`, `location`, `description`, `p_phone_number`, `patient_image`, `stutent_or_not`, `history`, `city`, `emergency_nb`, `matirial_status`)
							 VALUES('','$Pid','$fname','$mname','$lname','$age','$gender','$famNb','$employmentStatus','$PAddress','$referralreason','$phonenb','R.png','$StudentStatus','$PHistory','$Pcity','$emergencyphone','$maritalStatus')";

		$db= new DAL();
		
		$rows= $db->ExecuteQuery($sql);
		
		return $rows;	
	}

 
	 

 }

?>
