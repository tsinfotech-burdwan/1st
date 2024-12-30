<?php  
	ob_start();
	session_start(); 
	include 'base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(26,$userPermissionDetails)) 
		{
			$mainPageName = "Banner Management";
			$subPageName = "Add Banner";

			$today=date('Y-m-d');
			$noticeTitle=$_POST['noticeTitle'];
			$noticeDetails=$_POST['noticeDetails'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];	

			
			if($uploadFileName!="")
			{
				if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$noticeTitle))
				{
				  	$errorStatus="7";		  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$noticeDetails))
				{
				  	$errorStatus="8";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$uploadFileTmpName))
				{
				  	$errorStatus="9";				  		  
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
							$pathoriginal = "../assets/images/banner/";
							$newFileName = date("YmdHis").".".$ext;
							$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);

							if($upload)
							{
								$insert = mysqli_query($conn,"insert into ".$bannerDetailsTbl." set head_title='".$noticeTitle."',head_details='".$noticeDetails."',file_name='".$newFileName."',created_by='".$_SESSION[$counterSessionName]['user_id']."',created_date_time='".date("Y-m-d H:i:s")."',status='1'");
								if($insert) 
								{
									$errorStatus = "1";
								}
								else
								{
									$errorStatus = "2";
								}
							}
							else
							{
								$errorStatus = "3";
							}
						}
						else
						{
							$errorStatus = "4";
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
		<title>Add Banner | <?php echo $rowOrganizationDetails['organization_name'];?></title>
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
                        				<h1 class="font-large-2 mt-1 mb-0">Banner Details Has Been Updated Successfully.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==2)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! In Banner Details.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==3)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! File Not Uploaded.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==4)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! File Image File extension.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==5)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Upload File Missing.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==6)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! You Have No Permisstion to upload Banner.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==9)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! This is not Image File. Please provide JPG,JPEG,PNG formate.!!!</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==10)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Image File SIze Problem.!!!</h1>
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
	                                    <a class="btn btn-primary btn-lg" href="addBanner">Back to Banner</a>
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
				echo "<script>alert('File Missing...!!! Please Select the File Before Submit...!!!');location.href='addBanner';</script>";
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