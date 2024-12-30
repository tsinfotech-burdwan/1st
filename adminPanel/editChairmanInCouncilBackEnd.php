<?php  
	ob_start();
	session_start(); 
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(61,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$chairmanInCouncilIdvalue = $_POST['chairmanInCouncilIdvalue'];
			$designation=$_POST['designation'];
			$name=$_POST['name'];
			$wardNo=$_POST['wardNo'];
			$mobileNo=$_POST['mobileNo'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];		
			
			if($uploadFileName!="")
			{
				if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$chairmanInCouncilIdvalue))
				{
				  	$errorStatus="4";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$designation))
				{
				  	$errorStatus="5";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$name))
				{
				  	$errorStatus="6";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$wardNo))
				{
				  	$errorStatus="7";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$mobileNo))
				{
				  	$errorStatus="8";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$uploadFileTmpName))
				{
				  	$errorStatus="11";			  
				}				
				else
				{
					$result=$function->uploadFileChecking($uploadFileName,$uploadFileTmpName);
					if($result==1) 
					{
						$kaboom = explode(".",$uploadFileName);
						$ext = end($kaboom);
						$ext = strtolower($ext);
						if($ext=="jpg" || $ext=="jpeg" || $ext=="png" && count($kaboom)<3)
						{
							$selectChairmanInCouncilDetails = mysqli_query($conn,"select * from ".$chairmanInCouncilDetailsTbl." where id='".$chairmanInCouncilIdvalue."'");
							$rowChairmanInCouncil = mysqli_fetch_array($selectChairmanInCouncilDetails);
							$del_doc=$rowChairmanInCouncil['image'];
							unlink("../assets/images/chairmanincouncil/".$del_doc);
							$pathoriginal = "../assets/images/chairmanincouncil/";
							$newFileName = date("YmdHis").".".$ext;
							$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);

							$update = mysqli_query($conn,"update ".$chairmanInCouncilDetailsTbl." set designation='".$designation."',name='".$name."',ward_no='".$wardNo."',image='".$newFileName."',mobile_no='".$mobileNo."',status='0' where id='".$chairmanInCouncilIdvalue."'");
							if($update) 
							{
								$errorStatus="1";
							}
							else
							{
								$errorStatus="2";
							}
						}
						else
						{
							$errorStatus="3";
						}
					}
					else  
					{
						$errorStatus = $result;
					}	
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
                        				<h1 class="font-large-2 mt-1 mb-0">Chairman-In-Council Details Has Been Updated Successfully.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==2 || $errorStatus==3)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Image File Extension Is not Image.</h1>
                        			<?php
                                    	}                                    	
                                    	else if($errorStatus==5 || $errorStatus==6 || $errorStatus==8 || $errorStatus==7 || $errorStatus==11)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Special Characters is Not Allow.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==9 || $errorStatus==10)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">This is not Image File.</h1>
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
	                                    <a class="btn btn-primary btn-lg" href="listChairmanInCouncil">Back to Chairman-in-Council List</a>
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
			echo "<script>alert('You Dont Have Permission To Access This Page.');location.href='dashboard';</script>";
		}
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;URL=logout'>";
	}
?>