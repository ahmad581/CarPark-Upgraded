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
    <title>Welcome to CarPark</title>
</head>
<body>
    <div class="page-container">
        <header class="welcome-header">
            <div class="logo-and-name">
                <img src="Images/just_img.jpg" alt="JUST-LOGO" class="just-logo">
                <h2>CarPark</h2>
                
                <nav class="links">
                    <li class="link">about</li>
                    <li class="link">contact</li>
                </nav>

                <span></span>
            </div>

            <div class="registration-buttons">
                <button class="registration-btn btn" onclick="login()">
                    log in
                </button>
                

                <div class="signup-btn-dropdown">
                    <button class="registration-btn btn signup-btn" onclick="signUp()">
                        sign up
                    </button>
                    <!-- <div class="signup-dropdown">
                        <a href="SignUpAsStudent.php" id="student" >Student</a>
                        <a href="SignUpAsAProffesor.php" id="professor">Professor</a>
                        <a href="SignUpAsOfficer.php" id="officer">Officer</a>
                        <a href="#" id="student">Visitor</a>
                    </div> -->
                </div>
            </div>
        </header>

        <footer>

        </footer>
    </div>

    <script>
        // var login = document.getElementById("login");

        // lognin.addEventListener("click", function () {
        //     window.location.href = "http://localhost/CarPark/LogIn.php";
        // });

        // function login(){
        //     window.location.href = "http://localhost/CarPark/LogIn.php";
        // }

        // function signUp(){
        //     window.location.href = "http://localhost/CarPark/SignUpButtons.php";
        // }
    </script>
</body>
</html>