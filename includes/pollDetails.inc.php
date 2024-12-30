<?php 
    include "../adminPanel/base/publicVariable.php"; 
?>
<form id="vote_form" method="POST" name="vote_form" action="javascript:;">
<?php
	if(isset($_POST["id"]) && $_POST["id"]!="") 
	{
		$id = $_POST["id"];
		$selectPollDetails = mysqli_query($conn,"select * from ".$pollQuestionDetailsTbl." where poll_id='".$id."' and status='1'");
		if(mysqli_num_rows($selectPollDetails)>0)
		{
			$chkAnswerSubmit = mysqli_query($conn,"select * from ".$pollUserAnswerDetailsTbl." where poll_id='".$id."' and ip_address='".$ipAddressUser."'");
			
			$selectNextPollId = mysqli_query($conn,"select poll_id from ".$pollQuestionDetailsTbl." where poll_id>'".$id."' and status='1' order by poll_id asc");
			if(mysqli_num_rows($selectNextPollId)>0)
			{
				$rowNextPollId = mysqli_fetch_array($selectNextPollId);
				$nextPollIdForUser = $rowNextPollId['poll_id'];
			}
			else
			{
				$nextPollIdForUser = 1;
			}

			if(mysqli_num_rows($chkAnswerSubmit)==0)
			{
				$rowPollDetails = mysqli_fetch_array($selectPollDetails);			
?>
	<p class="text-white mb-4"><?php echo $rowPollDetails['question'];?></p>
    <?php 
    	$selectPollAnswerDetails = mysqli_query($conn,"select * from ".$pollAnswerDetailsTbl." where poll_id='".$rowPollDetails['poll_id']."' and status='1'");
    	while($rowPollAnswerDetails = mysqli_fetch_array($selectPollAnswerDetails))
    	{
    ?>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="poll_answer_id" id="<?php echo $rowPollAnswerDetails['poll_answer_id'];?>" value="<?php echo $rowPollAnswerDetails['poll_answer_id'];?>">
        <label class="form-check-label text-white" for="<?php echo $rowPollAnswerDetails['poll_answer_id'];?>"><?php echo $rowPollAnswerDetails['answer'];?></label>
    </div> 
    <?php 
    	}
    ?>
    <input type="hidden" name="poll_details" id="poll_details" value="<?php echo $function->dataEncryption($rowPollDetails['poll_id']."|".$nextPollIdForUser); ?>">
    <div class="mt-2 d-flex gap-2">
        <button class="btn btn-primary px-4 px-xl-5 fw-semibold leap__radius" type="button" onclick="submit_vote('vote_form');">Vote</button>
        <button class="btn btn-primary dark px-4 px-xl-5 fw-semibold leap__radius" type="button" onclick="getPollDetails('<?php echo $nextPollIdForUser;?>');">Skip</button>
    </div> 
<?php
			}
			else
			{
?>
	Vote Already Submitted. <a href="javascript:;" onclick="getPollDetails(<?php echo $rowNextPollId['poll_id']; ?>);">Next</a>
<?php
			}
		}
		else
		{
?>
	No more vote <a href="javascript:;" onclick="getPollDetails(1);">Back</a>
<?php
		}
	}
	else
	{
?>
	Error !! <a href="javascript:;" onclick="getPollDetails(1);">Click Here</a> For Poll/Survey
<?php
	}
?>
</form> 