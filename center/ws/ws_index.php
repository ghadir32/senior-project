<?php

  require_once('../class/index.class.php');

  $homePage = new homePage();
  $op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

    switch($op){
        case 1:
            $result = $homePage->getDrnb();
            break;

            case 2:
                $treatment = $_GET['treatment'];
                $result = $homePage->getDrByTreatment($treatment);
                break;

            case 3:
                 $PId = $_GET['PId'];
                 $result = $homePage->checkUsersData($PId);
                 break;

                 case 4:
                    $PId = $_GET['id'];
                    $result = $homePage->getPatientImg($PId);
                    break;
            

        default:

            break;

    }

    header("Content-type:application/json");
	echo json_encode($result);


?>
