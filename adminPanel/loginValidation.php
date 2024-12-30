<?php  
	session_start(); 
	include "base/publicVariable.php";

	$contactNumber = $_POST['contactNumber'];
	$password = $_POST['password']; 
	$captchaCode = $_POST['captchaCode']; 

	if(preg_match('/^[0-9]{10}+$/',$contactNumber))
	{
		$selectContact = mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_contact='".$contactNumber."'");
		if(mysqli_num_rows($selectContact)>0)
		{
			$rowUserDetails = mysqli_fetch_array($selectContact);

			$captchaCodeArr = explode("|",$captchaCode);
			$captchaCodeDetailsArr = explode("~",$function->dataDecryption($captchaCodeArr[1]));

			if($captchaCodeDetailsArr[0]==$_SESSION["bm_captcha_code_with_passkey"])
			{
				$selectUserLoginDetails = mysqli_query($conn,"select * from ".$masterLoginDetailsTbl." where user_id='".$rowUserDetails['user_id']."' and user_security_code='".$captchaCodeDetailsArr[1]."'");
				if(mysqli_num_rows($selectUserLoginDetails)>0)
				{
					if($rowUserDetails['status']==1)
					{
						$rowUserLoginDetails = mysqli_fetch_array($selectUserLoginDetails);

						if($rowUserLoginDetails['status']==1)
						{
							if($rowUserLoginDetails['initial_login_status']==1)
							{
								$username = $function->dataEncryption($contactNumber);
								$password = $function->dataEncryption($password);

								$selectUserLoginDetails1 = mysqli_query($conn,"select * from ".$masterLoginDetailsTbl." where user_name='".$username."' and password='".$captchaCodeArr[0]."'");
								if(mysqli_num_rows($selectUserLoginDetails1)>0) 
								{
									$_SESSION[$counterSessionName] = array();
									$_SESSION[$counterSessionName]['user_id'] = $rowUserDetails['user_id'];
									$_SESSION[$counterSessionName]['user_full_name'] = $rowUserDetails['user_full_name'];
									$_SESSION[$counterSessionName]['user_contact'] = $rowUserDetails['user_contact'];
									$_SESSION[$counterSessionName]['department_id'] = $rowUserDetails['department_id']; 
									$_SESSION[$counterSessionName]['designation_id'] = $rowUserDetails['designation_id']; 
									if(isset($_POST['rememberMeOption']))
									{
										setcookie($rowOrganizationDetails['cookie_user_name'],$rowUserDetails['user_contact'], time() + (86400 * 30), "/");
										setcookie($rowOrganizationDetails['cookie_user_password'],$_POST['password'], time() + (86400 * 30), "/");
									}
									else
									{
										setcookie($rowOrganizationDetails['cookie_user_name'],"", time() - (86400 * 30), "/");
										setcookie($rowOrganizationDetails['cookie_user_password'],"", time() - (86400 * 30), "/");
									}

									$update = mysqli_query($conn,"update ".$masterLoginDetailsTbl." set last_login_date_time='".$currentDateTimeConnection."' where user_id='".$rowUserDetails['user_id']."'");
									echo "<meta http-equiv='refresh' content='0;URL=dashboard'>";
								}
								else
								{
									echo "<meta http-equiv='refresh' content='0;URL=index?errMsg=Please Enter Correct Password.'>";
								}
							}
							else 
							{
								$username = $function->dataEncryption($contactNumber);
								$password = $function->dataEncryption($password);

								$selectUserLoginDetails1 = mysqli_query($conn,"select * from ".$masterLoginDetailsTbl." where user_name='".$username."' and password='".$password."'");
								if(mysqli_num_rows($selectUserLoginDetails1)>0)
								{
									$_SESSION[$counterSessionName] = array();
									$_SESSION[$counterSessionName]['user_id'] = $rowUserDetails['user_id'];
									$_SESSION[$counterSessionName]['user_full_name'] = $rowUserDetails['user_full_name'];
									$_SESSION[$counterSessionName]['user_contact'] = $rowUserDetails['user_contact'];
									$_SESSION[$counterSessionName]['designation_id'] = $rowUserDetails['designation_id']; 
									setcookie($rowOrganizationDetails['cookie_user_name'],"", time() - (86400 * 30), "/");
									setcookie($rowOrganizationDetails['cookie_user_password'],"", time() - (86400 * 30), "/");

									$update = mysqli_query($conn,"update ".$masterLoginDetailsTbl." set last_login_date_time='".$currentDateTimeConnection."' where user_id='".$rowUserDetails['user_id']."'");
									echo "<meta http-equiv='refresh' content='0;URL=updatePassword'>";
								}
							}
						}
						else
						{
							echo "<meta http-equiv='refresh' content='0;URL=index?errMsg=User Login Is Inactive.'>";
						}
					}
					else
					{
						echo "<meta http-equiv='refresh' content='0;URL=index?errMsg=User Account Is Inactive.'>";
					}
				}
				else
				{
					echo "<meta http-equiv='refresh' content='0;URL=index?errMsg=Wrong User Code.'>";
				}
			}
			else
			{
				echo "<meta http-equiv='refresh' content='0;URL=index?errMsg=Wrong Captcha Code.'>";
			}
		}
		else
		{
			echo "<meta http-equiv='refresh' content='0;URL=index?errMsg=Contact Number Not Registered.'>";
		}
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;URL=index?errMsg=Invalid Contact Number.'>"; 
	}	
?>