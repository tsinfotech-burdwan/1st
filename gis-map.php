 
<?php 
include_once('includes/url.inc.php');  
include './includes/config.inc.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $base_url;?>assets/images/favicon.ico" type="image/x-icon"> 
    <title>GIS Map</title>
 
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
                            <span>GIS Map</span>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative"> 
                            <div class="border border-2 border-white position-absolute border__layer"></div>
                            <img 
                                src="assets/images/about/about-header-thumbnail.webp" 
                                width="746" height="250"
                                alt="GIS Map"
                                class="img-fluid subpage__thumbnail w-100 object-fit-cover "
                                style="object-position: center top;"
                            >
                        </div>
                    </div>
                </div>
            </div><!--.//container-->
        </header>
        <!-- Header Wrapper End -->


        <!-- Content Wrapper Start -->
        <section class="py-5 cms__content__wrapper">
            <div class="container py-md-5">
                <div class="row g-4 gx-xxl-5">
                    <div class="col-lg-7 col-xl-8">
                        <img 
                            src="assets/images/common/gis-map.webp" 
                            width="848" height="691"
                            alt="GIS Map"
                            class="img-fluid w-100 object-fit-cover " 
                        >
                    </div>

                    <div class="col-lg-5 col-xl-4">
                        <?php
                            $class="side__notice__wrapper";
                            include("includes/notice-board.inc.php");
                        ?> 

                        <?php
                            $class="side__notice__wrapper";
                            include("includes/bardhaman-poura-utsav.inc.php");
                        ?>

                        <?php
                            $class="notice__box p-4 p-lg-5 mt-4";
                            include("includes/direct-links.inc.php");
                        ?> 

                        <div class="mt-4">
                            <?php
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