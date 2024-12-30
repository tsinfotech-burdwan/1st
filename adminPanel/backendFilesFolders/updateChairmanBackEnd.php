<?php  
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(40,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$valueId = $function->dataDecryption($_POST['valueId']);
			$chairmanName=$_POST['chairmanName'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];		
			echo "$chairmanName";
			/*if($uploadFileName!="")
			{
				if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$valueId))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Notice ID.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$chairmanName))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Notice Title.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$uploadFileTmpName))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Notice Details.";				  
				}				
				else
				{
					$kaboom = explode(".",$uploadFileName);
					$ext = end($kaboom);
					$ext = strtolower($ext);
					if($ext=="jpeg" || $ext=="jpg" || $ext=="png" && count($kaboom)<3)
					{
						$selectNoticeDetails = mysqli_query($conn,"select * from ".$noticeDetailsTbl." where notice_id='".$noticeIdvalue."'");
						$rowNoticeDetails = mysqli_fetch_array($selectNoticeDetails);
						$del_doc=$rowNoticeDetails['notice_file'];
						unlink("../".$del_doc);
						$pathoriginal = "../../gallery/";
						$newFileName = date("YmdHis").".".$ext;
						$newFileName1 = "gallery/".date("YmdHis").".".$ext;
						$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);

						$update = mysqli_query($conn,"update ".$noticeDetailsTbl." set notice_category='".$selectNoticeType."',notice_title='".$noticeTitle."',notice_details='".$noticeDetails."',notice_file='".$newFileName1."',date='".date("Y-m-d")."',status='0' where notice_id='".$noticeIdvalue."'");
						if($update) 
						{
							$errColor = "green";
							$errorCode = "Notice Details Update Successfully.";
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
			}
			else
			{
				$errColor = "red";
				$errorCode = "Error In Add Notice Details.";
			}*/
		}
		/*else
		{
			$errColor = "red";
			$errorCode = "You Dont Have Permission To Access This Page.";
		}*/
	}
	//echo "<meta http-equiv='refresh' content='0;URL=../editNoticeDetails?errMsg=".$errorCode."&errColor=".$errColor."'>";
?> 