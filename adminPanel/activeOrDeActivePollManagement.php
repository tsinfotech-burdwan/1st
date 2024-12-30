<?php 
	ob_start();
	session_start();
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{		
		$mainPageName = "Active Or De-Active Poll Management";
		$subPageName = "Active Or De-Active Poll Management";
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
										<h4 class="card-title">Poll Details List</h4>
									</div>
									<div class="card-content">
										<div class="card-body card-dashboard">
											<div class="table-responsive"> 
												<table class="table zero-configuration" id="user_table">
													<thead>
														<tr>
															<th>Sl NO</th>
															<th>Question Details</th>
															<th>Answer Details</th>
															<th>Status</th>
															<?php 
																if(in_array(74, $userPermissionDetails))
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
														$counterSlNo = 1;
														$selectPollQuestionDetails = mysqli_query($conn,"select * from ".$pollQuestionDetailsTbl." where status in ('0','1')");
														while($rowPollQuestionDetails = mysqli_fetch_array($selectPollQuestionDetails))
														{
													?>   
														<tr>
															<td>
																<?php echo $counter; ?>																
															</td>
															<td><?php echo $rowPollQuestionDetails['question']; ?><input type="hidden" id="valueId<?php echo $counter;?>" value="<?php echo $rowPollQuestionDetails['poll_id']; ?>"></td>
															<td>
																<table class="table table-bordered">
							                                        <tbody>
						                                        	<?php 
						                                        		$selectPollAnswer = mysqli_query($conn,"select * from ".$pollAnswerDetailsTbl." where poll_id='".$rowPollQuestionDetails['poll_id']."'");
																		while($rowPollAnswer = mysqli_fetch_array($selectPollAnswer))
																		{
																	?>
																		<tr class="table-success">
																			<td><?php echo $rowPollAnswer['answer'];?><input type="hidden" id="valueId1<?php echo $counterSlNo;?>" value="<?php echo $rowPollAnswer['poll_answer_id']; ?>"></td>																			
																			<td>
																				<?php 
																					if($rowPollAnswer['status']==1) 
																					{
																				?>
																					<button type="button" class="badge badge-danger" onclick="deactiveAnswer(<?php echo $counterSlNo;?>);">De-Active</button>
																				<?php 
																				 	}
																				 	if($rowPollAnswer['status']==0)
																				 	{ 
																				?>
																					<button type="button" class="badge badge-success" onclick="activeAnswer(<?php echo $counterSlNo;?>);">Active</button>
																				<?php 
																					}	
																				?>
																			</td>																			
																		</tr>
						                                            <?php	
						                                            		$counterSlNo++;																		
																		}
																	?>
							                                        </tbody>
							                                    </table>
															</td> 															
															<td>
																<?php
																	if($rowPollQuestionDetails['status']=='0')
																	{
																?>
																	<div class="badge badge-danger mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>De-Active</span>
		                                       						 </div>
																<?php
																	} 
																	else if($rowPollQuestionDetails['status']=='1')
																	{ 
																?>
																	<div class="badge badge-success mr-1 mb-1">
		                                           					 <i class="feather icon-check-circle"></i>
		                                            					<span>Active</span>
		                                       						 </div>
																<?php  
																	}																	
																?>
															</td>															
															<?php
																if(in_array(74, $userPermissionDetails))
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
																			if(in_array(74, $userPermissionDetails) && $rowPollQuestionDetails['status']=='1')
																			{
																		?>	
																			<a class="dropdown-item" onclick="deActive(<?php echo $counter;?>);">De-Active</a>
																		<?php  		
																			}																			
																			if(in_array(74, $userPermissionDetails) && $rowPollQuestionDetails['status']=='0')
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
			function deActive(x)
			{
				valueId = document.getElementById("valueId"+x).value;
				$(function() {						
					Swal.fire({
						type: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To De-Active The Poll Question Details ???',
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
								url: 'backendFilesFolders/ActiveOrDeActivePollQuestionBackEnd',
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
												text: '  Poll Question has been De-Active Successfully !!!',
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
												text: '  Poll Question not De-Active !!!',
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
						text: '  You Want To Active The Poll Question Details ???',
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
								url: 'backendFilesFolders/ActiveOrDeActivePollQuestionBackEnd',
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
												text: '  Poll Question has been Active Successfully !!!',
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
												text: '  Poll Question not Active !!!',
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
			function deactiveAnswer(x)
			{
				valueId1 = document.getElementById("valueId1"+x).value;
				$(function() {						
					Swal.fire({
						type: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To De-Active The Poll Question Answer Details ???',
						confirmButtonColor: "#3085d6",
						showCancelButton: true,
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, De-Active it!"
				  	}).then((result) => {
					  	if (result.value)
					  	{
							var datastring = "role=deActiveAnswer&valueId1="+valueId1;
							$.ajax({
								type: 'POST',
								url: 'backendFilesFolders/ActiveOrDeActivePollQuestionBackEnd',
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
												text: '  Poll Question Answer has been De-Active Successfully !!!',
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
												text: '  Poll Question Answer not De-Active !!!',
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
												text: '  Plese Check The Question Active Or Not !!!',
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
									else if(!(str1.localeCompare("4")))
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
			function activeAnswer(x)
			{
				valueId1 = document.getElementById("valueId1"+x).value;
				$(function() {						
					Swal.fire({
						type: 'warning',
						title: '  Are You sure !!!',
						text: '  You Want To Active The Poll Question Answer Details ???',
						confirmButtonColor: "#3085d6",
						showCancelButton: true,
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, Active it!"
				  	}).then((result) => {
					  	if (result.value) 
					  	{
							var datastring = "role=activeAnswer&valueId1="+valueId1;
						  	$.ajax({
								type: 'POST',
								url: 'backendFilesFolders/ActiveOrDeActivePollQuestionBackEnd',
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
												text: '  Poll Question Answer has been Active Successfully !!!',
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
												text: '  Poll Question Answer not Active !!!',
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
												text: '  Plese Check The Question Active Or Not !!!',
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
									else if(!(str1.localeCompare("4")))
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