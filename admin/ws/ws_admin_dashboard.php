<?php

	require_once('../class/admin_dashboard.class.php');
	$dashboard= new Admin_dashboard();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		case 1:
			$Startdate=$_GET['Startdate'];
			$Enddate=$_GET['Enddate'];
			$result=$dashboard-> TotalByDateAppointments($Startdate,$Enddate);

			break;
		//total patients
		case 2:
			$result=$dashboard-> Totalpatients();

			break;
		case 3:
			$showNumber=$_GET['showNumber'];
			$today_date=$_GET['today_date'];
			$colum=$_GET['colum'];
			$result=$dashboard-> TodayAppointments($today_date,$showNumber,$colum);

			break;


		// table info
		case 4:
			$today_date=$_GET['today_date'];
			$result=$dashboard-> tableInfo($today_date);
			break;

		case 5:
			$id=$_GET['id'];

			$result=$dashboard->EditTime($id);

			break;
		case 6:
			$id=$_GET['id'];
			$starttime=$_GET['starttime'];
			$endtime=$_GET['endtime'];
			$result=$dashboard->UpdateTime($id,$starttime,$endtime);

			break;
		case 7:
			$id=$_GET['id'];
			$status=$_GET['status'];

			$result=$dashboard->DeactivateAppointment($id,$status);

			break;


		//doctor schedule time available sessions
		case 15 :
			$doctor_id=$_GET['doctor_id'];
			$date=$_GET['date'];




			$duration=$dashboard->Getdoctorduration($doctor_id);

			
			
			$duration = $duration[0]['session_duration'];


			$taken =$dashboard->getdoctorSessionTaken($doctor_id,$date);

			$schedule=$dashboard->getdoctorSchedueltime($doctor_id,$date);


			$starttime=$schedule[0]['start_time'] ;
			$endtime=$schedule[0]['end_time'];
		

			$result = $dashboard->SplitTime("$starttime", "$endtime", "$duration");

			
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

