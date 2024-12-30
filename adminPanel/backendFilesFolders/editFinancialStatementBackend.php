<?php  
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(20,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$financialStatementIdvalue = $_POST['financialStatementIdvalue'];
			$selectStatementType=$_POST['selectStatementType'];
			$financialYear=$_POST['financialYear'];
			$financialStatementDetails=$_POST['financialStatementDetails'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];		
			
			if($uploadFileName!="")
			{
				if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$financialStatementIdvalue))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Financial Statement ID.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$selectStatementType))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Financial Statement Type.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$financialYear))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Financial Year.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$financialStatementDetails))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Financial Statement Details.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$uploadFileTmpName))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Financial Statement Details.";				  
				}				
				else
				{
					$kaboom = explode(".",$uploadFileName);
					$ext = end($kaboom);
					$ext = strtolower($ext);
					if($ext=="pdf" && count($kaboom)<3)
					{
						$selectFinancialStatementDetails = mysqli_query($conn,"select * from ".$financialStatementDetailsTbl." where id='".$financialStatementIdvalue."'");
						$rowNoticeDetails = mysqli_fetch_array($selectFinancialStatementDetails);
						$del_doc=$rowNoticeDetails['file_details'];
						unlink("../../".$del_doc);
						$pathoriginal = "../../gallery/";
						$newFileName = date("YmdHis").".".$ext;
						$newFileName1 = "gallery/".date("YmdHis").".".$ext;
						$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);

						$update = mysqli_query($conn,"update ".$financialStatementDetailsTbl." set title='".$selectStatementType."',financial_statements='".$financialStatementDetails."',financial_year='".$financialYear."',file_details='".$newFileName1."',date='".date("Y-m-d")."',status='0' where id='".$financialStatementIdvalue."'");
						if($update) 
						{
							$errColor = "green";
							$errorCode = "Financial Statement Details Update Successfully.";
						}
						else
						{
							$errColor = "red";
							$errorCode = "Update Not Done...!!!";
						}
					}
					else
					{
						$errColor = "red";
						$errorCode = "Please Select The PDF File.";
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
	echo "<meta http-equiv='refresh' content='0;URL=../editFinancialStatementDetails?errMsg=".$errorCode."&errColor=".$errColor."'>";
?> 