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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css/p_dashboard.css" rel="stylesheet" type="text/css">
    
    <link href="css\sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />

    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js\patient_dashboard.js"></script>
    <link href="../center/css/navbar.css" rel="stylesheet" type="text/css">
    <script src="js/navbarp.js"></script>

</head>
<body>
<div>
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

   <!-- <button class="btn btn-primary booknow" id="bookbtn">Book Now</button> -->
   
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

        <!-- //start content -->
        <div class="content">

            <!-- <h2 id="welcome_par"> WELCOME DOCTOR MOHAMMAD </h2> -->
            <marquee width="50%" id="welcome_par" style="margin-left:25%"><h1 class="h3 mb-4 text-gray-800">Welcome To Your Dashboard</h1></marquee>  




        <div class="table-div">
            <table class="table table-bordered table-striped mb-0">
                <thead>
                <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Start time</th>
                    <th scope="col">End time</th>
                    <th scope="col">amount</th>
                </tr>
                </thead>
                <tbody class="tbodyApp">

                <?php

                
                ?>
                
                </tbody>
            </table>
        </div>
                       <div class="empty">
                    <span>No Appointments</span>
                </div>
    
</body>



</html>