<?php
 session_start();
if(isset($_SESSION["id_doctor"]))
{
    $id=$_SESSION["id_doctor"];  
}else{
    header("location:../login_register/login.php");
}


?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Availability</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css/Dr_availability.css" rel="stylesheet" type="text/css">
    <link href="css/sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <!-- <script src="..\bootstrap\js\bootstrap.min.js"></script> -->
    <script src="js\availability.js"></script>
    <script src="js\Drimage.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
   <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
 </head>
<body>
<div>
<input id="UIDinput"  type="hidden" class="userHiddenId" value="<?php echo $id;?>"  />

        <!--side navbar-->
        <nav class="main-menu" id="main-menu">
        <ul>
                <li>
                    <div class="mt-3 ml-3" id="menubtn">
                        <div id="menushow">
                            <img src="..\images/menu.png" id="menu" width="40" height="40" alt="menu" />
                        </div>
                        <div id="menuhide">
                            <img src="..\images/close.png" id="menuclose" width="40" height="40" alt="menu" />
                        </div>

                    </div>


                </li>
            </ul>
        <a class="image" href="Dr_profile.php">
                <img class="profile fa-2x" id="profile" src="..\images\R.png" />
            </a>
            <ul>
                <li>
                    <a href="Dr_dashboard.php">
                        <i class="fa fa-home fa-2x ff"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>

                </li>
               
               
                <li>
                    <a href="Dr_patients.php">
                    <i class="fas fa-hospital-user fa-2x ff"></i>          
                     <span class="nav-text">
                            My Patients
                        </span>
                    </a>

                </li>

                <li>
                    <a href="Dr_profile.php">
                    <i class="fas fa-user-alt fa-2x ff"></i>
                    <span class="nav-text">
                            My Profile
                        </span>
                    </a>
                </li>
            

                <li>
                <a href="Dr_availability.php">
                    <i class="fas fa-check-circle fa-2x ff"></i>
                         <span class="nav-text">
                            Availability
                        </span>
                    </a>
                </li>
                

                <li class="has-subnav">
                    <a href="Dr_acc_settings.php">
                    <i class="fas fa-cogs fa-2x ff"></i>            
                     <span class="nav-text">
                            Settings
                        </span>
                    </a>
                </li>

              
            

            </ul>

            <ul class="logout">
                <li>
                    <a href="#" id="logout">
                         <i class="fas fa-sign-out-alt ff"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
         <!--end side navbar-->
  </div>

    <!--body-->
    <!--body content-->
    <div id="content">
 
    <!-- choosing available dates and times -->
    <div id="creatingSchedule" >
        <h3> Please choose your availability for appointments only.</h3>

        <div id="FromToDates">
            <div  class="dateInput">
              <!-- start date -->
              <label> Available from: </label>
              <input type="text" readonly="readonly" id="datepickerStart"/>
            </div>

            <div  class="dateInput toDate">
              <!-- end date -->
              <label> To: </label>
              <input type="text" readonly="readonly"   id="datepickerEnd"/>
            </div>
        </div>
        <p class="text-danger datesmissedAlert">Please fill in the date range you are available at.</p>
        <p class="text-danger datesextendAlert">You can only extend your end date.</p>


        <!-- choosing weekdays -->
        <div class="weekdaysCheck" >
            <!-- <input class="messageCheckbox" required="required" type="checkbox" name="weekday" id="eventweekday1" value="Mon">Mon -->
            <div class="form-check">
            <input class="form-check-input  messageCheckbox" required="required" type="checkbox" name="weekday" value="Mon" id="flexCheckDefault eventweekday1" >
            <label class="form-check-label" for="flexCheckDefault"> Mon </label>
            </div>

            <div class="form-check">
            <input class="form-check-input  messageCheckbox" required="required" type="checkbox" name="weekday" value="Tue" id="flexCheckDefault eventweekday2"  >
            <label class="form-check-label" for="flexCheckDefault"> Tue </label>
            </div>


            <div class="form-check">
            <input class="form-check-input  messageCheckbox" required="required" type="checkbox" name="weekday" value="Wed" id="flexCheckDefault eventweekday3" >
            <label class="form-check-label" for="flexCheckDefault"> Wed </label>
            </div>


            <div class="form-check">
            <input class="form-check-input  messageCheckbox" required="required" type="checkbox" name="weekday" value="Thu" id="flexCheckDefault eventweekday4" >
            <label class="form-check-label" for="flexCheckDefault"> Thu </label>
            </div>


            <div class="form-check">
            <input class="form-check-input  messageCheckbox" required="required" type="checkbox" name="weekday" value="Fri" id="flexCheckDefault eventweekday5" >
            <label class="form-check-label" for="flexCheckDefault"> Fri </label>
            </div>


            <div class="form-check">
            <input class="form-check-input  messageCheckbox" required="required" type="checkbox" name="weekday" value="Sat" id="flexCheckDefault eventweekday6"  >
            <label class="form-check-label" for="flexCheckDefault"> Sat </label>
            </div>


            <!-- <input class="messageCheckbox" required="required" type="checkbox" name="weekday" id="eventweekday2" value="Tue">Tue
            <input class="messageCheckbox" required="required" type="checkbox" name="weekday" id="eventweekday3" value="Wed">Wed
            <input class="messageCheckbox" required="required" type="checkbox" name="weekday" id="eventweekday4" value="Thu">Thu
            <input class="messageCheckbox" required="required" type="checkbox" name="weekday" id="eventweekday5" value="Fri">Fri
            <input class="messageCheckbox" required="required" type="checkbox" name="weekday" id="eventweekday6" value="Sat">Sat -->
        </div>

        <p class="text-danger daysmissedAlert">Please mark which days of the week you are available at.</p>

        <button type="button" class="btn btn-secondary" id="chooseTime">Choose Time</button>

        <div id="chooseTimes">

            <!-- <div class="times">
                        <div  class="dateInput">
                            <span>Day Name:</span>

                            <label>  From: </label>
                            <input type="text" readonly="readonly" class="timepickerStart0"/>
                      </div>

                        <div  class="dateInput toDate">

                            <label> To: </label>
                            <input type="text" readonly="readonly"    class="timepickerEnd0"/>
                        </div>
                  </div> -->

        </div>       
        <p class="text-danger timemissedAlert">Please fill in the time range you are available at.</p>

        <!-- </div> -->


        <p class="text-success daysOnsuccess">Changes Saved!</p>
        <button type="button" class="btn btn-secondary" id="submitTime">Submit</button>







    </div>


    <!-- div to take days off and view work dates -->
    <div class="workdates">
      <h4> To take a day(s) off please uncheck the corresponding date(s) </h4>
      <label>My upcoming work dates: </label>
     
      
      <form>
        <div class="multipleSelection">
            <div class="selectBox" 
                onclick="showCheckboxes()">
                <select>
                    <option>Select dates off</option>
                </select>
                <div class="overSelect"></div>
            </div>
  
            <div id="checkBoxes">
                <!-- <label for="first">
                    <input type="checkbox" checked="checked" id="first" />
                    checkBox1
                </label> -->
                  
              
            </div>
        </div>
    </form>

    <p class="text-success daysoffsuccess">Changes Saved!</p>

    <button type="button" class="btn btn-secondary" id="datesOff">Submit changes</button>


 

    </div>



   






 











    
    </div>

    
    <script>
        var show = true;
  
        function showCheckboxes() {
            var checkboxes = 
                document.getElementById("checkBoxes");
  
            if (show) {
                checkboxes.style.display = "block";
                show = false;
            } else {
                checkboxes.style.display = "none";
                show = true;
            }
        }

     $(".empty").hide();
        $(".startalt").hide();
        $(".endalt").hide();
        $(".statusalt").hide();
        var menu = document.getElementById("main-menu");
        var menushow = document.getElementById("menushow");
        var menuclose = document.getElementById("menuhide");
        menuclose.style.visibility = "hidden";
        menuclose.style.display = "none";
        //hide and show image close and menu in navbar
        menushow.onclick = function () {
            menu.style.visibility = "visible";
            menushow.style.visibility = "hidden";
            menushow.style.display = "none";
            menuclose.style.visibility = "visible";
            menuclose.style.display = "disable";
            $("#menuhide").show();
        }
        menuclose.onclick = function () {
            menu.style.visibility = "hidden";
            menushow.style.visibility = "visible";
            menushow.style.display = "disable";
            menuclose.style.visibility = "hidden";
            menuclose.style.display = "none";
            $("#menushow").show();
        }


        $(document).ready(function () {
            $('.Asave').hide();
        });

        $(document).on('click', '#logout', function () {

        var op = 3;
        $.ajax({
            type: 'GET',
            url: "../login_register/ws/users_ws.php",
            dataType: 'json',
            data: { op: op},
            success: function (response) {
                window.location.href = "../login_register/login.php";
            },
        });

        });
     </script>
</body>
</html>