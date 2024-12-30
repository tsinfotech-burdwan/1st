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
        <title>Photo Gallery</title>
        <!-- All Stylesheets -->
        <link rel="stylesheet" href="css/magnific-popup.min.css">  
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
                                <span>Photo Gallery</span>
                            </h1>
                        </div>
                        <div class="col-lg-7">
                            <div class="position-relative">
                                <div class="border border-2 border-white position-absolute border__layer"></div>
                                <img src="assets/images/common/History-of-Burdwan-Municipality.jpg" width="746" height="250"
                                    alt="Photo Gallery"
                                    class="img-fluid subpage__thumbnail w-100 object-fit-cover "
                                    style="object-position: center top;">
                            </div>
                        </div>
                    </div>
                </div><!--.//container-->
            </header>
            <!-- Header Wrapper End -->
            <!-- Content Wrapper Start --> 
            <section class="py-5">
                <div class="container py-md-5">
                    <div class="row g-1"> 
                    <?php 
                        $selectFolder = mysqli_query($conn,"select * from ".$masterFolderDetailsTbl." where status='1'");
                        while($rowFolder = mysqli_fetch_array($selectFolder))
                        {
                            $selectImageDetails = mysqli_query($conn,"select * from ".$masterImageDetailsTbl." where folder_id='".$rowFolder['folder_id']."' order by image_id desc");
                            $rowImageDetails = mysqli_fetch_array($selectImageDetails);
                    ?>
                        <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="gallery-image/<?php echo $function->dataEncryption($rowFolder['folder_id']); ?>" class="gallery__card w-100 d-flex position-relative ">
                                <img src="./gallery/<?php echo $rowImageDetails['image_file'];?>" class="img-fluid object-cover w-100" alt="Gallery Thumbnail">
                                <h2 class="fs-5 px-3 px-sm-4 pt-4 pt-md-5 pb-3 text-white z-1 position-absolute bottom-0 start-0 mb-0 w-100" style="background: linear-gradient(0deg, #000000de 30%, #ffffff0a);"><?php echo $rowFolder['folder_name'];?></h2>
                            </a>
                        </div>
                    <?php 
                        } 
                    ?>
                        <!-- <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="gallery-detail" class="gallery__card position-relative w-100 d-flex">
                                <img src="https://www.sinclairshotels.com/assets/images/burdwan/sightseeing/Golapbag.jpg" class="img-fluid object-cover w-100" alt="Gallery Thumbnail">
                                <h2 class="fs-5 px-3 px-sm-4 pt-4 pt-md-5 pb-3 text-white z-1 position-absolute bottom-0 start-0 mb-0 w-100" style="background: linear-gradient(0deg, #000000de 30%, #ffffff0a);">Gallery Name</h2>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="gallery-detail" class="gallery__card position-relative w-100 d-flex">
                                <img src="https://assets.telegraphindia.com/telegraph/2021/Nov/1637674870_lead.jpg" class="img-fluid object-cover w-100" alt="Gallery Thumbnail">
                                <h2 class="fs-5 px-3 px-sm-4 pt-4 pt-md-5 pb-3 text-white z-1 position-absolute bottom-0 start-0 mb-0 w-100" style="background: linear-gradient(0deg, #000000de 30%, #ffffff0a);">Gallery Name</h2>
                            </a>
                        </div> 
                        <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="gallery-detail" class="gallery__card position-relative w-100 d-flex">
                                <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0a/69/da/29/temple-complex.jpg?w=500&h=-1&s=1" class="img-fluid object-cover w-100" alt="Gallery Thumbnail">
                                <h2 class="fs-5 px-3 px-sm-4 pt-4 pt-md-5 pb-3 text-white z-1 position-absolute bottom-0 start-0 mb-0 w-100" style="background: linear-gradient(0deg, #000000de 30%, #ffffff0a);">Gallery Name</h2>
                            </a>
                        </div> 
                        <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="gallery-detail" class="gallery__card position-relative w-100 d-flex">
                                <img src="https://www.sinclairshotels.com/assets/images/burdwan/sightseeing/108shiva-mandir.jpg" class="img-fluid object-cover w-100" alt="Gallery Thumbnail">
                                <h2 class="fs-5 px-3 px-sm-4 pt-4 pt-md-5 pb-3 text-white z-1 position-absolute bottom-0 start-0 mb-0 w-100" style="background: linear-gradient(0deg, #000000de 30%, #ffffff0a);">Gallery Name</h2>
                            </a>
                        </div> 
                        <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="gallery-detail" class="gallery__card position-relative w-100 d-flex">
                                <img src="https://www.sinclairshotels.com/assets/images/burdwan/sightseeing/Kalna_Temple_Complex.jpg" class="img-fluid object-cover w-100" alt="Gallery Thumbnail">
                                <h2 class="fs-5 px-3 px-sm-4 pt-4 pt-md-5 pb-3 text-white z-1 position-absolute bottom-0 start-0 mb-0 w-100" style="background: linear-gradient(0deg, #000000de 30%, #ffffff0a);">Gallery Name</h2>
                            </a>
                        </div> 
                        <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="gallery-detail" class="gallery__card position-relative w-100 d-flex">
                                <img src="https://www.holidify.com/images/compressed/119.jpg" class="img-fluid object-cover w-100" alt="Gallery Thumbnail">
                                <h2 class="fs-5 px-3 px-sm-4 pt-4 pt-md-5 pb-3 text-white z-1 position-absolute bottom-0 start-0 mb-0 w-100" style="background: linear-gradient(0deg, #000000de 30%, #ffffff0a);">Gallery Name</h2>
                            </a>
                        </div> 
                        <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="gallery-detail" class="gallery__card position-relative w-100 d-flex">
                                <img src="https://lh5.googleusercontent.com/proxy/DZJFsfzffbYBxVJ6HK86Cug1UoIRbZZ7BKbmRqsuto1QiXqIR8HGVzuIPbEm5pxuh-3KRdksKAnQmot0frvYYc_XXA" class="img-fluid object-cover w-100" alt="Gallery Thumbnail">
                                <h2 class="fs-5 px-3 px-sm-4 pt-4 pt-md-5 pb-3 text-white z-1 position-absolute bottom-0 start-0 mb-0 w-100" style="background: linear-gradient(0deg, #000000de 30%, #ffffff0a);">Gallery Name</h2>
                            </a>
                        </div> 
                        <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="gallery-detail" class="gallery__card position-relative w-100 d-flex">
                                <img src="https://www.holidify.com/images/compressed/120.jpg" class="img-fluid object-cover w-100" alt="Gallery Thumbnail">
                                <h2 class="fs-5 px-3 px-sm-4 pt-4 pt-md-5 pb-3 text-white z-1 position-absolute bottom-0 start-0 mb-0 w-100" style="background: linear-gradient(0deg, #000000de 30%, #ffffff0a);">Gallery Name</h2>
                            </a>
                        </div> -->                        
                    </div><!--.//row-->
                </div><!--.//container-->
            </section>
        </main>
        <?php $folder='root'; include_once('includes/footer.inc.php'); ?>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script>
            $(function(){  
                $('.galleryItem').magnificPopup({
                    type: 'image',
                    mainClass: 'mfp-with-zoom', 
                    gallery:{ enabled:true
                        },
                    
                    zoom: {
                        enabled: true,  
                        duration: 300, // duration of the effect, in milliseconds
                        easing: 'ease-in-out', // CSS transition easing function 
                        opener: function(openerElement) { 
                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                        }
                    } 
                });
            });
        </script> 
    </body> 
</html>