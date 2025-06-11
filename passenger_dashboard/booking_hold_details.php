<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION["passenger_id"])) {
    header("Location: ../passenger_login_signup/index.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['confirm_hold'])) {
    $conn = new mysqli("localhost", "root", "", "airline_system");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $flight = $_POST['flight'] ?? 'N/A';
    $flight_type = $_POST['flight_type'] ?? 'N/A';
    $start = $_POST['start'] ?? 'N/A';
    $destination = $_POST['destination'] ?? 'N/A';
    $date = $_POST['date'] ?? 'N/A';
    $class = $_POST['class'] ?? 'Economy';
    $meal = $_POST['meal'] ?? 'Veg';
    $price = $_POST['price'] ?? 0;
    $contact_no = $_POST['contact'] ?? '';
    $email = $_POST['email'] ?? '';

    $titles = $_POST['title'] ?? [];
    $names = $_POST['name'] ?? [];
    $dobs = $_POST['dob'] ?? [];

    $stmt = $conn->prepare("INSERT INTO booking_info 
        (passenger_id, booking_ref, title, name, dob, contact_no, email, flight_name, flight_type, departure_location, destination_location, travel_date, travel_class, meal_preference, total_price)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $passenger_id = $_SESSION["passenger_id"];
    $booking_ref = strtoupper(bin2hex(random_bytes(4)));
    $success = true;

    for ($i = 0; $i < count($names); $i++) {
        $stmt->bind_param(
            "sssssssssssssss",
            $passenger_id,
            $booking_ref,
            $titles[$i],
            $names[$i],
            $dobs[$i],
            $contact_no,
            $email,
            $flight,
            $flight_type,
            $start,
            $destination,
            $date,
            $class,
            $meal,
            $price
        );

        if (!$stmt->execute()) {
            $success = false;
            echo "Error saving booking for passenger " . ($i+1) . ": " . $stmt->error;
            break;
        }
    }

    $stmt->close();
    $conn->close();

    if ($success) {
    // Store data in session
    $_SESSION['booking_data'] = [
        'booking_ref' => $booking_ref,
        'title'       => $titles,
        'name'        => $names,
        'dob'         => $dobs,
        'contact'     => $contact_no,
        'email'       => $email,
        'flight'      => $flight,
        'flight_type' => $flight_type,
        'start'       => $start,
        'destination' => $destination,
        'date'        => $date,
        'class'       => $class,
        'meal'        => $meal,
        'price'       => $price
    ];

    // Redirect to confirm_hold.php
    header("Location: confirm_hold.php");
    exit();
}

}

// Preload values for form display
$flight = $_POST['flight'] ?? 'N/A';
$flight_type = $_POST['flight_type'] ?? 'N/A';
$start = $_POST['start'] ?? 'N/A';
$destination = $_POST['destination'] ?? 'N/A';
$people = $_POST['people'] ?? 1;
$date = $_POST['date'] ?? 'N/A';
$class = $_POST['class'] ?? 'Economy';
$meal = $_POST['meal'] ?? 'Veg';
$price = $_POST['price'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Passenger Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .form-container {
            max-width: 800px;
            margin: 30px auto;
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
            <li><a href="index.php"><span class="las la-home"></span><span>Dashboard</span></a></li><br/>
            <li><a href="book_ticket.php" class="active"><span class="las la-ticket-alt"></span><span>Book Ticket</span></a></li><br/>
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
        <h2><label for="nav-toggle"><span class="las la-bars"></span></label> Passenger Details</h2>
    </header>

    <main>
        <div class="form-container">
            <form method="post" action="">
                <!-- Hidden fields -->
                <input type="hidden" name="flight" value="<?= htmlspecialchars($flight) ?>">
                <input type="hidden" name="flight_type" value="<?= htmlspecialchars($flight_type) ?>">
                <input type="hidden" name="start" value="<?= htmlspecialchars($start) ?>">
                <input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
                <input type="hidden" name="people" value="<?= (int)$people ?>">
                <input type="hidden" name="date" value="<?= htmlspecialchars($date) ?>">
                <input type="hidden" name="class" value="<?= htmlspecialchars($class) ?>">
                <input type="hidden" name="meal" value="<?= htmlspecialchars($meal) ?>">
                <input type="hidden" name="price" value="<?= htmlspecialchars($price) ?>">

                <!-- Passenger info -->
                <?php for ($i = 1; $i <= $people; $i++): ?>
                    <h5>Passenger <?= $i ?></h5>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Title</label>
                            <select name="title[]" class="form-control" required>
                                <option>Mr</option>
                                <option>Mrs</option>
                                <option>Miss</option>
                                <option>Master</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Full Name</label>
                            <input type="text" name="name[]" class="form-control" placeholder="Full Name" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Date of Birth</label>
                            <input type="date" name="dob[]" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                <?php endfor; ?>

                <!-- Contact Info -->
                <h5>Contact Details</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Contact Number (BD)</label>
                        <input type="tel" name="contact" class="form-control" pattern="^(\+8801|01)[0-9]{9}$" placeholder="+8801XXXXXXXXX" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                    </div>
                </div>

                <button type="submit" name="confirm_hold" class="btn btn-primary btn-lg btn-block">Confirm Hold</button>
            </form>
        </div>
    </main>
</div>

</body>
</html>