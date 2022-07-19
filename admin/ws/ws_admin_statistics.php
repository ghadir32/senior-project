<?php

  require_once('../class/admin_statistics.class.php');

  $statistics = new statistics();
  $op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

    switch($op){


    
        case 1:
            $month=$_GET['month'];
            $year=$_GET['year'];


            $result = $statistics->GetMonthlyDotalSoctorApp($month,$year);
        break;
        case 2:
            $year=$_GET['year'];


            $result = $statistics->GetMonthlyProfit($year);
        break;
         case 3:
            $year=$_GET['year'];


            $result = $statistics->GetMostMonthApp($year);
        break;
        break;
        default:

            break;







    }



    header("Content-type:application/json");
	echo json_encode($result);


?>
