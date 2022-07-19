
<?php

require_once('../../DAL/DAL.class.php');

 class admin_payments
 {
  
	public function payments($showNumber,$colum,$filterdate)
	{
		$sql="SELECT payments.pay_id,payments.pay_app_id,payments.pay_date,payments.pay_time,payments.pay_amount,payments.pay_method,appointments.date as app_date,appointments.start_time as app_time, CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,CONCAT(CONCAT(patients.p_first_name , ' '),CONCAT(patients.p_middle_name , ' '),patients.p_last_name) AS patients_full_name,appointments.doctor_id,appointments.patient_id FROM payments INNER JOIN appointments,doctors,patients WHERE payments.pay_app_id = appointments.app_id AND appointments.doctor_id=doctors.doctor_id AND appointments.patient_id=patients.patient_id $filterdate ORDER BY $colum Limit $showNumber;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	
	public function tableInfo($filterdateinfo)
	{
		$sql="SELECT COUNT(*) AS total_app FROM `payments` $filterdateinfo";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
	public function CheckIfAppHasPayment($app_number)
	{
		$sql="SELECT * FROM `payments` WHERE pay_app_id = $app_number";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
		public function CheckIfAppInDB($app_number)
	{
		$sql="SELECT * FROM appointments WHERE app_id = $app_number";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}


	public function Addpayment($app_id,$pay_amount)
	{
		$sql="INSERT INTO `payments`( `pay_app_id`, `pay_amount`, `pay_time`,`pay_method`) VALUES ('$app_id','$pay_amount',CURRENT_TIME,'Cash');";

		$db= new DAL();
		
		$rows= $db->ExecuteQuery($sql);
		
		return $rows;	
	}
		public function paymentinfo($app_id)
	{
		$sql="SELECT session_price FROM center_rules INNER JOIN doctors ON center_rules.id=doctors.dr_type INNER JOIN appointments on appointments.doctor_id=doctors.doctor_id AND appointments.app_id=$app_id;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function invoiceinformation($pay_id)
	{
		$sql="SELECT payments.pay_id,payments.pay_app_id,payments.pay_date,payments.pay_time,payments.pay_amount,payments.pay_method,appointments.date as app_date,appointments.start_time as app_time, CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name,CONCAT(CONCAT(patients.p_first_name , ' '),CONCAT(patients.p_middle_name , ' '),patients.p_last_name) AS patients_full_name,patients.p_age,users.email,patients.location,patients.p_phone_number,appointments.doctor_id,appointments.patient_id FROM payments INNER JOIN appointments,doctors,patients,users WHERE payments.pay_app_id = appointments.app_id AND appointments.doctor_id=doctors.doctor_id AND appointments.patient_id=patients.patient_id AND patients.p_user_id=users.user_id AND payments.pay_id=$pay_id;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}
 }

?>
