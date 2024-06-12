<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);

   $phone = $_POST['phn'];
   $phone = filter_var($phone, FILTER_SANITIZE_STRING);

   $dob = $_POST['dob'];
   $dob = filter_var($dob, FILTER_SANITIZE_STRING);

   $blood = $_POST['blood'];
   $blood = filter_var($blood, FILTER_SANITIZE_STRING);

   $business_category = $_POST['business category'];
   $business_category = filter_var($business_category, FILTER_SANITIZE_STRING);

   $nature_business = $_POST['nature business'];
   $nature_business = filter_var($nature_business, FILTER_SANITIZE_STRING);

   $business_segment = $_POST['business segment'];
   $business_segment = filter_var($business_segment, FILTER_SANITIZE_STRING);

   $business_add = $_POST['business add'];
   $business_add = filter_var($business_add, FILTER_SANITIZE_STRING);

   $pincode = $_POST['pincode'];
   $pincode = filter_var($pincode, FILTER_SANITIZE_STRING);

   $city = $_POST['city'];
   $city = filter_var($city, FILTER_SANITIZE_STRING);

   $locality = $_POST['locality'];
   $locality = filter_var($locality, FILTER_SANITIZE_STRING);


   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'uploaded_img/'.$image;
   


   $select = $conn->prepare("SELECT * FROM `listing_user` WHERE `Number` = ?");
   $select->execute([$phone]);

   if($select->rowCount() > 0){
      $message[] = 'user already exist!';
   }else{
      if($image_size > 2000000){
        $message[] = 'image size is too large!';
      }else{
         $insert = $conn->prepare("INSERT INTO `listing_user`(`name`, `gender`, `Number`, `dob`, `blood group`, `business category`, `nature of business`, `business segment`, `business add`, `pin code`, `city`, `locality`, `photo`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
         $insert->execute([$name, $gender, $phone, $dob, $blood, $business_category,$nature_business,$business_segment,$business_add,$pincode,$city,$locality,$image]);
         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered succesfully!';
            header('location:regester_done.php');
         }
      }
   }

}

?>








