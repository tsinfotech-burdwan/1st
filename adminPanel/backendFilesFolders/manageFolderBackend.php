<?php
	ob_start();
	session_start();
	include '../base/config.php';
	if(!isset($_SESSION[$counterSessionName]['user_id']) || $_SESSION[$counterSessionName]['user_id']=="")
	{
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=../logout'>";
	}
	else
	{
		$role = $_POST['role'];

		if($role=="folderAdd")
		{
			$folderName = strtoupper($_POST['folderName']);
			$folderName = mysqli_real_escape_string($conn,str_replace("~","&",$folderName));
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$folderName))
			{
			  	echo "4";		  
			}
			else
			{
				$numRows = mysqli_query($conn,"select * from ".$masterFolderDetailsTbl." where folder_name='".$folderName."'");
				if(mysqli_num_rows($numRows)==0)
				{
					$insert = mysqli_query($conn,"insert into ".$masterFolderDetailsTbl." set folder_name='".$folderName."',created_by='".$_SESSION[$counterSessionName]['user_id']."',created_date_time='".$currentDateTimeConnection."',status='1'");
					if($insert)
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
		} 
		else if($role=="editFolder")
		{
			$valueId = $function->dataDecryption($_POST['valueId']);
			$folderName = strtoupper($_POST['folderName']);
			$folderName = mysqli_real_escape_string($conn,str_replace("~","&",$folderName));

			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$folderName))
			{
			  	echo "4";		  
			}
			else
			{
				$numRows = mysqli_query($conn,"select * from ".$masterFolderDetailsTbl." where folder_name='".$folderName."' and folder_id not in ('".$valueId."')");
				if(mysqli_num_rows($numRows)==0)
				{
					$update = mysqli_query($conn,"update ".$masterFolderDetailsTbl." set folder_name='".$folderName."' where folder_id='".$valueId."'");
					if($update)
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
		}
		else if($role=="deleteFolder") 
		{
			/*$selectNoticeDetails = mysqli_query($conn,"select * from ".$masterFolderDetailsTbl." where folder_id='".$valueId."'");
			while($rowNoticeDetails = mysqli_fetch_array($selectNoticeDetails))
			{
				unlink("../../gallery/".$rowNoticeDetails['file_name']);
			}*/

			$updateDelete = mysqli_query($conn,"delete from ".$masterFolderDetailsTbl." where folder_id='".$valueId."'");
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
			$valueId = $function->dataDecryption($_POST['valueId']);
			$updateDelete = mysqli_query($conn,"update ".$masterFolderDetailsTbl." set status='2' where folder_id='".$valueId."'");
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
			$valueId = $function->dataDecryption($_POST['valueId']);
			$updateDelete = mysqli_query($conn,"update ".$masterFolderDetailsTbl." set status='1' where folder_id='".$valueId."'");
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
			echo "0";
		}
	}
?> 