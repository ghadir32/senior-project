<?php

	require_once('../class/profile.class.php');
	
	$profile = new profile();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
	
		 // getting dr profile data
        case 1:
 				//$id = mysqli_real_escape_string($conn, $_GET['id'] );
                $id=$_GET['id'];
				$result = $profile->get_Dr_data($id);
				break;

        //getting dr speciality not  used
        case 2:
            //$id = mysqli_real_escape_string($conn, $_GET['id'] );
            // $result = $profile->get_dr_spec(1);
            $id=$_GET['id'];
            $result = $profile->get_Dr_email($id);
            break;

        case 3:
            $id=$_GET['id'];
            //$id = mysqli_real_escape_string($conn, $_GET['id'] )  
            $newdata = $_GET['newdata'];
          // $newdata = mysqli_real_escape_string($conn, $_GET['newdata']); 
         //  $dataTitle = mysqli_real_escape_string($conn, $_GET['dataTitle']);
            $dataTitle = $_GET['dataTitle'];
            $result = $profile->updateData($newdata, $id, $dataTitle);
            break;

        case 4:
            $result = $profile->get_spec_list();
            break;

        case 5:
             $id=$_GET['id'];
             $result = $profile->get_dr_spec($id);
             break;

        case 6:
            $id=$_GET['id'];
            $newSpec = $_GET['newSpec'];
            $result = $profile->add_dr_spec($id, $newSpec);
            break;

         case 7:
             $id=$_GET['id'];
             $spec_id = $_GET['spec_id'];
             $result = $profile->del_dr_spec($id, $spec_id);
             break;

         case 8:
                $id=$_GET['id'];
                $newEmail = $_GET['newEmail'];
                $result = $profile->updateEmail($id, $newEmail);
                break;

         case 9:
             $id=$_GET['id'];
             $result = $profile->get_session_price($id);
             break;

             case 10:
                $id=$_GET['id'];
                $img=$_GET['img'];
                $result = $profile->changeDrImg($id, $img);
                break;

                case 11:
                    $id=$_GET['id'];
                    $result = $profile->setDrStatus($id);
                    break;

		default:
				break;
	}

   
    
	header("Content-type:application/json");
	echo json_encode($result);

?>