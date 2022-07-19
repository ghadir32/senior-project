<?php
  require_once('../../DAL/DAL.class.php');

  class settings{

    public function getAccSettings($p_id){
        $sql = "SELECT * FROM `users` WHERE user_type='patient' and users.user_id = $p_id;";
        $db= new DAL();
		$rows= $db->getData($sql);
		return $rows;	
    }
        public function UpdateAccountSettings($p_id,$datatype,$datavalue){
        $sql = "UPDATE `users` SET `$datatype`='$datavalue' WHERE users.user_type='patient' and users.user_id = $p_id;";
        $db= new DAL();
		$rows= $db->ExecuteQuery($sql);
		return $rows;	
    }

	    public function getpatientimage($p_id){
        $sql = "SELECT patients.patient_image FROM `users` INNER JOIN patients WHERE user_type='patient' and users.user_id =$p_id AND users.user_id =patients.p_user_id;";
        $db= new DAL();
		$rows= $db->getData($sql);
		return $rows;	
    }

	

    public function	verifyEmailPassword($p_id,$email,$Oldpass){


			$sql="select * from users where email='$email' and users.user_id = $p_id";
		
		
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
	public function UpdatePassAccountSettings($p_id,$newpass){
		$newpass=password_hash($newpass,PASSWORD_DEFAULT);

        $sql = "UPDATE `users` SET `password`='$newpass' WHERE users.user_type='patient' and users.user_id = $p_id;";
        $db= new DAL();
		$rows= $db->ExecuteQuery($sql);
		return $rows;	
    }


	public function checkIfnewPatient($uID)
        {
            $sql = "SELECT * FROM patients WHERE patients.p_user_id = '".$uID."'";
			 $db= new DAL();
            $result = $db->getData($sql);
            return $result;   
        }
	 public function changepatientImg($id, $img){
      $sql = "UPDATE patients SET patient_image='$img' WHERE patients.p_user_id = '".$id."'";
      $db= new DAL();
      $rows= $db->ExecuteQuery($sql);
      return $rows;	
   }
  }
?>