<?php
session_start();

if (!isset($_SESSION["passenger_id"])) {
    session_unset();
    session_write_close();
    header("Location: ../passenger_login_signup/index.php");
    exit();
}

// Get form data
$trip_type = $_POST['trip_type'] ?? 'one-way';
$flight_type = $_POST['flight_type'] ?? 'N/A';
$start = $_POST['start'] ?? 'N/A';
$destination = $_POST['destination'] ?? 'N/A';
$people = $_POST['people'] ?? '1';
$departure_date = $_POST['departure_date'] ?? 'N/A';
$return_date = $_POST['return_date'] ?? null;
$class = $_POST['class'] ?? 'Economy';
$meal = $_POST['meal'] ?? 'Veg';

// Generate flight details for departure
$departure_flight = "FL" . rand(100, 999);
$departure_time = date("H:i", strtotime("+".rand(1,5)." hours"));
$arrival_time = date("H:i", strtotime($departure_time . " +".rand(2,5)." hours"));
$duration = rand(1,3) . "h " . rand(0,59) . "m";
$terminal = "T" . rand(1,3);

// Generate flight details for return (if round trip)
if ($trip_type === 'round-trip' && $return_date) {
    $return_flight = "FL" . rand(100, 999);
    $return_departure_time = date("H:i", strtotime("+".rand(1,5)." hours"));
    $return_arrival_time = date("H:i", strtotime($return_departure_time . " +".rand(2,5)." hours"));
    $return_duration = rand(1,3) . "h " . rand(0,59) . "m";
    $return_terminal = "T" . rand(1,3);
}

// Price simulation
$base_fare = 5000; // BDT
$route_multiplier = strlen($start) + strlen($destination);
$price = $base_fare + ($route_multiplier * 150);
$total_price = $price * intval($people);

