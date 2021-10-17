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
            
            $scope.jsonArray;
            $scope.jsonArraycity;
            $scope.jsonArraySelected;
            //$scope.jsonArrayshowmodal;
            
            $scope.doFetchAll=function(){
                $http.get("Json-fetchcategory-forwork.php").then(OkFx,notOkFx);
                
                function OkFx(response)
                {
                    //alert(JSON.stringify(response.data));
                    $scope.jsonArray=response.data;
                    //$scope.jsonArraycity=response.data;
                    $scope.selObject=$scope.jsonArray[0];
                    //$scope.selCity=$scope.jsonArraycity[0];
                    
                }
                function notOkFx(response)
                {
                    alert(response.data)
                }
                $http.get("Json-fetchcity-forwork.php").then(Ok1,notOk1);
                function Ok1(response)
                {
                    //alert(JSON.stringify(response.data));
                    $scope.jsonArraycity=response.data;
                   // $scope.jsonArraycity=response.data;
                    $scope.selCity=$scope.jsonArraycity[0];
                    //$scope.selCity=$scope.jsonArraycity[0];
                    
                }
                function notOk1(response)
                {
                    alert(response.data)
                }
            }
            
            /*$scope.doFetchCity=function(){
                $http.get("Json-fetchcity.php").then(OkFx,notOkFx);
                function OkFx(response)
                {
                   // alert(JSON.stringify(response.data));
                   
                    $scope.jsonArraycity=response.data;
                    // alert(JSON.stringify($scope.jsonArraycity[0]));
                    $scope.selCity=$scope.jsonArraycity[0];
                    // alert(JSON.stringify($scope.selCity));
                   
                   //    $scope.selCity =$scope.jsonArray[1];
                }
                function notOkFx(response)
                {
                    alert(response.data)
                }
            }*/
            
            
            $scope.doFetchSelected=function()
			{
				//alert($scope.selObject.mobile);
				$http.get("JSON-fetch-selected-forwork.php?category="+$scope.selObject.category+"&city="+$scope.selCity.city).then(okFx,notOkFx);
									function okFx(response)
									{
									// alert(JSON.stringify(response.data));//data contains jsonArray-shows jsonArray 
									$scope.jsonArraySelected=response.data;	
									}
									function notOkFx(response)
									{
										alert(response.data);//shows error
									}
				
			}
            $scope.showDetails=function(citizenuid)
            {
                $http.get("Json-fetch-citizendetails-forwork.php?uid="+citizenuid).then(okFx,notOkFx);
                function okFx(response)
                {
                   // alert(JSON.stringify(response.data));
                                        $scope.jsonArrayshowmodal=response.data;

                    //alert(JSON.stringify($scope.jsonArrayshowmodal));
                }
                function notOkFx(response)
                {
                    alert(response.data);
                }
                
            }
        });
    </script>
    <style>
        .class{
            background-color:darkslateblue
        }
    </style>
</head>

<body ng-app="myModule" ng-controller="myController" ng-init="doFetchAll();">
    <div class="container-md" style=" background-color:lightgrey" >
        <div class="h2 border btn-success" style="background-color: #09203f; color:white;">
            <center>Search Work</center>
        </div>
       <!-- <hr  color="red">    
        <hr color="red" > -->   
           <div style="margin-left:440px" >
            <h5 >Load Category of Work</h5>
            <select ng-model="selObject"  ng-options="obj.category for obj in jsonArray"  ></select>
                    </div>
                    <hr  color="black">    
        <hr color="black" > 
            <div style="margin-left:485px">
            <h5 > Load City</h5>
            <select ng-model="selCity"  ng-options="obj.city for obj in jsonArraycity"></select>
<!--            <div style="margin-left:800px" class="btn btn-primary" ng-click="doFetchSelected();">Show</div>-->
            </div>
           <hr  color="black">    
        <hr color="black" > 
           <input type="button" style="margin-left:485px" width="100" class="btn btn-primary" ng-click="doFetchSelected();" value="Show" width="150">

        <center>
           <br><br>
            
            <div class="container">
			<div class="row">
				<div class="col-md-3" ng-repeat="obj in jsonArraySelected">
					<div class="card" >
					<br>
						<h5  class="card-title">Citizen ID: {{obj.custuid}}</h5>
						<div class="card-body">
							<p class="card-text">Category: {{obj.category}}</p>
							<p class="card-text">Location: {{obj.location}}</p>
							<p class="card-text">Problem: {{obj.problem}}</p>
							<p class="card-text">Date of Post: {{obj.date}}</p>
							<div  ng-click="showDetails(obj.custuid);" class="btn btn-info" data-toggle="modal" data-target="#showdetails">Get Citizen Details</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        </center>    
    </div>
      <div class="modal fade" tabindex="-1" role="dialog" id="showdetails">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Citizen Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form >
                           <center>       
                            <table  cellpadding="10" >
                                <tr>
                                    <td >
                                        <img src="uploads/{{jsonArrayshowmodal[0].pic}}" class="card-img-top"  height="200" style="border-radius:50%; width:200px">
                                    </td>
                                </tr>
                            
                                <tr >
                                    <td  >Citizen Name: <b>{{jsonArrayshowmodal[0].name}}</b></td> 
                                </tr>
                                <tr >
                                    <td  >Address: <b>{{jsonArrayshowmodal[0].address}}</b></td> 
                                </tr>
                                <tr >
                                    <td  >City: <b>{{jsonArrayshowmodal[0].city}}</b></td>
                                   
                                </tr>
                                <tr >
                                    <td >Contact: <b>{{jsonArrayshowmodal[0].contact}}</b></td>
                                </tr>
                                <tr >
                                    <td     >Email: <b>{{jsonArrayshowmodal[0].email}}</b></td>
                                </tr>
                            </table>
                            </center>

                            </form>
                        </div>
                        <div class="modal-footer">
                           
                            <input type="button" class="btn btn-primary" value="Okay" data-dismiss="modal">
                        </div>
                    
                </div>
            </div>
        </div>

</body>

</html>
