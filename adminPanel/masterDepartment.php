<?php
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		if(in_array(2,$userPermissionDetails) || in_array(3,$userPermissionDetails))
		{
			$mainPageName = "Department Master";
			$subPageName = "Department Master";
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
										<h4 class="card-title">Department</h4> 
									</div>
									<div class="card-content">
										<div class="card-body card-dashboard">
										<?php 
											if(in_array(2,$userPermissionDetails))
											{
										?>
											<button class="btn btn-primary mb-2" data-toggle="modal" data-target="#large"><i class="feather icon-plus"></i>&nbsp; Add new record</button>
											<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="myModalLabel17">Add Department</h4>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-12">
																	<div class="form-group row">
																		<div class="col-md-4">
																			<span>Department Name</span>
																		</div>
																		<div class="col-md-8">
																			<input type="text" id="departmentName" class="form-control" name="departmentName" placeholder="Department Name" onchange="validateFullName();">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" onclick="addNewDepartment();" id="addDepartmentButton" class="btn btn-primary mr-1 mb-1">Add Department</button>
															<button style="display:none;" id="loadingDepartmentButton" class="btn btn-danger mb-1" type="button" disabled>
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
														<?php 
															if(in_array(3,$userPermissionDetails))
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
														if($_SESSION[$counterSessionName]['department_id']==1)	
														{
															$selectDepartment = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_id not in ('1') order by department_id");
														}
														/*else if($_SESSION[$counterSessionName]['department_id']==2)
														{	
															$selectDepartment = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_id not in ('1') order by department_id");
														}*/
														else
														{	
															$selectDepartment = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_id not in ('1','2') order by department_id");
														}
														while($rowDepartment = mysqli_fetch_array($selectDepartment))
														{
													?> 
														<tr>
															<td><?php echo $counter;?></td>
															<td><?php echo $rowDepartment['department_name'];?></td>
														<?php 
															if(in_array(3,$userPermissionDetails))
															{
														?>
															<td><input type="button" class="btn btn-success" value="Update" data-toggle="modal" data-target="#addNewDepartmentModal<?php echo $counter;?>">
																<div class="modal fade text-left" id="addNewDepartmentModal<?php echo $counter;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
																	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h4 class="modal-title" id="myModalLabel17">Edit Department</h4>
																				<input type="hidden" value="<?php echo $function->dataEncryption($rowDepartment['department_id']);?>" id="valueId<?php echo $counter;?>">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<div class="row">
																					<div class="col-12">
																						<div class="form-group row">
																							<div class="col-md-4">
																								<span>Department Name</span>
																							</div>
																							<div class="col-md-8">
																								<input type="text" id="departmentName<?php echo $counter;?>" class="form-control" name="departmentName" value="<?php echo $rowDepartment['department_name'];?>" placeholder="Department Name" onchange="validateFullName();">
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="modal-footer">
																				<button type="button" onclick="editDepartment(<?php echo $counter;?>);" id="addDepartmentButton<?php echo $counter;?>" class="btn btn-primary mr-1 mb-1">Update Department</button>
																				<button style="display:none;" id="loadingDepartmentButton<?php echo $counter;?>" class="btn btn-danger mb-1" type="button" disabled>
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
															<th>#ID</th>
															<th>Name</th>
														<?php 
															if(in_array(3,$userPermissionDetails))
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
		<script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
		<script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
		<script src="app-assets/js/core/app-menu.js"></script>
		<script src="app-assets/js/core/app.js"></script>
		<script src="app-assets/js/scripts/components.js"></script>
		<script src="app-assets/js/scripts/datatables/datatable.js"></script>
		<script src="app-assets/js/scripts/modal/components-modal.js"></script>
		<script>
			function addNewDepartment()
			{
				document.getElementById("addDepartmentButton").style.display = "none";
				document.getElementById("loadingDepartmentButton").style.display = "block";
				
				departmentName=document.getElementById("departmentName").value;
				departmentName = departmentName.replaceAll("&","~");
				
				if(departmentName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Department Name Befor Submit!!',
							timer: 3000
					  	});
					});
					document.getElementById("addDepartmentButton").style.display = "block";
					document.getElementById("loadingDepartmentButton").style.display = "none";
					return;
				}
				else
				{
					var datastring="departmentName="+departmentName+"&role=departmentAdd";
					$.ajax({
						url: "backendFilesFolders/masterDepartmentBackend",
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
										text: '  Department Added Successfully',
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
										text: '  Error In Department Added !!!',
										timer: 3000
								  	});
								});
								document.getElementById("addDepartmentButton").style.display = "block";
								document.getElementById("loadingDepartmentButton").style.display = "none";
								return;
							}
							else if(!(str1.localeCompare("3")))
							{
								$(function() {						
									Swal.fire({
										type: 'error',
										title: '  Error !!!',
										text: '  Department Added Already !!!',
										timer: 3000
								  	});
								});
								document.getElementById("addDepartmentButton").style.display = "block";
								document.getElementById("loadingDepartmentButton").style.display = "none";
								return;
							}
							else if(!(str1.localeCompare("4")))
							{
								$(function() {						
									Swal.fire({
										type: 'error',
										title: '  Error !!!',
										text: '  Special Characters is Not Allow !!!',
										timer: 3000
								  	});
								});
								document.getElementById("addDepartmentButton").style.display = "block";
								document.getElementById("loadingDepartmentButton").style.display = "none";
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
								document.getElementById("addDepartmentButton").style.display = "block";
								document.getElementById("loadingDepartmentButton").style.display = "none";
								return;
							}
						}
					});
				}
			} 
			function editDepartment(x)
			{
				document.getElementById("addDepartmentButton"+x).style.display = "none";
				document.getElementById("loadingDepartmentButton"+x).style.display = "block";
				
				valueId=document.getElementById("valueId"+x).value;
				departmentName=document.getElementById("departmentName"+x).value;
				departmentName = departmentName.replaceAll("&","~");
				
				if(departmentName=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Department Name Befor Submit!!',
							timer: 3000
					  	});
					});
					document.getElementById("addDepartmentButton"+x).style.display = "block";
					document.getElementById("loadingDepartmentButton"+x).style.display = "none";
					return;
				} 
				else
				{
					var datastring="departmentName="+departmentName+"&role=editDepartment&valueId="+valueId;
					$.ajax({
						url: "backendFilesFolders/masterDepartmentBackend",
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
										text: '  Department Updated Successfully',
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
										text: '  Error In Department Added !!!',
										timer: 3000
								  	});
								});
								document.getElementById("addDepartmentButton"+x).style.display = "block";
								document.getElementById("loadingDepartmentButton"+x).style.display = "none";
								return;
							}
							else if(!(str1.localeCompare("3")))
							{
								$(function() {						
									Swal.fire({
										type: 'error',
										title: '  Error !!!',
										text: '  Department Added Already !!!',
										timer: 3000
								  	});
								});
								document.getElementById("addDepartmentButton"+x).style.display = "block";
								document.getElementById("loadingDepartmentButton"+x).style.display = "none";
								return;
							}
							else if(!(str1.localeCompare("4")))
							{
								$(function() {						
									Swal.fire({
										type: 'error',
										title: '  Error !!!',
										text: '  Special Characters is Not Allow !!!',
										timer: 3000
								  	});
								});
								document.getElementById("addDepartmentButton"+x).style.display = "block";
								document.getElementById("loadingDepartmentButton"+x).style.display = "none";
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
								document.getElementById("addDepartmentButton"+x).style.display = "block";
								document.getElementById("loadingDepartmentButton"+x).style.display = "none";
								return;
							}
						}
					});
				}
			}
			function validateFullName()
	        {
	            name=document.getElementById("departmentName").value;
	            var reg = /^[A-Za-z ]+$/;
	            if(reg.test(name)==false) 
	            {
	                alert("Please Provide Valid Department Name Befor Submit");
	                document.getElementById("name").value = "";
	                return;
	            }
	            else
	            {
	                var datastring="name="+name+"&role=validateFullName";
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
	                            alert("Error In Department Name.");
	                            document.getElementById("departmentName").value = "";
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