 
<?php include_once('includes/url.inc.php'); ?> 
<?php include ('./includes/config.inc.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $base_url;?>assets/images/favicon.ico" type="image/x-icon"> 
    <title>Satellite Map</title>
 
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
                            <span>Satellite Map</span>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative"> 
                            <div class="border border-2 border-white position-absolute border__layer"></div>
                            <img 
                                src="assets/images/about/about-header-thumbnail.webp" 
                                width="746" height="250"
                                alt="Satellite Map"
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
                        <iframe class="ratio ratio-16x9" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58654.62445654858!2d87.82504938727241!3d23.246215328264313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f849d1ea7e5efd%3A0x4ce71a0a521f8b0e!2sBardhaman%2C%20West%20Bengal%2C%20India!5e0!3m2!1sen!2sbd!4v1713285489844!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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