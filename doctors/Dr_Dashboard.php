<?php
 session_start();
if(isset($_SESSION["id_doctor"]))
{
    $id=$_SESSION["id_doctor"];  
}else{
    header("location:../login_register/login.php");
}


?>



<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css/dashboard.css" rel="stylesheet" type="text/css">
    <link href="css\Dr_calendar.css" rel="stylesheet" type="text/css">
    <link href="css\sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <!-- <script src="js\calendar.js"></script> -->
    <script src="js\dashboard.js"></script>
    <script src="js\Drimage.js"></script>

</head>
<body>
<div>
<input id="UIDinput"  type="hidden" class="userHiddenId" value="<?php echo $id;?>"  />

        <!--side navbar-->
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
        <a class="image" href="Dr_profile.php">
                <img class="profile fa-2x" id="profile" src="..\images\R.png" />
            </a>
            <ul>
                <li>
                    <a href="Dr_dashboard.php">
                        <i class="fa fa-home fa-2x ff"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
               
               
                <li>
                    <a href="Dr_patients.php">
                    <i class="fas fa-hospital-user fa-2x ff"></i>          
                     <span class="nav-text">
                            My Patients
                        </span>
                    </a>

                </li>

                <li>
                    <a href="Dr_profile.php">
                    <i class="fas fa-user-alt fa-2x ff"></i>
                    <span class="nav-text">
                            My Profile
                        </span>
                    </a>
                </li>
            

                <li>
                <a href="Dr_availability.php">
                    <i class="fas fa-check-circle fa-2x ff"></i>
                         <span class="nav-text">
                            Availability
                        </span>
                    </a>
                </li>
                

                <li class="has-subnav">
                    <a href="Dr_acc_settings.php">
                    <i class="fas fa-cogs fa-2x ff"></i>            
                     <span class="nav-text">
                            Settings
                        </span>
                    </a>
                </li>

              
            

            </ul>

            <ul class="logout">
                <li>
                    <a href="#" id="logout">
                         <i class="fas fa-sign-out-alt ff"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
         <!--end side navbar-->
  </div>

    <!--body-->

        <!-- //start content -->
        <div class="content">

        <!-- <h2 id="welcome_par"> WELCOME DOCTOR MOHAMMAD </h2> -->
        <marquee width="50%" id="welcome_par" style="margin-left:25%"><h1 class="h3 mb-4 text-gray-800">Welcome To Your Dashboard</h1></marquee>  


           <!-- Content Row -->
           <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Today Total Appointments
                                </div>
                                <div id="TodayAppointment" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Tomorrow Total Appointments
                                </div>
                                <div id="TomorrowAppointment" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Last 7 Days Total Appointments
                                </div>
                                <div id="LastWeekAppointment" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                    Total Appointments till today
                                </div>
                                <div id="TotalAllAppointment" class="h5 mb-0 font-weight-bold text-gray-800"></div>

                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    My Total Registered Patients
                                </div>
                                <div id="TotalPatients" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        <h2 id="cal_par">CALENDAR </h2>

      

        <div>
            <div class="calendar disable-selection" id="calendar">
                <div class="left-side">
                        <div class="current-day text-center">
                            <h1 class="calendar-left-side-day"></h1>
                            <div class="calendar-left-side-day-of-week"></div>
                            
                        </div>
                        <div class="app text-center">
                        <p class="text-secondary noSessionTxt">No booked sessions at this date yet.</p>

                            <button class="btn" id="but">Appointments List</button>

                            <div class="sidebar close">
                                <div class="side_arrow"></div>
                                <ul class="patients-links" id="ulp">

                                </ul>
                                </div>
                        </div>
                </div>
                <div class="right-side">
                        <div class="text-center calendar-change-year">
                                <span class="fa fa-caret-left cursor-pointer calendar-change-year-slider-prev"></span>
                                <span id="calendar-current-year" class="calendar-current-year"></span>
                                <span class="fa fa-caret-right cursor-pointer calendar-change-year-slider-next"></span>
                        </div>
                        <div class="calendar-month-list">
                            <ul class="calendar-month"></ul>
                        </div>
                        <div class="calendar-week-list">
                            <ul class="calendar-week"></ul>
                        </div>
                        <div class="calendar-day-list">
                            <ul class="calendar-days"></ul>
                        </div>
                </div>
            </div>
          </div>
        </div>


        <!-- end content div -->
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

        $(document).on('click', '#logout', function () {

        var op = 3;
        $.ajax({
            type: 'GET',
            url: "../login_register/ws/users_ws.php",
            dataType: 'json',
            data: { op: op},
            success: function (response) {
                window.location.href = "../login_register/login.php";
            },
        });

        });
    </script>

</body>



</html>