<?php include "database/db.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Queries.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.jpg">
    <title>OOPS!!</title>
</head>
<body>
    <div class="page-container">
        <section class="registration-section">
            <div class="registration-form">
                <h2 style="color:#ff6105">CarPark</h2>
                <h2>Woops!!</h2>
                <h3>Something Went Wrong!</h3>
                <button class="registration-btn btn" onclick=back()>Go Back</button>
            </div>
        </section>
    </div>

    <script>
        // function back() {
        //     window.history.back();
        // }
    </script>
</body>
</html>