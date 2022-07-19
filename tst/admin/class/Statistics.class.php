<?php

require_once('../../DAL/DAL.class.php');


class Statistics{




 public function GetSaledItems()
	 {
		$sql="SELECT products.product_name ,sum(ordered_details.product_quantity) AS Quantity FROM ordered_details INNER join products WHERE ordered_details.product_id=products.id GROUP BY products.product_name ORDER BY Quantity DESC LIMIT 4;";
	    
	    $db = new DAL();
		
		 $rows=$db->getData($sql);
		
		return $rows;
			
	 }
	public function GetMostSaledCat()
	 {
		$sql="SELECT categories.cat_name , SUM(ordered_details.product_quantity) as quantity from ordered_details INNER JOIN products INNER JOIN categories WHERE products.product_category = categories.cat_name and ordered_details.product_id=products.id GROUP BY categories.cat_name;";
	    
	    $db = new DAL();
		
		 $rows=$db->getData($sql);
		
		return $rows;
			
	 }
	public function DateSales()
	 {
		$sql="SELECT date(ordered.date_time) as Date, SUM(products.product_final_price*ordered_details.product_quantity) as Total_Income from products,ordered,ordered_details WHERE products.id = ordered_details.product_id AND ordered.status='1' AND ordered.id=ordered_details.ordered_id GROUP by Date;";
	    
	    $db = new DAL();
		
		 $rows=$db->getData($sql);
		
		return $rows;
			
	 }
	
}
?>