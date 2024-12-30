<?php include './includes/config.inc.php';
    include_once('includes/url.inc.php'); ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $base_url;?>assets/images/favicon.ico" type="image/x-icon">
    <title>Audited-AFS Financial Statements</title>

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
                            <span>Audited-AFS Financial Statements</span>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative">
                            <div class="border border-2 border-white position-absolute border__layer"></div>
                            <img src="assets/images/common/History-of-Burdwan-Municipality.jpg" width="746" height="250"
                                alt="Audited-AFS Financial Statements"
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
                <div class="overflow-auto">
                    <table class="table table-striped border" style="min-width: 800px;">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Financial Statements</th>
                                <th>Financial Year</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $counter=1;
                                $selectFinancialStatement = mysqli_query($conn,"select * from ".$financialStatementDetailsTbl." where title='Audit' and status='1' order by financial_year desc");
                                while($rowFinancialStatement=mysqli_fetch_array($selectFinancialStatement))
                                {
                            ?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $rowFinancialStatement['financial_statements']; ?></td>
                                    <td><?php echo $rowFinancialStatement['financial_year']; ?></td>
                                    <td><a href="../<?php echo $rowFinancialStatement['file_details']; ?>"
                                            class="dwLink" target="_blank">Click Here</a></td>
                                </tr>
                            <?php 
                                $counter++;
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