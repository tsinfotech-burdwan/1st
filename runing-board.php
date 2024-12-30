<?php include_once('includes/url.inc.php'); ?> 
<?php include ('./includes/config.inc.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $base_url;?>assets/images/favicon.ico" type="image/x-icon">
    <title>Runing Board</title>

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
                            <span
                                class="line d-block position-absolute bg-primary start-0 top-50 translate-middle-y"></span>
                            <span>Runing Board</span>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative">
                            <div class="border border-2 border-white position-absolute border__layer"></div>
                            <img src="assets/images/common/History-of-Burdwan-Municipality.jpg" width="746" height="250"
                                alt="Runing Board" class="img-fluid subpage__thumbnail w-100 object-fit-cover "
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
                <div class="overflow-auto">
                    <table class="table table-striped border" style="min-width: 500px;">
                        <thead>
                            <tr>
                                <!--<th>Picture</th>-->
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Ward No.</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $selectChairmanInCouncil=mysqli_query($conn,"select * from ".$chairmanInCouncilDetailsTbl." where status='1'");
                            while($rowChairmanInCouncil = mysqli_fetch_array( $selectChairmanInCouncil))
                            {
                        ?>
                                <tr>
                                <td><?php echo $rowChairmanInCouncil['name'];?></td>
                                <td><?php echo $rowChairmanInCouncil['designation'];?></td>
                                <td><?php echo $rowChairmanInCouncil['ward_no'];?></td>
                                <td><?php echo $rowChairmanInCouncil['mobile_no'];?></td>
                            </tr>
                         <?php 
                            }
                        ?> 
                        </tbody>
                    </table>
                </div>

            </div><!--.//container-->
        </section>
        <!-- Content Wrapper End -->


    </main>



    <!-- Footer and Script List -->
    <?php $folder='root'; include_once('includes/footer.inc.php'); ?>

</body>

</html>