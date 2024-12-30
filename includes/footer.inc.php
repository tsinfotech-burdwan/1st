
    <!-- Footer Wrapper Start --> 
    <footer class="position-relative">
        <a href="<?php echo $base_url;?>" class="d-inline-block bg-white rounded-4 logo position-absolute start-50 translate-middle-x p-3 overflow-hidden transition" 
            aria-label="<?php echo $site_name;?>" title="<?php echo $site_name;?>">
            <img src="<?php echo $base_url;?>assets/images/logo.webp" width="180" height="136" alt="<?php echo $site_name;?>" class="w-auto">
        </a>  
        <div class="container">
            <div class="row g-4 border-bottom pb-4" style="border-color: #83B7A0 !important;">
                <div class="col-lg-4">
                    <p class="text-white">Information(s) and content(s) available on this site are for immediate information purpose only, these cannot be treated as evidence or record.</p> 
                    <?php // $classes="footer"; include('_social-links.inc.php'); ?>
                </div><!--.//col-->
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                            <div class="ps-lg-5">  
                                <ul class="links">
                                    <li class="mb-2"><a href="<?php echo $base_url;?>about?<?php echo $function->dataEncryption('History of Burdwan Municipality'); ?>">About</a></li>
                                    <li class="mb-2"><a href="<?php echo $base_url;?>chairman-in-council">Administrative</a></li>
                                    <li class="mb-2"><a href="<?php echo $base_url;?>schemes?<?php echo $function->dataEncryption('E-Governance'); ?>">Schemes</a></li>   
                                </ul>
                            </div>
                        </div><!--.//col-->
                        <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                            <div class="ps-lg-5">  
                                <ul class="links">
                                    <li class="mb-2"><a href="<?php echo $base_url;?>informations?<?php echo $function->dataEncryption('Building Plan'); ?>">Informations</a></li>
                                    <li class="mb-2"><a href="<?php echo $base_url;?>tenderlist">Salient Features</a></li>
                                    
                                </ul>   
                            </div>
                        </div><!--.//col-->
                        <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                            <div class="ps-lg-5">  
                                <ul class="links">
                                    <li class="mb-2"><a href="<?php echo $base_url;?>employment-notice">Employment Notice</a></li>
                                    <li class="mb-2"><a href="<?php echo $base_url;?>photo-gallery">Gallery</a></li>   
                                </ul>   
                            </div>  
                        </div><!--.//col-->
                        <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                            <div class="ps-lg-5">  
                                <ul class="links">
                                    <li class="mb-2"><a href="<?php echo $base_url;?>terms">Terms of Use</a></li>
                                    <li class="mb-2"><a href="<?php echo $base_url;?>privacy-policy">Privacy Policy</a></li>
                                    <li class="mb-2"><a href="<?php echo $base_url;?>contact">Contact Us</a></li>   
                                </ul>   
                            </div>   
                        </div>
                    </div>
                </div>  
            </div>
            <div class="py-4">
                <div class="d-flex flex-wrap gap-4 justify-content-center ">
                    <img
                        src="<?php echo $base_url;?>/assets/images/common/india-gov.webp"
                        alt="India Government" width="121" height="40"
                    />
                    <img
                        src="<?php echo $base_url;?>/assets/images/common/data-gov.webp"
                        alt="India Government" width="121" height="40"
                    />
                    <img
                        src="<?php echo $base_url;?>/assets/images/common/e-office.webp"
                        alt="India Government" width="121" height="40"
                    />
                    <img
                        src="<?php echo $base_url;?>/assets/images/common/digital-india.webp"
                        alt="India Government" width="121" height="40"
                    />
                </div>
            </div> 
            <div class="p-4 mt-4" style="background-color: #0C2B1D;border-radius: 0 1.5rem 0 1.5rem;"> 
               <p class="mb-0 text-white text-center">Copyright © Burdwan Municipality <?php echo date('Y'); ?>. All Rights Reserved. <br>
                Certified by STQC. | Hosted by NIC.| Developed & Maintained By IT Cell Burdwan Municipality</p>
            </div>
        </div>  
    </footer>
    <button onclick="topFunction()" id="backTop" class="btn backTop justify-content-center align-items-center rounded-circle p-0 bg-primary" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24"><path fill="#292929" d="M11.5 19V6.921l-5.792 5.792L5 12l7-7l7 7l-.708.713L12.5 6.921V19z"/></svg>
    </button> 
    <script src="<?php echo $base_url;?>assets/js/vendors.min.js"></script>  
    <script src="<?php echo $base_url;?>assets/js/slick.min.js"></script> 
    <script src="<?php echo $base_url;?>assets/js/script.js"></script>
    <script type="text/javascript">
        getPollDetails(1);
        function getPollDetails(x)
        {
            $("#pool_section").html("loading...");
            $.ajax({
                url:"includes/pollDetails.inc",
                type:"post",
                data:"id="+x,
                success:function(msg)
                {
                    $("#pool_section").html(msg);
                }
            });
        } 
        function submit_vote(form_id) 
        {
            var data = $("#"+form_id).serialize();
            $("#pool_section").html("loading...");
            $.ajax({
                url:'includes/answerPollVote.inc',
                type:"post",
                data:data,
                success:function(msg)
                {
                    str1=msg;
                    str1=str1.trim();
                    var strArr = str1.split("|");
                    
                    if(!(strArr[0].localeCompare("1")))
                    {
                        $("#pool_section").html('Thank you for vote. <a href="javascript:;" onclick="getPollDetails('+strArr[1]+');">Back</a>');
                    }
                    else if(!(strArr[0].localeCompare("0")))
                    {
                        $("#pool_section").html('Error In Poll Details. <a href="javascript:;" onclick="getPollDetails('+strArr[1]+');">Back</a>');
                    }
                    else if(!(strArr[0].localeCompare("2")))
                    {
                        $("#pool_section").html('Select Option Befor Submit. <a href="javascript:;" onclick="getPollDetails('+strArr[1]+');">Back</a>');
                    }
                    else if(!(strArr[0].localeCompare("3")))
                    {
                        $("#pool_section").html('Poll/Survey Not In List. <a href="javascript:;" onclick="getPollDetails('+strArr[1]+');">Back</a>');
                    }
                    else if(!(strArr[0].localeCompare("4")))
                    {
                        $("#pool_section").html('Vote Already Submitted. <a href="javascript:;" onclick="getPollDetails('+strArr[1]+');">Back</a>');
                    }
                    else if(!(strArr[0].localeCompare("5")))
                    {
                        $("#pool_section").html('Error Please Try Again. <a href="javascript:;" onclick="getPollDetails('+strArr[1]+');">Back</a>');
                    }
                    else if(!(strArr[0].localeCompare("6")))
                    {
                        $("#pool_section").html('Wrong Answer Submitted. <a href="javascript:;" onclick="getPollDetails('+strArr[1]+');">Back</a>');
                    }
                }
            });
        }
    </script>
    <script>
        // Show the modal after 2 seconds
        $(document).ready(function(){
            setTimeout(function(){
                $('#modalPromo').modal('show');
            }, 3000);
        });
    </script>
