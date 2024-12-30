<?php 
    include "../adminPanel/base/databaseConnection.php";
    include "../adminPanel/base/databaseTables.php";
    date_default_timezone_set('Asia/Kolkata');

    include_once('../includes/url.inc.php'); 

    $urls =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $pagename = @end(explode("/", $urls));

    $firstDecode = base64_decode($pagename);
    $secondDecode = urldecode($firstDecode);
    $decode = base64_decode($secondDecode);

    $selectFolder = mysqli_query($conn,"select * from ".$masterFolderDetailsTbl." where folder_id='".$decode."'");
    if(mysqli_num_rows($selectFolder)>0)
    {
        $rowFolder = mysqli_fetch_array($selectFolder);
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="<?php echo $base_url;?>assets/images/favicon.ico" type="image/x-icon">
        <title><?php echo $rowFolder['folder_name'];?></title>
        <!-- All Stylesheets -->
        <link rel="stylesheet" href="css/magnific-popup.min.css">  
        <?php $folder='root'; include_once('../includes/stylesheets.inc.php'); ?>
    </head>
    <body>
        <?php $folder='root'; include_once('../includes/header.inc.php'); ?>
        <main>
            <header class="header__wrapper py-5 text-center text-lg-start">
                <div class="container">
                    <h1 class="display-6 large ff-heading text-white position-relative ps-4 mb-0">
                        <span class="line d-block position-absolute bg-primary start-0 top-50 translate-middle-y"></span>
                        <span><?php echo $rowFolder['folder_name'];?></span>
                    </h1> 
                </div><!--.//container-->
            </header>
            <section class="py-5">
                <div class="container py-md-5">
                    <div class="row g-1"> 
                    <?php 
                        $selectImageDetails = mysqli_query($conn,"select * from ".$masterImageDetailsTbl." where folder_id='".$decode."' and status='1' order by image_id desc");
                        while($rowImageDetails = mysqli_fetch_array($selectImageDetails))
                        {
                    ?>
                        <div class="col-md-4 col-sm-6 col-6 d-flex">
                            <a href="../gallery/<?php echo $rowImageDetails['image_file'];?>" class="gallery__card galleryItem w-100 d-flex position-relative ">
                                <img src="../gallery/<?php echo $rowImageDetails['image_file'];?>" class="img-fluid object-cover w-100" alt="Gallery Thumbnail"> 
                            </a>
                        </div> 
                    <?php 
                        }
                    ?>                       
                    </div>
                </div>
            </section>
        </main>
        <?php $folder='root'; include_once('../includes/footer.inc.php'); ?>
        <script src="../assets/js/jquery.magnific-popup.min.js"></script>
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
<?php 
    }
    else
    {
        echo "<meta http-equiv='refresh' content='0;URL=".$base_url."'>"; 
    }
?> 