<?php include "database/db.php"; ?>
<?php #include "database/db_functions.php"; ?>
<?php #include "database/functions.php"; ?>
<?php #SendMessege() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="Queries.css">
    <link rel="icon" type="image/x-icon" href="Images/logo.jpg">
    <title>Send Messege</title>
</head>
<body>
    <div class="page-container">
        <section class="registration-section">
            <div class="registration-form">
                <h2 style="color:#ff6105">CarPark</h2>
                <h2>Send A Messege</h2>
                <form action="SendMessege.php" method="post">
                    <div class="input-box">
                        <input type="text" name="fullName" placeholder="FullName">
                        <label for="">FullName</label>
                    </div>

                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email">
                        <label for="">Email</label>
                    </div>
                    
                    <div class="input-box">
                        <input type="text" name="subject" placeholder="Subject">
                        <label for="">Subject</label>
                    </div>

                    <div class="input-box">
                        <textarea name="messege" id="" cols="30" rows="10"></textarea>
                        <label for="">Your Messege</label>
                    </div>

                    <input type="submit" name="submit" value="Send Messege" id="">
                </form>
            </div>
        </section>
    </div>
</body>
</html>