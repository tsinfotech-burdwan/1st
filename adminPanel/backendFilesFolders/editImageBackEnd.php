<?php 
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(27,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$imageIdvalue = $function->dataDecryption($_POST['imageIdvalue']);
			$selectFolder=$_POST['selectFolder'];
			$noticeTitle=$_POST['noticeTitle'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];	

			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$noticeTitle))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Image Title.";				  
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$selectFolder))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Folder Name.";				  
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$uploadFileTmpName))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Image Upload File.";				  
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
						$selectBannerDetails = mysqli_query($conn,"select * from ".$masterImageDetailsTbl." where image_id='".$imageIdvalue."'");
						$rowBannerDetails = mysqli_fetch_array($selectBannerDetails);
						$del_doc=$rowBannerDetails['image_file'];
						unlink("../../gallery/".$del_doc);

						$pathoriginal = "../../gallery/";
						$newFileName = date("YmdHis").".".$ext;
						$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);

						$update = mysqli_query($conn,"update ".$masterImageDetailsTbl." set folder_id='".$selectFolder."',image_title='".$noticeTitle."',image_file='".$newFileName."' where image_id='".$imageIdvalue."'");
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
					$update = mysqli_query($conn,"update ".$masterImageDetailsTbl." set folder_id='".$selectFolder."',image_title='".$noticeTitle."' where image_id='".$imageIdvalue."'");
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
	echo "<meta http-equiv='refresh' content='0;URL=../editImage?errMsg=".$errorCode."&errColor=".$errColor."&valueId=".$_POST['imageIdvalue']."'>";
?> 