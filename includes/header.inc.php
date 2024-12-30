    <!-- navigation start --> 
    <nav class="text-white py-2" style="background-color: #12412C;">
        <div class="container-fluid custom__container mx-auto d-flex justify-content-center justify-content-sm-between align-items-center mx-auto" style="max-width: 1500px;">
            <div class="d-inline-flex align-items-center gap-3 gap-sm-4">
                <div class="d-inline-flex align-items-center gap-2">
                    <img src="<?php echo $base_url;?>assets/images/icons/calendar.svg" width="16" height="16" alt="calendar">
                    <span id="currentDateDiaplay">09-04-2024</span>
                </div>
                <div class="d-inline-flex align-items-center gap-2">
                    <img src="<?php echo $base_url;?>assets/images/icons/clock.svg" width="16" height="16" alt="calendar">
                    <span id="MyClockDisplay" class="clock" onload="showTime()"></span>
                </div>
            </div>
            <div class="d-inline-flex gap-2"> 
                <a  onclick="redirectionUtsav();" class="btn btn-primary btn-app py-1 px-4 fs-5 fw-bold">Bardhaman Poura Utsav</a> 
                <!-- <button
                    type="button" class="btn btn-primary btn-lg"
                    data-bs-toggle="modal" data-bs-target="#modalPromo"
                >
                    Promo
                </button> -->
            </div>
        </div>
    </nav> 
    <nav class="navbar navbar-expand-xl smart-scroll" id="mainNav">
        <div class="container-fluid custom__container position-relative mx-auto" style="max-width: 1500px;">   
            <a href="<?php echo $base_url;?>" class="navbar-brand p-0 m-0 d-inline-block" aria-label="<?php echo $site_name;?>" title="<?php echo $site_name;?>">
                <img src="<?php echo $base_url;?>assets/images/logo.webp" width="180" height="136" class="w-auto" alt="<?php echo $site_name;?>">
            </a>
            <ul class="navbar-nav d-none d-xl-flex flex-wrap align-items-center">    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        About
                    </a>
                    <ul class="dropdown-menu border-0 p-2 rounded-3">
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>about?<?php echo $function->dataEncryption('History of Burdwan Municipality'); ?>">History of Burdwan Municipality</a></li>
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>about?<?php echo $function->dataEncryption('About Burdwan Town'); ?>">About Burdwan Town</a></li>
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>about?<?php echo $function->dataEncryption('Area of Populations'); ?>">Area of Populations</a></li>
                        <li class="child__menu position-relative ">
                            <a class="dropdown-item p-2 rounded-2" href="#">Map</a>
                            <ul class="dropdown-menu border-0 p-2 rounded-3 top-0 start-100 "> 
                                <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>gis-map">Gis Map</a></li>
                                <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>satellite-map">Satellite Map</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>about?<?php echo $function->dataEncryption('Calender'); ?>">Calender</a> </li>               
                    </ul> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Administrative
                    </a>
                    <ul class="dropdown-menu border-0 p-2 rounded-3">
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>chairman-in-council">Chairman in Council</a></li> 
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>department">Departmental Man Power</a></li> 
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>telephone-directory">Telephone Directory</a></li> 
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>runing-board">Runing Board</a></li> 
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>previous-board">Previous Board</a></li>
                    </ul> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Schemes
                    </a>
                    <ul class="dropdown-menu border-0 p-2 rounded-3">
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>schemes?<?php echo $function->dataEncryption('E-Governance'); ?>">E-Governance</a></li>
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>schemes?<?php echo $function->dataEncryption('AMRUT'); ?>">AMRUT</a></li>
                    </ul> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informations
                    </a>
                    <ul class="dropdown-menu border-0 p-2 rounded-3">
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>informations?<?php echo $function->dataEncryption('Building Plan'); ?>">Building Plan</a></li>
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>informations?<?php echo $function->dataEncryption('Death+And Birth Registrations'); ?>">Death And Birth Registrations</a></li>
                    </ul> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Salient Features
                    </a>
                    <ul class="dropdown-menu border-0 p-2 rounded-3">
                        <li><a class="dropdown-item p-2 rounded-2" href="tenderlist">Tender Quotations</a></li> 
                        <li><a class="dropdown-item p-2 rounded-2" href="notice-citizen-list">Notice for Citizen</a></li> 
                        <li class="child__menu position-relative ">
                            <a class="dropdown-item p-2 rounded-2" href='#'>Financial Statement</a> 
                            <ul class="dropdown-menu border-0 p-2 rounded-3 top-0 start-100 "> 
                                <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>afs">Audited AFS</a></li>
                                <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>unaudited">Unaudited AFS</a></li>
                                <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>balancesheet">Balance Sheet</a></li>
                                <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>demand-collection">Demand & Collection</a></li>
                                <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>income-expenditure">Income Expenditure</a></li>
                                <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>payment-receipts">Payment Receipts</a></li>
                                <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>budget-estimate">Budget Estimate</a></li> 
                            </ul> 
                        </li> 
                    </ul> 
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gallery
                    </a>
                    <ul class="dropdown-menu border-0 p-2 rounded-3">
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>photo-gallery">Photo Gallery</a></li> 
                        <li><a class="dropdown-item p-2 rounded-2" href="<?php echo $base_url;?>video-gallery">Video Gallery</a></li>
                    </ul> 
                </li>                
                <li class="nav-item dropdown res__menu__item">
                    <a class="nav-link" href="employment-notice">
                        Employment Notice
                    </a> 
                </li>
                <!-- <li class="nav-item dropdown res__menu__item">
                    <a class="nav-link" href="#">
                        Online Service
                    </a> 
                </li> -->                
                <li class="nav-item dropdown res__menu__item">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Online Service
                    </a>
                    <ul class="dropdown-menu border-0 p-2 rounded-3">
                        <li><a class="dropdown-item p-2 rounded-2" href="https://bookingsystem.burdwan-municipality.online/">Hall Booking</a></li> 
                        <li><a class="dropdown-item p-2 rounded-2" href="https://holdingtax.co.in/Home/Index">Online Tax Payment</a></li> 
                        <li><a class="dropdown-item p-2 rounded-2" href="https://wburbanservices.org/Home/Index">Online Mutation</a></li> 
                        <li><a class="dropdown-item p-2 rounded-2" href="https://obpsudma.wb.gov.in/">Online Building Plan</a></li>
                        <li><a class="dropdown-item p-2 rounded-2" href="https://janma-mrityutathya.wb.gov.in/">Online Birth & Death</a></li>
                        <li><a class="dropdown-item p-2 rounded-2" href="https://ems.burdwan-municipality.online/">Employee Management</a></li>
                        <li><a class="dropdown-item p-2 rounded-2" href="https://toto.burdwan-municipality.online/">Toto System</a></li>
                    </ul> 
                </li>
            </ul>  
            
            <div class="d-inline-flex align-items-center gap-3"> 
                <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" class="navbar-toggler rounded p-0 ms-1" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24"><path fill="#1B1918" d="M3.75 5.25a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5zm0 6a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5zm0 6a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5z"/></svg>
                </button>   
                <img src="<?php echo $base_url;?>assets/images/common/ashok-stambh.webp" width="46" height="82" alt="ashok-stambh" class="ashok__stambh">
            </div> 
        </div>
    </nav> 
    <div class="offcanvas offcanvas-end sideNav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <p class="offcanvas-title lead-sm fw-semibold text-primary mb-0" id="offcanvasExampleLabel">Burdwan Municipalty</p>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-0">
            <ul class="links__list">
                <li><a href="<?php echo $base_url;?>">Home</a></li> 
                <li> 
                    <a class="btn__link collapsed" data-bs-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                        About
                    </a>
                    <ul class="collapse" id="collapse1"> 
                        <li><a href="<?php echo $base_url;?>about?<?php echo $function->dataEncryption('History of Burdwan Municipality'); ?>">History of Burdwan Municipality</a></li>
                        <li><a href="<?php echo $base_url;?>about?<?php echo $function->dataEncryption('About Burdwan Town'); ?>">About Burdwan Town</a></li>
                        <li><a href="<?php echo $base_url;?>about?<?php echo $function->dataEncryption('Area of Populations'); ?>">Area of Populations</a></li>
                            <a class="btn__link collapsed" data-bs-toggle="collapse" href="#collapse1a" role="button" aria-expanded="false" aria-controls="collapse1a">
                                Map
                            </a>
                            <ul class="collapse" id="collapse1a"> 
                                <li><a href="<?php echo $base_url;?>gis-map">Gis Map</a></li>
                                <li><a href="<?php echo $base_url;?>satellite-map">Satellite Map</a></li>
                            </ul>                       
                        <li><a href="<?php echo $base_url;?>about?<?php echo $function->dataEncryption('Calender'); ?>">Calender</a> </li>      
                    </ul>
                </li> 
                <li> 
                    <a class="btn__link collapsed" data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                        Administrative 
                    </a>
                    <ul class="collapse" id="collapse2"> 
                        <li><a href="<?php echo $base_url;?>chairman-in-council">Chairman in Council</a></li> 
                        <li><a href="<?php echo $base_url;?>department">Departmental Man Power</a></li> 
                        <li><a href="<?php echo $base_url;?>telephone-directory">Telephone Directory</a></li> 
                        <li><a href="<?php echo $base_url;?>runing-board">Runing Board</a></li> 
                        <li><a href="<?php echo $base_url;?>previous-board">Previous Board</a></li>
                    </ul>
                </li> 
                <li>
                    <a class="btn__link collapsed" data-bs-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                        Schemes
                    </a>
                    <ul class="collapse" id="collapse3"> 
                        <li><a href="<?php echo $base_url;?>schemes?<?php echo $function->dataEncryption('E-Governance'); ?>">E-Governance</a></li>
                        <li><a href="<?php echo $base_url;?>schemes?<?php echo $function->dataEncryption('AMRUT'); ?>">AMRUT</a></li>
                    </ul>
                </li>   
                <li>
                    <a class="btn__link collapsed" data-bs-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">
                        Informations
                    </a>
                    <ul class="collapse" id="collapse4"> 
                        <li><a href="<?php echo $base_url;?>informations?<?php echo $function->dataEncryption('Building Plan'); ?>">Building Plan</a></li>
                        <li><a href="<?php echo $base_url;?>informations?<?php echo $function->dataEncryption('Death And Birth Registrations'); ?>">Death And Birth Registrations</a></li>
                    </ul>
                </li>   
                <li>
                    <a class="btn__link collapsed" data-bs-toggle="collapse" href="#collapse5" role="button" aria-expanded="false" aria-controls="collapse5">
                        Salient Features
                    </a>
                    <ul class="collapse" id="collapse5"> 
                        <li><a href="tenderlist">Tender Quotations</a></li> 
                        <li><a href="notice-citizen-list">Notice for Citizen</a></li> 
                        <li>
                            <a class="btn__link collapsed" data-bs-toggle="collapse" href="#collapse5a" role="button" aria-expanded="false" aria-controls="collapse5a">
                                Financial Statement
                            </a>
                            <ul class="collapse" id="collapse5a">
                                <li><a href="afs">Audited AFS</a></li>
                                <li><a href="unaudited">Unaudited AFS</a></li>
                                <li><a href="balancesheet">Balance Sheet</a></li>
                                <li><a href="demand-collection">Demand & Collection</a></li>
                                <li><a href="income-expenditure">Income Expenditure</a></li>
                                <li><a href="payment-receipts">Payment Receipts</a></li>
                                <li><a href="budget-estimate">Budget Estimate</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>   
                <li>
                    <a class="btn__link collapsed" data-bs-toggle="collapse" href="#collapse6" role="button" aria-expanded="false" aria-controls="collapse6">
                        Gallery
                    </a>
                    <ul class="collapse" id="collapse6"> 
                        <li><a href="photo-gallery">Photo Gallery</a></li> 
                        <li><a href="video-gallery">Video Gallery</a></li>
                    </ul>
                </li>   
                 
                <li><a href="employment-notice">Employment Notice</a></li>
                <!-- <li><a href="#">Online Service</a></li> -->                   
                <li>
                    <a class="btn__link collapsed" data-bs-toggle="collapse" href="#collapse8" role="button" aria-expanded="false" aria-controls="collapse8">
                        Online Service
                    </a>
                    <ul class="collapse" id="collapse8"> 
                        <li><a href="https://bookingsystem.burdwan-municipality.online/">Hall Booking</a></li> 
                        <li><a href="https://holdingtax.co.in/Home/Index">Online Tax Payment</a></li> 
                        <li><a href="https://wburbanservices.org/Home/Index">Online Mutation</a></li> 
                        <li><a href="https://obpsudma.wb.gov.in/">Online Building Plan</a></li>
                        <li><a href="https://janma-mrityutathya.wb.gov.in/">Online Birth & Death</a></li>
                        <li><a href="https://ems.burdwan-municipality.online/">Employee Management</a></li>
                        <li><a href="https://toto.burdwan-municipality.online/">Toto System</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div> 
    <?php 
        $selectPopup = mysqli_query($conn,"select * from ".$popupDetailsTbl." where status='1'");
        while($rowPopup = mysqli_fetch_array($selectPopup))
        {
    ?>
    <div class="modal fade" id="modalPromo" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content"> 
                <div class="modal-body p-0">
                    <button type="button" class="btn-close bg-white position-absolute top-0 end-0 rounded-circle p-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <a href=<?php echo $rowPopup['link'];?>><img src="assets/images/popup/<?php echo $rowPopup['image'];?>" class="img-fluid" alt="Pop Up"></a>
                </div> 
            </div>
        </div>
    </div>
    <?php  
        }
    ?>
    
    <!-- Optional: Place to the bottom of scripts -->
    <!-- <script>
        const myModal = new bootstrap.Modal(
            document.getElementById("modalId"),
            options,
        );
    </script> -->
    <script language="javascript">
           var message="Right Click is not allowed here.";
           function clickIE4(){
                 if (event.button==2){
                     alert(message);
                     return false;
                 }
           }
           function clickNS4(e){
                if (document.layers||document.getElementById&&!document.all){
                        if (e.which==2||e.which==3){
                                  alert(message);
                                  return false;
                        }
                }
           }
           if (document.layers){
                 document.captureEvents(Event.MOUSEDOWN);
                 document.onmousedown=clickNS4;
           }
           else if (document.all&&!document.getElementById){
                 document.onmousedown=clickIE4;
           }
           document.oncontextmenu=new Function("alert(message);return false;")
</script>
<script language="javascript">
    function redirectionUtsav()
    {
       location.href="https://play.google.com/store/apps/details?id=com.justwebsite_info.Bardhaman_Poura_Utsav&pli=1";
    }
</script>
    
    