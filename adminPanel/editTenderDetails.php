<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(14,$userPermissionDetails))
		{
			$mainPageName = "List Tender";
			$subPageName = "List Tender";
			$valueId = $function->dataDecryption($_GET['valueId']);
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$valueId))
			{
				echo "<script>alert('Special Character is Available in Value ID');location.href='dashboard';</script>";
			}
			else  
			{					
			$selectTenderDetails = mysqli_query($conn,"select * from ".$tenderDetailsTbl." where tender_id='".$valueId."'");
			$rowTenderDetails = mysqli_fetch_array($selectTenderDetails);
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
									</div>
									<div class="card-content">
										<div class="card-body"> 
											<form class="form form-horizontal" id="formId" action="editTenderBackend" method="POST" enctype="multipart/form-data" >
												<div class="form-body">
													<input type="hidden" value="<?php echo $valueId;?>" id="tenderIdValue" name="tenderIdValue" >
													<div class="row">
			                                            <div class="col-sm-4 col-12">
			                                                <div class="text-bold-600 font-medium-1">Tender ID/Reference No</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="text" id="tenderId" name="tenderId" placeholder="Tender ID" class="form-control" value="<?php echo $rowTenderDetails['references_details'];?>" onchange="spclCharChk('tenderId');">
			                                                    <div class="form-control-position">
			                                                       <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                            <div class="col-sm-4 col-12">
			                                                <div class="text-bold-600 font-medium-1">Tender Details</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input id="TenderDetails" name="TenderDetails" placeholder="Tender Details" class="form-control" value="<?php echo $rowTenderDetails['tender_head'];?>" onchange="spclCharChk('TenderDetails');"></<input>
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                            <div class="col-sm-4 col-12">
			                                                <div class="text-bold-600 font-medium-1">Estimated Amount</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="number" id="receiveAmount" name="receiveAmount" placeholder="Amount" class="form-control" value="<?php echo $rowTenderDetails['value'];?>" onchange="spclCharChk('receiveAmount');">
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-inr"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
		                                            </div>
		                                            <div class="row">
			                                            <div class="col-sm-4 col-12">
			                                                <div class="text-bold-600 font-medium-1">Tender Type</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <select id="selectTenderType" name="selectTenderType" class="form-control select2" onchange="spclCharChk('selectTenderType');">
																	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Tender Type</option>
																	<option value="E-Tender"<?php if($rowTenderDetails['tender_type'] == "E-Tender") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-Tender</option>										
																	<option value="Normal Tender" <?php if($rowTenderDetails['tender_type'] == "Normal Tender") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Normal Tender</option>										
																	<option value="Corrigendum" <?php if($rowTenderDetails['tender_type'] == "Corrigendum") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Corrigendum</option>										
																</select>
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-ticket"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div> 
			                                            <div class="col-sm-4 col-12">
			                                                <div class="text-bold-600 font-medium-1">Financial Year</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <select id="selectFinancialYear" name="selectFinancialYear" class="form-control select2" onchange="spclCharChk('selectFinancialYear');">
																	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Financial Year</option>
																	<option value="2024-2025"<?php if($rowTenderDetails['tender_year'] == "2024-2025") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2024-2025</option>										
																	<option value="2025-2026"<?php if($rowTenderDetails['tender_year'] == "2025-2026") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2025-2026</option>										
																	<option value="2026-2027"<?php if($rowTenderDetails['tender_year'] == "2026-2027") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2026-2027</option>										
																	<option value="2027-2028"<?php if($rowTenderDetails['tender_year'] == "2027-2028") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2027-2028</option>										
																	<option value="2028-2029"<?php if($rowTenderDetails['tender_year'] == "2028-2029") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2028-2029</option>										
																	<option value="2029-2030"<?php if($rowTenderDetails['tender_year'] == "2029-2030") echo 'selected = "selected"'; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2029-2030</option>										
																</select>
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-ticket"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>			                                            
			                                            <div class="col-sm-4 col-12">
			                                                <div class="text-bold-600 font-medium-2">Documents (PDF Only)</div>
			                                                <div class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="file" id="imageTitle" name="imageTitle" placeholder="Upload Document" class="form-control" required>
																<div class="form-control-position">
																	<i class="feather icon-user"></i>
																</div>
															</div>
			                                            </div>
													</div>
													<div class="row">
														<div class="col-sm-4 col-12">
				                                            <div class="text-bold-600 font-medium-1">Bid Start Date</div>
				                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
				                                                    <input type="date" id="bidStartDate" name="bidStartDate" placeholder="Start Date" class="form-control" value="<?php echo $rowTenderDetails['start_date'];?>" onchange="spclCharChk('bidStartDate');" min="<?php echo date('Y-m-d');?>">
				                                                    <div class="form-control-position">
				                                                        <i class="fa fa-credit-card"></i>
				                                                    </div>
				                                                </fieldset>
				                                            </div>
				                                            <div class="col-sm-4 col-12">
				                                                <div class="text-bold-600 font-medium-1">Bid End Date</div>
				                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
				                                                    <input type="date" id="bidEndDate" name="bidEndDate" placeholder="Bid End Date" class="form-control" value="<?php echo $rowTenderDetails['last_date'];?>" onchange="spclCharChk('bidEndDate');" min="<?php echo date('Y-m-d');?>">
				                                                    <div class="form-control-position">
				                                                        <i class="fa fa-calendar"></i>
				                                                    </div>
				                                                </fieldset>
				                                            </div>														
														<div class="col-sm-4 col-12">
			                                                <div class="text-bold-600 font-medium-1">Bid Open Date</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="date" id="bidOpenDate" name="bidOpenDate" placeholder="Bid Open Date" class="form-control" value="<?php echo $rowTenderDetails['due_date_open'];?>" onchange="spclCharChk('bidOpenDate');" min="<?php echo date('Y-m-d');?>">
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-calendar"></i>
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
			function spclCharChk(x)
			{
				var regex = /^[A-Za-z0-9 _/.-]+$/;
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
							icon: 'error',
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
				
				tenderIdValue=document.getElementById("tenderIdValue").value;
				tenderId=document.getElementById("tenderId").value;
				TenderDetails=document.getElementById("TenderDetails").value;
				receiveAmount=document.getElementById("receiveAmount").value;
				selectTenderType=document.getElementById("selectTenderType").value;
				selectFinancialYear=document.getElementById("selectFinancialYear").value;
				imageTitle=document.getElementById("imageTitle").value;
				bidStartDate=document.getElementById("bidStartDate").value;
				bidEndDate=document.getElementById("bidEndDate").value;
				bidOpenDate=document.getElementById("bidOpenDate").value;
				
				if(tenderId=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Tender ID or Reference No!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(TenderDetails=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Tender Details!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(receiveAmount=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provice Amount!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(bidOpenDate=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provice Bid Opening Date!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(selectTenderType=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Select Tender Type!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(selectFinancialYear=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Select Financial Year!!!',
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
				else if(bidStartDate=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Bid Start Date!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(bidEndDate=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Bid End Date!!!',
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