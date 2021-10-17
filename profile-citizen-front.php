<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"> </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.8.2.min.js"></script>
    <style>
        .mandatory{
            color: red;    
        }
    </style>
    <script>
        function showpreview(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#preview').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }

    </script>
    <script>
        $(document).ready(function() {
            //$("#txtUid").focus();

           /* $("#fetchprofile").click(function() {
                var uid = $("#txtUid").val();
                
                var actionUrl = "ajaz-citizen-profile-fetchError.php?uid=" + uid;
                $.get(actionUrl, function(response) {
                    $("#errfetch").html(response);
                });
            });*/
            $("#txtEmail").blur(function() {

                var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

                var uid = $("#txtEmail").val();
                if (uid == "") {
                    $("#errSEmail").html("Fill the UserId/Email Id");
                } else
                if (r.test(uid) == false) {
                    $("#errSEmail").html("Fill Valid User Id/Email Id");

                } else {
                    $("#errSEmail").html("Okay");
                }

            });
            $("#fetchprofile").click(function() {
                // alert("kdfbskdjbfkdb");
                var uid = $("#txtUid").val();
                alert(uid);
                var url = "Json-fetch-profile-citizen.php?uid="+uid;
                //0 or 1 possibility
                $.getJSON(url, function(jsonAryResponse) {
                    //alert(JSON.stringify(jsonAryResponse));

                    if (jsonAryResponse.length == 0)
                        $("#errfetch").html("Invalid Username").css('color', 'red');
                    else {
                        $("#errfetch").html("valid Username").css('color', 'blue');
                        $("#txtName").val(jsonAryResponse[0].name);
                        $("#txtContact").val(jsonAryResponse[0].contact);
                        $("#txtCity").val(jsonAryResponse[0].city);
                        $("#combostate").val(jsonAryResponse[0].state);
                        $("#txtAddress").val(jsonAryResponse[0].address);
                        $("#hdn").val(jsonAryResponse[0].pic);
                        $("#preview").prop("src", "uploads/" + jsonAryResponse[0].pic);
                        $("#txtEmail").val(jsonAryResponse[0].email);

                    }
                });
            });
        });

    </script>

</head>

<body>
    <div class="container-md" style=" background-color:lightgrey">
        <div class="h2 border "style="background-color: #09203f; color: white;">
            <center>Citizen Profile</center>
        </div>
        <form action="profile-citizen-process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="hdn" name="hdn">
            <div class="form-row">
                <div class="col-md-8 form-group">
                    <label for="">Username<span class="mandatory">   *</span></label>
                    <input type="text" id="txtUid" class="form-control"  name="txtUid" value='<?php echo $_SESSION["activeuser"];?> '>
                    <span id="errUid" class="form-text text-muted"></span>
                </div>
                <div class="col-md-2 offset-1 form-group">
                    <input type="button" class="btn btn-secondary" value="Fetch Profile" id="fetchprofile" name="fetchprofile">
                    <span id="errfetch" class="form-text" style="color: blue"></span>
                </div>

                <div class="col-md-6  form-group">
                    <label for="">Citizen Name<span class="mandatory">   *</span></label>
                    <input type="text" id="txtName" required name="txtName" class="form-control">
                </div>
                <div class="col-md-4 offset-1 form-group">
                    <label for="">Contact Number<span class="mandatory">   *</span></label>
                    <input type="text" id="txtContact" required name="txtContact" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <lable for="">City<span class="mandatory">   *</span></lable>
                    <input type="text" id="txtCity" required name="txtCity" class="form-control">
                </div>
                <!--  <div class="col-md-4 offset-1 form-group">
               <lable for="">State</lable><br>
               <input list="combostate">
               <datalist id="combostate">
                   <option id="combostate" value="Andhra Pradesh"></option>
                   <option value="Arunachal Pradesh"></option>
                   <option value="Assam"></option>
                   <option value="Bihar"></option>
                   <option value="Chhattisgarh"></option>
                   <option value="Goa"></option>
                   <option value="Gujarat"></option>
                   <option value="Haryana"></option>
                   <option value="Himachal Pradesh"></option>
                   <option value="Jharkhand"></option>
                   <option value="Kerala"></option>
                   <option value="Madhya Pradesh	"></option>
                   <option value="Maharashtra"></option>
                   <option value="Manipur"></option>
                   <option value="Meghalaya"></option>
                   <option value="Mizoram"></option>
                   <option value="Nagaland"></option>
                   <option value="Odisha"></option>
                   <option value="Punjab"></option>
                   <option value="Rajasthan"></option>
                   <option value="Sikkim"></option>
                   <option value="Tamil Nadu"></option>
                   <option value="Telangana"></option>
                   <option value="Tripura"></option>
                   <option value="Uttar Pradesh"></option>
                   <option value="Uttarakhand"></option>
                   <option value="West Bengal"></option>
               </datalist>
               
          </div>  -->
             <div class="col-md-6     form-group">
             <lable for="">State<span class="mandatory">   *</span></lable><br>
              <select class=" form-control" required id="combostate" name="combostate">
                <option value="Select">Select</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
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
                        <option value="West Bengal">West Bengal</option>  
            </select>
              </div>
               <!-- <div class="col-md-6  form-group">
                    <lable for="">State</lable><br>
                    <select id="combostate" name="combostate" style="width:547px; height:38px; border-radius:3px">
                        <option id="combostate" value="Andhra Pradesh"></option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
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
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>-->
                <div class="col-md-12 form-group">
                    <lable for="">Address<span class="mandatory">   *</span></lable>
                    <input type="text" required id="txtAddress" name="txtAddress" class="form-control">

                </div>
                <div class="col-md-6 form-group">
                    <lable>Upload Profile Pic</lable>
                    <input type="file" id="fileProfile" name="fileProfile" class="form-control" onchange="showpreview(this);">
                    <img src="pics/agent.jpg" width="120" height="120" id="preview" style="margin-top:10px; margin-left:200px">
                </div>

                <div class="col-md-6 form-group">
                    <lable for="">Email</lable>
                    <input type="text" id="txtEmail" name="txtEmail" class="form-control">
                    <span id="errSEmail" class="form-text text-muted" style="text-align:right"></span>
                </div>
                <div class="col-md-12 offset-5 form-group ">
                    <input type="submit" id="Save" name="btn" value="Save" class="btn btn-success" style="width:100px">
                    <input type="submit" id="Update" name="btn" value="Update" class="btn btn-primary" style="width:100px; ">
                </div>
                <p><span style="color:red">*</span> If you are saving your profile for first time, click on <span style="color:green">SAVE</span> button. And if you are updating your profile then click on <span style="color:blue">UPDATE</span>  button.</p>
            </div>

        
        </form>
    </div>

</body>

</html>
