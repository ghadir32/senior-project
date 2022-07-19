<?php

// require("../Utils/utils.php");

// checkSessionAdmin();

?>


<!DOCTYPE html>

<html lang="en"  ng-app="myApp" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Angular with database server</title>
    <!-- <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css"> -->
    <!-- <link href="css\logins_register.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="..\bootstrap\css\bootstrap.min.css" />
    <script src="..\bootstrap\ajax\jquery.min.js"></script> -->
 
    <!-- <script src="..\bootstrap\js\bootstrap.min.js"></script> -->
    <script src="https://code.angularjs.org/1.7.5/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.8.2/angular-messages.js"></script>
    <script src="https://code.angularjs.org/1.8.2/angular-animate.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <script src="js\angJs.js"></script>

</head>
<body>


<div ng-controller="myFirstController" >

        <ul>
            <li ng-repeat="sent in rules"  ng-cloak > {{ sent.email }}</li>
        </ul>

        
        new email: <input type="text" ng-model="newEmail"/>
        <a href="#" class="btn btn-default" ng-click="newemail()">ADD</a>

      

</div>
   
</body>
</html>