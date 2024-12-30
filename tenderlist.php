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
    <title>Tenders & Bids</title>

    <!-- All Stylesheets -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css"> 
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
                        <h1 class="display-5 ff-heading text-white position-relative ps-4">
                            <span
                                class="line d-block position-absolute bg-primary start-0 top-50 translate-middle-y"></span>
                            <span>Tenders & Bids</span>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative">
                            <div class="border border-2 border-white position-absolute border__layer"></div>
                            <img src="assets/images/common/Tenders-Bids.jpg" width="746" height="250"
                                alt="Tenders & Bids" class="img-fluid subpage__thumbnail w-100 object-fit-cover ">
                        </div>
                    </div>
                </div>
            </div><!--.//container-->
        </header>
        <!-- Header Wrapper End -->


        <!-- Content Wrapper Start -->
        <section class="py-5 cms__content__wrapper">
            <div class="container py-md-5">
                <!-- Nav tabs -->
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5 active" id="normalTender-tab" data-bs-toggle="tab"
                            data-bs-target="#normalTender" type="button" role="tab" aria-controls="normalTender"
                            aria-selected="true">
                            Normal Tender
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="eTender-tab" data-bs-toggle="tab" data-bs-target="#eTender"
                            type="button" role="tab" aria-controls="eTender" aria-selected="false">
                            E-Tender
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fs-5" id="corrigendum-tab" data-bs-toggle="tab" data-bs-target="#corrigendum"
                            type="button" role="tab" aria-controls="corrigendum" aria-selected="false">
                            Corrigendum
                        </button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="normalTender" role="tabpanel" aria-labelledby="normalTender-tab">
                        <div class="overflow-auto ">
                            <table class="table large__table table-striped dataTable" style="min-width: 1000px;">
                                <thead>
                                    <tr>

                                        <th>Tender/Bid/EOI References & Other Details</th>                                       

                                        <th><span class="d-inline-block" style="min-width: 6rem;">Estimated Value (In
                                                Rs.)</span></th>

                                        <th>Bid Start Date</th>

                                        <th>Bid End Date</th>

                                        <th>Bid Opening Date</th>

                                        <th>Details</th>

                                        <th>Bid Sumition Location</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $selectTenderDetails = mysqli_query($conn,"select * from ".$tenderDetailsTbl." where status='y' and tender_type='Normal Tender' order by tender_id desc"); 
                                        while($rowTenderDetails = mysqli_fetch_array($selectTenderDetails)) 
                                        {                                              
                                    ?>
                                    <tr>
                                        <td><?php echo $rowTenderDetails['references_details'];?></td>
                                        <td><?php echo $rowTenderDetails['value'];?></td>
                                        <td><?php echo $rowTenderDetails['start_date'];?></td>
                                        <td><?php echo $rowTenderDetails['last_date'];?></td>
                                        <td><?php echo $rowTenderDetails['due_date_open'];?></td>
                                        <td><a href="../<?php echo $rowTenderDetails['details'];?>" target="_blank">View Details</a></td>
                                        <td><a>At Burdwan Municipality</a></td>
                                    </tr>
                                    <?php
                                        }   
                                    ?>                                    
                                </tbody>
                            </table>
                        </div>
                    </div><!--.//normalTender-->
                    <div class="tab-pane" id="eTender" role="tabpanel" aria-labelledby="eTender-tab">
                        <div class="overflow-auto ">
                            <table class="table large__table table-striped dataTable" style="min-width: 1000px;">
                                <thead>
                                    <tr>

                                        <th>Tender/Bid/EOI References & other Details</th>

                                        
                                        <th>Estimated Value (In Rs.)</th>

                                        <th>Bid Start Date</th>

                                        <th>Bid End Date</th>

                                        <th>Bid Opening Date</th>

                                        <th>Details</th>

                                        <th>Bid Sumition</th>

                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        $selectTenderDetails1 = mysqli_query($conn,"select * from ".$tenderDetailsTbl." where status='y' and tender_type='E-Tender' order by tender_id desc"); 
                                        while($rowTenderDetails1 = mysqli_fetch_array($selectTenderDetails1)) 
                                        {                                              
                                    ?>
                                    <tr>
                                        <td><?php echo $rowTenderDetails1['tender_head'];?><br>Ref : <?php echo $rowTenderDetails1['references_details'];?></td>
                                        <td><?php echo $rowTenderDetails1['value'];?></td>
                                        <td><?php echo $rowTenderDetails1['start_date'];?></td>
                                        <td><?php echo $rowTenderDetails1['last_date'];?></td>
                                        <td><?php echo $rowTenderDetails1['due_date_open'];?></td>
                                        <td><a href="<?php echo $rowTenderDetails1['details'];?>" target="_blank">View Details</a></td>
                                        <td><a href="<?php echo $rowTenderDetails1['submition'];?>"
                                                target="_blank">Click Here</a></td>
                                    </tr>
                                    <?php
                                        }   
                                    ?>                                    
                                </tbody>
                            </table>
                        </div>
                    </div><!--.//eTender-->
                    <div class="tab-pane" id="corrigendum" role="tabpanel" aria-labelledby="corrigendum-tab">
                        <div class="overflow-auto ">
                            <table class="table large__table table-striped dataTable" style="min-width: 1000px;">
                                <thead>
                                    <tr>

                                         <th>Tender/Bid/EOI References & other Details</th>                                       

                                        <th>Bid Start Date</th>

                                        <th>Bid End Date</th>

                                        <th>Bid Opening Date</th>

                                        <th>Details</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $selectTenderDetails2 = mysqli_query($conn,"select * from ".$tenderDetailsTbl." where status='y' and tender_type='E-Tender' order by tender_id desc"); 
                                    while($rowTenderDetails2 = mysqli_fetch_array($selectTenderDetails2)) 
                                    {                                              
                                    ?>
                                    <tr>
                                        <td><?php echo $rowTenderDetails2['tender_head'];?><br>Ref : <?php echo $rowTenderDetails2['references_details'];?></td>                                        
                                        <td><?php echo $rowTenderDetails2['start_date'];?></td>
                                        <td><?php echo $rowTenderDetails2['last_date'];?></td>
                                        <td><?php echo $rowTenderDetails2['due_date_open'];?></td>
                                        <td><a href="<?php echo $rowTenderDetails2['details'];?>" target="_blank">View Details</a></td>                                        
                                    </tr>
                                <?php
                                    }   
                                ?>                                     
                                </tbody>
                            </table>
                        </div>
                    </div><!--.//corrigendum-->
                </div><!--.//tab-content-->

            </div><!--.//container-->
        </section>
        <!-- Content Wrapper End -->


    </main>



    <!-- Footer and Script List -->
    <?php $folder='root'; include_once('includes/footer.inc.php'); ?>

    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>

    <script>
        let table = new DataTable('.dataTable');
    </script>

</body>

</html>