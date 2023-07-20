<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>
<?php #LogIn() ?>

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
    <title>Log In</title>
</head>
<body>
    <div class="page-container">
        <header class="welcome-header">
            <button class="icon-btn">
                <span class="material-icons-outlined" onclick="back()">arrow_back_ios</span>
            </button>
              
              <div class="go-to-sign-up">
              <h2>I don't have an account!</h2>
              <div class="signup-btn-dropdown">
                    <button class="registration-btn btn signup-btn" onclick="signUp()">
                        sign up
                    </button>
                    <!-- <ul class="signup-dropdown">
                        <li><a href="SignUpAsStudent.php" id="student">As a Student</a></li>
                        <li><a href="SignUpAsAProffesor.php" id="student">As a Proffisor</a></li>
                        <li><a href="SignUpAsOfficer.php" id="student">As a Officer</a></li>
                        <li><a href="#" id="student">As a Visitor</a></li>
                    </ul> -->
                </div>
              </div>
        </header>

        <section class="registration-section">
            <div class="registration-form">
                <h2 style="color:#ff6105">CarPark</h2>
                <h2>Log In</h2>
                <form action="login.php" method="post">
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
                <a href="ForgotPassword1.php">Forgot Password?</a>
            </div>
        </section>
    </div>

    <script>
        // function signUp() {
        //     window.location.href = "SignUpButtons.php";
        // }

        // function back() {
        //     window.history.back();
        // }
    </script>
</body>
</html>