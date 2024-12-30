<?php 
    include ('./includes/config.inc.php'); 
    include_once('includes/url.inc.php');

    $urls =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(preg_match("/[\'^£$%&*()}{@#~><>,;|_+¬-]/", $urls)==0) 
    {
        $urlArray = explode("/", $urls);
        $pagename = @end(explode("?", $urls)); 

        $decode = $function->dataDecryption($pagename);
        
        $selectAbout = mysqli_query($conn,"select * from ".$aboutDetailsTbl." where about_title='".$decode."'");
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
        <title>Burdwan Municipalty</title>
        <?php 
            $folder='root'; 
            include_once('includes/stylesheets.inc.php'); 
        ?> 
    </head>
    <body>  
    <?php 
        $folder='root'; 
        include_once('includes/header.inc.php'); 
    ?> 
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
                                    src="assets/images/about/about-header-thumbnail.webp" 
                                    width="746" height="250"
                                    alt="About Burdwan Town"
                                    class="img-fluid subpage__thumbnail w-100 object-fit-cover "
                                    style="object-position: center top;"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <section class="py-5 cms__content__wrapper">
                <div class="container  py-md-5">
                    <div class="row g-4 gx-xxl-5">
                        <div class="col-lg-7 col-xl-8">
                            <?php if ($decode === 'History of Burdwan Municipality') { ?>
                                <div>
                                    <p>
                                        The Municipality of Burdwan was established in the year 1865. At that time the municipal area was 12.8 sq. km. with a population of 39,818. As per 2001 census, the population and the area of Burdwan Municipality are 2,85,602 and 26.30 sq. km. respectively. At present the municipality has 35 wards. Burdwan is the principal town and civil station of the district.
                                    </p>
                                    <img 
                                        src="assets/images/common/History-of-Burdwan-Municipality.jpg" 
                                        width="848" height="345"
                                        alt="About Burdwan Town"
                                        class="img-fluid w-100 object-fit-cover " 
                                    >
                                </div>
                            <?php } else if ($decode === 'Area of Populations') { ?>
                                <div>
                                    <p>
                                        As per 2001 census, the population and the area of Burdwan Municipality are 2,85,602 and 26.30 sq. km. Barddhaman is located at 23.25°N 87.85°E[1]. It has an average elevation of 40 metres (131 ft).
                                    </p>
                                    <p>The city is situated 1100 km from New Delhi and a little less than 100 km north-west of Kolkata on the Grand Trunk Road (NH-2) and Eastern Railway.</p>
                                    <p>The chief rivers are theDamodar and Banka.</p> 
                                </div>
                            <?php } else if ($decode === 'Calender') { ?>
                                <div>
                                    <?php 
                                        $selectCalendarDetails = mysqli_query($conn,"select * from ".$calendarDetailsTbl." where status='1'");                                                      
                                        $rowCalendar = mysqli_fetch_array($selectCalendarDetails);
                                        if($rowCalendar['status']==1) 
                                        {
                                    ?>
                                        <img src="assets/images/calendar/<?php echo $rowCalendar['calender_image'];?>" width="848" height="1200" alt="Calender" class="img-fluid w-100 object-fit-cover ">
                                    <?php 
                                        }
                                        else 
                                        {
                                    ?>
                                            <h3 style="color:darkred;">Calendar Will Be Updated Very Soon...!!!</h3>
                                    <?php  
                                        }  
                                    ?>                                
                                </div>
                            <?php } else if ($decode === 'About Burdwan Town') { ?> 
                            <div>
                                <p>
                                    The Municipality of Burdwan was established in the year 1865. At that time the municipal area was 12.8 sq. km. with a population of 39,818. As per 2001 census, the population and the area of Burdwan Municipality are 2,85,602 and 26.30 sq. km. respectively. At present the municipality has 35 wards. Burdwan is the principal town and civil station of the district.
                                </p>

                                <div class="row g-4 mt-4">
                                    <div class="col-md-8"> 
                                        <h2>Geography:</h2>
                                        <p>Barddhaman is located at 23.25°N 87.85°E[1]. It has an average elevation of 40 metres (131 ft). The city is situated 1100 km from New Delhi and a little less than 100 km north-west of Kolkata on the Grand Trunk Road (NH-2) and Eastern Railway. The chief rivers are theDamodar and Banka.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <img 
                                            src="assets/images/about/geography.webp" 
                                            width="624" height="550"
                                            alt="About Burdwan Town"
                                            class="img-fluid w-100 object-fit-cover " 
                                        >
                                    </div>
                                </div>

                                <h2 class="mt-5">Name:</h2>
                                <p>Burdwan is an anglicised version of the Sanskrit Vardhamana and the corresponding Bôrdhoman in Bengali.</p>
                                <p>The literal meaning of the name, a prosperous and growing centre, to argue that this place represented a frontier colony of the progress of aryanisation through the upper Ganges River Valley. However, the Aryans failed to proceed further east. So, the name was retained.</p>
                                <p>A second view holds that the origin of this name dates back to 4000 BCE and is ascribed to Vardhamanswami or Mahavira, the twenty-fourth Jain Tirthankar, who spent some time in Astikagrama, according to the Jain scripture of Kalpasutra. This place was renamed as Vardhamana in his honour.</p>
                                <p>The first epigraphic reference to the name of this place occurs in a 6th century AD copper-plate found in Mallasarul village under Galsi Police Station.</p>
                                <p>Archeological evidences suggest that this region, forming a major part of Radh Bengal, could be traced even back to 4000 BCE.</p>
                                

                                <div class="row g-4 mt-4 align-items-center">
                                    <div class="col-md-4">
                                        <img 
                                            src="assets/images/about/Culture.webp" 
                                            width="624" height="550"
                                            alt="Culture"
                                            class="img-fluid w-100 object-fit-cover" 
                                        >
                                    </div>
                                    <div class="col-md-8"> 
                                        <h2>Culture:</h2>
                                        <p>Burdwan has a multi-cultural heritage. The deuls (temples of rekha type) found here are reminiscent of Bengali Hindu architecture. The old temples bear signs of Hinduism, mostly belonging to the Sakta and Vaishnava followers.</p>
                                    </div> 
                                </div>
                                

                                <div class="row g-4 mt-4">
                                    <div class="col-lg-4 order-lg-2">
                                        <img 
                                            src="assets/images/about/history-01.webp" 
                                            width="267" height="267"
                                            alt="History"
                                            class="img-fluid w-100 object-fit-cover" 
                                        >
                                        <img 
                                            src="assets/images/about/history-02.webp" 
                                            width="267" height="267"
                                            alt="History"
                                            class="img-fluid w-100 object-fit-cover mt-3" 
                                        >
                                    </div>
                                    <div class="col-lg-8 order-lg-1"> 
                                        <h2>History:</h2>
                                        <p>During period of Jahangir this place was named Badh-e-dewan (district headquarters). The town owes its historical importance to being the headquarters of the Maharajas of Burdwan, the premier noblemen of lower Bengal, whose rent-roll was upwards of 300,000. Bardhaman Rajwas founded in 1657 by Sangam Rai, of the Kapoor Khatri family of Kotli in Lahore, Punjab, whose descendants served in turn the Mughal Emperors and the British government. The East Indian Railway from Howrah was opened in 1855. The great prosperity of the raj was due to the excellent management of Maharaja Mahtab Chand (d. 1879), whose loyalty to the government especially during the "Hul" (Santhal rebellion) of 1855-56 and the Indian rebellion of 1857was rewarded with the grant of a coat of arms in 1868 and the right to a personal salute of 13 guns in 1877. Maharaja Bijai Chand Mahtab (b. 1881), who succeeded his adoptive father in 1888, earned great distinction by the courage with which he risked his life to save that of Sir Andrew Fraser, the lieutenant-governor of Bengal, on the occasion of the attempt to assassinate him made by Bengali malcontents on 7 November 1908.</p> 
                                    </div> 
                                </div>
                                <div class="row g-4 mt-4">
                                    <div class="col-lg-4">
                                        <img 
                                            src="assets/images/about/history-03.webp" 
                                            width="267" height="267"
                                            alt="History"
                                            class="img-fluid w-100 object-fit-cover" 
                                        >
                                    </div>
                                    <div class="col-lg-8"> 
                                        <p>Mahtab Chand Bahadur and later Bijoy Chand Mahtab struggled their best to make this region culturally, economically and ecologically healthier. The chief educational institution was theBurdwan Raj college, which was entirely supported out of the maharaja's estate. Sadhak Kamalakanta as composer of devotional songs and Kashiram Das as a poet and translator of the great Mahabharata were possibly the best products of such an endeavour. The society at large also continued to gain the fruits. We find, among others, the great rebellious poet Kazi Nazrul Islam and Kala-azar-famed U. N. Brahmachari as the relatively recent illustrious sons of this soil. The town became an important center of North-Indian classical music as well.</p>
                                    </div> 
                                </div>


                                <h2 class="mt-5">Food:</h2>
                                <p>Sitabhog and Mihidana are two famous sweets of Burdwan, introduced first in honour of the Raj family. Shaktigarh's Langcha is another local speciality. <strong>Rice is the staple food of Bengal and is main agricultural produce of Burdwan district.</strong></p>

                                <h2 class="mt-5">The New Burdwan:</h2>
                                <p>Burdwan town, the heart of the district is also growing now. With an increasing number of people opting for better residential spaces and higher living standards. The Govt. of West Bengal is trying to bring in many new projects to facilitate the growth of Burdwan Township. Two large developments on a Public Private Partnership are coming up on the NH 2 connecting Kolkata and Delhi, on which Burdwan town lies. One of these is a Bus Terminus, with retail and other hospitality services. The other is a Mini Township at Goda, Burdwan. Also on the highway, this 250+ Acre mini township is being Developed by Bengal Shrachi Housing Dev. Ltd. It will revolutionise the way people see residential units in Burdwan. The Burdwan Development Authority is also playing a big role in these PPP projects.</p>




                            </div>
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
                                $data_type="about";
                                include("includes/direct-links.inc.php");
                            ?> 

                            <div class="mt-4">
                                <?php
                                    include("includes/poll-survey.inc.php");
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    <?php 
        $folder='root'; 
        include_once('includes/footer.inc.php'); 
    ?>  
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