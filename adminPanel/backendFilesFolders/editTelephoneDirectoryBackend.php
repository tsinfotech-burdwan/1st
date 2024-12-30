<?php
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(67,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$telephoneDirectoryIdvalue = $_POST['telephoneDirectoryIdvalue'];
			$employeeOrDepartment=$_POST['employeeOrDepartment'];
			$extension=$_POST['extension'];
				
			
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$employeeOrDepartment))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Employee Or Department Name.";				  
			}
			else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$extension))
			{
			  	$errColor = "red";
				$errorCode = "Special Character is Available in Extension Number.";				  
			}				
			else
			{
				$selectTelehoneDirectory=mysqli_num_rows(mysqli_query($conn,"select * from ".$telephoneDirectoryDetailsTbl." where extention='".$extension."'"));
				if($selectTelehoneDirectory==0)
				{
					$update = mysqli_query($conn,"update ".$telephoneDirectoryDetailsTbl." set employee_or_depatment_name='".$employeeOrDepartment."',extention='".$extension."',status='0' where id='".$telephoneDirectoryIdvalue."'");
					if($update) 
					{
						$errColor = "green";
						$errorCode = "Telephone Directory Details Update Successfully.";
					}
					else
					{
						$errColor = "red";
						$errorCode = "Problem On Insert Query...!!!";
					}
				}
				else  
				{
					$errColor = "red";
					$errorCode = "This Extention Number ALready Available...!!!";
				}																		
			}		
		}
		else
		{
			$errColor = "red";
			$errorCode = "You Dont Have Permission To Access This Page.";
		}
	}
	echo "<meta http-equiv='refresh' content='0;URL=../editTelephoneDirectoryDetails?errMsg=".$errorCode."&errColor=".$errColor."'>";
?> 