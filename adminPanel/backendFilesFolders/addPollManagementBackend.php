<?php
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		if(in_array(73,$userPermissionDetails)) 
		{
			$role = $_POST['role'];
			if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$role))
			{
				echo "<script>alert('Special Character is Available in Role');location.href='dashboard';</script>";
			}
			else
			{
				if($role=="addPollDetails")
				{
					$answerDetails = $_POST['answerDetails'];
					if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$answerDetails))
					{
						echo "<script>alert('Special Character is Available in Answer Details');location.href='dashboard';</script>";
					}
					else  
					{
						$baseArray = array("answerDetails"=>$answerDetails);
						if(isset($_SESSION['pollDetailsBurdwanMunicipality']) && $_SESSION['pollDetailsBurdwanMunicipality']!="")
						{
							array_push($_SESSION['pollDetailsBurdwanMunicipality'],$baseArray);
						}
						else
						{
							$_SESSION['pollDetailsBurdwanMunicipality'] = array($baseArray);
						}

						$count = 0;
						$count = sizeof($_SESSION['pollDetailsBurdwanMunicipality']);
						if($count>0 && isset($_SESSION['pollDetailsBurdwanMunicipality']) && $_SESSION['pollDetailsBurdwanMunicipality']!="")
						{
							$arrayValue = $_SESSION['pollDetailsBurdwanMunicipality'];
							$counterVal = 1;
							for($row=0;$row<$count;$row++)
							{
								if($arrayValue[$row]['answerDetails']!="")
								{
									echo "<tr><td>".$counterVal."</td><td>".$arrayValue[$row]['answerDetails']."</td><td><button type='button' value='Remove' class='btn btn-danger btn-sm' onclick='removeRow(".$row.")'><i class='fa fa-trash'></i></button></td></tr>";

									$counterVal++;
								}
							}
						}
					}				
				}
				else if($role=="removeRow") 
				{
					$key = $_POST['rowNumber'];
					$arrayValue = $_SESSION['pollDetailsBurdwanMunicipality'];
					$arrayValue[$key]["answerDetails"] = "";
					$_SESSION['pollDetailsBurdwanMunicipality'] = $arrayValue;
					
					$count = sizeof($_SESSION['pollDetailsBurdwanMunicipality']);
					if($count>0 && isset($_SESSION['pollDetailsBurdwanMunicipality']) && $_SESSION['pollDetailsBurdwanMunicipality']!="")
					{
						$arrayValue = $_SESSION['pollDetailsBurdwanMunicipality'];
						$counterVal = 1;
						for($row=0;$row<$count;$row++)
						{
							if($arrayValue[$row]['answerDetails']!="")
							{
								echo "<tr><td>".$counterVal."</td><td>".$arrayValue[$row]['answerDetails']."</td><td><button type='button' value='Remove' class='btn btn-danger btn-sm' onclick='removeRow(".$row.")'><i class='fa fa-trash'></i></button></td></tr>";

								$counterVal++;
							}
						}
					}
				}
				else if($role=="submitForm")
				{
					$arrayValue = $_SESSION['pollDetailsBurdwanMunicipality'];
					$count = sizeof($_SESSION['pollDetailsBurdwanMunicipality']);					
					$questionDetails = strtoupper($_POST['questionDetails']);
					if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$questionDetails))
					{
						echo "<script>alert('Special Character is Available in Question Details');location.href='dashboard';</script>";
					}
					else
					{
						$insertPollQuestion = mysqli_query($conn,"insert into ".$pollQuestionDetailsTbl." set question='".$questionDetails."',status='0',created_by='".$_SESSION[$counterSessionName]['user_id']."',created_on='".date("Y-m-d H:i:s")."'"); 
						$insertId = mysqli_insert_id($conn);
						if($insertPollQuestion)
						{
							for($row=0;$row<$count;$row++)
							{
								if($arrayValue[$row]['answerDetails']!="")
								{
									$answerDetails = mysqli_real_escape_string($conn,$arrayValue[$row]['answerDetails']);							
									$insertPollAnswer = mysqli_query($conn,"insert into ".$pollAnswerDetailsTbl." set poll_id='".$insertId."',answer='".$answerDetails."',status='0',created_by='".$_SESSION[$counterSessionName]['user_id']."',created_on='".date("Y-m-d H:i:s")."'"); 
								}
							}
							if($insertPollAnswer)
							{
								$_SESSION['pollDetailsBurdwanMunicipality'] = "";
								$errColor = "green";
								$errorCode = "Poll Details Added Successfully.";
								echo "<meta http-equiv='refresh' content='0;URL=../addPollManagement?errMsg=".$errorCode."&errColor=".$errColor."'>";
							}
							else
							{
								$errColor = "red";
								$errorCode = "Error In Poll Details.";
								echo "<meta http-equiv='refresh' content='0;URL=../addPollManagement?errMsg=".$errorCode."&errColor=".$errColor."'>";
							}
						}
						else
						{
							$errColor = "red";
							$errorCode = "Error In Poll Details.";
							echo "<meta http-equiv='refresh' content='0;URL=../addPollManagement?errMsg=".$errorCode."&errColor=".$errColor."'>";
						}
					}					
				}
				else
				{
					$errColor = "red";
					$errorCode = "You Dont Have Permission To Access This Page.";
					echo "<meta http-equiv='refresh' content='0;URL=../addPollManagement?errMsg=".$errorCode."&errColor=".$errColor."'>";
				}
			}
		}
		else
		{
			$errColor = "red";
			$errorCode = "You Dont Have Permission To Access This Page.";
			echo "<meta http-equiv='refresh' content='0;URL=../addPollManagement?errMsg=".$errorCode."&errColor=".$errColor."'>";
		}
	}	
?> 