<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(19,$userPermissionDetails))
		{
			$mainPageName = "Add Notice";
			$subPageName = "Add Notice";
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
										<h4 class="card-title">Add Notice Detail</h4>										
									</div>
									<div class="card-content">
										<div class="card-body">
											<form class="form form-horizontal" id="formId" action="addNoticeBackEnd" method="POST" enctype="multipart/form-data" >
												<div class="form-body">
													<div class="row">
														<div class="col-sm-4 col-12">
			                                             	<div class="text-bold-600 font-medium-1">Notice Type</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <select id="selectNoticeType" name="selectNoticeType" class="form-control select2" onchange="spclCharChk('selectNoticeType');">
																	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Notice Type</option>
																	<option value="recruitment">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recruitment</option>										
																	<option value="public">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Public</option>										
																</select>
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-ticket"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>				                                       
			                                            <div class="col-sm-8 col-12">
			                                                <div class="text-bold-600 font-medium-1">Notice Title</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="text" id="noticeTitle" name="noticeTitle" placeholder="Tender Title" class="form-control" onchange="spclCharChk('noticeTitle');">
			                                                    <div class="form-control-position">
			                                                       <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                            <div class=" col-12">
			                                                <div class="text-bold-600 font-medium-1">Notice Details</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <textarea id="noticeDetails" name="noticeDetails" placeholder="Notice Details" class="form-control" onchange="spclCharChk('noticeDetails');"></textarea>
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
			                                                    <input type="file" id="imageTitle" name="imageTitle" placeholder="Upload Document" class="form-control" accept=".pdf" required>
																<div class="form-control-position">
																	<i class="feather icon-user"></i>
																</div>
															</div>
			                                            </div>
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
				var regex = /^[A-Za-z0-9 ]+$/;
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
				
				selectNoticeType=document.getElementById("selectNoticeType").value;
				noticeTitle=document.getElementById("noticeTitle").value;
				noticeDetails=document.getElementById("noticeDetails").value;
				imageTitle=document.getElementById("imageTitle").value;
				
				
				if(noticeTitle=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Notice Title!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(noticeDetails=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Notice Details!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(selectNoticeType=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Notice Type!!!',
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