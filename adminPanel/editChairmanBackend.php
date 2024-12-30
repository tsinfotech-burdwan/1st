<?php  
	ob_start();
	session_start(); 
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(40,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$chairmanIdValue = $_POST['chairmanIdValue'];
			$chairmanDetails=$_POST['chairmanDetails'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];		
			
			if($uploadFileName!="")
			{
				if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$chairmanIdValue))
				{
				  	$errorStatus="4";			  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$chairmanDetails))
				{
				  	$errorStatus="5";		  
				}
				else
				{
					$errFile = $function->uploadFileChecking($uploadFileName,$uploadFileTmpName);
					if($errFile==1)
					{
						$kaboom = explode(".",$uploadFileName);
						$ext = end($kaboom);
						$ext = strtolower($ext);
						if($ext=="jpg" || $ext=="jpeg" || $ext=="png" && count($kaboom)<3)
						{
							$selectChairmanDetails = mysqli_query($conn,"select * from ".$chairmanDetailsTbl." where sl_no='".$chairmanIdValue."'");														
							$rowChairman = mysqli_fetch_array($selectChairmanDetails);	
							$del_doc=$rowChairman['file_name'];
							unlink("../assets/images/chairman/".$del_doc);
							$pathoriginal = "../assets/images/chairman/";
							$newFileName = date("YmdHis").".".$ext;
							$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);

							$update = mysqli_query($conn,"update ".$chairmanDetailsTbl." set chairman_name='".$chairmanDetails."',file_name='".$newFileName."',status='1' where sl_no='".$chairmanIdValue."'");
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
						$errorStatus = $errFile;
					}
				}
?>
<html class="loading" lang="en" data-textdirection="ltr">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="author" content="">
		<title>Edit Chairman Details | <?php echo $rowOrganizationDetails['organization_name'];?></title>
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
                        				<h1 class="font-large-2 mt-1 mb-0">Chairman Details Has Been Updated Successfully.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==2)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! In Chairman Details.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==3)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! File Extension Problem.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==4)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Special Characters is Not Allow Chairman Value ID.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==5)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Special Characters is Not Allow In Chairman Details.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==9 || $errorStatus==10)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! This is not Image File. Please provide JPG,JPEG,PNG formate.!!!</h1>
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
	                                    <a class="btn btn-primary btn-lg" href="masterChairmanName">Back to Chairman Details</a>
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
				echo "<script>alert('File Missing...!!! Please Select the File Before Submit...!!!');location.href='masterChairmanName';</script>";
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