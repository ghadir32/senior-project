<?php

 session_start();
if(isset($_SESSION["id"]))
{
    // $id=$_GET["id"];
    $id=$_SESSION["id"];
 
}	else
			header("Location:../login_register/login.php");

?>

<?php


    if(isset($_GET['pay_id'])){
        $pay_id=$_GET['pay_id'];
	}          
?>

<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title></title>
            <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/invoice.css" media="all" />
        <script src="js\invoice.js"></script>
      </head>


      <body>
      
       <input id="pay_id" type="hidden" value="<?php echo $pay_id?>">
          <header class="clearfix">
              <div id="logo">
                  <img src="..\images\logocenter.png">
              </div>

              <h1>INVOICE</h1>

              <div id="company" class="clearfix">
                  <div>Medical Center</div>
                  <div>00096171737624</div>
                  <div>center@gmail.com</div>
              </div>
              <div id="project">

                  <div><span>PATIENT: </span><span class="info" id="name"></span></div>
                  <div><span>AGE: </span><span class="info" id="age"></span></div>
                  <div><span>ADDRESS: </span><span class="info" id="address"></span></div>
                  <div><span>PHONE: </span><span class="info" id="phone"></span></div>
                  <div><span>EMAIL:</span><span class="info" id="email"></span></div>
                   <div><span>DATE TIME:</span><span class="info" id="pay_date_time"></span></div>
              </div>
               
          </header>
          <span id="datetoday">Date:  </span>
          <main>

              <table id="invoice_table">
                  <thead id="tbody_invoice">
                      <tr>
                          <th>Appointment No.</th>
                          <th>Doctor</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>PRICE</th>
                          <th>METHOD</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                  </tbody>
              </table>
              <div class="total">Total:<span id="total_price"></span></div>
               <div class="print"><button id="print" class="btn btn-primary">Print</button></div>
          </main>
      
      
      


      </body>
    </html>