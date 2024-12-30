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
			if($role=="approveFinancialStatement")
			{
				$updateApprove = mysqli_query($conn,"update ".$financialStatementDetailsTbl." set status='1' where id='".$valueId."'");
				if($updateApprove)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="deleteFinancialStatement")
			{
				$selectfinancialStatementDetails = mysqli_query($conn,"select * from ".$financialStatementDetailsTbl." where id='".$valueId."'");
				$rowfinancialStatementDetails = mysqli_fetch_array($selectfinancialStatementDetails);
				$del_doc=$rowfinancialStatementDetails['file_details'];
				$updateDelete = mysqli_query($conn,"delete from ".$financialStatementDetailsTbl." where id='".$valueId."'");
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
				$updateDelete = mysqli_query($conn,"update ".$financialStatementDetailsTbl." set status='2' where id='".$valueId."'");
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
				$updateDelete = mysqli_query($conn,"update ".$financialStatementDetailsTbl." set status='1' where id='".$valueId."'");
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