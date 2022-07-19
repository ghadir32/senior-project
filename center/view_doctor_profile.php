<?php

 session_start();
if(isset($_SESSION["id_patient"]))
{
    $id=$_SESSION["id_patient"];
 
}	else
			header("Location:../login_register/login.php");

?>
<?php


    if(isset($_GET['doctor_id'])){
        $doctor_id=$_GET['doctor_id'];
	}
    else {
	    $doctor_id="";
    }

			

           
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Doctor Profile</title>

    <meta name="author" content="Codeconvey" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    
	<link rel="stylesheet" href="css/view_doctor_profile.css">
    <script src="js\view_doctor_profile.js"></script>
    <link rel="stylesheet" href="..\admin\css\sidebar.css">
</head>
<body>




 <input id="doctor_id" type="hidden" value="<?php echo $doctor_id?>">

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
            <div class="rt-heading">
                <marquee width="50%" style="margin-left:20%"><h1 class="title h3 text-gray-800">Doctor Profile</h1></marquee>
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
                            <img class="profile_img" id="profile_img" src="..\images/R.png" alt="doctor dp">

                              <!--name-->
                            <h3 id="name"></h3>
                          </div>
                          <div class="card-body">
                          <p class="mb-0"><strong class="pr-1" id="doctor_type"></strong></p>
                          <p class="mb-0"><strong class="pr-1" id="guild_number"></strong></p>
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
                                <th width="30%">Job Title</th>
                                <td width="2%">:</td>
                                <td id="job_title"></td>
                              </tr>
                              <tr>
                                <th width="30%">Education</th>
                                <td width="2%">:</td>
                                <td id="education"></td>
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

                            </table>
                          </div>
                        </div>

                        <div style="height: 26px"></div>
                        <div class="card shadow-sm">
                          <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Specialities</h3>
                          </div>
                          <div class="card-body pt-0">
                              <p id="specialities"></p>
                          </div>
                        </div>
                        <div style="height: 26px"></div>
                        <div class="card shadow-sm">
                          <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Experience</h3>
                          </div>
                          <div class="card-body pt-0">
                              <p id="experience"></p>
                          </div>
                        </div>
                          <div style="height: 26px"></div>
                        <div class="card shadow-sm">
                          <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Professional Statments</h3>
                          </div>
                          <div class="card-body pt-0">
                              <p id="professional_statments"></p>
                          </div>
                        </div>
                         <div style="height: 26px"></div>
                        <div class="card shadow-sm">
                          <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>About Himself</h3>
                          </div>
                          <div class="card-body pt-0">
                              <p id="About_yourself"></p>
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