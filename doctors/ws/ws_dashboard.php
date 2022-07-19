<?php

	require_once('../class/dashboard.class.php');
	$dashboard= new Dr_dashboard();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		case 1:
            $dc_id=$_GET['id'];
			$Startdate=$_GET['Startdate'];
			$Enddate=$_GET['Enddate'];
			$result=$dashboard-> TotalByDateAppointments($dc_id,$Startdate,$Enddate);

			break;
		// total patients
		case 2:
            $dc_id=$_GET['id'];
			$result=$dashboard-> Totalpatients($dc_id);

			break;

			case 3:
				$dc_id=$_GET['id'];
				$date=$_GET['date'];
				$result=$dashboard-> getPatiensList($dc_id, $date);
	
				break;
		// case 3:
		// 	$showNumber=$_GET['showNumber'];
		// 	$today_date=$_GET['today_date'];
		// 	$colum=$_GET['colum'];
		// 	$result=$dashboard-> TodayAppointments($today_date,$showNumber,$colum);
		// 	break;


		// // table info
		// case 4:
		// 	$today_date=$_GET['today_date'];
		// 	$result=$dashboard-> tableInfo($today_date);
		// 	break;

		// case 5:
		// 	$id=$_GET['id'];

		// 	$result=$dashboard->EditTime($id);

		// 	break;
		// case 6:
		// 	$id=$_GET['id'];
		// 	$starttime=$_GET['starttime'];
		// 	$endtime=$_GET['endtime'];
		// 	$result=$dashboard->UpdateTime($id,$starttime,$endtime);

		// 	break;
		// case 7:
		// 	$id=$_GET['id'];
		// 	$status=$_GET['status'];

		// 	$result=$dashboard->DeactivateAppointment($id,$status);

		// 	break;

		default:
		
			break;
	}	
	
	echo json_encode($result);
	

?>

