<?php

 session_start();
if(isset($_SESSION["id_patient"]))
{
    $id=$_SESSION["id_patient"];
 
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
    <script src="js\patient_settings.js"></script>
    <link href="../center/css/navbar.css" rel="stylesheet" type="text/css">

    <script src="js/navbarp.js"></script>

</head>
<body>
         <input id="UIDinput"  class="userHiddenId" type="hidden" value="<?php echo $id;?>"  />    


         
 
<header id="b4Nav">
    <div>
     <i  class=" topicons fas fa-clock"></i>open: 8:00AM-3:30pm 
    </div>
    <span> <i class="topicons fas fa-envelope"></i>Free2be@gmail.com</span>
    <span> <i class="topicons fas fa-map-marked-alt"></i> Nabatieh, buildingXYZ</span>
    <span><i class="topicons fas fa-phone-alt"></i> 76 662 226</span>
</header>

<nav class="navBar">
   <div id="logo">
       <img class="logoImg" src="../images/logo.png"/>
       <span class="centerName">FREE TO BE</span>

   </div>

   <label for="btn" class="menuIcon">
       <span class="fa fa-bars"></span>
   </label>

   <input type="checkbox" id="btn" class="navInputs">  
   <!-- pages in nav bar -->
   <ul>

       <li>
           <label  class="show"> Home</label>
            <a href="../index.php">Home</a>  
            
      </li>


       <li>
           <label for="btn-1" class="show"> Our Team</label>
            <a href="#">Our Team</a>
            <input type="checkbox" id="btn-1" class="navInputs">  
            <ul>
                <li>  <a href="../center/our_team.php#psychiatrist">Psychiatrists</a> </li>
                <li>  <a href="../center/our_team.php#psychologist">Psychologists</a> </li>
                <li>  <a href="../center/our_team.php">All</a> </li>
            </ul>
      </li>


       <li> 
           <label for="btn-2" class="show"> Pages  </label>
           <a href="#">Pages</a> 
           <input type="checkbox" id="btn-2" class="navInputs"> 
           <ul>
               <li> <a href="../center/personality_disorder.php">Personality disorder</a> </li>
               <li> <a href="../center/disorders.php">General disorder </a> </li>
               <li> <a href="../center/quiz.php">Take Quessionnare </a> </li>

           </ul>
      </li>
      <!-- <button class="btn btn-primary booknow" id="bookbtn">Book Now</button> -->

       <li style="padding-right: 350px !important;">
            <label for="btn-3" class="show">   About</label>
            <a href="#">About</a>
            <input type="checkbox" id="btn-3" class="navInputs">
            <ul>
               <li> <a href="../center/aboutUs.php">About Us </a> </li>
               <li> <a href="../center/contactUs.php">Contact Us </a> </li>
               <li> <a id="NavBookApp" href="#">Book Appointment </a> </li>

           </ul>
      </li>
      <!-- <li id="userLi">
            <label for="btn-4" class="show">   Users Name</label>
            <a href="#">Users Name</a>
            <input type="checkbox" id="btn-4" class="navInputs">
            <ul>
               <li> <a href="#">My Profile </a> </li>
               <li> <a href="#">Account Settings </a> </li>
               <li> <a href="#">LogOut </a> </li>

           </ul>
      </li> -->
   </ul>

   
   <ul class="userul" style="margin-right:0px !important;">
   <li id="userLi" class="userli" style="display:none">
            <label for="btn-4" class="show">   Users Name</label>
            <a href="#" id="usrName">Users Name</a>
            <input type="checkbox" id="btn-4" class="navInputs">
            <ul>
               <li> <a href="../patients/patient_dashboard.php">My Profile </a> </li>
               <li> <a href="../patients/patient_settings.php">Account Settings </a> </li>
               <li> <a href="#" id="logout">LogOut </a> </li>

           </ul>
      </li>
</ul>
   
<img src="../images/R.png"  class="userImg" style="display:none"/>


<ul class="userul login" style="margin-right:0px !important; display:none;">
   <li id="userLi"  >
            <label for="btn-4" class="show">LOGIN</label>
            <a href="../login_register/login.php">LOGIN</a>
            <input type="checkbox" id="btn-4" class="navInputs">
          
      </li>
</ul>

</nav>
<!-- end of nav -->



    <!--body-->
    <div id="content">


        <marquee width="50%" style="margin-left:20%"><h1 class="h3  text-gray-800">Settings</h1></marquee>
        <!-- div with all settings -->
        <div id="settings">
            <h4 class="mb-3">Account Settings</h4>

           <div class="image_div">
            <img   id="patient_image" class="rounded-circle dr_image">
           <label for="file">
              <i class="fas fa-pen  editt edit_img"></i> 
              <input type="file"  value="change img" style="display:none" id="file" name="file"> 
              
           </label>


        </div>
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


       
        <!-- settings end -->
    </div>
        <script type="text/javascript">

        
    </script>
    <script src="..\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>
</html>