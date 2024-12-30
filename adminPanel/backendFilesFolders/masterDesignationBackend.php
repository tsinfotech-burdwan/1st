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

		if($role=="designationAdd")
		{
			$selectDepartment = $_POST['selectDepartment'];
			$designationName = strtoupper($_POST['designationName']);
			$designationName = mysqli_real_escape_string($conn,str_replace("~","&",$designationName));
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$designationName))
			{
			  	echo "4";				  
			}
			else
			{
				$numRows = mysqli_query($conn,"select * from ".$masterDesignationTbl." where designation_name='".$designationName."' and department_id='".$selectDepartment."'");
				if(mysqli_num_rows($numRows)==0)
				{
					$insert = mysqli_query($conn,"insert into ".$masterDesignationTbl." set department_id='".$selectDepartment."',designation_name='".$designationName."',status='1'");
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
		else if($role=="designationUpdate")
		{
			$valueId = $function->dataDecryption($_POST['valueId']);
			$selectDepartment = $_POST['selectDepartment'];
			$designationName = strtoupper($_POST['designationName']);
			$designationName = mysqli_real_escape_string($conn,str_replace("~","&",$designationName));
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=+¬]/',$designationName))
			{
			  	echo "4";				  
			}
			else
			{
			$numRows = mysqli_query($conn,"select * from ".$masterDesignationTbl." where department_id='".$selectDepartment."' and designation_name='".$designationName."' and designation_id not in ('".$valueId."')");
				if(mysqli_num_rows($numRows)==0)
				{
					$update = mysqli_query($conn,"update ".$masterDesignationTbl." set department_id='".$selectDepartment."',designation_name='".$designationName."' where designation_id='".$valueId."'");
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