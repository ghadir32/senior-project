<?php

 session_start();
if(isset($_SESSION["id"]))
{
    $id=$_SESSION["id"];
 
}	else
			header("Location:../login_register/login.php");

?>
<?php


    if(isset($_GET['patient_id'])){
        $patient_id=$_GET['patient_id'];
	}
    else {
	    $patient_id="";
    }

			

           
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Patient Profile</title>

    <meta name="author" content="Codeconvey" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    
	<link rel="stylesheet" href="css/view_patient_profile.css">
        <script src="js\view_patient_profile.js"></script>
        <link rel="stylesheet" href="..\admin\css\sidebar.css">
</head>
<body>
	    <div>
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
            <a class="image" href="#">

                <img class="profile fa-2x" src="..\images\logocenter.png" id="profile" alt="profile" />
            </a>

            <ul>
                <li>
                    <a href="..\admin\admin_dashboard.php">
                        <i class="fa fa-home fa-2x ff"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fa fa-user-md fa-2x ff"></i>
                        <span class="nav-text">
                            Doctors
                        </span>
                    </a>

                </li>
                <li class="has-subnav">
                    <a href="#">
                        <i class="fas fa-procedures fa-2x ff"></i>
                        <span class="nav-text">
                            Patients
                        </span>
                    </a>

                </li>
                <li>
                    <a href="..\admin\admin_calendar.php">
                        <i class="fa fa-calendar-alt fa-2x ff"></i>
                        <span class="nav-text">
                            Calender
                        </span>
                    </a>
                </li>
                <li>
                    <a href="..\admin\admin_appointments.php">
                        <i class="fas fa-notes-medical fa-2x ff"></i>
                        <span class="nav-text ">
                            Appointments
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cash-register  fa-2x ff"></i>
                        <span class="nav-text">
                            Payments
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-chart-pie fa-2x ff"></i>
                        <span class="nav-text">
                            Graphs and Statistics
                        </span>
                    </a>
                </li>
                <li>
                    <a href="..\admin\admin_settings.php">
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
        <!--end side navbar-->
    </div>



 <input id="patient_id" type="hidden" value="<?php echo $patient_id?>">

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
            <div class="rt-heading">
                <marquee width="50%" style="margin-left:20%"><h1 class="title h3 text-gray-800">Patient Profile</h1></marquee>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
                <div class="profile py-4">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="card shadow-sm">
                          <div class="card-header bg-transparent text-center">
                             <!--image-->
                           <img class="profile_img" id="profile_img" src="..\images/R.png" alt="patient dp">

                              <!--name-->
                            <h3 id="name"></h3>
                          </div>
                          <div class="card-body">
                            <p class="mb-0"><strong class="pr-1" id="phone_number"></strong></p>
                             <p class="mb-0"><strong class="pr-1" id="email"></strong></p>
                              
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="card shadow-sm">
                          <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                          </div>
                          <div class="card-body pt-0">
                            <table class="table table-bordered">
                              <tr>
                                <th width="30%">Number of family</th>
                                <td width="2%">:</td>
                                <td id="nb_of_family"></td>
                              </tr>
                              <tr>
                                <th width="30%">Employed or not</th>
                                <td width="2%">:</td>
                                <td id="employed"></td>
                              </tr>
                              <tr>
                                <th width="30%">Gender</th>
                                <td width="2%">:</td>
                                <td id="gender"></td>
                              </tr>
                              <tr>
                                <th width="30%">Age</th>
                                <td width="2%">:</td>
                                <td id="age"></td>
                              </tr>
                              <tr>
                                <th width="30%">Location</th>
                                <td width="2%">:</td>
                                <td id="location"></td>
                              </tr>
                            </table>
                          </div>
                        </div>

                       
                         <div style="height: 26px"></div>
                        <div class="card shadow-sm">
                          <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Description</h3>
                          </div>
                          <div class="card-body pt-0">
                              <p id="description"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

           
    		</div>
		</div>
    </div>
</section>
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