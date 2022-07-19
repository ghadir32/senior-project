<?php

 session_start();
if(isset($_SESSION["id_patient"]))
{
    $id=$_SESSION["id_patient"];
 
}
else{
    header("location:../login_register/login.php");
}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Make Appointment</title>


    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />

    <script src="../bootstrap\jquery.min.js"></script>
    <script src="../bootstrap\js\bootstrap.min.js"></script>
 
    <link href="css/patient_make_appointment.css" rel="stylesheet" type="text/css">

    <script src="js\patient_make_appointment.js"></script>


    
</head>
<body>
   <input id="user_id"  class="userHiddenId" type="hidden" value="<?php echo $id;?>"  />
    <header id="b4Nav">
        <div>
            <i class=" topicons fas fa-clock"></i>open: 8:00AM-3:30pm
        </div>
        <span> <i class="topicons fas fa-envelope"></i>Free2be@gmail.com</span>
        <span> <i class="topicons fas fa-map-marked-alt"></i> Nabatieh, buildingXYZ</span>
        <span><i class="topicons fas fa-phone-alt"></i> 76 662 226</span>
    </header>

    <nav class="navBar">
        <div id="logo">
            <img class="logoImg" src="../images/logo.png" />
            <span class="centerName">FREE TO BE</span>

        </div>

        <label for="btn" class="menuIcon">
            <span class="fa fa-bars"></span>
        </label>

        <input type="checkbox" id="btn" class="navInputs">
        <!-- pages in nav bar -->
        <ul>

            <li>
                <label class="showw"> Home</label>
                <a href="../index.php">Home</a>  

            </li>


            <li>
                <label for="btn-1" class="showw"> Our Team</label>
                <a href="#">Our Team</a>
                <input type="checkbox" id="btn-1" class="navInputs">
                <ul>
                    <li>  <a href="our_team.php#psychiatrist">Psychiatrists</a> </li>
                    <li>  <a href="our_team.php#psychologist">Psychologists</a> </li>
                    <li>  <a href="our_team.php">All</a> </li>
                </ul>
            </li>


            <li>
                <label for="btn-2" class="showw"> Pages  </label>
                <a href="#">Pages</a>
                <input type="checkbox" id="btn-2" class="navInputs">
                <ul>
                <li> <a href="personality_disorder.php">Personality disorder</a> </li>
               <li> <a href="disorders.php">General disorder </a> </li>
               <li> <a href="quiz.php">Take Quessionnare </a> </li>

                </ul>
            </li>
            <li style="padding-right: 350px !important;">
                <label for="btn-3" class="showw">   About</label>
                <a href="#">About</a>
                <input type="checkbox" id="btn-3" class="navInputs">
                <ul>
                    <li> <a href="aboutUs.php">About Us </a> </li>
                    <li> <a href="contactUs.php">Contact Us </a> </li>
                    <li> <a href="#">Book Appointment </a> </li>

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

        <!--  <button class="btn btn-primary booknow" id="bookbtn">Book Now</button> -->

        <ul class="userul" style="margin-right:0px !important;">
            <li id="userLi" class="userli" style="display:none">
                <label for="btn-4" class="showw">   Users Name</label>
                <a href="#"  id="usrName">Users Name</a>
                <input type="checkbox" id="btn-4" class="navInputs">
                <ul>
                    <li> <a href="../patients/patient_dashboard.php">My Profile </a> </li>
                    <li> <a href="../patients/patient_settings.php">Account Settings </a> </li>
                    <li> <a href="#" id="logout">LogOut </a> </li>

                </ul>
            </li>
        </ul>
        <img src="../images/R.png" class="userImg" style="display:none; " />



        <ul class="userul login" style="margin-right:0px !important; display:none;">
            <li id="userLi">
                <label for="btn-4" class="showw">LOGIN</label>
                <a href="#">LOGIN</a>
                <input type="checkbox" id="btn-4" class="navInputs">

            </li>
        </ul>

    </nav>
    <!-- end of nav -->



    <div class="msg" id="msg"></div>
    <div class="login-box">
        <h2>Book Appointment</h2>
        <form id="form_app">
            <div class="mb-3">
                Doctor:
                <input list="selectdoctor" id="selectdoctorvalue" name="myBrowser" class="form-control" placeholder="Select Doctor" />

                <datalist id="selectdoctor">
                </datalist>

                <p class="text-left text-danger mt-2" id="p0"></p>
            </div>
             <input type="hidden" id="duration">
              <input type="hidden" id="session_price">
            <div class="mb-3">
                <span>
                    Date:
                    <select id="appointment_date" name="myBrowser" class="form-control" placeholder="date">
                        <option value="">date</option>

                    </select>

                </span>
                <p class="text-left text-danger mt-2" id="p2"></p>
            </div>
            <div class="mb-3">
                <span>
                    Time:
                    <select id="appointment_start_time" name="myBrowser" class="form-control ct" placeholder="Time">
                        <option value="">Time</option>

                    </select>

                </span>
                <p class="text-left text-danger mt-2" id="p3"></p>
            </div>
           


            <button type="button" id="book_now" >
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                BOOK NOW
            </button>
        </form>
    </div>



         <!-- modal -->
   <div class="modal" id="myModal" >
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Confirm booking Appointment</h5>    
            </div>
            <div class="modal-body  row">



                <div class="book_info col">
                 <img id="Doctor_image_info"/>
                 <p class="inf" id="Doctor_name_info"></p>
                 <p >Appointment date: <span class="inf" id="appointment_date_info">    </span></p>
                 <p >Appointment time: <span class="inf" id="appointment_time_info">    </span> </p>
                 <p >Session price: <span class="inf" id="session_price_info">    </span></p>


                </div>
                <div class="payment_info col">
                       <form method="post" onsubmit="" id="form">
                       <div class="pay_method">
                        <input class="card" id="visa" type="button" name="card" value="">
                        <input class="card" id="mastercard" type="button" name="card" value="">
                        <input type="hidden" id="pay_method_type">
                       </div>
                         <p class="text-left text-danger mt-2" id="p4"></p>

                         <input type="number" placeholder="card number" class="form-control" id="card_number"/>
                           <p class="text-left text-danger mt-2" id="p5"></p>

                         <input type="password" placeholder="password" class="form-control" id="password"/>
                           <p class="text-left text-danger mt-2" id="p6"></p>

                          <input type="email" placeholder="email" class="form-control" id="email"/>
                            <p class="text-left text-danger mt-2" id="p7"></p>

                            <input type="number" placeholder="phone" class="form-control" id="phone"/>
                          <p class="text-left text-danger mt-2" id="p8"></p>

                           <button type="button" id="checkout">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                BOOK NOW
                           </button>
                    </form>
                
                
                
                </div>



                </div>

            </div>
        </div>
    </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="..\bootstrap\js\bootstrap.bundle.min.js"></script>
 <?php
include 'footer2.php';
?>
<script src="js/navbarp.js"></script>

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
</body>
</html>