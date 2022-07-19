<?php

require_once('../class/formFilling.class.php');

$formFilling = new formFilling();
  $op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}


    
    switch($op){
        case 1:
            $employmentStatus = $_GET['employmentStatus'];
            $StudentStatus = $_GET['StudentStatus'];
            $phonenb = $_GET['phonenb'];
            $emergencyphone = $_GET['emergencyphone'];
            $PHistory = $_GET['PHistory'];
            $Pcity = $_GET['Pcity'];
            $PAddress = $_GET['PAddress'];
            $famNb = $_GET['famNb'];
            $referralreason = $_GET['referralreason'];
            $maritalStatus = $_GET['maritalStatus'];
            $Pid = $_GET['Pid'];
            $fname = $_GET['fname'];
            $mname = $_GET['mname'];
            $lname = $_GET['lname'];
            $age = $_GET['age'];
            $gender = $_GET['gender'];


            $result = $formFilling->formFillingg($Pid, $fname, $mname, $lname, $age, $gender,  $famNb, $employmentStatus , $PAddress,   $referralreason,  $phonenb ,
             $StudentStatus, $PHistory , $Pcity, $emergencyphone,    $maritalStatus   );
            break;

            
         


        default:
            break;

    }

    header("Content-type:application/json");
	echo json_encode($result);



?>