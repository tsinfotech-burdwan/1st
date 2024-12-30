<?php 
	session_start(); 
	include "../base/publicVariable.php";

	$password = $_POST['password']; 
	$captchaCode = $_POST['captchaCode'];

	$password = $function->dataEncryption($password);
	$captchaCode = $function->dataEncryption($captchaCode);
	echo $password."|".$captchaCode;
?> 