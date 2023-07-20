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
    <title>User Home Page</title>
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
                <button class="link btn" onclick="sendMessege()">Send A Messege</button>
            </nav>

            <div class="registration-buttons">
                <button class="registration-btn btn signup-btn" onclick="reservationPage()">
                    Reservation
                </button>
                <button class="registration-btn btn signup-btn" onclick="AvailableSpacesPage()">
                    AvailableSpaces
                </button>
            </div>
                    
            </div>
        </header>
    </div>

    <script>
        // function profile() {
        //     window.location.href = "http://localhost/CarPark/UserProfile.php";
        // }

        // function sendMessege() {
        //     window.location.href = "http://localhost/CarPark/SendMessege.php";
        // }

        // function reservationPage() {
        //     window.location.href = "http://localhost/CarPark/ReserveAParkingSpace.php";
        // }

        // function AvailableSpacesPage() {
        //     window.location.href = "http://localhost/CarPark/ViewAvailableParkingSpaces.php";
        // }
    </script>
</body>
</html>