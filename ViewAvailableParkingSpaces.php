<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>
<?php 
    // function retrieveParkingLots() {
    //     if (!isset($_SESSION['user_id'])) {
    //         header('Location: login.php');
    //         exit;
    //     }
    //     $id = $_SESSION['user_id'];
    //     global $connection;
        
    //     $query = "SELECT * FROM parkingLot";
    //     $result = mysqli_query($connection, $query);
        
    //     if(!$result){
    //         header("Location: ErrorPage.php");
    //         exit();
    //     }else {
    //         while($row = mysqli_fetch_assoc($result)) {
    //             $parking_lot = $row['ID'];
    //             $parking_lot_Name = $row['parkingLotName'];
    //             // $parkinglot = $parking_lot . "_" . $parking_lot_Name;
    //             echo "<option value='$parking_lot_Name'>$parking_lot_Name</option>";
    //         }
    //         // $_SESSION['parkingLotID'] = 1;
    //     }
    // }
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
    <title>Available Parking Spaces</title>
</head>
<body>
    <script>
        // function load(name) {
        //     console.log("load " + name);
        //     var data = new FormData();
        //     data.append("parking_lot_name", name)
        //     console.log("load " + data);
        //     fetch("database/retrieveAvailable.php", {method:"post", body:data})
        //     .then(res => res.text())
        //     // .then(txt => function(txt) {
        //     //     var e = document.getElementById("table-body");
        //     //     // txt.foreach(e.appendChild())
        //     //     e.innerHTML = txt;
        //     //     // e.appendChild(r);
        //     // })
        //     // // .then(txt => console.log("load 2  " + txt));
        //     // .then(txt => console.log("load 2  " + txt));
        // }
    </script>
    <div class="page-container">
        <section class="registration-section">
            <div class="registration-form">
                <h2 style="color:#ff6105">CarPark</h2>
                <h2>Available Parking Spaces</h2>
                <form action="ReserveAParkingSpace.php" method="post">
                    <div class="input-box">
                        <select name="parkingLot" id="" onchange=load(this.value)>
                            <option value="">
                                <?php 
                                    // if(isset($_SESSION["parking_lot_name"])) {
                                    //     echo $_SESSION["parking_lot_name"];
                                    // }
                                ?>
                            </option>
                            <?php #retrieveParkingLots(); ?>
                        </select>
                        <label for="">Parking Lot</label>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Parking Space Name</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php #displayAvailableParkingSpaces(); ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </section>
    </div>
</body>
</html>