<?php

require("../Utils/utils.php");

checkSessionAdmin();


?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Products</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css\products.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
     <script src="..\bootstrap\js\jquery.bootstrap-growl.min.js"></script>
    <script src="js\products.js"></script>
</head>
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
        <h1>Products</h1>
    </div>

    <!-- control -->
    <div class="setting">
        <form class="form-inline justify-content-center">
            <div class="card-body mt-3">
                <input type="button" id="add_modal" class="btn" data-bs-toggle="modal" data-bs-target="#myModal" value="Add Product">
                <span class="font-weight-bold">Filter by: </span>
                <select class="select form-control" id="select_filter">
                    <option value="name">All</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="kids">Kids</option>
                    <option value="activated">Activated</option>
                    <option value="deactivated">Deactivated</option>
                </select>
                <input id="insearch" class="form-control mr-sm-2 ml-10" type="text" placeholder="Search" aria-label="Search">
                    
            </div>
        </form>

    </div>

    <!-- table -->
    <div class="col">
        <table class="table table-hover table-bordered mt-2  mr-3 " border="0" id="productstable">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Base Price</th>
                    <th scope="col">Final Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody id="productstbody">
            </tbody>
        </table>
    </div>
    <!--  <center class="mb-5 view_more"><button id="load_more" class="btn" style="color:#1d1c1c;box-shadow: none;">View More <i class="fa fa-angle-double-right" ></i></button>  </center> -->
   
    <div id="down">
        <input type="hidden" id="all" value="">
    <input type="hidden" id="add_rows" value="">
    </div>



   <!-- modal -->
   <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button class="close btn" style="" data-bs-dismiss="modal">x</button>
                   
                </div>
                <div class="modal-body">
                    <form method="post" onsubmit="" id="form">
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="imageproductname" id="imageproductname" value="">
                        <input type="hidden" id="status" value="">
                        <div class="mb-3">
                            <input type="text" id="product_name" placeholder="Product Name" class="form-control">
                            <p class="text-left text-danger mt-2" id="p0"></p>
                        </div>
                        <div class="mb-3">
                            <select class="select form-control " placeholder="select category" id="product_category" >
                                <option value="">select category</option>

                            </select>
                            <p class="text-left text-danger mt-2" id="p1"></p>
                        </div>
                        <div class="mb-3">
                            <select class="select form-control" id="product_gender">
                                <option value="">select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="kids">Kids</option>

                            </select>
                            <p class="text-left text-danger mt-2" id="p2"></p>
                        </div>
                        <div class="mb-3">
                            <input type="number" id="product_quantity" min="1" placeholder="Quantity" class="form-control">
                            <p class="text-left text-danger mt-2" id="p3"></p>
                        </div>
                        <div class="mb-3">
                            <input type="number" id="product_price" placeholder="Price in $" min="1" class="form-control">
                            <p class="text-left text-danger mt-2" id="p4"></p>
                        </div>
                        <div class="mb-3">
                            <input type="number" id="product_discount" min="0" max="100" placeholder="Discount rate in %" class="form-control">
                            <p class="text-left text-danger mt-2" id="p6"></p>
                        </div>
                        <div class="mb-3">
                            <input type="file" id="product_image" name="product_image"  />
                            <p class="text-left text-danger mt-2" id="p5"></p>
                            <input type="button" class=" btn" id="edit_image" value="Update image"/>
                        </div>
                        <div class="addbtn mb-3">
                            <button  id="submit_product" name="submit_product" class=" btn">Submit</button>
                            <button id="Update_product" class=" btn">Update</button>
                            <button id="cancel_p"  class=" btn" >Cancel</button>
                        </div>
                        
                        <h4 id="h4"></h4>
                       
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- modal delete Deactivate -->
    <div class="modal" id="myModaldelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delet Or Deactivate Product </h5>
                    <button class="close btn" style="" data-bs-dismiss="modal">x</button>
                   
                </div>
                <div class="modal-body">
                <form>
                    <input type="hidden" id="idd" value="">
                    <button id="deactivate_product" class=" btn">Deactivate Product</button>
                    <button id="delete_product" class=" btn">Delete Product</button>
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
        
         $('#edit_image').hide();
         $('#Update_product').hide();
         $('#cancel_p').hide();

          
        
         
    </script>
    <script src="..\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>
</html>