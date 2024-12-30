<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(43,$userPermissionDetails))
		{
			$mainPageName = "Financial Statement";
			$subPageName = "Edit Financial Statement";
			$valueId = $function->dataDecryption($_GET['valueId']);
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$valueId))
			{
				echo "<script>alert('Special Character is Available in Value ID');location.href='dashboard';</script>";
			}
			else  
			{					
			$selectFinancialStatementDetails = mysqli_query($conn,"select * from ".$financialStatementDetailsTbl." where id='".$valueId."'");
			$rowFinancialSatementDetails = mysqli_fetch_array($selectFinancialStatementDetails);
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
										<h4 class="card-title">Edit Financial Statement Details</h4>
										<span id="success_mes" style="color:<?php if(isset($_GET['errColor']) && $_GET['errColor']!=""){echo $_GET['errColor'];}?>;"><b><?php if(isset($_GET['errMsg']) && $_GET['errMsg']!=""){echo $_GET['errMsg'];}?></b></span>
									</div>
									<div class="card-content">
										<div class="card-body">
											<form class="form form-horizontal" id="formId" action="backendFilesFolders/editFinancialStatementBackend" method="POST" enctype="multipart/form-data" >
												<div class="form-body">
													<input type="hidden" value="<?php echo $valueId;?>" id="financialStatementIdvalue" name="financialStatementIdvalue" >
													<div class="row">
														<div class="col-sm-4 col-12">
			                                             	<div class="text-bold-600 font-medium-1">Statement Type</div>
				                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
				                                                    <select id="selectStatementType" name="selectStatementType" class="form-control select2" onchange="spclCharChk('selectStatementType');">
																		<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Notice Type</option>
																		<option value="Audit" <?php if($rowFinancialSatementDetails['title'] == "Audit") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Audit</option>										
																		<option value="Balance Sheet"<?php if($rowFinancialSatementDetails['title'] == "Balance Sheet") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Balance Sheet</option>										
																		<option value="Budget Estimate"<?php if($rowFinancialSatementDetails['title'] == "Budget Estimate") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Budget Estimate</option>										
																		<option value="Demand And Collection"<?php if($rowFinancialSatementDetails['title'] == "Demand And Collection") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demand And Collection</option>										
																		<option value="Payment Receipt"<?php if($rowFinancialSatementDetails['title'] == "Payment Receipt") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Payment Receipt</option>										
																		<option value="Income Expenditure"<?php if($rowFinancialSatementDetails['title'] == "Income Expenditure") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income Expenditure</option>										
																		<option value="Unaudited AFS"<?php if($rowFinancialSatementDetails['title'] == "Unaudited AFS") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unaudited AFS</option>	
																	</select>
				                                                    <div class="form-control-position">
				                                                        <i class="fa fa-ticket"></i>
				                                                    </div>
				                                                </fieldset>
				                                            </div>
			                                            <div class="col-sm-8 col-12">
			                                               <div class="text-bold-600 font-medium-1">Financial Year</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <select id="financialYear" name="financialYear" class="form-control select2" onchange="spclCharChk('financialYear');">
																	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Financial Year</option>
																	<option value="2020-2021"<?php if($rowFinancialSatementDetails['financial_year'] == "2020-2021") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2020-2021</option>										
																	<option value="2021-2022"<?php if($rowFinancialSatementDetails['financial_year'] == "2021-2022") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2021-2022</option>										
																	<option value="2022-2023"<?php if($rowFinancialSatementDetails['financial_year'] == "2022-2023") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2022-2023</option>										
																	<option value="2023-2024"<?php if($rowFinancialSatementDetails['financial_year'] == "2023-2024") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2023-2024</option>										
																	<option value="2024-2025"<?php if($rowFinancialSatementDetails['financial_year'] == "2024-2025") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2024-2025</option>										
																	<option value="2025-2026"<?php if($rowFinancialSatementDetails['financial_year'] == "2025-2026") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2025-2026</option>										
																	<option value="2027-2028"<?php if($rowFinancialSatementDetails['financial_year'] == "2027-2028") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2027-2028</option>										
																	<option value="2028-2029"<?php if($rowFinancialSatementDetails['financial_year'] == "2028-2029") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2028-2029</option>										
																	<option value="2029-2030"<?php if($rowFinancialSatementDetails['financial_year'] == "2029-2030") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2029-2030</option>										
																</select>
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-ticket"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                            <div class="col-12">
			                                                <div class="text-bold-600 font-medium-1">Financial Statement Details</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input id="financialStatementDetails" name="financialStatementDetails" placeholder="Notice Details" class="form-control" value="<?php echo $rowFinancialSatementDetails['financial_statements'];?>" onchange="spclCharChk('financialStatementDetails');"></<input>
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>			                                            
		                                            </div>
		                                            <div class="row">			                                            			                                            
			                                            <div class="col-12">
			                                                <div class="text-bold-600 font-medium-2">Documents (PDF Only)</div>
			                                                <div class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="file" id="imageTitle" name="imageTitle" placeholder="Upload Document" class="form-control" required>
																<div class="form-control-position">
																	<i class="feather icon-user"></i>
																</div>
															</div>
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
				
				financialStatementIdvalue=document.getElementById("financialStatementIdvalue").value;
				selectStatementType=document.getElementById("selectStatementType").value;				
				financialYear=document.getElementById("financialYear").value;				
				financialStatementDetails=document.getElementById("financialStatementDetails").value;				
				imageTitle=document.getElementById("imageTitle").value;
				
				if(selectStatementType=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Financial Statement Type!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(financialYear=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Financial Statement Year!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(financialStatementDetails=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Financial Statement Details!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}				
				else if(imageTitle=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Select Upload File!!!',
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