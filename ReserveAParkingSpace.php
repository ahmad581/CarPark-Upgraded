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

<?php #ReserveParkingSpace(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Queries.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.jpg">
    <title>Reserve A Parking Space</title>
</head>
<body>
    <script>
        // function load(name) {
        //     console.log("load " + name);
        //     var data = new FormData();
        //     data.append("parking_lot_name", name)
        //     console.log("load " + data);
        //     fetch("database/temp.php", {method:"post", body:data})
        //     .then(res => res.text())
        //     .then(txt => function(txt) {
        //         var e = document.getElementById("parkingSpace");
        //         txt.foreach(e.appendChild())
        //         // r.innerHTML = txt;
        //         // e.appendChild(r);
        //     })
        //     // .then(txt => console.log("load 2  " + txt));
        //     // .then(txt => console.log("load 2  " + txt));
        // }
    </script>
    <div class="page-container">
        <section class="registration-section">
            <div class="registration-form">
                <h2 style="color:#ff6105">CarPark</h2>
                <h2>Reserve A Parking Space</h2>
                <form action="ReserveAParkingSpace.php?parkingLot" method="post">
                    <div class="input-box">
                        <select name="parkingLot" id="parkingLot" onchange=load(this.value)>
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

                    <div class="input-box">
                        <select name="parkingSpace" id="parkingSpace">
                            <option value=""></option>
                            <?php #retrieveParkingSpaces(); ?>
                        </select>
                        <label for="">Parking Space</label>
                    </div>

                    <div class="input-box">
                        <input type="number" name="carNumber" placeholder="Car Number">
                        <label for="">Car Number</label>
                    </div>

                    <div class="input-box">
                        <input type="text" name="carType" placeholder="Car Type">
                        <label for="">Car Type</label>
                    </div>

                    <div class="reservation-period">
                        <h2>Enter The Reservation Periode:</h2>
                        <div class="input-box">
                            <input type="time" name="startTime">
                            <label for="">From:</label>
                        </div>

                        <div class="input-box">
                            <input type="time" name="endTime">
                            <label for="">To:</label>
                        </div>
                    </div>

                    <input type="submit" name="submit" value="Reserve A Space" id="">
                </form>
            </div>
        </section>
    </div>

    <script>
        
        //         function saveParkingLotId(parkingLotName) {
        //             // var parkingLotId = document.getElementsByName("parkingLot");
        
        //             sessionStorage.setItem("parkingLotName", parkingLotName);
        //             console.log(parkingLotName);
        //             updateParkingLotSelect();
        //         }
        
        //         function updateParkingLotSelect() {
        // //             var selectElement = document.getElementById("mySelect");
        // // var selectedOption = selectElement.options[selectElement.selectedIndex];
        // //   var selectElement = document.getElementsByName("parkingLot");
        // //   console.log(document.getElementsByName("parkingLot"))
        // //   var parkingLotId = selectElement.options[selectElement.selectedIndex].text;
        // //   console.log(parkingLotId);
        //   var parkingLotName = sessionStorage.getItem("parkingLotName");
        //   console.log(parkingLotName);
        //   var parkingSpaceSelect = document.getElementById("parkingSpace");
        //   parkingSpaceSelect.innerHTML = "<option value=''>Select a parking lot first</option>";
        //   if (parkingLotName) {
        //     // Make an AJAX request to get the available parking spaces for the selected lot
        //     try {
        //         var xhr = new XMLHttpRequest();
        //         xhr.onreadystatechange = function() {
        //             if (xhr.readyState === 4 && xhr.status === 200) {
        //                 console.log(xhr.responseText);
        //                 var parkingSpaces = JSON.parse(xhr.responseText);   
        //                 console.log(parkingSpaces);
        //                 // Add the parking space options to the select element
        //                 for (var i = 0; i < parkingSpaces.length; i++) {
        //                     var option = document.createElement("option");
        //                     option.value = parkingSpaces[i].ID;
        //                     option.text = parkingSpaces[i].parkindSpaceName;
        //                     parkingSpaceSelect.add(option);
        //                 }
        //             }
        //         };
        //     } catch (error) {
        //         console.log(error.message);
        //     }
        //     xhr.open("GET", "ReserveAParkingSpace.php?action=retrieveParkingSpaces(parkingLotId)", true);
        //     xhr.send();
        //   }
        // }
        // // Retrieve the parking lot names and populate the first select element
        // function retrieveParkingLots() {
        //   // Make an AJAX request to the PHP script
        //   var xhttp = new XMLHttpRequest();
        //   xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //       // Parse the JSON response
        //       var data = JSON.parse(this.responseText);
            
        //       // Loop through the data and create an option for each item
        //       var selectElement = document.getElementById("parkingLot");
        //       selectElement.innerHTML = "<option value=''>Select Parking Lot</option>";
        //       for (var i = 0; i < data.length; i++) {
        //         var optionElement = document.createElement("option");
        //         optionElement.text = data[i].parkingLotName;
        //         optionElement.value = data[i].ID;
        //         selectElement.add(optionElement);
        //       }
        //     }
        //   };
        //   xhttp.open("GET", "functions.php?action=retrieveParkingLots", true);
        //   xhttp.send();
        // }
    
        // // Retrieve the parking space names based on the selected parking lot and populate the second select element
        // function retrieveParkingSpaces() {
        //   // Get the selected parking lot ID
        //   var parkingLotId = document.getElementById("parkingLot").value;
        
        //   // Make an AJAX request to the PHP script
        //   var xhttp = new XMLHttpRequest();
        //   xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //       // Parse the JSON response
        //       var data = JSON.parse(this.responseText);
            
        //       // Loop through the data and create an option for each item
        //       var selectElement = document.getElementById("parkingSpace");
        //       selectElement.innerHTML = "<option value=''>Select Parking Space</option>";
        //       for (var i = 0; i < data.length; i++) {
        //         if (data[i].parking_lot_id == parkingLotId) {
        //           var optionElement = document.createElement("option");
        //           optionElement.text = data[i].parkingSpaceName;
        //           optionElement.value = data[i].ID;
        //           selectElement.add(optionElement);
        //         }
        //       }
        //     }
        //   };
        //   xhttp.open("GET", "functions.php?action=retrieveParkingSpaces&parkingLotID=" + parkingLotId, true);
        //   xhttp.send();
        // }
    
        // // Call the retrieveParkingLots() function to populate the first select element
        // retrieveParkingLots();



        // function retriverParkingLots() {
        //     // Make an AJAX request to the PHP script
        //     var xhttp = new XMLHttpRequest();
        //     xhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //           // Parse the JSON response
        //           var data = JSON.parse(this.responseText);
                
        //           // Create an HTML select element
        //           var selectElement = document.createElement("select");
                
        //           // Loop through the data and create an option for each item
        //           for (var i = 0; i < data.length; i++) {
        //             var optionElement = document.createElement("option");
        //             optionElement.text = data[i].name;
        //             optionElement.value = data[i].id;
        //             selectElement.add(optionElement);
        //           }
              
        //           // Add the select element to the page
        //           document.body.appendChild(selectElement);
        //         }
        //     };
        //     xhttp.open("GET", "get_data.php", true);
        //     xhttp.send();
        // }
    </script>
</body>
</html>