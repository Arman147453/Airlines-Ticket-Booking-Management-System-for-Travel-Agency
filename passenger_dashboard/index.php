<?php

session_start();
// ** NOTE: Below code checks if the passenger is logged in or not. If he/she isn't logged in,
// it redirects the passenger to passenger_login.php

if (!isset($_SESSION["passenger_id"])) 
{
    session_unset();
    session_write_close();
    $url = "../passenger_login_signup/passenger_login.php";
    header("Location: $url");
} 

// ** NOTE: Main page for the passenger dashboard, it displays the no. of airlines available,
// amount spend on bookings, top destinations etc. along with side navigation bar.


$passenger_id=$_SESSION['passenger_id'];
$mysqli = new mysqli("localhost","root","","airline_system");
$sql = "SELECT * FROM airline_system.flights
        WHERE flight_no
        IN (SELECT flight_no FROM airline_system.booked_flights WHERE passenger_id='$passenger_id')";
$money=0;  
$count=0;
$result = $mysqli->query($sql);      
while($rows=$result->fetch_assoc())
{
  $money=$money+$rows['amount'];
  $count=$count+1;
}            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <input type="checkbox" id="nav-toggle"> 
    <div class="sidebar">
        <div class="sidebar-brand">
           <h2>
               <center>
                   <br/>
                <span>Operations</span>
                </center>
           </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <br/>
                <li>
                    <a href="" class="active"><span class="las la-home"></span>
                    <span>Dashboard</span></a>
                </li>
<br>
                    <li>
                    <a href="ticket.php"><span class="las la-ticket-alt"></span>
                    <span>Book Ticket</span></a>
                </li>
                <br/>            
                
                <li>
                    <a href="booking.php"><span class="las la-clipboard-list"></span>
                    <span>View Bookings</span></a>
                </li>

                <br/>
                <li>
                    <a href="profile.php"><span class="las la-user-circle"></span>
                    <span>Profile</span></a>
                </li>
                <br/>
                <li>
                    <a href="../passenger_login_signup/passenger_logout.php"><span class="las la-sign-out-alt"></span>
                    <span>Sign Out</span></a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-content"> 
      <div class="bar">
        <span><h3>Top Destinations(in Bangladesh)</h3></span>       
      </div>
            <div class="cards">
            <div class="card-single">
                <div>
                    <img src="img/karnataka.jfif" style="width:100%">
                    <div>
                    <center>Rajshahi</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/Punjab.jpg" style="width:100%">
                    <div>
                    <center>Saidpur</center>
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/kerala.jfif" style="width:100%">
                    <div>
                    <center>Sylhet</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/rajasthan.jfif" style="width:100%">
                    <div>
                    <center>Barishal</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/assam.jfif" style="width:100%">
                    <div>
                    <center>Jessore</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/delhi.jfif" style="width:100%">
                    <div>
                    <center>Dhaka</center>    
                    </div>
                </div>
             </div>

             <div class="card-single">
                <div>
                    <img src="img/tn.jfif" style="width:100%">
                    <div>
                    <center>Cox's Bazar</center>    
                    </div>
                </div>
             </div>
            </div>
            <div class="bar">     
            </div>
            <canvas id="myChart1" style="width:50%;max-width:20px"></canvas>

<script>
var xValues = ["J&K", "Assam", "Rajasthan", "Karnataka", "New Delhi","Tamil Nadu","Punjab","Kerala"];
var yValues = [35, 40, 54, 44, 50,30,20,28];
var barColors = ["red", "green","blue","orange","brown","yellow","grey","black"];

new Chart("myChart1", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
        
      display: true,
      text: "Place vs Tickets(in thousand)"
    }
  }
});
</script>
      <div class="bar">
        <span><h3>Top Destinations(outside Bangladesh)</h3></span>       
      </div>
            <div class="cards">
             <div class="card-single">
                <div>
                    <img src="img/London.jfif" style="width:100%">
                    <div>
                    <center>London</center>
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/ceatle.jfif" style="width:100%">
                    <div>
                    <center>Ceatle</center>
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/paris.jfif" style="width:100%">
                    <div>
                    <center>Paris</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/egypt.jfif" style="width:100%">
                    <div>
                    <center>Egypt</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/newyork.jfif" style="width:100%">
                    <div>
                    <center>New York</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/brazil.jfif" style="width:100%">
                    <div>
                    <center>Brazil</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/berlin.jfif" style="width:100%">
                    <div>
                    <center>Berlin</center>    
                    </div>
                </div>
             </div>
             <div class="card-single">
                <div>
                    <img src="img/canada.jfif" style="width:100%">
                    <div>
                    <center>Canada</center>    
                    </div>
                </div>
             </div>
            </div>
            <div class="bar">


<script>
var xValues = ["Berlin", "Ceatle", "New York", "Egypt", "London","Paris","Brazil","Canada"];
var yValues = [35, 40, 50, 54, 60,40,20,35];
var barColors = ["red", "green","blue","orange","brown","yellow","grey","black"];

new Chart("myChart2", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
        
      display: true,
      text: "Place vs Tickets(in thousand)"
    }
  }
});
</script>
            </div>    

    </body>
    </html>
    