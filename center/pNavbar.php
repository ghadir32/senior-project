 
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
                  <li> <a href="../center/personality_disorder.html">Personality disorder</a> </li>
                  <li> <a href="../center/disorders.html">General disorder </a> </li>
                  <li> <a href="../center/quiz.php">Take Quessionnare </a> </li>

              </ul>
         </li>
          <li>
               <label for="btn-3" class="show">   About</label>
               <a href="#">About</a>
               <input type="checkbox" id="btn-3" class="navInputs">
               <ul>
                  <li> <a href="#">About Us </a> </li>
                  <li> <a href="#">Contact Us </a> </li>
                  <li> <a id="NavBookApp" href="#">Book Appointment </a> </li>

              </ul>
         </li>
     
      </ul>

      <button class="btn btn-primary booknow" id="bookbtn">Book Now</button>
      
      <img src="images/R.png"  class="userImg" style="display:none"/>
      <ul class="userul" style="margin-right:0px !important;">
      <li id="userLi" class="userli" style="display:none">
               <label for="btn-4" class="show">   Users Name</label>
               <a href="#" id="usrName">Users Name</a>
               <input type="checkbox" id="btn-4" class="navInputs">
               <ul>
                  <li> <a href="../patients/view_patient_profile.php">My Profile </a> </li>
                  <li> <a href="../patients/patient_settings.php">Account Settings </a> </li>
                  <li> <a href="#">LogOut </a> </li>

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