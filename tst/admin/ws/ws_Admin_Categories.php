<?php
	//header('Access-Control-Allow-Origin: *');
    require_once("../class/Admin_Categories.class.php");

   
    $op = $_GET["op"];

 switch ($op)
  {
	case 1:
		 {
           $cat = new Admin_Categories() ;
	      
           $name ="";
	
	       $result=$cat->GetallCat($name)  ;
			 
	   
	     break;
	    }
	 case 2:
		 {
			 $image=$_GET["image"];
			 $name=$_GET["cname"];	    
	         $status=$_GET["cstatus"];
			 
             $cat = new Admin_Categories() ;
			 
			 $result=$cat->AddCat($image,$name,$status);
			 		 
			 break; 			 
		 }
	 case 3:
		 {
			$row_id=$_GET["rowid"];
			$name=$_GET["name"];
			$image=$_GET["image"];
	 	 
			 
			$cat = new Admin_Categories();

            $result=$cat->EditCat($row_id,$image,$name);
			 break;
		 }
	 case 4:
		 {
			 $row_id=$_GET["rowid"];
			 $dstatus=$_GET["dstatus"];
			 
			 $cat = new Admin_Categories() ;

             $result=$cat->deactivateCatbyid($row_id,$dstatus);
			
		
			break;
		 }
   case 5:
		 {
			$status=$_GET["status"];
			 
			$cat = new Admin_Categories() ;

            $result=$cat->GetCatbystatus($status);
			
			break;
		 }
   case 6:
		 {
			$id=$_GET["rowid"];
			 
			$cat = new Admin_Categories() ;

            $result=$cat->deleteCatbyid($id);
			
			break;
		 }
	 case 7:
		 {
			$catname=$_GET["catname"];
			 
			 $cat = new Admin_Categories() ;
			 
			 $result=$cat->CheckIfCategoryHasItems($catname);
			 
			 break;
		 }
	 case 8:
		 {
			  $cat = new Admin_Categories() ;
			 
			 $result=$cat->GetSaledItems();
			 
			 break;
			 
		 }
		 
		 
		 
 }

	 header("Content-type:application/json"); 		
	 echo json_encode($result);
	
	
	
