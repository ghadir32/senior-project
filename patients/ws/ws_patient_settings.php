<?php

  require_once('../class/patient_settings.class.php');

  $settings = new settings();
  $op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

    switch($op){


        //get all Account info
        case 1:
           $p_id = $_GET['patient_id'];
            $result = $settings->getAccSettings($p_id);
             break;
        case 2:
            $p_id = $_GET['patient_id'];
            $newpatient = $settings->checkIfnewPatient($p_id);

            if($newpatient){
                $result = $settings->getpatientimage($p_id);
            }/*else {
            $result="R.png";
            
            }*/
            break;
         case 3:
                $id=$_GET['patient_id'];
                $img=$_GET['img'];
                $result = $settings->changepatientImg($id, $img);
                break;

        break;

        //update username and email
         case 4:
            $p_id = $_GET['patient_id'];
            $datatype = $_GET['datatype'];
            $datavalue = $_GET['datavalue'];
            $result = $settings->UpdateAccountSettings($p_id,$datatype,$datavalue);
        break;

        //verify pass and update it
        case 5:
            $p_id = $_GET['patient_id'];
            $email = $_GET['email'];
            $OldPass = $_GET['OldPass'];
            $newPass = $_GET['newPass'];
             $verification=$settings->verifyEmailPassword($p_id,$email,$OldPass);

           if($verification==1){
              $result= $settings->UpdatePassAccountSettings($p_id,$newPass);
           }
           else {
               $result = 1;
           }


            
        break;
        default:

            break;







    }



    header("Content-type:application/json");
	echo json_encode($result);


?>
