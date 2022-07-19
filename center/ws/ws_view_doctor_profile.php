<?php

  require_once('../class/view_doctor_profile.class.php');

  $settings = new doctor_view_profile();
  $op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

    switch($op){
        case 1:
            $doctor_id = $_GET['doctor_id'];
            $result = $settings->getdoctorinformation($doctor_id);
            break;
         case 2:
            $doctor_id = $_GET['doctor_id'];
            $result = $settings->getdoctorspecialities($doctor_id);
            break;
        default:

            break;







    }



    header("Content-type:application/json");
	echo json_encode($result);


?>
