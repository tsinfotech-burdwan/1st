<div class="<?php if(isset($class)){ echo $class; } ?>"> 
    <h2 class="fs-2 ff-heading mb-4 <?php if(isset($class)){ echo 'test-dark'; } else { echo 'text-white '; } ?>">Direct Links</h2>
    <ul class="check__list d-flex flex-column gap-2">
        <?php if (isset($data_type) && $data_type==='department') 
        { 
        ?>  
        <li><a href="about?subject=Calender" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">Municipal Calender</a></li> 
        <li><a href="afs" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">Audite AFS</a></li> 
        <li><a href="unaudited" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">Unaudite AFS</a></li> 
        <li><a href="demand-collection" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">D&C Book</a></li>  
        <?php 
            } 
        else 
            { 
        ?>            
        <li><a href="https://bookingsystem.burdwan-municipality.online/" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">Hall Booking</a></li> 
        <li><a href="https://holdingtax.co.in/Home/Index" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">Online Tax Payment</a></li> 
        <li><a href="tenderlist" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">Tender & Quotation</a></li> 
        <li><a href="afs" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">Audite AFS</a></li> 
        <li><a href="unaudited" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">Unaudite AFS</a></li> 
        <li><a href="demand-collection" class="<?php if(isset($class)){ echo 'test-dark'; } else { echo 'link__white'; } ?>">D&C Book</a></li>    
        <?php 
        } 
        ?>
    </ul>
</div>




 
 
    
    
    
