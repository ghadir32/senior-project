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
    <title> Quessionnare</title>

    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />

    <script src="../bootstrap\jquery.min.js"></script>
    <link href="css/navbar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/quiz.css">
    <script src="js/quiz.js"></script>
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />
    <script src="../bootstrap\jquery.min.js"></script>

    <!-- <script src="../bootstrap\js\bootstrap.min.js"></script> -->
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
        
       </ul>
    
       <button class="btn btn-primary booknow" id="bookbtn">Book Now</button>
       
       <img src="../images/R.png"  class="userImg" style="display:none"/>
       <ul class="userul" style="margin-right:0px !important;">
       <li id="userLi" class="userli" style="display:none">
                <label for="btn-4" class="show">   Users Name</label>
                <a href="#" id="usrName">UserName</a>
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


    <div id="MainContentPlaceholder_C001_divQuestionsList" class="quiz__questions sfFormsEditor">
        <div class="quiz__item">
            <div class="item__count" id="question1" tabindex="-1"><h3>Question 1</h3></div>
            <p class="item__question">
                It can be hard to nod off when you're feeling wound up or pissed off, especially if there’s something you’re thinking about regularly when you’re trying to fall asleep.
            </p>
            <p>How long does it usually take you to fall asleep?</p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl01" class="sfError" style="display:none;">Please select an answer</span>

                <ul id="MainContentPlaceholder_C001_rdbListQues2">
                    <li><input id="rdbListQues2_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues2" class="q1" value="1" /><label for="MainContentPlaceholder_C001_rdbListQues2_0">I never take longer than 30 minutes</label></li>
                    <li><input id="rdbListQues2_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues2" class="q1" value="2" /><label for="MainContentPlaceholder_C001_rdbListQues2_1">I take at least 30 minutes, less than half of the time</label></li>
                    <li><input id="rdbListQues2_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues2" class="q1" value="3" /><label for="MainContentPlaceholder_C001_rdbListQues2_2">I take at least 30 minutes, more than half of the time</label></li>
                    <li><input id="rdbListQues2_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues2" class="q1" value="4" /><label for="MainContentPlaceholder_C001_rdbListQues2_3">I take more than 60 minutes, more than half of the time</label></li>

                </ul>
            </div>
        </div>

        <div class="quiz__item">
            <div class="item__count" id="question2" tabindex="-1"><h3>Question 2</h3></div>
            <p class="item__question">
                Feeling sad is a normal part of life, and sadness is an important part of a healthy, full range of emotions.
            </p>
            <p>How often do you feel sad, down, blue, hopeless or depressed?</p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl02" class="sfError" style="display:none;">Please select an answer</span>

                <ul id="MainContentPlaceholder_C001_rdbListQues3">
                    <li><input id="rdbListQues3_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues3" class="q2" value="1" /><label for="MainContentPlaceholder_C001_rdbListQues3_0">Never</label></li>
                    <li><input id="rdbListQues3_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues3" class="q2" value="2" /><label for="MainContentPlaceholder_C001_rdbListQues3_1">Less than half the time</label></li>
                    <li><input id="rdbListQues3_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues3" class="q2" value="3" /><label for="MainContentPlaceholder_C001_rdbListQues3_2">More than half the time</label></li>
                    <li><input id="rdbListQues3_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues3" class="q2" value="4" /><label for="MainContentPlaceholder_C001_rdbListQues3_3">Nearly all the time</label></li>

                </ul>
            </div>
        </div>

        <div class="quiz__item">
            <div class="item__count" id="question3" tabindex="-1"><h3>Question 3</h3></div>
            <p class="item__question">
                Whether it’s eating too much at the all-you-can-eat pizza joint down the road or skipping a dicey-looking bain-marie, we’ve all overeaten or missed a meal now and again.
            </p>
            <p>How has your appetite been?</p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl03" class="sfError" style="display:none;">Please select an answer</span>
                <ul id="MainContentPlaceholder_C001_rdbListQues4">
                    <li><input id="rdbListQues4_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues4" class="q3" value="1" /><label for="MainContentPlaceholder_C001_rdbListQues4_0">There is no change in my usual appetite</label></li>
                    <li><input id="rdbListQues4_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues4" class="q3" value="2" /><label for="MainContentPlaceholder_C001_rdbListQues4_1">I occasionally eat more or less than usual</label></li>
                    <li><input id="rdbListQues4_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues4" class="q3" value="3" /><label for="MainContentPlaceholder_C001_rdbListQues4_2">I eat much more or much less than usual</label></li>
                    <li><input id="rdbListQues4_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues4" class="q3" value="4" /><label for="MainContentPlaceholder_C001_rdbListQues4_3">I rarely eat within a 24-hour period or I feel the need to overeat at every meal</label></li>

                </ul>
            </div>
        </div>

        <div class="quiz__item">
            <div class="item__count" id="question4" tabindex="-1"><h3>Question 4</h3></div>
            <p class="item__question">
                Though everyone is faced with hard-to-make decisions now and again that can take our attention away from the present moment, being able to focus and be decisive when we need to is important.
            </p>
            <p>How is your ability to concentrate and make decisions?</p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl04" class="sfError" style="display:none;">Please select an answer</span>
                <ul id="MainContentPlaceholder_C001_rdbListQues5">
                    <li><input id="rdbListQues5_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues5" class="q4" value="1" /><label for="MainContentPlaceholder_C001_rdbListQues5_0">There is no change in my ability to concentrate or make decisions</label></li>
                    <li><input id="rdbListQues5_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues5" class="q4" value="2" /><label for="MainContentPlaceholder_C001_rdbListQues5_1">I occasionally feel indecisive or find my attention wandering</label></li>
                    <li><input id="rdbListQues5_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues5" class="q4" value="3" /><label for="MainContentPlaceholder_C001_rdbListQues5_2">I struggle to focus my attention or make decisions most of the time</label></li>
                    <li><input id="rdbListQues5_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues5" class="q4" value="4" /><label for="MainContentPlaceholder_C001_rdbListQues5_3">I cannot concentrate well enough to read and/or I can't even make minor decisions</label></li>

                </ul>
            </div>
        </div>

        <div class="quiz__item">
            <div class="item__count" id="question5" tabindex="-1"><h3>Question 5</h3></div>
            <p class="item__question">
                Whether you call it self-confidence, bravado or swagger, a healthy self-image is an important trait for every man to possess.
            </p>
            <p>How do you view yourself?</p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl05" class="sfError" style="display:none;">Please select an answer</span>
                <ul id="MainContentPlaceholder_C001_rdbListQues6">
                    <li><input id="rdbListQues6_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues6" class="q5" value="1" /><label for="MainContentPlaceholder_C001_rdbListQues6_0">I see myself as equally worthwhile and deserving as other people</label></li>
                    <li><input id="rdbListQues6_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues6" class="q5" value="2" /><label for="MainContentPlaceholder_C001_rdbListQues6_1">I am more self-blaming than usual</label></li>
                    <li><input id="rdbListQues6_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues6" class="q5" value="3" /><label for="MainContentPlaceholder_C001_rdbListQues6_2">I largely believe that I cause problems for others</label></li>
                    <li><input id="rdbListQues6_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues6" class="q5" value="4" /><label for="MainContentPlaceholder_C001_rdbListQues6_3">I think almost constantly about major and minor defects in myself</label></li>

                </ul>
            </div>
        </div>

        <div class="quiz__item">
            <div class="item__count" id="question6" tabindex="-1"><h3>Question 6</h3></div>
            <p class="item__question">
                Your death and/or suicide. Do you think of them?
            </p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl06" class="sfError" style="display:none;">Please select an answer</span>
                <ul id="rdbListQues7">
                    <li><input id="rdbListQues7_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues7" class="q6" value="1" /><label for="rdbListQues7_0">I do not</label></li>
                    <li><input id="rdbListQues7_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues7" class="q6" value="2" /><label for="rdbListQues7_1">I feel that life is empty</label></li>
                    <li><input id="rdbListQues7_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues7" class="q6" value="3" /><label for="rdbListQues7_2">I think of suicide or my death several times a week for several minutes</label></li>
                    <li><input id="rdbListQues7_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues7" class="q6" value="4" /><label for="rdbListQues7_3">I have made specific plans for suicide or I have actually attempted to take my life</label></li>

                </ul>
                <p class="item__result" id="death">Please reach out for help, we can help you get your life better and take care of you again.</p>
            </div>
        </div>


        <div class="quiz__item">
            <div class="item__count" id="question7" tabindex="-1"><h3>Question 7</h3></div>
            <p class="item__question">
                It’s important to spend time regularly doing the things you enjoy, whether that’s playing or watching sport, listening to music, walking the dog, or getting together with your mates to watch the footy.
            </p>
            <p>When doing your favourite hobbies and activities, do you enjoy them as much as you used to?</p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl07" class="sfError" style="display:none;">Please select an answer</span>

                <ul id="MainContentPlaceholder_C001_rdbListQues8">
                    <li><input id="rdbListQues8_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues8" class="q7" value="1" /><label for="MainContentPlaceholder_C001_rdbListQues8_0">I enjoy them as much as I usually do</label></li>
                    <li><input id="rdbListQues8_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues8" class="q7" value="2" /><label for="MainContentPlaceholder_C001_rdbListQues8_1">I try to enjoy them, but I don't as much as I used to</label></li>
                    <li><input id="rdbListQues8_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues8" class="q7" value="3" /><label for="MainContentPlaceholder_C001_rdbListQues8_2">I enjoy them, if I'm drunk</label></li>
                    <li><input id="rdbListQues8_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues8" class="q7" value="4" /><label for="MainContentPlaceholder_C001_rdbListQues8_3">I don't enjoy them at all</label></li>

                </ul>
            </div>
        </div>




        <div class="quiz__item">
            <div class="item__count" id="question8" tabindex="-1"><h3>Question 8</h3></div>
            <p class="item__question">
                Life is full of annoyances &ndash; like ATM queues, football umpires and telemarketers. On occasion, these annoyances can turn into anger.
            </p>
            <p>How easily are you angered?</p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl8" class="sfError" style="display:none;">Please select an answer</span>

                <ul id="MainContentPlaceholder_C001_rdbListQues11">
                    <li><input id="rdbListQues11_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues11" class="q8" value="1" /><label for="MainContentPlaceholder_C001_rdbListQues11_0">Not easily, I am able to control my temper</label></li>
                    <li><input id="rdbListQues11_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues11" class="q8" value="2" /><label for="MainContentPlaceholder_C001_rdbListQues11_1">Some things make me angry, but my temper is generally under control</label></li>
                    <li><input id="rdbListQues11_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues11" class="q8" value="3" /><label for="MainContentPlaceholder_C001_rdbListQues11_2">I don't always show my anger, but if I do - watch out</label></li>
                    <li><input id="rdbListQues11_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues11" class="q8" value="4" /><label for="MainContentPlaceholder_C001_rdbListQues11_3">I fly off the handle easily</label></li>

                </ul>
            </div>
        </div>



        <div class="quiz__item">
            <div class="item__count" id="question9" tabindex="-1"><h3>Question 9</h3></div>
            <p class="item__question">
                Some men punch stuff when angry. And while it may make them feel better for a moment, the wall or face on the receiving end usually does not.
            </p>
            <p>How often do you get violent when angry?</p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl9" class="sfError" style="display:none;">Please select an answer</span>

                <ul id="MainContentPlaceholder_C001_rdbListQues13">
                    <li><input id="rdbListQues13_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues13" class="q9" value="1" /><label for="MainContentPlaceholder_C001_rdbListQues13_0">I rarely become angry, let alone violent</label></li>
                    <li><input id="rdbListQues13_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues13" class="q9" value="2" /><label for="MainContentPlaceholder_C001_rdbListQues13_1">I get angry every once in a while, but I don't usually get violent</label></li>
                    <li><input id="rdbListQues13_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues13" class="q9" value="3" /><label for="MainContentPlaceholder_C001_rdbListQues13_2">On occasion, I have been known to punch a wall or break something when angry</label></li>
                    <li><input id="rdbListQues13_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues13" class="q9" value="4" /><label for="MainContentPlaceholder_C001_rdbListQues13_3">Often I get so angry that I become physically violent toward others</label></li>

                </ul>
            </div>
        </div>

        <div class="quiz__item">
            <div class="item__count" id="question10" tabindex="-1"><h3>Question 10</h3></div>
            <p class="item__question">
                Many stresses in life can contribute to feelings of anxiety, such as a big work presentation, watching your team in a tight match, or when you're stuck in traffic.
            </p>
            <p>How often do you feel worried, anxious or stressed out?</p>
            <div class="item__answer">
                <span id="MainContentPlaceholder_C001_ctl10" class="sfError" style="display:none;">Please select an answer</span>

                <ul id="MainContentPlaceholder_C001_rdbListQues14">
                    <li><input id="rdbListQues14_0" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues14" class="q10" value="1" /><label for="MainContentPlaceholder_C001_rdbListQues14_0">Not at all</label></li>
                    <li><input id="rdbListQues14_1" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues14" class="q10"  value="2" /><label for="MainContentPlaceholder_C001_rdbListQues14_1">1 or 2 times per week</label></li>
                    <li><input id="rdbListQues14_2" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues14" class="q10"  value="3" /><label for="MainContentPlaceholder_C001_rdbListQues14_2">3 or 4 times per week</label></li>
                    <li><input id="rdbListQues14_3" type="radio" name="ctl00$MainContentPlaceholder$C001$rdbListQues14" class="q10"  value="4" /><label for="MainContentPlaceholder_C001_rdbListQues14_3">Nearly every day</label></li>

                </ul>
            </div>
        </div>
        <div> <button class="btn btn-primary booknow submit" id="submit">Submit</button></div>
         <div> <button class="btn btn-primary booknow submit" id="repet">Exam Repetition</button></div>




    </div>
            <div class="quiz__result">
                         <div class="box1">
                <div class="item__count_1" tabindex="-1"><h3 id="result">Depression</h3> </div>
                <hr>
                <p class="item__result" id="item__result_depression">

                </p>
                 </div>
            </div>
             <div class="quiz__result">
                          <div class="box2">
                <div class="item__count_2" tabindex="-1"><h3 id="result">Anixiety</h3></div>
                   <hr>
                <p class="item__result" id="item__result_anixiety">
                    
                </p>
                 </div>
             </div>
             <div class="quiz__result">
                          <div class="box3">
                <div class="item__count_3" tabindex="-1"><h3 id="result">Anger</h3></div>
                   <hr>
                <p class="item__result" id="item__result_anger">
                    
                </p>
                 </div>
            </div>
             <div class="quiz__result">
                          <div class="box4">
                <div class="item__count_4" tabindex="-1"><h3 id="result">Attention deficit hyperactivity</h3></div>
                   <hr>
                <p class="item__result" id="item__result__adhd">
                    
                </p>
                 </div>
                 </div>
             <div class="quiz__result">
             <div class="box5">
             

                <div class="item__count_5" tabindex="-1"><h3 id="result">Self Love</h3></div>
                   <hr>
                <p class="item__result" id="item__result_selflove">
                
                </p>
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
  include 'footer2.php';
?>

<script src="js/navbarp.js"></script>

</body>
</html>