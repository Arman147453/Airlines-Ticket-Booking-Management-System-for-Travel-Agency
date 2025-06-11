<?php
session_start();

if (!isset($_SESSION["passenger_id"])) {
    session_unset();
    session_write_close();
    header("Location: ../passenger_login_signup/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>

    <!-- Styles and Icons -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        .error-field {
            border: 1px solid #ee0000;
        }
        .required {
            font-size: 0.8em;
        }
        .trip-type {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .trip-option {
            display: inline-block;
            margin-right: 15px;
        }
        .trip-option input[type="radio"] {
            display: none;
        }
        .trip-option label {
            padding: 8px 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .trip-option input[type="radio"]:checked + label {
            background: #007bff;
            color: white;
            border-color: #007bff;
        }
        .return-date-group {
            display: none;
        }
    </style>
</head>
<body>

<input type="checkbox" id="nav-toggle">
<div class="sidebar">
    <div class="sidebar-brand">
        <h2><center><br/><span>Operations</span></center></h2>
    </div>
    <div class="sidebar-menu">
        <ul>
    </br>
            <li><a href="index.php"><span class="las la-home"></span><span>Dashboard</span></a></li><br/>
            <li><a href="#" class="active"><span class="las la-ticket-alt"></span><span>Book Ticket</span></a></li><br/>
            <li><a href="booking.php"><span class="las la-clipboard-list"></span><span>View Bookings</span></a></li><br/>
            <li><a href="profile.php"><span class="las la-user-circle"></span><span>Profile</span></a></li><br/>
            <li><a href="../passenger_login_signup/passenger_logout.php"><span class="las la-sign-out-alt"></span><span>Sign Out</span></a></li>
        </ul>
    </div>
</div>

<div class="main-content">
    <header>
        <h2><label for="nav-toggle"><span class="las la-bars"></span></label> Book Ticket</h2>
    </header>

    <main>
        <div class="card-single">
            <h5>Please fill the form to book your ticket</h5>
        </div><br/>
        <div class="card-single">
            <form action="search_flight.php" method="post" onsubmit="return formValidation()">
                <div class="trip-type">
                    <div class="trip-option">
                        <input type="radio" id="one-way" name="trip_type" value="one-way" checked>
                        <label for="one-way">One Way</label>
                    </div>
                    <div class="trip-option">
                        <input type="radio" id="round-trip" name="trip_type" value="round-trip">
                        <label for="round-trip">Round Trip</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Choose Flight Type</label>
                        <select name="flight_type" class="form-control" required>
                            <option value="" selected disabled>Select Flight Type</option>
                            <option value="Domestic">Domestic</option>
                            <option value="International">International</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Number of Passengers</label>
                        <input type="number" class="form-control" name="people" min="1" max="10" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Departure <span class="required error" id="from_info"></span></label>
                        <input list="airportList" type="text" class="form-control" id="start" name="start" placeholder="City or Airport" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Destination <span class="required error" id="to_info"></span></label>
                        <input list="airportList" type="text" class="form-control" id="destination" name="destination" placeholder="City or Airport" required>
                    </div>

                    <datalist id="airportList">
                        <option value="Dhaka (DAC)">
                        <option value="Kolkata (CCU)">
                        <option value="Delhi (DEL)">
                        <option value="Dubai (DXB)">
                        <option value="Kuala Lumpur (KUL)">
                        <option value="Singapore (SIN)">
                        <option value="Toronto (YYZ)">
                    </datalist>

                    <div class="form-group col-md-6">
                        <label>Departure Date</label>
                        <input type="date" class="form-control" id="departure-date" name="departure_date" min="<?= date('Y-m-d') ?>" required>
                    </div>

                    <div class="form-group col-md-6 return-date-group" id="return-date-group">
                        <label>Return Date</label>
                        <input type="date" class="form-control" id="return-date" name="return_date" min="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Travel Class</label>
                        <select name="class" class="form-control" required>
                            <option value="" selected disabled>Select Class</option>
                            <option value="Economy">Economy</option>
                            <option value="Business">Business</option>
                            <option value="First Class">First Class</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Meal Preference</label>
                        <select name="meal" class="form-control" required>
                            <option value="" selected disabled>Select Meal</option>
                            <option value="Veg">Vegetarian</option>
                            <option value="Non-Veg">Non-Vegetarian</option>
                            <option value="Veg/Non-Veg">No Preference</option>
                        </select>
                    </div>
                </div><br/>

                <center>
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="las la-search"></i> Search Flights
                    </button>
                </center>
            </form>
        </div>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Toggle return date field based on trip type
    $('input[name="trip_type"]').change(function() {
        if ($(this).val() === 'round-trip') {
            $('#return-date-group').show();
            $('#return-date').prop('required', true);
        } else {
            $('#return-date-group').hide();
            $('#return-date').prop('required', false);
        }
    });

    // Set minimum return date based on departure date
    $('#departure-date').change(function() {
        $('#return-date').attr('min', $(this).val());
    });
});

function formValidation() {
    let valid = true;
    const start = $("#start").val().trim();
    const destination = $("#destination").val().trim();
    const tripType = $('input[name="trip_type"]:checked').val();
    const returnDate = $("#return-date").val();

    // Reset error states
    $("#start, #destination").removeClass("error-field");
    $("#from_info, #to_info").html("");

    // Validate departure
    if (start === "") {
        $("#from_info").html("(required)").css("color", "#ee0000");
        $("#start").addClass("error-field");
        valid = false;
    }

    // Validate destination
    if (destination === "") {
        $("#to_info").html("(required)").css("color", "#ee0000");
        $("#destination").addClass("error-field");
        valid = false;
    }

    // Check if departure and destination are same
    if (start !== "" && destination !== "" && start === destination) {
        $("#from_info, #to_info").html("(cannot be same)").css("color", "#ee0000");
        $("#start, #destination").addClass("error-field");
        valid = false;
    }

    // Validate return date for round trips
    if (tripType === 'round-trip' && returnDate === "") {
        alert("Please select a return date for round trip");
        valid = false;
    }

    if (!valid) {
        $(".error-field").first().focus();
    }

    return valid;
}
</script>

</body>
</html>