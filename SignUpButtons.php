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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
    <section class="registration-section">
        <div class="registration-form">
            <h2 style="color:#ff6105">CarPark</h2>
            <h2>Regester As: </h2>

            <div class="registration-buttons">
                <button class="registration-btn btn" onclick="std()">Student</button>
                <!-- <button class="registration-btn btn" onclick="off()">Officer</button> -->
                <button class="registration-btn btn" onclick="pro()">Professor</button>
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
        // function std() {
        //     window.location.href = "http://localhost/CarPark/SignUpAsStudent.php";
        // }

        // // function off() {
        // //     window.location.href = "http://localhost/CarPark/SignUpAsOfficer.php";
        // // }

        // function pro() {
        //     window.location.href = "http://localhost/CarPark/SignUpAsAProffesor.php";
        // }
    </script>
</body>
</html>