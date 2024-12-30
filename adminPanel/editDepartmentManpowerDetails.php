<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(49,$userPermissionDetails))
		{
			$mainPageName = "List Department Manpower";
			$subPageName = "List Department Manpower";
			$valueId = $function->dataDecryption($_GET['valueId']);
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$valueId))
			{
				echo "<script>alert('Special Character is Available in Value ID');location.href='dashboard';</script>";
			}
			else  
			{					
			$selectDepartmentManPowerDetails = mysqli_query($conn,"select * from ".$depatmentManpowerDetailsTbl." where id='".$valueId."'");
			$rowDepartmentManPowerDetails = mysqli_fetch_array($selectDepartmentManPowerDetails);
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
					<section class="basic-select2">
						<div class="row match-height">
							<div class="col-md-12 col-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Edit Department ManPower Details</h4>
										<span id="success_mes" style="color:<?php if(isset($_GET['errColor']) && $_GET['errColor']!=""){echo $_GET['errColor'];}?>;"><b><?php if(isset($_GET['errMsg']) && $_GET['errMsg']!=""){echo $_GET['errMsg'];}?></b></span>
									</div>
									<div class="card-content">
										<div class="card-body">
											<form class="form form-horizontal" id="formId" action="editDepartmentMAnPowerBackend" method="POST" enctype="multipart/form-data" >
												<div class="form-body">
													<input type="hidden" value="<?php echo $valueId;?>" id="departmentManPowerIdvalue" name="departmentManPowerIdvalue" >
													<div class="row">
														<div class="col-sm-4 col-12">
			                                             	<div class="text-bold-600 font-medium-1">Department Name</div>
				                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
				                                                    <select id="selectDepartmentName" name="selectDepartmentName" class="form-control select2" onchange="spclCharChk('selectDepartmentName');">
				                                                    	<option value="Account" <?php if($rowDepartmentManPowerDetails['department_name'] == "Account") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account</option>
																		<option value="Assessment"<?php if($rowDepartmentManPowerDetails['department_name'] == "Assessment") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assessment</option>	
																		<option value="BG Ghat"<?php if($rowDepartmentManPowerDetails['department_name'] == "BG Ghat") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BG Ghat</option>									
																		<option value="SWM"<?php if($rowDepartmentManPowerDetails['department_name'] == "SWM") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SWM</option>									
																		<option value="WATER Department"<?php if($rowDepartmentManPowerDetails['department_name'] == "WATER Department") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WATER Department</option>									
																		<option value="IT Cell"<?php if($rowDepartmentManPowerDetails['department_name'] == "IT Cell") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IT Cell</option>										
																		<option value="STORE"<?php if($rowDepartmentManPowerDetails['department_name'] == "STORE") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STORE</option>										
																		<option value="TAX"<?php if($rowDepartmentManPowerDetails['department_name'] == "TAX") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TAX</option>										
																		<option value="SINGLE Window And RECIVING Section"<?php if($rowDepartmentManPowerDetails['department_name'] == "SINGLE Window And RECIVING Section") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SINGLE Window And RECIVING Section</option>										
																		<option value="Cash"<?php if($rowDepartmentManPowerDetails['department_name'] == "Cash") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cash</option>										
																		<option value="PWD And Building PLAN"<?php if($rowDepartmentManPowerDetails['department_name'] == "PWD And Building PLAN") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PWD And Building PLAN</option>										
																		<option value="Project And Welfare"<?php if($rowDepartmentManPowerDetails['department_name'] == "Project And Welfare") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Project And Welfare</option>										
																		<option value="General"<?php if($rowDepartmentManPowerDetails['department_name'] == "General") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;General</option>										
																		<option value="License"<?php if($rowDepartmentManPowerDetails['department_name'] == "License") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;License</option>										
																		<option value="NULM"<?php if($rowDepartmentManPowerDetails['department_name'] == "NULM") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NULM</option>										
																		<option value="Health"<?php if($rowDepartmentManPowerDetails['department_name'] == "Health") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Health</option>										
																		<option value="ELECTRICAL"<?php if($rowDepartmentManPowerDetails['department_name'] == "ELECTRICAL") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ELECTRICAL</option>										
																		<option value="Law"<?php if($rowDepartmentManPowerDetails['department_name'] == "Law") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Law</option>		
																	</select>
				                                                    <div class="form-control-position">
				                                                        <i class="fa fa-ticket"></i>
				                                                    </div>
				                                                </fieldset>
				                                            </div>
				                                            <div class="col-sm-8 col-12">
				                                             	<div class="text-bold-600 font-medium-1">Mobile No</div>
				                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
				                                                    <input type="text" id="mobileNo" name="mobileNo" placeholder="Mobile No" class="form-control" value="<?php echo $rowDepartmentManPowerDetails['mobile_no'];?>" onchange="validateContact();">
				                                                    <div class="form-control-position">
				                                                       <i class="fa fa-pencil-square-o"></i>
				                                                    </div>
				                                                </fieldset>
				                                            </div>
			                                            </div>	
			                                            <div class="col-sm-6 col-12">
			                                                <div class="text-bold-600 font-medium-1">Employee Name</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input id="employeeName" name="employeeName" placeholder="Employee Name" class="form-control" value="<?php echo $rowDepartmentManPowerDetails['employee_name'];?>" onchange="spclCharChk('employeeName');"></<input>
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                             <div class="col-sm-6 col-12">
			                                                <div class="text-bold-600 font-medium-1">Designation</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input id="designation" name="designation" placeholder="Employee Name" class="form-control" value="<?php echo $rowDepartmentManPowerDetails['designation'];?>" onchange="spclCharChk('designation');"></<input>
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>			                                            
		                                            </div>		                                            																				 
													<div class="row justify-content-end">
														<div class="col-auto">
															<button type="button" onclick="submitDetails();" id="submitButton" class="btn btn-primary mr-1 mb-1">Update</button>
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
			function validateContact()
	        {
	            mobileNo=document.getElementById("mobileNo").value;
	            if(mobileNo.length!=10)
	            {
	                alert("Please Provide Mobile Number Befor Submit");
	                document.getElementById("mobileNo").value = "";
	                return;
	            }
	            else
	            {
	                var datastring="mobile="+mobileNo+"&role=validateContact";
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
	                            document.getElementById("mobileNo").value = "";
	                            return;
	                        }
	                    }
	                });
	            }
	        } 
			function spclCharChk(x)
			{
				var regex = /^[A-Za-z0-9\/.,-_@ ]+$/;
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
			function submitDetails()
			{
				document.getElementById("submitButton").style.display = "none";
				document.getElementById("loadingButton").style.display = "block";
				
				departmentManPowerIdvalue=document.getElementById("departmentManPowerIdvalue").value;
				selectDepartmentName=document.getElementById("selectDepartmentName").value;				
				mobileNo=document.getElementById("mobileNo").value;				
				employeeName=document.getElementById("employeeName").value;				
				designation=document.getElementById("designation").value;				
				
				if(selectDepartmentName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Department Name!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(mobileNo=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Mobile No!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(employeeName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Employee Name Details!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}				
				else if(designation=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Designation Details!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}								
				else
				{
					document.getElementById("formId").submit();
				}
			}
		</script>
	</body>
</html> 
<?php
			}
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