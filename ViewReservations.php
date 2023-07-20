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
    <div class="page-container">
        <section class="registration-section">
            <div class="registration-form">
                <h2 style="color:#ff6105">CarPark</h2>
                <h2>Reservations</h2>
                <!-- <form action="ReserveAParkingSpace.php" method="post"> -->
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Parking Lot</th>
                                <th>Parking Space</th>
                                <th>Car Number</th>
                                <th>Car Type</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php #displayReservations(); ?>
                        </tbody>
                    </table>
                <!-- </form> -->
            </div>
        </section>
    </div>
</body>
</html>