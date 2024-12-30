<?php  
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(65,$userPermissionDetails)) 
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
				$selectChairmanInCouncilDetails = mysqli_query($conn,"select * from ".$chairmanInCouncilDetailsTbl." where id='".$chairmanInCouncilIdvalue."'");
				$rowChairmanInCouncil = mysqli_fetch_array($selectChairmanInCouncilDetails);
				$mobileNoDeatils = mysqli_num_rows(mysqli_query($conn,"select * from ".$previousRunningBoardDetailsTbl." where phone_no='".$rowChairmanInCouncil['mobile_no']."'"));
				if($mobileNoDeatils==0) 
				{
					$insert = mysqli_query($conn,"insert into ".$previousRunningBoardDetailsTbl." set deignation='".$rowChairmanInCouncil['designation']."',name='".$rowChairmanInCouncil['name']."',ward_no='".$rowChairmanInCouncil['ward_no']."',image='".$rowChairmanInCouncil['image']."',priod_from='".$periodFromDate."',priod_to='".$periodToDate."',phone_no='".$rowChairmanInCouncil['mobile_no']."',status='0'");
					if($insert) 
					{
						$delete = mysqli_query($conn,"delete from ".$chairmanInCouncilDetailsTbl." where id='".$chairmanInCouncilIdvalue."'");
						$errColor = "green";
						$errorCode = "Chairman In Council Details Transfer Successfully.";
					}
					else
					{
						$errColor = "red";
						$errorCode = "Insert Not Done...!!!";
					}
				}
				else
				{
					$errColor = "red";
					$errorCode = "This Data Alreay Insert In Previous Table...!!!";
				}		
								
			}		
		}
		else
		{
			$errColor = "red";
			$errorCode = "You Dont Have Permission To Access This Page.";
		}
	}
	echo "<meta http-equiv='refresh' content='0;URL=../transferPreviousChairmanInCouncilDetails?errMsg=".$errorCode."&errColor=".$errColor."'>";
?> 