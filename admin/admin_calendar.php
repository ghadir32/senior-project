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
    <meta charset="utf-8" content="width=device-width,initial-scale=1.0" />
    <title>Calender</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css\calendar.css" rel="stylesheet" type="text/css">
    <link href="css\sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js\admin_calendar.js"></script>

</head>
<body>
    <div class="">
       
      
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
        <marquee width="50%" style="margin-left:25%; margin-top:5% "><h1 class="h3  text-gray-800">Calender</h1></marquee>  
        <div class="">
            <div class="calendar disable-selection" id="calendar">
                <div class="left-side">
                    <div class="current-day text-center">
                        <h1 class="calendar-left-side-day"></h1>
                        <div class="calendar-left-side-day-of-week"></div>

                    </div>
                    <div class="app text-center">
                        <button class="btn" id="but">Appointments List</button>

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