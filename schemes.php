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
                        <?php if ($rowAbout['page_title'] === 'E-Governance') { ?>
                        <h2>What is e-Governance :</h2>
                        <p>
                            Electronic governance is the use of information and communication technologies (ICT) for the planning implementation, and monitoring of government programmes, projects, and activities. E-Governance is expected to help deliver cost â€“effective and easy to access citizen servies. E-governance can be defined as delivery of government services and information to the public using electronic channels.
                        </p>

                        
                        <h2 class="mt-5">Need for e- Governance :</h2>
                        <ul>
                            <li>How government can become more responsive and accessible?</li>
                            <li>How can the government enhance its role as a catalyst of economic growth ?</li>
                            <li>How can on Municipal Corporation provide better Government Services ?</li>
                            <li>How can the Municipal Corporation use advanced technologies for transferring benefits, improving health care and education and other social Services.</li>
                        </ul>

                        <h2 class="mt-5">The objectives of E-Governance incluses :</h2>
                        <ul class="check__list row row-cols-sm-2 flex-row gap-0 g-2">
                            <li>Delivery of Services to Community.</li>
                            <li>High quality of service Delivered.</li>
                            <li>Timely delivery.</li>
                            <li>Efficiency in process.</li>
                            <li>Ability to learn form experiences for improved delivery.</li>
                            <li>Improved interactions with business and industry.</li>
                            <li>Citizen empowerment through access to information.</li>
                            <li>Enhanced capacities of department personnel.</li>
                        </ul>

                        <h2 class="mt-5">Project Modules are given below as per Municipal Corporation requirement and also as per Bengal Municipal Law :</h2>
                        <ul class="check__list row row-cols-sm-2 flex-row gap-0 g-2">
                            <li>Admin Module</li>
                            <li>Birth & Death Module</li>
                            <li>Health System Module</li>
                            <li>Financial Accounting System Moduel</li>
                            <li>Payroll Module</li>
                            <li>ULB Information System module</li>
                            <li>School information system module</li>
                            <li>Public Grievance & Redressal module</li>
                            <li>Ward Wise Management System module</li>
                            <li>Trade License Module</li>
                            <li>Property Tax module</li>
                            <li>Infrastructure Management System module</li>
                            <li>Building Plan module</li>
                            <li>Water Works Management module</li>
                        </ul>

                        <h2 class="mt-5">KUSP & E- Governance.</h2>
                        <p>Govt. of West Bengal ( GOV.WB) and DFLD in 1999, agreed to collaborate on the development of the " Kolkata Urban Services for the Poor" ( KUSP) programme aimed at :improving urban planning and governances; access to basic services for the poor and promoting economic growth in the KMA. The project will support improvement of municipal governance for better service delivery and transparency . GoWB is keen to introduce municipal eGoverence in the 40 ULBs under the project to promote financial and administrative efficiency , efficiency in delivery of municipal services, decentralization, information sharing and transparency.</p>
                        <p>It is also to maintain vast amount of data about all the services provided to the citizens and to monitor the status of processing of application for various municipal activities, the release of funds and utilization of funds by each ULBs for various planned activities and the progress of these activities which are some of the key functions of Government Municipal Departments. E- Governance is a comprehensive word used to adopt the Government function through internet / intranet systems.</p>
                        <p>The Municipal Affairs Department ( MAD) is the lead department for the project. Change Management Unit ( CMU) has been created as an agency under MA Dept. to oversee the implementation of the Project. Agencies like Kolkata Metropolitan Development Authority ( KMDA), Directorate of Local Body ( DLA), Municipal Engineering Directorate ( MED), State Urban Development Agency ( SUDA), Institute of Local Government and Urban Studies ( ILGUS), West Bengal Valuation Board ( WBVA) have been identified as support agencies facilitating ULBSs in proper discharge their functions. Thry have been allocated their responsibilities and one representative from each support agency has been nominated by the respective head of the office to act as member of CMU.</p>
                        <?php } else if($rowAbout['page_title'] === 'AMRUT') { ?>
                            <?php include("includes/no-data-found.inc.php"); ?>
                        <?php } ?>
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