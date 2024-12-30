<?php 
	include '../base/config.php';
	$date = date('Y-m-d H:i:s');
	$role = $_POST['role'];
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$emailID=$_POST['emailID'];
	$emailID = trim($emailID);
	$emailID = stripslashes($emailID);
	$emailID = htmlspecialchars($emailID);
	
	if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$name))
	{
	  	echo "4";			  
	}
	else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$mobile))
	{
	  	echo "4";				  
	}
	if(!preg_match('/^[6-9][0-9]{9}$/', $mobile)) 
	{
		echo "4";
	}
	else if($mobile=="9999999999")
	{
		echo "4";
	}
	else if($mobile=="8888888888")
	{
		echo "4";
	}
	else if($mobile=="7777777777")
	{
		echo "4";
	}
	else if($mobile=="6666666666")
	{
		echo "4";
	}
	else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$subject))
	{
	  	echo "4";				  
	}
	else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$message))
	{
	  	echo "4";				  
	}
	else if(preg_match('/[\'^£$%&*()}{#~?><>|=_+¬]/',$emailID))
	{
	  	echo "4";				  
	}
	else if(!filter_var($emailID, FILTER_VALIDATE_EMAIL))
	{
	  	echo "4";				  
	}
	else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$role))
	{
	  	echo "4";			  
	}
	else 
	{
		if($role=='addContact')
		{
			$insert = mysqli_query($conn,"insert into ".$contactUsDetailsTbl." set applicant_name='".$name."',email_id='".$emailID."',phone_no='".$mobile."',subject='".$subject."',message='".$message."',submitted_date='".$currentDateTimeConnection."',print='0'");
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
			
?> 