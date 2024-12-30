<?php 
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{		
		$mainPageName = "Gallery Management";
		$subPageName = "List Image";		
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
										<h4 class="card-title">Image List</h4>
									</div>
									<div class="card-content">
										<div class="card-body card-dashboard">
											<div class="table-responsive"> 
												<table class="table zero-configuration" id="user_table">
													<thead>
														<tr>
															<th>Folder</th>
															<th>Title</th>
															<th>Status</th>
															<th>File</th>
															<?php 
																if(in_array(36, $userPermissionDetails) || in_array(37, $userPermissionDetails) || in_array(38, $userPermissionDetails))
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
														$selectImageDetails = mysqli_query($conn,"select * from ".$masterImageDetailsTbl." where status in ('0','1','2') order by image_id desc");
														while($rowImageDetails = mysqli_fetch_array($selectImageDetails))
														{
															$selectFolder = mysqli_query($conn,"select * from ".$masterFolderDetailsTbl." where folder_id='".$rowImageDetails['folder_id']."'");
															$rowFolder = mysqli_fetch_array($selectFolder);
													?>   
														<tr>
															<td><?php echo $rowFolder['folder_name'];?></td>
															<td><?php echo $rowImageDetails['image_title']; ?><input type="hidden" id="valueId<?php echo $counter;?>" value="<?php echo $function->dataEncryption($rowImageDetails['image_id']); ?>"></td> 
															<td>
																<?php
																	if($rowImageDetails['status']=='0')
																	{
																?>
																	<div class="badge badge-danger mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>Pending</span>
		                                       						 </div>
																<?php
																	} 
																	if($rowImageDetails['status']=='1')
																	{ 
																?>
																	<div class="badge badge-success mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>Published</span>
		                                       						 </div>
																<?php  
																	}
																	if($rowImageDetails['status']=='2')
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
															<td> 
															<?php 
																if($rowImageDetails['image_file']!==NULL)
																{
															?>
																<a href="../gallery/<?php echo $rowImageDetails['image_file'];?>" download>View</a>
															<?php
																}
																else
																{
																	echo "No File Submitted";
																}
															?> 
															</td>
															<?php
																if(in_array(36, $userPermissionDetails) || in_array(37, $userPermissionDetails) || in_array(38, $userPermissionDetails))
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
																			if(in_array(36, $userPermissionDetails) && $rowImageDetails['status']=='1')
																			{
																		?>
																			<a class="dropdown-item" href="editImage?valueId=<?php echo $function->dataEncryption($rowImageDetails['image_id']); ?>">Edit</a>
																		<?php
																			}
																			if(in_array(37, $userPermissionDetails) && $rowImageDetails['status']=='1')
																			{
																		?>	
																			<a class="dropdown-item" onclick="deActive(<?php echo $counter;?>);">De-Active</a>
																		<?php  		
																			}
																			if(in_array(38, $userPermissionDetails) && $rowImageDetails['status']=='0')
																			{
																		?>
																			<a class="dropdown-item" onclick="deleteBanner(<?php echo $counter;?>);">Delete</a>
																		<?php  
																			}
																			if(in_array(37, $userPermissionDetails) && $rowImageDetails['status']=='2')
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
			function approveBanner(x)
			{
				valueId = document.getElementById("valueId"+x).value;
				$(function() {						
					Swal.fire({
						type: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To Approve The Image Details ???',
						confirmButtonColor: "#3085d6",
						showCancelButton: true,
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, Approve it!"
				  	}).then((result) => {
					  	if (result.value) 
					  	{
							var datastring = "role=approveBanner&valueId="+valueId;
						  	$.ajax({
								type: 'POST',
								url: 'backendFilesFolders/approveDeleteImageBackEnd',
								data: datastring,
								success: function (result)
								{
									str1=result;
									str1=str1.trim();
									
									if(!(str1.localeCompare("1")))
									{
										$(function() {						
											Swal.fire({
												type: 'success',
												title: '  Successs !!!',
												text: '  Image has been Approved Successfully !!!',
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
									else if(!(str1.localeCompare("2")))
									{
										$(function() {						
											Swal.fire({
												type: 'error',
												title: '  error !!!',
												text: '  Image not Approve !!!',
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
									else if(!(str1.localeCompare("3")))
									{
										$(function() {						
											Swal.fire({
												type: 'error',
												title: '  error !!!',
												text: '  Role Mismatched !!!',
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
			function deleteBanner(x)
			{
				valueId = document.getElementById("valueId"+x).value;
				$(function() {						
					Swal.fire({
						type: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To Delete The Image Details ???',
						confirmButtonColor: "#3085d6",
						showCancelButton: true,
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, Delete it!"
				  	}).then((result) => {
					  	if (result.value) 
					  	{
							var datastring = "role=deleteBanner&valueId="+valueId;
						  	$.ajax({
								type: 'POST',
								url: 'backendFilesFolders/approveDeleteImageBackEnd',
								data: datastring,
								success: function (result)
								{
									str1=result;
									str1=str1.trim();
									
									if(!(str1.localeCompare("1")))
									{
										$(function() {						
											Swal.fire({
												type: 'success',
												title: '  Successs !!!',
												text: '  Image has been Deleted Successfully !!!',
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
									else if(!(str1.localeCompare("2")))
									{
										$(function() {						
											Swal.fire({
												type: 'error',
												title: '  error !!!',
												text: '  Image not Deleted !!!',
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
									else if(!(str1.localeCompare("3")))
									{
										$(function() {						
											Swal.fire({
												type: 'error',
												title: '  error !!!',
												text: '  Role Mismatched !!!',
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
						type: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To De-Active The Banner Details ???',
						confirmButtonColor: "#3085d6",
						showCancelButton: true,
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, De-Active it!"
				  	}).then((result) => {
					  	if (result.value) 
					  	{
							var datastring = "role=deActive&valueId="+valueId;
						  	$.ajax({
								type: 'POST',
								url: 'backendFilesFolders/approveDeleteImageBackEnd',
								data: datastring,
								success: function (result)
								{
									str1=result;
									str1=str1.trim();
									
									if(!(str1.localeCompare("1")))
									{
										$(function() {						
											Swal.fire({
												type: 'success',
												title: '  Successs !!!',
												text: '  Banner has been De-Active Successfully !!!',
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
									else if(!(str1.localeCompare("2")))
									{
										$(function() {						
											Swal.fire({
												type: 'error',
												title: '  error !!!',
												text: '  Banner not De-Active !!!',
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
									else if(!(str1.localeCompare("3")))
									{
										$(function() {						
											Swal.fire({
												type: 'error',
												title: '  error !!!',
												text: '  Role Mismatched !!!',
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
						type: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To Active The Banner Details ???',
						confirmButtonColor: "#3085d6",
						showCancelButton: true,
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, Active it!"
				  	}).then((result) => {
					  	if (result.value) 
					  	{
							var datastring = "role=active&valueId="+valueId;
						  	$.ajax({
								type: 'POST',
								url: 'backendFilesFolders/approveDeleteImageBackEnd',
								data: datastring,
								success: function (result)
								{
									str1=result;
									str1=str1.trim();
									
									if(!(str1.localeCompare("1")))
									{
										$(function() {						
											Swal.fire({
												type: 'success',
												title: '  Successs !!!',
												text: '  Banner has been Active Successfully !!!',
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
									else if(!(str1.localeCompare("2")))
									{
										$(function() {						
											Swal.fire({
												type: 'error',
												title: '  error !!!',
												text: '  Banner not Active !!!',
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
									else if(!(str1.localeCompare("3")))
									{
										$(function() {						
											Swal.fire({
												type: 'error',
												title: '  error !!!',
												text: '  Role Mismatched !!!',
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
		echo "<meta http-equiv='refresh' content='0;URL=logout'>"; 
	}
?> 