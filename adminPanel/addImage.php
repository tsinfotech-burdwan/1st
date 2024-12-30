<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(35,$userPermissionDetails))
		{
			$mainPageName = "Gallery Management";
			$subPageName = "Add Image";
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
										<h4 class="card-title">Add Image Detail</h4>
										<span id="success_mes" style="color:<?php if(isset($_GET['errColor']) && $_GET['errColor']!=""){echo $_GET['errColor'];}?>;"><b><?php if(isset($_GET['errMsg']) && $_GET['errMsg']!=""){echo $_GET['errMsg'];}?></b></span>
									</div>
									<div class="card-content">
										<div class="card-body">
											<form class="form form-horizontal" id="formId" action="addImageBackEnd" method="POST" enctype="multipart/form-data" >
												<div class="form-body">
													<div class="row">
			                                            <div class="col-sm-12 col-12">
			                                                <div class="text-bold-600 font-medium-1">Select Folder</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <select id="selectFolder" class="form-control" name="selectFolder"> 
																	<option value="">Select Department</option>
																<?php 
																	$selectFolderDetails = mysqli_query($conn,"select * from ".$masterFolderDetailsTbl." where status='1' order by folder_name");
																	while($rowFolderDetails = mysqli_fetch_array($selectFolderDetails))
																	{
																?>
																	<option value="<?php echo $rowFolderDetails['folder_id'];?>"><?php echo $rowFolderDetails['folder_name'];?></option>
																<?php
																	}
																?>
																</select>
			                                                    <div class="form-control-position">
			                                                       <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                            <div class="col-sm-12 col-12">
			                                                <div class="text-bold-600 font-medium-1">Image Title</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="text" id="noticeTitle" name="noticeTitle" placeholder="Image Title" class="form-control" onchange="spclCharChk('noticeTitle');">
			                                                    <div class="form-control-position">
			                                                       <i class="fa fa-pencil-square-o"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div>
			                                        </div> 
		                                            <div class="row">
			                                            <div class="col-4">
			                                                <div class="text-bold-600 font-medium-2">Image File (Image Only)</div>
			                                                <div class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="file" id="imageTitle" name="imageTitle" placeholder="Upload Document" onchange="readURL1(this);" class="form-control" required accept="image/*">
																<div class="form-control-position">
																	<i class="feather icon-user"></i>
																</div>
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
																					.width(584)
																					.height(569);
																			};
																			reader.readAsDataURL(input.files[0]);
																		}
																	}
																</script>
															</div>
			                                            </div>
			                                            <div class="col-4">
			                                                <div class="text-bold-600 font-medium-2">Image File (Image Only)</div>
			                                                <div class="form-group position-relative has-icon-left input-divider-left">
			                                                    <img id="blah" src="app-assets/images/portrait/small/default.jpg" style="height:569px;width:584px;" alt="your image" />
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
				
				noticeTitle=document.getElementById("noticeTitle").value;
				selectFolder=document.getElementById("selectFolder").value;
				imageTitle=document.getElementById("imageTitle").value;
				
				
				if(noticeTitle=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Image Title!!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(selectFolder=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Select Folder!!!',
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