<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Queries.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>Admin Messeges</title>
</head>
<body>
<div class="page-container">
        <section class="registration-section">
            <div class="registration-form">
                <h2 style="color:#ff6105">CarPark</h2>
                <h2>Reserved Parking Spaces</h2>
                
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sender Name</th>
                            <th>Sender EMAIL</th>
                            <th>Messege Subject</th>
                            <th>Messege</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php #viewMesseges(); ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
</html>