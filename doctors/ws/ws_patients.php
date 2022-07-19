<?php

  require_once('../class/patients.class.php');

  $settings = new patient_view_profile();
  $op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

    switch($op){
        case 1:
            $patient_id = $_GET['patient_id'];
            $result = $settings->getpatientinformation($patient_id);
            break;

         case 2:
            $doctor_id = $_GET['doctor_id'];
            $result = $settings->getDrpatients($doctor_id);
            break;

     case 3:
         $doctor_id = $_GET['doc_id'];
         $patient_id = $_GET['patient_id'];
         $result = $settings->getpatientPrevApp($patient_id, $doctor_id);
         break;

         case 4:
            $doctor_id = $_GET['doc_id'];
            $patient_id = $_GET['patient_id'];
            $sendDate = $_GET['sendDate'];
            $result = $settings->getAppDateAndNotes($patient_id, $doctor_id, $sendDate);
            break;

            case 5:
                $doctor_id = $_GET['doc_id'];
                $patient_id = $_GET['patient_id'];
                $DrNote = $_GET['DrNote'];
                $sessdate = $_GET['sessdate'];
                $result = $settings->addDrNotes($patient_id, $doctor_id, $DrNote, $sessdate);
                break;

        default:

            break;

    }

    header("Content-type:application/json");
	echo json_encode($result);


?>
