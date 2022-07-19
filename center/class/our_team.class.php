
<?php

require_once('../../DAL/DAL.class.php');

 class ourteam
 {
 
	public function GetPsychologe()
	{
		$sql="SELECT doctors.doctor_id,CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,doctors.doctor_image FROM doctors INNER JOIN users WHERE users.user_id=doctors.user_id and users.status=1 and doctors.dr_type=1;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
		public function Psychiatrist()
	{
		$sql="SELECT doctors.doctor_id,CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,doctors.doctor_image FROM doctors INNER JOIN users WHERE users.user_id=doctors.user_id and users.status=1 and doctors.dr_type=2;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

 }

?>
