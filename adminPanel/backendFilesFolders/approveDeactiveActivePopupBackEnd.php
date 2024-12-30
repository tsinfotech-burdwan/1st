<?php
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		$role = $_POST['role'];
		$valueId = $function->dataDecryption($_POST['valueId']);
		if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$valueId))
		{
			echo "<script>alert('Special Character is Available in Value ID');location.href='dashboard';</script>";
		}
		else  
		{
			if($role=="deActive")
			{
				$updateDeActive = mysqli_query($conn,"update ".$popupDetailsTbl." set status='0' where popup_id='".$valueId."'");
				if($updateDeActive)
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
				$selectPopUpDetails = mysqli_query($conn,"select * from ".$popupDetailsTbl." where popup_id='".$valueId."'");
				$rowPopUp = mysqli_fetch_array($selectPopUpDetails);
				if($rowPopUp['image']!="")
				{
					$updateActive = mysqli_query($conn,"update ".$popupDetailsTbl." set status='1' where popup_id='".$valueId."'");
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
					echo "6";
				}				
			}
			else
			{
				echo "3";
			}			
		}		
	}
	else
	{
		echo "5";
	}
?> 