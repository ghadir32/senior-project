<?php

  require_once('../class/settings.class.php');

  $settings = new settings();
  $op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

    switch($op){
        case 1:
            $id = $_GET['id'];
            $result = $settings->getSettings($id);
            break;

         case 2:
                $id = $_GET['id'];
                $pass = $_GET['newpass'];
                $Oldpass = $_GET['oldpass'];
                $verification=$settings->verifyPassword($id,$Oldpass);



               if($verification==1){
                  $result = $settings->updatePass($id,$pass);
               }
               else {
                   $result = 5;
               }
               
                break;

          case 3:
                    $id=$_GET['id'];
                    $datatype = $_GET['datatype'];
                    $datavalue = $_GET['datavalue'];
                    $result = $settings->updateData($id, $datavalue,  $datatype);
                    break;

             case 4:
                 $id = $_GET['id'];
                  $result = $settings->deleteAcc($id);
                  break;

                  case 5:
                     $id = $_GET['id'];
                     $result = $settings->getImg($id);
                     break;

        default:

            break;







    }



    header("Content-type:application/json");
	echo json_encode($result);


?>
