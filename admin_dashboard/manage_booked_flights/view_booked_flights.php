<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    session_unset();
    session_write_close();
    $url = "../admin_login/index.php";
    header("Location: $url");
    exit();
}

error_reporting(0);

$con = new mysqli("localhost", "root", "", "airline_system");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Confirmed Bookings</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        .border-box {
            border: 1px solid #9a9a9a;
            background: #fff;
            border-radius: 4px;
            padding: 10px;
            width: 1000px;
            margin: 50px auto;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 30px;
            background-image: url('assets/img/slide3.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <div class="container">
            <div class="border-box">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="font-weight: 900; text-align:center; text-transform: uppercase; border-bottom: 1px solid #e7510c; color: #e7510c; font-size: 30px; margin-bottom: 40px;">List of Confirmed Bookings</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Wanna go back to dashboard?
                                <span>
                                    <a href="../admin_dashboard.php"><button class="btn btn-primary">Go back to dashboard</button></a>
                                </span>
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Booking Ref</th>
                                                <th>Passenger</th>
                                                <th>DOB</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Flight Name</th>
                                                <th>Type</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Date</th>
                                                <th>Class</th>
                                                <th>Meal</th>
                                                <th>Total Price</th>
                                                <th>Booking Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$sql = mysqli_query($con, "SELECT * FROM booking_info");
$cnt = 1;
while ($row = mysqli_fetch_array($sql)) {
?>
    <tr>
        <td><?php echo $cnt; ?></td>
        <td><?php echo htmlentities($row['booking_ref']); ?></td>
        <td><?php echo htmlentities($row['title'] . " " . $row['name']); ?></td>
        <td><?php echo htmlentities($row['dob']); ?></td>
        <td><?php echo htmlentities($row['contact_no']); ?></td>
        <td><?php echo htmlentities($row['email']); ?></td>
        <td><?php echo htmlentities($row['flight_name']); ?></td>
        <td><?php echo htmlentities($row['flight_type']); ?></td>
        <td><?php echo htmlentities($row['departure_location']); ?></td>
        <td><?php echo htmlentities($row['destination_location']); ?></td>
        <td><?php echo htmlentities($row['travel_date']); ?></td>
        <td><?php echo htmlentities($row['travel_class']); ?></td>
        <td><?php echo htmlentities($row['meal_preference']); ?></td>
        <td>Rs. <?php echo htmlentities($row['total_price']); ?></td>
        <td><?php echo htmlentities($row['booking_timestamp']); ?></td>
    </tr>
<?php 
    $cnt++;
} 
?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
