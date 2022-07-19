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
    <title>Profile</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css/Dr_profile.css" rel="stylesheet" type="text/css">
    <!-- <link href="css\Dr_calendar.css" rel="stylesheet" type="text/css"> -->
    <link href="css\sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
     <!-- <script src="js\calendar.js"></script> -->
     <script src="js\Drimage.js"></script>
     <script src="js\profile.js"></script>

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

    <div id="content">
        <h2 id="DR_name_h2"></h2>

        <div class="image_div">
          <img   id="dr_image" class="rounded-circle dr_image"><br>
          <div class="edit_i_div">   <i class="fas fa-pen  editt edit_img">  <input type="file"  value="change img" style=" opacity: 0;"id="myfile" name="myfile"> 
</i> </div>
          <div class="gender_price">
              

                <!-- price per session -->
                <div>
                    <span for="gender" id="div_title" >Price: </span><br>
                    <span id="session_price" class="price_span"></span> 
                    <span class="per_session">/Per Session</span>
                </div>
                <br>

                   <!-- email -->
                 <div class="form-group">
                    <label id="div_title">Contact email address: </label>
                    <span id="email"></span>          <div id="editemaildiv">   <i class="fas fa-pen  editt editEmail"   ></i> </div>
                    <input type="email" class="form-control" id="InputEmail"   placeholder="Enter email">
                 </div>
                 <p class="text-danger">*Disclaimer: If one of the following fields is kept empty your profile will not be available to the public on this website*</p>

                   <!-- phone number -->
                   <!-- <div class="form-group">
                    <label  id="div_title">Phone number: </label>
                    <span id="phone">
                    <i class="fas fa-pen  editt edit_phone"   ></i> </span>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                 </div> -->

          </div>

        </div>


        <!-- job title -->
        <div id="job_title_div" class="new_div" >
             <div class="form-group">
              <label for="job title" id="div_title" class="label_title">Job Title <div class="edit_i_div"> <i class="fas fa-pen  editt"   ></i> </div> </label>  <br>

              <textarea disabled class="text-areaa" id="jotTitle_txt"placeholder="" ></textarea>
              <textarea class="col-8 edit_text-area" id="job" placeholder="A breif description about your job and specifications in the main disorders or disease you work with." rows="2" ></textarea>
               <hr class="textbox_hr">
            </div>
        </div>

        <!-- professional statement -->
        <div id="prof_sttmnt_div" class="new_div">
            <div class="form-group">
              <label for="Professional statement" id="div_title" >Professional statement <div class="edit_i_div"> <i class="fas fa-pen  editt"   ></i> </div> </label>   <br>

               <textarea disabled class="text-areaa" id="proffStatement_txt"  placeholder=""  ></textarea>
               <textarea class=" col-8 edit_text-area" id="prof_sttmnt" placeholder="A breif sentence about your profession, your work. what you aim for and how is your strategy." rows="2" ></textarea>
               <hr class="textbox_hr">
            </div>
        </div>

        <!-- existing speciality alert -->
        <div class="alert alert-light" role="alert" id="alert-light">
           This speciality already exists...
        </div>


       <!-- speciality -->
        <div id="specialities_div" class="specialities new_div" >

                <div class="form-group" id="dr_spec">
                    <label for="Speciality" id="div_title" >Speciality
                        <div class="edit_i_div">
                          <i class="fas fa-pen  editt edit_speciality"  ></i>
                        </div> 
                    </label> 

                    <p id="no_spec"> No chosen specialities yet, click edit icon above to add.</p>
                    <!-- specialities in divs -->
                    <div id="specialities_chosen" class="spec_chosen ">  </div>

                </div>
                <!-- end chosen spec. -->

                    
                 <!-- start choosing spec. -->
             <div class="container spec_container " id="spec_container" >
                   <label for="speciality" id="div_title" >Speciality  </label><br>

                    <!-- specialities in divs -->
                    <div id="specialities_chosing"  class="choosing_spec"> </div>

                    <input type="text" class="form-control search_input" placeholder="e.g. Trauma" id="search_id"/>

                    <ul class="list-group overflow-auto spec_ul" id="tests" >
                    
                    </ul>
             </div>
             <hr class="textbox_hr">

            <!-- end choosing spec. -->

        </div>


       
      <br>
      <!-- About yourself statement -->
      <div id="About_yourself_div" class="new_div">
            <div>
              <label for="About Yourself" id="div_title" >About Yourself <div class="edit_i_div"> <i class="fas fa-pen  editt"  style="" ></i> </div> </label>
              <br>
              <textarea disabled class="text-areaa" id="AbtYourself_txt"  placeholder=""   ></textarea>
              <textarea class=" col-8 edit_text-area" id="about_urslef" placeholder="Describe yourself and your background. some cases you have witnessed and how you like to deal with it." rows="2" ></textarea>
              <hr class="textbox_hr">
            </div>
     </div>


     <br>

        <!-- second part of content -->
        <h2>Qualifications and experience</h2>

     <!-- education statement -->
     <div id="education_div" class="new_div">
            <div class="form-group">
                <label for="Education" id="div_title" >Education<div class="edit_i_div"> <i class="fas fa-pen  editt"  style="" ></i> </div> </label>
                <br>
                <textarea disabled class="text-areaa" id="education_txt"  placeholder="" ></textarea>
                <textarea class=" col-8 edit_text-area" id="edu" placeholder="list your educations and certificates you have earned. some bootcamps you have attended." rows="2" ></textarea>
                <hr class="textbox_hr">
            </div>
     </div>


         <!-- experience statement -->
      <div id="experience_div" class="new_div">
            <div class="form-group">
                <label for="Experience" id="div_title" >Experience<div class="edit_i_div"> <i class="fas fa-pen  editt"  style="" ></i> </div> </label>
                <br>
                <textarea disabled class="text-areaa" id="experience_txt"  placeholder=""   ></textarea>
                <textarea class=" col-8 edit_text-area" id="experience" placeholder=" Talk briefly about your work at: clinical psychology, psychology consultant, assistant, coach. working at XYZ hospital on year YYYY." rows="2" ></textarea>
                <hr class="textbox_hr">
            </div>
     </div>

        

    <br>

    <p class="text-danger incompleteData">*YOUR DATA IS INCOMPLETE*</p>
    <p class="text-success completeData">*YOUR PROFILE IS COMPLETE AND VALID ON THIS WEBSITE*</p>


    <button type="button"  id="submitDrProfile" class="btn btn-success">Submit All</button>

    
  </div>

 

  
<!-- end body elements-->

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