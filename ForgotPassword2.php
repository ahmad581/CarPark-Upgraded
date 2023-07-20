<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>
<?php 
    // if (!isset($_GET["email"])) {
    //     header("Location: ForgotPassword1.php");
    //     exit();
    // }
    // $email = $_GET["email"];
    // ForgotPassword2($email) 
    #ForgotPassword2()
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
                <h2>Please Enter The Recieved Code</h2>
                <form action="ForgotPassword2.php" method="post">
                    <div class="input-box">
                        <input type="text" name="recoveryCode" placeholder="Recovery Code">
                        <label for="">Recovery Code</label>
                    </div>

                    <input type="submit" name="submit" value="Confirm" id="">
                    <input type="submit" name="resend_code" value="Re-Send Code" id="">
                </form>
            </div>
        </section>
    </div>
</body>
</html>