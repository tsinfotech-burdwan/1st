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

		if($role=="departmentAdd")
		{
			$departmentName = strtoupper($_POST['departmentName']);
			$departmentName = mysqli_real_escape_string($conn,str_replace("~","&",$departmentName));
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$departmentName))
			{
				echo "4";
			}
			else
			{
				$numRows = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_name='".$departmentName."'");
				if(mysqli_num_rows($numRows)==0)
				{
					$insert = mysqli_query($conn,"insert into ".$masterDepartmentTbl." set department_name='".$departmentName."',status='1'");
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
		} 
		else if($role=="editDepartment")
		{
			$valueId = $function->dataDecryption($_POST['valueId']);
			$departmentName = strtoupper($_POST['departmentName']);
			$departmentName = mysqli_real_escape_string($conn,str_replace("~","&",$departmentName));

			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$departmentName))
			{
				echo "4";
			}
			else
			{
				$numRows = mysqli_query($conn,"select * from ".$masterDepartmentTbl." where department_name='".$departmentName."' and department_id not in ('".$valueId."')");
				if(mysqli_num_rows($numRows)==0)
				{
					$update = mysqli_query($conn,"update ".$masterDepartmentTbl." set department_name='".$departmentName."' where department_id='".$valueId."'");
					if($update)
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
		}
		else
		{
			echo "0";
		}
	}
?>