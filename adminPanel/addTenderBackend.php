<?php   
	ob_start();
	session_start(); 
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(13,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$tenderId=$_POST['tenderId'];
			$TenderDetails=$_POST['TenderDetails'];
			$receiveAmount=$_POST['receiveAmount'];
			$selectTenderType=$_POST['selectTenderType'];
			$selectFinancialYear=$_POST['selectFinancialYear'];
			$bidStartDate=$_POST['bidStartDate'];
			$bidEndDate=$_POST['bidEndDate'];
			$bidOpenDate=$_POST['bidOpenDate'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];	
			
			if($uploadFileName!="")
			{
				if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$tenderId))
				{
				  	$errorStatus="6";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$TenderDetails))
				{
				  	$errorStatus="7";			  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$receiveAmount))
				{
				  	$errorStatus="8";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$selectTenderType))
				{
				  	$errorStatus="9";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$selectFinancialYear))
				{
					$errorStatus="10";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$bidStartDate))
				{
				  	$errorStatus="11";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$bidEndDate))
				{
				  	$errorStatus="12";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$bidOpenDate))
				{
				  	$errorStatus="13";			  
				}
				else if($today<=$bidStartDate && $today<=$bidEndDate && $today<=$bidOpenDate)
				{
					if($bidStartDate<=$bidEndDate && $bidEndDate<=$bidOpenDate)
					{
						$kaboom = explode(".",$uploadFileName);
						$ext = end($kaboom);
						$ext = strtolower($ext);
						if($ext=="pdf" && count($kaboom)<3)
						{
							$result=$function->uploadPDFFileChecking($uploadFileTmpName);
							if($result==1)
							{
								$pathoriginal = "../gallery/";
								$newFileName = date("YmdHis").".".$ext;
								$newFileName1 = "gallery/".date("YmdHis").".".$ext;
								$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);
								if($selectTenderType=='E-Tender')
								{
									$insert = mysqli_query($conn,"insert into ".$tenderDetailsTbl." set tender_head='".$TenderDetails."',tender_type='".$selectTenderType."',tender_year='".$selectFinancialYear."',value='".$receiveAmount."',last_date='".$bidEndDate."',start_date='".$bidStartDate."',due_date_open='".$bidOpenDate."',details='".$newFileName1."',submition='https://wbtenders.gov.in/nicgep/app',references_details='".$tenderId."',date='".date("Y-m-d")."',new='y',status='n'");
									if($insert) 
									{
										$errorStatus="1";	
									}
									else
									{
										$errorStatus="5";	
									}
								}
								else if($selectTenderType=='Normal Tender')
								{
									$insert = mysqli_query($conn,"insert into ".$tenderDetailsTbl." set tender_head='".$TenderDetails."',tender_type='".$selectTenderType."',tender_year='".$selectFinancialYear."',value='".$receiveAmount."',last_date='".$bidEndDate."',start_date='".$bidStartDate."',due_date_open='".$bidOpenDate."',details='".$newFileName1."',submition='Nil',references_details='".$tenderId."',date='".date("Y-m-d")."',new='y',status='n'");
									if($insert) 
									{
										$errorStatus="1";	
									}
									else
									{
										$errorStatus="5";	
									}							
								}
								else if($selectTenderType=='Corrigendum')
								{
									$insert = mysqli_query($conn,"insert into ".$tenderDetailsTbl." set tender_head='".$TenderDetails."',tender_type='".$selectTenderType."',tender_year='".$selectFinancialYear."',value='".$receiveAmount."',last_date='".$bidEndDate."',start_date='".$bidStartDate."',due_date_open='".$bidOpenDate."',details='".$newFileName1."',submition='Nil',references_details='".$tenderId."',date='".date("Y-m-d")."',new='y',status='n'");
									if($insert)
									{
										$errorStatus="1";	
									}
									else
									{
										$errorStatus="5";	
									}
								}
								else
								{
									$errorStatus="2";	
								}
							}
							else  
							{
								$errorStatus = $result;
							}
						}
						else
						{
							$errorStatus="3";	
						}
					}
					else
					{
						$errorStatus="4";	
					}												
				}
				else
				{
					$errorStatus="14";
				}				
?>
<html class="loading" lang="en" data-textdirection="ltr">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="author" content="">
		<title>Add Notice Details | <?php echo $rowOrganizationDetails['organization_name'];?></title>
	    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
		<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
	    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/error.css">
	    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>
	<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
	    <div class="app-content content">
	        <div class="content-overlay"></div>
	        <div class="header-navbar-shadow"></div>
	        <div class="content-wrapper">
	            <div class="content-header row">
	            </div>
	            <div class="content-body">
	                <section class="row flexbox-container">
	                    <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
	                        <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
	                            <div class="card-content">
	                                <div class="card-body text-center">
	                                    <img src="app-assets/images/pages/500.png" class="img-fluid align-self-center" alt="branding logo">
                                    <?php 
                                    	if($errorStatus==1)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Tender Details Has Been Updated Successfully.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==2)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! In Tender Type Details.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==3)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! File PDF File extension.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==6 || $errorStatus==7 || $errorStatus==8 || $errorStatus==9 || $errorStatus==10 || $errorStatus==11 || $errorStatus==12 || $errorStatus==13)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Special Characters is Not Allow.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==0)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! This is not PDF File. Please provide PDF File formate.!!!</h1>
                        			<?php
                                    	}                                   	
                        			  	else if($errorStatus==5)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! In Data Insert.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==4 || $errorStatus==14)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Please Check Start Date, End Date, Open Date...!!!</h1>
                        			<?php
                                    	}
                                    	else
                                    	{
                                    ?>
                                    	<h1 class="font-large-2 mt-1 mb-0">Error !!! Please Try Again.</h1>
                                    <?php 
                                    	} 
                                    ?>
	                                    <p class="p-3"></p>
	                                    <a class="btn btn-primary btn-lg" href="addTender">Back to Add Tender</a>
	                                </div>
	                            </div>
	                        </div>
	                    </div> 
	                </section>
	            </div>
	        </div>
	    </div>
	    <script src="app-assets/vendors/js/vendors.min.js"></script>
	    <script src="app-assets/js/core/app-menu.js"></script>
	    <script src="app-assets/js/core/app.js"></script>
	    <script src="app-assets/js/scripts/components.js"></script>
	</body>
</html>
<?php  				
			}
			else
			{
				echo "<script>alert('File Missing...!!! Please Select the File Before Submit...!!!');location.href='addTender';</script>";
			}
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