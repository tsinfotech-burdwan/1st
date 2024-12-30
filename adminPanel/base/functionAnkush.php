<?php 
	class commonFunctionAnkush
	{
		public $dbhost;
		public $dbuser;
		public $dbpass;
		public $dbname;

		function __construct($dbhost,$dbuser,$dbpass,$dbname)
		{
			$this->dbhost = $dbhost;
			$this->dbuser = $dbuser;
			$this->dbpass = $dbpass;
			$this->dbname = $dbname;
		}
		/* DATABASE CONNECTION START */
		function databaseConnection()
		{
			$connection = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			return $connection;
		}
		/* DATABASE CONNECTION END */

		/* PASSWORD ENCRYPTION FUNCTION START */
		function dataEncryption($value)
		{
			$plaintext = base64_encode($value);
			$firstEncode = urlencode($plaintext);
			$secondEncode = base64_encode($firstEncode);
			
			return $secondEncode;
		}
		/* PASSWORD ENCRYPTION FUNCTION END */
		
		/* PASSWORD DECRYPTION FUNCTION START */
		function dataDecryption($value)
		{
			$firstDecode = base64_decode($value);
			$secondDecode = urldecode($firstDecode);
			$decode = base64_decode($secondDecode);
			
			return $decode;
		} 
		/* PASSWORD DECRYPTION FUNCTION END */
		
		/* IMAGE RESIZE FUNCTION START */
		function imageResize($target,$newcopy,$w,$h,$ext)
		{
			list($w_orig, $h_orig) = getimagesize($target);
			$scale_ratio = $w_orig / $h_orig;
			$img = "";
			$ext = strtolower($ext);
			if ($ext == "gif")
			{ 
			  $img = imagecreatefromgif($target);
			}
			else if($ext =="png")
			{ 
			  $img = imagecreatefrompng($target);
			}
			else
			{ 
			  $img = imagecreatefromjpeg($target);
			}
			$tci = imagecreatetruecolor($w, $h);
			imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
			imagejpeg($tci, $newcopy, 90);
		}
		/* IMAGE RESIZE FUNCTION END */

		/* GET USER IP START */
		function getClientIpAddress() 
		{
		    $ipaddress = '';
		    if (getenv('HTTP_CLIENT_IP'))
		    {
		        $ipaddress = getenv('HTTP_CLIENT_IP');
		    }
		    else if(getenv('HTTP_X_FORWARDED_FOR'))
		    {
		        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		    }
		    else if(getenv('HTTP_X_FORWARDED'))
		    {
		        $ipaddress = getenv('HTTP_X_FORWARDED');
		    }
		    else if(getenv('HTTP_FORWARDED_FOR'))
		    {
		        $ipaddress = getenv('HTTP_FORWARDED_FOR'); 
		    }
		    else if(getenv('HTTP_FORWARDED'))
		    {
		       $ipaddress = getenv('HTTP_FORWARDED'); 
		    }
		    else if(getenv('REMOTE_ADDR'))
		    {
		        $ipaddress = getenv('REMOTE_ADDR'); 
		    }
		    else
		    {
		        $ipaddress = 'UNKNOWN';
		    }
		    return $ipaddress;
		}
		/* GET USER IP END*/

		/* GENERATE USER SECURITY CODE START */ 
		function generateUserDefaultPassword()
		{
			$characters = "0123456789ABCDEFGH9882323abcdefghijklIJKLMN!@#$%^&*9044OPQRSTUVWXYZ()_+=-*/mnopqrstuvwxyz";
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < 8; $i++) 
		    {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
		function generateUserSecurityCode()
		{
			$characters = "0123456789";
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < 6; $i++) 
		    {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
		/* GENERATE USER SECURITY CODE END */ 

		/* USER PROFILE UPDATE START */
		function checkUserFullName($userFullName)
		{
			$conn = $this->databaseConnection();

			$userFullName = strtoupper($userFullName);
			$userFullName = mysqli_real_escape_string($conn,$userFullName);

			/*if($userId==0)
			{
				$selectUserFullName = mysqli_query($conn,"select * from ".$GLOBALS['masterUserDetailsTbl']." where user_full_name='".$userFullName."'");
			}
			else
			{
				$selectUserFullName = mysqli_query($conn,"select * from ".$GLOBALS['masterUserDetailsTbl']." where user_full_name='".$userFullName."' and user_id not in ('".$userId."')");
			}*/

			if(strlen($userFullName)<6)
			{
				return 2;
			}
			/*else if(mysqli_num_rows($selectUserFullName)>0)
			{
				return 3;
			}*/
			else if(preg_match('/[^a-zA-Z ]/',$userFullName)>0)
			{
				return 4;
			}
			else
			{
				return 1;
			}
		} 

		function checkUserContactNumber($userContactNumber)
		{
			$conn = $this->databaseConnection();

			/*if($userId==0)
			{
				$selectUserContactNumber = mysqli_query($conn,"select * from ".$GLOBALS['masterUserDetailsTbl']." where user_contact='".$userContactNumber."'");
			}
			else
			{
				$selectUserContactNumber = mysqli_query($conn,"select * from ".$GLOBALS['masterUserDetailsTbl']." where user_contact='".$userContactNumber."' and user_id not in ('".$userId."')");
			}*/

			/*if(mysqli_num_rows($selectUserContactNumber)>0)
			{
				return 5;
			}
			else */
			if(preg_match('/[^0-9]/',$userContactNumber)>0)
			{
				return 6;
			}
			else if(strlen($userContactNumber)!=10)
			{
				return 7;
			}
			else
			{
				return 1;
			}
		}

		function checkUserAddress($userAddress)
		{
			if(preg_match('/[^a-zA-Z0-9-., ]/',$userAddress)>0)
			{
				return 8;
			}
			else
			{
				return 1;
			}
		}

		function uploadFileChecking($uploadFileName,$uploadFileTmpName)
		{
			$uploadFileInfo = getimagesize($uploadFileTmpName);

			if(isset($uploadFileInfo))
			{
				if($uploadFileInfo['mime']!="image/jpg" && $uploadFileInfo['mime']!="image/png" && $uploadFileInfo['mime']!="image/jpeg")
				{
					return 9;
				}
				else
				{
					return 1;
				}
			}
			else
			{
				return 10;
			}
		} 

		function uploadPDFFileChecking($uploadFileTmpName)
		{
			
			$mimeType = mime_content_type($uploadFileTmpName);
			if($mimeType=="application/pdf")
			{
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
    			$contentMime = finfo_file($finfo,$uploadFileTmpName);

				if($contentMime=="application/pdf")
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 0;
			}
		}

		function userPasswordChecking($userPassword)
		{
			if(strlen($userPassword)<=6) 
		    {
		        return 11;
		    }
		    else if(!preg_match("#[0-9]+#",$userPassword)) 
		    {
		        return 12;
		    }
		    else if(!preg_match("#[A-Z]+#",$userPassword)) 
		    {
		        return 13;
		    }
		    else if(!preg_match("#[a-z]+#",$userPassword)) 
		    {
		        return 14;
		    }
		    else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $userPassword)) 
		    {
		        return 15;
		    }
		    else
		    {
		    	return 1;
		    }
		}
		/* USER PROFILE UPDATE END */
	}
?> 