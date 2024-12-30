<?php  
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(63,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$chairmanInCouncilIdvalue = $_POST['chairmanInCouncilIdvalue'];
			$periodToDate=$_POST['periodToDate'];
			$periodFromDate=$_POST['periodFromDate'];
						
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$chairmanInCouncilIdvalue))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in ID.";				  
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$periodToDate))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Period To Date.";				  
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$periodFromDate))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Period From Date.";				  
			}
			else
			{
				$update = mysqli_query($conn,"update ".$previousRunningBoardDetailsTbl." set priod_from='".$periodFromDate."',priod_to='".$periodToDate."' where id='".$chairmanInCouncilIdvalue."'");
				if($update) 
				{
					$errColor = "green";
					$errorCode = "Chairman In Council Details Update Successfully.";
				}
				else
				{
					$errColor = "red";
					$errorCode = "Update Not Done...!!!";
				}							
			}		
		}
		else
		{
			$errColor = "red";
			$errorCode = "You Dont Have Permission To Access This Page.";
		}
	}
	echo "<meta http-equiv='refresh' content='0;URL=../editPreviousBoardDetails?errMsg=".$errorCode."&errColor=".$errColor."'>";
?> 