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
    <title>General Disorders</title>

    <link rel="stylesheet" href="css/disorders.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <link href="css/navbar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />
    <script src="../bootstrap\jquery.min.js"></script>
    <script src="../bootstrap\js\bootstrap.min.js"></script>
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

    <section class="body-protrait">

        <div class="body-portrait-container">
            <div class="body-portrait-header">
                <H2>Some popular disorders</H2>



            </div>

        </div>

        <div class="body-disorders">
            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Drepression :</h1>
                </div>

                <div class="disorder-description">
                    <p>Depression is a mental state of low mood and aversion to activity. Classified medically as a mental and behavioral disorder, the experience of depression affects a person's thoughts, behavior, motivation, feelings, and sense of well-being.
                        The core symptom of depression is said to be anhedonia, which refers to loss of interest or a loss of feeling of pleasure in certain activities that usually bring joy to people</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Anxiety :</h1>
                </div>

                <div class="disorder-description">
                    <p>Anxiety is an emotion characterized by an unpleasant state of inner turmoil and includes subjectively unpleasant feelings of dread over anticipated events. It is often accompanied by nervous behavior such as pacing back and forth,
                        somatic complaints, and rumination.</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Narcissism :</h1>
                </div>

                <div class="disorder-description">
                    <p>Narcissism is a self-centered personality style characterized as having an excessive interest in one's physical appearance and an excessive preoccupation with one's own needs, often at the expense of others. It is human nature for
                        people to be selfish and narcissism exists on a spectrum that ranges from normal to abnormal personality expression. There is a significant difference between normal, healthy levels of narcissism and people who are difficult/self-absorbed,
                        or people having a pathological mental illness</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Phobia :</h1>
                </div>

                <div class="disorder-description">
                    <p>A phobia is an anxiety disorder defined by a persistent and excessive fear of an object or situation. Phobias typically result in a rapid onset of fear and are usually present for more than six months. Those affected go to great lengths
                        to avoid the situation or object, to a degree greater than the actual danger posed. If the object or situation cannot be avoided, they experience significant distress</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Bipolar affective :</h1>
                </div>

                <div class="disorder-description">
                    <p>Bipolar disorder, previously known as manic depression, is a mood disorder characterized by periods of depression and periods of abnormally-elevated happiness that last from days to weeks each. If the elevated mood is severe or associated
                        with psychosis, it is called mania; if it is less severe, it is called hypomania.</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Paranoia :</h1>
                </div>

                <div class="disorder-description">
                    <p>Paranoia is an instinct or thought process that is believed to be heavily influenced by anxiety or fear, often to the point of delusion and irrationality. Paranoid thinking typically includes persecutory beliefs, or beliefs of conspiracy
                        concerning a perceived threat towards oneself (i.e. "Everyone is out to get me"). Paranoia is distinct from phobias, which also involve irrational fear, but usually no blame.</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>PTSD :</h1>
                </div>

                <div class="disorder-description">
                    <p>Post-traumatic stress disorder (sometimes also written Posttraumatic stress disorder, often shortened to PTSD) is an anxiety disorder. It can develop when people are severely harmed, or experience something extremely upsetting. PTSD
                        is different from traumatic stress, which is less intense and shorter, and combat stress reaction, which happens to soldiers in wartime situations and usually goes away. PTSD has been recognized in the past by different names,
                        like shell shock, traumatic war neurosis, or post-traumatic stress syndrome (PTSS).</p>
                </div>

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
<script src="js/navbarp.js"></script>

</body>



</html>