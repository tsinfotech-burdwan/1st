<?php
	include 'adminPanel/base/config.php'; 

	if($_POST['role']=="validateFullName")
	{
		$userFullName=$_POST['name'];
		if(preg_match('/[^a-zA-Z ]/',$userFullName)>0)
		{
			echo "1";
		}
		else if(strlen($userFullName)<6)
		{
			echo "1";
		}
	} 
	else if($_POST['role']=="validateContact")
	{
		$mobile=$_POST['mobile'];
		if(!preg_match('/^[6-9][0-9]{9}$/', $mobile)) 
		{
			echo "1";
		}
		else if($mobile=="9999999999")
		{
			echo "1";
		}
		else if($mobile=="8888888888")
		{
			echo "1";
		}
		else if($mobile=="7777777777")
		{
			echo "1";
		}
		else if($mobile=="6666666666")
		{
			echo "1";
		}
	}
	else if($_POST['role']=="validateEmailId")
	{
		$emailID=$_POST['emailID'];

		$emailID = trim($emailID);
		$emailID = stripslashes($emailID);
		$emailID = htmlspecialchars($emailID);

		if(!filter_var($emailID, FILTER_VALIDATE_EMAIL))
		{
			echo "1";
		}
	}
?> 