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
    <title><?php #echo $_SESSION['user_name']; ?> Profile</title>
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
            <!-- <div class="signup-btn-dropdown">
                <button class="registration-btn btn signup-btn" id="signUp">
                    Reservation
                </button>
                <ul class="signup-dropdown">
                <button class="registration-btn btn signup-btn" onclick="reservationPage()">
                    Reservation
                </button>
                <button class="registration-btn btn signup-btn" onclick="AvailableSpacesPage()">
                    AvailableSpaces
                </button>
                </ul>
            </div> -->
        </header>

        <section class="personal-info">
            <div class="img-part">
                <img src="<?php #getUserPic() ?>" alt="PersonalImge">
                <form action="database/uploadPic.php" method="post" enctype="multipart/form-data">
                    <!-- <button class="add" onclick="document.getElementById('profile_pic').click()">+</button> -->
                    <!-- onchange="uploadProfilePic(this.value);" -->
                    <input 
                        type="file" 
                        id="profile_pic" 
                        name="profile_pic" 
                        accept=".jpg, .jpeg, .png"
                        onchange="displaySubmitBTN()">

                    <input type="submit" name="submit" id="update" value="update" style="display: none">
                </form>
            </div>
            <!-- <h2 class="name">Ahmad ALodat</h2>
            <h2 class="email">akalodat19@cit.just.edu.jo</h2> -->
            <?php #userDisplayData(); ?>
        </section>

        <section class="Recieved-violation-tickets-history">
        <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Parking Lot</th>
                        <th>Parking Space</th>
                        <th>Car Number</th>
                        <th>Car Type</th>
                        <th>Date</th>
                        <th>Cause</th>
                        <th>Ticket Amount</th>
                        <th>Officer Name</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php #displayRecievedViolations(); ?>
                </tbody>
            </table>
        </section>

        <section class="main-buttons">
            <button class="registration-btn btn" id="back" onclick="back()">Back</button>
            <button class="registration-btn btn" id="editProfile" onclick="editProfile()">Edit Profile</button>
            <button class="registration-btn btn" id="logOut" onclick="logOut()">Log Out</button>
        </section>
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

        // function displaySubmitBTN() {
        //     document.getElementById('update').style.display = "block";
        // }

        // // function uploadProfilePic(pic) {
        // //     // console.log("uploadProfilePic " + pic);
        // //     // var data = new FormData();
        // //     // data.append("user_pic", pic)
        // //     // console.log("uploadProfilePic " + data);
        // //     // fetch("database/uploadPic.php", {method:"post", body:data})
        // //     // .then(res => res.text())
        // //     // .then(txt => function(txt) {
        // //     //     var e = document.getElementById("table-body");
        // //     //     // txt.foreach(e.appendChild())
        // //     //     e.innerHTML = txt;
        // //     //     // e.appendChild(r);
        // //     // })
        // //     // // .then(txt => console.log("load 2  " + txt));
        // //     // .then(txt => console.log("load 2  " + txt));
        // // }

        // function back() {
        //     window.history.back();
        // }

        // function editProfile() {
        //     window.location.href = "http://localhost/CarPark/editProfile.php";
        // }

        // function logOut() {
        //     window.location.href = "http://localhost/CarPark/logOut.php";
        //     // session_unset();
        //     // session_destroy();

        //     // header("Location: LogIn.php");
        //     // exit();

        //     // // Call the PHP function to log out
        //     // const xhr = new XMLHttpRequest();
        //     // xhr.open('POST', 'functions.php');
        //     // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //     // xhr.onload = function() {
        //     //     if (xhr.status === 200) {
        //     //         // Redirect to login page
        //     //         window.location.href = 'login.php';
        //     //     } else {
        //     //         console.error(xhr.statusText);
        //     //     }
        //     // };
        //     // xhr.onerror = function() {
        //     //     console.error(xhr.statusText);
        //     // };
        //     // xhr.send('action=logout');
        // }
    </script>
</body>
</html>