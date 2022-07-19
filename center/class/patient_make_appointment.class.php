
<?php

require_once('../../DAL/DAL.class.php');

 class patient_make_appointment
 {
  




	public function GetDoctors($date)
	{
		$sql="SELECT doctor_id,CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,dr_type FROM doctors JOIN doctors_schedule on doctors_schedule.d_s_id=doctors.doctor_id AND doctors_schedule.date>='$date' GROUP by doctor_full_name ORDER BY doctor_full_name ASC;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
		public function appointmentinfo($patient_id, $appointment_date, $appointment_start_time)
	{
		$sql="SELECT appointments.app_id as app_id FROM appointments WHERE appointments.patient_id=$patient_id AND appointments.date='$appointment_date' AND appointments.start_time='$appointment_start_time';";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}



	public function Getdoctorduration($doctor_id)
	{
		$sql="SELECT TIME_FORMAT(center_rules.session_duration,'%i')as session_duration FROM `center_rules` INNER JOIN doctors ON center_rules.id=doctors.dr_type WHERE doctors.doctor_id=$doctor_id;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
		public function getdoctorSchedueldate($doctor_id,$date)
	{
		$sql="SELECT * FROM `doctors_schedule` WHERE d_s_id='$doctor_id' AND date>='$date' AND status=1 ORDER by date;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	public function getdoctorSchedueltime($doctor_id,$date)
	{
		$sql="SELECT TIME_FORMAT(doctors_schedule.start_time,'%H:%i')as start_time,TIME_FORMAT(doctors_schedule.end_time,'%H:%i')as end_time FROM `doctors_schedule` WHERE d_s_id='$doctor_id' AND date='$date' AND status=1;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	public function getdoctorSessionTaken($doctor_id,$date)
	{
		$sql="SELECT TIME_FORMAT(start_time,'%H:%i')as start_time  FROM `appointments` WHERE doctor_id=$doctor_id AND date='$date' AND status=1";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

		public function getappointmentinfo($doctor_id)
	{
		$sql="SELECT CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,doctors.doctor_image,center_rules.session_price FROM doctors INNER JOIN center_rules ON doctors.dr_type = center_rules.id WHERE doctors.doctor_id=$doctor_id;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function verifyEmailPhone($patient_id,$email,$phone)
	{
		$sql="SELECT * FROM patients INNER JOIN users ON patients.p_user_id = users.user_id WHERE patients.p_user_id=$patient_id and users.email ='$email' AND patients.p_phone_number = $phone;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		if($rows!=0){
			return $rows;
				
		}

		else {
            return 0;
		}  
	}



		public function AddAppointment($doctor_id, $patient_id, $appointment_date, $appointment_start_time, $appointment_end_time)

	{



		$sql="INSERT INTO `appointments`(`patient_id`, `doctor_id`, `date`, `start_time`, `end_time`, `status`) VALUES
				('$patient_id','$doctor_id','$appointment_date','$appointment_start_time','$appointment_end_time','1')";

		$db= new DAL();
		
		$rows= $db->ExecuteQuery($sql);

		return $rows;	
	}
		public function Addpayment($app_id,$pay_method_type,$pay_amount)
	{
		$sql="INSERT INTO `payments`( `pay_app_id`, `pay_amount`, `pay_time`,`pay_method`) VALUES ('$app_id','$pay_amount',CURRENT_TIME,'$pay_method_type');";

		$db= new DAL();
		
		$rows= $db->ExecuteQuery($sql);
		
		return $rows;	
	}

	public function SplitTime($StartTime, $EndTime, $Duration){
		$ReturnArray = array ();// Define output
		$StartTime    = strtotime ($StartTime); //Get Timestamp
		$EndTime      = strtotime ($EndTime); //Get Timestamp

		$AddMins  = $Duration * 60;
		$EndTime = $EndTime - $AddMins;
		while ($StartTime <= $EndTime) //Run loop
		{
			$ReturnArray[] = date ("H:i", $StartTime);
			$StartTime += $AddMins; //Endtime check



		}
		return $ReturnArray;
	}
	public function getpatient_id($user_id)
	{
		$sql="SELECT patient_id FROM `patients` WHERE p_user_id=$user_id";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows[0]['patient_id'];	
	}


 }

?>
