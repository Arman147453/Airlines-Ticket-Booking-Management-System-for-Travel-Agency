<?php 
include "createdb.php";

// ** NOTE: This file will be responsible for the content displayed on welcome page
// like about us section, team members, faq etc.  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Travel Destination BD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

 
  <link href="assets_welcome_page/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets_welcome_page/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets_welcome_page/css/style.css" rel="stylesheet">


  <style>

#header .logo {
      font-size: 20px;
      margin: 0;
      padding: 0;
      line-height: 1;
      font-weight: 450;
      letter-spacing: 1px;
      text-transform: uppercase;
    }
    
    #header .logo img {
      max-height: 67px;
    }
    
    #hero .btn-get-started {
  font-family: "ahmed", arman;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 10px 28px 11px 28px;
  border-radius: 50px;
  transition: 0.5s;
  margin: 10px 0 0 0;
  color: #fff;
  background: #ee7a1b;
}
#hero .btn-get-started:hover {
  background: #db5d08;
}

    .col-sm-3 {
    width: 100%;
  }

    </style>

</head>

<body>

<!-- This part is for the top navigation bar containing link to different pages  -->

  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto"><img src="assets_welcome_page/img/Copy of main_logo.png" alt="Logo" class="img-fluid"></a>
      
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="process_login_signup.php">Book now</a></li>
          <li><a class="nav-link scrollto" href="search_flights.php">Search flights</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
          <li><a class="getstarted scrollto" href="process_login_signup.php">Login/Signup</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

  <!-- This part is for the book now and search flights button along with the airplane picture -->

  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">

        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
          data-aos="fade-up" data-aos-delay="200">
          <h1>Welcome To<br>Travel Destination BD!</h1>

          <h2>Find Cheap Flights, Airline Tickets in Bangladesh</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="process_login_signup.php" class="btn-get-started scrollto">Book Now</a>
            <span>
              &nbsp;&nbsp;
              <a href="search_flights.php" class="btn-get-started scrollto">Search flights</a>
            </span>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets_welcome_page\img\d-2.jpg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>

  <main id="main">
<!-- This part is for showing the partner airlines logos  -->

    <section id="cliens" class="cliens section-bg">
      <div class="container">
        <div class="section-title">
        <div style="margin-top: 30px;">
    <h2>Most Popular Airlines</h2>
    <p>
        Discover top airlines on <strong>Travel Destination BD</strong> and seamlessly search any flight.
        Get online tickets instantly and enjoy effortless access to global travel.
    </p>
</div>

        </div>

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic6.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets_welcome_page/img/planes_profile/pic7.png" class="img-fluid" alt="">
          </div>


        </div>

      </div>
    </section>

  <!-- This part contains the about us section desribing our project proposal in brief   -->

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
          <p class="fw-bold fs-4">Our Services:</p>

            <ul>
              <li><i class="ri-check-double-line"></i> Domestic & International Air Tickets</li>
              <li><i class="ri-check-double-line"></i> Customized Tour Packages.</li>
              <li><i class="ri-check-double-line"></i> Worldwide Visa Assistance</li>
              <li><i class="ri-check-double-line"></i> Affordable Umrah Packages</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            <h3>Intro of Travel Destination BD</h3>
<p>
    It is a pleasure to introduce ourselves as one of the leading and proficient tour organizers in Bangladesh.
    We are organizing all kinds of Domestic & International Air Tickets, Tour Packages & worldwide Visa processing.
    We are a team of qualified and experienced chauffeurs with specialists on particular destinations and activities.
    Our aim is to provide incomparable services with affordable prices.
</p>
<p>
    So book with Travel Destination BD – your desired Tour Package and experience.
</p>

            </p>
          </div>
    </section>

<!-- This part displays the name and roll number of our team members  -->

    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>Meet our team members who have developed this company</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="assets_welcome_page\img\486636730_1868370663987491_3052867901299553724_n.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Arman Ahmed</h4>
                <span>Chief Executive Officer (CEO)</span>
                <p>22103181</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="assets_welcome_page\img\IMG-20250416-WA0010.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Tuli Madhu</h4>
                <span>Chief Marketing Officer (CMO)</span>
                <p>22103171</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="assets_welcome_page\img\7089218f-ce3e-42e0-a6ee-6495a60b9b48.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Suraiya</h4>
                <span>Executive Officer (Sales & Reservation)</span>
                <p>22103153</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="assets_welcome_page\img\475457981_2376471759383683_6674282097603754668_n.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Kawsar Hasan Swajan</h4>
                <span>Executive Officer (Sales & Marketings)</span>
                <p>22103429</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- This part dsiplays the FAQ to the users who are new to our website  -->

    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Here you will find some of the frequently asked questions by our passengers.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                data-bs-target="#faq-list-1">Can you book a flight on Travel Destination BD?<i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                Yes, we provide both domestic and international flight services. Please let us know your travel plan to assist you in finding the preferred flight.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"
                class="collapsed">Will it cost any extra charge if I purchase through a card from Travel Destination BD?<i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                During an online or an offline transaction there is a convenience fee that customers have to pay. However, there is no extra charge on anything you purchase from Travel Destination BD be it online or offline.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3"
                class="collapsed">What is TDBD Convenience Fee?<i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                TDBDT Convenience fee is the charge that the customer needs to pay for the support, convenience and service that he/she is availing from the online platforms.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4"
                class="collapsed">Is the TDBD Convenience Fee refundable?<i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                TDBD Convenience Fee is non-refundable. 
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5"
                class="collapsed">What are the contact details for any queries of Travel Destination BD?<i
                  class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                Contact number: +880 1967-686862
                & Email: tdestination12@gmail.com
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section>


  </main>


  
  <footer id="footer">


    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Airline Management system | Arman Project for CSC 470</span></strong>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Below are some javascripts files required for the animation and display features for this page  -->

  <script src="assets_welcome_page/vendor/aos/aos.js"></script>
  <script src="assets_welcome_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_welcome_page/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets_welcome_page/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets_welcome_page/vendor/php-email-form/validate.js"></script>
  <script src="assets_welcome_page/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets_welcome_page/vendor/waypoints/noframework.waypoints.js"></script>

  
  <script src="assets_welcome_page/js/main.js"></script>

</body>

</html>