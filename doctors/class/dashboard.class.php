<?php

require_once('../../DAL/DAL.class.php');

 class Dr_dashboard
 {

	public function TotalByDateAppointments($id,$Startdate,$Enddate)
	{
		// $sql="SELECT COUNT(*) as total_app FROM `appointments` WHERE date <='$Startdate' and date >= '$Enddate' and doctor_id=$id";
		$sql="SELECT COUNT(*) as total_app FROM `appointments`inner join doctors on appointments.doctor_id = doctors.doctor_id WHERE date <='$Startdate' and date >= '$Enddate' and doctors.user_id=$id;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function Totalpatients($id)
	{
		// $sql="SELECT  patient_id, count(*) from appointments WHERE doctor_id=$id GROUP by doctor_id, patient_id; ";
		$sql="SELECT patient_id, count(*) from appointments inner join doctors on appointments.doctor_id = doctors.doctor_id WHERE doctors.user_id=$id GROUP by appointments.doctor_id, appointments.patient_id;";


		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}  
		public function getPatiensList($dr_id, $date)
	{
		// $sql="SELECT CONCAT(patients.p_first_name, ' ', patients.p_last_name) as patients, patients.patient_id FROM patients INNER JOIN appointments
		//  ON patients.patient_id = appointments.patient_id WHERE date='$date' and doctor_id=$dr_id;";

		$sql="SELECT CONCAT(patients.p_first_name, ' ', patients.p_last_name) as patients, patients.patient_id FROM patients
		 INNER JOIN appointments ON patients.patient_id = appointments.patient_id inner join doctors on appointments.doctor_id = doctors.doctor_id WHERE 
		appointments.date='$date' and doctors.user_id = $dr_id;";


		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	 

 }

?>
