<?php 
	ob_start();
	session_start(); 
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if($_SESSION[$counterSessionName]['designation_id']==1)
		{		
			$mainPageName = "Panel Setting";
			$subPageName = "Panel Setting"; 

			$selectMasterConfiguration = mysqli_query($conn,"select * from ".$masterCounterTbl." where id='1'");
			$rowMasterConfiguration = mysqli_fetch_array($selectMasterConfiguration);
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
					<section class="divider-style">
						<div class="row match-height">
							<div class="col-md-12 col-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Settings</h4>
									</div>
									<div class="card-content">
										<div class="card-body">
											<form class="form form-horizontal" id="formId" action="" method="POST" enctype="multipart/form-data">
												<div class="form-body">
													<div class="row">
					                                    <div class="col-sm-4 col-12">
					                                        <div class="text-bold-400 font-medium-0.5 mb-1">
					                                            User Prefix
					                                        </div>
					                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
					                                            <input type="text" class="form-control" id="userPrefix" placeholder="User Prefix" value="<?php echo $rowMasterConfiguration['user_prefix'];?>">
					                                            <div class="form-control-position">
					                                                <i class="feather icon-user"></i>
					                                            </div>
					                                        </fieldset>
					                                    </div> 
					                                    <div class="col-sm-4 col-12">
					                                        <div class="text-bold-400 font-medium-0.5 mb-1">
					                                            Cookie User Name
					                                        </div>
					                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
					                                            <input type="text" class="form-control" id="cookieUserName" placeholder="Cookie User Name" value="<?php echo $rowMasterConfiguration['cookie_user_name'];?>">
					                                            <div class="form-control-position">
					                                                <i class="feather icon-target"></i>
					                                            </div>
					                                        </fieldset>
					                                    </div> 
					                                    <div class="col-sm-4 col-12">
					                                        <div class="text-bold-400 font-medium-0.5 mb-1">
					                                            Cookie User Password
					                                        </div>
					                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
					                                            <input type="text" class="form-control" id="cookieUserPassword" placeholder="Cookie User Password" value="<?php echo $rowMasterConfiguration['cookie_user_password'];?>">
					                                            <div class="form-control-position">
					                                                <i class="feather icon-hash"></i>
					                                            </div>
					                                        </fieldset>
					                                    </div>
					                                    <div class="col-sm-4 col-12">
					                                        <div class="text-bold-400 font-medium-0.5 mb-1">
					                                            Organization Name
					                                        </div>
					                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
					                                            <input type="text" class="form-control" id="organizationName" placeholder="Organization Name" value="<?php echo $rowMasterConfiguration['organization_name'];?>">
					                                            <div class="form-control-position">
					                                                <i class="feather icon-users"></i>
					                                            </div>
					                                        </fieldset>
					                                    </div>
					                                    <div class="col-sm-4 col-12">
					                                        <div class="text-bold-400 font-medium-0.5 mb-1">
					                                            Organization Session Name
					                                        </div>
					                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
					                                            <input type="text" class="form-control" id="organizationSessionName" placeholder="Organization Session Name" value="<?php echo $rowMasterConfiguration['organization_session_name'];?>">
					                                            <div class="form-control-position">
					                                                <i class="feather icon-server"></i>
					                                            </div>
					                                        </fieldset>
					                                    </div>
					                                    <div class="col-sm-4 col-12">
					                                        <div class="text-bold-400 font-medium-0.5 mb-1">
					                                            Application Short Name
					                                        </div>
					                                        <fieldset class="form-group position-relative has-icon-left input-divider-left">
					                                            <input type="text" class="form-control" id="applicationShortName" placeholder="Application Short Name" value="<?php echo $rowMasterConfiguration['application_short_name'];?>">
					                                            <div class="form-control-position">
					                                                <i class="feather icon-hash"></i>
					                                            </div>
					                                        </fieldset>
					                                    </div> 
													</div> 
													<div class="row">
														<div class="col-md-8 offset-md-4">
															<button type="button" onclick="submitForm();" id="submitButton" class="btn btn-primary mr-1 mb-1">Update</button>
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
		<script src="app-assets/js/core/app-menu.js"></script>
		<script src="app-assets/js/core/app.js"></script>
		<script src="app-assets/js/scripts/components.js"></script>
		<script type="text/javascript">	 		
			function submitForm() 
			{
				document.getElementById("submitButton").style.display = "none";
				document.getElementById("loadingButton").style.display = "block";
				
				userPrefix=document.getElementById("userPrefix").value;
				cookieUserName=document.getElementById("cookieUserName").value;
				cookieUserPassword=document.getElementById("cookieUserPassword").value;
				organizationName=document.getElementById("organizationName").value;
				organizationSessionName=document.getElementById("organizationSessionName").value;
				applicationShortName=document.getElementById("applicationShortName").value;
				
				if(userPrefix=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide User Prefix!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(cookieUserName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Cookie User Password!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(cookieUserPassword=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Cookie User Name!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(organizationName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Organization Name!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(organizationSessionName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Organization Session Name!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(applicationShortName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Application Short Name!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else 
				{
					var datastring="userPrefix="+userPrefix+"&cookieUserName="+cookieUserName+"&cookieUserPassword="+cookieUserPassword+"&organizationName="+organizationName+"&organizationSessionName="+organizationSessionName+"&applicationShortName="+applicationShortName;
					$.ajax({
						url: "backendFilesFolders/panelSettingsBackend",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("1")))
							{
								$(function() {						
									Swal.fire({
										type: 'success',
										title: '  Successs !!!',
										text: '  Details Updated Successfully',
										confirmButtonColor: "#3085d6",
										confirmButtonText: "Yes, reload it!"
								  	}).then((result) => {
									  	if (result.value) 
									  	{
										    location.reload();
									  	}
									});
								});
							} 
							else
							{
								$(function() {						
									Swal.fire({
										type: 'error',
										title: '  Error !!!',
										text: '  Please Try Again !!!',
										timer: 3000
								  	});
								});
								document.getElementById("submitButton").style.display = "block";
								document.getElementById("loadingButton").style.display = "none";
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
			echo "<script>alert('You Dont Have Permission To Access This Page.');location.href='dashboard';</script>";
		}
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;URL=logout'>"; 
	}
?> 