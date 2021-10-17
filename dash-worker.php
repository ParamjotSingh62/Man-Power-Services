    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"> </script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery-1.8.2.min.js"></script>
        <style>
            .mandatory {
                color: red;
            }
            .contain{
                margin-left: 80px;
                width: 1370px;
                height: 500px;
                display: flex;
                flex-wrap: wrap;
                border:1px solid black;
                background-color:azure;    
            }

        </style>
        <script>
            $(document).ready(function(){
                $("#postrequest").click(function(){
                    var citizenuid=$("#txtUid").val();
                    var workeruid=$("#txtWUid").val();
                    var actionUrl="ajax-rating-request-worker.php?citizenuid=" +citizenuid+"&workeruid=" +workeruid;
                    //alert(actionUrl);
                    $.get(actionUrl,function(response){
                            $("#errpostrequest").html(response);
                        });
                    });
                });

        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg " style="background-color: #09203f;color:white;">
            <div class="container">
                <a class="navbar-brand "><i>
                        <h3 >Mps.com<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    Worker Dashboard</h5></h3>
                    </i></a>
                    <h5 style="color: white">Welcome: <i ><?php session_start(); echo $_SESSION["activeuser"];?></i></h5>
            </div>
        </nav>
<div class="contain">
        <a href="profile-worker-front.php" style="text-decoration:none; color:black ;float:left">
            <div class="card" style=" margin-top:50px; margin-left:50px; margin-right:50px ;background-color:aliceblue;">
                <img src="pics/agent.jpg"  height="170" class="card-img" title="Go to profile page" alt="Profile" style="border-radius:50%; width:170px; margin-left:50px">
                <div class="card-body">
                    <h5 class="card-title" align="center" >Profile</h5>
                    <p class="card-text">You can update your profile here.</p>
                    <!--    <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                </div>
            </div>
        </a>
        
        
            <div class="card" style="width: 18rem; height:17rem; background-color:aliceblue;margin-top:50px">
                <img src="pics/rating.jpg" height="" class="card-img" title="Go to profile page" alt="..." style="">
                <div class="card-body">
                    <center><input type="button" class="btn btn-primary" value="Request/Get Rating" data-toggle="modal" data-target="#modal" style="text-decoration:none" ></center>
                    <p class="card-text">You can Send Rating Request to Citizen.</p>
                    <!--    <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                </div>
            </div>
            <a href="citizen-search-by-worker.php" style="text-decoration:none;height:17rem; color:black ;float:left">
            <div class="card" style="width: 18rem; margin-top:50px; margin-left:50px;height:17rem;background-color:aliceblue;  ">
                <img src="pics/findwork.jpg" class="card-img" title="Go to profile page" height="175px" alt="Profile" style="border-radius:50%">
                <div class="card-body">
                    <h5 class="card-title" align="center" >Find Work</h5>
                    <p class="card-text">Search for a work.</p>
                    <!--    <a href="#" class="btn btn-primary">Go somewhere</a>  -->
                </div>
            </div>
        </a>
            <div class="card" style="width: 18rem; margin-top:50px; float: left;margin-left: 50px; height:17rem; background-color:aliceblue;">
                <img src="pics/logout.jpg" style="border-radius: 50%" class="card-img-top" alt="...">
                <div class="card-body">
                    
                    
                    <center><a href="logout.php" class="btn btn-success">Logout</a></center>
                </div>
            </div>
    </div>
       
        <div class="modal fade" tabindex="-1" role="dialog" id="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title">Request Rating</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form >        
                    <div class="col-md-12 form-group">
                        <label for=""      >Citizen Id<span class="mandatory" >  *</span></label>
                        <input type="text" id="txtUid" required class="form-control" name="txtUid"     >
                       <!-- <span id="errUid" class="form-text text-muted"></span> -->
                    </div>
                            <div class="col-md-12 form-group">
                        <label for=""      >Worker Uid</label>
                        
                        <input type="text" id="txtWUid" class="form-control" name="txtWUid" disabled value='<?php  echo $_SESSION["activeuser"];?>'    >
                       <!-- <span id="errUid" class="form-text text-muted"></span>   -->
                    </div>
                     </form>
                        </div>
                    <div class="modal-footer">
                        <span class="form-text text-muted" id="errpostrequest"></span>
                        <input type="button" class="btn btn-primary"  id="postrequest" value="Send" >
                    </div>

                </div>
            </div>
        </div>
    </body>

    </html>
