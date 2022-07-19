
<?php

require_once('../../DAL/DAL.class.php');

 class Admin_dashboard
 {

	public function TotalByDateAppointments($Startdate,$Enddate)
	{
		$sql="SELECT COUNT(*) as total_app FROM `appointments` WHERE date <='$Startdate' and date >= '$Enddate'";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function Totalpatients()
	{
		$sql="SELECT COUNT(*) as total_patients FROM `patients`";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}  
		public function TodayAppointments($today_date,$showNumber,$colum)
	{
		$sql="SELECT appointments.app_id,doctors.doctor_id ,patients.patient_id, CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name, CONCAT(CONCAT(patients.p_first_name , ' '),CONCAT(patients.p_middle_name , ' '),patients.p_last_name) AS patients_full_name,TIME_FORMAT(appointments.start_time,'%h:%i %p')as start_time,TIME_FORMAT(appointments.end_time,'%h:%i %p')as end_time,DATE_FORMAT(appointments.date,'%W %d-%m-%Y') as app_date,appointments.status FROm appointments INNER JOIN doctors INNER JOIN patients WHERE appointments.doctor_id=doctors.doctor_id AND appointments.patient_id=patients.patient_id AND appointments.date='$today_date' ORDER BY $colum Limit $showNumber;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	public function UpdateTime($id,$starttime,$endtime)
	{
		$sql="UPDATE appointments SET appointments.start_time='$starttime', appointments.end_time ='$endtime'  WHERE appointments.app_id = $id;";

		$db= new DAL();
		
		$rows= $db->ExecuteQuery($sql);
		
		return $rows;	
	}
	public function EditTime($id)
	{
		$sql="SELECT * FROM `appointments` WHERE appointments.app_id=$id";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function tableInfo($today_date)
	{
		$sql="SELECT COUNT(*) AS total_app FROM `appointments` WHERE date='$today_date';";

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
		public function getdoctorSchedueltime($doctor_id,$date)
	{
		$sql="SELECT TIME_FORMAT(doctors_schedule.start_time,'%H:%i')as start_time,TIME_FORMAT(doctors_schedule.end_time,'%H:%i')as end_time FROM `doctors_schedule` WHERE d_s_id='$doctor_id' AND date='$date' AND status=1;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	public function getdoctorSessionTaken($doctor_id,$date)
	{
		$sql="SELECT app_id,TIME_FORMAT(start_time,'%H:%i')as start_time,TIME_FORMAT(end_time,'%H:%i')as end_time FROM `appointments` WHERE doctor_id=$doctor_id AND date='$date';";

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
