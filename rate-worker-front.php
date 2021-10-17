<!DOCTYPE html>
<html lang="en">
<?php session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"> </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/angular.min.js"></script>
    <style>
        <style>
    .star{
        font-size: 150%;
        
    } 
    .star:hover{
         color: red;
    }
    </style>
	<script>
        var varModule = angular.module("myModule", []);
        varModule.controller("myController", function($scope, $http) {
            $scope.JsonArrFetchReq;
            $scope.starvalue;
            $scope.ratingAry;
           /*-=--==--=-=-=-=-=stars-=-=--=-=-=-=---=-=-=-=-=-=-=-*/
        
            /*=--==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=*/
           //    $scope.rating;
            $scope.fetchreq=function()
            {
                $http.get("Json-fetch-rating-requests.php?citizenuid="+$scope.txtUid).then(ok,notok);
                function ok(response)
                {
                    //alert(JSON.stringify(response.data));
                    $scope.JsonArrFetchReq=response.data;
                    
                }
                function notok(response)
                {
                    alert(response.data);
                }
            }
            
            $scope.r=function(val,indx)
            {
                for(i=1;i<=5;i++)
                    {
                        var id="r"+i+indx;
                        $("#"+id).css({"color": "", "font-size": "100%"});
                    }
                $scope.starvalue=val;
                for(i=1;i<=val;i++)
                    {
                        var id="r"+i+indx;
                        $("#"+id).css({"color": "red", "font-size": "120%"});
                    }
            }
            
            $scope.doPost=function(obj,i)
            {
                alert($scope.starvalue);
                alert(obj.workeruid);
                /*var total =$("#rating").val();
                alert(total);*/
                $http.get("Json-update-worker-rating.php?workeruid="+obj.workeruid+"&total="+$scope.starvalue).then(ok,notok);
                function ok(response)
                {
                    alert(response.data);
                    //$scope.JsonArrFetchReq=response.data;
                }
                    function notok(response)
                    {
                        alert(response.data);
                    }
            
                //alert(rid);
                $http.get("Json-delete-worker-rating.php?rid="+obj.rid).then(ok,notok);
                function ok(response)
                {
                    //alert(response.data);
                    $scope.fetchreq();
                    $scope.ratingAry.splice(i,1);
                    
                    //$scope.JsonArrFetchReq=response.data;
                }
                    function notok(response)
                    {
                        alert(response.data);
                    }
                
            }
            
            
            
           /* $scope.star1=function()
            {
                value=$("#star1").attr('value');
                $scope.starvalue=value;
                alert($scope.starvalue);
                $("#star1").css({"color": "red", "font-size": "120%"});
            }
            $scope.star2=function()
            {
                value=$("#star2").attr('value');
                $scope.starvalue=value;
                alert($scope.starvalue);
                $("#star1").css({"color": "red", "font-size": "120%"});
                $("#star2").css({"color": "red", "font-size": "120%"});
            }
            $scope.star3=function()
            {
                value=$("#star3").attr('value');
                $scope.starvalue=value;
                alert($scope.starvalue);
                $("#star1").css({"color": "red", "font-size": "120%"});
                $("#star2").css({"color": "red", "font-size": "120%"});
                $("#star3").css({"color": "red", "font-size": "120%"});
            }
            $scope.star4=function()
            {
                value=$("#star4").attr('value');
                $scope.starvalue=value;
                alert($scope.starvalue);
                $("#star1").css({"color": "red", "font-size": "120%"});
                $("#star2").css({"color": "red", "font-size": "120%"});
                $("#star3").css({"color": "red", "font-size": "120%"});
                $("#star4").css({"color": "red", "font-size": "120%"});
            }
            $scope.star5=function()
            {
                value=$("#star5").attr('value');
                $scope.starvalue=value;
                alert($scope.starvalue);
                $("#star1").css({"color": "red", "font-size": "120%"});
                $("#star2").css({"color": "red", "font-size": "120%"});
                $("#star3").css({"color": "red", "font-size": "120%"});
                $("#star4").css({"color": "red", "font-size": "120%"});
                $("#star5").css({"color": "red", "font-size": "120%"});
            }*/
            
        });
    </script>
</head>

<body ng-app="myModule" ng-controller="myController">
    <div class="container-md" style=" background-color:lightgrey">
        <div class="h2 border" style="background-color:#09203f; color:white;">
            <center>Rate Worker</center>
        </div>
        <div class="form-row">
            <div class="col-md-4 form-group">
                <label for="txtUid">User ID</label><br>
                <input type="text" ng-model="txtUid" class="form-control" ng-init="txtUid='<?php  echo $_SESSION["activeuser"];?>'">
            </div>
            <div class="col-md-3">
                <input type="button" class="form-control btn btn-info" value="Fetch Rating Requests" ng-click="fetchreq();">
            </div>
        </div>
        <div style="background-color:white">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">Worker ID</th>
      <th scope="col">Rating</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="obj in JsonArrFetchReq">
      <td scope="row">{{$index+1}}</td>
      <td>{{obj.workeruid}}</td>
      <td class="star">
        <span id="r1{{$index}}" ng-click="r(1,$index);" value="1">&star;</span>
        <span id="r2{{$index}}" ng-click="r(2,$index);" value="2">&star;</span>
        <span id="r3{{$index}}" ng-click="r(3,$index);" value="3">&star;</span>
        <span id="r4{{$index}}" ng-click="r(4,$index);" value="4">&star;</span>
        <span id="r5{{$index}}" ng-click="r(5,$index);" value="5">&star;</span>
        </td>
      <td><input type="button" class="btn btn-success" value="Rate" ng-click="doPost(obj,$index); "></td>
    </tr>
    
  </tbody>
</table>    
    </div>
    </div>
</body>

</html>
