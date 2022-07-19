<?php
 session_start();

if(isset($_SESSION["id_patient"]))
{
    $id=$_SESSION["id_patient"];
}
?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Form</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css/navbar.css" rel="stylesheet" type="text/css">
    <link href="css/pForm.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="../bootstrap\jquery.min.js"></script>
    <script src="../bootstrap\js\bootstrap.min.js"></script>
    <script src="js/navbarp.js"></script>
    <script src="js/patientFormFilling.js"></script>

    
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
   <input id="UIDinput"  type="hidden" class="userHiddenId" value="<?php echo $id;?>"  />

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
      
      <img src="../images/R.png"  class="userImg" style="display:none"/>
      <ul class="userul" style="margin-right:0px !important;">
      <li id="userLi" class="userli" style="display:none">
               <label for="btn-4" class="show">   Users Name</label>
               <a href="#">Users Name</a>
               <input type="checkbox" id="btn-4" class="navInputs">
               <ul>
                  <li> <a href="../patients/patient_dashboard.php">My Profile </a> </li>
                  <li> <a href="../patients/patient_settings.php">Account Settings </a> </li>
                  <li> <a href="#" id="logout">LogOut </a> </li>

              </ul>
         </li>
</ul>
      

<!-- <ul class="userul login" style="margin-right:0px !important; display:none;">
      <li id="userLi"  >
               <label for="btn-4" class="show">LOGIN</label>
               <a href="#">LOGIN</a>
               <input type="checkbox" id="btn-4" class="navInputs">
             
         </li>
</ul> -->

   </nav>
   <!-- end of nav -->


   <h2 id="topline"  class="inputTitles">WELCOME! please fill in the folowing form and you are ready to book your First appointment!</h2>

    <!-- start of data filling form -->
    <div class="formDiv">

      <h2 class="centerr  inputTitles ">Referral Form for a Psychological Assessment<br>
    <span style="font-size:1.7vw; color:grey;" class="inputTitles">  Private, confidential, and without prejudice </span></h2>
      <p class="topP" >For most efficient and timely service, please be as specific as you could. The more specific you are, the more helpfull you will be to get the therapy you need from our specialists.
          *These data are private and only accessed by your doctor*
        </p>


        <div>
            <p class="alert alert-danger" style="display:none;" id="warningp"> Please Fill in all the following data. If you leave this page without submitting your data will be lost.</p>
            <form method="post">
            <br><h3 class="inputTitles">Full Name</h3><br>
                <div class="row">
                    
                    <!-- full name -->
                    <div class="col">
                    <input type="text" class="form-control" id="fname" placeholder="First name">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" id="mname" placeholder="Middle name">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" id="lname" placeholder="Last name">
                    </div>
                </div>

                <!-- date of birth -->
                <br>
                <h3 style="display:inline; margin-right:5%;"  class="inputTitles">Date Of Birth: </h3>
                <input type="date" id="birthday" class="moveup" name="birthday">
                <br>

                   <!-- gender -->
                   <br/>
                <h3 style="display:inline; margin-right:5%;"  class="inputTitles">Gender: </h3>
                <div class="form-check inputemp"   >
                    <input class="form-check-input  " type="radio" value="Female"  name="gender"    >
                    <label class="form-check-label moveup  " >
                        Female
                    </label>
                    </div>
                    <div class="form-check inputemp"  >
                    <input class="form-check-input  " type="radio" value="Male" name="gender"   checked>
                    <label class="form-check-label moveup" > Male </label>
                </div><br>
                
                <!-- employement -->
                <br/>
                <h3 style="display:inline; margin-right:5%;"  class="inputTitles">Employed: </h3>
                <div class="form-check inputemp"   >
                    <input class="form-check-input empp" type="radio" value="Yes"  name="Employed" id="emp"  >
                    <label class="form-check-label moveup  " >
                        Yes
                    </label>
                    </div>
                    <div class="form-check inputemp"  >
                    <input class="form-check-input empp" type="radio" value="No" name="Employed" id="No" checked>
                    <label class="form-check-label moveup" > No </label>
                </div>


                 <!-- student -->
                 <br/> <br> 
                <h3 style="display:inline; margin-right:5%;"  class="inputTitles">Student  : </h3>
                <div class="form-check inputemp"   >
                    <input class="form-check-input" type="radio" name="Student" id="stu" value="Yes" checked >
                    <label class="form-check-label moveup"  >
                        Yes
                    </label>
                    </div>
                    <div class="form-check inputemp"  >
                    <input class="form-check-input" type="radio" name="Student" id="notstu" value="No">
                    <label class="form-check-label moveup"  > No </label>
                </div>

                <!-- phone number -->
                <br/><br>
                <h3 style="display:inline; margin-right:5%;"  class="inputTitles">Phone number : </h3>
                <!-- <label for="phone">Enter your phone number:</label><br><br> -->
                 <input type="tel" id="phone" name="phone" placeholder="12-345-678" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}" required> 
                 <small>Format: 12-345-678</small><br><br>

                <!-- patient history -->
                <div class="form-group">
                    <h3 style="display:inline; margin-right:5%; margin-bottom:2%;"  class="inputTitles">History : </h3>
                    <textarea style="  margin-top: 1%;" class="form-control" id="HistoryTxtArea" placeholder="(Summary of psychosocial and medical information(with examination dates)and past treatment;include any past psychological testing,date and results,medical,psychiatric and neurological exam)" rows="3"></textarea>
                 </div>

                 <!-- city and address -->
                 <div class="form-group col-md-6" style="display:inline-block;">
                       <label for="inputCity"  class="inputTitles">City:</label>
                       <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-6" style="display:inline-block;">
                       <label for="inputCity"  class="inputTitles">Address:</label>
                       <input type="text" class="form-control" id="inputAddress">
                </div>

                <!-- family members -->
                <br><br>
                <h4 style="display:inline-block; margin-right:5%;"  class="inputTitles">Number Of Family Members(You included):</h4>
                <input  style="display:inline-block;" id="famNb" type="number" class="form-control form-group col-md-2"/>


                  <!-- patient reason of referral -->
                  <br><br>
                  <div class="form-group">
                    <h3 style="display:inline; margin-right:5%; margin-bottom:2%;"  class="inputTitles">Reason(s) for this referral: </h3>
                    <textarea style="  margin-top: 1%;" class="form-control" id="referralreason" placeholder="(Summary of the reasons you are seeking psychological health. and description about your state..." rows="3"></textarea>
                 </div>



                  <!-- emergency phone number -->
                <br/><br>
                <h3 style="display:inline; margin-right:5%;"  class="inputTitles">Emergency Contact number : </h3>
                <!-- <label for="phone">Enter your phone number:</label><br><br> -->
                 <input type="tel" id="Emergencyphone" name="emergencyPhone" placeholder="12-345-678" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}" required> 
                 <small>Format: 12-345-678</small><br><br>


                 <!-- marital status -->
                 <div class="form-group col-md-4">
                    <label for="inputState"  class="inputTitles">Marital Status</label>
                    <select  name="maritalStatus" id="inputMaritalState" class="form-control mar">
                        <option selected value="choose">Choose...</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widow/er">Widow/er</option>

                    </select>
                </div>

















                <input type="submit" value="Submit" id="submitbtn" class="btn btn-primary submitAll">

            </form>




        </div>







    <!-- end of data filling form -->
    </div>




 


































   




  
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