<?php

  require_once('../class/admin_settings.class.php');

  $settings = new settings();
  $op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

    switch($op){


        //get all Account info
        case 1:
            $result = $settings->getAccSettings();
        break;

        //get price and duration
        case 2:
            $dr_type = $_GET['dr_type'];
            $result = $settings->getcenterSettings($dr_type);
        break;


        //update price and duration
        case 3:
            $dr_type = $_GET['dr_type'];
            $datatype = $_GET['dataType'];
            $datavalue = $_GET['dataValue'];
            $result = $settings->UpdatecenterSettings($dr_type,$datatype,$datavalue);
        break;

        //update username and email
         case 4:
            $datatype = $_GET['datatype'];
            $datavalue = $_GET['datavalue'];
            $result = $settings->UpdateAccountSettings($datatype,$datavalue);
        break;

        //verify pass and update it
        case 5:
            $email = $_GET['email'];
            $OldPass = $_GET['OldPass'];
            $newPass = $_GET['newPass'];
           $verification=$settings->verifyEmailPassword($email,$OldPass);

           if($verification==1){
              $result= $settings->UpdatePassAccountSettings($newPass);
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
