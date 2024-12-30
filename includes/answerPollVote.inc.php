<?php 
    include "../adminPanel/base/publicVariable.php"; 

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER["HTTP_USER_AGENT"];
    $poll_details = $_POST["poll_details"];

    $poll_answer_id = "";
    if(isset($_POST["poll_answer_id"]) && $_POST["poll_answer_id"]!="")
    {
        $poll_answer_id = $_POST["poll_answer_id"];
    }
    $session_id = "";

    $pollDetails = $function->dataDecryption($poll_details);
    $pollDetailsArr = explode("|",$pollDetails);

    if($pollDetailsArr[0]=="") 
    {
        echo "0|";
    }
    else if($poll_answer_id=="")
    {
        echo "2|".$pollDetailsArr[0];
    }
    else if(!preg_match('/^[1-9][0-9]*$/',$poll_answer_id))
    {
        echo "6|".$pollDetailsArr[0];
    }
    else
    {
        $chkPollDetails = mysqli_query($conn,"select * from ".$pollQuestionDetailsTbl." where poll_id='".$pollDetailsArr[0]."' and status='1'");
        if(mysqli_num_rows($chkPollDetails)>0)
        {
            $chkAnswerSubmit = mysqli_query($conn,"select * from ".$pollUserAnswerDetailsTbl." where poll_id='".$pollDetailsArr[0]."' and ip_address='".$ipAddressUser."'");
            if(mysqli_num_rows($chkAnswerSubmit)==0)
            {
                $query = mysqli_query($conn,"insert into ".$pollUserAnswerDetailsTbl." set `poll_id`='".$pollDetailsArr[0]."', `poll_answer_id`='".$poll_answer_id."', `session_id`='".$session_id."', `ip_address`='".$ip_address."', `browser`='".$browser."',date_of_submit='".date("Y-m-d H:i:s")."'");        
                if($query)
                {
                    echo "1|".$pollDetailsArr[1];
                }
                else
                {
                    echo "5|".$pollDetailsArr[0];
                }
            }
            else
            {
                echo "4|".$pollDetailsArr[0];
            }
        }
        else
        {
            echo "3|".$pollDetailsArr[0];
        }
    }  

?>