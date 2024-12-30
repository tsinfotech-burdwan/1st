<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(40,$userPermissionDetails))
		{
			$mainPageName = "Chairman Name";
			$subPageName = "Chairman Name";
?>
<!DOCTYPE html> 
<html class="loading" lang="en" data-textdirection="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<title><?php echo $subPageName;?> | <?php echo $rowOrganizationDetails['organization_name'];?></title>
		<link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
		<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert2.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
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
					<section id="basic-datatable">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Chairman Name</h4> 
									</div>
									<div class="card-content">
										<div class="table-responsive">
												<table class="table table-bordered zero-configuration">
													<thead>
														<tr>
															<th>#ID</th>
															<th>Name</th>
															<th>Image View</th>
															<th>Status</th>
														<?php 
															if(in_array(40,$userPermissionDetails))
															{
														?>
															<th>Update Action</th>
														<?php
															}
														?>														
														</tr>
													</thead>
													<tbody> 
													<?php
														$counter = 1;
														$selectChairmanDetails = mysqli_query($conn,"select * from ".$chairmanDetailsTbl." where status='1'");														
														while($rowChairman = mysqli_fetch_array($selectChairmanDetails))
														{
													?> 
														<tr>
															<td><?php echo $counter;?></td>
															<td><?php echo $rowChairman['chairman_name'];?>
																<input type="hidden" id="valueId<?php echo $counter;?>" value="<?php echo $function->dataEncryption($rowChairman['sl_no']); ?>">
															</td>
															<td> <img src="../assets/images/chairman/<?php echo $rowChairman['file_name'];?>" alt="Chairman Image" width="50" height="60"></td>
															<td>
																<?php
																	if($rowChairman['status']=='0')
																	{
																?>
																	<div class="badge badge-danger mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>Pending</span>
		                                       						 </div>
																<?php
																	} 
																	if($rowChairman['status']=='1')
																	{ 
																?>
																	<div class="badge badge-success mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>Active</span>
		                                       						 </div>
																<?php  
																	}																	
																?>																	
															</td>
														<?php 
															if(in_array(40,$userPermissionDetails))
															{
														?>
															<td class="product-action">
																<div class="btn-group">
																	<div class="dropdown">
																		<button class="btn bg-gradient-primary dropdown-toggle mr-1 mb-1 waves-effect waves-light" type="button" id="dropdownMenuButton101" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			Action
																		</button>
																		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton101" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
																		<?php
																			if(in_array(40, $userPermissionDetails))
																			{
																		?>
																			<a class="dropdown-item" href="editChairmanDetails?valueId=<?php echo $function->dataEncryption($rowChairman['sl_no']); ?>">Edit</a>
																			
																		<?php
																			}																			
																		?>																																				
																		</div>
																	</div>
																</div>
															</td>
														<?php
															}
														?>														
														</tr>
													<?php
															$counter++;
														}
													?>
													</tbody>													
												</table>
											</div>
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
		<script src="app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
		<script src="app-assets/js/core/app-menu.js"></script>
		<script src="app-assets/js/core/app.js"></script>
		<script src="app-assets/js/scripts/components.js"></script>
		<script src="app-assets/js/scripts/datatables/datatable.js"></script> 
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
			function editChairman(x)
			{
				document.getElementById("updateServicePaymentButton"+x).style.display = "none";
				document.getElementById("loadingUpdateServicePaymentButton"+x).style.display = "block";
				
				valueId=document.getElementById("valueId"+x).value;
				chairmanName=document.getElementById("chairmanName"+x).value;
				chairmanName = chairmanName.replaceAll("&","~");
				imageTitle=document.getElementById("imageTitle"+x).value;				
				alart(chairmanName);
				alart(imageTitle);
				/*if(chairmanName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Tender ID or Reference No!!!',
							timer: 3000
					  	});
					});
					document.getElementById("updateServicePaymentButton").style.display = "block";
					document.getElementById("loadingUpdateServicePaymentButton").style.display = "none";
					return;
				}
				else if(imageTitle=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Tender Details!!!',
							timer: 3000
					  	});
					});
					document.getElementById("updateServicePaymentButton").style.display = "block";
					document.getElementById("loadingUpdateServicePaymentButton").style.display = "none";
					return;
				}								
				else
				{
					document.getElementById("formId").submit();
				}*/
			}						
		</script>
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