<?php 
session_start();

if (!isset($_SESSION["passenger_id"])) {
    session_unset();
    session_write_close();
    $url = "../passenger_login_signup/index.php";
    header("Location: $url");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline_system";
$mysqli = new mysqli($servername, $username, $password, $dbname);

$passenger_id = $_SESSION['passenger_id'];
$sql = "SELECT * FROM booking_info WHERE passenger_id = '$passenger_id'";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Bookings</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<input type="checkbox" id="nav-toggle"> 
<div class="sidebar">
    <div class="sidebar-brand">
        <h2><center><br/><span>Operations</span></center></h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li><br><a href="index.php"><span class="las la-home"></span><span>Dashboard</span></a></li><br>
            <li><a href="ticket.php"><span class="las la-ticket-alt"></span><span>Book Ticket</span></a></li><br/>
            <li><a href="" class="active"><span class="las la-clipboard-list"></span><span>View Bookings</span></a></li><br>
            <li><a href="profile.php"><span class="las la-user-circle"></span><span>Profile</span></a></li><br/>
            <li><a href="../passenger_login_signup/passenger_logout.php"><span class="las la-sign-out-alt"></span><span>Sign Out</span></a></li>
        </ul>
    </div>
</div>

<div class="main-content">
    <header>
        <h2><label for="nav-toggle"><span class="las la-bars"></span></label>Bookings</h2>
    </header> 
    
    <main>
        <div class="card-single">
            <center><h2>Confirmed Booking Details</h2></center>
        </div>
        <div class="card-single">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Booking Ref</th>
                        <th>Flight Name</th>
                        <th>Flight Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Date</th>
                        <th>Class</th>
                        <th>Meal</th>
                        <th>Total Price</th>
                        <th>Passenger</th>
                        <th>Contact</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while($rows = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $rows['booking_ref']; ?></td>
                        <td><?php echo $rows['flight_name']; ?></td>
                        <td><?php echo $rows['flight_type']; ?></td>
                        <td><?php echo $rows['departure_location']; ?></td>
                        <td><?php echo $rows['destination_location']; ?></td>
                        <td><?php echo $rows['travel_date']; ?></td>
                        <td><?php echo $rows['travel_class']; ?></td>
                        <td><?php echo $rows['meal_preference']; ?></td>
                        <td><?php echo $rows['total_price']; ?></td>
                        <td><?php echo $rows['title'] . " " . $rows['name']; ?></td>
                        <td><?php echo $rows['contact_no']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                    </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='12' class='text-center'>No bookings found.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </main> 
</div> 
</body>
</html>
