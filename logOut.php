<?php include "db.php"; ?>
<?php 
    session_unset();
    session_destroy();

    header("Location: logIn.php");
    exit();
?>