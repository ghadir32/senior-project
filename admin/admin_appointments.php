<?php


 session_start();
if(isset($_SESSION["id"]))
{
    // $id=$_GET["id"];
    $id=$_SESSION["id"];
 
}	else
			header("Location:../login_register/login.php");



    if(isset($_GET['date'])){
        $date=$_GET['date'];
	}
    else {
	    $date="";
    }           
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointments</title>


    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css\dashboard.css" rel="stylesheet" type="text/css">
    <link href="css\sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js\admin_appointments.js"></script>
        



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

            <marquee width="50%" style="margin-left:25%"><h1 class="h3  text-gray-800">Appointments List</h1></marquee>  


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
                             <input id="datefromcalendar" type="hidden" value="<?php echo $date?>">
                            Filter by Date:  <input type="date" id="filterdate" class=" form-control mr-sm-2 ml-10" aria-label="date" value="<?php echo $date?>">
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-6 search">
                        <label>
                            Search:
                            <input id="insearch" class=" form-control mr-sm-2 ml-10" type="text" aria-label="Search">
                            <input type="button" id="add_modal" class="btn" data-bs-toggle="modal" data-bs-target="#myModal" value="Add Appointments">
                        </label>
                        
                         
                        
                            
                    </div>
                    
                </div>
                <input id="durationtable" type="hidden">
                <p class="text-center text-danger mt-2" id="p5"></p>
                <div class="col">
                    <table class="table  table-striped mt-3 " border="0" id="App_table">
                        <thead>
                            <tr>
                                <th scope="col">Appointment No.</i></th>
                                <th class="doctor" scope="col">Doctor  <i class="fas fa-sort-alpha-up sort"></i></th>
                                <th class="patient" scope="col">Patient  <i class="fas fa-sort-alpha-up sort"></i></th>
                                <th class="date" scope="col">Date <i class="fas fa-sort-amount-up-alt sort"></i></th>
                                <th class="starttime" scope="col">Start Time  <i class="fas fa-sort-amount-up-alt sort"></i></th>
                                <th class="endtime" scope="col">Time Ends At <i class="fas fa-sort-amount-up sort"></i></th>
                                <th class="status" scope="col">Status  <i class="fas fa-sort-amount-up-alt sort"></i></th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody id="app_tbody">
                        </tbody>
                    </table>
                </div>
                <div class="reload">
                    <img src="..\images\Spin-1s-200px.gif" width="120" height="120" alt="reload" />
                </div>
                <div class="empty">
                    <span>No Appointments</span>
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
                    <h5 class="modal-title">Add New Appointment</h5>
                    <button class="close btn" style="" data-bs-dismiss="modal">x</button>
                   
                </div>
                <div class="modal-body">

                    <form method="post" onsubmit="" id="form">
                        <div class="mb-3">
                            Doctor: 
                            <input list="selectdoctor" id="selectdoctorvalue" name="myBrowser"  class="form-control" placeholder="Select Doctor" /></label>
                            
                            <datalist id="selectdoctor">
                            </datalist>
                            
                            <p class="text-left text-danger mt-2" id="p0"></p>
                        </div>
                        <div class="mb-3">
                            Patient:
                            <input list="selectpatient" id="selectpatientvalue" name="myBrowser"  class="form-control" placeholder="Select Patient" /></label>
                            <datalist id="selectpatient">
                            </datalist>
                            <p class="text-left text-danger mt-2" id="p1"></p>
                        </div>

                        <div class="mb-3">
                            <span>Date:
                           <select  id="appointment_date" name="myBrowser"  class="form-control" placeholder="date" >
                           <option value="" >date</option>
                           
                           </select>

                            </span>
                            <p class="text-left text-danger mt-2" id="p2"></p>
                        </div>
                        <div class="mb-3">
                            <span> Start time:
                            <select  id="appointment_start_time" name="myBrowser"  class="form-control ct" placeholder="start time" >
                           <option value="">Start Time</option>
                           
                           </select>
                           
                            </span>
                            <p class="text-left text-danger mt-2" id="p3"></p>
                             <input id="duration" type="hidden">
                              </div>
                             <input id="paid" type="checkbox"><span>click if it is paid</span>

                        <div class="addbtn mb-3">
                            <button  id="submit_appointment" name="submit_appointment" class="btn btn-primary">Submit</button>
                            <button id="cancel_p"  class=" btn btn-waring" >Cancel</button>
                        </div>
                       
                    </form>
                </div>

            </div>
        </div>
    </div>
    
            <!-- Modal  deactivate or activate-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deleting Your Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to defj?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="deleteAcc">Delete my account</button>
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
