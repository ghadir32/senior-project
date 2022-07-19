<?php

	require_once('../class/our_team.class.php');
	$ourteam= new ourteam();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		case 1:

			$result=$ourteam->GetPsychologe();

			break;

		
		//get session duration
		case 2:

			$result=$ourteam->Psychiatrist();

			break;
		default:
		
			break;
	}	
	echo json_encode($result);

?>

