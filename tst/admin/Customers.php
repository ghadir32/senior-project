<?php

require("../Utils/utils.php");

checkSessionAdmin();


?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Customers</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css\customers.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\ajax\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js\customers.js"></script>
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
        <h1>Customers</h1>
    </div>
    <!-- control -->
    <div class="setting">
        <form class="form-inline justify-content-center">
            <div class="card-body mt-3">
                <input type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal" value="Add Customer">
                <span class="font-weight-bold">Search by: </span>
                <select class="select form-control filter" id="filterBy">
                    <option disabled selected>select to search</option>
                    <option value="all">All</option>
                    <option value="male">Male</option> 
                    <option value="female">Female</option> 
                    <option value="kids">Kids</option> 


                </select>
                <input id="insearch"   class="form-control mr-sm-2 ml-10" type="text" placeholder="Search" aria-label="Search">
 
            </div>

           
        </form>
    </div>
    <!-- table -->
    <div class="col">
        <table class="table table-hover table-bordered mt-2  mr-3 " border="0" id="customerstable">
            <thead>
                <tr>
                     <th scope="col">Username</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>

                    <th scope="col">status</th>
                    <th scope="col">Actions</th>
                 </tr>
            </thead>

            <tbody id="customerstbody">
            
            </tbody>
        </table>
    </div>

    <!-- delete modal -->
    <div class="modal" id="myModaldelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Or Deactivate User </h5>
                    <button class="close btn" style="" data-bs-dismiss="modal">x</button>
                   
                </div>
                <form method="post">
                    <div class="modal-body">
                        <input type="hidden" id="delIn" value="del">
                        <button id="deactivate_product" class=" deactC btn">Deactivate User</button>
                        <button id="delete_product" class=" btn delC">Delete User</button>
                    </div>
            </form>
            </div>
        </div>
    </div>

   <!-- modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Customer</h5>
                    <button class="close btn" id="xmodal" style="" data-bs-dismiss="modal">×</button>
                   
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <input type="text" id="username" placeholder="UserName" class="form-control">
                            <p id="Pname" class=" text-danger hideP"   > username is required </p>
                        </div>
                       
                        <div class="mb-3">
                            <select id="gender" class="select form-control">
                                <option disabled selected >select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="kids">Kids</option>

                            </select>
                            <p id="Pgender"  class=" text-danger hideP">  gender  is required </p>

                        </div>
                        <div class="mb-3">
                            <input type="text" id="uemail" placeholder="Email" class="form-control">
                            <p id="Pemail" class="hideP text-danger" >   email  is required </p>
                        </div>
                        <div class="mb-3">
                            <input type="text" id="password" placeholder="Password"   class="form-control">
                            <p id="Ppassword" class="hideP text-danger"  > password is required </p>
                        </div>
                        <div class="mb-3">
                            <input type="text"   id="address" placeholder="Address" class="form-control">
                            <p id="Paddress" class="hideP text-danger"  > address  is required </p>
                        </div>
                        <div class="mb-3">
                            <input type="text"   id="status" placeholder="Status" class="form-control">
                            <p id="Pstatus" class="hideP text-danger"  > status  is required </p>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" id="submit" class="addbtn btn">Submit</button>
                        </div>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>





    <script>

        var menubtn = document.getElementById("menubtn")
        var sideNav = document.getElementById("sideNav")
        var menu = document.getElementById("menu")

        sideNav.style.right = "-250px";

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

        $('.fa-thumbs-down').hide();
                    //$('.fa-thumbs-down').show();


    </script>
    <script src="..\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>
</html>