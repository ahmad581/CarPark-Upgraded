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
    <title>Admin Dashboard</title>
</head>
<body>
    <section class="admin-dashboard-container">
        <header class="admin-dashboard-header">
            <header class="welcome-header" style="width: 100%">
                <div class="logo-and-name">
                    <img src="Images/just_img.jpg" alt="JUST-LOGO" class="just-logo">
                    <h2>CarPark</h2>
                </div>
    
                <nav class="links">
                    <button class="link btn" onclick="profile()">Profile</button>
                    <button class="link btn" onclick="remove()">Remove A Violation Ticket</button>
                    <button class="link btn" onclick="sendMessege()">Send A Messege</button>
                </nav>
    
                <div class="signup-btn-dropdown">
                    <button class="registration-btn btn signup-btn" id="signUp" onclick=reserve()>
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
        </header>

        <aside id="admin-dashboard-side-menu">
            <div class="logo-and-name adimn-page-logo">
                <img src="Images/just_img.jpg" alt="JUST-LOGO" class="just-logo">
                <h2>CarPark</h2>
            </div>

            <!-- <button class="side-menu-item" onclick=DashBoard()>
                <span class="material-icons-outlined" onclick=DashBoard()>grid_view</span>
                <span1 onclick=DashBoard()>DashBoard</span1>
            </button> -->

            <button class="side-menu-item" onclick=Profile()>
                <!-- <span class="material-icons-outlined" onclick=Profile()>person</span> -->
                <span1 onclick=Profile()>Profile</span1>
            </button>

            <button class="side-menu-item" onclick=Messages()>
                <!-- <span class="material-icons-outlined" onclick=Messages()>email</span> -->
                <span1 onclick=Messages()>Messages</span1>
            </button>

            <button class="side-menu-item" onclick=Discount()>
                <!-- <span class="material-icons-outlined" onclick=Discount()>grid_view</span> -->
                <span1 onclick=Discount()>Discount</span1>
            </button>

            <button class="side-menu-item" onclick=Reservation()>
                <!-- <span class="material-icons-outlined" onclick=Reservation()>grid_view</span> -->
                <span1 onclick=Reservation()>Reservation</span1>
            </button>

            <button class="side-menu-item" onclick=viewReserved()>
                <!-- <span class="material-icons-outlined" onclick=viewReserved()>grid_view</span> -->
                <span1 onclick=viewReserved()>Reserved Spaces</span1>
            </button>

            <button class="side-menu-item" onclick=viewAvaialbe()>
                <!-- <span class="material-icons-outlined" onclick=viewAvaialbe()>grid_view</span> -->
                <span1>Available Spaces</span1>
            </button>

            <button class="side-menu-item" onclick=registerAdmin()>
                <!-- <span class="material-icons-outlined" onclick=viewAvaialbe()>grid_view</span> -->
                <span1>Regester Admin</span1>
            </button>

            <button class="side-menu-item" onclick=registerOfficer()>
                <!-- <span class="material-icons-outlined" onclick=viewAvaialbe()>grid_view</span> -->
                <span1>Register Officer</span1>
            </button>
        </aside>

        <main class="admin-dashboard-main-container">
            <div class="page-container" style="width: 100%">
                <section class="personal-info">
                    <div class="img-part">
                        <img src="<?php getUserPic(); ?>" alt="profile_picture">
                        <form action="AdminProfile.php" method="post">
                            <button class="add" onclick="">+</button>
                            <!-- document.getElementById('profile_pic').click() -->
                            <input 
                                type="file" 
                                id="profile_pic" 
                                onchange="uploadProfilePic(this.value);"
                                name="profile_pic" 
                                accept=".jpg, .jpeg, .png" 
                                style="visibility: hidden;" >
                                <input type="text" value="" hidden = hidden>  
                        </form>
                    </div>

                    <!-- <h2 class="name">Ahmad ALodat</h2>

                    <h2 class="email">akalodat19@cit.just.edu.jo</h2> -->
                    <?php #adminDisplayData(); ?>

                    <!-- <h2 class="reservation-balance">500 JD</h2> -->
                </section>

                <!-- <section class="given-violation-tickets-history">
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
                </section> -->

                <section class="main-buttons">
                    <button class="registration-btn btn" id="back" onclick="back()">Back</button>
                    <button class="registration-btn btn" id="editProfile" onclick="editProfile()">Edit Profile</button>
                    <button class="registration-btn btn" id="logOut" onclick="logOut()">Log Out</button>
                </section>
            </div>
        </main>

    </section>

    <script>
        // function DashBoard() {
        //     window.location.href = "http://localhost/CarPark/AdminHomePage.php";
        // }

        // function Profile() {
        //     window.location.href = "http://localhost/CarPark/AdminHomePage.php";
        // }

        // function Messages() {
        //     window.location.href = "http://localhost/CarPark/AdminMesseges.php";
        // }

        // function Discount() {
        //     window.location.href = "http://localhost/CarPark/AdminDiscount.php";
        // }

        // function Reservation() {
        //     window.location.href = "http://localhost/CarPark/ReserveAParkingSpace.php";
        // }

        // function viewReserved() {
        //     window.location.href = "http://localhost/CarPark/ViewReservedParkingSpaces.php";
        // }

        // function viewAvaialbe() {
        //     window.location.href = "http://localhost/CarPark/ViewAvailableParkingSpaces.php";
        // }

        // function registerAdmin() {
        //     window.location.href = "http://localhost/CarPark/SignUpAsAdmin.php";
        // }

        // function registerOfficer() {
        //     window.location.href = "http://localhost/CarPark/SignUpAsOfficer.php";
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