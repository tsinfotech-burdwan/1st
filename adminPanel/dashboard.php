<?php
	session_start();
	include "base/config.php";
	if(isset($_SESSION[$counterSessionName]['user_id']) && $_SESSION[$counterSessionName]['user_id']!="")
	{
		$mainPageName = "Dashboard";
		$subPageName = "";
		$totalTenderDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$tenderDetailsTbl.""));
		$publishTenderDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$tenderDetailsTbl." where status='y'"));
		$deactiveTenderDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$tenderDetailsTbl." where status in ('n','d')"));
		$normalTenderDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$tenderDetailsTbl." where tender_type='Normal Tender'"));
		$etenderTenderDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$tenderDetailsTbl." where tender_type='E-Tender'"));
		$correndumTenderDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$tenderDetailsTbl." where tender_type='Corrigendum'"));
		$totalNoticeDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$noticeDetailsTbl.""));
		$publishNoticeDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$noticeDetailsTbl." where status='1'"));
		$deactiveNoticeDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$noticeDetailsTbl." where status='0'"));
		$recurtmentNoticeDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$noticeDetailsTbl." where notice_category='recruitment'"));
		$publicNoticeDetails = mysqli_num_rows(mysqli_query($conn,"select * from ".$noticeDetailsTbl." where notice_category='public'"));

		$totalQuestion = mysqli_num_rows(mysqli_query($conn,"select * from ".$pollQuestionDetailsTbl." where status='1'"));
		$totalAnswer = mysqli_num_rows(mysqli_query($conn,"select * from ".$pollAnswerDetailsTbl." where status='1'"));		
		$totalUserAnswer = mysqli_num_rows(mysqli_query($conn,"select * from ".$pollUserAnswerDetailsTbl.""));		
