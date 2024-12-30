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
		$role = $_POST['role'];

		if($role=="chkUserFullName")
		{
			$returnVal = $function->checkUserFullName($_POST['fullNameUser']);
			echo $returnVal;
		}
		else if($role=="chkContactNumber")
		{
			$returnVal = $function->checkUserContactNumber($_POST['contactUser']);
			echo $returnVal;
		}
		else if($role=="chkUserAddress")
		{
			$returnVal = $function->checkUserAddress($_POST['addressUser']);
			echo $returnVal;
		}
		else if($role=="getUserDesignation")
		{
			$departmentUser = $_POST['departmentUser'];

			echo '<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Designation</option>';
			$queryDesignation = mysqli_query($conn,"select * from ".$masterDesignationTbl." where department_id='".$departmentUser."'");
			while ($rowDesignation = mysqli_fetch_array($queryDesignation)) 
			{
				echo '<option value="'.$rowDesignation['designation_id'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$rowDesignation['designation_name'].'</option>';
			}
		}
		else if($role=="addNewUserDetails")
		{
			$fullNameUser = mysqli_real_escape_string($conn,$_POST['fullNameUser']);
			$contactUser = $_POST['contactUser'];
			$addressUser = mysqli_real_escape_string($conn,$_POST['addressUser']);
			$departmentUser = $_POST['departmentUser'];
			$designationUser = $_POST['designationUser'];

			$errorCode = $function->checkUserFullName($fullNameUser);
			if($errorCode==1)
			{
				if(mysqli_num_rows(mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_full_name='".$fullNameUser."'"))==0)
				{
					$errorCode1 = $function->checkUserContactNumber($contactUser);
					if($errorCode1==1)
					{
						if(mysqli_num_rows(mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_contact='".$contactUser."'"))==0)
						{
							$errorCode2 = $function->checkUserAddress($addressUser);
							if($errorCode2==1)
							{
								$username = $function->dataEncryption($contactUser);
								$securityPassword = $function->generateUserDefaultPassword();
								$securityCode = $function->generateUserSecurityCode();
						        $passwordUser = $function->dataEncryption($securityPassword);

								$selectCounter = mysqli_query($conn,"select * from ".$masterCounterTbl." where id='1'");
						        $rowCounter = mysqli_fetch_array($selectCounter);
						        $userCounter = $rowCounter['user_counter'];
						        $userCounter++;
						        $userPrefix = $rowCounter['user_prefix'];

						        $zero="";
								if($userCounter<10){$zero="0000";}
								else if($userCounter<100 && $userCounter>9){$zero="000";}
								else if($userCounter<1000 && $userCounter>99){$zero="00";}
								else if($userCounter<10000 && $userCounter>999){$zero="0";}
								else if($userCounter<100000 && $userCounter>9999){$zero="";} 

								$userIdVal = $userPrefix.$zero.$userCounter;
								$insert1 = mysqli_query($conn,"insert into ".$masterUserDetailsTbl." set user_id='".$userIdVal."',user_full_name='".$fullNameUser."',user_contact='".$contactUser."',user_address='".$addressUser."',department_id='".$departmentUser."',designation_id='".$designationUser."',created_by='".$_SESSION[$counterSessionName]['user_id']."',created_date='".$currentDateTimeConnection."'");
								if($insert1)
								{
									$insert2 = mysqli_query($conn,"insert into ".$masterLoginDetailsTbl." set user_id='".$userIdVal."',user_name='".$username."',password='".$passwordUser."',last_login_date_time='".$currentDateTimeConnection."',last_logout_date_time='".$currentDateTimeConnection."',user_security_code='".$securityCode."'");
									if($insert2) 
									{
										$update = mysqli_query($conn,"update ".$masterCounterTbl." set user_counter='".$userCounter."' where id='1'");
										if($update)
										{
											echo '1';
										}
										else
										{
											echo '11';
										}
									}
									else
									{
										echo '10';
									}
								} 
								else
								{
									echo '9'; 
								}
							} 
							else
							{
								echo $errorCode2;
							}
						}
						else
						{
							echo "5";
						}
					}
					else
					{
						echo $errorCode1;
					}
				}
				else
				{
					echo "3";
				}	
			}
			else
			{
				echo $errorCode;
			}
		} 
		else if($role=="updateUserDetails")
		{
			$userIdVal = $function->dataDecryption($_POST['valueId']);
			$fullNameUser = mysqli_real_escape_string($conn,$_POST['fullNameUser']);
			$contactUser = $_POST['contactUser'];
			$addressUser = mysqli_real_escape_string($conn,$_POST['addressUser']);
			$departmentUser = $_POST['departmentUser'];
			$designationUser = $_POST['designationUser'];
			$username = $function->dataEncryption($contactUser);

			$errorCode = $function->checkUserFullName($fullNameUser); 
			if($errorCode==1)
			{
				if(mysqli_num_rows(mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_full_name='".$fullNameUser."' and user_id not in ('".$userIdVal."')"))==0)
				{
					$errorCode1 = $function->checkUserContactNumber($contactUser);
					if($errorCode1==1)
					{
						if(mysqli_num_rows(mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_contact='".$contactUser."' and user_id not in ('".$userIdVal."')"))==0)
						{
							$errorCode2 = $function->checkUserAddress($addressUser);
							if($errorCode2==1)
							{
								$insert1 = mysqli_query($conn,"update ".$masterUserDetailsTbl." set user_full_name='".$fullNameUser."',user_contact='".$contactUser."',user_address='".$addressUser."',department_id='".$departmentUser."',designation_id='".$designationUser."' where user_id='".$userIdVal."'");
								if($insert1)
								{
									$insert2 = mysqli_query($conn,"update ".$masterLoginDetailsTbl." set user_name='".$username."' where user_id='".$userIdVal."'");
									if($insert2) 
									{
										echo '1';
									}
									else
									{
										echo '10';
									}
								} 
								else
								{
									echo '9'; 
								}
							} 
							else
							{
								echo $errorCode2;
							}
						}
						else
						{
							echo "5";
						}
					}
					else
					{
						echo $errorCode1;
					}
				}
				else
				{
					echo "3";
				}	
			}
			else
			{
				echo $errorCode;
			}
		}
		else
		{
			echo "0";
		}
	}
?> 