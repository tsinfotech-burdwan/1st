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
			if($role=="approveDepartmanManpower")
			{
				$updateApprove = mysqli_query($conn,"update ".$depatmentManpowerDetailsTbl." set status='1' where id='".$valueId."'");
				if($updateApprove)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="deleteDepartmanManpower")
			{
				
				$updateDelete = mysqli_query($conn,"delete from ".$depatmentManpowerDetailsTbl." where id='".$valueId."'");
				if($updateDelete)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="deActive")
			{
				$updateDelete = mysqli_query($conn,"update ".$depatmentManpowerDetailsTbl." set status='2' where id='".$valueId."'");
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
				$updateDelete = mysqli_query($conn,"update ".$depatmentManpowerDetailsTbl." set status='1' where id='".$valueId."'");
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