<?php include "db.php"; ?>
<?php 
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    global $connection;
    $id = $_SESSION['user_id'];
    echo $id;

    if(isset($_FILES['profile_pic'])) {
        // print_r($_FILES['profile_pic']);
        $picName = $_FILES['profile_pic']['name'];
        // echo $picName;
        // $tempFilePath = $_FILES['profile_pic']['tmp_name'];
        $newFilePath = "Images/" . $picName;

        $query = "UPDATE user SET pic = '$newFilePath' WHERE ID = '$id'";
        $result = mysqli_query($connection, $query);
        // print_r($result);
        
        if(!$result) {
            $q = "UPDATE officers SET pic = '$newFilePath' WHERE ID = '$id'";
            $r = mysqli_query($connection, $q);
            // print_r($r);
        
            if(!$r) {
                $qu = "UPDATE admins SET pic = '$newFilePath' WHERE ID = '$id'";
                $res = mysqli_query($connection, $qu);
                // print_r($res);
            
                if(!$res) {
                    header("Location: ErrorPage.php");
                    exit();
                }else {
                    $_SESSION['user_pic'] = $newFilePath;
                    header("Location :AdminProfile.php");
                    exit();
                }
            }else {
                $_SESSION['user_pic'] = $newFilePath;
                header("Location :OfficerProfile.php");
                exit();
            }
        }else {
            $_SESSION['user_pic'] = $newFilePath;
            header("Location :UserProfile.php");
            exit();
        }
        
    }else {
        echo "ERROR";
    }

    // $pic = $_POST['user_pic'];
    // $_SESSION['user_id'] = "Images/" . $pic;
    
    // $query = "UPDATE user SET pic = '$pic' WHERE ID = '$id'";
    // $result = mysqli_query($connection, $query);

    // if(!$result) {
    //     $q = "UPDATE officers SET pic = '$pic' WHERE ID = '$id'";
    //     $r = mysqli_query($connection, $q);

    //     if(!$r) {
    //         $qu = "UPDATE admins SET pic = '$pic' WHERE ID = '$id'";
    //         $res = mysqli_query($connection, $qu);

    //         if(!$res) {
    //             header("Location: ErrorPage.php");
    //             exit();
    //         }else {
    //             // header("Refresh:0");
    //         }
    //     }else {
    //         // header("Refresh:0");
    //     }
    // }else {
    //     // header("Refresh:0");
    // }
?>