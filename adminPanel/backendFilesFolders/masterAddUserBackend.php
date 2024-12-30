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

		if($role=="chkContactNumber")
		{
			$contactUser = $_POST['contactUser'];
			if(mysqli_num_rows(mysqli_query($conn,"select * from ".$masterUserDetailsTbl." where user_contact='".$contactUser."'"))>0)
			{
				echo "1";
			}
			else
			{
				echo "2";
			}
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
			$addressUser = mysqli_real_escape_string($conn,str_replace("~","&",$_POST['addressUser']));
			$departmentUser = $_POST['departmentUser'];
			$designationUser = $_POST['designationUser'];

			$username = $function->dataEncryption($contactUser);
	        $passwordUser = $function->dataEncryption("123456");

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
				$insert2 = mysqli_query($conn,"insert into ".$masterLoginDetailsTbl." set user_id='".$userIdVal."',user_name='".$username."',password='".$passwordUser."',last_login_date_time='".$currentDateTimeConnection."',last_logout_date_time='".$currentDateTimeConnection."'");
				if($insert2) 
				{
					$update = mysqli_query($conn,"update ".$masterCounterTbl." set user_counter='".$userCounter."' where id='1'");
					if($update)
					{
						echo '1';
					}
					else
					{
						echo '2';
					}
				}
				else
				{
					echo '3';
				}
			} 
			else
			{
				echo '4'; 
			}
		}
		else if($role=="updateUserDetails")
		{
			
		}
		else
		{
			echo "0";
		}
	}
?>