<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(5,$userPermissionDetails) || in_array(6,$userPermissionDetails) || in_array(7,$userPermissionDetails))
		{
			$mainPageName = "Designation Master";
			$subPageName = "Designation Management";
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
										<h4 class="card-title">Designation</h4> 
									</div>
									<div class="card-content">
										<div class="card-body card-dashboard">
										<?php 
											if(in_array(5,$userPermissionDetails))
											{
										?>
											<button class="btn btn-primary mb-2" data-toggle="modal" data-target="#large"><i class="feather icon-plus"></i>&nbsp; Add new record</button>
											<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="myModalLabel17">Add Designation</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div> 
														<div class="modal-body">
															<div class="row">
																<div class="col-12">
																	<div class="form-group row">
																		<div class="col-md-4">
																			<span>Select Department</span>
																		</div>
																		<div class="col-md-8">
																			<select id="selectDepartment" class="form-control" name="selectDepartment"> 
																				<option value="">Select Department</option>
																			<?php 
																				if($_SESSION[$counterSessionName]['designation_id']==1 || $_SESSION[$counterSessionName]['designation_id']==2)
																				{
																					$selectDepartment = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_id not in ('1') order by department_id");
																				}
																				else
																				{
																					$selectDepartment = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_id not in ('1','2') order by department_id");
																				}
																				while($rowDepartment = mysqli_fetch_array($selectDepartment))
																				{
																			?>
																				<option value="<?php echo $rowDepartment['department_id'];?>"><?php echo $rowDepartment['department_name'];?></option>
																			<?php
																				}
																			?>
																			</select>
																		</div>
																	</div>
																</div> 
																<div class="col-12">
																	<div class="form-group row">
																		<div class="col-md-4">
																			<span>Designation Name</span>
																		</div>
																		<div class="col-md-8">
																			<input type="text" id="designationName" class="form-control" name="designationName" placeholder="Designation Name">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" onclick="addNewDesignation();" id="submitButton" class="btn btn-primary mr-1 mb-1">Add Designation</button>
															<button style="display:none;" id="loadingButton" class="btn btn-danger mb-1" type="button" disabled>
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
															<th>Group ID</th>
															<th>Department Name</th>
															<th>Name</th>
														<?php 
															if(in_array(6,$userPermissionDetails) || in_array(7,$userPermissionDetails))
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
															$selectDesignation = mysqli_query($conn,"select * from ".$masterDesignationTbl." order by designation_id");
														}
														else if($_SESSION[$counterSessionName]['designation_id']==2)
														{	
															$selectDesignation = mysqli_query($conn,"select * from ".$masterDesignationTbl." where designation_id not in ('1') order by designation_id");
														}
														else
														{	
															$selectDesignation = mysqli_query($conn,"select * from ".$masterDesignationTbl." where designation_id not in ('1','2') order by designation_id");
														}
														while($rowDesignation = mysqli_fetch_array($selectDesignation))
														{
															$selectDepartmentList = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_id='".$rowDesignation['department_id']."'");
															$rowDepartmentList = mysqli_fetch_array($selectDepartmentList);
													?>
														<tr>
															<td><?php echo $rowDesignation['designation_id'];?></td>
															<td><?php echo $rowDepartmentList['department_name'];?></td>
															<td><?php echo $rowDesignation['designation_name'];?></td>
														<?php 
															if(in_array(6,$userPermissionDetails) || in_array(7,$userPermissionDetails))
															{
														?>
															<td>
																<input type="button" class="btn btn-success" value="Update" data-toggle="modal" data-target="#addNewDesignationModal<?php echo $counter;?>">
																<a href="userPermission?role=<?php echo $function->dataEncryption($rowDesignation['designation_id']);?>" class="btn btn-danger">Permission</a>
																<div class="modal fade text-left" id="addNewDesignationModal<?php echo $counter;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
																	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h4 class="modal-title" id="myModalLabel17">Edit Designation</h4>
																				<input type="hidden" value="<?php echo $function->dataEncryption($rowDesignation['designation_id']);?>" id="valueId<?php echo $counter;?>">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<div class="row">
																					<div class="col-12">
																						<div class="form-group row">
																							<div class="col-md-4">
																								<span>Designation Name</span>
																							</div>
																							<div class="col-md-8">
																								<select id="selectDepartment<?php echo $counter;?>" class="form-control" name="selectDepartment">
																									<option value="">Select Department</option>
																								<?php 
																									$selectDepartment = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_id not in ('1') order by department_id");
																									while($rowDepartment = mysqli_fetch_array($selectDepartment))
																									{
																								?>
																									<option value="<?php echo $rowDepartment['department_id'];?>" <?php if($rowDesignation['department_id']==$rowDepartment['department_id']){echo "selected";}?>><?php echo $rowDepartment['department_name'];?></option>
																								<?php
																									}
																								?>
																								</select>
																							</div>
																						</div>
																					</div>
																					<div class="col-12">
																						<div class="form-group row">
																							<div class="col-md-4">
																								<span>Designation Name</span>
																							</div>
																							<div class="col-md-8">
																								<input type="text" id="designationName<?php echo $counter;?>" class="form-control" name="designationName" value="<?php echo $rowDesignation['designation_name'];?>" placeholder="Designation Name">
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="modal-footer">
																				<button type="button" onclick="editDesignation(<?php echo $counter;?>);" id="submitButton<?php echo $counter;?>" class="btn btn-primary mr-1 mb-1">Update Designation</button>
																				<button style="display:none;" id="loadingButton<?php echo $counter;?>" class="btn btn-danger mb-1" type="button" disabled>
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
														</tr>
													<?php
															$counter++;
														}
													?>
													</tbody>
													<tfoot>
														<tr>
															<th>Group ID</th>
															<th>Name</th>
														<?php 
															if(in_array(6,$userPermissionDetails) || in_array(7,$userPermissionDetails))
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
		<?php include 'base/footer.php'; ?> 
		<script src="app-assets/vendors/js/vendors.min.js"></script>
		<script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
		<script src="app-assets/js/core/app-menu.js"></script>
		<script src="app-assets/js/core/app.js"></script>
		<script src="app-assets/js/scripts/components.js"></script>
		<script src="app-assets/js/scripts/datatables/datatable.js"></script>
		<script src="app-assets/js/scripts/modal/components-modal.js"></script>
		<script>
			function addNewDesignation()
			{
				document.getElementById("submitButton").style.display = "none";
				document.getElementById("loadingButton").style.display = "block";
				
				selectDepartment=document.getElementById("selectDepartment").value;
				designationName=document.getElementById("designationName").value;
				designationName = designationName.replaceAll("&","~");
				
				if(selectDepartment=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Select Department Name Befor Submit!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else if(designationName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Designation Name Befor Submit!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton").style.display = "block";
					document.getElementById("loadingButton").style.display = "none";
					return;
				}
				else
				{
					var datastring="selectDepartment="+selectDepartment+"&designationName="+designationName+"&role=designationAdd";
					$.ajax({
						url: "backendFilesFolders/masterDesignationBackend",
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
										text: '  Designation Added Successfully',
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
										title: '  Error !!!',
										text: '  Designation Added Already !!!',
										timer: 3000
								  	});
								});
								document.getElementById("submitButton").style.display = "block";
								document.getElementById("loadingButton").style.display = "none";
								return;
							}
							else if(!(str1.localeCompare("4")))
							{
								$(function() {						
									Swal.fire({
										type: 'error',
										title: '  Error !!!',
										text: '  Special Charactor is not allow !!!',
										timer: 3000
								  	});
								});
								document.getElementById("submitButton").style.display = "block";
								document.getElementById("loadingButton").style.display = "none";
								return;
							}
							else
							{
								$(function() {						
									Swal.fire({
										type: 'error',
										title: '  Error !!!',
										text: '  Database error '+result+' !!!',
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
			function editDesignation(x)
			{
				document.getElementById("submitButton"+x).style.display = "none";
				document.getElementById("loadingButton"+x).style.display = "block";
				
				valueId=document.getElementById("valueId"+x).value;
				selectDepartment=document.getElementById("selectDepartment"+x).value;
				designationName=document.getElementById("designationName"+x).value;
				designationName = designationName.replaceAll("&","~");
				
				if(selectDepartment=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Select Department Name Befor Submit!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton"+x).style.display = "block";
					document.getElementById("loadingButton"+x).style.display = "none";
					return;
				}
				else if(designationName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Designation Name Befor Submit!!',
							timer: 3000
					  	});
					});
					document.getElementById("submitButton"+x).style.display = "block";
					document.getElementById("loadingButton"+x).style.display = "none";
					return;
				}
				else
				{
					var datastring="selectDepartment="+selectDepartment+"&designationName="+designationName+"&role=designationUpdate&valueId="+valueId;
					$.ajax({
						url: "backendFilesFolders/masterDesignationBackend",
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
										text: '  Designation Added Successfully',
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
										title: '  Error !!!',
										text: '  Designation Added Already !!!',
										timer: 3000
								  	});
								});
								document.getElementById("submitButton"+x).style.display = "block";
								document.getElementById("loadingButton"+x).style.display = "none";
								return;
							}
							else if(!(str1.localeCompare("4")))
							{
								$(function() {						
									Swal.fire({
										type: 'error',
										title: '  Error !!!',
										text: '  Special Charactor is not allow !!!',
										timer: 3000
								  	});
								});
								document.getElementById("submitButton").style.display = "block";
								document.getElementById("loadingButton").style.display = "none";
								return;
							}
							else
							{
								$(function() {						
									Swal.fire({
										type: 'error',
										title: '  Error !!!',
										text: '  Database error '+result+' !!!',
										timer: 3000
								  	});
								});
								document.getElementById("submitButton"+x).style.display = "block";
								document.getElementById("loadingButton"+x).style.display = "none";
								return;
							}+x
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