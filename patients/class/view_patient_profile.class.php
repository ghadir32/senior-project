
<?php

require_once('../../DAL/DAL.class.php');

 class doctor_view_profile
 {

	public function getpatientinformation($patient_id)
	{
		$sql="SELECT CONCAT(CONCAT(patients.p_first_name , ' '),CONCAT(patients.p_middle_name , ' '),patients.p_last_name) AS patients_full_name,p_age,p_gender,nb_of_family,patient_image,employed_or_not,location,description,p_phone_number,users.email FROM patients INNER JOIN users ON p_user_id=users.user_id WHERE patient_id='$patient_id';";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

 }

?>
