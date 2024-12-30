<?php include './includes/config.inc.php';
    include_once('includes/url.inc.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $base_url;?>assets/images/favicon.ico" type="image/x-icon"> 
    <title>Departmental Man Power</title>
 
    <!-- All Stylesheets -->
    <?php $folder='root'; include_once('includes/stylesheets.inc.php'); ?> 
</head>
<body> 

    <!-- Navigation Menu --> 
    <?php $folder='root'; include_once('includes/header.inc.php'); ?> 

    <main>

        <!-- Header Wrapper Start -->
        <header class="header__wrapper pt-5 pb-4 text-center text-lg-start">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-5">
                        <h1 class="display-6 large ff-heading text-white position-relative ps-4">
                            <span class="line d-block position-absolute bg-primary start-0 top-50 translate-middle-y"></span> 
                            <span>Departmental Man Power</span>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative"> 
                            <!--<div class="border border-2 border-white position-absolute border__layer"></div>
                            <img 
                                src="assets/images/common/Departmental-Man-Power-thumbnail.webp" 
                                width="746" height="250"
                                alt="Departmental Man Power"
                                class="img-fluid subpage__thumbnail w-100 object-fit-cover "
                                style="object-position: center top;"
                            >-->
                        </div>
                    </div>
                </div>
            </div><!--.//container-->
        </header>
        <!-- Header Wrapper End -->


        <!-- Content Wrapper Start -->
        <section class="py-5 cms__content__wrapper">
            <div class="container py-lg-4">
                <div class="row g-4 gx-xxl-5">
                    <div class="col-lg-7 col-xl-8">
                        
                        <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4">
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/account.svg" 
                                            width="102" height="102"
                                            alt="Accounts"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=Accounts">Accounts</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/Assessment.svg" 
                                            width="102" height="102"
                                            alt="Assessment"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=Assessment">Assessment</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="BG GHAT"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=BG GHAT">BG GHAT</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="General"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=SWM">SWM</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="General"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=WATER Department">WATER Department</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="General"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=STORE">STORE</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="General"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=SINGLE Window And RECIVING Section">SINGLE Window And RECIVING Section</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="General"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=TAX">TAX</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="General"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=PWD And Building PLAN">PWD And Building PLAN</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="General"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=Project And Welfare">Project And Welfare </a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="License"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=License">License</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/BG-GHAT.svg" 
                                            width="102" height="102"
                                            alt="NULM"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=NULM">NULM</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/Cash.svg" 
                                            width="102" height="102"
                                            alt="Cash"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=Cash">Cash</a>
                                    </h2>
                                </div>
                            </div>
                           <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/Health.svg" 
                                            width="102" height="102"
                                            alt="Health"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=Health">Health</a>
                                    </h2>
                                </div>
                            </div>
                           <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/ipp-viii-extn.svg" 
                                            width="102" height="102"
                                            alt="ipp-viii-extn"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=ELECTRICAL">ELECTRICAL</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/Law.svg" 
                                            width="102" height="102"
                                            alt="Law"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=Law">Law</a>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <div class="department__card  text-center">
                                    <figure class="icon__box p-4 transition"> 
                                        <img 
                                            src="assets/images/icons/IT-Cell.svg" 
                                            width="102" height="102"
                                            alt="IT Cell"
                                            class="img-fluid rounded-0" 
                                        >
                                    </figure>
                                    <h2 class="title fw-normal mt-3">
                                        <a href="department-details?subject=IT Cell">IT Cell</a>
                                    </h2>
                                </div>
                            </div>
                        </div><!--.//row-->
 
                    </div><!--.//col-->


                    <div class="col-lg-5 col-xl-4">

                        <?php
                            $class="notice__box p-4 p-lg-5";
                            $data_type="department";
                            include("includes/direct-links.inc.php");
                        ?> 

                        <div class="mt-4">
                            <?php
                                $data_type="department";
                                include("includes/poll-survey.inc.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div><!--.//container-->
        </section>
        <!-- Content Wrapper End -->
 

    </main>



    <!-- Footer and Script List --> 
    <?php $folder='root'; include_once('includes/footer.inc.php'); ?> 
 
</body>
</html>