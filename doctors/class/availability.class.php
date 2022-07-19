<?php

require_once('../../DAL/DAL.class.php');

  class availability{

    public function send_dr_schedule($id, $date, $starttime, $endtime){
        // $sql = "INSERT INTO doctors_schedule (d_s_id, date, start_time,end_time) VALUES ('$id','$date','$starttime','$endtime'); ";
        $sql = " INSERT INTO doctors_schedule (d_s_id, date, start_time,end_time,status) 
        VALUES ( (SELECT doctor_id from doctors where doctors.user_id = $id),'$date','$starttime','$endtime','1');";


        $db= new DAL();
	    	$rows= $db->ExecuteQuery($sql);
	    	return $rows;	
    }

    public function get_work_dates($id){
      // $sql = "SELECT  * FROM `doctors_schedule` where d_s_id=$id and status='1'";
      $sql = "SELECT s_id, d_s_id, date, start_time, end_time FROM `doctors_schedule` left join doctors on doctors_schedule.d_s_id = doctors.doctor_id where doctors.user_id=$id  and doctors_schedule.status=1;";

      $db= new DAL();
      $rows= $db->getData($sql);
      return $rows;	
  }

   
  
  public function disable_date($id, $s_id){
    $sql = "UPDATE doctors_schedule SET status = 0 WHERE s_id = $s_id; ";
    // $sql = "    UPDATE doctors_schedule inner join doctors on doctors_schedule.d_s_id = doctors.doctor_id SET doctors_schedule.status = 1 WHERE doctors_schedule.s_id = $s_id and doctors.user_id=$id;    ";

    $db= new DAL();
    $rows= $db->ExecuteQuery($sql);
    return $rows;	
}


 
  public function get_dates($id){
    $sql = "SELECT start_date, end_date FROM `doctors` where doctors.user_id=$id;";
    $db= new DAL();
    $rows= $db->getData($sql);
    return $rows;	
  }

  public function send_dates($id, $startdate,  $enddate){
    if($startdate == '1111-11-11'){

      $sql = "UPDATE doctors SET   end_date = '$enddate' WHERE doctors.user_id=$id; ";

    }else{

      $sql = "UPDATE doctors SET start_date= '$startdate',  end_date = '$enddate' WHERE doctors.user_id=$id; ";
    }

    $db= new DAL();

    $rows= $db->ExecuteQuery($sql);

    return $rows;	
  }

  //  public function getDrId($id){
  //   $sql = "SELECT doctor_id FROM `doctors` inner join users ON users.user_id = doctors.user_id where users.user_id=$id;";
  //   $db= new DAL();
  //   $rows= $db->getData($sql);
  //   return $rows;	
  //  }



  }








?>