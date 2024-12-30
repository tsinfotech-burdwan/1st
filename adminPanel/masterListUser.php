<?php 
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{		
		$mainPageName = "User Master";
		$subPageName = "List User";
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
										<h4 class="card-title">User's List</h4>
									</div>
									<div class="card-content">
										<div class="card-body card-dashboard">
											<div class="table-responsive"> 
												<table class="table zero-configuration" id="user_table">
													<thead>
														<tr>
															<th>User Id</th>
															<th>User Name</th>
															<th>Contact</th>
														<?php 
															if($_SESSION[$counterSessionName]['designation_id']==1 || $_SESSION[$counterSessionName]['designation_id']==2)
															{
														?>
															<th>Password</th>
															<th>Code</th>
														<?php 
															}
														?>
															<th>Status</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody> 
													<?php
														$counter = 1; 
														if($_SESSION[$counterSessionName]['designation_id']==1)
														{
															$selectUserDetails = mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_id NOT IN ('1000001') order by user_id desc");
														}
														else if($_SESSION[$counterSessionName]['designation_id']==2)
														{
															$selectUserDetails = mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_id NOT IN ('1000001') and status not in ('2') order by user_id desc");
														}
														else
														{
															$selectUserDetails = mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where designation_id NOT IN ('1','2') and status not in ('2') order by user_id desc");
														}
														while($rowUserDetails = mysqli_fetch_assoc($selectUserDetails))
														{
															$selectUserLoginDetails = mysqli_query($conn,"select * from ".$masterLoginDetailsTbl." where user_id='".$rowUserDetails['user_id']."'");
															$rowUserLoginDetails = mysqli_fetch_array($selectUserLoginDetails);
													?>   
														<tr>
															<td>
																<?php echo $rowUserDetails['user_id']; ?>
																<input type="hidden" id="valueId<?php echo $counter;?>" value="<?php echo $function->dataEncryption($rowUserDetails['user_id']); ?>">	
															</td>
															<td class="product-name"><?php echo $rowUserDetails['user_full_name']; ?></td>
															<td><?php echo $rowUserDetails['user_contact']; ?></td>
														<?php 
															if($_SESSION[$counterSessionName]['designation_id']==1 || $_SESSION[$counterSessionName]['designation_id']==2)
															{
														?>
															<td><?php echo $function->dataDecryption($rowUserLoginDetails['password']); ?></td>
															<td><?php echo $rowUserLoginDetails['user_security_code']; ?></td>
														<?php 
															}
														?>
															<td>
																<div class="custom-control custom-switch switch-lg custom-switch-success mr-2 mb-1">
					                                                <input type="checkbox" class="custom-control-input" onchange="updateStatus(<?php echo $counter;?>);" id="customSwitch<?php echo $counter;?>" <?php if($rowUserDetails['status']==1){echo "checked";}?>>
					                                                <label class="custom-control-label" for="customSwitch<?php echo $counter;?>">
					                                                    <span class="switch-text-left">Active</span>
					                                                    <span class="switch-text-right">Inactive</span>
					                                                </label>
					                                            </div>
															</td> 
															<td class="product-action">
																<div class="btn-group">
																	<div class="dropdown">
																		<button class="btn bg-gradient-primary dropdown-toggle mr-1 mb-1 waves-effect waves-light" type="button" id="dropdownMenuButton101" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			Action
																		</button>
																		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton101" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
																		<?php
																			if(in_array(10,$userPermissionDetails))
																			{
																		?>
																			<a class="dropdown-item" href="masterEditUser?valueId=<?php echo $function->dataEncryption($rowUserDetails['user_id']); ?>">Edit</a>
																		<?php 
																			}
																			if(in_array(11,$userPermissionDetails))
																			{
																		?>
																			<a class="dropdown-item" href="#" onclick="deleteUser('<?php echo $function->dataEncryption($rowUserDetails['user_id']); ?>');">Delete</a>
																		<?php
																			}
																		?>
																		</div>
																	</div>
																</div>
															</td>
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
			function updateStatus(x)
			{
				valueId = document.getElementById("valueId"+x).value;
				customSwitch = document.getElementById("customSwitch"+x);
				if(confirm("Are You sure You Want To Update The Status ???"))
				{
					if (customSwitch.checked == true)
					{
					    var datastring = "status=activeUser&userId="+valueId;
				  	} 
				  	else 
				  	{
					    var datastring = "status=inactiveUser&userId="+valueId;
				  	}
				  	$.ajax({
						type: 'POST',
						url: 'backendFilesFolders/updateStatusEmployee',
						data: datastring,
						success: function (result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("1")))
							{
								alert("Status Updated Successfully !!!");
								location.reload();
							}
							else
							{
								alert("Database error "+result+" !!!");
								return;
							}
						}
					});
				}
			} 
			function updateWalletBalance(x)
			{
				valueId = document.getElementById("valueId"+x).value;
				walletBalance = document.getElementById("walletBalance"+x).value;
				if(confirm("Are You sure You Want To Update The Balance ???"))
				{
					var datastring = "status=updateWalletBalance&walletBalance="+walletBalance+"&userId="+valueId;
					$.ajax({
						type: 'POST',
						url: 'backendFilesFolders/updateStatusEmployee',
						data: datastring,
						success: function (result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("1")))
							{
								alert("Balance Updated Successfully !!!");
								location.reload();
							}
							else
							{
								alert("Database error "+result+" !!!");
								return;
							}
						}
					});
				}
			} 
			function submitForm()
			{
				document.getElementById("submitButton").style.display = "none";
				document.getElementById("loadingButton").style.display = "block";
				document.getElementById("orderDocumentsUpload").submit();
			}
			function deleteUser(x)
			{
				valueId = document.getElementById("valueId"+x).value;
				if(confirm("Are You Sure You Want To Delete This user?"))
				{
					var datastring = "status=deleteUser&userId="+valueId;
					$.ajax({
						url: "backendFilesFolders/updateStatusEmployee",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("1")))
							{
								alert("Status Updated Successfully !!!");
								location.reload();
							}
							else
							{
								alert("Database error "+result+" !!!");
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
		echo "<meta http-equiv='refresh' content='0;URL=logout'>"; 
	}
?> 