?> 
<!DOCTYPE html>  
	<html class="loading" lang="en" data-textdirection="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Dashboard | <?php echo $rowOrganizationDetails['organization_name'];?></title>
        <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/<?php echo $rowOrganizationDetails['organization_favicon'];?>">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/swiper.min.css">
        <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/pages/knowledge-base.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/swiper.css">
        <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head> 
	<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
		<?php include 'base/header.php'; ?>
		<?php include 'base/menubar.php'; ?>
		<div class="app-content content">
			<div class="content-overlay"></div>
			<div class="header-navbar-shadow"></div>
			<div class="content-wrapper">
				<div class="content-header row"></div>
				<!-- Pie Chart -->
	            	<div class="content-body">
						<section id="dashboard-ecommerce">
		                    <div class="row">
		                        <div class="col-lg-6 col-sm-12 col-12">
		                            <div class="card">
		                                <div class="card-header d-flex flex-column align-items-start pb-0">
		                                    <div class="avatar bg-rgba-primary p-100 m-0">
		                                        <div class="avatar-content">
		                                            <i class="feather icon-package text-warning font-medium-5"></i>
		                                        </div>
		                                    </div>
		                                    <h2 class="text-bold-700 mt-1">Tender Details</h2>
		                                    <a class="text-bold-700 mt-1">Total - <?php echo $totalTenderDetails; ?></a>
		                                    <a class="text-bold-700 mt-1">Published - <?php echo $publishTenderDetails; ?></a>
		                                    <a class="text-bold-700 mt-1">De-Active - <?php echo $deactiveTenderDetails; ?></a>
		                                    <a class="text-bold-700 mt-1">Normal Tender - <?php echo $normalTenderDetails; ?></a>
		                                    <a class="text-bold-700 mt-1">E-Tender - <?php echo $etenderTenderDetails; ?></a>
		                                    <a class="text-bold-700 mt-1">Corrigendum - <?php echo $correndumTenderDetails; ?></a>
		                                </div>                                
		                            </div>
		                        </div>
		                        <div class="col-lg-6 col-sm-12 col-12">
		                            <div class="card">
		                                <div class="card-header d-flex flex-column align-items-start pb-0">
		                                    <div class="avatar bg-rgba-primary p-100 m-0">
		                                        <div class="avatar-content">
		                                            <i class="feather icon-package text-warning font-medium-5"></i>
		                                        </div>
		                                    </div>
		                                    <h2 class="text-bold-700 mt-1">Notice Details</h2>
		                                    <a class="text-bold-700 mt-1">Total - <?php echo $totalNoticeDetails; ?></a>
		                                    <a class="text-bold-700 mt-1">Published - <?php echo $publishNoticeDetails; ?></a>
		                                    <a class="text-bold-700 mt-1">De-Active - <?php echo $deactiveNoticeDetails; ?></a>
		                                    <a class="text-bold-700 mt-1">Public Type - <?php echo $publicNoticeDetails; ?></a>
		                                    <a class="text-bold-700 mt-1">Recruitment Type - <?php echo $recurtmentNoticeDetails; ?></a>
		                                </div>                                
		                            </div>
		                        </div>
		                        <div class="col-lg-6 col-sm-12 col-12">
		                            <div class="card">
		                                <div class="card-header d-flex flex-column align-items-start pb-0">
		                                    <div class="avatar bg-rgba-primary p-100 m-0">
		                                        <div class="avatar-content">
		                                            <i class="feather icon-package text-warning font-medium-5"></i>
		                                        </div>
		                                    </div>
		                                    <h2 class="text-bold-700 mt-1">Poll Details</h2>
		                                    <a class="text-bold-700 mt-1">Total Question - <?php echo $totalQuestion; ?></a>
		                                    <a class="text-bold-700 mt-1">Total Answer - <?php echo $totalAnswer; ?></a>
		                                    <a class="text-bold-700 mt-1">Total Poll - <?php echo $totalUserAnswer; ?></a>
		                                </div>                                
		                            </div>
		                        </div>		                        
		                    </div> 
	                    </section>
	                </div>
				</div>
			</div>
		</div> 
		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div> 
		<?php include 'base/footer.php'; ?> 
        <script src="app-assets/vendors/js/vendors.min.js"></script>
        <script src="app-assets/vendors/js/extensions/swiper.min.js"></script>
        <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
        <script src="app-assets/js/core/app-menu.js"></script>
        <script src="app-assets/js/core/app.js"></script>
        <script src="app-assets/js/scripts/components.js"></script>
        <script src="app-assets/js/scripts/pages/faq-kb.js"></script>
        <script src="app-assets/js/scripts/extensions/swiper.js"></script>
        <script src="app-assets/js/scripts/pages/app-chat.js"></script>
        <script src="app-assets/js/scripts/pages/dashboard-ecommerce.js"></script> 
        <script>
        	$(document).ready(function () 
        	{
				var $primary = '#7367F0',
				$success = '#28C76F',
				$danger = '#EA5455',
				$warning = '#FF9F43',
				$info = '#00cfe8',
				$label_color_light = '#dae1e7';

				var themeColors = [$primary, $success, $danger, $warning, $info];
				

				// Pie Chart
				// -----------------------------
				var pieChartOptions = {
					chart: {
						type: 'pie',
						height: 250
					},
					colors: themeColors,
					labels: ['Complete','Approved'], 
					series: [<?php echo $totalSurveyPending;?>, <?php echo $totalSurveyApproved;?>],
					legend: {
						itemMargin: {
							horizontal: 2
						},
					},
					responsive: [{
						breakpoint: 480,
						options: {
							chart: {
								width: 250
							},
							legend: {
								position: 'bottom'
							}
						}
					}]
				}
				var pieChart = new ApexCharts(document.querySelector("#pie-chart"),pieChartOptions);
				pieChart.render();
			});
    	</script>
	</body>
</html> 
<?php
	}
	else
	{
		echo "<meta http-equiv='refresh' content='0;URL=logout'>";
	}
?>  