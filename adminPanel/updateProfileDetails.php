<?php
	ob_start();
	session_start(); 
	include 'base/config.php'; 
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		$selectQuery = mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_id='".$_SESSION[$counterSessionName]['user_id']."'");
		$rowUser = mysqli_fetch_array($selectQuery);

		$selectUserLoginDetails = mysqli_query($conn,"select * from ".$masterLoginDetailsTbl." where user_id='".$_SESSION[$counterSessionName]['user_id']."'");
		$rowUserLoginDetails = mysqli_fetch_array($selectUserLoginDetails);
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="author" content="">
		<title>Update Profile | <?php echo $rowOrganizationDetails['organization_name'];?></title>
		<link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
		<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert2.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>
	<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns"> 
		<?php include 'base/header.php'; ?>
		<?php include 'base/menubar.php'; ?>
		<div class="app-content content">
			<div class="content-overlay"></div>
			<div class="header-navbar-shadow"></div>
			<div class="content-wrapper">
				<?php include 'base/breadcrumb.php'; ?>
				<div class="content-body">
					<!-- Dashboard Ecommerce Starts -->
					<section class="basic-select2">
						<div class="row match-height">
							<div class="col-md-12 col-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Update Profile</h4>
									</div>
									<div class="card-content">
										<div class="card-body">
											<form class="form form-horizontal" id="formId" action="updateProfileDetailsStatus" method="POST" enctype="multipart/form-data">
												<div class="form-body">
													<div class="row">
														<div class="col-md-4 col-12">
	                                                        <div class="form-group">
	                                                            <label for="first-name-icon">Full Name</label>
	                                                            <div class="position-relative has-icon-left">
	                                                                <input type="text" id="fullNameUser" name="fullNameUser" placeholder="Full Name" value="<?php echo $rowUser['user_full_name'];?>" class="form-control" onchange="validateFullName();" required>
	                                                                <div class="form-control-position">
	                                                                    <i class="feather icon-user"></i>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
														<div class="col-md-4 col-12">
	                                                        <div class="form-group">
	                                                            <label for="first-name-icon">Contact Number</label>
	                                                            <div class="position-relative has-icon-left">
	                                                                <input type="number" id="contactUser" name="contactUser" placeholder="Contact Number" class="form-control" value="<?php echo $rowUser['user_contact'];?>" onchange="validateContact();" required>
	                                                                <div class="form-control-position">
	                                                                    <i class="feather icon-smartphone"></i>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>  
														<div class="col-md-4 col-12"> 
	                                                        <div class="form-group">
	                                                            <label for="first-name-icon">E-Mail Id</label>
	                                                            <div class="position-relative has-icon-left">
	                                                                <input type="email" id="emailIdUser" name="emailIdUser" placeholder="E-Mail Id" class="form-control" value="<?php echo $rowUser['user_email_id'];?>" onchange="validateEmailId();" required>
	                                                                <div class="form-control-position">
	                                                                    <i class="feather icon-smartphone"></i>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
														<div class="col-md-4 col-12">
	                                                        <div class="form-group">
	                                                            <label for="first-name-icon">Password</label>
	                                                            <div class="position-relative has-icon-left">
	                                                                <input type="text" id="passwordUser" name="passwordUser" placeholder="Password" class="form-control" value="<?php echo $function->dataDecryption($rowUserLoginDetails['password']);?>" required>
	                                                                <div class="form-control-position">
	                                                                    <i class="feather icon-lock"></i>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
														<div class="col-md-8 col-12">
	                                                        <div class="form-group">
	                                                            <label for="first-name-icon">Address</label>
	                                                            <div class="position-relative has-icon-left">
	                                                                <textarea id="addressUser" name="addressUser" placeholder="Address" class="form-control" onchange="spclCharChk('addressUser');"><?php echo $rowUser['user_address'];?></textarea>
	                                                                <div class="form-control-position">
	                                                                    <i class="feather icon-map-pin"></i>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
													</div>
													<div class="row">
														<div class="col-6">
															<div class="form-group row">
																<div class="col-md-4">
																	<span>Profile Image</span>
																</div>
																<div class="col-md-8">
																	<div class="position-relative has-icon-left">
																		<input type='file' onchange="readURL1(this);" id="profileImage" class="form-control" name="profileImage" placeholder="Profile Image">
																		<script>
																			function readURL1(input)
																			{
																				if (input.files && input.files[0])
																				{
																					var reader = new FileReader();
																					reader.onload = function (e)
																					{
																						$('#blah')
																							.attr('src', e.target.result)
																							.width(200)
																							.height(200);
																					};
																					reader.readAsDataURL(input.files[0]);
																				}
																			}
																		</script>
																	</div>
																</div>
															</div>
														</div> 
														<div class="col-6">
															<div class="form-group row">
																<div class="col-md-4">
																	<span>Profile Image</span>
																</div>
																<div class="col-md-8">
																	<div class="position-relative has-icon-left">
																	<?php
																		if($rowUser['image_file']=="NA") 
																		{
																	?>
																		<img id="blah" src="app-assets/images/portrait/small/default.jpg" style="height:200px;width:200px;" alt="your image" />
																	<?php
																		}
																		else
																		{
																	?>
																		<img id="blah" src="userImage/<?php echo $rowUser['image_file'];?>" style="height:200px;width:200px;" alt="your image" />
																	<?php
																		}
																	?>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-8 offset-md-4">
															<button type="submit" onclick="submitForm();" id="submitButton" class="btn btn-primary mr-1 mb-1">Submit</button>
															<button style="display:none;" id="loadingButton" class="btn btn-danger mb-1" type="button" disabled>
																<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
																Loading...
															</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div>
		<?php include 'base/footer.php'; ?>
		<script src="app-assets/vendors/js/vendors.min.js"></script>
		<script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
		<script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
		<script src="app-assets/js/core/app-menu.js"></script>
		<script src="app-assets/js/core/app.js"></script>
		<script src="app-assets/js/scripts/components.js"></script>
		<script src="app-assets/js/scripts/forms/select/form-select2.js"></script>
		<script>
		function spclCharChk(x)
		{
			var regex = /^[A-Za-z0-9-,. ]+$/;
			var isValid = regex.test(document.getElementById(x).value);
			if (!isValid)
			{
				$(function() {
					var Toast = Swal.mixin({
					  toast: true,
					  position: 'top-end',
					  showConfirmButton: false,
					  timer: 3000
					});
					Toast.fire({
						type: 'error',
						title: '  Special Characters is not allow...!!! Only characters A-Z, a-z and 0-9 are allowed...!!!'
					  });
				});
				document.getElementById(x).value="";
				return;
			}
		}  
        function validateFullName()
        {
            name=document.getElementById("fullNameUser").value;
            var reg = /^[A-Za-z ]+$/;
            if(reg.test(name)==false) 
            {
                alert("Please Provide Valid Name Befor Submit");
                document.getElementById("name").value = "";
                return;
            }
            else
            {
                var datastring="name="+name+"&role=validateFullName";
                $.ajax({
                    url: "checkContactNumberBackend",
                    type:"post",
                    catch:false,
                    data:datastring,
                    success: function(result)
                    {
                        str1=result;
                        str1=str1.trim();
                        
                        if(!(str1.localeCompare("1")))
                        {
                            alert("Error In Full Name.");
                            document.getElementById("fullNameUser").value = "";
                            return;
                        }
                    }
                });
            }
        }
        function validateEmailId()
        {
            emailID=document.getElementById("emailIdUser").value;
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if(reg.test(emailID)==false) 
            {
                alert("Please Provide Valid E-Mail ID Befor Submit");
                document.getElementById("emailID").value = "";
                return;
            }
            else
            {
                var datastring="emailID="+emailID+"&role=validateEmailId";
                $.ajax({
                    url: "checkContactNumberBackend",
                    type:"post",
                    catch:false,
                    data:datastring,
                    success: function(result)
                    {
                        str1=result;
                        str1=str1.trim();
                        
                        if(!(str1.localeCompare("1")))
                        {
                            alert("Error In E-Mail ID.");
                            document.getElementById("emailIdUser").value = "";
                            return;
                        }
                    }
                });
            }
        }  
        function validateContact()
        {
            mobile=document.getElementById("contactUser").value;
            if(mobile.length!=10)
            {
                alert("Please Provide Mobile Number Befor Submit");
                document.getElementById("mobile").value = "";
                return;
            }
            else
            {
                var datastring="mobile="+mobile+"&role=validateContact";
                $.ajax({
                    url: "checkContactNumberBackend",
                    type:"post",
                    catch:false,
                    data:datastring,
                    success: function(result)
                    {
                        str1=result;
                        str1=str1.trim();
                        
                        if(!(str1.localeCompare("1")))
                        {
                            alert("Error In Contact Number.");
                            document.getElementById("contactUser").value = "";
                            return;
                        }
                    }
                });
            }
        }         
    </script>
	</body>
</html>
<?php
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;URL=logout'>";
	}
?>  