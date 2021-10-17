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
    <style>
        .mandatory {
            color: red;
        }

    </style>
    <script>
	function showpreviewAadhar(file) {

        if (file.files && file.files[0])
		 {
            var reader = new FileReader();
            reader.onload = function (ev) {
                $('#previewAadhar').attr('src', ev.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }
    }
    function showpreviewPic(file) {

        if (file.files && file.files[0])
		 {
            var reader = new FileReader();
            reader.onload = function (ev) {
                $('#previewPic').attr('src', ev.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }

    }
	</script>
	<script>
        $(document).ready(function(){
           
            $("#fetchprofile").click(function(){
                    var uid=$("#txtUid").val();
                    var actionUrl="ajaz-worker-profile-fetchError.php?uid="+uid;
                    $.get(actionUrl,function(response){
                        $("#errfetch").html(response);
                    });
                });
        
        $("#fetchprofile").click(function() {
              // alert("kdfbskdjbfkdb");
				var uid=$("#txtUid").val();
				var url="Json-fetch-profile-worker.php?uid="+uid;
				//0 or 1 possibility
				$.getJSON(url, function(jsonAryResponse) {
					//alert(JSON.stringify(jsonAryResponse));
					
					if(jsonAryResponse.length==0)
                    {
                        $("#errfetch").html("Invalid Username").css('color', 'red');
                        $("#txtEmail").val("");
                            $("#txtName").val("");
							$("#txtContact").val("");
                            $("#txtShopname").val("");
							$("#txtCity").val("");
							$("#combostate").val("");
							$("#txtAddress").val("");
                            $("#combocategory").val("");
                            $("#txSpcl").val("");
                            $("#txtExp").val("");
                            $("#pastportfolio").val("");
                            
                            $("#previewAadhar").prop("src","pics/aadhar.jpg");
                            $("#previewPic").prop("src","pics/upload.jpeg");
                            
                    }
                            
					else
						{
							$("#txtEmail").hide().val(jsonAryResponse[0].email).show(800);
                            $("#txtName").hide().val(jsonAryResponse[0].wname).show(800);
							$("#txtContact").hide().val(jsonAryResponse[0].cnumber).show(800);
                            $("#txtShopname").hide().val(jsonAryResponse[0].firmshop).show(800);
							$("#txtCity").hide().val(jsonAryResponse[0].city).show(800);
							$("#combostate").hide().val(jsonAryResponse[0].stat).show(800);
							$("#txtAddress").hide().val(jsonAryResponse[0].address).show(800);
                            $("#combocategory").hide().val(jsonAryResponse[0].category).show(800);
                            $("#txSpcl").hide().val(jsonAryResponse[0].spl).show(800);
                            $("#txtExp").hide().val(jsonAryResponse[0].exp).show(800);
                            $("#pastportfolio").hide().val(jsonAryResponse[0].otherinfo).show(800);
                            
							$("#hdn").val(jsonAryResponse[0].ppic);
                            $("#hdn2").val(jsonAryResponse[0].apic);
                           
							$("#previewAadhar").prop("src","uploads/"+jsonAryResponse[0].apic);
                            $("#previewPic").prop("src","uploads/"+jsonAryResponse[0].ppic)  ;
                            

						}
				    });
			     });
            });
    </script>
</head>

<body>
    <div class="container-md" style=" background-color:lightgrey">
        <div class="h2 border" style="background-color: #09203f; color: white;">
            <center>Worker Profile</center>
        </div>
        <form action="profile-worker-process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="hdn" name="hdn">
            <input type="hidden" id="hdn2" name="hdn2">
            <div class="form-row">
                <div class="col-md-5 form-group">
                    <label for="">Username<span class="mandatory"> *</span></label>
                    <input type="text"  id="txtUid" class="form-control" name="txtUid" value='<?php  echo $_SESSION["activeuser"];?>'   >
                    <span id="errUid" class="form-text " style="text-align:left"></span>
                </div>
                <div class="col-md-5 form-group">
                    <lable for="">Email</lable>
                    <input type="text"   id="txtEmail" name="txtEmail" class="form-control" style="margin-top:7.5px">
                    <span id="errSEmail" class="form-text " style="text-align:right"></span>
                </div>
                <div class="col-md-2 form-group" style="margin-top:7.5px">
                    <input type="button" class="btn btn-secondary" value="Fetch Profile" id="fetchprofile" name="fetchprofile">
                    <span id="errfetch" class="form-text " style="color: blue"></span>
                </div>
                <div class="col-md-6  form-group">
                    <label for="">Worker Name<span class="mandatory"> *</span></label>
                    <input type="text" required id="txtName" name="txtName" class="form-control">
                </div>
                <div class="col-md-4 offset-1 form-group">
                    <label for="">Contact Number<span class="mandatory"> *</span></label>
                    <input type="text"   id="txtContact" name="txtContact" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label for="">Shop/Firm Name</label>
                    <input type="text" id="txtShopname" name="txtShopname" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <lable for="">City<span class="mandatory"> *</span></lable>
                    <input type="text" id="txtCity" name="txtCity" required class="form-control" style="margin-top:7.5px">
                </div>
                <div class="col-md-3    form-group">
             <lable for="">State<span class="mandatory"> *</span></lable><br>
              <select style="margin-top:8px" class=" form-control" id="combostate" name="combostate">
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
                <!--<div class="col-md-3  form-group">
                    <lable for="">State<span class="mandatory"> *</span></lable><br>
                    <select id="combostate" required name="combostate" style="width:250px; height:38px; border-radius:3px;margin-top:7.5px">
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
                <div class="col-md-8 form-group">
                    <lable for="">Address<span class="mandatory"> *</span></lable>
                    <input type="text" required id="txtAddress" name="txtAddress" class="form-control">
                </div>
                <div class="col-md-4  form-group">
                    <lable for="combocategory">Work Category<span class="mandatory"> *</span></lable><br>
                    <select id="combocategory" class="form-control" required name="combocategory" >
                        <option id="combostate" value="Andhra Pradesh"></option>
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
                <div class="col-md-8 form-group">
                    <lable for="">Specialization</lable>
                    <input type="text" id="txSpcl" name="txSpcl" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                    <lable for="txtExp">Years of Experience<span class="mandatory"> *</span></lable>
                    <input type="number" required id="txtExp" name="txtExp" class="form-control">
                </div>
                <div class="col-md-8 form-group">
                    <label for="pastportfolio">Past Portfolio/Other Info</label>
                    <textarea id="pastportfolio" name="pastportfolio" rows="2" cols="100"></textarea>
                </div>
                <div class="col-md-6 form-group">
                    <lable>Upload Aadhar Card Pic<span class="mandatory"> *</span></lable>
                    <input type="file" id="fileAadhar" name="fileAadhar"  class="form-control" onchange="showpreviewAadhar(this);">
                    <img src="pics/aadhar.jpg" width="200" height="120" id="previewAadhar" style="margin-top:10px; margin-left:200px">
                </div>
                <div class="col-md-6 form-group">
                    <lable>Upload Profile Pic<span class="mandatory"> *</span></lable>
                    <input type="file" id="fileProfile" name="fileProfile" class="form-control" onchange="showpreviewPic(this);">
                    <img src="pics/upload.jpeg" width="120" required height="120" id="previewPic" style="margin-top:10px; margin-left:200px">
                </div>
                <div class="col-md-12 offset-4 form-group">
                    <input type="submit" id="Save" name="btn" value="Save" class="btn btn-success" style="width:100px">
                    <input type="submit" id="Update" name="btn" value="Update" class="btn btn-primary" style="width:100px; margin-left:170px">
                </div>
                <p><span style="color:red">*</span> If you are saving your profile for first time, click on <span style="color:green">SAVE</span> button. And if you are updating your profile then click on <span style="color:blue">UPDATE</span>  button.</p>
            </div>
        </form>
    </div>
</body>

</html>
