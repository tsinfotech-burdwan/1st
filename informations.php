<?php 
    include ('./includes/config.inc.php'); 
    include_once('includes/url.inc.php');

    $urls =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $urlArray = explode("/", $urls);
    $pagename = @end(explode("?", $urls));
    if(preg_match("/[\'^£$%&*()}{@#~><>,;|_+¬-]/", $pagename)==0) 
    {
        $decode = $function->dataDecryption($pagename);
        $selectAbout = mysqli_query($conn,"select * from ".$pageDetailsTbl." where page_title='".$decode."'");
        if(mysqli_num_rows($selectAbout)>0)
        {
            $rowAbout = mysqli_fetch_array($selectAbout);     
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $base_url;?>assets/images/favicon.ico" type="image/x-icon"> 
    <title>Burdwan Municipalty | <?php echo $rowAbout['page_title'];?></title>
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
                            <span><?php echo $decode; ?></span>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative"> 
                            <div class="border border-2 border-white position-absolute border__layer"></div>
                            <img 
                                src="assets/images/common/E-Governance.webp" 
                                width="746" height="250"
                                alt="E-Governance"
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
                        <?php if ($rowAbout['page_title'] === 'Building Plan') { ?>
                        <p class="p-3 border-start border-4 mb-4 mb-md-5" style="background-color: rgba(38, 240, 150, 0.2);border-color: var(--brand) !important;">
                            The Building Plan Department of Burdwan Municipality is another section in the Engineering section. The procedure to submit the document is the respective section in our Municipality office.
                        </p>
                        <h2 class="fs-3">The document needed in time of submitting the Building plan are:</h2>
                        <ul>
                            <li>1. One attested copy (xerox) of the Parcha of C. S. R. S. L. R.</li>
                            <li>2. One attested copy (xerox) of the registered deed.</li>
                            <li>3. One attested copy (xerox) of mutation certificate.</li>
                            <li>4. One attested copy (xerox) of present Municipality tax invoice.</li>
                            <li>5. Four copies of building plan.</li>
                            <li>6. Four copies of site plan.</li>
                            <li>7. One copy of Calculation Sheet.</li>
                            <li>8. In case of Additional Construction, one copy of Structural Certificate. (Above two stories).</li>
                            <li>9. In case of demolition one copy of Declaration in Non-judicial stamp paper of Rs. 10 must be submitted.</li>
                        </ul>

                        
                        <h2 class="mt-5 fs-3">The document needed in time of submitting the Building plan are:</h2>
                        <ul>
                            <li>1. Soil Test Report from Government Registered Firm.</li>
                            <li>2. Safe Design Certificate from Structural Engineer.</li>
                            <li>3. Original copy of the No Objection Certificate issued by Fire Brigade must be produced and submitted upon request.</li>
                            <li>4. Rules implied by the government must be followed strictly in case of Apartment.</li>
                            <li>5. The paper of the agreement between the Lord and the Developer must be submitted with the commercial and rental houses.</li>
                        </ul>

                        <h2 class="mt-5 fs-3">NB.</h2>
                        <p>Time for applying for Building Plan is everyday between 14:30 PM to 15:30 PM (except holidays). It should be assured not to use polythene below 40 micron.Fare of Road Roller is INR. 610 per day.</p>

                        <p><strong>Pooja Permission Fee will depend upon the volume and budget of the Pooja.</strong></p>
 
                        <?php } else if($rowAbout['page_title'] === 'Death And Birth Registrations') { ?>
                            <p class="fs-3">Information required for obtaining the birth and death certificate are:</p>
                            <ul>
                                <li>1. Filling up the specified forms.</li>
                                <li>2. In case of the Birth Certificate the discharge certificate from the hospital/nursing home must be produced.</li>
                                <li>3. To collect the Death Certificate in case of funeral in soil or burn in the village certificate must be brought from the Chief of the Village. If it is the Municipality area then Certificate must be brought from the Municipality with the names of parents.</li> 
                                <li>4. If the area is under Burdwan Municipality then the Certificate from the Municipality must be collected.</li>
                                <li>5. Original Death Certificate must be brought with.</li>
                                <li>6. If the Chief does not mention the name of mother in that case the voter card or the ration card of mother must be brought.</li>
                            </ul>
                        <?php }
                        else 
                        {
                           echo "<meta http-equiv='refresh' content='0;URL=".$base_url."'>";                        
                        } 
                        ?>
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
<?php 
        }
        else
        {
            echo "<meta http-equiv='refresh' content='0;URL=".$base_url."'>";
        }
    }
    else
    {
        echo "<meta http-equiv='refresh' content='0;URL=".$base_url."'>";
    }
?>