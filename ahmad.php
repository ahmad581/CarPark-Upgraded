<?php include "database/db.php"; ?>
<?php print_r($_SESSION); ?>

<?php 
    // global $connection;
    // $id = $_SESSION['user_id'];
    // $name = $_SESSION['user_name'];
    // echo "id = " . $id . ", name = " . $name;

    // $q = "SELECT * FROM officers WHERE ID = '$id' and fullName = '$name'";
    // $r = mysqli_query($connection, $q);
    
    // // $ro = mysqli_fetch_assoc($res);
    // // print_r($ro);

    // if(mysqli_num_rows($r) == 0) {
    //     $sql = "SELECT * FROM user WHERE ID = '$id' and fullName = '$name'";
    //     $res = mysqli_query($connection, $sql);

    //     if(mysqli_num_rows($res) == 0) {
    //         $qu = "SELECT * FROM admins WHERE ID = '$id' and fullName = '$name'";
    //         $re = mysqli_query($connection, $qu);

    //         if(mysqli_num_rows($re) == 0) {
    //             echo "ERROR";
    //         }else {
    //             $rowe = mysqli_fetch_assoc($re);
    //             print_r($rowe);
    //         }
    //     }else {
    //        $ro = mysqli_fetch_assoc($r);
    //        print_r($ro);
    //     }
    // }else {
    //     $row = mysqli_fetch_assoc($r);
    //     print_r($row);
    // } 

    // phpinfo();
?>