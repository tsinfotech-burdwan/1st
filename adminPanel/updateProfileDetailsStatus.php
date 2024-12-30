<?php
	ob_start();
	session_start(); 
	include 'base/config.php'; 
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		$mainPageName = "Edit Profile";
		$subPageName = "Update Own Details";

		$user = $_SESSION[$counterSessionName]['user_id'];
		$uploadFileName = $_FILES['profileImage']['name'];
		$uploadFileTmpName = $_FILES['profileImage']['tmp_name'];
		$fullNameUser = mysqli_real_escape_string($conn,str_replace("~","&",$_POST["fullNameUser"]));
		$addressUser = mysqli_real_escape_string($conn,$_POST["addressUser"]);
        $contactUser = $_POST["contactUser"];
        $passwordUser = $_POST["passwordUser"];
		$username = $function->dataEncryption($contactUser);
		$userPassword = $function->dataEncryption($passwordUser); 

		$errorStatus = 0;
		$errContact = $function->checkUserContactNumber($contactUser);
		if($errContact==1)
		{
			if(mysqli_num_rows(mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_contact='".$contactUser."' and user_id not in ('".$user."')"))==0)
			{
				$errFullName = $function->checkUserFullName($fullNameUser);
				if($errFullName==1)
				{
					if(mysqli_num_rows(mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_full_name='".$fullNameUser."' and user_id not in ('".$user."')"))==0)
					{
						$errAddress = $function->checkUserAddress($addressUser);
						if($errAddress==1)
						{
							$errPassword = $function->userPasswordChecking($passwordUser);
							if($errPassword==1)
							{
								if($uploadFileName=="")
								{
									$updateDetails = mysqli_query($conn,"update ".$masterUserDetailsTbl." set user_full_name='".$fullNameUser."',user_contact='".$contactUser."',user_address='".$addressUser."' where user_id='".$user."'");
									$updateLoginDetails = mysqli_query($conn,"update ".$masterLoginDetailsTbl." set user_name='".$username."',password='".$userPassword."' where user_id='".$user."'");

									if($updateDetails)
									{
										$errorStatus = 1;
									}
									else
									{
										$errorStatus = 0;
									}
								}
								else
								{
									$errFileName = $function->uploadFileChecking($uploadFileName,$uploadFileTmpName);
									if($errFileName==1)
									{
										$kaboom = explode(".",$uploadFileName);
										$ext = end($kaboom);
										$ext = strtolower($ext);
										if($ext=="jpeg" || $ext=="jpg" || $ext=="png")
										{
											$path = "./userImage/";
											$newFileName = $user.".".$ext; 
											
											$upload = move_uploaded_file($uploadFileTmpName,$path.$newFileName);
											/*$target = $path.$newFileName;
											$newcopy = $path.$user."-profile.".$ext;
											$h = 200;
											$w = 200;
											$resize = $function->imageResize($target, $newcopy, $w, $h, $ext);*/ 
										}

										$updateDetails = mysqli_query($conn,"update ".$masterUserDetailsTbl." set user_full_name='".$fullNameUser."',user_contact='".$contactUser."',user_address='".$addressUser."',image_file='".$newFileName."' where user_id='".$user."'");
										$updateLoginDetails = mysqli_query($conn,"update ".$masterLoginDetailsTbl." set user_name='".$username."',password='".$userPassword."' where user_id='".$user."'");

										if($updateDetails)
										{
											$errorStatus = 1;
										}
										else
										{
											$errorStatus = 0;
										}
									}
									else
									{
										$errorStatus = $errFileName;
									}
								}
							}
							else
							{
								$errorStatus = $errPassword;
							}
						}
						else
						{
							$errorStatus = $errAddress;
						}
					}
					else
					{
						$errorStatus = 3;
					}
				}
				else
				{
					$errorStatus = $errFullName;
				}
			}
			else
			{
				$errorStatus = 5;
			}
		}
		else
		{
			$errorStatus = $errContact;
		}
?>
<html class="loading" lang="en" data-textdirection="ltr">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="author" content="">
		<title>Update Profile | <?php echo $rowOrganizationDetails['organization_name'];?></title>
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
                        				<h1 class="font-large-2 mt-1 mb-0">Your Personal Details Has Been Updated Successfully.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==2)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Full Name Contain 6 Letter.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==3)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Full Name Already In Database.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==4)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Full Name Contain Only Alphabate.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==5)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Contact Number Already In Database.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==6)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Contact Number Contain Number Only.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==7)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Contact Number Contain 10 Letter.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==8)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Address Contain Number And Letter Only.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==9)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Unsupported File Name.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==10)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! File Is Not An Image File.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==11)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Password Contain Minimum 6 Character.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==12)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Password Must Contain Minimum 1 Number.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==13)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Password Must Contain Minimum 1 Upper Case.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==14)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Password Must Contain Minimum 1 Lower Case.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==15)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Password Must Contain Minimum 1 Special Character.</h1>
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
	                                    <a class="btn btn-primary btn-lg" href="updateProfileDetails">Back to Profile</a>
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
?>