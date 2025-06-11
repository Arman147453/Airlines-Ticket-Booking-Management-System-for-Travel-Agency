<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION["passenger_id"])) {
    header("Location: ../passenger_login_signup/index.php");
    exit();
}

// Get booking data from session
$booking_data = $_SESSION['booking_data'] ?? null;

if (!$booking_data) {
    echo "No booking data found. Please book again.";
    exit();
}

// Simulated flight statuses (replace with real data if available)
$departure_status = $booking_data['departure_status'] ?? 'On Time';
$arrival_status = $booking_data['arrival_status'] ?? 'On Time';

// Function to safely display data
function displayData($data) {
    if (is_array($data)) {
        return htmlspecialchars(implode(", ", $data));
    }
    return htmlspecialchars($data ?? 'N/A');
}

// Load booking data from session
$title        = $booking_data['title'] ?? '';
$name         = $booking_data['name'] ?? '';
$dob          = $booking_data['dob'] ?? '';
$phone        = $booking_data['contact'] ?? '';
$email        = $booking_data['email'] ?? '';
$flight       = $booking_data['flight'] ?? 'N/A';
$flight_type  = $booking_data['flight_type'] ?? 'N/A';
$start        = $booking_data['start'] ?? 'N/A';
$destination  = $booking_data['destination'] ?? 'N/A';
$date         = $booking_data['date'] ?? 'N/A';
$class        = $booking_data['class'] ?? 'Economy';
$meal         = $booking_data['meal'] ?? 'Veg';
$price        = $booking_data['price'] ?? 'BDT 5,000';
$booking_ref  = $booking_data['booking_ref'] ?? rand(100000, 999999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Hold Confirmed</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background: #f1f2f7;
            padding: 20px;
        }
        .confirmation-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 700px;
            margin: auto;
        }
        .booking-id {
            font-size: 1.2em;
            font-weight: bold;
            color: #007bff;
        }
        .passenger-info, .flight-info {
            margin-bottom: 20px;
        }
        .btn-seat {
            background-color: #28a745;
            color: white;
        }
        .btn-seat:hover {
            background-color: #218838;
            color: white;
        }
    </style>
</head>
<body>
<div class="confirmation-container">
    <h2 class="text-success text-center">Booking Hold Confirmed</h2>
    <div class="text-center mb-3 booking-id">Booking Reference: #<?= $booking_ref ?></div>
    <hr>
    
    <div class="passenger-info">
        <h4>Passenger Information</h4>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Title:</strong> <?= displayData($title) ?></p>
                <p><strong>Name:</strong> <?= displayData($name) ?></p>
                <p><strong>Date of Birth:</strong> <?= displayData($dob) ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Contact Number:</strong> <?= displayData($phone) ?></p>
                <p><strong>Email:</strong> <?= displayData($email) ?></p>
            </div>
        </div>
    </div>

    <div class="flight-info">
        <h4>Flight Details</h4>
        <p><strong>Route:</strong> <?= displayData($start) ?> → <?= displayData($destination) ?></p>
        <p><strong>Airline:</strong> </strong> Travel Destination BD </div></p>
        <p>
            <strong>Departure:</strong> 16:58
        
        </p>
        <p><strong>Arrival Status:</strong> 20:56
        <p><strong>Class:</strong> <?= displayData($class) ?> | <strong>Meal:</strong> <?= displayData($meal) ?></p>
        <p><strong>Total Fare:</strong> <?= displayData($price) ?></p>
    </div>

    <div class="alert alert-info mt-4">
        <strong>Note:</strong> This booking is currently on hold. Please complete payment within 24 hours to confirm your reservation.
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="index.php" class="btn btn-secondary">Return to Dashboard</a>

        <div>
            <a href="payment.php?amount=<?= urlencode($price) ?>&phone=<?= urlencode($phone) ?>&booking_ref=<?= $booking_ref ?>" class="btn btn-primary ml-2">Proceed to Payment</a>
        </div>
    </div>
</div>
</body>
</html>
