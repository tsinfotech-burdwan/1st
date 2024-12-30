<?php 
	ob_start();
	session_start(); 
	include '../base/config.php'; 
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		$user = $_SESSION[$counterSessionName]['user_id'];  
		
		$uploadFileName = $_FILES['profileImage']['name'];
		$uploadFileTmpName = $_FILES['profileImage']['tmp_name'];
		
		$fullNameUser = mysqli_real_escape_string($conn,str_replace("~","&",$_POST["fullNameUser"]));
		$addressUser = mysqli_real_escape_string($conn,$_POST["addressUser"]);
        $contactUser = $_POST["contactUser"];
        $passwordUser = $_POST["passwordUser"];
		$username = $function->dataEncryption($contactUser);
		$userPassword = $function->dataEncryption($passwordUser);

		if($fullNameUser!="")
		{
			if(preg_match('/[^a-zA-Z ]/',$fullNameUser)>0)
			{
				echo "<script>alert('Use Only Alphabate For Full Name.');location.href='../updateProfileDetails';</script>";
			}
			else
			{
				if(strlen($fullNameUser)<4)
				{
					echo "<script>alert('Use Only Alphabate For Full Name.');location.href='../updateProfileDetails';</script>";
				}
				else
				{
					$selectFullName = mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_full_name='".$fullNameUser."'");
				}
			}
		}
		else
		{
			echo "<script>alert('Full Name Can Not Be Blank.');location.href='../updateProfileDetails';</script>";
		} 
		
		/*$update = mysqli_query($conn,"update ".$masterUserDetailsTbl." set user_full_name='".$fullNameUser."',user_contact='".$contactUser."',user_address='".$addressUser."' where user_id='".$user."'");
		
		if($uploadFileName!="")
		{
			$kaboom = explode(".",$uploadFileName);
			$ext = end($kaboom);
			$ext = strtolower($ext);
			if($ext=="jpeg" || $ext=="jpg" || $ext=="png")
			{
				$path = "../userImage/";
				$newFileName = $user.".".$ext; 
				
				$upload = move_uploaded_file($uploadFileTmpName,$path.$newFileName);
				$target = $path.$newFileName;
				$newcopy = $path.$user."-profile.".$ext;
				$h = 200;
				$w = 200;
				$resize = $function->imageResize($target, $newcopy, $w, $h, $ext);
				$update = mysqli_query($conn,"update ".$masterUserDetailsTbl." set image_file='".$newFileName."' where user_id='".$user."'");
			}
		}
		if($update)
		{
			$update = mysqli_query($conn,"update ".$masterLoginDetailsTbl." set user_name='".$username."',password='".$userPassword."' where user_id='".$user."'");
			echo "<script>alert('Details Updated Successfully...');location.href='../updateProfileDetails';</script>";
		}
		else
		{
			echo "<script>alert('Details Updated Successfully without Image...');location.href='../updateProfileDetails';</script>";
		}*/
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;URL=../logout'>";
	}
?>  
