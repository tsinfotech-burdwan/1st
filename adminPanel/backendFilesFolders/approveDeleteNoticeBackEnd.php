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
			if($role=="approveNotice")
			{
				$updateApprove = mysqli_query($conn,"update ".$noticeDetailsTbl." set status='1' where notice_id='".$valueId."'");
				if($updateApprove)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="deleteNotice")
			{
				$selectNoticeDetails = mysqli_query($conn,"select * from ".$noticeDetailsTbl." where notice_id='".$valueId."'");
				$rowNoticeDetails = mysqli_fetch_array($selectNoticeDetails);
				$del_doc=$rowNoticeDetails['notice_file'];
				$updateDelete = mysqli_query($conn,"delete from ".$noticeDetailsTbl." where notice_id='".$valueId."'");
				if($updateDelete)
				{
					unlink("../../".$del_doc);
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="deActive")
			{
				$updateDelete = mysqli_query($conn,"update ".$noticeDetailsTbl." set status='2' where notice_id='".$valueId."'");
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
				$updateDelete = mysqli_query($conn,"update ".$noticeDetailsTbl." set status='1' where notice_id='".$valueId."'");
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