// For round trip, double the price
if ($trip_type === 'round-trip') {
    $total_price *= 2;
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
        <h2><center><br/><span>Menu</span></center></h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li><a href="index.php"><span class="las la-home"></span><span>Dashboard</span></a></li><br/>
            <li><a href="#" class="active"><span class="las la-ticket-alt"></span><span>Book Ticket</span></a></li><br/>
            <li><a href="booking.php"><span class="las la-clipboard-list"></span><span>View Bookings</span></a></li><br/>

            <li><a href="print_ticket.php"><span class="las la-clipboard-list"></span><span>Print Ticket</span></a></li><br/>
            <li><a href="status.php"><span class="las la-signal"></span><span>Flight Status</span></a></li><br/>
            <li><a href="profile.php"><span class="las la-user-circle"></span><span>Profile</span></a></li><br/>
            <li><a href="../passenger_login_signup/passenger_logout.php"><span class="las la-sign-out-alt"></span><span>Sign Out</span></a></li>
        </ul>
    </div>
</div>

<div class="main-content">
    <header>
        <h2><label for="nav-toggle"><span class="las la-bars"></span></label> Flight Details</h2>
    </header>

    <main>
        <div class="card-single">
            <h4>Your <?= $trip_type === 'round-trip' ? 'Round Trip' : 'One Way' ?> Flight</h4>
            <p>From <strong><?= htmlspecialchars($start) ?></strong> to <strong><?= htmlspecialchars($destination) ?></strong></p>
        </div>

        <!-- Departure Flight -->
        <div class="card-flight">
            <br>
            <br>
            <h5 class="flight-header">
                <i class="las la-plane-departure"></i> Departure Flight
                <span class="float-right"><?= htmlspecialchars($departure_date) ?></span>
            </h5>
            <table class="table table-bordered flight-table">
                <tr>
                    <th>Flight Number</th>
                    <td><?= htmlspecialchars($departure_flight) ?></td>
                    <th>Flight Type</th>
                    <td><?= htmlspecialchars($flight_type) ?></td>
                </tr>
                <tr>
                    <th>Departure</th>
                    <td><?= htmlspecialchars($start) ?> at <?= $departure_time ?></td>
                    <th>Arrival</th>
                    <td><?= htmlspecialchars($destination) ?> at <?= $arrival_time ?></td>
                </tr>
                <tr>
                    <th>Duration</th>
                    <td><?= $duration ?></td>
                    <th>Terminal</th>
                    <td><?= $terminal ?></td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td><?= htmlspecialchars($class) ?></td>
                    <th>Meal</th>
                    <td><?= htmlspecialchars($meal) ?></td>
                </tr>
            </table>
        </div>

        <?php if ($trip_type === 'round-trip' && isset($return_flight)): ?>
        <!-- Return Flight -->
        <div class="card-flight mt-4">
            <h5 class="flight-header">
                <i class="las la-plane-arrival"></i> Return Flight
                <span class="float-right"><?= htmlspecialchars($return_date) ?></span>
            </h5>
            <table class="table table-bordered flight-table">
                <tr>
                    <th>Flight Number</th>
                    <td><?= htmlspecialchars($return_flight) ?></td>
                    <th>Flight Type</th>
                    <td><?= htmlspecialchars($flight_type) ?></td>
                </tr>
                <tr>
                    <th>Departure</th>
                    <td><?= htmlspecialchars($destination) ?> at <?= $return_departure_time ?></td>
                    <th>Arrival</th>
                    <td><?= htmlspecialchars($start) ?> at <?= $return_arrival_time ?></td>
                </tr>
                <tr>
                    <th>Duration</th>
                    <td><?= $return_duration ?></td>
                    <th>Terminal</th>
                    <td><?= $return_terminal ?></td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td><?= htmlspecialchars($class) ?></td>
                    <th>Meal</th>
                    <td><?= htmlspecialchars($meal) ?></td>
                </tr>
            </table>
        </div>
        <?php endif; ?>

        <!-- Price Summary -->
        <div class="card-flight mt-4">
            <h5><strong>Price Summary</strong></h5>
            <table class="table">
                <tr>
                    <th>Passengers</th>
                    <td><?= htmlspecialchars($people) ?></td>
                    <th>Base Price (per person)</th>
                    <td>৳ <?= number_format($price, 2) ?></td>
                </tr>
                <?php if ($trip_type === 'round-trip'): ?>
                <tr>
                    <th>Trip Type</th>
                    <td>Round Trip</td>
                    <th>Total Base Price</th>
                    <td>৳ <?= number_format($price * 2 * intval($people), 2) ?></td>
                </tr>
                <?php else: ?>
                <tr>
                    <th>Trip Type</th>
                    <td>One Way</td>
                    <th>Total Base Price</th>
                    <td>৳ <?= number_format($price * intval($people), 2) ?></td>
                </tr>
                <?php endif; ?>
                <tr class="table-active">
                    <th colspan="3">Total Price (BDT)</th>
                    <td><strong>৳ <?= number_format($total_price, 2) ?></strong></td>
                </tr>
            </table>

            <form action="booking_hold_details.php" method="post">
                <input type="hidden" name="trip_type" value="<?= htmlspecialchars($trip_type) ?>">
                <input type="hidden" name="flight_type" value="<?= htmlspecialchars($flight_type) ?>">
                <input type="hidden" name="start" value="<?= htmlspecialchars($start) ?>">
                <input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
                <input type="hidden" name="people" value="<?= htmlspecialchars($people) ?>">
                <input type="hidden" name="departure_date" value="<?= htmlspecialchars($departure_date) ?>">
                <?php if ($trip_type === 'round-trip'): ?>
                <input type="hidden" name="return_date" value="<?= htmlspecialchars($return_date) ?>">
                <?php endif; ?>
                <input type="hidden" name="class" value="<?= htmlspecialchars($class) ?>">
                <input type="hidden" name="meal" value="<?= htmlspecialchars($meal) ?>">
                <input type="hidden" name="departure_flight" value="<?= htmlspecialchars($departure_flight) ?>">
                <input type="hidden" name="departure_time" value="<?= $departure_time ?>">
                <input type="hidden" name="arrival_time" value="<?= $arrival_time ?>">
                <input type="hidden" name="duration" value="<?= $duration ?>">
                <input type="hidden" name="terminal" value="<?= $terminal ?>">
                <input type="hidden" name="price" value="<?= $total_price ?>">
                <?php if ($trip_type === 'round-trip'): ?>
                <input type="hidden" name="return_flight" value="<?= htmlspecialchars($return_flight) ?>">
                <input type="hidden" name="return_departure_time" value="<?= $return_departure_time ?>">
                <input type="hidden" name="return_arrival_time" value="<?= $return_arrival_time ?>">
                <input type="hidden" name="return_duration" value="<?= $return_duration ?>">
                <input type="hidden" name="return_terminal" value="<?= $return_terminal ?>">
                <?php endif; ?>
                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="las la-check-circle"></i> Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>