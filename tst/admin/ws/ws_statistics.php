<?php
	//header('Access-Control-Allow-Origin: *');
    require_once("../class/Statistics.class.php");

   
    $op = $_GET["op"];

 switch ($op)
  {
	 case 1:
	{
	  $stat = new Statistics();
			 
	  $result=$stat->GetSaledItems();
			 
	  break;	
	}
	 case 2:
		 {
			  $stat = new Statistics();
			 
	          $result=$stat->GetMostSaledCat();
			 
	             break;	
		 }
	 case 3:
		 {
			  $stat = new Statistics();
			 
	          $result=$stat->DateSales();
			 
	             break;	
			 
		 }
 }
		 
		 
		 
 

	 header("Content-type:application/json"); 		
	 echo json_encode($result);