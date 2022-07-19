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
    <title>Personality Disorders</title>

    <link rel="stylesheet" href="css/disorders.css">
    <link rel="stylesheet" href="css/personality_disorder.css">


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

    <section class="body-protrait">

        <div class="body-portrait-container">
            <div class="body-portrait-header">
                <H2>Some Personality Disorders</H2>



            </div>

        </div>

        <div class="body-disorders">
            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Schizoid :</h1>
                </div>

                <div class="disorder-description">
                    <p>Schizoid personality disorder (often abbreviated as SPD or SzPD) is a personality disorder characterized by a lack of interest in social relationships, a tendency toward a solitary or sheltered lifestyle, secretiveness, emotional coldness,
                        detachment and apathy. Affected individuals may be unable to form intimate attachments to others and simultaneously possess a rich and elaborate but exclusively internal fantasy world.</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Schizotypal :</h1>
                </div>

                <div class="disorder-description">
                    <p>Schizotypal personality disorder (STPD or SPD), also known as schizotypal disorder, is a mental and behavioural disorder. DSM classification describes the disorder specifically as a personality disorder characterized by thought disorder,
                        paranoia, a characteristic form of social anxiety, derealization, transient psychosis, and unconventional beliefs.</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Antisocial :</h1>
                </div>

                <div class="disorder-description">
                    <p>Antisocial personality disorder (ASPD or infrequently APD) is a personality disorder characterized by a long-term pattern of disregard of, or violation of, the rights of others as well as a difficulty sustaining long-term relationships.
                        A weak or nonexistent conscience is often apparent, as well as a history of rule-breaking that can sometimes lead to law-breaking, a tendency towards substance abuse, and impulsive and aggressive behavior.</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Histrionic :</h1>
                </div>

                <div class="disorder-description">
                    <p>Histrionic personality disorder (HPD) is defined by the American Psychiatric Association as a personality disorder characterized by a pattern of excessive attention-seeking behaviors, usually beginning in early childhood, including
                        inappropriate seduction and an excessive desire for approval. People diagnosed with the disorder are said to be lively, dramatic, vivacious, enthusiastic, extroverted and flirtatious.</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Obsessive:</h1>
                </div>

                <div class="disorder-description">
                    <p>Obsessive-compulsive personality disorder (OCPD) is a cluster C personality disorder marked by an excessive need for orderliness, and neatness. Symptoms are usually present by the time a person reaches adulthood, and are visible in
                        a variety of situations. The cause of OCPD is thought to involve a combination of genetic and environmental factors, namely problems with attachment.</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Dependent :</h1>
                </div>

                <div class="disorder-description">
                    <p>Dependent personality disorder (DPD) is characterized by a pervasive psychological dependence on other people. This personality disorder is a long-term condition in which people depend on others to meet their emotional and physical
                        needs, with only a minority achieving normal levels of independence.</p>
                </div>

            </div>

            <div class="body-inner-disorder">
                <div class="disorder-name">
                    <h1>Avoidant :</h1>
                </div>

                <div class="disorder-description">
                    <p>Avoidant personality disorder (AvPD) is a Cluster C personality disorder characterized by excessive social anxiety and inhibition, fear of intimacy (despite an intense desire for it), severe feelings of inadequacy and inferiority,
                        and an overreliance on avoidance of feared stimuli (e.g. self-imposed social isolation) as a maladaptive coping method.</p>
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
</body>


<script src="js/navbarp.js"></script>

</html>