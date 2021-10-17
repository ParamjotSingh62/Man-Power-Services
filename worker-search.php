<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"> </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/angular.min.js"></script>
      <!-- <link rel="stylesheet" href="css/font-awesome.min.css">-->
        <style>
        .stars-outer {
            display: inline-block;
            position: relative;
            font-family: FontAwesome;
        }
        .stars-outer:before{
            content:"\f006 \f006 \f006 \f006 \f006";
            size:1rem;
        }
        .stars-inner{
            position: absolute;
            top: 0;
            left: 0;
            white-space: nowrap;
            overflow: hidden;
            width=50%;
        }
        .stars-inner::before{
            content: "\f005 \f005 \f005 \f005 \f005";
            color: #f8ce0b;
            size= 1rem;
        }
    </style>
    <script>
        var varModule = angular.module("myModule", []);
        varModule.controller("myController", function($scope, $http) {
            
            $scope.jsonArray;
            $scope.jsonArraycity;
            $scope.jsonArraySelected;
            $scope.jsonArrayshowmodal;
            
            $scope.doFetchAll=function(){
                $http.get("Json-fetchcategory.php").then(OkFx,notOkFx);
                
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
                $http.get("Json-fetchcity.php").then(Ok1,notOk1);
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
				$http.get("JSON-fetch-selected.php?category="+$scope.selObject.category+"&city="+$scope.selCity.city).then(okFx,notOkFx);
									function okFx(response)
									{
									alert(JSON.stringify(response.data));//data contains jsonArray-shows jsonArray 
									$scope.jsonArraySelected=response.data;	
									}
									function notOkFx(response)
									{
										alert(response.data);//shows error
									}
				
			}
            $scope.showDetails=function(index)
            {
                //alert(JSON.stringify($scope.jsonArraySelected[index]));
                $scope.jsonArrayshowmodal=$scope.jsonArraySelected[index];
            }
            });
    </script>
</head>

<body ng-app="myModule" ng-controller="myController" ng-init="doFetchAll();">
    <div class="container-md" style=" background-color:lightgrey">
        <div class="h2 border" style="background-color: #09203f;color:white;">
            <center>Worker Search</center>
        </div>
       <!-- <hr  color="red">    
        <hr color="red" > -->   
           <div style="margin-left:440px" >
            <h5 >Load Category of Worker</h5>
            <select ng-model="selObject"  ng-options="obj.category for obj in jsonArray"  ></select>
                    </div>
                    <hr  color="#09203f;">    
        <hr color="#09203f;" > 
            <div style="margin-left:485px">
            <h5 > Load City</h5>
            <select ng-model="selCity"  ng-options="obj.city for obj in jsonArraycity"></select>
<!--            <div style="margin-left:800px" class="btn btn-primary" ng-click="doFetchSelected();">Show</div>-->
            </div>
           <hr  color="#09203f;">    
        <hr color="#09203f;" > 
           <input type="button" style="margin-left:485px" width="100" class="btn btn-primary" ng-click="doFetchSelected();" value="Show" width="150">

        <center>
           <br><br>
            
            <div class="container">
			<div class="row">
				<div class="col-md-3" ng-repeat="obj in jsonArraySelected">
					<div class="card" >
						<img src="uploads/{{obj.ppic}}" height="100" class="card-img-top" alt="Image">
						<div class="card-body">
							<h5 class="card-title">Name: {{obj.wname}}</h5>
							Ratings: <div class="stars-outer" ng-show="{{obj.count}}">
							    <div class="stars-inner" style="width:{{obj.total/obj.count*20}}%"></div>
							</div><br>   
							<p class="card-text">Experience: {{obj.exp}}</p>
							<p class="card-text">Specialization: {{obj.spl}}</p>
							<p class="card-text">Mobile: {{obj.cnumber}}</p>
							<div  ng-click="showDetails($index);" class="btn btn-primary" data-toggle="modal" data-target="#showdetails">Worker Details</div>
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
                        <h5 class="modal-title">Worker Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form >
                           <center>       
                            <table cellpadding="10" >
                                <tr>
                                    <td colspan="2">
                                       <center> <img src="uploads/{{jsonArrayshowmodal.ppic}}" class="card-img-top"  height="200" style="border-radius:50%; width:200px"></center>
                                    </td>
                                </tr>
                                <tr >
                                    <td style=" width:220px">Worker ID: <b>{{jsonArrayshowmodal.uid}}</b></td>
                                    <td style=" width:220px">Email: <b>{{jsonArrayshowmodal.email}}</b></td>
                                </tr>
                                <tr >
                                    <td style=" width:220px">Worker Name: <b>{{jsonArrayshowmodal.wname}}</b></td>
                                    <td style=" width:220px">Contact: <b>{{jsonArrayshowmodal.cnumber}}</b></td>
                                </tr>
                                <tr >
                                    <td style=" width:220px">City: <b>{{jsonArrayshowmodal.city}}</b></td>
                                    <td style=" width:220px">State: <b>{{jsonArrayshowmodal.stat}}</b></td>
                                </tr>
                                <tr >
                                    <td colspan="2" style=" ">Address: <b>{{jsonArrayshowmodal.address}}</b></td>
                                    
                                </tr>
                                <tr >
                                    <td style=" width:220px">Category: <b>{{jsonArrayshowmodal.category}}</b></td>
                                    <td style=" width:220px">Experience: <b>{{jsonArrayshowmodal.exp}} Years</b></td>
                                </tr>
                                <tr >
                                    <td colspan="2" style=" ">Other Info: <b>{{jsonArrayshowmodal.otherinfo}}</b></td>
                                    
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
