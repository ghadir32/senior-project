<?php

require_once('../../DAL/DAL.class.php');

  class profile{

    public function get_Dr_data($id){
      //   $sql = "SELECT * from doctors WHERE doctor_id=$id";
        $sql = "SELECT * from doctors where doctors.user_id= $id;";

        $db= new DAL();
	     $rows= $db->getData($sql);
	     return $rows;	
    }

    public function get_session_price($id){
      // $sql = "SELECT center_rules.session_price from center_rules INNER JOIN doctors ON doctors.dr_type=center_rules.id WHERE doctors.doctor_id=$id;";
      $sql = "SELECT center_rules.session_price from center_rules INNER JOIN doctors inner join users ON doctors.dr_type=center_rules.id and users.user_id = doctors.user_id 
      WHERE users.user_id=$id;";

      $db= new DAL();
      $rows= $db->getData($sql);
      return $rows;
    }


    

    public function updateData($newdata, $id,  $dataTitle){
        //$id1 = mysqli_real_escape_string($conn, $id);  
      //   $sql = "UPDATE doctors SET $dataTitle = '$newdata' WHERE doctor_id = '$id'";
       
        $sql = " UPDATE doctors inner join users on users.user_id = doctors.user_id SET doctors.$dataTitle = '$newdata' WHERE users.user_id = '$id';";

        $db= new DAL();
        $rows= $db->ExecuteQuery($sql);
        return $rows;	
     }

     public function get_spec_list(){
        $sql = "SELECT * FROM `dr_speciality`;";
        $db= new DAL();
        $rows= $db->getData($sql);
        return $rows;	
     }

     public function get_dr_spec($id){
      //   $sql = " SELECT  * FROM doctors AS doc
      //              INNER JOIN dr_has_speciality AS spec ON doc.doctor_id = spec.dr_id
      //              INNER JOIN dr_speciality AS speciality ON spec.spec_id = speciality.spec_id
      //              WHERE doc.doctor_id = $id
      //              GROUP BY speciality.spec_name;";


      $sql = " SELECT * from doctors as doc INNER JOIN dr_has_speciality as spec on doc.doctor_id = spec.dr_id
      INNER JOIN dr_speciality as speciality on spec.spec_id = speciality.spec_id
      INNER join users as usr on usr.user_id = doc.user_id
      WHERE usr.user_id = $id
      GROUP by speciality.spec_name; ";

        $db= new DAL();
        $rows= $db->getData($sql);
        return $rows;	
     }

     

     public function add_dr_spec($id, $newspec){
        $sql = "INSERT INTO dr_has_speciality (dr_id, spec_id) VALUES ((SELECT doctor_id from doctors where doctors.user_id = $id), $newspec); ";
        $db= new DAL();
        $rows= $db->ExecuteQuery($sql);
        return $rows;	
     }

     public function del_dr_spec($id, $spec_id){
        $sql = "DELETE FROM dr_has_speciality WHERE dr_id=(SELECT doctor_id from doctors where doctors.user_id = $id) AND spec_id=$spec_id;";
        $db= new DAL();
        $rows= $db->ExecuteQuery($sql);
        return $rows;	
     }

     public function get_Dr_email($id){
      // $sql = "SELECT email FROM users AS user INNER JOIN doctors AS doc ON doc.user_id = user.user_id WHERE doc.doctor_id=$id;";
      $sql = "SELECT email FROM users  WHERE users.user_id=$id;";

      $db= new DAL();
      $rows= $db->getData($sql);
      return $rows;
     }

     public function updateEmail($id, $Newemail){
      //   $sql = "UPDATE users INNER JOIN doctors AS doc ON doc.user_id = users.user_id SET users.email='$Newemail' WHERE doc.doctor_id=$id;";
        $sql = "UPDATE users SET users.email='$Newemail' WHERE users.user_id=$id;";

        $db= new DAL();
        $rows= $db->ExecuteQuery($sql);
        return $rows;	
     }
  
  
     public function changeDrImg($id, $img){
      $sql = "UPDATE doctors SET doctor_image='$img' WHERE doctors.user_id=$id;";
      $db= new DAL();
      $rows= $db->ExecuteQuery($sql);
      return $rows;	
   }

    
   public function setDrStatus($id){
      $sql = "UPDATE doctors SET status=1 WHERE doctors.user_id=$id;";
      $db= new DAL();
      $rows= $db->ExecuteQuery($sql);
      return $rows;	
   }


  }








?>