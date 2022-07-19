
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/Login.css">

    <script src="js/login.js"></script>

    


</head>
<body>

    


<div class="wrapper fadeInDown">
  <div id="formContent">
  

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="../images/mental_health_logo.jpg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post" action="./validate.php">
      <input type="text" id="username" class="fadeIn second" required="required" name="username" placeholder="username">
  

      <input type="password" id="password" class="fadeIn third" name="password" required="required"  placeholder="password">
     
      <input type="submit" id="login" class="fadeIn fourth" value="Log In">
    </form>
    <div class="error">Wrong Credentials</div>

    <!-- Create account -->
    <div id="formFooter">
      <a class="underlineHover" href="./register.php">Create account</a>
    </div>

  </div>
</div>
        
        

</body>
</html>