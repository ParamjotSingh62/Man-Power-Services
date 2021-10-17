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
            $scope.JsonAryFetchUsers;
           
            
            $scope.doFetchUsers=function()
              {
                   var category=$("#category").val();
                   alert(category); 
                       $http.get("Json-fetch-users-to-manage.php?category="+category).then(ok,notok);
                       function ok(response)
                       {
                           alert(JSON.stringify(response.data));
                           $scope.JsonAryFetchUsers=response.data   ;
                       }
                       function notok(response)
                       {
                           alert(response.data);
                       }
               }
               
               
               /*=--=-=-=-=-=BLOCK=-=-=--=-=-=-=-=*/
               $scope.doBlock=function(uid)
               {
                   //alert(uid);
                   $http.get("Json-block-user.php?uid="+uid).then(ok,notok);
                   function ok(response)
                   {
                       alert(response.data);
                       $scope.doFetchUsers();
                       //alert(JSON.stringify(response.data));
                       //$scope.JsonAryFetchUsers=(response.data);
                   }
                   function notok(response)
                   {
                       alert(response.data);
                   }
                   
               }
               /*=-==-==-=-=-==-RESUME=-=-=--=-==*/
               $scope.doResume=function(uid)
               {
                   //alert(uid);
                   $http.get("Json-resume-user.php?uid="+uid).then(ok,notok);
                   function ok(response)
                   {
                       alert(response.data);
                       $scope.doFetchUsers();
                       //alert(JSON.stringify(response.data));
                       //$scope.JsonAryFetchUsers=(response.data);
                   }
                   function notok(response)
                   {
                       alert(response.data);
                   }
                   
               }
               /*-=-=-=-==-=-=-=-==-=-=DELETE=-=--=-=-=-=-=-=-*/
               $scope.doDelete=function(uid)
               {
                   $http.get("Json-Delete-user.php?uid="+uid).then(ok,notok);
                   function ok(response)
                   {
                       alert(response.data);
                       $scope.doFetchUsers();
                       //alert(JSON.stringify(response.data));
                       //$scope.JsonAryFetchUsers=(response.data);
                   }
                   function notok(response)
                   {
                       alert(response.data);
                   }
                   
               }
        });

    </script>
</head>

<body ng-app="myModule" ng-controller="myController">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand "><i>
                    <h3>Mps.com<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Users Manager</h5>
                    </h3>
                </i></a>
        </div>
    </nav>
    <center>
        <div class="container-md" style="background-color: lightgrey; width: 1100px">
            <div class="form-group">
						    <label for=""><h5 >Category    :</h5></label>
						    <select id="category"  style="margin-left: 30px; overflow-y: hidden; width: 150px; border: 1px solid black; margin-top:10px ">
						        <!--<option value="Select"  style=" border: 1px solid black"> Select</option>-->
						        <option value="Worker"  style=" border: 1px solid black"> Worker</option>
						        <option value="Citizen"  style=" border: 1px solid black"    > Citizen</option>
						    </select>
						    <input type="button" class="btn btn-primary" style="margin-left:100px" value="Fetch Users" ng-click="doFetchUsers();">
						</div>
                     
                      
                      
                       <table class="table">
                          <thead class="thead-dark">
                           <tr bgcolor="black" align="center">
                               <th style="color:white;">Sr. No.</th>
                               <th style="color:white;">User ID</th>
                               <th style="color:white;">Mobile</th>
                               <th style="color:white; ">Date of Signup</th>
                               <th style="color:white; ">Status</th>
                               <th style="color:white; width:220px " colspan="3">Action</th>
                           </tr>
                           </thead>
                           <tbody style="background-color: white" align="center">
                           <tr ng-repeat="obj in JsonAryFetchUsers">
                               <td>{{$index+1}}</td>
                               <td>{{obj.uid}}</td>
                               <td>{{obj.mobile}}</td>
                               <td>{{obj.dos}}</td>
                               <td>{{obj.status}}</td>
                            <td><input type="button" class="btn btn-warning" value="Block" ng-click="doBlock(obj.uid);"></td>
                            <td><input type="button" class="btn btn-success" value="Resume" ng-click="doResume(obj.uid);"></td>
                            <td><input type="button" class="btn btn-danger" value="Delete" ng-click="doDelete(obj.uid);"></td>
                            </tr>
                           </tbody>
                       </table>
                       
        </div>
    </center>
</body>

</html>
