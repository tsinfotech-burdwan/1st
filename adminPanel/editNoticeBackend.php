<?php  
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(20,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$noticeIdvalue = $_POST['noticeIdvalue'];
			$noticeTitle=$_POST['noticeTitle'];
			$selectNoticeType=$_POST['selectNoticeType'];
			$noticeDetails=$_POST['noticeDetails'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];		
			
			if($uploadFileName!="")
			{
				if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$noticeIdvalue))
				{
				  	$errorStatus="4";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$noticeTitle))
				{
				  	$errorStatus="5";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$NoticeType))
				{
				  	$errorStatus="6";			  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$noticeDetails))
				{
				  	$errorStatus="7";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$uploadFileTmpName))
				{
				  	$errorStatus="8";				  
				}				
				else
				{
					$result=$function->uploadPDFFileChecking($uploadFileTmpName);
					if($result==1)
					{	
						$kaboom = explode(".",$uploadFileName);
						$ext = end($kaboom);
						$ext = strtolower($ext);
						if($ext=="pdf" && count($kaboom)<3)
						{
							$selectNoticeDetails = mysqli_query($conn,"select * from ".$noticeDetailsTbl." where notice_id='".$noticeIdvalue."'");
							$rowNoticeDetails = mysqli_fetch_array($selectNoticeDetails);
							$del_doc=$rowNoticeDetails['notice_file'];
							unlink("../".$del_doc);
							$pathoriginal = "../gallery/";
							$newFileName = date("YmdHis").".".$ext;
							$newFileName1 = "gallery/".date("YmdHis").".".$ext;
							$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);

							$update = mysqli_query($conn,"update ".$noticeDetailsTbl." set notice_category='".$selectNoticeType."',notice_title='".$noticeTitle."',notice_details='".$noticeDetails."',notice_file='".$newFileName1."',date='".date("Y-m-d")."',status='0' where notice_id='".$noticeIdvalue."'");
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
		<title>Edit Notice Details | <?php echo $rowOrganizationDetails['organization_name'];?></title>
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
                        				<h1 class="font-large-2 mt-1 mb-0">Notice Details Has Been Updated Successfully.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==2)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! In Notice Details.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==3)
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! File PDF File extension.</h1>
                        			<?php
                                    	}
                                    	else if($errorStatus==5 || $errorStatus==6 || $errorStatus==7 || $errorStatus==8 || $errorStatus==4)
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
                        			  	else
                                    	{
                        			?>
                        				<h1 class="font-large-2 mt-1 mb-0">Error !!! Please Try Again.</h1>
                        			<?php

                                    	}
                                    ?>
	                                    <p class="p-3"></p>
	                                    <a class="btn btn-primary btn-lg" href="listNotice">Back to List Notice</a>
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
				echo "<script>alert('File Missing...!!! Please Select the File Before Submit...!!!');location.href='listNotice';</script>";
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