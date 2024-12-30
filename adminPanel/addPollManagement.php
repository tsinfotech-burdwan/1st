<?php 
	ob_start();
	session_start(); 
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(73,$userPermissionDetails))
		{		
			$mainPageName = "Add Poll";
			$subPageName = "Add Poll"; 
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
						<div class="row">
	                        <div class="col-md-4 col-12">
	                            <div class="card">
	                                <div class="card-header">
	                                    <h4 class="card-title">Add Answer</h4>
	                                </div>
	                                <div class="card-content">
	                                    <div class="card-body">
	                                        <form class="form form-horizontal">
	                                            <div class="form-body">
	                                                <div class="row">
														<div class="col-sm-12 col-12">
			                                                <div class="text-bold-600 font-medium-2">Answer Details</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                    <input type="text" id="answerDetails" name="answerDetails" placeholder="Answer Details" class="form-control" onchange="spclCharChk('answerDetails');">
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-credit-card"></i>
			                                                    </div>
			                                                </fieldset>
			                                            </div> 														
		                                            </div> 
		                                            <div class="row justify-content-end">
														<div class="col-auto">
	                                                        <button type="button" onclick="addNewRow();" id="addPollManagement" class="btn btn-primary mr-1 mb-1">Add Answer</button>
															<button style="display:none;" id="loadingPollButton" class="btn btn-danger mb-1" type="button" disabled>
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
	                        <div class="col-md-8 col-12">
	                            <div class="card">
	                                <div class="card-header">
	                                    <h4 class="card-title">Answer Details</h4>
	                                </div>
	                                <div class="card-content">
	                                    <div class="card-body">
	                                        <form class="form form-horizontal">
	                                            <div class="form-body">
	                                                <div class="row">
	                                                	<div class="table-responsive">
						                                    <table class="table table-bordered mb-0">
						                                        <thead>
						                                            <tr>
						                                                <th>#</th>
						                                                <th>Answer Details</th> 						                                               
						                                                <th></th>
						                                            </tr>
						                                        </thead>
						                                        <tbody id="pollTableDetails">
					                                        	<?php 
					                                        		$count = 0;	
					                                        		$totalAmountTotal = 0;																
																	if(isset($_SESSION['pollDetailsBurdwanMunicipality']) && $_SESSION['pollDetailsBurdwanMunicipality']!="")
																	{
																		$count = sizeof($_SESSION['pollDetailsBurdwanMunicipality']);
																		$arrayValue = $_SESSION['pollDetailsBurdwanMunicipality'];
																		$counterVal = 1;
																		for($row=0;$row<$count;$row++)
																		{
																			if($arrayValue[$row]['answerDetails']!="")
																			{																				
					                                        	?>
					                                        		<tr>
					                                        			<td><?php echo $counterVal;?></td>
					                                        			<td><?php echo $arrayValue[$row]['answerDetails'];?></td>					                                        			
					                                        			<td><button type="button" value='Remove' class='btn btn-danger btn-sm' onclick='removeRow(<?php echo $row;?>)'><i class='fa fa-trash'></i></button></td>
					                                        		</tr>
				                                        		<?php 
				                                        						$counterVal++;
				                                        					}
			                                        					}
		                                        					}
				                                        		?>
						                                        </tbody>
						                                    </table>
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
					<section class="basic-select2">
						<div class="row match-height">
							<div class="col-md-12 col-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Add Main Question</h4>
										<span id="success_mes" style="color:<?php if(isset($_GET['errColor']) && $_GET['errColor']!=""){echo $_GET['errColor'];}?>;"><b><?php if(isset($_GET['errMsg']) && $_GET['errMsg']!=""){echo $_GET['errMsg'];}?></b></span>
									</div>
									<div class="card-content">
										<div class="card-body">
											<form class="form form-horizontal" id="formId" action="backendFilesFolders/addPollManagementBackend" method="POST" enctype="multipart/form-data">
												<div class="form-body">
													<div class="row">			                                             
														<div class="col-12">
			                                                <div class="text-bold-600 font-medium-2">Input Question Details</div>
			                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
			                                                	<input type="hidden" id="role" name="role" value="submitForm">
			                                                    <input type="text" id="questionDetails" name="questionDetails" placeholder="Question Details" class="form-control">
			                                                    <div class="form-control-position">
			                                                        <i class="fa fa-credit-card"></i>
			                                                    </div>
			                                                </fieldset>
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
				var regex = /^[A-Za-z0-9\/.,&-@ ]+$/;
				var isValid = regex.test(document.getElementById(x).value);
				if (!isValid)
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Special Characters is not allow.',
							timer: 3000
					  	});
					});
					document.getElementById(x).value="";
					return;
				}
			} 
			function addNewRow()
			{
				document.getElementById("addPollManagement").style.display = "none";
				document.getElementById("loadingPollButton").style.display = "block";

				answerDetails=document.getElementById("answerDetails").value;				

				if(answerDetails=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Poll Answer Details!!!',
							timer: 3000
					  	});
					});
					document.getElementById("addPollManagement").style.display = "block";
					document.getElementById("loadingPollButton").style.display = "none";
					return;
				}				
				else 
				{
					var datastring="answerDetails="+answerDetails+"&role=addPollDetails";
					$.ajax({
						url: "backendFilesFolders/addPollManagementBackend",
						type:"post",
						catch:false,
						data:datastring,
						success: function(result)
						{
							document.getElementById("pollTableDetails").innerHTML=result;
							document.getElementById("addPollManagement").style.display = "block";
					        document.getElementById("loadingPollButton").style.display = "none";
							document.getElementById("answerDetails").value="";							
						}
					});
				}
			}
			function removeRow(x)
			{
				var datastring="rowNumber="+x+"&role=removeRow";
				$.ajax({						
					url: "backendFilesFolders/addPollManagementBackend",
					type:"post",
					catch:false,
					data:datastring,
					success: function(result)
					{
						document.getElementById("pollTableDetails").innerHTML = result;
					}
				});
			} 
			function submitDetails()
			{
				document.getElementById("submitButton").style.display = "none";
				document.getElementById("loadingButton").style.display = "block";
				
				questionDetails=document.getElementById("questionDetails").value;
								
				if(questionDetails=="")
				{
					$(function() {						
						Swal.fire({
							type: 'error',
							title: '  Error !!!',
							text: '  Please Provide Question Details!!!',
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