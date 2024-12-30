<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(65,$userPermissionDetails))
		{
			$today=date('Y-m-d');
			$lastDay=date('2020-01-01');
			$mainPageName = "List Chairman In Council";
			$subPageName = "List Chairman In Council";
			$valueId = $function->dataDecryption($_GET['valueId']);
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$valueId))
			{
				echo "<script>alert('Special Character is Available in Value ID');location.href='dashboard';</script>";
			}
			else  
			{					
			$selectChairmanInCouncil = mysqli_query($conn,"select * from ".$chairmanInCouncilDetailsTbl." where id='".$valueId."'");
			$rowChairmanInCouncil = mysqli_fetch_array($selectChairmanInCouncil);
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
										<h4 class="card-title">Edit Tender Detail</h4>
										<!-- <span id="success_mes" style="color:<?php if(isset($_GET['errColor']) && $_GET['errColor']!=""){echo $_GET['errColor'];}?>;"><b><?php if(isset($_GET['errMsg']) && $_GET['errMsg']!=""){echo $_GET['errMsg'];}?></b></span> -->
									</div>
									<div class="card-content">
										<div class="card-body">
											<form class="form form-horizontal" id="formId" action="transferChairmanInCouncilBackEnd" method="POST" enctype="multipart/form-data" >
												<div class="form-body">
													<input type="hidden" value="<?php echo $valueId;?>" id="chairmanInCouncilIdvalue" name="chairmanInCouncilIdvalue" >
													<div class="row">
														<div class="col-sm-4 col-12">
			                                             	<div class="text-bold-600 font-medium-1">Designation</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <select id="designation" name="designation" class="form-control select2" onchange="spclCharChk('designation');" disabled>
																	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Designation</option>
																	<option value="chairman"<?php if($rowChairmanInCouncil['designation'] == "chairman") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chairman</option>										
																	<option value="Vice-Chairman"<?php if($rowChairmanInCouncil['designation'] == "Vice-Chairman") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vice Chairman</option>										
																	<option value="Councillor(CIC)"<?php if($rowChairmanInCouncil['designation'] == "Councillor(CIC)") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Councillor(CIC)</option>										
																	<option value="Councillor"<?php if($rowChairmanInCouncil['designation'] == "Councillor") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Councillor</option>										
																	<option value="Mcic, Swm"<?php if($rowChairmanInCouncil['designation'] == "Mcic, Swm") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mcic, Swm</option>										
																	<option value="MCIC, TAX"<?php if($rowChairmanInCouncil['designation'] == "MCIC, TAX") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MCIC, TAX</option>										
																	<option value="Mcic, PWD"<?php if($rowChairmanInCouncil['designation'] == "Mcic, PWD") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mcic, PWD</option>										
																	<option value="MCIC, PLAN & ASSESSMENT"<?php if($rowChairmanInCouncil['designation'] == "MCIC, PLAN & ASSESSMENT") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MCIC, PLAN & ASSESSMENT</option>										
																	<option value="MCIC, TAX & MARKET COMPLEX"<?php if($rowChairmanInCouncil['designation'] == "MCIC, TAX & MARKET COMPLEX") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MCIC, TAX & MARKET COMPLEX</option>										
																</select>
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-ticket"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>				                                       
			                                            <div class="col-sm-8 col-12">
			                                                <div class="text-bold-600 font-medium-1">Name</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="<?php echo $rowChairmanInCouncil['name'];?>" onchange="spclCharChk('name');" disabled>
			                                                    <div class="form-control-position">
			                                                       <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                            <div class="col-sm-4 col-12">
			                                                <div class="text-bold-600 font-medium-1">Ward No</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="number" id="wardNo" name="wardNo" placeholder="Ward No" class="form-control" value="<?php echo $rowChairmanInCouncil['ward_no'];?>" onchange="spclCharChk('wardNo');" disabled>
			                                                    <div class="form-control-position">
			                                                       <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                            <div class="col-sm-8 col-12">
			                                                <div class="text-bold-600 font-medium-1">Mobile No</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="number" id="mobileNo" name="mobileNo" placeholder="Mobile No" class="form-control" value="<?php echo $rowChairmanInCouncil['mobile_no'];?>" onchange="spclCharChk('mobileNo');" disabled>
			                                                    <div class="form-control-position">
			                                                       <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                            <div class="col-12">
			                                                <div class="text-bold-600 font-medium-1">Active Image</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <img src="../assets/images/chairmanincouncil/<?php echo $rowChairmanInCouncil['image'];?>" alt="Chairman In Council Image" width="200" height="200">
			                                                </fieldset>
			                                            </div>
			                                        </div>
		                                            <div class="col-12">
			                                            <div class="text-bold-600 font-medium-1">Period From Date</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="date" id="periodFromDate" name="periodFromDate" class="form-control" onchange="spclCharChk('periodFromDate');" min="<?php echo $lastDay; ?>">
			                                                    <div class="form-control-position">
			                                                       <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                            <div class="col-12">
			                                                <div class="text-bold-600 font-medium-1">Period To Date</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="date" id="periodToDate" name="periodToDate" class="form-control" onchange="spclCharChk('periodToDate');" max="<?php echo $today; ?>">
			                                                    <div class="form-control-position">
			                                                       <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>																			 
													<div class="row justify-content-end">
														<div class="col-auto">
															<button type="button" onclick="submitDetails();" id="submitButton" class="btn btn-primary mr-1 mb-1">Submit</button>
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
				
				chairmanInCouncilIdvalue=document.getElementById("chairmanInCouncilIdvalue").value;
				periodToDate=document.getElementById("periodToDate").value;
				periodFromDate=document.getElementById("periodFromDate").value;
							
				
				if(periodFromDate=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide From Date!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(periodToDate=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide To Date!!!',
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