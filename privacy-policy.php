<?php include_once('includes/url.inc.php'); ?>
<?php include ('./includes/config.inc.php'); ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $base_url;?>assets/images/favicon.ico" type="image/x-icon">
    <title>Privacy Policy</title>

    <!-- All Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
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
                            <span>Privacy Policy</span>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative">
                            <div class="border border-2 border-white position-absolute border__layer"></div>
                            <img src="assets/images/common/History-of-Burdwan-Municipality.jpg" width="746" height="250"
                                alt="Privacy Policy"
                                class="img-fluid subpage__thumbnail w-100 object-fit-cover "
                                style="object-position: center top;">
                        </div>
                    </div>
                </div>
            </div><!--.//container-->
        </header>
        <!-- Header Wrapper End -->


        <!-- Content Wrapper Start -->
        <section class="py-5 cms__content__wrapper">
            <div class="container py-md-5">
                <div class="row g-4"> 
                    <div class="col-lg-7 col-xl-8">
                        <p>Burdwan is quite an old and important town of the state and have strong reference in history with regard to trade and commerce. Bardhaman also called Burdwan, or Barddhaman - a major communications centre located on the banks of the River Damodar.</p>
                        <p>The Municipality of Burdwan was established in the year 1865. At that time the municipal area was 12.8 sq. km. with a population of 39,818. As per 2001 census, the population and the area of Burdwan Municipality are 2,85,602 and 26.30 sq. km. respectively. At present the municipality has 35 wards. Burdwan is the principal town and civil station of the district.</p>
                        <p>Burdwan is quite an old and important town of the state and have strong reference in history with regard to trade and commerce. Bardhaman also called Burdwan, or Barddhaman - a major communications centre located on the banks of the River Damodar.</p>
                        <p>The Municipality of Burdwan was established in the year 1865. At that time the municipal area was 12.8 sq. km. with a population of 39,818. As per 2001 census, the population and the area of Burdwan Municipality are 2,85,602 and 26.30 sq. km. respectively. At present the municipality has 35 wards. Burdwan is the principal town and civil station of the district.</p>
                         
                    </div><!--./col--> 
                     

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
                    
                </div><!--.//row-->


            </div><!--.//container-->
        </section>
        <!-- Content Wrapper End -->


    </main>



    <!-- Footer and Script List -->
    <?php $folder='root'; include_once('includes/footer.inc.php'); ?>
   
</body> 
</html>