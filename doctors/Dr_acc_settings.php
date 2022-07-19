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
    <title>Settings</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css/Dr_settings.css" rel="stylesheet" type="text/css">
    <link href="css\sidebar.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js\settings.js"></script>
    <script src="js\Drimage.js"></script>

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
    <div id="content">

        <h2 id="myAccH2">My account</h2>

        <!-- div with all settings -->
        <div id="settings">

            <!-- username -->
            <div id="setting">
                <div id="title">Username:</div>
                <div class="spann">
                        <span id="Dr_username" class="innerspan"></span>
                        <i class="fas fa-pen  editt" id="editUsername"></i>
                        <input type="text" class="inputs" id="newusername" value=""/>
                        <div id="usernameWarning" class="text-danger alert">If you change your username, you will be logged out and need to re-confirm your account.</div>
                        <div id="usernameWarning2" class="text-danger alert">* username field should not be empty</div>

                </div>
            </div>


             <!-- Contact email -->
            <div id="setting">
                <div id="title">Contact Email:</div>
                <div class="spann">
                        <span id="Dr_email" class="innerspan"></span>
                        <i class="fas fa-pen  editt" id="editEmail"></i>
                        <input type="text" class="inputs" id="newemail" value=""/>
                        <div id="emailWarning" class="text-danger alert">This email will be public.</div>
                        <div id="emailvalidate" class="text-danger alert">* Email field should not be empty</div>

                </div>
            </div>


             <!-- Phone -->
             <div id="setting">
                <div id="title">Phone number:</div>
                <div class="spann">
                        <span id="Dr_phone" class="innerspan"></span>
                        <i class="fas fa-pen  editt" id="editPhone"></i>
                        <input type="number" class="inputs" id="newphone" value=""/>
                        <div id="phoneWarning" class="text-danger alert">This phone will be public.</div>
                        <div id="phonevalidate" class="text-danger alert">* Phone field should not be empty</div>

                </div>
            </div>


             <!-- Contact email -->
             <div id="setting">
                <div id="title">Password:</div>
                <div class="spann">
                        <i class="fas fa-pen  editt" id="editPass"></i>
                        <input type="password" class="inputs pass"  placeholder="old password" id="oldpass" value=""/>
                        <div  id="oldPassAlert" class="text-danger alert" >Old password is incorrect.</div>
                       
                        <input type="password"  class="inputs pass" placeholder="new password"   id="newpass" value=""/>
                        <input type="password"  class="inputs pass" placeholder="confirm old password" id="confirmNewPass"   value=""/>
                        
  
                        <div  id="newPassAlert" class="text-danger alert" >new passwords do not match.</div>
                        <div  id="emptyPassAlert" class="text-danger alert">please fill in the new password.</div>


                </div>
            </div>

            <!-- delete account -->
            <div id="setting">
                <div id="title">Delete account:</div>
                 <button type="button" class="danger" data-toggle="modal" data-target="#exampleModal">Delete account</button>
             </div>

             <div id="submitDiv">
                 <button type="button"  id="save" class="btn btn-primary btn-primary1 ">Save changes</button>
             </div>
         

             

        </div>
        <!-- settings end -->

 
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting Your Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account? you will lose access to all your data and your account will not appear to patients anymore.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="deleteAcc">Delete my account</button>
            </div>
            </div>
        </div>
        </div>
        



    
    </div>


    
  
 
<!-- end body elements-->

<script type="text/javascript">
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