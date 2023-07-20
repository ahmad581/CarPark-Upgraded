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
    <title>Officer Reservation Buttons</title>
</head>
<body>
    <section class="registration-section">
        <div class="registration-form">
            <h2 style="color:#ff6105">CarPark</h2>
            <h2>Choose An Action: </h2>

            <div class="registration-buttons">
                <button class="registration-btn btn" onclick="reserveForMe()">Reserve A Parking Space</button>
                <button class="registration-btn btn" onclick="availableSpaces()">View Available Spaces</button>
                <button class="registration-btn btn" onclick="reservedSpaces()">View Reserved Spaces</button>
                <button class="registration-btn btn" onclick="reservedReservations()">View Reservations</button>
            </div>

            

            <!-- <form action="login.php" method="post">
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email">
                    <label for="">Email</label>
                </div>
                
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password">
                    <label for="">Password</label>
                </div>
                
                <input type="submit" name="submit" id="" value="Log In">
            </form>
            <a href="ForgotPassword1.php">Forgot Password?</a> -->
        </div>
    </section>

    <script>
        // function reserveForMe() {
        //     window.location.href = "http://localhost/CarPark/ReserveAParkingSpace.php";
        // }

        // function reserveForDriver() {
        //     window.location.href = "http://localhost/CarPark/OfficerReservationForAnotherDriver.php";
        // }

        // function availableSpaces() {
        //     window.location.href = "http://localhost/CarPark/ViewAvailableParkingSpaces.php";
        // }

        // function reservedSpaces() {
        //     window.location.href = "http://localhost/CarPark/ViewReservedParkingSpaces.php";
        // }

        // function reservedReservations() {
        //     window.location.href = "http://localhost/CarPark/ViewReservations.php";
        // }
    </script>
</body>
</html>