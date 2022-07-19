<?php

	require_once('../class/availability.class.php');
	
	$availability = new availability();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
	
		 // getting dr 
        case 1:
 				//$id = mysqli_real_escape_string($conn, $_GET['id'] );
                $id=$_GET['id'];
                $date=$_GET['date'];
                $startTime=$_GET['startTime'];
                $endTime=$_GET['endTime'];

				$result = $availability->send_dr_schedule($id, $date, $startTime, $endTime);
				break;

		case 2:
				//$id = mysqli_real_escape_string($conn, $_GET['id'] );
				 $id=$_GET['id'];
				$result = $availability->get_work_dates($id);
				  break;

		 case 3:
				//$id = mysqli_real_escape_string($conn, $_GET['id'] );
				 $id=$_GET['id'];
				 $s_id = $_GET['s_id'];
				 $result = $availability->disable_date($id, $s_id);
				  break;

		 case 4:
			//$id = mysqli_real_escape_string($conn, $_GET['id'] );
			 $id=$_GET['id'];
			 $result = $availability->get_dates($id);
			  break;
			  
		  case 5:
			//$id = mysqli_real_escape_string($conn, $_GET['id'] );
			 $id=$_GET['id'];
			 $startdate=$_GET['startdate1'];
			 $enddate=$_GET['enddate1'];
			 $result = $availability->send_dates($id, $startdate, $enddate);
			  break;

			  case 6:
				//$id = mysqli_real_escape_string($conn, $_GET['id'] );
				 $id=$_GET['id'];
				 $result = $availability->getDrId($id);
				  break;
 
 
		default:
				break;
	}

   
    
	header("Content-type:application/json");
	echo json_encode($result);

?>