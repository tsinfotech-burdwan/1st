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
			if($role=="approveTender")
			{
				$updateApprove = mysqli_query($conn,"update ".$tenderDetailsTbl." set status='1' where tender_id='".$valueId."'");
				if($updateApprove)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="deleteTender")
			{
				$selectTenderDetails = mysqli_query($conn,"select * from ".$tenderDetailsTbl." where tender_id='".$valueId."'");
				$rowTenderDetails = mysqli_fetch_array($selectTenderDetails);
				$del_doc=$rowTenderDetails['details'];
				$updateDelete = mysqli_query($conn,"delete from ".$tenderDetailsTbl." where tender_id='".$valueId."'");
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
				$updateDeactive = mysqli_query($conn,"update ".$tenderDetailsTbl." set status='2' where tender_id='".$valueId."'");
				if($updateDeactive)
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
				$updateActive = mysqli_query($conn,"update ".$tenderDetailsTbl." set status='1' where tender_id='".$valueId."'");
				if($updateActive)
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