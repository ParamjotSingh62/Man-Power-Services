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
            $scope.value;
            $scope.doclick=function(){
                alert("hello");
            }
    $(document).ready(function(){
        $("#star1").click(function(){
            value=$(this).attr('value');
            alert(value);
            $("#star1").css({"color": "red", "font-size": "170%"});
            //$scope.doclick();    
        }); 
        $("#star2").click(function(){
            $("#star1").css({"color": "red", "font-size": "170%"});
            $("#star2").css({"color": "red", "font-size": "170%"});
            value=$(this).attr('value');
            alert(value);
        }); 
        $("#star3").click(function(){
            $("#star1").css({"color": "red", "font-size": "170%"});
            $("#star2").css({"color": "red", "font-size": "170%"});
            $("#star3").css({"color": "red", "font-size": "170%"});
            value=$(this).attr('value');
            alert(value);
        }); 
        $("#star4").click(function(){
            $("#star1").css({"color": "red", "font-size": "170%"});
            $("#star2").css({"color": "red", "font-size": "170%"});
            $("#star3").css({"color": "red", "font-size": "170%"});
            $("#star4").css({"color": "red", "font-size": "170%"});
            value=$(this).attr('value');
            alert(value);
        }); 
        $("#star5").click(function(){
            $("#star1").css({"color": "red", "font-size": "170%"});
            $("#star2").css({"color": "red", "font-size": "170%"});
            $("#star3").css({"color": "red", "font-size": "170%"});
            $("#star4").css({"color": "red", "font-size": "170%"});
            $("#star5").css({"color": "red", "font-size": "170%"});
            value=$(this).attr('value');
            alert(value);
        });
    });
            alert(value);
        }); 
    </script>
    
</head>
<body ng-app="myModule" ng-controller="myController">
  <!-- <i class="icon-star"></i> icon-star
<i class="fa fa-star" aria-hidden="true">&#9734;</i>-->
   <table>
       <tr>
           <td>
    <span class="star" id="star1"  value="1">&star;</span>
    <span class="star" id="star2" value="2">&star;</span>
    <span class="star" id="star3" value="3">&star;</span>
    <span class="star" id="star4" value="4">&star;</span>
    <span class="star" id="star5" value="5">&star;</span>
    </td>
       </tr>
   </table>
    <!--    <span style="font-size:150%;color:white;">&starf;</span>-->
<!--<span n style="font-size:150%; color:yellow">&starf;</span>-->
<!--<span>&starf;</span>-->
<!--&starf;
&bigstar;-->

</body>
</html>