<div class="p-4 px-md-5 pb-md-5 notice__box ">
    <h2 class="fs-2 ff-heading text-dark mb-4">Notice Board</h2>
    <div class="holder"> 
        <ul class="check__list"  id="ticker01">
            <?php
                $selectTenderList = mysqli_query($conn,"select * from ".$tenderDetailsTbl." where status='1' order by tender_id desc limit 3");
                while($rowTenderDetils = mysqli_fetch_array($selectTenderList))
                {
            ?>
                    <li><a href="../<?php echo $rowTenderDetils['details'];?>" ><?php echo $rowTenderDetils['references_details'] ?></a></li>
            <?php  
                }
            ?> 
            <?php  
                $selectNoticeDetails = mysqli_query($conn,"select * from ".$noticeDetailsTbl." where status='1' order by notice_id desc limit 3");
                while($rowNoticeDetails = mysqli_fetch_array($selectNoticeDetails))
                {
            ?>
                    <li><a href="../<?php echo $rowNoticeDetails['notice_file'];?>" ><?php echo $rowNoticeDetails['notice_title'] ?></a></li>
            <?php 
                }
            ?>                       
        </ul>
    </div>
</div> 