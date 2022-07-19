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
    <meta charset="utf-8" />
    <title>Settings</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css/settings.css" rel="stylesheet" type="text/css">
    <link href="css\sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js\admin_settings.js"></script>

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
    </div>

    <!--body-->
    <div id="content">


        <marquee width="50%" style="margin-left:20%"><h1 class="h3  text-gray-800">Settings</h1></marquee>
        <!-- div with all settings -->
        <div id="settings">
            <h4 class="mb-3">Admin Account Settings</h4>
            <!-- username -->
            <div id="setting">
                <div id="title">Username:</div>
                <div class="spann">
                    <span id="Admin_username" class="innerspan"></span>
                    <i class="fas fa-pen  editt" id="editUsername"></i>
                    <input type="text" class="inputs" id="newusername" value="" />
                    <div id="usernameWarning" class="text-danger alert">* This fild should not be empty</div>

                </div>
            </div>


            <!-- Contact email -->
            <div id="setting">
                <div id="title">Contact Email:</div>
                <div class="spann">
                    <span id="Admin_email" class="innerspan"></span>
                    <i class="fas fa-pen  editt" id="editEmail"></i>
                    <input type="text" class="inputs" id="newemail" value="" />
                    <div id="emailvalidate" class="text-danger alert">* This fild should not be empty</div>
                    <div id="emailWarning" class="text-danger alert">This email will be public.</div>

                </div>
            </div>
            <!-- Contact email -->
            <div id="setting">
                <div id="title">Password:</div>
                <div class="spann">
                    <i class="fas fa-pen  editt" id="editPass"></i>
                    <input type="password" class="inputs pass" placeholder="old password" id="oldpass" value="" />
                    <div class="text-danger alert" id="oldPassAlert">Old password is incorrect.</div>

                    <input type="password" class="inputs pass" placeholder="new password" id="newpass" value="" />
                    <input type="password" class="inputs pass" placeholder="confirm New password" id="confirmNewPass" value="" />
                    <div class="text-danger alert" id="newPassAlert">new passwords do not match.</div>
                    <div class="text-danger alert" id="emptyPassAlert">please fill in the new password.</div>
                    
                    <div id="submitDiv">
                    <p class="text-center text-success mt-2" id="p5"></p>
                        <button type="button" id="saveAcc" class="btn btn-primary btn-primary1 ">Save changes</button>
                    </div>
                </div>
            </div>


        </div>
        <div id="settings">
            <h4 class="mb-3">Center Settings</h4>
             <select class="form-control" id="dr_type">
                    <option value="doctor">doctor</option>
                    <option value="psychotherapist">psychotherapist</option>
            </select>
                               
            <div id="setting">
                <div id="title">Session Duration:</div>
                <div class="spann">
                    <span id="Session_Duration" class="innerspan"></span>
                    <i class="fas fa-pen  editt" id="editDuration"></i>
                    <input type="text" class="inputs" id="newduration" value="" />
                     <div id="durationvalidate" class="text-danger alert">* This fild should not be empty</div>
                </div>
            </div>

            <div id="setting">
                <div id="title">Session Price:</div>
                <div class="spann">
                    <span id="Session_Price" class="innerspan"></span><span class="dolarsign">$</span>
                    <i class="fas fa-pen  editt" id="editPrice"></i>
                    <input type="number" class="inputs" id="newPrice" value="" />
                     <div id="pricevalidate" class="text-danger alert">* This fild should not be empty</div>
                    <p class="text-center text-success mt-2" id="p6"></p>
                </div>
                
            </div>
           
            <div id="">
                <button type="button" id="savecenter" class="btn btn-primary btn-primary1 ">Save changes</button>
            </div>

        </div>
        <!-- settings end -->
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