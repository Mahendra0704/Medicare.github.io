<?php
session_start();


$email=$_SESSION["email"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicare";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT * FROM `registration` where email='".$email."'";
$sql2 = "SELECT latitude,longitude FROM images WHERE id = (SELECT MAX(id) FROM images) ";

$result = mysqli_query($conn, $sql2);
// Get the number of rows in the table


 
?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        nav {
            background-color: #333;
            display: flex;

        }

        .nav2 {
            float: right;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav a {
            color: white;
            display: block;
            padding: 1em;
            text-decoration: none;
        }

        nav i {
            margin-right: 0.5em;
        }

        nav a:hover {
            background-color: #444;
        }

        .map {
            height: 200px;
            width: 500px;
            background-color: red;
        }

        #map {
            height: 50vh;
            width: 85vw;

        }
    </style>
</head>

<body>
    <div class="container">
<nav>
  <ul>
    <li><a href="d_dashboard.html"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="profile"><i class="fa fa-wrench"></i> Services</a></li>
    <li><a href="about"><i class="fa fa-info-circle"></i> About</a></li>
    <li><a href="#contact"><i class="fa fa-envelope"></i> Contact</a></li>
    
  </ul>
  <ul class="nav2">
    <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
  </ul>
</nav>
    <div id="map"></div>
    <?php

if (mysqli_num_rows($result) > 0) {
  // Output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      // $value_from_database = $row["field_name"];


   ?>
    Latitude: <input type="text" id="latitude" value="<?php echo   $row['latitude'];   ?>">
    Longitude: <input type="text" id="longitude" value="<?php echo $row['longitude']   ?>">

    <?php


}
} else {
echo "0 results";
}
    ?>
    <button onclick="showPosition()">Show on Map</button>
</div>
    <script>
        var map = L.map('map').setView([0, 0], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var marker = L.marker([0, 0]).addTo(map);
        function showPosition() {
            var latitude = parseFloat(document.getElementById("latitude").value);
            var longitude = parseFloat(document.getElementById("longitude").value);
            if (isNaN(latitude) || isNaN(longitude)) {
                alert("Please enter valid latitude and longitude values");
                return;
            }
            map.setView([latitude, longitude], 13);
            marker.setLatLng([latitude, longitude]);
        }

    </script>
</body>

</html>
<?
mysqli_close($conn);
?>