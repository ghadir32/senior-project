
<?php

require_once('../../DAL/DAL.class.php');

 class doctor_view_profile
 {

	public function getdoctorinformation($doctor_id)
	{
		$sql="SELECT CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,Phone_number,professional_statement,job_title,education,experience,doctor_age,doctor_gender,doctor_image,guild_number,Phone_number,users.email,center_rules.dr_type,about_yourself FROM doctors INNER JOIN users ON doctors.user_id=users.user_id INNER JOIN center_rules ON doctors.dr_type=center_rules.id WHERE doctors.doctor_id=$doctor_id;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
		public function getdoctorspecialities($doctor_id)
	{
		$sql="SELECT dr_speciality.spec_name FROM dr_speciality INNER JOIN dr_has_speciality ON dr_speciality.spec_id=dr_has_speciality.spec_id INNER JOIN doctors ON dr_has_speciality.dr_id='$doctor_id' GROUP by dr_speciality.spec_id;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
 }

?>
