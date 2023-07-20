<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>
<?php #AdminDiscount(); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Queries.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>Discount</title>
</head>
<body>
<section class="registration-section">
            <div class="registration-form">
                <h2 style="color:#ff6105">CarPark</h2>
                <h2>Sign Up As A Officer</h2>
                <form action="AdminDiscount.php" method="post">
                    <div class="input-box">
                        <input type="number" name="discountAmount" placeholder="Discount Amount">
                        <label for="">Discount Amount</label>
                    </div>
                    
                    <div class="input-box">
                        <input type="startDate" name="date" placeholder="Start Date">
                        <label for="">Start Date</label>
                    </div>

                    <div class="input-box">
                        <input type="endDate" name="date" placeholder="End Date">
                        <label for="">End Date</label>
                    </div>

                    <input type="submit" name="submit" id="" value="Apply">
                </form>
            </div>
        </section>
</body>
</html>