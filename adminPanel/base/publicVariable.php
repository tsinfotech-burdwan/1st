<?php
	/* ALL INCLUDE */
	include "databaseConnection.php";
	include "databaseTables.php";
    date_default_timezone_set('Asia/Kolkata');
    include "functionObject.php";
    
	/* ALL PUBLIC VARIABLE */	
	$currentDateTimeConnection = date('Y-m-d H:i:s');
	$ipAddressUser = $function->getClientIpAddress();

	$selectOrganizationDetails = mysqli_query($conn,"select * from ".$masterCounterTbl." where id='1'");
	$rowOrganizationDetails = mysqli_fetch_array($selectOrganizationDetails);
	$counterSessionName = $rowOrganizationDetails['organization_session_name'];
?> 