<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>
<?php #Payment(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Queries.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.jpg">
    <title>Payment Page</title>
</head>
<body>
    <div class="page-container">
        <section class="registration-section">
            <div class="registration-form">
                <h2 style="color:#ff6105">CarPark</h2>
                <h2>Reservation Info</h2>
                <h2>Payment Amount</h2>
                <h2>Visa Card</h2>
                <form action="Payment.php" method="post">
                    <div class="input-box">
                        <input type="text" name="cardHolderName" placeholder="CardHolder Name">
                        <label for="">CardHolder Name</label>
                    </div>

                    <div class="input-box">
                        <input type="number" name="visaCardNumber" placeholder="Visa Card Number">
                        <label for="">Visa Card Number</label>
                    </div>
                    
                    <div class="input-box">
                        <input type="number" name="CVVNumber" placeholder="CVV Number">
                        <label for="">CVV Number</label>
                    </div>
                    
                    <div class="input-box">
                        <input type="date" name="expirationDate" placeholder="Expiration Date">
                        <label for="">Expiration Date</label>
                    </div>

                    <div class="input-box">
                        <input type="number" name="pinNumber" placeholder="Pin Number">
                        <label for="">Pin Number</label>
                    </div>

                    <input type="submit" name="submit" value="CheckOut" id="">
                </form>
            </div>
        </section>
    </div>
</body>
</html>