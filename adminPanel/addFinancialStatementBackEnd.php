<?php
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(42,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$financialStatementType=$_POST['financialStatementType'];
			$financialYear=$_POST['financialYear'];
			$financialStatementDetails=$_POST['financialStatementDetails'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];	
			
			if($uploadFileName!="")
			{
				if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$financialStatementType))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Notice Title.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$financialYear))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Notice Title.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$financialStatementDetails))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Notice Details.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$uploadFileTmpName))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Notice Upload File.";				  
				}
				else
				{
					$kaboom = explode(".",$uploadFileName);
					$ext = end($kaboom);
					$ext = strtolower($ext);
					if($ext=="pdf" && count($kaboom)<3)
					{
						$pathoriginal = "../../gallery/";
						$newFileName = date("YmdHis").".".$ext;
						$newFileName1 = "gallery/".date("YmdHis").".".$ext;
						$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);
						$insert = mysqli_query($conn,"insert into ".$financialStatementDetailsTbl." set title='".$financialStatementType."',financial_statements='".$financialStatementDetails."',financial_year='".$financialYear."',file_details='".$newFileName1."',date='".date("Y-m-d")."',status='0'");
						if($insert) 
						{
							$errColor = "green";
							$errorCode = "Financial Statement Details Added Successfully.";
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
						$errorCode = "PDF File Name Must Contant in Singel [dot].";
					}											
				}				
			}
			else
			{
				$errColor = "red";
				$errorCode = "Error In Add Notice Details.";
			}
		}
		else
		{
			$errColor = "red";
			$errorCode = "You Dont Have Permission To Access This Page.";
		}
	}
	echo "<meta http-equiv='refresh' content='0;URL=../addFinancialStatement?errMsg=".$errorCode."&errColor=".$errColor."'>";
?> 