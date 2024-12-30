<?php 
	ob_start();
	session_start(); 
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(9,$userPermissionDetails))
		{		
			$mainPageName = "User Master";
			$subPageName = "Add User"; 
?> 
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="author" content="">
		<title><?php echo $subPageName;?> | <?php echo $rowOrganizationDetails['organization_name'];?></title>
		<link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
		<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
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
		<script> 
			function chkUserFullName()
			{
				fullNameUser=document.getElementById("fullNameUser").value;
				if(fullNameUser!="")
				{
					var datastring="fullNameUser="+fullNameUser+"&role=chkUserFullName";
					$.ajax({
						url: "backendFilesFolders/masterUserBackend",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("2")))
							{
								alert("Name Must Contain Atleast 6 Character !!!");
								document.getElementById("fullNameUser").value = "";
								return;
							}
							else if(!(str1.localeCompare("3")))
							{
								alert("Full Name Already exist !!!");
								document.getElementById("fullNameUser").value = "";
								return;
							}
							else if(!(str1.localeCompare("4")))
							{
								alert("Full Name Contain Character Only !!!");
								document.getElementById("fullNameUser").value = "";
								return;
							}
							else 
							{
								return;
							}
						}
					});
				}
			} 
			function chkContactNumber()
			{
				contactUser=document.getElementById("contactUser").value;
				if(contactUser!="")
				{
					var datastring="contactUser="+contactUser+"&role=chkContactNumber";
					$.ajax({
						url: "backendFilesFolders/masterUserBackend",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("7")))
							{
								alert("Contact Number Must Contain 10 Number !!!");
								document.getElementById("contactUser").value = "";
							}
							else if(!(str1.localeCompare("5")))
							{
								alert("Contact Number Already exist !!!");
								document.getElementById("contactUser").value = "";
							}
							else if(!(str1.localeCompare("6")))
							{
								alert("Contact Number Contain Number Only !!!");
								document.getElementById("contactUser").value = "";
							}
							else 
							{
								return;
							}
						}
					});
				}
			}
			function chkUserAddress()
			{
				addressUser=document.getElementById("addressUser").value;
				if(addressUser!="")
				{
					var datastring="addressUser="+addressUser+"&role=chkUserAddress";
					$.ajax({
						url: "backendFilesFolders/masterUserBackend",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("8")))
							{
								alert("Do Not Use Special Characters !!!");
								document.getElementById("addressUser").value = "";
							}
							else 
							{
								return;
							}
						}
					});
				}
			}
			function getUserDesignation()
			{
				departmentUser=document.getElementById("departmentUser").value;
				if(departmentUser!="")
				{
					var datastring="departmentUser="+departmentUser+"&role=getUserDesignation";
					$.ajax({
						url: "backendFilesFolders/masterUserBackend",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							document.getElementById("designationUser").innerHTML = result;
						}
					});
				}
			}
			function addNewUserDetails() 
			{
				document.getElementById("addUserButton").style.display = "none";
				document.getElementById("loadingAddUserButton").style.display = "block";
				
				fullNameUser=document.getElementById("fullNameUser").value;
				contactUser=document.getElementById("contactUser").value;
				addressUser=document.getElementById("addressUser").value;
				addressUser = addressUser.replaceAll("&","~");
				departmentUser=document.getElementById("departmentUser").value;
				designationUser=document.getElementById("designationUser").value;
				
				if(fullNameUser=="")
				{
					alert("Please Provide Full Name Of The User Befor Submit");
					document.getElementById("addUserButton").style.display = "block";
					document.getElementById("loadingAddUserButton").style.display = "none";
					return;
				}
				else if(contactUser=="" || contactUser.length!=10)
				{
					alert("Please Provide Correct Contact Of The User Befor Submit");
					document.getElementById("addUserButton").style.display = "block";
					document.getElementById("loadingAddUserButton").style.display = "none";
					return;
				} 
				else if(addressUser=="")
				{
					alert("Please Provide The Address Befor Submit");
					document.getElementById("addUserButton").style.display = "block";
					document.getElementById("loadingAddUserButton").style.display = "none";
					return;
				}
				else if(departmentUser=="")
				{
					alert("Please Select Department Befor Submit");
					document.getElementById("addUserButton").style.display = "block";
					document.getElementById("loadingAddUserButton").style.display = "none";
					return;
				}
				else if(designationUser=="")
				{
					alert("Please Select Designation Befor Submit");
					document.getElementById("addUserButton").style.display = "block";
					document.getElementById("loadingAddUserButton").style.display = "none";
					return;
				}
				else  
				{
					var datastring="fullNameUser="+fullNameUser+"&contactUser="+contactUser+"&addressUser="+addressUser+"&departmentUser="+departmentUser+"&designationUser="+designationUser+"&role=addNewUserDetails";
					$.ajax({
						url: "backendFilesFolders/masterUserBackend",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("1")))
							{
								alert("Employee Added Successfully !!!");
								document.getElementById("addUserButton").style.display = "block";
								document.getElementById("loadingAddUserButton").style.display = "none";
								location.reload();
							}
							else if(!(str1.localeCompare("2")))
							{
								alert("Employee Added But Error In Login !!!");
								document.getElementById("addUserButton").style.display = "block";
								document.getElementById("loadingAddUserButton").style.display = "none";
								location.reload();
							}
							else if(!(str1.localeCompare("3")))
							{
								alert("Error In User Details !!!");
								document.getElementById("addUserButton").style.display = "block";
								document.getElementById("loadingAddUserButton").style.display = "none";
								location.reload();
							}
							else
							{
								alert("Error !!! Please Try Again.");
								document.getElementById("addUserButton").style.display = "block";
								document.getElementById("loadingAddUserButton").style.display = "none";
								return;
							}
						}
					});
				}
			} 
		</script> 
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
					<section class="basic-select2">
						<div class="row match-height">
							<div class="col-md-12 col-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Add New Employee</h4>
									</div>
									<div class="card-content">
										<div class="card-body">
											<form class="form form-horizontal" id="formId" action="" method="POST" enctype="multipart/form-data">
												<div class="form-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group row">
																<div class="col-md-4">
																	<span>Full Name</span>
																</div>
																<div class="col-md-8">
																	<div class="position-relative has-icon-left">
																		<input type="text" id="fullNameUser" name="fullNameUser" placeholder="Full Name" class="form-control" onchange="chkUserFullName();" required>
																		<div class="form-control-position">
																			<i class="feather icon-user"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group row">
																<div class="col-md-4">
																	<span>Mobile</span>
																</div>
																<div class="col-md-8">
																	<div class="position-relative has-icon-left">
																		<input type="number" id="contactUser" name="contactUser" placeholder="Mobile" class="form-control" onchange="chkContactNumber();" required>
																		<div class="form-control-position">
																			<i class="feather icon-smartphone"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group row">
																<div class="col-md-4">
																	<span>Address</span>
																</div>
																<div class="col-md-8">
																	<div class="position-relative has-icon-left">
																		<textarea id="addressUser" name="addressUser" placeholder="Address" class="form-control" onchange="chkUserAddress();"></textarea>
																		<div class="form-control-position">
																			<i class="feather icon-map-pin"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div> 
													</div> 
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group row">
																<div class="col-md-4">
																	<span>Department</span>
																</div>
																<div class="col-md-8">
																	<div class="position-relative has-icon-left">
																		<select id="departmentUser" name="departmentUser" class="form-control" onchange="getUserDesignation();">
																			<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Department</option>
																		<?php
																			$queryDepartment = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_id!='1'");
																			while ($rowDepartment = mysqli_fetch_array($queryDepartment)) 
																			{
																		?>
																			<option value="<?php echo $rowDepartment['department_id'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowDepartment['department_name'] ?></option>
																		<?php
																			}
																		?>
																		</select>
																		<div class="form-control-position">
																			<i class="feather icon-users"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group row">
																<div class="col-md-4">
																	<span>Designation</span>
																</div>
																<div class="col-md-8">
																	<div class="position-relative has-icon-left">
																		<select id="designationUser" name="designationUser" class="form-control">

																		</select>
																		<div class="form-control-position">
																			<i class="feather icon-user"></i>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-8 offset-md-4">
															<button type="button" onclick="addNewUserDetails();" id="addUserButton" class="btn btn-primary mr-1 mb-1">Add New User</button>
															<button style="display:none;" id="loadingAddUserButton" class="btn btn-danger mb-1" type="button" disabled>
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
		<script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
		<script src="app-assets/js/core/app-menu.js"></script>
		<script src="app-assets/js/core/app.js"></script>
		<script src="app-assets/js/scripts/components.js"></script>
		<script src="app-assets/js/scripts/forms/select/form-select2.js"></script>
	</body>
</html> 
<?php
		}
		else
		{
			echo "<script>alert('You Dont Have Permission To Access This Page.');location.href='dashboard';</script>";
		}
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;URL=logout'>"; 
	}
?>  