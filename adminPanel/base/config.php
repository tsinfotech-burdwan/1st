<?php
    include "publicVariable.php";

	/* AFTER SESSION START */
    $selectUserPermissionDetails = mysqli_query($conn,"select * from ".$masterUserPermissionTbl." where designation_id='".$_SESSION[$counterSessionName]['designation_id']."'");
    $userPermissionDetails = array();
    if(mysqli_num_rows($selectUserPermissionDetails)>0)
    {
        while($rowUserPermissionDetails = mysqli_fetch_object($selectUserPermissionDetails))
        {   
            array_push($userPermissionDetails, $rowUserPermissionDetails->module_id);
        }
    }
?>