<?php 
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{		
		$mainPageName = "Contact Us";
		$subPageName = "Contact Us";
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
	<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
		<?php include 'base/header.php'; ?>
		<?php include 'base/menubar.php'; ?>
		<div class="app-content content">
			<div class="content-overlay"></div>
			<div class="header-navbar-shadow"></div>
			<div class="content-wrapper">
				<?php include 'base/breadcrumb.php'; ?>
				<div class="content-header row"></div>
				<div class="content-body">
					<section id="basic-datatable">
						<div class="row">
							<div class="col-12">
								<div class="card"> 
									<div class="card-header">
										<h4 class="card-title">Contact Us List</h4>
									</div>
									<div class="card-content">
										<div class="card-body card-dashboard">
											<div class="table-responsive"> 
												<table class="table zero-configuration" id="user_table">
													<thead>
														<tr>
															<th>Sl NO</th>
															<th>Applicant Details</th>
															<th>Details Message</th>
															<th>Submitted Date</th>
															<th>Status</th>
															<?php 
																if(in_array(77, $userPermissionDetails))
																{
															?>
																	<th>Action</th>
															<?php	
																} 
															?>
														</tr>
													</thead>
													<tbody> 
													<?php
														$counter = 1; 
														$selectContactUsDetails = mysqli_query($conn,"select * from ".$contactUsDetailsTbl." where print in ('0','1') order by sl_no desc");
														while($rowContactUsDetails = mysqli_fetch_array($selectContactUsDetails))
														{
													?>   
														<tr>
															<td><?php echo $counter; ?></td>
															<td>Name - <?php echo $rowContactUsDetails['applicant_name']; ?><br>Phone Number - <?php echo $rowContactUsDetails['phone_no']; ?></td>
															<td>Subject - <?php echo $rowContactUsDetails['subject']; ?><br>Message : <?php echo $rowContactUsDetails['message']; ?></td> 
															<td><?php echo $rowContactUsDetails['submitted _date']; ?></td>
															
															<td>
																<?php
																	if($rowContactUsDetails['print']=='0')
																	{
																?>
																	<div class="badge badge-danger mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>Not Printed</span>
		                                       						 </div>
																<?php
																	} 
																	if($rowContactUsDetails['print']=='1')
																	{ 
																?>
																	<div class="badge badge-success mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>Printed</span>
		                                       						 </div>
																<?php  
																	}																	
																?>
															</td>															
															<?php
																if(in_array(77, $userPermissionDetails))
																{																	 
															?>
															<td class="product-action">
																<a type="button" href="printFeedBackPage?valueId=<?php echo $function->dataEncryption($rowContactUsDetails['sl_no']); ?>">Print</a>																
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
	</body>
</html>
<?php
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;URL=logout'>"; 
	}
?> 