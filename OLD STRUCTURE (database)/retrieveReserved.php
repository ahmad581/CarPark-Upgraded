<?php include "db.php"; ?>
<?php 
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    global $connection;
    $H = $_POST['parking_lot_name'];
    // echo "console.log(temp 1)";
    // echo "console.log($H);";
    $_SESSION['parking_lot_name'] = $H;
    // $G = $_SESSION['parking_lot_name'];
    // print_r($_SESSION);
    // echo "\n$_SESSION";

    $query = "SELECT * FROM parkingLot WHERE parkingLotName = '$H'";
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        header("Location: ErrorPage.php");
        exit();
    }else {
        $ro = mysqli_fetch_assoc($result);
        $id = $ro['ID'];
        $q = "SELECT * FROM parkingSpace WHERE parkingLotID  = '$id' and isFree = 0";
        $r = mysqli_query($connection, $q);

        if(!$r) {
            header("Location: ErrorPage.php");
            exit();
        }else {
            while($row = mysqli_fetch_array($r)) {
                $parking_space_Name = $row['parkingSpaceName'];
                echo "<tr>";
                echo "<td>". $row["ID"]. "</td>";
                echo "<td>". $row["parkingSpaceName"]. "</td>";
                echo "</tr>\n";
                // print_r($row);
            }
        }
    }
?>