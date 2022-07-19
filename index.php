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
    <title>Free To Be</title>
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.css">
    <link href="center/css/navbar.css" rel="stylesheet" type="text/css">
    <link href="center/css/index.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" />

    <script src="bootstrap\jquery.min.js"></script>
    <script src="bootstrap\js\bootstrap.min.js"></script>
    <script src="center/js/index.js"></script>
    <script src="center/js/navbar.js"></script>

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
          <img class="logoImg" src="images/logo.png"/>
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
               <a href="index.php">Home</a>  
               
         </li>


          <li>
              <label for="btn-1" class="show"> Our Team</label>
               <a href="#">Our Team</a>
               <input type="checkbox" id="btn-1" class="navInputs">  
               <ul>
                   <li>  <a href="center/our_team.php#psychiatrist">Psychiatrists</a> </li>
                   <li>  <a href="center/our_team.php#psychologist">Psychologists</a> </li>
                   <li>  <a href="center/our_team.php">All</a> </li>
               </ul>
         </li>


          <li> 
              <label for="btn-2" class="show"> Pages  </label>
              <a href="#">Pages</a> 
              <input type="checkbox" id="btn-2" class="navInputs"> 
              <ul>
                  <li> <a href="center/personality_disorder.php">Personality disorder</a> </li>
                  <li> <a href="center/disorders.php">General disorder </a> </li>
                  <li> <a href="center/quiz.php">Take Quessionnare </a> </li>

              </ul>
         </li>
          <li>
               <label for="btn-3" class="show">   About</label>
               <a href="#">About</a>
               <input type="checkbox" id="btn-3" class="navInputs">
               <ul>
                  <li> <a href="center/aboutUs.php">About Us </a> </li>
                  <li> <a href="center/contactUs.php">Contact Us </a> </li>
                  <li> <a id="NavBookApp" href="#">Book Appointment </a> </li>

              </ul>
         </li>
     
      </ul>

      <button class="btn btn-primary booknow" id="bookbtn">Book Now</button>
      
      <img src="images/R.png"  class="userImg" style="display:none"/>
      <ul class="userul" style="margin-right:0px !important;">
      <li id="userLi" class="userli" style="display:none">
               <label for="btn-4" class="show">   Users Name</label>
               <a href="#"  id="usrName">Username</a>
               <input type="checkbox" id="btn-4" class="navInputs">
               <ul>
                  <li> <a href="patients/patient_dashboard.php">My Profile </a> </li>
                  <li> <a href="patients/patient_settings.php">Account Settings </a> </li>
                  <li> <a href="#" id="logout">LogOut </a> </li>

              </ul>
         </li>
</ul>
      

<ul class="userul login" style="margin-right:0px !important; display:none;">
      <li id="userLi"  >
               <label for="btn-4" class="show">LOGIN</label>
               <a href="login_register/login.php">LOGIN</a>
               <input type="checkbox" id="btn-4" class="navInputs">
             
         </li>
