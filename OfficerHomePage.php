<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Queries.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.jpg">
    <title>Officer Home Page</title>
</head>
<body>
    <div class="page-container">
        <header class="welcome-header">
            <div class="logo-and-name">
                <img src="Images/just_img.jpg" alt="JUST-LOGO" class="just-logo">
                <h2>CarPark</h2>
            </div>

            <nav class="links">
                <button class="link btn" onclick="profile()">Profile</button>
                <button class="link btn" onclick="generate()">Generate A Violation Ticket</button>
                <button class="link btn" onclick="sendMessege()">Send A Messege</button>
            </nav>

            <div class="signup-btn-dropdown">
                <button class="registration-btn btn signup-btn" id="signUp" onclick="reserve()">
                    Reservation
                </button>
                <!-- <ul class="signup-dropdown">
                    <li><a href="ReserveAParkingSpace.html">Reserve A Parking Space</a></li>
                    <li><a href="OfficerReservationForAnotherDriver.html">Reserve A Parking Space For Another User</a></li>
                    <li><a href="ViewAvailableParkingSpaces.php">View Available Spaces</a></li>
                    <li><a href="ViewReservedParkingSpaces.php">View Reserved Spaces</a></li>
                </ul> -->
            </div>
        </header>
    </div>

    <script>
        // function profile() {
        //     window.location.href = "http://localhost/CarPark/OfficerProfile.php";
        // }

        // function generate() {
        //     window.location.href = "http://localhost/CarPark/GenerateAViolationTicket.php";
        // }

        // function sendMessege() {
        //     window.location.href = "http://localhost/CarPark/SendMessege.php";
        // }
        
        // function reserve() {
        //     window.location.href = "http://localhost/CarPark/OfficerReservationButtons.php";
        // }
    </script>
</body>
</html>