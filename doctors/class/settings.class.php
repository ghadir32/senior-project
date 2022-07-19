<?php
  require_once('../../DAL/DAL.class.php');

  class settings{

    public function getSettings($id){
        // $sql = "SELECT users.username, users.email, users.email, users.password  FROM `users` inner JOIN doctors as doc ON doc.user_id=users.user_id where doc.doctor_id = $id;";
        $sql = "SELECT doc.Phone_number,  users.username, users.email, users.email, users.password  FROM `users` inner JOIN doctors as doc ON doc.user_id=users.user_id where users.user_id = $id";
        $db= new DAL();
		$rows= $db->getData($sql);
		return $rows;	
    }
    public function updatePass($id,  $password){
        $password=password_hash($password,PASSWORD_DEFAULT);
        // $sql = "UPDATE users as u INNER JOIN doctors ON u.user_id = doctors.user_id SET  u.password='$password' WHERE doctors.doctor_id =$id;";
        $sql = "UPDATE users  SET  users.password='$password' WHERE users.user_id =$id;";

        $db= new DAL();
		$rows= $db->ExecuteQuery($sql);
		return $rows;	
    }

    public function updateData($id,  $newdata,  $dataTitle){
      if($dataTitle == "phone_number"){
        // $sql = "UPDATE doctors  SET doctors.$dataTitle = '$newdata' WHERE doctors.doctor_id =$id;";
          $sql = "UPDATE doctors  INNER JOIN users    on doctors.user_id = users.user_id  SET doctors.$dataTitle =  '$newdata'  where users.user_id = $id;";

      }else{
        // $sql = "UPDATE users as u INNER JOIN doctors ON u.user_id = doctors.user_id SET u.$dataTitle = '$newdata' WHERE doctors.doctor_id =$id;";
        $sql = "UPDATE users   SET users.$dataTitle = '$newdata' WHERE users.user_id =$id;";

      }

       $db= new DAL();
       $rows= $db->ExecuteQuery($sql);
       return $rows;
    }

    public function deleteAcc($id){
      //  $sql = "UPDATE users as u INNER JOIN doctors ON u.user_id = doctors.user_id SET u.status ='0' where doctors.doctor_id =$id;";
       $sql = " UPDATE users SET users.status ='0' where users.user_id =$id;";

       $db= new DAL();
       $rows= $db->ExecuteQuery($sql);
       return $rows;
    }
    public function getImg($id){
      // $sql = "SELECT doctor_image FROM `doctors` where doctor_id=$id;  ";
       $sql = "SELECT doctor_image FROM `doctors` INNER join  users on users.user_id = doctors.user_id where users.user_id=$id;  ";

      $db= new DAL();
      $rows= $db->getData($sql);
      return $rows;
   }
   
    
    // $sql = "UPDATE users as u INNER JOIN doctors ON u.user_id = doctors.user_id SET u.username = '$uname', u.email='$email', u.password='$password', u.phone='$phone'
    // WHERE doctors.doctor_id =$id;";
    
        public function	verifyPassword($id,$Oldpass){


			$sql="select * from users where users.user_id = $id";
		
		
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















  }












?>