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
		$roleId = $function->dataDecryption($_POST['role_id']);
		$moduleIds = $_POST['module_ids'];
		
		$select = mysqli_query($conn,"select * from ".$masterUserPermissionTbl." where designation_id='".$roleId."'");
		if(mysqli_num_rows($select)>0)
		{
			$query = mysqli_query($conn,"delete FROM ".$masterUserPermissionTbl." WHERE designation_id='".$roleId."'");
		}
		foreach($moduleIds as $moduleId)
		{
			$query = mysqli_query($conn,"insert into ".$masterUserPermissionTbl." set module_id='".$moduleId."',designation_id='".$roleId."'");
		}
		
		if($query)
		{
			echo "<meta http-equiv='refresh' content='0;url=../userPermission?errMsg=Update Successfully&role=".$_POST['role_id']."'>";
		}
		else
		{
			echo "<meta http-equiv='refresh' content='0;url=../userPermission?errMsg=Database Error&role=".$_POST['role_id']."'>";
		} 
	}
?>