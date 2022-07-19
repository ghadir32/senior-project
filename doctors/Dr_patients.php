<?php

session_start();

    if(isset($_GET['patient_id'])){
        $patient_id=$_GET['patient_id'];
	}
    else {
	    $patient_id="";
    }  
    
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
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Patients</title>
    <meta name="author" content="Codeconvey" />

    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css/Dr_patients.css" rel="stylesheet" type="text/css">
    <link href="css/sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js\patients.js"></script>
    <!-- <link rel="stylesheet" href="..\admin\css\sidebar.css"> -->
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
   

 <input id="patient_id" type="hidden" style="margin-left:20% !important" value="<?php echo $patient_id?>">

 
<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
            <div class="rt-heading">
                <marquee width="50%" style="margin-left:20%"><h1 class="title h3 text-gray-800">My Patient Profile</h1></marquee>
            </div>
        </div>
    </div>
</header>


 
 <!-- choose patient -->
     <h3>Select patient:</h3>
  
 
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Patient Name
  </button>
  <div class="dropdown-menu" id="dropdownn" aria-labelledby="dropdownMenuButton">
  </div>
</div>

<button class="btn btn-link" type="button" id="showAppBtn"   >
    Previous appointment details 
  </button>






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
                            <img class="profile_img"  id="patientimg" src="..\images/R.png" alt="patient dp">

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
                                <th width="30%">Number of family members</th>
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
                              <tr>
                                <th width="30%">Student or not</th>
                                <td width="2%">:</td>
                                <td id="stu"></td>
                              </tr><tr>
                                <th width="30%">History</th>
                                <td width="2%">:</td>
                                <td id="history"></td>
                              </tr><tr>
                                <th width="30%">City</th>
                                <td width="2%">:</td>
                                <td id="city"></td>
                              </tr><tr>
                                <th width="30%">Emergency contact</th>
                                <td width="2%">:</td>
                                <td id="emergency_nb"></td>
                              </tr><tr>
                                <th width="30%">Marital status</th>
                                <td width="2%">:</td>
                                <td id="marital_status"></td>
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

                        <!-- show apponintment details -->
                       <div style="height: 26px"></div>
                        <div class="card shadow-sm appointmentdetails" id="detdiv">
                          <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i> Appointment Details</h3>
                            <form>
                                <div class="multipleSelection">
                                    <div class="selectBox" 
                                        onclick="showCheckboxes()">
                                        <select style="border-radius: 5px; border-width: 2px;  background-color : #7CC1B2; ">
                                            <option >Appointment date</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                        
                                    <div id="checkBoxes">
                                    
                                    </div>
                                    <button class="btn btn-link" type="button" id="submitDate"   >
                                        View notes
                                    </button>  
                                </div>
                            </form>
                          

                            </div>
                          <div class="card-body pt-0">
                              <p id="AppDate" >Date: 2022-03-04</p>
                              <span>Appointment notes: </span>
                              <span id="Appdescription">sadasdasd</span>
                          </div>

                          <!-- write last session notes  -->
                          <div class="lastsessnotes">
                          <textarea rows="4"  id="txtareaNote" Placeholder="last session notes"></textarea>
                          <br>
                          <button type="button"  id="lastsessionNote" class="btn btn-light">Add Notes</button>

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

        ///////////dropdown dates
        var show = true;
  
  function showCheckboxes() {
      var checkboxes = 
          document.getElementById("checkBoxes");

      if (show) {
          checkboxes.style.display = "block";
          show = false;
      } else {
          checkboxes.style.display = "none";
          show = true;
      }
  }

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
    <script src="..\bootstrap\js\bootstrap.bundle.min.js"></script>


    
  
 
<!-- end body elements-->

 
</body>
</html>