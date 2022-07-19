<?php

 session_start();
if(isset($_SESSION["id_patient"]))
{
    $id=$_SESSION["id_patient"];
 
} 
?>


<!DOCTYPE html>
<html>

<head>

    <title>Our Team</title>

    <link rel="stylesheet" href="./CSS/our_team.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />

    <link href="css/navbar.css" rel="stylesheet" type="text/css">

    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <link href="css/navbar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />
    <script src="js\our_team.js"></script>
    <script src="js/navbarp.js"></script>

</head>

<body>

 
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
                <li>  <a href="our_team.php#psychiatrist">Psychiatrists</a> </li>
                <li>  <a href="our_team.php#psychologist">Psychologists</a> </li>
                <li>  <a href="our_team.php">All</a> </li>
            </ul>
      </li>


       <li> 
           <label for="btn-2" class="show"> Pages  </label>
           <a href="#">Pages</a> 
           <input type="checkbox" id="btn-2" class="navInputs"> 
           <ul>
               <li> <a href="personality_disorder.php">Personality disorder</a> </li>
               <li> <a href="disorders.php">General disorder </a> </li>
               <li> <a href="quiz.php">Take Quessionnare </a> </li>

           </ul>
      </li>
       <li>
            <label for="btn-3" class="show">   About</label>
            <a href="#">About</a>
            <input type="checkbox" id="btn-3" class="navInputs">
            <ul>
               <li> <a href="aboutUs.php">About Us </a> </li>
               <li> <a href="contactUs.php">Contact Us </a> </li>
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

   <button class="btn btn-primary booknow" id="bookbtn">Book Now</button>
   
   <img src="../images/R.png"  class="userImg" style="display:none"/>
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
   

<ul class="userul login" style="margin-right:0px !important; display:none;">
   <li id="userLi"  >
            <label for="btn-4" class="show">LOGIN</label>
            <a href="../login_register/login.php">LOGIN</a>
            <input type="checkbox" id="btn-4" class="navInputs">
          
      </li>
</ul>

</nav>
<!-- end of nav -->

   <input id="UIDinput"  type="hidden" class="userHiddenId" value="<?php echo $id;?>"  />


<section class="team-section">
        <h1>Our Doctors</h1>
        <div class="team-inner-div">
            <h2 id="psychologist">Psychologe</h2>
            <div class="team-dr-div">
                
                
                        <!-- <div class="team-item" id="card_Psychologe"> -->
                            <!-- <div class="team-item-inner-div">
                                <a href="#" class="link-wraper-section">
                                <div class="team-dr-inside-div">
                                    <div class="team-content-div">
                                        <div class="team-dr-image-div">
                                            <img src="./WhatsApp Image 2022-05-20 at 11.27.53 PM.jpeg" alt="">
                                        </div>
                                        <p class="dr-item-title">Dr bahle</p>

                                        
                                    </div>  
                                <a href="##" class="dr-item-button">Profile</a>
                                </a>
                               
                                    
                                </div>
                            </div>-->
                        <!-- </div>  -->
                    
                    
            </div>           

            

        </div>



        <div class="team-inner-div">
        <h2 id="psychiatrist">Psychiatrist</h2>
            <div class="team-dr2-div">
                
                
                <!-- <div class="team-item" id="card_Psychiatrist"> -->
                            <!--<div class="team-item-inner-div">
                                <a href="#" class="link-wraper-section">
                                    <div class="team-dr-inside-div">
                                        <div class="team-content-div">
                                            <div class="team-dr-image-div">
                                                <img src="../images/mental_health_logo (2).jpg" alt="">
                                            </div>
                                            <p class="dr-item-title">Dr zake</p>

                                        
                                        </div>  
                                    <a href="##" class="dr-item-button">Profile</a>
                                </a>
                               
                                    
                                </div>
                            </div>-->
                        <!-- </div> -->
            </div>

        </div>
    
</section>



<script type="text/javascript">
       var HeaderHeight = $('header').height();
       var navbar = document.querySelector("nav");
       var toph = document.getElementById('b4Nav');

      $(window).scroll(function(){

        let scrollPosition = window.pageYOffset;
        // alert(window.getComputedStyle(toph).display);
        if(window.getComputedStyle(toph).display == "flex"){
           if(scrollPosition > HeaderHeight){      
              $('.navBar').addClass('fixed');
              navbar.classList.toggle("sticky", window.scrollY > 0);

           }else{
            $('.navBar').removeClass('fixed'); 
           }
        }
           navbar.classList.toggle("sticky", window.scrollY > 0);
       });


       

   </script>
<?php

include 'footer2.php';
?>

</body>

</html>