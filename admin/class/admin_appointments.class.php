
<?php

require_once('../../DAL/DAL.class.php');

 class admin_appointments
 {
  
		public function Appointments($showNumber,$colum,$filterdate)
	{
		$sql="SELECT appointments.app_id,doctors.doctor_id ,patients.patient_id, CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,CONCAT(CONCAT(patients.p_first_name , ' '),CONCAT(patients.p_middle_name , ' '),patients.p_last_name) AS patients_full_name,TIME_FORMAT(appointments.start_time,'%h:%i %p')as start_time,TIME_FORMAT(appointments.end_time,'%h:%i %p')as end_time,DATE_FORMAT(appointments.date,'%Y-%m-%d %W') as date,appointments.status FROm appointments INNER JOIN doctors INNER JOIN patients WHERE appointments.doctor_id=doctors.doctor_id AND appointments.patient_id=patients.patient_id $filterdate ORDER BY $colum Limit $showNumber;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	public function Update($id,$date,$starttime,$endtime)
	{
		$sql="UPDATE appointments SET appointments.date='$date', appointments.start_time='$starttime', appointments.end_time ='$endtime'  WHERE appointments.app_id = $id;";

		$db= new DAL();
		
		$rows= $db->ExecuteQuery($sql);
		
		return $rows;	
	}
	public function Edit($id)
	{
		$sql="SELECT appointments.app_id,TIME_FORMAT(appointments.start_time,'%h:%i %p')as start_time,TIME_FORMAT(appointments.end_time,'%h:%i %p')as end_time,date FROM `appointments` WHERE appointments.app_id=$id";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function tableInfo($filterdateinfo)
	{
		$sql="SELECT COUNT(*) AS total_app FROM `appointments` $filterdateinfo";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	} 
    public function DeactivateAppointment($id,$status)
	{
		$sql="UPDATE appointments SET appointments.status='$status'WHERE appointments.app_id = $id;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	public function GetDoctors($date)
	{
		$sql="SELECT doctor_id,CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,dr_type FROM doctors JOIN doctors_schedule on doctors_schedule.d_s_id=doctors.doctor_id AND doctors_schedule.date>='$date' GROUP by doctor_full_name ORDER BY doctor_full_name ASC;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	public function GetPatients()
	{
		$sql="SELECT patient_id,CONCAT(CONCAT(patients.p_first_name , ' '),CONCAT(patients.p_middle_name , ' '),patients.p_last_name) AS patient_full_name FROM patients ORDER BY patient_full_name ASC;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	public function AddAppointment($selectdoctor, $selectpatient, $appointment_date, $appointment_start_time, $appointment_end_time)
	{
		$sql="INSERT INTO `appointments`(`patient_id`, `doctor_id`, `date`, `start_time`, `end_time`, `status`) VALUES
				('$selectpatient','$selectdoctor','$appointment_date','$appointment_start_time','$appointment_end_time','1')";

		$db= new DAL();
		
		$rows= $db->ExecuteQuery($sql);

		


		return $rows;	
	}
	public function Addpayment($app_id,$pay_amount)
	{
		$sql="INSERT INTO `payments`( `pay_app_id`, `pay_amount`, `pay_time`,`pay_method`) VALUES ('$app_id','$pay_amount',CURRENT_TIME,'Cash');";

		$db= new DAL();
		
		$rows= $db->ExecuteQuery($sql);
		
		return $rows;	
	}
	public function paymentinfo($selectdoctor)
	{
		$sql="SELECT MAX(appointments.app_id+1) as app_id,session_price FROM appointments,`center_rules` INNER JOIN doctors on center_rules.id = doctors.dr_type AND doctors.doctor_id=$selectdoctor;";

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

 }

?>
