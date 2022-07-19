<?php

	require_once('../class/patient_dashboard.class.php');
	$dashboard= new dashboard();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		case 1:
           {
               $patient_id=$_GET['id'];
          $patient_id =$dashboard->getpatient_id($patient_id);
             
            $result = $dashboard->GetAppointment($patient_id);

           }

		default:
		
			break;
	}	
	
	echo json_encode($result);
	

?>