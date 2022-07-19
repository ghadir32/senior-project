<?php
  require_once('../../DAL/DAL.class.php');

  class settings{

    public function getAccSettings(){
        $sql = "SELECT * FROM `users` WHERE user_type='admin';";
        $db= new DAL();
		$rows= $db->getData($sql);
		return $rows;	
    }
        public function getcenterSettings($dr_type){
        $sql = "SELECT TIME_FORMAT(center_rules.session_duration,'%H:%i') as session_duration,center_rules.session_price FROM `center_rules` WHERE dr_type='$dr_type';";
        $db= new DAL();
		$rows= $db->getData($sql);
		return $rows;	
    }
    public function UpdatecenterSettings($dr_type,$datatype,$datavalue){
        $sql = "UPDATE `center_rules` SET center_rules.`$datatype`='$datavalue' WHERE center_rules.dr_type='$dr_type';";
        $db= new DAL();
		$rows= $db->ExecuteQuery($sql);
		return $rows;	
    }
        public function UpdateAccountSettings($datatype,$datavalue){
        $sql = "UPDATE `users` SET `$datatype`='$datavalue' WHERE users.user_type='admin';";
        $db= new DAL();
		$rows= $db->ExecuteQuery($sql);
		return $rows;	
    }



    public function	verifyEmailPassword($email,$Oldpass){


			$sql="select * from users where email='$email'";
		
		
			$db = new DAL();
		
			$rows=$db->getData($sql);
			if($rows!=0){
				$password_hashed=$rows[0]['password'];

				if(Password_verify($Oldpass,$password_hashed)){
		

					return 1;
				}
				else {
				return 0;
				}

			}

			else {
            	return 0;
			}        
		}
	public function UpdatePassAccountSettings($newpass){
		$newpass=password_hash($newpass,PASSWORD_DEFAULT);
        $sql = "UPDATE `users` SET `password`='$newpass' WHERE users.user_type='admin';";
        $db= new DAL();
		$rows= $db->ExecuteQuery($sql);
		return $rows;	
    }
  }
?>