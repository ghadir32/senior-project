<?php

session_start();
if(isset($_SESSION["id_patient"]))
{
   $id=$_SESSION["id_patient"];

}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />
    <link href="css/navbar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="../bootstrap\jquery.min.js"></script>
    <script src="../bootstrap\js\bootstrap.min.js"></script>
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
                   <li> <a id="NavBookApp" href="#">Book Appointment </a> </li>

              </ul>
         </li>
     
      </ul>

      <button class="btn btn-primary booknow" id="bookbtn">Book Now</button>
      
      <img src="../images/logo.png"  class="userImg" style="display:none"/>
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
 

     <!--  ************************* Page Title Starts Here ************************** -->
               <div style="margin-top:5% ; margin-bottom:1%;" class="page-nav no-margin row">
                   <div class="container">
                       <div class="row">
                           <h2 style="margin-left:44%;">Contact Us</h2>
                          
                       </div>
                   </div>
               </div>
       
         <!-- ######## Page  Title End ####### -->
         
        
      <div style="margin-bottom:3%; max-width:90%;   "  class="row no-margin">
        
      <iframe   style="margin-left:15%;"  src="https://maps.google.com/maps?q=lebanon,%20nabatieh,Hassan%20Kamel%20El-Sabbah%20street&t=&z=13&ie=UTF8&iwloc=&output=embed"  width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>



      <div class="row contact-rooo no-margin">
        <div class="container">
           <div class="row">
               
          
            <div style="padding:20px" class="col-sm-6">
            <h2  >Emergency Contact Information</h2>
                <div class="row">
                    <div style="padding-top:10px;" ><label>If you are a client of The Center and are experiencing a true mental health emergency, please call our office at (961) 70 987-654. If you are calling outside of regular business hours, follow the prompts to reach our on-call answering service or hang up and call (961) 70 888-999.</label></div>
                </div>
                <br>
                <h2 style="font-size:22px margin-left:0px;">Call-in Reception Hours:</h2>
                <div class="row">
                    <div style="padding-top:10px;" ><label>Monday - Friday 8:00am to 3:30pm</label></div>
                </div>
                
            </div>
             <div class="col-sm-6">
                    
                  <div style="margin:50px" class="serv"> 
                
               
             
                              
              
          <h2 style="margin-top:10px;">Address</h2>

    Clinic <br>
    K.K District<br>
    Phone:+961 79 989 989<br>
    Email: Free2Be@gmail.com<br>
    Website: www.Free2Be.com<br>

 
       
            
                
                
              
           </div>    
                
             
         </div>

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

include 'footer2.php';
?>
</body>

 
</html>