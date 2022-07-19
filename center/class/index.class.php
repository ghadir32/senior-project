<?php

require_once('../../DAL/DAL.class.php');

 class homePage
 {

	public function getDrnb()
	{
		$sql="SELECT count(*)  AS countDr FROM `doctors`";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function getDrByTreatment($treatment)
	{
		$sql="SELECT concat(first_name, ' ', last_name) as Drname, doctor_id FROM doctors	INNER JOIN dr_has_speciality hass ON ( doctors.doctor_id = hass.dr_id) INNER JOIN dr_speciality spec ON ( spec.spec_id = hass.spec_id)
	    WHERE	spec.spec_name = '$treatment';";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function checkUsersData($Pid){
		$sql="SELECT * FROM patients where p_user_id= $Pid;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;
	}

	 
	public function getPatientImg($pid)
	{
		$sql="SELECT patient_image, p_first_name   FROM `patients` where p_user_id = $pid;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	 

 }

?>
