<?php

  require_once('../class/view_patient_profile.class.php');

  $settings = new doctor_view_profile();
  $op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

    switch($op){
        case 1:
            $patient_id = $_GET['patient_id'];
            $result = $settings->getpatientinformation($patient_id);
            break;
        default:

            break;







    }



    header("Content-type:application/json");
	echo json_encode($result);


?>
