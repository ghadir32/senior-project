
<?php

require_once('../../DAL/DAL.class.php');

 class patient_view_profile
 {

	public function getpatientinformation($patient_id)
	{
		$sql="SELECT CONCAT(CONCAT(patients.p_first_name , ' '),CONCAT(patients.p_middle_name , ' '),patients.p_last_name) AS patients_full_name,p_age,p_gender,nb_of_family,
		employed_or_not,location,description,p_phone_number,patient_image,description, student_or_not,history, city, emergency_nb, marital_status,users.email FROM patients INNER JOIN users ON p_user_id=users.user_id WHERE patient_id='$patient_id';";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

    
    public function getDrpatients($doctor_id)
	{
		// $sql="SELECT patients.patient_id, CONCAT(patients.p_first_name, ' ', patients.p_middle_name, ' ', patients.p_last_name) AS patientName FROM patients INNER JOIN appointments on patients.patient_id = appointments.patient_id WHERE appointments.doctor_id=$doctor_id GROUP by patients.p_first_name;";
		$sql="SELECT patients.patient_id, CONCAT(patients.p_first_name, ' ', patients.p_middle_name, ' ', patients.p_last_name) AS patientName FROM patients INNER JOIN appointments on patients.patient_id = appointments.patient_id inner join doctors on doctors.user_id  = $doctor_id WHERE appointments.doctor_id=doctors.doctor_id GROUP by patients.p_first_name;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function getpatientPrevApp($patient_id, $doc_id)
	{

		// $sql="SELECT date from appointments where doctor_id=$doc_id and patient_id=$patient_id;";
		$sql="SELECT date from appointments inner join doctors on appointments.doctor_id = doctors.doctor_id and doctors.user_id = $doc_id where appointments.doctor_id=doctors.doctor_id and appointments.patient_id=$patient_id;";

		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function getAppDateAndNotes($patient_id, $doc_id, $date)
	{
		if($date == '1111-11-11'){
			$sql="SELECT app_id, date, notes from appointments inner join doctors on appointments.doctor_id = doctors.doctor_id and doctors.user_id = $doc_id WHERE appointments.doctor_id=doctors.doctor_id and appointments.patient_id=$patient_id ORDER BY app_id DESC LIMIT 1;";

		}else{
        //    $sql="SELECT date,end_time, notes from appointments where doctor_id=$doc_id and patient_id=$patient_id and date='$date';";
		$sql="SELECT app_id, date, notes from appointments inner join doctors on appointments.doctor_id = doctors.doctor_id and doctors.user_id = $doc_id WHERE appointments.doctor_id=doctors.doctor_id and appointments.patient_id=$patient_id  and date='$date';";
   
		}
		$db= new DAL();
		
		$rows= $db->getData($sql);
		
		return $rows;	
	}

	public function addDrNotes($patient_id, $doc_id, $DcNotes, $sessdate)
	{

		// $sql="UPDATE appointments SET notes = '$DcNotes' WHERE doctor_id = '$doc_id' and patient_id=$patient_id and date='$sessdate';";
		$sql="UPDATE appointments inner join doctors on appointments.doctor_id = doctors.doctor_id SET notes =  $DcNotes WHERE doctors.user_id =$doc_id and patient_id=$patient_id and date='$sessdate'; ";

		$db= new DAL();
		
		$rows= $db->ExecuteQuery($sql);
		
		return $rows;	
	}
	
 
 }
?>
