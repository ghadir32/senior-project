<?php

require("../Utils/utils.php");

checkSessionAdmin();


?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Ordered</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css\ordered.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\ajax\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js\ordered.js"></script>

</head>
<body>
    <!-- navbar -->
    <div class="mb-3">
        <nav class="navbar navbar-expand-md fixed-top shadow-sm">
            <div class="navbar-brand logo">
                <img src="..\img\logo.jpg" height="65" width="115">
            </div>

            <div class="collapse navbar-collapse mt-3">
                <ul class="navbar-nav ">
                    <li class="">
                          <a class="nav-link" href="Products.php"><span class="navbar-brand">Products</span></a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="Admin_Categories.php"><span class="navbar-brand">Categories</span></a>
                    </li>
                </ul>
            </div>
            <div id="sideNav">
                <nav>
                    <ul class="mt5">
                        <li><a href="Customers.php">CUSTOMERS</a></li>
                        <li><a href="ordered.php">ORDERED</a></li>
                        <li><a href="Statistics.php">STATISTICS</a></li>
                        <li><a href="logins_register.php">LOGIN REGISTER</a></li>
                        <li><a href="..\login&register\Login.php">LOGOUT</a></li>
                    </ul>
                </nav>
            </div>
            <div class="mt-3" id="menubtn">
                <img src="..\img/menu.png" id="menu" />
            </div>
        </nav>

    </div>
    <!-- title -->
    <div class="title-text">
        <h1>Ordered</h1>
    </div>
    <!-- control -->
    <div class="setting">
        <form class="form-inline justify-content-center">
            <div class="card-body mt-3">
                <input type="button" class="btn" data-bs-toggle="modal" id="modaldel"data-bs-target="#myModaldelete" value="clear All Data">
                <span class="font-weight-bold">Search by: </span>
                    <select class="select form-control" id="select_filter">
                    <option value="All">All</option>
                    <option value="Unaccepted">Unaccepted Orderes</option>
                    <option value="Accepted">Accepted orderes</option>
                    <option value="Waitings">Waitings orderes</option>
                </select>
                <input id="insearch"   class="form-control mr-sm-2 ml-10" type="text" placeholder="Search" aria-label="Search">
 
            </div>

           
        </form>
    </div>
    <!-- table -->
    <div class="col">
        <table class="table table-hover table-bordered mt-2  mr-3 " border="0" id="table">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date-Time</th>
                    <th scope="col">Accepted or Waiting</th>
                    <th scope="col">View\Delete</th>
                 </tr>
            </thead>

            <tbody id="orderestable">
            
            </tbody>
        </table>
    </div>
    <!-- modal delete-->
    <div class="modal" id="myModaldelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are You Sure For Deleting All Actions </h5>
                    <button class="close btn" style="" data-bs-dismiss="modal">x</button>
                   
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" id="idd" value="">
                    <button id="delete_all" class=" btn">Delete All</button>
                    <button id="delete_this" class=" btn">Delete</button>
                    <button id="cancel" class=" btn">Cancel</button>
                </form>

                </div>

            </div>
        </div>
    </div>
        <script>
        //side navbar
        var menubtn = document.getElementById("menubtn")
        var sideNav = document.getElementById("sideNav")
        var menu = document.getElementById("menu")
        
        sideNav.style.right = "-250px";
        //hide and show image close and menu in navbar
        menubtn.onclick = function () {
            if (sideNav.style.right == "-250px") {
                sideNav.style.right = "0";
                menu.src = "../img/close.png";
            }
            else {
                sideNav.style.right = "-250px";
                menu.src = "../img/menu.png";
            }
        }  
        

    </script>
    <script src="..\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>
</html>