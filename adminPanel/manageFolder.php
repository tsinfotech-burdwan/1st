<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(30,$userPermissionDetails) || in_array(31,$userPermissionDetails) || in_array(32,$userPermissionDetails) || in_array(33,$userPermissionDetails))
		{
			$mainPageName = "Manage Folder";
			$subPageName = "Manage Folder";
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
										<h4 class="card-title">Folder</h4> 
									</div>
									<div class="card-content">
										<div class="card-body card-dashboard">
										<?php 
											if(in_array(30,$userPermissionDetails))
											{
										?>
											<button class="btn btn-primary mb-2" data-toggle="modal" data-target="#large"><i class="feather icon-plus"></i>&nbsp; Add new record</button>
											<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="myModalLabel17">Add Folder</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-12">
																	<div class="form-group row">
																		<div class="col-md-4">
																			<span>Folder Name</span>
																		</div>
																		<div class="col-md-8">
																			<input type="text" id="folderName" class="form-control" name="folderName" placeholder="Folder Name" onchange="validateFullName();">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" onclick="addNewFolder();" id="updateServicePaymentButton" class="btn btn-primary mr-1 mb-1">Add Folder</button>
															<button style="display:none;" id="loadingUpdateServicePaymentButton" class="btn btn-danger mb-1" type="button" disabled>
																<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
																Loading...
															</button>
														</div>
													</div>
												</div>
											</div>
										<?php
											}
										?> 
											<div class="table-responsive">
												<table class="table table-bordered zero-configuration">
													<thead>
														<tr>
															<th>#ID</th>
															<th>Name</th>
															<th>Status</th>
														<?php 
															if(in_array(31,$userPermissionDetails))
															{
														?>
															<th>Update Action</th>
														<?php
															}
														?>
														<?php 
															if(in_array(32, $userPermissionDetails) || in_array(33, $userPermissionDetails))
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
														if($_SESSION[$counterSessionName]['designation_id']==1)	
														{
															$selectFolder = mysqli_query($conn,"select * from ".$masterFolderDetailsTbl." order by folder_name");
														}
														else
														{	
															$selectFolder = mysqli_query($conn,"select * from ".$masterFolderDetailsTbl." where status not in ('3') order by folder_name");
														}
														while($rowFolder = mysqli_fetch_array($selectFolder))
														{
													?> 
														<tr> 
															<td><?php echo $counter;?></td>
															<td><?php echo $rowFolder['folder_name'];?></td>
															<td>
																<?php
																	if($rowFolder['status']=='0')
																	{
																?>
																	<div class="badge badge-danger mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>Pending</span>
		                                       						 </div>
																<?php
																	} 
																	if($rowFolder['status']=='1')
																	{ 
																?>
																	<div class="badge badge-success mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>Active</span>
		                                       						 </div>
																<?php  
																	}
																	if($rowFolder['status']=='2')
																	{
																?>	
																	<div class="badge badge-yellow mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>De-Active</span>
		                                       						 </div>
																<?php   
																	}
																?>												
																	
															</td>
														<?php 
															if(in_array(31,$userPermissionDetails))
															{
														?>
															<td>
																<input type="button" class="btn btn-success" value="Update" data-toggle="modal" data-target="#addNewFolderModal<?php echo $counter;?>">
																<div class="modal fade text-left" id="addNewFolderModal<?php echo $counter;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
																	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h4 class="modal-title" id="myModalLabel17">Edit Folder</h4>
																				<input type="hidden" value="<?php echo $function->dataEncryption($rowFolder['folder_id']);?>" id="valueId<?php echo $counter;?>">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<div class="row">
																					<div class="col-12">
																						<div class="form-group row">
																							<div class="col-md-4">
																								<span>Folder Name</span>
																							</div>
																							<div class="col-md-8">
																								<input type="text" id="folderName<?php echo $counter;?>" class="form-control" name="folderName" value="<?php echo $rowFolder['folder_name'];?>" placeholder="Folder Name" onchange="validateFullName();">
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="modal-footer">
																				<button type="button" onclick="editFolder(<?php echo $counter;?>);" id="updateServicePaymentButton<?php echo $counter;?>" class="btn btn-primary mr-1 mb-1">Update Folder</button>
																				<button style="display:none;" id="loadingUpdateServicePaymentButton<?php echo $counter;?>" class="btn btn-danger mb-1" type="button" disabled>
																					<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
																					Loading...
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
															</td>
														<?php
															}
														?>
														<?php
															if(in_array(32, $userPermissionDetails) || in_array(33, $userPermissionDetails))
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
																			if(in_array(32, $userPermissionDetails) && $rowFolder['status']=='1')
																			{
																		?>	
																			<a class="dropdown-item" onclick="deActive(<?php echo $counter;?>);">De-Active</a>
																		<?php  		
																			}
																			if(in_array(33, $userPermissionDetails))
																			{
																		?>
																			<a class="dropdown-item" onclick="deleteFolder(<?php echo $counter;?>);">Delete</a>
																		<?php  
																			}
																			if(in_array(32, $userPermissionDetails) && $rowFolder['status']=='2')
																			{
																		?>
																			<a class="dropdown-item" onclick="active(<?php echo $counter;?>);">Active</a>
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
													<tfoot>
														<tr>
															<th>#ID</th>
															<th>Name</th>
															<th>Status</th>
														<?php 
															if(in_array(31,$userPermissionDetails))
															{
														?>
															<th></th>
														<?php
															}
														?>
														<?php 
															if(in_array(32, $userPermissionDetails) || in_array(33, $userPermissionDetails))
															{
														?>
															<th>Action</th>
														<?php
															}
														?>
														</tr>
													</tfoot>
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
		<footer class="footer footer-static footer-light">
			<p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafte & Made with<i class="feather icon-heart pink"></i></span> <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button></p>
		</footer>
		<script src="app-assets/vendors/js/vendors.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
		<script src="app-assets/js/core/app-menu.js"></script>
		<script src="app-assets/js/core/app.js"></script>
		<script src="app-assets/js/scripts/components.js"></script>
		<script src="app-assets/js/scripts/datatables/datatable.js"></script>
		<script src="app-assets/js/scripts/modal/components-modal.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			function validateFullName()
	        {
	            folderName=document.getElementById("folderName").value;
	            var reg = /^[A-Za-z ]+$/;
	            if(reg.test(folderName)==false) 
	            {
	                alert("Please Provide Valid Folder Name Befor Submit");
	                document.getElementById("folderName").value = "";
	                return;
	            }
	            else
	            {
	                var datastring="name="+folderName+"&role=validateFullName";
	                $.ajax({
	                    url: "checkContactNumberBackend",
	                    type:"post",
	                    catch:false,
	                    data:datastring,
	                    success: function(result)
	                    {
	                        str1=result;
	                        str1=str1.trim();
	                        
	                        if(!(str1.localeCompare("1")))
	                        {
	                            alert("Error In Folder Name.");
	                            document.getElementById("folderName").value = "";
	                            return;
	                        }
	                    }
	                });
	            }
	        }
			function addNewFolder()
			{
				document.getElementById("updateServicePaymentButton").style.display = "none";
				document.getElementById("loadingUpdateServicePaymentButton").style.display = "block";
				
				folderName=document.getElementById("folderName").value;
				folderName = folderName.replaceAll("&","~");
				
				if(folderName=="")
				{
					alert("Please Provide Folder Name Befor Submit");
					document.getElementById("updateServicePaymentButton").style.display = "block";
					document.getElementById("loadingUpdateServicePaymentButton").style.display = "none";
					return;
				}
				else
				{
					var datastring="folderName="+folderName+"&role=folderAdd";
					$.ajax({
						url: "backendFilesFolders/manageFolderBackend",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("1")))
							{
								alert("Folder Added Successfully !!!");
								location.reload();
							}
							else if(!(str1.localeCompare("2")))
							{
								alert("Folder Added Already !!!");
								document.getElementById("updateServicePaymentButton").style.display = "block";
								document.getElementById("loadingUpdateServicePaymentButton").style.display = "none";
								return;
							}
							else if(!(str1.localeCompare("4")))
							{
								alert("Special Charactor Is not Allow !!!");
								document.getElementById("updateServicePaymentButton").style.display = "block";
								document.getElementById("loadingUpdateServicePaymentButton").style.display = "none";
								return;
							}
							else
							{
								alert("Database error "+result+" !!!");
								document.getElementById("updateServicePaymentButton").style.display = "block";
								document.getElementById("loadingUpdateServicePaymentButton").style.display = "none";
								return;
							}
						}
					});
				}
			} 
			function editFolder(x)
			{
				document.getElementById("updateServicePaymentButton"+x).style.display = "none";
				document.getElementById("loadingUpdateServicePaymentButton"+x).style.display = "block";
				
				valueId=document.getElementById("valueId"+x).value;
				folderName=document.getElementById("folderName"+x).value;
				folderName = folderName.replaceAll("&","~");
				
				if(folderName=="")
				{
					alert("Please Provide Folder Name Befor Submit");
					document.getElementById("updateServicePaymentButton"+x).style.display = "block";
					document.getElementById("loadingUpdateServicePaymentButton"+x).style.display = "none";
					return;
				}
				else
				{
					var datastring="folderName="+folderName+"&role=editFolder&valueId="+valueId;
					$.ajax({
						url: "backendFilesFolders/manageFolderBackend",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							str1=result;
							str1=str1.trim();
							
							if(!(str1.localeCompare("1")))
							{
								alert("Folder Updated Successfully !!!");
								location.reload();
							}
							else if(!(str1.localeCompare("2")))
							{
								alert("Folder Added Already !!!");
								document.getElementById("updateServicePaymentButton"+x).style.display = "block";
								document.getElementById("loadingUpdateServicePaymentButton"+x).style.display = "none";
								return;
							}
							else if(!(str1.localeCompare("4")))
							{
								alert("Special Charactor Is not Allow !!!");
								document.getElementById("updateServicePaymentButton"+x).style.display = "block";
								document.getElementById("loadingUpdateServicePaymentButton"+x).style.display = "none";
								return;
							}
							else
							{
								alert("Database error "+result+" !!!");
								document.getElementById("updateServicePaymentButton"+x).style.display = "block";
								document.getElementById("loadingUpdateServicePaymentButton"+x).style.display = "none";
								return;
							}
						}
					});
				}
			}
			function deleteFolder(x)
			{
				valueId = document.getElementById("valueId"+x).value;
				$(function() {						
					Swal.fire({
						icon: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To Delete The Folder Details ???',
						confirmButtonColor: "#3085d6",
						showCancelButton: true,
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, Delete it!"
				  	}).then((result) => {
					  	if (result.isConfirmed)
					  	{
							var datastring = "role=deleteFolder&valueId="+valueId;
						  	$.ajax({
								type: 'POST',
								url: 'backendFilesFolders/manageFolderBackend',
								data: datastring,
								success: function (result)
								{
									str1=result;
									str1=str1.trim();
									
									if(!(str1.localeCompare("1")))
									{
										$(function() {						
											Swal.fire({
												icon: 'success',
												title: '  Successs !!!',
												text: '  Folder has been Deleted Successfully !!!',
												confirmButtonColor: "#3085d6",
												confirmButtonText: "Yes, reload it!"
										  	}).then((result) => {
											  	if (result.isConfirmed) 
											  	{
												    location.reload();
											  	}
											});
										});
									}
									else if(!(str1.localeCompare("2")))
									{
										$(function() {						
											Swal.fire({
												icon: 'error',
												title: '  error !!!',
												text: '  Folder not Deleted !!!',
												confirmButtonColor: "#3085d6",
												confirmButtonText: "Yes, reload it!"
										  	}).then((result) => {
											  	if (result.isConfirmed) 
											  	{
												    location.reload();
											  	}
											});
										});
									}
									else if(!(str1.localeCompare("3")))
									{
										$(function() {						
											Swal.fire({
												icon: 'error',
												title: '  error !!!',
												text: '  Role Mismatched !!!',
												confirmButtonColor: "#3085d6",
												confirmButtonText: "Yes, reload it!"
										  	}).then((result) => {
											  	if (result.isConfirmed) 
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
												icon: 'error',
												title: '  Error !!!',
												text: '  Please Try Again!!!',
												timer: 3000
										  	});
										});
										return;
									}
								}
							});
					  	}
					  	else
					  	{
					  		location.reload();
					  	}
					});
				});
			}
			function deActive(x) 
			{
				valueId = document.getElementById("valueId"+x).value;
				$(function() {						
					Swal.fire({
						icon: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To De-Active The Folder Details ???',
						confirmButtonColor: "#3085d6",
						showCancelButton: true,
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, De-Active it!"
				  	}).then((result) => {
					  	if (result.isConfirmed) 
					  	{
							var datastring = "role=deActive&valueId="+valueId;
						  	$.ajax({
								type: 'POST',
								url: 'backendFilesFolders/manageFolderBackend',
								data: datastring,
								success: function (result)
								{
									str1=result;
									str1=str1.trim();
									
									if(!(str1.localeCompare("1")))
									{
										$(function() {						
											Swal.fire({
												icon: 'success',
												title: '  Successs !!!',
												text: '  Folder has been De-Active Successfully !!!',
												confirmButtonColor: "#3085d6",
												confirmButtonText: "Yes, reload it!"
										  	}).then((result) => {
											  	if (result.isConfirmed) 
											  	{
												    location.reload();
											  	}
											});
										});
									}
									else if(!(str1.localeCompare("2")))
									{
										$(function() {						
											Swal.fire({
												icon: 'error',
												title: '  error !!!',
												text: '  Folder not De-Active !!!',
												confirmButtonColor: "#3085d6",
												confirmButtonText: "Yes, reload it!"
										  	}).then((result) => {
											  	if (result.isConfirmed) 
											  	{
												    location.reload();
											  	}
											});
										});
									}
									else if(!(str1.localeCompare("3")))
									{
										$(function() {						
											Swal.fire({
												icon: 'error',
												title: '  error !!!',
												text: '  Role Mismatched !!!',
												confirmButtonColor: "#3085d6",
												confirmButtonText: "Yes, reload it!"
										  	}).then((result) => {
											  	if (result.isConfirmed) 
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
												icon: 'error',
												title: '  Error !!!',
												text: '  Please Try Again!!!',
												timer: 3000
										  	});
										});
										return;
									}
								}
							});
					  	}
					  	else
					  	{
					  		location.reload();
					  	}
					});
				});
			}	
			function active(x)
			{
				valueId = document.getElementById("valueId"+x).value;
				$(function() {						
					Swal.fire({
						icon: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To Active The Folder Details ???',
						confirmButtonColor: "#3085d6",
						showCancelButton: true,
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, Active it!"
				  	}).then((result) => {
					  	if (result.isConfirmed) 
					  	{
							var datastring = "role=active&valueId="+valueId;
						  	$.ajax({
								type: 'POST',
								url: 'backendFilesFolders/manageFolderBackend',
								data: datastring,
								success: function (result)
								{
									str1=result;
									str1=str1.trim();
									
									if(!(str1.localeCompare("1")))
									{
										$(function() {						
											Swal.fire({
												icon: 'success',
												title: '  Successs !!!',
												text: '  Folder has been Active Successfully !!!',
												confirmButtonColor: "#3085d6",
												confirmButtonText: "Yes, reload it!"
										  	}).then((result) => {
											  	if (result.isConfirmed) 
											  	{
												    location.reload();
											  	}
											});
										});
									}
									else if(!(str1.localeCompare("2")))
									{
										$(function() {						
											Swal.fire({
												icon: 'error',
												title: '  error !!!',
												text: '  Folder not Active !!!',
												confirmButtonColor: "#3085d6",
												confirmButtonText: "Yes, reload it!"
										  	}).then((result) => {
											  	if (result.isConfirmed) 
											  	{
												    location.reload();
											  	}
											});
										});
									}
									else if(!(str1.localeCompare("3")))
									{
										$(function() {						
											Swal.fire({
												icon: 'error',
												title: '  error !!!',
												text: '  Role Mismatched !!!',
												confirmButtonColor: "#3085d6",
												confirmButtonText: "Yes, reload it!"
										  	}).then((result) => {
											  	if (result.isConfirmed) 
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
												icon: 'error',
												title: '  Error !!!',
												text: '  Please Try Again!!!',
												timer: 3000
										  	});
										});
										return;
									}
								}
							});
					  	}
					  	else
					  	{
					  		location.reload();
					  	}
					});
				});
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