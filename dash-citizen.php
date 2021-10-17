    <?php session_start(); 
    if(isset($_SESSION["activeuser"])==false)
    {
        header("location:index.html");
    }
    ?>
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
            .mandatory {
                color: red;
            }
            .contain{
                margin-left: 80px;
                width: 1370px;
                height: 1000px;
                display: flex;
                flex-wrap: wrap;
                border:1px solid black;
            }
        </style>
        <script>
            $(document).ready(function(){
                $("#postrequest").click(function(){
                    var uid=$("#txtUid").val();
                    var category=$("#combocategory").val();
                    var problem=$("#txtproblem").val();
                    var location=$("#txtLocation").val();
                    var city=$("#txtCity").val();
                    var actionUrl="ajax-post-requirement-citizen.php?uid=" +uid+"&category=" +category+"&problem=" +problem+"&location=" +location+"&city=" +city;
                    alert(actionUrl);
                    $.get(actionUrl,function(response){
                            $("#errpostrequest").html(response);
                        });
                    });
                });

        </script>
        <script>
            var varModule = angular.module("myModule", []);
        varModule.controller("myController", function($scope, $http) {
            $scope.txtUid;
            $scope.jsonArray;
            $scope.fetchMobPwd;
            $scope.msgnotify;
            $scope.fetchrequest=function()
            {
                $http.get("Json-fetchrequest.php?custuid="+$scope.txtUid).then(OkFx,notOkFx);
                
                function OkFx(response)
                {
                    alert(JSON.stringify(response.data));
                    $scope.jsonArray=response.data;
                    //$scope.jsonArraycity=response.data;
                   // $scope.selObject=$scope.jsonArray[0];
                    //$scope.selCity=$scope.jsonArraycity[0];
                    if(response.data=="")
                        {
                            //alert("No Recent Post Requests");
                            $scope.notification="No recent post requests";
                           /*$("#spannotify").html="No Recent Post Requests"; */
                        }
                    
                }
                function notOkFx(response)
                {
                    alert(response.data)
                }
            }
            //$scope.headings.hide();
            $scope.doDelete=function(requestid)
            {
                $http.get("Json-deleterequest.php?rid="+requestid).then(OkFx,notOkFx);
                function OkFx(response)
                {
                   // $scope.headings.show();
                    alert(response.data);
                    //$("#spannotify").html="Post Deleted";    
                   if(response.data=="deleted")
                       {
                           $scope.notification="Request Deleted"
                           $scope.fetchrequest();
                       }

                }
                function notOkFx(response)
                {
                    alert(response.data);
                }   
            }
            $scope.sendmessage=function()
            {
                var uid =$scope.txtUidd;
                alert(uid);
                $http.get("Json-fetch-mobpwd-for-retrival.php?uid="+uid).then(ok,notok);
                function ok(response)
                {
                    //alert(JSON.stringify(response.data));
                    var show=JSON.stringify(response.data);
                    //alert(show);
                    $scope.fetchMobPwd=response.data;
                    var mobile = $scope.fetchMobPwd[0].mobile;
                    var pwd = $scope.fetchMobPwd[0].pwd;
                    //alert("pwd:"+pwd+"and mobile:"+mobile);
                    /*var mob= $scope.fetchMobPwd.mobile;
                    alert(mob);*/
                    $http.get("sms-send.php?mobile="+mobile+"&pwd="+pwd).then(OK,NOTOK);
                    function OK(response){
                        alert(response.data);
                        $scope.msgnotify=response.data;
                    }
                    function NOTOK(response)
                    {
                        alert(response.data);
                    }
                    
                    
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
        <nav class="navbar navbar-expand-lg " style="background-color: #09203f;color:white;">
            <div class="container">
                <a class="navbar-brand "><i>
                            <h3 >Mps.com<h5>    Citizen Dashboard</h5></h3>
                    </i></a>
                    <h5 style="color: white">Welcome: <i ><?php  echo $_SESSION["activeuser"];?></i></h5>
            </div>
        </nav>
<div class="contain" style="background-color:azure;">
        <a href="profile-citizen-front.php" style="text-decoration:none; color:black ;float:left">
            <div class="card" style="width: 18rem; margin-top:50px; margin-left:30px;background-color:lightgrey">
                <img src="pics/agent.jpg" class="card-img" title="Go to profile page" alt="Profile" style="border-radius:50%">
                <div class="card-body">
                    <h5 class="card-title" align="center" >Profile</h5>
                    <p class="card-text">You can update your profile here.</p>
                    <!--    <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                </div>
            </div>
        </a>
        <div data-toggle="modal" data-target="#modalpostreq" style="text-decoration:none;float:left">

            <div class="card" style="width: 18rem; margin-top:50px; margin-left:50px;background-color:lightgrey">
                <img src="pics/allcus.png" height="263" class="card-img" title="Go to profile page" alt="..." style="">
                <div class="card-body">
                    <h5 class="card-title" align="center" >Post Requirement</h5>
                    <p class="card-text">Post your requirement request here.</p>
                    <!--    <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                </div>
            </div>
        </div>
        
        <div data-toggle="modal" data-target="#modalreqmanager" style="text-decoration:none;float:left">
            <div class="card" style="width: 18rem; margin-top:50px; margin-left:50px;background-color:lightgrey">
                <img src="pics/reqmanager.png" class="card-img" height="285" title="Go to profile page" alt="..." style="border-radius:50%">
                <div class="card-body">
                    <h5 class="card-title" align="center" >Request Manager</h5>
                    <p class="card-text">Manage your post requests here.</p>
                    <!--    <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                </div>
            </div>    
        </div>
        <a href="worker-search.php" style="text-decoration:none; color:black ;float:left">
            <div class="card" style="width: 18rem; margin-top:50px; margin-left:50px;background-color:lightgrey">
                <img src="pics/findworker.jpg" class="card-img" title="Go to profile page" alt="Profile" style="border-radius:50%">
                <div class="card-body">
                    <h5 class="card-title" align="center" >Find Worker</h5>
                    <p class="card-text">Search for a worker.</p>
                    <!--    <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                </div>
            </div>
        </a>
        <a href="rate-worker-front.php" style="text-decoration:none; margin-bottom:70px;     color:black ;float:left">
            <div class="card" style="width: 18rem; margin-left:30px;background-color:lightgrey">
                <img src="pics/workerratingreqest.jpg" class="card-img" title="Go to profile page" height="250px" alt="Profile" style="border-radius:50%">
                <div class="card-body">
                    <h5 class="card-title" align="center" >Rate Worker.</h5>
                    <p class="card-text">Worker might have requested rating request.</p>
                    <!--    <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                </div>
            </div>
        </a>
        <div data-toggle="modal" data-target="#modalforgetpwd" style="text-decoration:none;float:left; ">
            <div class="card" style="width: 18rem; margin-bottom:70px; margin-left:50px;background-color:lightgrey">
                <img src="pics/forgotpassword.png" style="background-size:contain;border-radius:50%;" class="card-img" height="285" title="Go to profile page" alt="..." >
                <div class="card-body">
                    <h5 class="card-title" align="center" >Forgot Password?</h5>
                    <!--<p class="card-text"></p>-->
                    <!--    <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                </div>
            </div>    
        </div>
        <div class="card" style="width: 18rem; float: left;margin-left: 50px; height:23rem;">
                <img src="pics/logout.jpg" style="border-radius: 50%" class="card-img-top" alt="...">
                <div class="card-body">
                    
                    
                    <a href="logout.php" class="btn btn-success">Logout</a>
                </div>
            </div>
</div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modalpostreq">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #09203f;color:white;">
                        <h5 class="modal-title">Post Requirement</h5>
                        <button type="button" class="close" style="background-color:red;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form >        
                            <div class="col-md-12 form-group">
                        <label for=""      >Username</label>
                        <input type="text" id="txtUid" class="form-control" name="txtUid" disabled  value='<?php echo $_SESSION["activeuser"];?>'   >
                        <span id="errUid" class="form-text text-muted"></span>
                    </div>

                            <div class="col-md-12  form-group"      >
                        <lable for="combocategory">Work Category<span class="mandatory"> *</span></lable><br>
                        <select id="combocategory" class="form-control" required name="combocategory" style="width:435px; height:38px; border-radius:5px; margin-top:8px">

                            <option value="Select" readonly>Select</option>
                            <option value="Electrician">Electrician</option>
                            <option value="Plumber">Plumber</option>
                            <option value="AC Technician">AC Technician</option>
                            <option value="Marble Flooring Contractor">Marble Flooring Contractor</option>
                            <option value="Carpenter">Carpenter</option>
                            <option value="Paint Contractor">Paint Contractor</option>
                            <option value="House Wiring Contractor">House Wiring Contractor</option>
                            <option value="Purifier Services">Purifier Services</option>
                            <option value="Interior Designer">Interior Designer</option>
                            <option value="House Builder Contractor">House Builder Contractor</option>
                         <!--   <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>   -->
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="txtproblem" style="margin-right:100px">Problem Facing/Fault<span class="mandatory"> *</span></label>
                        <input type="text" class="form-control" required name="txtproblem" id="txtproblem">    
                    </div>
                    <div class="col-md-6 form-group" style="float:left">
                                <label for="txtUid">Location</label>
                                <input type="text" name="txtLocation" id="txtLocation" class="form-control">  
                            </div>
                            <div class="col-md-6 form-group" style="float:left">
                                <label for="txtUid">City</label>
                                <input type="text" name="txtCity" id="txtCity" class="form-control">  
                            </div>

                            </form>
                        </div>
                    <div class="modal-footer">
                        <span class="form-text text-muted" id="errpostrequest"></span>
                        <input type="button" class="btn btn-primary"  id="postrequest" value="Submit" data-dismiss="modal">
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modalreqmanager">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #09203f;color:white;">
                        <h5 class="modal-title">Requests Manager</h5>
                        <button type="button" class="close" style="background-color:red;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form >        
                            <div class="col-md-12 form-group">
                        <label for=""      >User ID</label>
                        <input ng-model="txtUid" class="form-control" name="txtUid"   ng-init="txtUid='<?php  echo $_SESSION["activeuser"];?>'"  >
                        <span id="errUid" class="form-text text-muted"></span>
                    </div>

                        <center><input type="button" value="Fetch Requests" class="btn btn-info" ng-click="fetchrequest();">
                           <br><br>
                            </center>
                        <table border="1">
                            <tr bgcolor="lightgray"  >
                                <th>Sr. No</th>
                                <th>Worker Category</th>
                                <th>Problem</th>
                                <th>Date of post</th>
                                <th>Delete post</th>
                            </tr>
                            <tr ng-repeat="obj in jsonArray">
                                <td>{{$index+1}}</td>
                                <td>{{obj.category}}</td>
                                <td>{{obj.problem}}</td>
                                <td>{{obj.date}}</td>
                                <td><input type="button" value="Delete" ng-click="doDelete(obj.rid);"></td>
                            </tr>
                        </table>

                            </form>
                        </div>
                        <div class="modal-footer">
                           <h5>{{notification}}</h5>
                            <input type="button" class="btn btn-primary" value="Okay" data-dismiss="modal">
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="modalforgetpwd">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #09203f;color:white;">
                        <h5 class="modal-title">Forgot Password</h5>
                        <button type="button" class="close" style="background-color:red;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form >        
                            <div class="col-md-12 form-group">
                        <label for=""      >User ID</label>
                        <input ng-model="txtUidd" class="form-control" name="txtUidd"   ng-init="txtUidd='<?php  echo $_SESSION["activeuser"];?>'"  >
                        <span id="errUid" class="form-text text-muted"></span>
                            </div>
                            <b>Password Message Will be sent to registered mobile number.</b>

                        
                        
                            </form>
                        </div>
                        <div class="modal-footer" >
                           <h5 >{{msgnotify}}</h5>
                            <input type="button" value="Send Message" class="btn btn-info" ng-click="sendmessage();"  >
                            
                        </div>
                    
                </div>
            </div>
        </div>
    </body>

    </html>