</ul>

   </nav>
   <!-- end of nav -->

   <!-- team image with booking btn -->
   <div class="imgContainer">
     <img src="images/ourTeam.jpg" id="teamImage"   ><br>
   </div>
   <input id="UIDinput"  type="hidden" class="userHiddenId" value="<?php echo $id;?>"  />

   <h2 id="offerH2"> We Offer The Best Support for You, With <span id="offerspan"> Whatever You Need. </span> <hr></h2>
   
   <!-- four spec parent div -->
   <!-- on licnk h2 click : redirect to general disorders page with filtering to the clicked link -->
   <div id="fourspecialitiesDiv" > 
 
        <div class="   fourspec col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="images/child_therapy.jpg" alt="">
                    <div class="overlay  ">
                        <!-- CHILD THERAPY -->
                        
                        
                        <a  href="center/disorders.php" class="stretched-link typelink"> CHILD THERAPY</a>
                            <br><br>
                        <ul class="disList">
                            <li>ADHD</li>
                            <li>ANXIETY DISORDER</li>
                            <li>BEHAVIOR PROBLEMS </li>
                            <li>DEPRESSION</li>
                        </ul>
                        <p>
                            <!-- <a href="#">LINK HERE</a> -->
                        </p>
                    </div>
            </div>
        </div>

        <div class=" fourspec col-lg-3 col-md-2 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="images/individual_therapy.jpg" alt="">
                    <div class="overlay">
                         <a  href="center/disorders.php" class="stretched-link typelink">INDIVIDUAL THERAPY</a> 
                         <br><br>
                        <ul class="disList">
                            <li>PHOBIAS</li>
                            <li>ANXIETY DISORDER</li>
                            <li>EATING DISORDER </li>
                            <li>PTSD</li>
                        </ul>
                        <p>
                            <!-- <a href="#">LINK HERE</a> -->
                        </p>
                    </div>
            </div>
        </div>

        <div class="fourspec col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive" src="images/cpl3.jpg" alt="">
                    <div class="overlay">
                    <a  href="center/disorders.php" class="stretched-link typelink">COUPLE THERAPY</a> 
                    <br><br>
                        <ul class="disList">
                            <li>PARENTING</li>
                            <li>ADOPTION</li>
                            <li>GENREAL ANXIETY </li>
                            <li>PTSD</li>
                        </ul>
                        <p>
                            <a href="#">LINK HERE</a>
                        </p>
                    </div>
            </div>
        </div>

        <div class="fourspec col-lg-3 col-md-4 col-sm-6 col-xs-12"  >
            <div class="hovereffect">
                <img class="img-responsive" src="images/fam_therapy.jpg" alt="">
                    <div class="overlay">
                    <a  href="center/disorders.php" class="stretched-link typelink">FAMILY THERAPY</a>
                     <br><br>
                        <ul class="disList">
                            <li>AUTISM</li>
                            <li>SCHIZOPHRENIA</li>
                            <li>MAJOR DEPRESSION </li>
                            <li>DIVORCE</li>
                        </ul>
                        <p>
                            <a href="#">LINK HERE</a>
                        </p>
                    </div>
            </div>
        </div>
 </div>

      <br><br>
 
    <!-- about and image -->
    <div class="whoRwe  ">
        <img id="animImg" src="images/sess1.jpg"/>
        <div id="whorWeDiv">
            
            <h2 class="whoRweH2">WHO ARE WE? <hr></h2> 
            <p id="whoRweP">   Our clinic largest private mental health partnership, with a carefully selected nationwide team of Psychiatrists, Psychologists and Psychotherapists. We only work with highly experienced and capable partners who share our values.

           </p>
        </div>
    </div>

    <!-- <br> -->
    <!-- what do we offer -->
    <div id="offersDiv">

        <div id="offerTitle">
          <h2 class="whoRweH2">What Do We Offer?<hr></h2>
          <h3 class="texts">Treatments & Therapies </h3>
        </div>
        
        <div class="offerParent" >
                <!-- 3 cards about disorders -->
            <div class=" fourspec1 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect1">
                    <img class="img-responsive1" src="images/Humanistic Therapy.jpg" alt="">
                        <div class="overlay1">
                            <!-- <h2>Humanistic Therapy</h2> -->
                           <p class="pdesc">  Humanistic therapy is a mental health approach that emphasizes the importance of being your true self in order to lead the most fulfilling life.</p>
                            <p>
                            </p>
                        </div>
                </div>
                <h3 class="bottomname"> <p style="margin:0px">Humanistic</p> Therapy</h3>

                <a href="#" id="Humanistic Therapy" style="position:relative;"class="viewDrLink">View Doctors</a>
              

            </div>


            <div class="fourspec1 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect1">
                    <img class="img-responsive1" src="images/Psychoanalytic Therapy.jpg" alt="">
                        <div class="overlay1">
                            <!-- <h2>Psychoanalytic Therapy</h2> -->
                            <p  class="pdesc">Psychoanalytic therapy is a form of talk therapy. 
                                This approach explores how the unconscious mind influences your thoughts, feelings, and behaviors.</p>
                            <p>
                            <p>
                            </p>
                        </div>
                </div>
                <h3 class="bottomname">Psychoanalytic Therapy</h3>
                <a href="#"  id="Psychoanalytic Therapy" class="viewDrLink">View Doctors</a>

            </div>
         

            <div class="fourspec1 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="hovereffect1">
                    <img class="img-responsive1" src="images/Psychodynamic Therapy.png" alt="">
                        <div class="overlay1">
                            <!-- <h2>Psychodynamic Therapy</h2> -->
                            <p class="pdesc" >Psychodynamic therapy involves facilitation a deeper understanding of one's emotions.
                                 It works to help people gain greater insight into how they feel and think.</p>
                           <p>
                            </p>
                        </div>

                </div>
                
                <h3 class="bottomname">Psychodynamic Therapy</h3>
                <a href="#"  id="Psychodynamic Therapy" class="viewDrLink">View Doctors</a>

                </div>

                <div class="sidebar close"  >
                      <!-- <div class="side_arrow"></div> -->
                         <ul class="patients-links" id="ulp">

                      </ul>
                 </div>
    </div>


    <div class="statistics">
        <div class="parallax">
                <div class="inner-parallax">

                    <div class="valueDiv">
                      <i class="fas fa-user-md stIcon"></i>
                      <div class="value" id="nbOfDrs">  </div>
                      <p>In-House Doctors</p>
                    </div> 

                    <div  class="valueDiv">
                    <i class="fas fa-hand-holding-medical stIcon" ></i>
                      <div class="value" id="successfulCases">  989</div>
                      <p>Successful Cases</p>
                    </div> 

                    <div  class="valueDiv">
                      <i class="fas fa-calendar-check stIcon"></i> 
                      <div class="value" id="ExpYears">  45  </div>
                      <p>Years Of Experience</p>

                    </div> 


                </div>
         </div>
    </div>

    

   </div>


   <div  class="howDoesItwork">
      <h2 class="howH2">How Does It Work?</h2>

      <div class="howContainer">

          <div class="animatedAndP">
             <div class="animated"></div>
             <h3 class="howtitles">Take Quessionnare </h3>
               <p>A list of questions are used to gather data from   about your background, attitude, experiences. This Questionnaires is used to collect basic information that is crucial for your registration.</p>
            </div>

         <div class="animatedAndP ">

          <div class="animated"></div>
          <h3 class="howtitles">Choose Your Therapist </h3>

          <p>After answering the questions, you can choose what Doctors/psychotherapists are recommended for you and get matched based on your specific needs. The more precise you are the better the result will be. </p>

          </div>

          <div class="animatedAndP">

          <div class="animated  "></div>
          <h3 class="howtitles">Book An appointment!   </h3>

          <p> <span style="font-weight:600;"> Now you are all set up!</span> Booking an appointment is one step away, whenever you need you can book an appointment in the sessions available for your Doctor/ psychotherapist. </p>

</div>
      </div>
   
       
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

  include 'center/footer.php';
?>
 
</body>
</html>