<?php

	require_once('../class/admin_payments.class.php');
	$payments= new admin_payments();
	$op=0;
	if(isset($_GET['op'])){
		$op = $_GET['op'];
	}

	switch ($op) {
		case 1:
			$showNumber=$_GET['showNumber'];
			$colum=$_GET['colum'];
			$filterdate=" ";

			if(empty($_GET['filterdate'])||$_GET['filterdate']==" "){
				$filterdate=" ";
			}
			else {
				$filterdate=$_GET['filterdate'];
				$filterdate = "AND payments.pay_date='$filterdate'";
				
			}


			$result=$payments-> payments($showNumber,$colum,$filterdate);
			break;


		// table info
		case 2:  
			if(!isset($_GET['filterdateinfo'])||isset($_GET['filterdateinfo'])==" "){

				$filterdateinfo=" ";
			}
			else {
				$filterdateinfo=$_GET['filterdateinfo'];
				$filterdateinfo = "WHERE payments.pay_date='$filterdateinfo'";
			}



			$result=$payments-> tableInfo($filterdateinfo);
			break;


		case 3:  

			$app_number=$_GET['app_number'];

			$result=$payments-> CheckIfAppHasPayment($app_number);

			if(!$result){
				$result=1;
			}
			else {
	           $result=0;
            }




			break;
		case 4:  

			$app_number=$_GET['app_number'];

			$result=$payments-> CheckIfAppInDB($app_number);
						if($result){
				$result=1;
			}
			else {
	           $result=0;
            }
			break;
		case 5:  
				$app_id=$_GET['app_number'];


			

				$rowa=$payments->paymentinfo($app_id);


			

				$pay_amount=$rowa[0]['session_price'];
				
				$result=$payments->Addpayment($app_id,$pay_amount);

			break;
		case 6:
			$pay_id=$_GET['pay_id'];
			$result=$payments-> invoiceinformation($pay_id);
			break;
	}	
	echo json_encode($result);

?>