<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>Mediplus - Free Medical and Doctor Directory HTML Template.</title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
		
    </head>
    <body>
	

    <?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
  



		<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
		
		<!-- Get Pro Button -->
		<!-- Header Area -->
		<header class="header" >
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.html"><img src="https://businesssphere.info/uploads/web_photo_upload/171610104193261.png" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="active"><a href="index.html">Home </a>
											</li>
											<li><a href="#">Directory Listing Form </a></li>
											<li><a href="#">Directory </a></li>
											<li><a href="about.html">About</a>	
											</li>
											<li><a href="contact.html">Contact Us</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-12">
								<div class="get-quote">
									<a href="appointment.html" class="btn">Login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
	
        <!--start form  section-->	
        <div class="container">
            <div class="row">
				<div class="col-12">
					<img 
                    src="https://img.freepik.com/premium-photo/close-up-woman-s-hand-is-writing-paper_85574-4460.jpg?w=840"
                    class="form-img"
                />
				</div>
            </div>
        </div>

		<section class="contact-us section">
			<div class="container">
				<div class="inner">
					<div class="row"> 
						<div class="col-lg-12">
                            <form class="form-mian-container" action="" method="post" enctype="multipart/form-data">
                                <div class="form-content-container">
                                    <h1>Listing Form</h1>
                                    <p>Please Fill the Form Carefully.</p>
                                    <p>Informations shared by you is important for your Credential & Directory listing.</p>
                                </div>
                                <div class="input-and-label-container">
                                    <div class="input-container">
                                        <laberl class="label required">Name*</laberl>
                                    <br/>
                                        <input type="text" class="input" placeholder="Name" name="name" required/>
                                    </div>
                                    <div class="input-container">
                                        <laberl class="label required" required>Gender*</laberl>
                                    <br/>
                                        <select class="option" name="gender" required>
                                            <option class="option-element">Select Your Gende</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-and-label-container">
                                    <div class="input-container">
                                        <laberl class="label required">Whatsapp No*</laberl>
                                    <br/>
                                        <input required type="text" class="input" placeholder="Whatsapp Number" name="phn"/>
                                    </div>
                                    <div class="input-container">
                                        <laberl class="label ">Alternate No</laberl>
                                    <br/>
                                        <input type="text" class="input" placeholder="Alternate No"/>
                                    </div>
                                </div>
                                <div class="align">
                                    <div class="input-one">
                                        <laberl class="label ">Email Id</laberl>
                                    <br/>
                                        <input type="text" class="input" placeholder="Email Id"/>
                                    </div>
                                </div>	
                                <div class="input-and-label-container">
                                    <div class="input-container">
                                        <laberl class="label required">Date of Birth**</laberl>
                                    <br/>
                                        <input required type="date" class="input" placeholder="Date of Birth" name="dob"/>
                                    </div>
                                    <div class="input-container">
                                        <laberl class="label ">Date of Marriage Anniversary</laberl>
                                    <br/>
                                        <input type="date" class="input" placeholder="Date of Marriage Anniversary"/>
                                    </div>
                                </div>
                                <div class="input-and-label-container">
                                    <div class="input-container">
                                        <laberl class="label">Blood Rroup</laberl>
                                    <br/>
                                        <select class="option" name="blood">
                                            <option>A-</option>
                                            <option>A+</option>
                                            <option>B-</option>
                                            <option>B+</option>
                                            <option>AB-</option>
                                            <option>AB+</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                        </select>
                                    </div>
                                    <div class="input-container">
                                        <laberl class="label ">Interest Area</laberl>
                                    <br/>
                                    <input type="text" class="input" placeholder="Interest Area"/>
                                    </div>
                                </div>
                                <div class="input-and-label-container">
                                    <div class="input-container">
                                        <laberl class="label ">Business Entity Name</laberl>
                                    <br/>
                                        <input type="text" class="input" placeholder="Business Name"/>
                                    </div>
                                    <div class="input-container">
                                        <laberl class="label required">Business Category*</laberl>
                                    <br/>
                                    <input required type="text" class="input" placeholder="Business Category" name="business category"/>
                                    </div>
                                </div>
                                <div class="input-and-label-container">
                                    <div class="input-container">
                                        <laberl class="label required">Nature Of Business*</laberl>
                                    <br/>
                                        <select class="option" name="nature business" required>
                                            <option>Manufacture</option>
                                            <option>Retailer</option>
                                            <option>Servies</option>
                                            <option>Professional</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                    <div class="input-container">
                                        <laberl class="label required">Business Segment*</laberl>
                                    <br/>
                                    <input required type="text" class="input" placeholder="Business Segment" name="business segment"/>
                                    </div>
                                </div>
                                <div class="align">
                                    <div class="input-one">
                                        <laberl class="label required">Business Address*</laberl>
                                    <br/>
                                        <input required type="text" class="input" placeholder="Business Address" name="business add"/>
                                    </div>
                                </div>
                                <div class="input-and-label-container">
                                    <div class="input-container">
                                        <laberl class="label required">Pin Code*</laberl>
                                    <br/>
                                        <input required type="text" class="input" placeholder="Pin Code" name="pincode"/>
                                    </div>
                                    <div class="input-container">
                                        <laberl class="label required">Locality*</laberl>
                                    <br/>
                                    <input required type="text" class="input" placeholder="Locality" name="locality"/>
                                    </div>
                                </div>
                                <div class="input-and-label-container">
                                    <div class="input-container">
                                        <laberl class="label required">City*</laberl>
                                    <br/>
                                        <select class="option" name="city" required>
                                            <option>Kolkata</option>
                                            <option>Nearby Kolkata</option>
                                            <option>Outside West Bengal</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="input-container">
                                        <laberl class="label ">Website Link</laberl>
                                    <br/>
                                    <input type="text" class="input" placeholder="Website Link"/>
                                    </div>
                                </div>
                                <div class="align">
                                    <div class="input-two">
                                        <laberl class="label ">Business Descriptio(Maximum 300 characters including spaces & special characters)</laberl>
                                    <br/>
                                        <textarea class="textarea" rows="4" cols="50" placeholder="Max 350 characters with Space"></textarea>
                                    </div>
                                </div>	
                                <div class="input-and-label-container">
                                    <div class="input-and-image-container">
                                        <laberl class="label required">Upload Your Photo*<span class="span required">(Upload JPEG, JPG or PNG file and Image size less than 2 MB. Direct Mobile camera photos size may exceed the size)</span></laberl>
                                    <br/>
                                        <input required type="file" accept="image/jpg, image/png, image/jpeg" class="input" placeholder="upload your photo" name="image"/>
                                    </div>
                                    <div class="input-container">
                                        <laberl class="label ">Logo Upload(Upload a JPEG, JPG or PNG file)</laberl>
                                    <br/>
                                    <input type="file" accept="image/" class="input" placeholder="Logo Upload"/>
                                    </div>
                                </div>
                                <div class="input-and-label-container">
                                    <div>
                                        <p class="captcha-input">Captcha</p>
                                        <p class="captcha-input">Captcha</p>
                                    </div>
                                    <div>
                                        <label class="captcha-input required">Captcha*</label>
                                        <input type="text" class="captcha-input" placeholder="Enter Captcha Code"/>
                                    </div>
                                    <div>
                                        <img 
                                            src="https://businesssphere.info/images/GpayQR.jpeg"
                                            class="qr-code"
                                        />
                                        <p class="gpay required">Gpay, Paytm and Phonepay is at +91-9331177595</p>
                                    </div>
                                </div>
                                <div class="align col-12">
                                    <div class="input-two checkbox">
                                        <input type="checkbox" class="checkbox-input" required/>
                                        <p class="condition">
                                            I accept all the Terms & Conditions framed to manage the Forum & any changes therein.
                                            I have Paid/ Ready to pay Rs. 150 as Annual Website Listing Fees for Directory Listing and maintenance of Website.
                                            Form once filled will not be editable. Backend and support team to be requested for any changes, I accept it to be nominally charged.
                                        </p>
                                    </div>
                                </div>	
                                <div class="btn-container">
                                <input type="submit" value="Submit" class="btn" name="submit">
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</section>
        <!--end from  section-->	
		<!-- Footer Area -->
		<footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12">
							<img 
								src="https://businesssphere.info/uploads/web_photo_upload/171610104193261.png"
								class="logo-footer"                
                			/>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer f-link">
								<h2>Useful Link</h2>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="index.html"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
											<li><a href="about.html"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Directory</a></li>
											<li><a href="about.html"><i class="fa fa-caret-right" aria-hidden="true"></i>Why choose Us</a></li>
										</ul>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Listing Form</a></li>
											<li><a href="about.html"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Process</a></li>
											<li><a href="faq-section.html"><i class="fa fa-caret-right" aria-hidden="true"></i>FAQ</a></li>
											<li><a href="contact.html"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>	
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Contact Us</h2>
								<ul class="time-sidual">
									<li ><i class="fa fa-phone list-item"></i>+91-85 82 84 84 34</li>
									<li><i class="fa fa-envelope list-item"></i><a href="mailto:support@yourmail.com">sskjha2016@gmail.com</a></li>
									<li><i class="icofont-google-map list-item"></i><a href="mailto:support@yourmail.com">Kolkata</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2024 |  All Rights Reserved by <a href="https://www.wpthemesgrid.com" target="_blank">wpthemesgrid.com</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->
		
		<!-- jquery Min JS -->
        <script src="js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="js/easing.js"></script>
		<!-- Color JS -->
		<script src="js/colors.js"></script>
		<!-- Popper JS -->
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="js/steller.js"></script>
		<!-- Wow JS -->
		<script src="js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Google Map API Key JS -->
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyDGqTyqoPIvYxhn_Sa7ZrK5bENUWhpCo0w"></script>
		<!-- Gmaps JS -->
		<script src="js/gmaps.min.js"></script>
		<!-- Map Active JS -->
		<script src="js/map-active.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>
    </body>
</html>