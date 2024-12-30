<?php  
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(14,$userPermissionDetails)) 
		{
			$today=date('Y-m-d');
			$tenderIdValue = $_POST['tenderIdValue'];
			$tenderId=$_POST['tenderId'];
			$TenderDetails=$_POST['TenderDetails'];
			$receiveAmount=$_POST['receiveAmount'];
			$selectTenderType=$_POST['selectTenderType'];
			$selectFinancialYear=$_POST['selectFinancialYear'];
			$bidStartDate=$_POST['bidStartDate'];
			$bidEndDate=$_POST['bidEndDate'];
			$bidOpenDate=$_POST['bidOpenDate'];
			$uploadFileName = $_FILES['imageTitle']['name'];
			$uploadFileTmpName = $_FILES['imageTitle']['tmp_name'];	
	
			
			if($uploadFileName!="")
			{
				if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$tenderIdValue))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Tender ID.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$tenderId))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Tender ID.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$TenderDetails))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Tender Details.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$receiveAmount))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Tender Details.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$selectTenderType))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Tender Details.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$selectFinancialYear))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Tender Details.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$bidStartDate))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Tender Details.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$bidEndDate))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Tender Details.";				  
				}
				else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬]/',$bidOpenDate))
				{
				  	$errColor = "red";
					$errorCode = "Special Character is Available in Tender Details.";				  
				}
				else if($today<=$bidStartDate && $today<=$bidEndDate && $today<=$bidOpenDate)
				{
					if($bidStartDate<=$bidEndDate && $bidEndDate<=$bidOpenDate)
					{
						$kaboom = explode(".",$uploadFileName);
						$ext = end($kaboom);
						$ext = strtolower($ext);
						if($ext=="pdf" && count($kaboom)<3)
						{
							$selectTenderDetails = mysqli_query($conn,"select * from ".$tenderDetailsTbl." where tender_id='".$tenderIdValue."'");
							$rowTenderDetails = mysqli_fetch_array($selectTenderDetails);
							$del_doc=$rowTenderDetails['details'];
							unlink("../".$del_doc);
							$pathoriginal = "../gallery/";
							$newFileName = date("YmdHis").".".$ext;
							$newFileName1 = "gallery/".date("YmdHis").".".$ext;
							$upload = move_uploaded_file($uploadFileTmpName,$pathoriginal.$newFileName);

							if($selectTenderType=='E-Tender')
							{
								$update = mysqli_query($conn,"update ".$tenderDetailsTbl." set tender_head='".$TenderDetails."',tender_type='".$selectTenderType."',tender_year='".$selectFinancialYear."',value='".$receiveAmount."',last_date='".$bidEndDate."',start_date='".$bidStartDate."',due_date_sub='Nil',due_date_open='".$bidOpenDate."',details='".$newFileName1."',submition='https://wbtenders.gov.in/nicgep/app',references_details='".$tenderId."',date='".date("Y-m-d")."',new='y',status='n' where tender_id='".$tenderIdValue."'");
								if($update) 
								{
									$errColor = "green";
									$errorCode = "Tender Details Update Successfully.";
								}
							}
							else if($selectTenderType=='Normal Tender')
							{
								$update = mysqli_query($conn,"update ".$tenderDetailsTbl." set tender_head='".$TenderDetails."',tender_type='".$selectTenderType."',tender_year='".$selectFinancialYear."',value='".$receiveAmount."',last_date='".$bidEndDate."',start_date='".$bidStartDate."',due_date_sub='Nil',due_date_open='".$bidOpenDate."',details='".$newFileName1."',submition='Nil',references_details='".$tenderId."',date='".date("Y-m-d")."',new='y',status='n' where tender_id='".$tenderIdValue."'");
								if($update) 
								{
									$errColor = "green";
									$errorCode = "Tender Details Update Successfully.";
								}							
							}
							else if($selectTenderType=='Corrigendum')
							{
								$update = mysqli_query($conn,"update ".$tenderDetailsTbl." set tender_head='".$TenderDetails."',tender_type='".$selectTenderType."',tender_year='".$selectFinancialYear."',value='".$receiveAmount."',last_date='".$bidEndDate."',start_date='".$bidStartDate."',due_date_sub='Nil',due_date_open='".$bidOpenDate."',details='".$newFileName1."',submition='Nil',references_details='".$tenderId."',date='".date("Y-m-d")."',new='y',status='n' where tender_id='".$tenderIdValue."'");
								if($update) 
								{
									$errColor = "green";
									$errorCode = "Tender Details Update Successfully.";
								}
							}
							else
							{
								$errColor = "red";
								$errorCode = "Tender Type Is not Valid.";
							}
						}
						else
						{
							$errColor = "red";
							$errorCode = "Please Select The PDF File.";
						}
					}
					else
					{
						$errColor = "red";
						$errorCode = "Provided Date is Less Then Today Date.";
					}
												
				}
				else
				{
					$errColor = "red";
					$errorCode = "Start Date shold be less then End Date.";
				}
			}
			else
			{
				$errColor = "red";
				$errorCode = "Error In Add Tender Details.";
			}
		}
		else
		{
			$errColor = "red";
			$errorCode = "You Dont Have Permission To Access This Page.";
		}
	}
	echo "<meta http-equiv='refresh' content='0;URL=../editTenderDetails?errMsg=".$errorCode."&errColor=".$errColor."'>";
?> 