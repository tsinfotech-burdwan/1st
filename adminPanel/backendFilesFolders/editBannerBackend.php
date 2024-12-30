<?php
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(27,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$bannerIdvalue = $function->dataDecryption($_POST['bannerIdvalue']);
			$bannerTitle=$_POST['bannerTitle'];
			$bannerDetails=$_POST['bannerDetails'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];	

			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$bannerIdvalue))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Banner ID.";				  
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$bannerTitle))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Banner Title.";				  
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$bannerDetails))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Banner Details.";				  
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$uploadFileTmpName))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Banner Details.";				  
			}				
			else
			{
				if($uploadFileName!="")
				{
					$kaboom = explode(".",$uploadFileName);
					$ext = end($kaboom);
					$ext = strtolower($ext);
					if($ext=="jpg" || $ext=="jpeg" || $ext=="png" && count($kaboom)<3)
					{
						$selectBannerDetails = mysqli_query($conn,"select * from ".$bannerDetailsTbl." where sl_no='".$bannerIdvalue."'");
						$rowBannerDetails = mysqli_fetch_array($selectBannerDetails);
						$del_doc=$rowBannerDetails['file_name'];
						unlink("../../assets/images/banner/".$del_doc);

						$pathoriginal = "../../assets/images/banner/";
						$newFileName = date("YmdHis").".".$ext;
						$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);

						$update = mysqli_query($conn,"update ".$bannerDetailsTbl." set head_title='".$bannerTitle."',head_details='".$bannerDetails."',file_name='".$newFileName."',modified_by='".$_SESSION[$counterSessionName]['user_id']."',modified_date_time='".date("Y-m-d H:i:s")."' where sl_no='".$bannerIdvalue."'");
						if($update) 
						{
							$errColor = "green";
							$errorCode = "Banner Details Update Successfully.";
						}
						else
						{
							$errColor = "red";
							$errorCode = "Update Not Done...!!!";
						}
					}
					else
					{
						$errColor = "red";
						$errorCode = "Please Select The PDF File.";
					}
				}
				else
				{
					$update = mysqli_query($conn,"update ".$bannerDetailsTbl." set head_title='".$bannerTitle."',head_details='".$bannerDetails."',modified_by='".$_SESSION[$counterSessionName]['user_id']."',modified_date_time='".date("Y-m-d H:i:s")."' where sl_no='".$bannerIdvalue."'");
					if($update) 
					{
						$errColor = "green";
						$errorCode = "Banner Details Update Successfully.";
					}
					else
					{
						$errColor = "red";
						$errorCode = "Update Not Done...!!!";
					}
				}
			}
		}
		else
		{
			$errColor = "red";
			$errorCode = "You Dont Have Permission To Access This Page.";
		}
	}
	echo "<meta http-equiv='refresh' content='0;URL=../editBanner?errMsg=".$errorCode."&errColor=".$errColor."&valueId=".$_POST['bannerIdvalue']."'>";
?> 