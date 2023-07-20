<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>
<?php #removeTicket() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Queries.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.jpg">
    <title>Remove A Violation Ticket</title>
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
                <h2>Remove A Violation Ticket</h2>
                <form action="AdminRemoveTicket.php" method="post">

                    <div class="input-box">
                        <input type="text" name="fullName" placeholder="Full Name">
                        <label for="">Full Name</label>
                    </div>

                    <div class="input-box">
                        <input type="text" name="email" placeholder="Email">
                        <label for="">Email</label>
                    </div>

                    <div class="input-box">
                        <input type="number" name="carNumber" placeholder="Car Number">
                        <label for="">Car Number</label>
                    </div>

                    <div class="input-box">
                        <input type="text" name="carType" placeholder="Car Type">
                        <label for="">Car Type</label>
                    </div>
                    
                    <div class="input-box">
                        <input type="date" name="date" placeholder="Date">
                        <label for="">Date</label>
                    </div>

                    <input type="submit" name="submit" value="Remove The Ticket" id="">
                </form>
            </div>
        </section>
    </div>
</body>
</html>