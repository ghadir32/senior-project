<?php
  require_once('../../DAL/DAL.class.php');

  class statistics{

    public function GetMonthlyDotalSoctorApp($month,$year){
        $sql = "SELECT appointments.doctor_id,CONCAT(CONCAT(doctors.first_name , ' '),doctors.last_name) AS doctor_full_name, COUNT(*) as total_dr_app,MONTH(CURRENT_DATE) as thismonth FROM appointments INNER JOIN doctors on appointments.doctor_id = doctors.doctor_id WHERE month(appointments.date)='$month' AND YEAR(appointments.date)='$year' GROUP BY appointments.doctor_id ORDER BY appointments.doctor_id LIMIT 5;";
        $db= new DAL();
		$rows= $db->getData($sql);
		return $rows;	
    }

    public function GetMonthlyProfit($year){
        $sql = "SELECT SUM(pay_amount) as totalSum,MONTH(pay_date) as thismonth FROM `payments` WHERE YEAR(pay_date)='$year' GROUP BY MONTH(pay_date) ORDER BY MONTH(pay_date) ASC;";
        $db= new DAL();
		$rows= $db->getData($sql);
		return $rows;	
    }
    public function GetMostMonthApp($year){
        $sql = "SELECT COUNT(*) as totalSum,MONTH(appointments.date) as thismonth FROM appointments WHERE YEAR(appointments.date)='$year' GROUP BY MONTH(appointments.date) ORDER BY totalSum DESC LIMIT 4;";
        $db= new DAL();
		$rows= $db->getData($sql);
		return $rows;	
    }
  }
?>