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
                <button class="link btn" onclick="generate()">Generate A Violation Ticket</button>
                <button class="link btn" onclick="sendMessege()">Send A Messege</button>
            </nav>

            <div class="signup-btn-dropdown">
                <button class="registration-btn btn signup-btn" id="signUp" onclick="reserve()">
                    Reservation
                </button>
                <!-- <ul class="signup-dropdown">
                    <li><a href="#">Reserve A Parking Space</a></li>
                    <li><a href="#">Reserve A Parking Space For Another User</a></li>
                    <li><a href="#">View Available Spaces</a></li>
                    <li><a href="#">View Reserved Spaces</a></li>
                </ul> -->
            </div>
        </header>

        <section class="personal-info">
            <div class="img-part">
                <img src="<?php #getUserPic(); ?>" alt="profile_picture">
                <form action="OfficerProfile.php" method="post">
                    <button class="add" onclick="">+</button>
                    <!-- document.getElementById('profile_pic').click() -->
                    <input 
                        type="file" 
                        id="profile_pic" 
                        onchange="view(this.value);"
                        name="profile_pic" 
                        accept=".jpg, .jpeg, .png" 
                        style="visibility: hidden;" >
                        <input type="text" name="picName" id="picName" value="" hidden = 'hidden'>  
                </form>
            </div>

            <!-- <h2 class="name">Ahmad ALodat</h2>

            <h2 class="email">akalodat19@cit.just.edu.jo</h2> -->
            <?php #officerDisplayData(); ?>
            
            <!-- <h2 class="reservation-balance">500 JD</h2> -->
        </section>

        <section class="given-violation-tickets-history">
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
                    <?php #displayGivinViolations(); ?>
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

        // function generate() {
        //     window.location.href = "http://localhost/CarPark/GenerateAViolationTicket.php";
        // }

        // function sendMessege() {
        //     window.location.href = "http://localhost/CarPark/SendMessege.php";
        // }

        // function view(a) {
        //     console.log(a)
        // }

        // function reserve() {
        //     window.location.href = "http://localhost/CarPark/OfficerReservationButtons.php";
        // }

        // function uploadPic() {
        //     var fileInput = document.getElementById("fileInput");

        //     // Get the selected file
        //     var file = fileInput.files[0];

        //     // Create a FormData object to send the file data
        //     var formData = new FormData();
        //     formData.append("file", file);

        //     // Make an AJAX request to the PHP script
        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "upload.php", true);
        //     xhr.send(formData);

        //     // Handle the response
        //     xhr.onreadystatechange = function() {
        //     if (xhr.readyState == 4 && xhr.status == 200) {
        //         var response = xhr.responseText;
        //         alert(response); // Displays "File uploaded successfully." or "Error uploading file."
        //         }
        //     }
        // }

        // function back() {
        //     window.history.back();
        // }

        // function editProfile() {
        //     window.location.href = "http://localhost/CarPark/editProfile.php";
        // }

        // function logOut() {
        //     window.location.href = "http://localhost/CarPark/logOut.php";
        // }
    </script>
</body>
</html>