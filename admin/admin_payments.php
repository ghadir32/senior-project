<?php

 session_start();
if(isset($_SESSION["id"]))
{
    // $id=$_GET["id"];
    $id=$_SESSION["id"];
 
}	else
			header("Location:../login_register/login.php");

?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payments</title>


    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css\dashboard.css" rel="stylesheet" type="text/css">
    <link href="css\sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js\admin_payments.js"></script> 
</head>
<body>

    <div>

        <!--side navbar-->
        <div class="navbar" id="sidNav">

            <nav class="main-menu" id="main-menu">
                <ul>
                    <li>
                        <div class="mt-3 ml-3" id="menubtn">
                            <div id="menushow">
                                <img src="..\images/menu.png" id="menu" width="40" height="40" alt="menu" />
                            </div>
                            <div id="menuhide">
                                <img src="..\images/close.png" id="menuclose" width="40" height="40" alt="menu" />
                            </div>

                        </div>


                    </li>
                </ul>
                <a class="image" href="#">

                    <img class="profile fa-2x" src="..\images\logocenter.png" id="profile" alt="profile" />
                </a>

                <ul>
                    <li>
                        <a href="admin_dashboard.php">
                            <i class="fa fa-home fa-2x ff"></i>
                            <span class="nav-text">
                                Dashboard
                            </span>
                        </a>

                    </li>
                    <li class="has-subnav">
                        <a href="admin_Doctors.php">
                            <i class="fa fa-user-md fa-2x ff"></i>
                            <span class="nav-text">
                                Doctors
                            </span>
                        </a>

                    </li>
                    <li class="has-subnav">
                        <a href="admin_Patients.php">
                            <i class="fas fa-procedures fa-2x ff"></i>
                            <span class="nav-text">
                                Patients
                            </span>
                        </a>

                    </li>
                    <li>
                        <a href="admin_calendar.php">
                            <i class="fa fa-calendar-alt fa-2x ff"></i>
                            <span class="nav-text">
                                Calender
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_appointments.php">
                            <i class="fas fa-notes-medical fa-2x ff"></i>
                            <span class="nav-text ">
                                Appointments
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_payments.php">
                            <i class="fas fa-cash-register  fa-2x ff"></i>
                            <span class="nav-text">
                                Payments
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_statistics.php">
                            <i class="fas fa-chart-pie fa-2x ff"></i>
                            <span class="nav-text">
                                Graphs and Statistics
                            </span>
                        </a>
                    </li>
                    <li>
                    <a href="admin_settings.php">
                        <i class="fas fa-cogs fa-2x ff"></i>
                        <span class="nav-text">
                            Settings
                        </span>
                    </a>
                </li>
                </ul>
                <ul class="logout">
                    <li>
                        <a id="logout" href="#">
                            <i class="fas fa-sign-out-alt ff"></i>
                            <span class="nav-text">
                                Logout
                            </span>
                        </a>
                    </li>
                </ul>

            </nav>


        </div>

        <!--end side navbar-->
        <div class="content ">
            <!-- Page Heading -->

            <marquee width="50%" style="margin-left:25%"><h1 class="h3  text-gray-800">Payments List</h1></marquee>  


              <p id="p10"></p>

            <div class="table_today_app">
                <div class="row form-inline">

                    <div class="col-sm-6">

                        <div class="dataTables_length" id="App_table_length">

                            <label>
                                Show
                                <select class="form-control" id="show_entries">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                            <label class="labledate">

                            Filter by Date:  <input type="date" id="filterdate" class=" form-control mr-sm-2 ml-10" aria-label="date">
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-6 search">
                        <label>
                            Search:
                            <input id="insearch" class=" form-control mr-sm-2 ml-10" type="text" aria-label="Search">
                            <input type="button" id="add_modal" class="btn" data-bs-toggle="modal" data-bs-target="#myModal" value="Add Payment">
                        </label>
                        
                         
                        
                            
                    </div>
                    
                </div>
                <p class="text-center text-danger mt-2" id="p5"></p>
                <div class="col">
                    <table class="table  table-striped mt-3 " border="0" id="pay_table">
                        <thead>
                            <tr>
                                <th scope="col">Pay No.</i></th>
                                <th scope="col">App No.</i></th>
                                <th class="doctor" scope="col">Doctor Name  <i class="fas fa-sort-alpha-up sort"></i></th>
                                <th class="patient" scope="col">Patient Name <i class="fas fa-sort-alpha-up sort"></i></th>
                                <th class="app_date" scope="col">App Date Time  <i class="fas fa-sort-amount-up sort"></i></th>
                                <th class="pay_date" scope="col">Pay Date Time <i class="fas fa-sort-amount-up sort"></i></th>
                                <th class="amount" scope="col">Amounts <i class="fas fa-sort-amount-up sort"></i></th>
                                <th class="method" scope="col">Pay Method </i></th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody id="pay_tbody">
                        </tbody>
                    </table>
                </div>
                <div class="reload">
                    <img src="..\images\Spin-1s-200px.gif" width="120" height="120" alt="reload" />
                </div>
                <div class="empty">
                    <span>No Payments</span>
                </div>
                <div class="col-sm-5">
                    <span id="table_info"></span>
                </div>
            </div>



        </div>
    </div>
     <!-- modal -->
   <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment</h5>
                    <button class="close btn" style="" data-bs-dismiss="modal">x</button>
                   
                </div>
                <div class="modal-body">

                   
                        <div class="mb-3">
                            APPOINTMENT NUMBER: 
                            <input id="app_no" name="myBrowser"  class="form-control mt-1" placeholder="App000" />
                            <p class="text-left text-danger mt-2" id="p0"></p>
                        </div>
                        <input id="checka" type="hidden"/>
                         <input id="checkb" type="hidden"/>
                        <div class="addbtn mb-3">
                            <!--<button  id="submit_payment_invoice" name="submit_appointment" class="btn btn-success">Add Payment with invoice</button>-->
                            <button  id="submit_payment" name="submit_appointment" class="btn btn-primary">Add Payment</button>
                            <button id="cancel_p"  class=" btn btn-waring" >Cancel</button>
                        </div>
                       
                    
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(".empty").hide();
        $(".startalt").hide();
        $(".endalt").hide();
        $(".statusalt").hide();
        var menu = document.getElementById("main-menu");
        var menushow = document.getElementById("menushow");
        var menuclose = document.getElementById("menuhide");
        menuclose.style.visibility = "hidden";
        menuclose.style.display = "none";
        //hide and show image close and menu in navbar
        menushow.onclick = function () {
            menu.style.visibility = "visible";
            menushow.style.visibility = "hidden";
            menushow.style.display = "none";
            menuclose.style.visibility = "visible";
            menuclose.style.display = "disable";
            $("#menuhide").show();
        }
        menuclose.onclick = function () {
            menu.style.visibility = "hidden";
            menushow.style.visibility = "visible";
            menushow.style.display = "disable";
            menuclose.style.visibility = "hidden";
            menuclose.style.display = "none";
            $("#menushow").show();
        }


        $(document).ready(function () {
            $('.Asave').hide();
        });
    </script>
    <script src="..\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>
</html>
