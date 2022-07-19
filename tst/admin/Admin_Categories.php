<?php

require("../Utils/utils.php");

checkSessionAdmin();


?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Categories</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link href="css/categories.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\ajax\jquery.min.js"></script>
    <script src="..\bootstrap\js\bootstrap.min.js"></script>
    <script src="js/Admin_Categories.js"></script>
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
        <h1>Categories</h1>
    </div>
    <!-- control -->
    <div class="setting">
        <form class="form-inline justify-content-center">
            <div class="card-body mt-3">
                <input type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal" value="Add Category" id="ADD">
                <span class="font-weight-bold">Filter by: </span>
                <select class="select form-control" id="selected">
                    <option value="Display All">Display All</option>                
                    <option value="Activated Categories">Activated Categories</option>
					<option value="Deactivated Categories">Deactivated Categories</option> 
                </select>
				
                <input id="txtSearch" class="form-control mr-sm-2 ml-10"  placeholder="Category Name" aria-label="Search" ></inp>		
            </div>
        </form>
    </div>
	
	
	
    <!-- table -->
    <div class="col">
        <table class="table table-hover table-bordered mt-2  mr-3 " border="0" id="categoriestable">
            <thead>
                <tr>
                    <th scope="col">Image</th>
					<th scope="col">Category Name</th>             
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody id="categoriestbody">
				 </tbody>
        </table>
    </div>
	<!-- delete modal -->
	<div class="modal" id="myModaldelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delet Or Deactivate Product </h5>
                    <button class="close btn" style="" data-bs-dismiss="modal">x</button>
                   
                </div>
                <div class="modal-body">
                    <button id="deactivate_category" class=" btn">Deactivate Category</button>
                    <button id="delete_category" class=" btn">Delete Category</button>
                </div>

            </div>
        </div>
    </div>
	
   <!-- modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Setheader" >Add New Category</h5>
                    <button class="close btn" style="" data-bs-dismiss="modal">×</button>
                   
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <input type="text" placeholder="Category Name" class="form-control" id="editname">
                        </div>
                       
                        <div class="mb-3">
                            <input type="file" id="chooseimage" /><input type="hidden"  placeholder="image" class="form-control" id="editimage">		
						</div>
                        <div class="mb-3">
                            <button type="submit" class="addbtn btn" id="OK">Add</button>
							<button  type="hidden"  class="addbtn btn" id="SUBEDI">Update</button>
							<button  type="hidden"  class="addbtn btn" id="CANEDI">Cancel</button>
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
                    


    </script>
    <script src="..\bootstrap\js\bootstrap.bundle.min.js"></script>
</body>
</html>