<?php
session_start();

if (!isset($_SESSION["passenger_id"])) {
    header("Location: ../passenger_login_signup/index.php");
    exit();
}

// Database connection - UPDATE THESE CREDENTIALS WITH YOUR ACTUAL DATABASE INFO
$db_host = "localhost";
$db_name = "airline_management_system"; // Change to your actual DB name
$db_user = "2210";     // Change to your actual DB username
$db_pass = "";         // Change to your actual DB password

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get booking details from URL
$booking_ref = $_GET['booking_ref'] ?? '';
$flight = $_GET['flight'] ?? '';
$date = $_GET['date'] ?? '';
$amount = $_GET['amount'] ?? '';
$phone = $_GET['phone'] ?? '';

// Validate inputs
if (empty($booking_ref) || empty($flight) || empty($date)) {
    die("Invalid request parameters. Please go back and try again.");
}

// Fetch flight details
try {
    $stmt = $pdo->prepare("SELECT * FROM flights WHERE flight_number = ? AND departure_date = ?");
    $stmt->execute([$flight, $date]);
    $flight_details = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$flight_details) {
        die("Flight not found in our system.");
    }
} catch (PDOException $e) {
    die("Error fetching flight details: " . $e->getMessage());
}

// Fetch already booked seats
try {
    $stmt = $pdo->prepare("SELECT seat_number FROM bookings WHERE flight_id = ?");
    $stmt->execute([$flight_details['id']]);
    $booked_seats = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    die("Error fetching booked seats: " . $e->getMessage());
}

// Handle seat selection form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seat_number'])) {
    $seat_number = $_POST['seat_number'];
    
    // Validate seat selection
    if (in_array($seat_number, $booked_seats)) {
        die("This seat is already booked. Please select another seat.");
    }
    
    // Update booking with selected seat
    try {
        $stmt = $pdo->prepare("UPDATE bookings SET seat_number = ? WHERE booking_ref = ?");
        if ($stmt->execute([$seat_number, $booking_ref])) {
            header("Location: payment.php?amount=" . urlencode($amount) . 
                   "&phone=" . urlencode($phone) . 
                   "&booking_ref=" . urlencode($booking_ref));
            exit();
        }
    } catch (PDOException $e) {
        die("Failed to update seat selection: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Your Seat - AMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background: #f1f2f7;
            padding: 20px;
        }
        .seat-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 20px auto;
        }
        .airplane {
            position: relative;
            margin: 40px auto;
            width: 100%;
        }
        .cockpit {
            height: 100px;
            background: #343a40;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            color: white;
            text-align: center;
            padding-top: 15px;
        }
        .fuselage {
            border: 3px solid #343a40;
            border-top: none;
            padding: 20px;
        }
        .seat-row {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }
        .seat {
            width: 40px;
            height: 40px;
            margin: 0 5px;
            border: 2px solid #6c757d;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: bold;
            background: #f8f9fa;
        }
        .seat.selected {
            background: #28a745;
            color: white;
            border-color: #28a745;
        }
        .seat.booked {
            background: #dc3545;
            color: white;
            border-color: #dc3545;
            cursor: not-allowed;
        }
        .seat.emergency {
            background: #ffc107;
            color: black;
            border-color: #ffc107;
        }
        .aisle {
            width: 60px;
        }
        .legend {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .legend-item {
            display: flex;
            align-items: center;
            margin: 0 10px 5px;
        }
        .legend-color {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            border: 1px solid #dee2e6;
        }
        .row-number {
            width: 30px;
            text-align: right;
            padding-right: 10px;
            align-self: center;
        }
    </style>
</head>
<body>
<div class="seat-container">
    <h2 class="text-center mb-4">Select Your Seat</h2>
    
    <div class="flight-info text-center mb-4">
        <h4><?= htmlspecialchars($flight_details['flight_number']) ?></h4>
        <p><?= htmlspecialchars($flight_details['departure_airport']) ?> to <?= htmlspecialchars($flight_details['arrival_airport']) ?></p>
        <p>Date: <?= htmlspecialchars($date) ?></p>
        <p class="booking-ref">Booking Reference: #<?= htmlspecialchars($booking_ref) ?></p>
        <p>Amount: ₹<?= htmlspecialchars($amount) ?></p>
        <p>Phone: <?= htmlspecialchars($phone) ?></p>
    </div>

    <div class="legend">
        <div class="legend-item">
            <div class="legend-color" style="background-color: #f8f9fa;"></div>
            <span>Available</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #28a745;"></div>
            <span>Selected</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #dc3545;"></div>
            <span>Booked</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background-color: #ffc107;"></div>
            <span>Emergency Exit</span>
        </div>
    </div>

    <div class="airplane">
        <div class="cockpit">
            <h5>Cockpit</h5>
        </div>
        <div class="fuselage">
            <form id="seatForm" method="post">
                <?php
                $rows = 20;
                $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                $emergency_rows = [4, 5, 12, 13];
                
                for ($row = 1; $row <= $rows; $row++) {
                    echo '<div class="seat-row">';
                    echo '<div class="row-number">' . $row . '</div>';
                    
                    foreach ($letters as $index => $letter) {
                        $seat_number = $row . $letter;
                        $class = 'seat';
                        
                        if ($index == 2) {
                            echo '<div class="aisle"></div>';
                        }
                        
                        if (in_array($seat_number, $booked_seats)) {
                            $class .= ' booked';
                        }

                        if (in_array($row, $emergency_rows)) {
                            $class .= ' emergency';
                        }

                        echo '<div class="' . $class . '" data-seat="' . $seat_number . '">' . $letter . '</div>';
                    }
                    
                    echo '</div>';
                }
                ?>
                <input type="hidden" name="seat_number" id="selectedSeat">
            </form>
        </div>
    </div>

    <div class="text-center mt-4">
        <button type="button" class="btn btn-secondary mr-2" onclick="window.history.back()">Back</button>
        <button type="button" class="btn btn-success" id="confirmSeat">Confirm Seat Selection</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const seats = document.querySelectorAll('.seat:not(.booked)');
        let selectedSeat = null;

        seats.forEach(seat => {
            seat.addEventListener('click', function () {
                if (selectedSeat) {
                    selectedSeat.classList.remove('selected');
                }
                this.classList.add('selected');
                selectedSeat = this;
                document.getElementById('selectedSeat').value = this.dataset.seat;
            });
        });

        document.getElementById('confirmSeat').addEventListener('click', function () {
            if (!selectedSeat) {
                alert('Please select a seat before confirming');
                return;
            }
            document.getElementById('seatForm').submit();
        });
    });
</script>
</body>
</html>
