<?php

	require_once('../class/admin_doctors.class.php');
	$doctors= new Admin_doctors();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		case 0:
			$result=$doctors->getAllActiveDoctors();
			break;	
		
			
		case 1://search for doctors by name
			try{
				 $val="";
				 if(isset($_GET["srh"]))
				 $val=$_GET["srh"];
				 $result=$doctors->getDoctors($val);
				}catch(Exception $ex)
				{
					UTILS::write_log($ex->getMessage());
				}
				break;

		case 2://deactivate doctor (change status to 0)
			try{
				if(isset($_GET['id']))
				$id=$_GET['id'];
				  
				$result=$doctors->deactivateUser($id);
			}catch(Exception $ex)
			{
				UTILS::write_log($ex->getMessage());
			}
			break;
			
		case 3:
				$result=$doctors->getAllInactiveDoctors();
				break;	
			
		case 4://deactivate doctor (change status to 0)
					try{
						if(isset($_GET['id']))
						$id=$_GET['id'];
						  
						$result=$doctors->reactivateUser($id);
					}catch(Exception $ex)
					{
						echo $ex;
					}
					break;
		default:
		
			break;

			case 5://Add new DR
				try{
				 if(isset($_GET["uName"],$_GET["uPass"]))
				
				   $uName= $_GET["uName"];
				   $uPass= $_GET["uPass"];

				 $result=$doctors->addDr($uName,$uPass);//Adds a New DR To DB

				}catch(Exception $ex)
				{
					echo $ex;
				}
			break;
			case 6:
				$result=$doctors->getLastUserId();
				break;	
			case 7://Add new DR
					try{
					 if(isset($_GET["name"],$_GET["lName"],$_GET["type"],$_GET["lastUserId"]))
					
					   $fName= $_GET["name"];
					   $lName= $_GET["lName"];
					   $uid=$_GET["lastUserId"];
					   $type=$_GET["type"];
					  $result=$doctors->addDrtoTable($fName,$lName,$type,$uid);//Adds a New DR To DB
	
					}catch(Exception $ex)
					{
					echo $ex;
					}
				break;
	}	
	header("Content-type:application/json");
	echo json_encode($result);
	

?>

