<?php

	require_once('../class/admin_appointments.class.php');
	$appointments= new admin_appointments();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		case 3:
			$showNumber=$_GET['showNumber'];
			$colum=$_GET['colum'];

			$getdatetoday= $_GET['datetoday'];

			if(isset($_GET['filterdate'])){
				$filterdate=$_GET['filterdate'];
				$filterdate = "AND appointments.date='$filterdate'";
				if($_GET['filterdate']==""){
					$filterdate="AND appointments.date>='$getdatetoday'";
				}
			}
			else {
			$filterdate="AND appointments.date>='$getdatetoday'";
			}


			
			$result=$appointments-> Appointments($showNumber,$colum,$filterdate);
			break;


		// table info
		case 4:  
			$getdatetoday= $_GET['datetoday'];
			if(isset($_GET['filterdateinfo'])){
				$filterdateinfo=$_GET['filterdateinfo'];
				$filterdateinfo = "WHERE appointments.date='$filterdateinfo'";
				if($_GET['filterdateinfo']==""){
					$filterdateinfo="WHERE appointments.date>='$getdatetoday'";
				}
			}
			else {
			$filterdateinfo="WHERE appointments.date>='$getdatetoday'";
			}
			$result=$appointments-> tableInfo($filterdateinfo);
			break;

		case 5:
			$id=$_GET['id'];
			$result=$appointments->Edit($id);

			break;
		case 6:
			$id=$_GET['id'];
			$date=$_GET['date'];
			$starttime=$_GET['starttime'];
			$endtime=$_GET['endtime'];
			$result=$appointments->Update($id,$date,$starttime,$endtime);

			break;
		case 7:
			$id=$_GET['id'];
			$status=$_GET['status'];

			$result=$appointments->DeactivateAppointment($id,$status);

			break;
		case 8:
			$date=$_GET['date'];
			$result=$appointments->GetDoctors($date);

			break;
		case 9:
			$result=$appointments->GetPatients();

			break;
			//add Appointments
		case 10:
			$selectdoctor=$_GET['selectdoctor'];
			$selectpatient=$_GET['selectpatient'];
			$appointment_date=$_GET['appointment_date'];
			$appointment_start_time=$_GET['appointment_start_time'];
			$appointment_end_time=$_GET['appointment_end_time'];
			$sattus_paid=$_GET['sattus_paid'];

			if ($sattus_paid == '1'){
				$rowa=$appointments->paymentinfo($selectdoctor);


				$app_id =  $rowa[0]['app_id'];

				$pay_amount=$rowa[0]['session_price'];
				$result=$appointments->AddAppointment($selectdoctor, $selectpatient, $appointment_date, $appointment_start_time, $appointment_end_time);
				$result=$appointments->Addpayment($app_id,$pay_amount);
				
			}
			else {
				$result=$appointments->AddAppointment($selectdoctor, $selectpatient, $appointment_date, $appointment_start_time, $appointment_end_time);
			}
			break;
		//get session duration
		case 11:
			$doctor_id=$_GET['doctor_id'];
			$result=$appointments->Getdoctorduration($doctor_id);

			break;

			//doctor schedule date
		case 12:
			$doctor_id=$_GET['doctor_id'];
			$date=$_GET['date'];
			$result=$appointments->getdoctorSchedueldate($doctor_id,$date);

			break;
		//doctor schedule time available sessions
		case 15 :

			$doctor_id=$_GET['doctor_id'];
			$date=$_GET['date'];

			$duration=$appointments->Getdoctorduration($doctor_id);

			
			
			$duration = $duration[0]['session_duration'];


			$taken =$appointments->getdoctorSessionTaken($doctor_id,$date);

			$schedule=$appointments->getdoctorSchedueltime($doctor_id,$date);


			$starttime=$schedule[0]['start_time'] ;
			$endtime=$schedule[0]['end_time'];
		

			$result = $appointments->SplitTime("$starttime", "$endtime", "$duration");

			
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
		default:
		
			break;
	}	
	echo json_encode($result);

?>

