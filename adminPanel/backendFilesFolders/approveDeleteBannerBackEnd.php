<?php 
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		$role = $_POST['role'];
		$valueId = $function->dataDecryption($_POST['valueId']);

		if(isset($_POST['valueId']) && $_POST['valueId']!="")
		{
			if($role=="approveBanner")
			{
				$updateApprove = mysqli_query($conn,"update ".$bannerDetailsTbl." set status='1' where sl_no='".$valueId."'");
				if($updateApprove)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="deleteBanner") 
			{
				$selectNoticeDetails = mysqli_query($conn,"select * from ".$bannerDetailsTbl." where sl_no='".$valueId."'");
				$rowNoticeDetails = mysqli_fetch_array($selectNoticeDetails);
				$del_doc=$rowNoticeDetails['file_name'];

				$updateDelete = mysqli_query($conn,"delete from ".$bannerDetailsTbl." where sl_no='".$valueId."'");
				if($updateDelete)
				{
					unlink("../../assets/images/banner/".$del_doc);
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="deActive")
			{
				$updateDelete = mysqli_query($conn,"update ".$bannerDetailsTbl." set status='2' where sl_no='".$valueId."'");
				if($updateDelete)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="active")
			{
				$updateDelete = mysqli_query($conn,"update ".$bannerDetailsTbl." set status='1' where sl_no='".$valueId."'");
				if($updateDelete)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else
			{
				echo "3";
			}
		}
		else
		{
			echo "4";
		}
	}
	else
	{
		echo "5";
	}
?>