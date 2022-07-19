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
    <title> About Us</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="../fontawsom-all.min.css"> -->
    <!-- <link rel="stylesheet" href="css/animate.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.min.css"> -->
    <link href="css/navbar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">

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

   <nav class="navBar" >
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
               <div class="page-nav no-margin row" style="margin-top:5% !important; padding-top:3% !important; ">
                   <div class="container">
                       <div class="row">
                           <h2 class="abt" style="text-align: center !important;">About Us</h2>
                           
                       </div>
                   </div>
               </div>
       
         
         <!--  ************************* About Us Content Start Here  ************************** -->
            <div class="about-us">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <img src="../images/Aura Photography Session.jpg" alt="">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <h2>Welcome to Clinic</h2>
                            <p> The Center is a mental health clinic comprised of experienced therapists devoted to working toward the best possible outcome for their clients' goals. The range of professional specialties available in our clinic allows clients to be matched with therapists who have expertise in assessing and treating their unique concerns.</p>
                            <p> We are dedicated to ongoing professional training. Our clinicians stay up-to-date with research and trends that translate into effective services for our clients. We utilize a team approach in aspects of treatment including a broad knowledge base that is shared among our professional staff through in-house training and consultation.</p>
                            <p> The Psychology Center offers a wide variety of services including individual psychotherapy, couples and family therapy, groups, medication management for the mental health/behavioral health issues of our therapy clients, a comprehensive on-site psycho-educational and career assessment testing lab, consultation, expert witness services, and more.</p>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        
        <!-- ######## About US End ####### -->
        	<!-- ################# Mission Vision Starts Here#######################--->
  	
  	<div class="mosion-vision">
  	    <div class="container">
  	        <div class="row">
  	            <div class="col-lg-4 col-md-12">
  	                <div class="single-dd">
  	                    <h4>Our Mission</h4>
                        <p>The clinic's mission is to provide state of the art care to our clients based on the continuous scientific progress in the field of mental health</p>
  	                    
  	                </div>
  	            </div>
  	            <div class="col-lg-4 col-md-12">
  	                 <div class="single-dd">
  	                    <h4>Our Vision</h4>
  	                    <p>Our Clinic aims to be a reference in the region in creating an inspiring model where knowledge, professionalism and ethics are combined for the best care of our clients</p>
  	                    
  	                    
  	                </div>
  	            </div>
  	            <div class="col-lg-4 col-md-12">
  	                 <div class="single-dd">
  	                    <h4>Why Choose Us ?</h4>
  	                    <p>Effective Psychological Therapy with a minimum of 5 years post qualification experience. </p>
  	                    
  	                    <p></p>
  	                    <p></p>
  	                    
  	                    
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