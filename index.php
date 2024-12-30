<?php 
    include './includes/config.inc.php';
    include_once('includes/url.inc.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $base_url;?>assets/images/favicon.ico" type="image/x-icon"> 
    <title><?php echo $rowOrganizationDetails['organization_name'];?></title>
    <?php 
        $folder='root'; 
        include_once('includes/stylesheets.inc.php'); 
    ?> 
</head>
<body> 
    <?php 
        $folder='root'; 
        include_once('includes/header.inc.php'); 
    ?> 
    <main>
        <header class="header__wrapper py-5 text-center text-lg-start">
            <div class="container py-xxl-4 position-relative">
                <div class="slick heroCarousel">
                <?php 
                    $counter = 1;
                    $selectBanner = mysqli_query($conn,"select * from ".$bannerDetailsTbl." where status='1'");
                    $selectBannerCounter = mysqli_num_rows(mysqli_query($conn,"select * from ".$bannerDetailsTbl." where status='1'"));
                    while($rowBanner = mysqli_fetch_array($selectBanner))
                    {
                ?>
                    <div class="slider__item"> 
                        <div class="row g-4 gx-xl-5">
                            <div class="col-lg-6 content__box">
                                <p class="display-4 large ff-heading text-white position-relative ps-4">
                                    <span class="line d-block position-absolute bg-primary start-0 top-50 translate-middle-y"></span> 
                                    <span><?php echo $rowBanner['head_title'];?></span>
                                </p>
                                <p class="text-white"><?php echo $rowBanner['head_details'];?></p>
                            </div>
                            <div class="col-lg-6">
                                <div class="position-relative"> 
                                    <div class="border border-2 border-white position-absolute border__layer"></div>
                                    <img src="assets/images/banner/<?php echo $rowBanner['file_name'];?>" width="624" height="550" alt="<?php echo $rowBanner['head_title'];?>" class="img-fluid thumbnail w-100 object-fit-cover ">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                        $counter++; 
                    }
                ?>                    
                </div><!--slider-->
                <div class="slider slider-nav position-absolute bottom-0 start-0" style="--itemCount: <?php echo $selectBannerCounter;?>">
                <?php 
                    $counter = 1;
                    $selectBanner = mysqli_query($conn,"select * from ".$bannerDetailsTbl." where status='1'");
                    while($rowBanner = mysqli_fetch_array($selectBanner))
                    {
                ?>
                    <div>
                        <div class="position-relative thumb__item"> 
                            <img src="assets/images/banner/<?php echo $rowBanner['file_name'];?>" class="img-fluid thumb w-100 object-fit-cover" loading="lazy" alt="Author Thumbnail"> 
                        </div>
                    </div>
                <?php
                        $counter++; 
                    }
                ?>
                </div>
            </div>
        </header>
        <section class="py-5">
            <div class="container py-lg-5">
                <div class="row g-4 gx-xl-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="position-relative">
                         <?php 
                            $counter1 = 1;
                            $selectChairman = mysqli_query($conn,"select * from ".$chairmanDetailsTbl." where status='1'");
                            while($rowChairman = mysqli_fetch_array($selectChairman))
                            {
                        ?> 
                            <div class="border border-2 border-primary position-absolute w-100 h-100 z-0"
                                style="border-radius: 0 2rem 0 2rem;border-color: var(--brand) !important;left: 2rem;top: -2rem;"
                            ></div>
                            <img 
                                src="assets/images/chairman/<?php echo $rowChairman['file_name'];?>" 
                                width="512" height="525"
                                alt="Town Hall Multiculture Heritage"
                                class="img-fluid position-relative z-1 w-100 object-fit-cover "
                                style="border-radius: 0 2rem 0 2rem;"
                            >
                        <?php
                            $counter1++; 
                            }
                        ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="ps-xxl-5 ps-lg-4"> 
                           <h2 class="fs-1 ff-heading text-dark mb-3 mb-md-4">Chairman Message</h2>
                            <div class="position-relative ps-3 mb-3">
                                <span class="h-75 bg-primary position-absolute start-0 rounded-3 " style="width: 5px;top: 0.625rem;"></span>
                            <?php 
                                $selectChairman1 = mysqli_query($conn,"select * from ".$chairmanDetailsTbl." where status='1'");
                                while($rowChairman1 = mysqli_fetch_array($selectChairman1))
                                {
                            ?>
                                <p class="mb-0 fw-semibold lead"><?php echo $rowChairman1['chairman_name'];?></p>
                            <?php
                                }
                            ?>
                                <p class="mb-0 lead-sm fw-normal">(General Administration, Finance & Resource Mobilization, Planning & Development, Trade License, Other Unallocated Business.)</p>
                            </div>
                            <p> 
                                Welcome to the e-era of Burdwan Municipality. Information Technology (IT) is recognised as an effective tool in catalyzing the administrative activity, in efficient governance. We have, therefore, made significant involvment in it and successfully integrated it with the development process, thereby providing the benefits to our citizens. In India developments have impacted the industrial, education, service and Government sectors and their influence on various applications is increasingly being felt of late. As the era of digital economy is evolving, the concept of governance has assumed significant importance.
                            </p>
                            <div class="collapse" id="contentId">
                                <p class="fw-semibold mb-1">e-Governance has consequently become an accepted methodology involving the use of Information Technology in:</p>
                                <ul class="disc__list mb-3">
                                    <li>Improving transparency</li>
                                    <li>Providing information speedily to all citizens</li>
                                    <li>Improving administration efficiency</li>
                                    <li>Improving public services such as transportation, health, water, security and municipal services.</li>
                                </ul>
                            </div>
                           
                            <button
                                class="btn btn-primary collapsed collapse__btn"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#contentId"
                                aria-expanded="false"
                                aria-controls="contentId"
                                data-visible="Read More"
                                data-invisible="Show Less"
                            >                                 
                            </button>
                             
                        </div>
                    </div>
                </div><!--.//row-->
            </div><!--.//container-->
        </section>
        <!-- Administrator Message Wrapper End -->

        <!-- Tender Wrapper Start -->
        <section class="pt-5 bg-gradient">
            <div class="container pt-4">
                <div class="row g-4 gx-xxl-5">
                    <div class="col-lg-4 col-md-6">
                        <h2 class="fs-2 ff-heading text-white mb-4">Tender & Quotation</h2>
                        <ul class="check__list d-flex flex-column gap-2"> 
                            <?php  
                                $selectTenderList = mysqli_query($conn,"select * from ".$tenderDetailsTbl." where status='1' order by tender_id desc limit 8");
                                while($rowTender = mysqli_fetch_array($selectTenderList)) 
                                {
                            ?>
                            <li><a href="../<?php echo $rowTender['details'];?>" class="link__white"><?php echo $rowTender['references_details'] ?></a></li>
                            <?php 
                                }
                            ?>                            
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6"> 
                        <?php
                            include("includes/bardhaman-poura-utsav.inc.php");
                        ?>  
                    </div>
                    <div class="col-lg-4">
                        <?php
                            include("includes/notice-board.inc.php");
                        ?> 
                    </div>
                </div><!--.//row-->
            </div><!--.//container-->
        </section>
        <section class="py-5 poll__wrapper">
            <div class="container">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-8">
                        <div class="position-relative p-4 p-md-5 content__box">
                            <div class="bg__overlay h-100 bg-primary position-absolute top-0 start-0 z-0" style="border-radius: 2rem 0 2rem 0;"></div>
                            <div class="z-1 position-relative"> 
                                <h2 class="text-white ff-heading mb-3">Notice & Employment-Notice</h2> 
                                <ul class="num__list text-white d-flex flex-column gap-2" start="50">
                                    <?php  
                                        $selectNoticeRecrutmentDetails = mysqli_query($conn,"select * from ".$noticeDetailsTbl." where status='1' and notice_category='recruitment' order by notice_id desc limit 3");
                                        while($rowNoticeRecruDetails = mysqli_fetch_array($selectNoticeRecrutmentDetails)) 
                                        {
                                    ?>
                                    <li><a href="../<?php echo $rowNoticeRecruDetails['notice_file'];?>" class="link__white"><?php echo $rowNoticeRecruDetails['notice_title'] ?></a></li>
                                    <?php 
                                        }
                                        $selectNoticeCitizenDetails = mysqli_query($conn,"select * from ".$noticeDetailsTbl." where status='1' and notice_category='public' order by notice_id desc limit 3");
                                        while($rowNoticeCitizenDetails = mysqli_fetch_array($selectNoticeCitizenDetails))
                                        {
                                    ?>
                                        <li><a href="../<?php echo $rowNoticeCitizenDetails['notice_file'];?>" class="link__white"><?php echo $rowNoticeCitizenDetails['notice_title'] ?></a></li>
                                    <?php   
                                        } 
                                    ?>                                     
                                </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    <?php
                        $data_type = "home";
                        include("includes/poll-survey.inc.php");
                    ?>  
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php 
        $folder='root'; 
        include_once('includes/footer.inc.php'); 
    ?> 
</body>
</html> 