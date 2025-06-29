<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Search flights | Travel Destination BD</title>

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
      max-height: 40px;
    }

    .col-sm-3 {
      width: 20%;
      text-align: left;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 2rem;
      margin-top: 1rem;
    }

    .card-single {
      display: flex;
      justify-content: space-between;
      background: #fff;
      padding: 2rem;
      border-radius: 2px;
      box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
    }

    .card-single div:last-child span {
      font-size: 3rem;
      color: var(--main-color);
    }

    .card-single div:first-child span {
      color: var(--text-grey);
    }

    label {
      float: left
    }

    span {
      display: block;
      overflow: visible;
      padding: 0 4px 0 6px
    }

    input {
      width: 100%;
    }

    .form-group input {
      width: 600px !important;
    }
  </style>
</head>

<body>

  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo me-auto">
        <img src="assets_welcome_page/img/Copy of main_logo.png" alt="Logo" class="img-fluid">
      </a>
      <h1 class="logo me-auto"><a href="index.php">Travel Destination BD</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="process_login_signup.php">Book now</a></li>
          <li><a class="nav-link scrollto active" href="search_flights.php">Search flights</a></li>
          <li><a class="nav-link scrollto" href="index.php#faq">FAQ</a></li>
          <li><a class="getstarted scrollto" href="process_login_signup.php">Login/Signup</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Search flights</li>
        </ol>
        <h2>Search flights</h2>
      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="container-fluid h-100">
          <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4 page-title">
              <h3 style="color: orangered;font-family: Verdana, Geneva, Tahoma, sans-serif ;font-weight: bold;border-bottom: 1px solid #e7510c;padding-bottom: 10px;">
                SEARCH FOR FLIGHTS
              </h3>
              <br>

              <div class="card-single">
                <form action="search_results.php" method="post" onsubmit="return formValidation()">
                  <div class="form-row">
                    <div class="form-group col-md-6" style="text-align:left;">
                      <label for="start">From: <span class="required error" id="from_info"></span></label>
                      <input list="airportList" id="start" name="start" class="form-control" pattern="[a-zA-Z\s]+" maxlength="50" placeholder="Enter Source" required>
                    </div>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="form-group col-md-6" style="text-align:left;">
                      <label for="destination">To: <span class="required error" id="to_info"></span></label>
                      <input list="airportList" id="destination" name="destination" class="form-control" pattern="[a-zA-Z\s]+" maxlength="50" placeholder="Enter Destination" required>
                    </div>

                    <datalist id="airportList">
                      <option value="Dhaka">
                      <option value="Saidpur">
                      <option value="Coxs Bazar">
                      <option value="Chittagong">
                      <option value="Rajshahi">
                      <option value="Sylhet">
                      <option value="Barishal">
                    </datalist>

                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <div class="form-group col-md-6" style="text-align:left;">
                      <label for="date">Departure Date:<span class="required error" id="doj_info"></span></label>
                      <input type="date" id="date" name="date" class="form-control" required>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Find Flights</button>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <script>
      function formValidation() {
        var valid = true;

        $("#start").removeClass("error-field");
        $("#destination").removeClass("error-field");
        $("#date").removeClass("error-field");

        var Start = $("#start").val();
        var Destination = $("#destination").val();
        var Doj = $("#date").val();

        if (Start.trim() == "") {
          $("#from_info").html("required.").css("color", "#ee0000").show();
          $("#start").addClass("error-field");
          valid = false;
        }

        if (Destination.trim() == "") {
          $("#to_info").html("required.").css("color", "#ee0000").show();
          $("#destination").addClass("error-field");
          valid = false;
        }

        if (Doj.trim() == "") {
          $("#doj_info").html("required.").css("color", "#ee0000").show();
          $("#date").addClass("error-field");
          valid = false;
        }

        if (!valid) {
          $('.error-field').first().focus();
        }

        return valid;
      }
    </script>

  </main>

  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong>Airline Management system | Arman Project Autumn 2025</strong>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
