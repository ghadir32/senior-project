<?php

	require_once('../class/patient_make_appointment.class.php');
	$makeAppointment= new patient_make_appointment();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		case 1:
			$date=$_GET['date'];
			$result=$makeAppointment->GetDoctors($date);

			break;

		
		//get session duration
		case 2:
			$doctor_id=$_GET['doctor_id'];
			$result=$makeAppointment->Getdoctorduration($doctor_id);

			break;

			//doctor schedule date
		case 3:
			$doctor_id=$_GET['doctor_id'];
			$date=$_GET['date'];
			$result=$makeAppointment->getdoctorSchedueldate($doctor_id,$date);

			break;
		//doctor schedule time available sessions
		case 4 :

			$doctor_id=$_GET['doctor_id'];
			$date=$_GET['date'];

			$duration=$makeAppointment->Getdoctorduration($doctor_id);

			
			
			$duration = $duration[0]['session_duration'];


			$taken =$makeAppointment->getdoctorSessionTaken($doctor_id,$date);

			$schedule=$makeAppointment->getdoctorSchedueltime($doctor_id,$date);


			$starttime=$schedule[0]['start_time'] ;
			$endtime=$schedule[0]['end_time'];
		

			$result = $makeAppointment->SplitTime("$starttime", "$endtime", "$duration");

			
			if (!empty($taken) ){
				$takenlength = count($taken);
				for($i = 0 ; $i < $takenlength; $i++){
				$timetaken=$taken[$i]['start_time'] ;



					foreach($result as $value){
					

						if($timetaken == $value){

							$index =   array_search($timetaken,$result);
						

							unset($result[$index]);

						}
			
					}
				 }
			}
			$result = array_values($result);

			break;
		case 5:
			$doctor_id=$_GET['doctor_id'];
			$result=$makeAppointment->getappointmentinfo($doctor_id);

			break;
		case 6:
			$pay_method_type=$_GET['pay_method_type'];

			$patient_id=$_GET['patient_id'];
			$doctor_id=$_GET['doctor_id'];
			$appointment_date=$_GET['appointment_date'];
			$appointment_end_time=$_GET['finalTime'];
			$appointment_start_time=$_GET['appointment_start_time'];
			$pay_amount=$_GET['pay_amount'];
			$patient_id =$makeAppointment->getpatient_id($patient_id);

				$result=$makeAppointment->AddAppointment($doctor_id, $patient_id, $appointment_date, $appointment_start_time, $appointment_end_time);
				$rowa=$makeAppointment->appointmentinfo($patient_id, $appointment_date, $appointment_start_time);
				$app_id = $rowa[0]['app_id'];


				$result=$makeAppointment->Addpayment($app_id,$pay_method_type,$pay_amount);
			

			break;
		case 7:
			$email=$_GET['email'];
			$phone=$_GET['phone'];
			$patient_id=$_GET['patient_id'];
			$verify=$makeAppointment->verifyEmailPhone($patient_id,$email,$phone);
			if($verify!=0){

				$result=1;
			}
			else {
				$result = 0;
            }

			break;
		case 8:

			$patient_id=$_GET['patient_id'];
			$result=$makeAppointment->getpatient_id($patient_id);


			break;
		default:
		
			break;
	}	
	echo json_encode($result);

?>

