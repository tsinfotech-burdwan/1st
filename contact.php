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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">    
    <title>Post Your Feedback/Complain</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <?php $folder='root'; include_once('includes/stylesheets.inc.php'); ?>
</head>

<body>
    <?php $folder='root'; include_once('includes/header.inc.php'); ?>
    <main>
        <header class="header__wrapper pt-5 pb-4 text-center text-lg-start">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-5">
                        <h1 class="display-6 large ff-heading text-white position-relative ps-4">
                            <span class="line d-block position-absolute bg-primary start-0 top-50 translate-middle-y"></span>
                            <span>Post Your Feedback/Complain</span>
                        </h1>
                    </div>
                    <div class="col-lg-7">
                        <div class="position-relative">
                            <div class="border border-2 border-white position-absolute border__layer"></div>
                            <img src="assets/images/common/History-of-Burdwan-Municipality.jpg" width="746" height="250"
                                alt="Post Your Feedback/Complain"
                                class="img-fluid subpage__thumbnail w-100 object-fit-cover "
                                style="object-position: center top;">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="py-5 cms__content__wrapper">
            <div class="card-header">                
            </div>
            <div class="container py-md-5">
                <div class="row g-4"> 
                    <div class="col-lg-7">
                        <form action="adminPanel/backendFilesFolders/contactUsBackEnd" class="row row-cols-1 row-cols-md-2 g-4 ">
                            <div>
                                <label for="full_name" class="">Full Name</label>
                               <input type="text" name="name" id="name" class="form-control" onchange="validateFullName();">
                            </div> 
                             <div>
                                <label for="emailID" class="">Email ID</label>
                               <input type="email" name="emailID" id="emailID" class="form-control" onchange="validateEmailId();">
                            </div>                          
                            <div>
                                <label for="mobile" class="">Phone Number</label>
                                <input type="number" name="mobile" id="mobile" class="form-control" onchange="validateContact();">
                            </div>
                            <div>
                                <label for="subject" class="">Subject</label>
                                <input type="text" name="subject" id="subject" class="form-control">
                            </div>
                            <div class=" col-md-12">
                                <label for="message" class="">Message</label>
                                <textarea name="message" id="message" cols="30" rows="4" class="form-control" ></textarea>
                            </div>
                            <div class="col-auto">
                                <button type="button" onclick="submitDetails();" id="submitButton" class="btn btn-primary mr-1 mb-1">Submit</button>
                                <button style="display:none;" id="loadingButton" class="btn btn-danger mb-1" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                            </div>
                        </form>     



                    </div><!--./col--> 
                     

                    <div class="col-lg-5">
                        <div class="usav__box text-white p-4 p-xl-5" style="border-radius: 2rem 0 2rem 0;">
                            <p class="fs-4">Office Of the Burdwan Municipality</p>

                            <ul class="d-flex flex-column gap-3 contact__info__list lead-sm fw-medium">
                                <li class="d-flex align-items-center ">
                                    <figure class="icon__box bg-white mb-0 rounded-3 d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 32 32"><path fill="#707070" d="M16 2A11.013 11.013 0 0 0 5 13a10.889 10.889 0 0 0 2.216 6.6s.3.395.349.452L16 30l8.439-9.953c.044-.053.345-.447.345-.447l.001-.003A10.885 10.885 0 0 0 27 13A11.013 11.013 0 0 0 16 2m0 15a4 4 0 1 1 4-4a4.005 4.005 0 0 1-4 4"/><circle cx="16" cy="13" r="4" fill="none"/></svg>
                                    </figure>
                                    <div class="col ps-3">
                                        <address class="mb-0">101, G.T.Road, Burdwan Municipality, Burdwan, West Bengal, India – 713101</address>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center ">
                                    <figure class="icon__box bg-white mb-0 rounded-3 d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24"><path fill="#707070" d="M13 8a3 3 0 0 1 3 3a1 1 0 0 0 2 0a5 5 0 0 0-5-5a1 1 0 0 0 0 2"/><path fill="#707070" d="M13 4a7 7 0 0 1 7 7a1 1 0 0 0 2 0a9 9 0 0 0-9-9a1 1 0 0 0 0 2m8.75 11.91a1 1 0 0 0-.72-.65l-6-1.37a1 1 0 0 0-.92.26c-.14.13-.15.14-.8 1.38a9.91 9.91 0 0 1-4.87-4.89C9.71 10 9.72 10 9.85 9.85a1 1 0 0 0 .26-.92L8.74 3a1 1 0 0 0-.65-.72a3.79 3.79 0 0 0-.72-.18A3.94 3.94 0 0 0 6.6 2A4.6 4.6 0 0 0 2 6.6A15.42 15.42 0 0 0 17.4 22a4.6 4.6 0 0 0 4.6-4.6a4.77 4.77 0 0 0-.06-.76a4.34 4.34 0 0 0-.19-.73"/></svg>
                                    </figure>
                                    <div class="col ps-3">
                                        <span class="mb-0"> +91 0342 2662518 / 2664121 / 2662777</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center ">
                                    <figure class="icon__box bg-white mb-0 rounded-3 d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24"><path fill="#707070" d="M2.885 20.5v-12H7.5v1h.808V4.846h9V9.5h3.23v10H7.5v1zm1-1H6.5v-10H3.885zm5.423-10h7V5.846h-7zm-1.808 9h12.038v-8H7.5zM8.808 17h4v-5h-4zM7.5 18.5v-8zm6.308-4.5h2v-2h-2zm2.807 0h2v-2h-2zm-2.807 3h2v-2h-2zm2.807 0h2v-2h-2z"/></svg>
                                    </figure>
                                    <div class="col ps-3">
                                        <span class="mb-0">+91 0342 2560717</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center ">
                                    <figure class="icon__box bg-white mb-0 rounded-3 d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 20 20"><path fill="#707070" d="M3.87 4h13.25C18.37 4 19 4.59 19 5.79v8.42c0 1.19-.63 1.79-1.88 1.79H3.87c-1.25 0-1.88-.6-1.88-1.79V5.79c0-1.2.63-1.79 1.88-1.79m6.62 8.6l6.74-5.53c.24-.2.43-.66.13-1.07c-.29-.41-.82-.42-1.17-.17l-5.7 3.86L4.8 5.83c-.35-.25-.88-.24-1.17.17c-.3.41-.11.87.13 1.07z"/></svg>
                                    </figure>
                                    <div class="col ps-3">
                                        <a href="mailto:burdwanmunicipality@gmail.com" class="mb-0 text-white">burdwanmunicipality@gmail.com</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center ">
                                    <figure class="icon__box bg-white mb-0 rounded-3 d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24"><path fill="#707070" d="M12.003 21q-1.866 0-3.51-.708q-1.643-.709-2.859-1.924t-1.925-2.856T3 12.003t.708-3.51t1.924-2.859t2.856-1.925T11.997 3t3.51.708t2.859 1.924t1.925 2.856t.709 3.509t-.708 3.51t-1.924 2.859t-2.856 1.925t-3.509.709M12 20q3.35 0 5.675-2.325T20 12q0-.175-.003-.353t-.022-.341q-.067.667-.53 1.104q-.464.436-1.137.436h-2.539q-.698 0-1.195-.496t-.497-1.194v-.844h-3.385v-1.69q0-.697.497-1.198q.498-.5 1.196-.5h.846v-.77q0-.729.476-1.147t1.137-.482q-.673-.26-1.38-.392T12 4Q8.65 4 6.325 6.325T4 12v.288q0 .135.02.289H8.5q1.42 0 2.402.983t.983 2.393v.855H9.346v2.73q.616.222 1.286.342T12 20"/></svg>
                                    </figure>
                                    <div class="col ps-3">
                                        <a href="www.burdwanmunicipality.gov.in" class="mb-0 text-white">www.burdwanmunicipality.gov.in</a>
                                    </div>
                                </li>
                            </ul>

                            <p class="fs-4 pt-4 mt-4 border-top">Direct Email IDs</p>

                            <ul class="d-flex flex-column gap-3 contact__info__list lead-sm fw-medium"> 
                                <li class="d-flex align-items-center ">
                                    <figure class="icon__box bg-white mb-0 rounded-3 d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24"><path fill="#707070" d="M13 8a3 3 0 0 1 3 3a1 1 0 0 0 2 0a5 5 0 0 0-5-5a1 1 0 0 0 0 2"/><path fill="#707070" d="M13 4a7 7 0 0 1 7 7a1 1 0 0 0 2 0a9 9 0 0 0-9-9a1 1 0 0 0 0 2m8.75 11.91a1 1 0 0 0-.72-.65l-6-1.37a1 1 0 0 0-.92.26c-.14.13-.15.14-.8 1.38a9.91 9.91 0 0 1-4.87-4.89C9.71 10 9.72 10 9.85 9.85a1 1 0 0 0 .26-.92L8.74 3a1 1 0 0 0-.65-.72a3.79 3.79 0 0 0-.72-.18A3.94 3.94 0 0 0 6.6 2A4.6 4.6 0 0 0 2 6.6A15.42 15.42 0 0 0 17.4 22a4.6 4.6 0 0 0 4.6-4.6a4.77 4.77 0 0 0-.06-.76a4.34 4.34 0 0 0-.19-.73"/></svg>
                                    </figure>
                                    <div class="col ps-3">
                                        <span class="fs-13">Chairman, Burdwan Municipality</span>
                                        <a href="tel:+9103422662777" class="mb-0 text-white">+91 0342 2662777</a>
                                    </div>
                                </li> 
                                <li class="d-flex align-items-center ">
                                    <figure class="icon__box bg-white mb-0 rounded-3 d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 20 20"><path fill="#707070" d="M3.87 4h13.25C18.37 4 19 4.59 19 5.79v8.42c0 1.19-.63 1.79-1.88 1.79H3.87c-1.25 0-1.88-.6-1.88-1.79V5.79c0-1.2.63-1.79 1.88-1.79m6.62 8.6l6.74-5.53c.24-.2.43-.66.13-1.07c-.29-.41-.82-.42-1.17-.17l-5.7 3.86L4.8 5.83c-.35-.25-.88-.24-1.17.17c-.3.41-.11.87.13 1.07z"/></svg>
                                    </figure>
                                    <div class="col ps-3">
                                        <span class="fs-13 lh-1">Burdwan Municipality (All Purpose)</span>
                                        <a href="mailto:burdwanmunicipality@gmail.com" class="mb-0 text-white lh-1">burdwanmunicipality@gmail.com</a>
                                    </div>
                                </li>
                                 
                            </ul>

                        </div>
                    </div>
                    
                </div><!--.//row-->



            </div> 
        </section>
        
        <div class=" ratio ratio-4x3 overflow-hidden" style="max-height: 400px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.8752322768078!2d87.86635131497194!3d23.247626884839626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f849c21530606d%3A0x1f021e912ece6f25!2sBurdwan+Municipality!5e0!3m2!1sen!2sin!4v1483021636618" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen=""></iframe>
        </div>
    </main>
    <script>  
        function validateFullName()
        {
            name=document.getElementById("name").value;
            var reg = /^[A-Za-z ]+$/;
            if(reg.test(name)==false) 
            {
                alert("Please Provide Valid Name Befor Submit");
                document.getElementById("name").value = "";
                return;
            }
            else
            {
                var datastring="name="+name+"&role=validateFullName";
                $.ajax({
                    url: "checkContactNumberBackend",
                    type:"post",
                    catch:false,
                    data:datastring,
                    success: function(result)
                    {
                        str1=result;
                        str1=str1.trim();
                        
                        if(!(str1.localeCompare("1")))
                        {
                            alert("Error In Full Name.");
                            document.getElementById("name").value = "";
                            return;
                        }
                    }
                });
            }
        }
        function validateEmailId()
        {
            emailID=document.getElementById("emailID").value;
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if(reg.test(emailID)==false) 
            {
                alert("Please Provide Valid E-Mail ID Befor Submit");
                document.getElementById("emailID").value = "";
                return;
            }
            else
            {
                var datastring="emailID="+emailID+"&role=validateEmailId";
                $.ajax({
                    url: "checkContactNumberBackend",
                    type:"post",
                    catch:false,
                    data:datastring,
                    success: function(result)
                    {
                        str1=result;
                        str1=str1.trim();
                        
                        if(!(str1.localeCompare("1")))
                        {
                            alert("Error In E-Mail ID.");
                            document.getElementById("emailID").value = "";
                            return;
                        }
                    }
                });
            }
        }  
        function validateContact()
        {
            mobile=document.getElementById("mobile").value;
            if(mobile.length!=10)
            {
                alert("Please Provide Mobile Number Befor Submit");
                document.getElementById("mobile").value = "";
                return;
            }
            else
            {
                var datastring="mobile="+mobile+"&role=validateContact";
                $.ajax({
                    url: "checkContactNumberBackend",
                    type:"post",
                    catch:false,
                    data:datastring,
                    success: function(result)
                    {
                        str1=result;
                        str1=str1.trim();
                        
                        if(!(str1.localeCompare("1")))
                        {
                            alert("Error In Contact Number.");
                            document.getElementById("mobile").value = "";
                            return;
                        }
                    }
                });
            }
        }          
        function submitDetails()
        {
            document.getElementById("submitButton").style.display = "none";
            document.getElementById("loadingButton").style.display = "block";
            
            name=document.getElementById("name").value;
            mobile=document.getElementById("mobile").value;
            subject=document.getElementById("subject").value;
            message=document.getElementById("message").value;
            emailID=document.getElementById("emailID").value;
            
            
            if(name=="")
            {
                alert("Please Provide Your Name Befor Submit");
                document.getElementById("submitButton").style.display = "block";
                document.getElementById("loadingButton").style.display = "none";
                return;
            }
            else if(mobile=="")
            {
                alert("Please Provide Mobile Number Befor Submit");
                document.getElementById("submitButton").style.display = "block";
                document.getElementById("loadingButton").style.display = "none";
                return;
            }
            else if(emailID=="")
            {
                alert("Please Provide Email ID Befor Submit");
                document.getElementById("submitButton").style.display = "block";
                document.getElementById("loadingButton").style.display = "none";
                return;
            }
            else if(subject=="")
            {
                alert("Please Provide Subject Befor Submit");
                document.getElementById("submitButton").style.display = "block";
                document.getElementById("loadingButton").style.display = "none";
                return;
            }
            else if(message=="")
            {
                alert("Please Provide Details Description Befor Submit");
                document.getElementById("submitButton").style.display = "block";
                document.getElementById("loadingButton").style.display = "none";
                return;
            }                
            else
            {
                var datastring="name="+name+"&mobile="+mobile+"&subject="+subject+"&emailID="+emailID+"&message="+message+"&role=addContact";
                $.ajax({
                    url: "adminPanel/backendFilesFolders/contactUsBackEnd",
                    type:"post",
                    catch:false,
                    data:datastring,
                    success: function(result)
                    {
                        str1=result;
                        str1=str1.trim();
                        
                        if(!(str1.localeCompare("1")))
                        {
                            alert("Feedback/Complain Added Successfully !!!");
                            location.reload();
                        }
                        else if(!(str1.localeCompare("2")))
                        {
                            alert("Feedback/Complain Not Added!!!");
                            document.getElementById("submitButton").style.display = "block";
                            document.getElementById("loadingButton").style.display = "none";
                            return;
                        }
                        else if(!(str1.localeCompare("3")))
                        {
                            alert("Role Mismatched!!!");
                            document.getElementById("submitButton").style.display = "block";
                            document.getElementById("loadingButton").style.display = "none";
                            location.reload();
                        }
                        else if(!(str1.localeCompare("4")))
                        {
                            alert("Special Character Is Available in Provided Data!!!");
                            document.getElementById("submitButton").style.display = "block";
                            document.getElementById("loadingButton").style.display = "none";
                            return;
                        }
                        else
                        {
                            alert("Database error "+result+" !!!");
                            document.getElementById("submitButton").style.display = "block";
                            document.getElementById("loadingButton").style.display = "none";
                            return;
                        }
                    }
                });
            }
        }
    </script>
    <!-- Footer and Script List -->
    <?php $folder='root'; include_once('includes/footer.inc.php'); ?>    
</body> 
</html>