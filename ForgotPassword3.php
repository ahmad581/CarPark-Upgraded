<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>
<?php
    #ForgotPassword3() 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Queries.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.jpg">
    <title>Forgot Password?</title>
</head>
<body>
    <div class="page-container">
        <section class="registration-section">
            <div class="registration-form">
                <h2>Please Enter The New Password</h2>
                <form action="ForgotPassword3.php" method="post">
                    <div class="input-box">
                        <input type="password" name="newPassword" placeholder="New Password">
                        <label for="">New Password</label>
                    </div>

                    <div class="input-box">
                        <input type="password" name="confirmNewPassword" placeholder="Confirm New Password">
                        <label for="">Confirm New Password</label>
                    </div>

                    <input type="submit" name="submit" value="Confirm" id="">
                </form>
            </div>
        </section>
    </div>
</body>
</html>