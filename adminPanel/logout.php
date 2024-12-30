<?php
	session_start();
	include "databaseConnection.php";
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		$update = mysqli_query($conn,"update ".$masterLoginDetailsTbl." set last_logout_date_time='".$currentDateTimeConnection."' where user_id='".$_SESSION[$counterSessionName]['user_id']."'");
		$_SESSION[$counterSessionName] = "";
		session_destroy();
		echo "<meta http-equiv='refresh' content='0;URL=index'>";
	}
	else
	{
		session_destroy();		
		echo "<meta http-equiv='refresh' content='0;URL=index'>";
	}
?>  