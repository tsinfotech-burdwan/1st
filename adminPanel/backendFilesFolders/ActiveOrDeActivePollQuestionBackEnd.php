<?php
	ob_start();
	session_start(); 
	include '../base/config.php';
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{ 
		$role = $_POST['role'];
		$valueId = $_POST['valueId'];
		$valueIDAnswer = $_POST['valueId1'];

		if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$valueId))
		{
			echo "<script>alert('Special Character is Available in Value ID');location.href='dashboard';</script>";
		}
		else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$role))
		{
			echo "<script>alert('Special Character is Available in Role');location.href='dashboard';</script>";
		}
		else if(preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$valueIDAnswer))
		{
			echo "<script>alert('Special Character is Available in Value ID Answer');location.href='dashboard';</script>";
		}
		else  
		{
			if($role=="deActive")
			{
				$updateDeActive = mysqli_query($conn,"update ".$pollQuestionDetailsTbl." set status='0' where poll_id='".$valueId."'");
				if($updateDeActive)
				{
					$updateAnswer = mysqli_query($conn,"update ".$pollAnswerDetailsTbl." set status='0' where poll_id='".$valueId."'");
					echo "1";
				}
				else
				{
					echo "2";
				}
			}
			else if($role=="active")
			{
				$updateActive = mysqli_query($conn,"update ".$pollQuestionDetailsTbl." set status='1' where poll_id='".$valueId."'");
				if($updateActive)
				{
					
					$updateAnswer = mysqli_query($conn,"update ".$pollAnswerDetailsTbl." set status='1' where poll_id='".$valueId."'");
					echo "1";
				}
				else
				{
					echo "2";
				}								
			} 
			else if($role=="deActiveAnswer")
			{
				$updateDeActive1 = mysqli_query($conn,"update ".$pollAnswerDetailsTbl." set status='0' where poll_answer_id='".$valueIDAnswer."'");
				if($updateDeActive1)
				{
					echo "1";
				}
				else
				{
					echo "2";
				}		
			}
			else if($role=="activeAnswer")
			{
				$selectPollID = mysqli_query($conn,"select * from ".$pollAnswerDetailsTbl." where poll_answer_id='".$valueIDAnswer."'");
				$rowPollIdDetails = mysqli_fetch_array($selectPollID);
				$selectQuestionStatus = mysqli_query($conn,"select * from ".$pollQuestionDetailsTbl." where poll_id='".$rowPollIdDetails['poll_id']."'");
				$rowPollQuestionDetails =  mysqli_fetch_array($selectQuestionStatus);
				if($rowPollQuestionDetails['status']==1)
				{
					
					$updateActive1 = mysqli_query($conn,"update ".$pollAnswerDetailsTbl." set status='1' where poll_answer_id='".$valueIDAnswer."'");
					if($updateActive1)
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
			else
			{
				echo "4";
			}			
		}	
	}
	else
	{
		echo "5";
	}
?> 