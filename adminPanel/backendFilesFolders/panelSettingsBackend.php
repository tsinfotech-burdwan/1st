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
		if($_SESSION[$counterSessionName]['designation_id']==1)
		{
			$userPrefix = mysqli_real_escape_string($conn,$_POST['userPrefix']);
			$cookieUserName = mysqli_real_escape_string($conn,$_POST['cookieUserName']);
			$cookieUserPassword = mysqli_real_escape_string($conn,$_POST['cookieUserPassword']);
			$organizationName = mysqli_real_escape_string($conn,$_POST['organizationName']);
			$organizationSessionName = mysqli_real_escape_string($conn,$_POST['organizationSessionName']);
			$applicationShortName = mysqli_real_escape_string($conn,$_POST['applicationShortName']);
			
			$update = mysqli_query($conn,"update ".$masterCounterTbl." set user_prefix='".$userPrefix."',cookie_user_name='".$cookieUserName."',cookie_user_password='".$cookieUserPassword."',organization_name='".$organizationName."',organization_session_name='".$organizationSessionName."',application_short_name='".$applicationShortName."' where id='1'");
			if($update)
			{
				echo '1';
			}
			else
			{
				echo '2';
			}
		}
		else
		{
			echo "0";
		}
	}
?>