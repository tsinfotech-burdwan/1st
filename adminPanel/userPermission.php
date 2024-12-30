<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(!isset($_SESSION[$counterSessionName]['user_id']) || $_SESSION[$counterSessionName]['user_id']=="")
	{
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=logout'>";
	}
	else
	{
		if(in_array(7,$userPermissionDetails))
		{		
			$mainPageName = "Designation Master";
			$subPageName = "Edit Permission";
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
		<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
		<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/pickadate/pickadate.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
		<link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-user.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>
	<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
		<?php include 'base/header.php'; ?>
		<?php include 'base/menubar.php'; ?>
		<div class="app-content content">
			<div class="content-overlay"></div>
			<div class="header-navbar-shadow"></div>
			<div class="content-wrapper">
				<div class="content-header row"></div>
				<div class="content-body">
					<section class="page-users-view"> 
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header border-bottom mx-2 px-0">
										<h6 class="border-bottom py-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>User Permission</h6>
										<span id="success_mes" style="color:green;"><?php if(isset($_GET['errMsg']) && $_GET['errMsg']!=""){echo $_GET['errMsg'];}?></span> 
									</div>
									<div class="card-body">
										<div class="table-responsive users-view-permission">
											<form method="POST" action="backendFilesFolders/userPermissionBackend" id="userPermission">
												<input type="hidden" name="role_id" value="<?php echo $_GET['role']; ?> ">
												<div class="col-12">
													<div class="table-responsive border rounded px-1 ">
													<?php
														$roleDetails = mysqli_query($conn,"select * from ".$masterDesignationTbl." where designation_id='".$function->dataDecryption($_GET['role'])."'");
														$rowRoleDetails = mysqli_fetch_array($roleDetails);
													?>
														<h6 class="border-bottom py-1 mx-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "> <?php echo $rowRoleDetails['designation_name'];?></i></h6>
														<table class="table table-borderless">
															<thead>
																<tr>
																	<th>Module</th>
																	<th>Operation 1</th>
																	<th>Operation 2</th>
																	<th>Operation 3</th>
																	<th>Operation 4</th>
																	<th>Operation 5</th>
																	<th>Operation 6</th>
																	<th>Operation 7</th>
																	<th>Operation 8</th>
																	<th>Operation 9</th>
																	<th>Operation 10</th>
																	<!--<th>Operation 4</th>
																	<th>Operation 5</th>-->
																</tr>
															</thead>
															<tbody> 
															<?php
																$userRolesDetails=array();
																
																$res = mysqli_query($conn,"select * from ".$masterUserPermissionTbl." WHERE designation_id='".$function->dataDecryption($_GET['role'])."'");
																while ($rowRoles = mysqli_fetch_array($res))
																{
																	array_push($userRolesDetails,$rowRoles['module_id']);
																}
																
																$counter = 1;
																$result = mysqli_query($conn,"select * from ".$masterMenuModuleTbl." WHERE parent_module_id='0' and `status`='1'");
																while($row = mysqli_fetch_array($result))
																{
															?>
																<tr>
																	<th><?php echo ucfirst(str_replace("_", " ",$row['module_name'])); ?></th>
																<?php
																	$result1 = mysqli_query($conn,"select * from ".$masterMenuModuleTbl." WHERE parent_module_id='".$row['module_id']."' and status='1'");
																	while($row1 = mysqli_fetch_array($result1))
																	{
																?>
																	<td>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" id="users-checkbox<?php echo $counter;?>" name="module_ids[]" value="<?php echo $row1['module_id'];?>" class="custom-control-input" <?php if(in_array($row1['module_id'],$userRolesDetails)){echo 'checked'; } ?>>
																			<label class="custom-control-label" for="users-checkbox<?php echo $counter;?>"><?php echo $row1['module_name'];?></label>
																		</div>
																	</td>
																<?php
																		$counter++;
																	}
																?>
																</tr>
															<?php
																}
															?>
															</tbody>
														</table>
													</div>
												</div>
												<div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
													<button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
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
		<script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
		<script src="app-assets/vendors/js/pickers/pickadate/picker.js"></script>
		<script src="app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
		<script src="app-assets/js/core/app-menu.js"></script>
		<script src="app-assets/js/core/app.js"></script>
		<script src="app-assets/js/scripts/components.js"></script>
		<script src="app-assets/js/scripts/pages/app-user.js"></script>
		<script src="app-assets/js/scripts/navs/navs.js"></script>
	</body>
</html>
<?php
		}
		else
		{
			echo "<script>alert('You Dont Have Permission To Access This Page.');location.href='dashboard';</script>";
		}
	}
?>