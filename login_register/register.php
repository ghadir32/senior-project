<?php
  session_start();

  ?>




<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/customer_acc.css">
     <script language="javascript" src="js/customer_acc.js"></script>
</head>
<body>


<div class="wrapper fadeInDown">
  <div id="formContent">
        <div class="common_box_body test">

            <h2>Registration</h2>
            <form  name="registration" id="registration">

              <!-- <label for="firstname">First Name</label>
              <input type="text" name="firstname" id="firstname" placeholder="John"><br>

              <p class="error_name"></p>

              <label for="lastname">Last Name</label>
              <input type="text" name="lastname" id="lastname" placeholder="Doe"><br>

              <p class="error_lname"></p> -->

              <label for="email">Email</label>
              <input type="email" name="email" id="email" placeholder="john@doe.com"><br>

              <p class="error_email"></p>

              <label for="uname">User name</label>
              <input type="uname" name="uname" id="uname" placeholder=""><br>

              <p class="error_uname"></p>

              <label for="password">Password</label>
              <input type="password" name="password" id="password" placeholder=""><br>

              <p class="error_password"></p>

              
              <input name="submit" type="submit" id="submit" class="submit">
            </form>
            <input type="text" value="3" name="op" hidden="hidden">
            <button type="submit" class="exit" id="exit">Exit</button>
      </div>
 


            
            
            <div class="success" id="success"> Operation Successfuls </div>
</div>
</div>

</body>
</html>