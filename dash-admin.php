<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"> </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script>
        var varModule = angular.module("myModule", []);
        varModule.controller("myController", function($scope, $http) {

        });

    </script>
</head>

<body ng-app="myModule" ng-controller="myController">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand "><i>
                    <h3>Mps.com<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Admin Dashboard</h5>
                    </h3>
                </i></a>
        </div>
    </nav>
    <center>
        <div class="container-md" style="background-color: lightcyan; width: 900px; height: 300px">
            <div class="card" style="width: 18rem; float: left; margin-left: 120px">
                <img src="pics/managerUsers.png" style="border-radius: 50%" class="card-img-top" alt="...">
                <div class="card-body">
                    
                    
                    <a href="manager-workers-fornt.php" class="btn btn-info">Users Manager</a>
                </div>
            </div>
             <div class="card" style="width: 18rem; float: left;margin-left: 50px">
                <img src="pics/logout.jpg" style="border-radius: 50%" class="card-img-top" alt="...">
                <div class="card-body">
                    
                    
                    <a href="index.html" class="btn btn-success">Logut</a>
                </div>
            </div>
        </div>
    </center>
</body>

</html>
