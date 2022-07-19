<?php
  require_once('../../DAL/DAL.class.php');

  class dashboard{

    public function GetAppointment($patient_id)
    {
        
        $sql = "SELECT CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,appointments.date,appointments.start_time,appointments.end_time,payments.pay_amount FROM appointments INNER JOIN doctors,payments WHERE appointments.doctor_id=doctors.doctor_id and payments.pay_app_id=appointments.app_id AND  appointments.patient_id = '$patient_id' ORDER BY `date`  DESc;";

        $db= new DAL();
		$rows= $db->getData($sql);
        

		return $rows;	
    }
    	public function getpatient_id($user_id)
	{
		$sql="SELECT patient_id FROM `patients` WHERE p_user_id=$user_id";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows[0]['patient_id'];	
	}
}