<?php include "db.php"; ?>
<?php 
    // class CustomTimer extends Thread {
    //     public function __construct($startTimer, $endTimer) {
    //         $this->startTimer = $startTimer;
    //         $this->endTimer = $endTimer;
    //         $Now = new DateTime();
    //     }

    //     public function run() {
    //         while (!($Now->format('H:i:s') == $this->endTimer->format('H:i:s'))) {
    //             sleep(1);
    //         }

    //         freeParkingSpace();
    //     }
    // }

    // class CustomDateTimer extends Thread {
    //     public function __construct($startTimer, $endTimer, $discountAmount) {
    //         $this->startTimer = $startTimer;
    //         $this->endTimer = $endTimer;
    //         $this->discountAmount = $discountAmount;
    //         $Now = new DateTime();
    //     }

    //     public function calculateNewPrice() {
    //         global $parkingPrice;
    //         $newPrice = $parkingPrice - $this->discountAmount;

    //         return $newPrice;
    //     }
    //     public function run() {
    //         $newPrice = $this->calculateNewPrice();
    //         $parkingPrice = $newPrice;
    //         while (!($Now->format('H:i:s') == $this->endTimer->format('H:i:s'))) {
    //             sleep(1);
    //         }

    //         $parkingPrice = 3.33333333;
    //     }
    // }?>
<?php

function ForgotPassword1() {
    if(isset($_POST['submit'])){
        global $connection;
        $email = $_POST['email'];
        echo "console.log($_SESSTION);";
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            $q = "SELECT * FROM officers WHERE email='$email'";
            $res = mysqli_query($connection, $query);
            if(!$res){
                header("Location: ErrorPage.php");
                exit();
            }else {
                $recovery_code = rand(100000, 999999);
                $sql = "UPDATE officers SET recovery_code='$recovery_code' WHERE email='$email'";
                $r = $connection->query($sql);

                if(!$r) {
                    header("Location: ErrorPage.php");
                    exit();
                }else {
                    $_SESSION['user_email'] = $email;
                    $subject = "Verification Code";
                    $message = "Your verification code is: " . $recovery_code;
                    $headers = "From: ahmadalodat@gmail.com";
                    mail($email, $subject, $message, $headers);
                    $_SESSION['email'] = $email;
                    header("Location: ForgotPassword2.php");
                    exit();
                }
            }
        }else {
            $recovery_code = rand(100000, 999999);
            $sql = "UPDATE user SET recovery_code='$recovery_code' WHERE email='$email'";
            $res = $connection->query($sql);
            if(!$res){
                header("Location: ErrorPage.php");
                exit();
            }else {
                $_SESSION['user_email'] = $email;
                $subject = "Verification Code";
                $message = "Your verification code is: " . $recovery_code;
                $headers = "From: ahmadalodat@gmail.com";
                mail($email, $subject, $message, $headers);
                $_SESSION['email'] = 
                header("Location: ForgotPassword2.php?email=$email");
                exit();
            }
        }
    }
}

function ForgotPassword2() {
    global $connection;
    // if (!isset($_GET["email"])) {
    //     header("Location: ForgotPassword1.php");
    //     exit();
    // }
    $email = $_SESSION["user_email"];

    if (isset($_POST["resend_code"])) {
        // Generate new recovery code and save to database
        $recovery_code = rand(100000, 999999);
        $sql = "UPDATE user SET recovery_code='$recovery_code' WHERE email='$email'";
        $result = mysqli_query($connection, $sql);

        if(!$result) {
            // die("QUERY FAILED" . mysqli_error($connection));
            $sql = "UPDATE officers SET recovery_code='$recovery_code' WHERE email='$email'";
            $res = mysqli_query($connection, $sql);

            if(!$res) {
                header("Location: ErrorPage.php");
                exit();
            }else {
                // Send recovery code to email
            $to = $email;
            $subject = "Password Recovery Code";
            $message = "Your password recovery code is: $recovery_code";
            $headers = "From: webmaster@example.com";
            mail($to, $subject, $message, $headers);
            }
        }else {
            // Send recovery code to email
            $to = $email;
            $subject = "Password Recovery Code";
            $message = "Your password recovery code is: $recovery_code";
            $headers = "From: webmaster@example.com";
            mail($to, $subject, $message, $headers);
        }
    } elseif (isset($_POST["submit"])) {
        // Retrieve recovery code from form
        $recovery_code = $_POST["recoveryCode"];
        // Check if recovery code matches database
        // echo "FIRST" . $email . " " . $recovery_code;
        $sql = "SELECT * FROM user WHERE email='$email' AND recovery_code='$recovery_code'";
        $result = $connection->query($sql);
        
        if (mysqli_num_rows($result) == 0) {
            $sql = "SELECT * FROM officers WHERE email='$email' AND recovery_code='$recovery_code'";
            $res = $connection->query($sql);

            if(mysqli_num_rows($res) == 0) {
                // Recovery code is incorrect
                echo "<script>alert('Invalid recovery code');</script>";
                // header("Location: ForgotPassword2.php");
                // exit();
            }else {
                // Recovery code is correct, redirect to reset password page
                header("Location: ForgotPassword3.php");
                exit();
            }
        }else {
            // Recovery code is correct, redirect to reset password page
            header("Location: ForgotPassword3.php");
            exit();
        }
    }
}

function ForgotPassword3() {
    // if (!isset($_GET["email"])) {
    //     header("Location: ForgotPassword1.php");
    //     exit();
    // }
    $email = $_SESSION["user_email"];

    if(isset($_POST['submit'])){
        global $connection;
        $newPassword = $_POST['newPassword'];
        $confirmNewPassword = $_POST['confirmNewPassword'];

        if($newPassword === $confirmNewPassword){
            $query = "SELECT * FROM user WHERE email='$email'";
            $result = mysqli_query($connection, $query);

            if(!$result) {
                $q = "SELECT * FROM officers WHERE email='$email'";
                $res = mysqli_query($connection, $q);

                if(!$res) {
                    header("Location: ErrorPage.php");
                    exit();
                }else {
                    $sql = "UPDATE officers SET password='$newPassword', recovery_code=0 WHERE email='$email'";
                    $r = mysqli_query($connection, $sql);

                    if(!$r) {
                        header("Location: ErrorPage.php");
                        exit();
                    }else {
                        echo "<script>alert('officer Password Changed Successfully!')</script>";
                        header("Location: logIn.php");
                        exit();
                    }
                }
            }else {
                // $q1 = "UPDATE user SET password='$newPassword', recovery_code=0 WHERE email='$email'";
                // $q1 = "UPDATE user SET ";
                // $q1 .= "password ='$newPassword', ";
                // $q1 .= "recovery_code = 0 ";
                // $q1 .= "WHERE email = '$email'";
                echo $email;
                $q1 = "UPDATE user SET password ='$newPassword', recovery_code = 0 WHERE email = '$email'";
                $res1 = mysqli_query($connection, $q1);


                if(!$res1) {
                    header("Location: ErrorPage.php");
                    exit();
                }else {
                    echo "<script>alert('user Password Changed Successfully!')</script>";
                    header("Location: logIn.php");
                    exit();
                }
            }
        }else {
            echo "<alert>Passwords do not match!</alert>";
            // Passwords do not match
            // $error = "Passwords do not match";
        }
    }
}

function GenerateAViolationTicket(){
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    $id = $_SESSION['user_id'];
    $name = $_SESSION['user_name'];
    global $connection;

    if(isset($_POST['submit'])){
        $parkingLot = $_POST['parkingLot'];
        $parkingSpace = $_POST['parkingSpace'];
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $carNumber = $_POST['carNumber'];
        $carType = $_POST['carType'];
        $date = $_POST['date'];
        $cause = $_POST['cause'];
        $ticketAmount = $_POST['ticketAmount'];

        $sql = "SELECT * FROM user WHERE id='$id'";
        $res = mysqli_query($connection, $sql);
        // $r = mysqli_fetch_assoc($res);
        // echo "console.log($r);";
        if(!$res){
            header("Location: ErrorPage.php");
            exit();
        }else {
            $row = mysqli_fetch_assoc($res);
            // echo "console.log($row);";
            
            // update the query variable to have the proper way of generating the ticket
            $query = "INSERT INTO violationticket(fullName,email,parkingLot,parkingSpace,carNumber,carType,date,cause,ticketAmount,officerName) ";
            $query .= "VALUES ('$fullName', '$email', '$parkingLot', '$parkingSpace', '$carNumber', '$carType', '$date', '$cause', '$ticketAmount', '$name')";
            $result = mysqli_query($connection, $query);
            // $ro = mysqli_fetch_assoc($result);
            // echo "console.log($ro);";
            if(!$result){
                header("Location: ErrorPage.php");
                exit();
            }else {
                header("Location: OfficerHomePage.php");
                exit;
            // $q = "SELECT * FROM reservations WHERE parkingLot = '$parkingLot' and parkingSpace = '$parkingSpace'";
            // $r = mysqli_query($connection, $q);
            // if(!r){
            //     die('Query FAILED' . mysqli_error());
            // }else {
                // }   
            }
        }
    }
}

function SendMessege(){
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    $id = $_SESSION['user_id'];
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $messege = $_POST['messege'];
        $fullName = $_POST['fullName'];
        global $connection;

        $to = "ahmadalodat530@gmail.com";
        $headers = "From: " . $fullName . " -- " . $email;
        mail($to, $subject, $messege, $headers);

        // $query = "INSERT INTO messeges ";
        // $query .= "name = '$fullName', ";
        // $query .= "email = '$email', ";
        // $query .= "subject = '$subject', ";
        // $query .= "messege = '$messege' ";

        $query = "INSERT INTO messeges(name,email,subject,messege) ";
        $query .= "VALUES ('$fullName', '$email', '$subject', '$messege')";
        // echo "console.log($query);";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            header("Location: ErrorPage.php");
            exit();   
        }else {
            $q = "SELECT * FROM user WHERE ID = '$id'";
            $r = mysqli_query($connection, $q);
            if(!$r){
                header("Location: OfficerHomePage.php");
                exit();
            }else {
                header("Location: UserHomePage.php");
                exit();
            }    
        }
    }
}

// function Add(){
//     // if (!isset($_SESSION['user_id'])) {
//     //     header('Location: login.php');
//     //     exit;
//     // }
//     // $user_id = $_SESSION['user_id'];
//     // global $connection;

//     // // Handle profile picture upload
//     // if (isset($_FILES['profile_pic'])) {
//     //     // Replace with your own file upload code
//     //     $file_name = $_FILES['profile_pic']['name'];
//     //     $file_tmp = $_FILES['profile_pic']['tmp_name'];
//     //     move_uploaded_file($file_tmp, 'uploads/' . $file_name);
//     //     // Update user data in database
//     //     $stmt = $connection->prepare('UPDATE users SET profile_picture = ? WHERE id = ?');
//     //     $stmt->execute([$file_name, $user_id]);
//     //     // Refresh page to show new profile picture
//     //     header('Location: profile.php');
//     //     exit;
//     // }
// }

function userDisplayData() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    $id = $_SESSION['user_id'];
    global $connection;

    $query = "SELECT * FROM user WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo '<h2>' . $row['fullName'] . '</h2>';
        echo '<h2>' . $row['email'] . '</h2>';
    }else {
        // $query = "SELECT * FROM officers WHERE id='$id'";
        // $result = mysqli_query($connection, $query);

        // if(mysqli_num_rows($result) == 1) {
        //     echo '<h2>' . $query['fullName'] . '</h2>';
        //     echo '<h2>' . $query['email'] . '</h2>';
        // }else {
            echo "<script>alert('Somthing went wronge! Please Reload The Page');</script>";
        // }
    }
}

function officerDisplayData() {
    // if (!isset($_SESSION['user_id'])) {
    //     header('Location: login.php');
    //     exit;
    // }
    $id = $_SESSION['user_id'];
    global $connection;

    $query = "SELECT * FROM officers WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo '<h2>' . $row['fullName'] . '</h2>';
        echo '<h2>' . $row['email'] . '</h2>';
        echo '<h2>Reservations Balance: ' . $row['amountForDriverPayment'] . '</h2>';
    }else {
        // $query = "SELECT * FROM officers WHERE id='$id'";
        // $result = mysqli_query($connection, $query);

        // if(mysqli_num_rows($result) == 1) {
        //     echo '<h2>' . $query['fullName'] . '</h2>';
        //     echo '<h2>' . $query['email'] . '</h2>';
        // }else {
            echo "<script>alert('Somthing went wronge! Please Reload The Page');</script>";
        // }
    }
}

function adminDisplayData() {
    $id = $_SESSION['user_id'];
    global $connection;

    $query = "SELECT * FROM admins WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo '<h2>' . $row['fullName'] . '</h2>';
        echo '<h2>' . $row['email'] . '</h2>';
        echo '<h2>SSN' . $row['ssn'] . '</h2>';
    }else {
        // $query = "SELECT * FROM officers WHERE id='$id'";
        // $result = mysqli_query($connection, $query);

        // if(mysqli_num_rows($result) == 1) {
        //     echo '<h2>' . $query['fullName'] . '</h2>';
        //     echo '<h2>' . $query['email'] . '</h2>';
        // }else {
            echo "<script>alert('Somthing went wronge! Please Reload The Page');</script>";
        // }
    }
}

function ReserveParkingSpace() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    $id = $_SESSION['user_id'];
    global $connection;

    if(isset($_POST['submit'])){
        $sql = "SELECT * FROM user WHERE id='$id'";
        $res = mysqli_query($connection, $sql);

        if(!$res){
            header("Location: ErrorPage.php");
            exit();
        }else {
            $row1 = mysqli_fetch_assoc($res);
            $fullName = $row1['fullName'];
            $email = $row1['email'];
            $parkingLot = $_POST['parkingLot'];
            $parkingSpace = $_POST['parkingSpace'];
            $carNumber = $_POST['carNumber'];
            $carType = $_POST['carType'];
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];

            $q = "SELECT * FROM parkingSpace WHERE parkingSpaceName = '$parkingSpace'";
            $r = mysqli_query($connection, $q);

            if(!$r){
                header("Location: ErrorPage.php");
                exit();
            }else {
                $ro = mysqli_fetch_assoc($r);
                if($ro['isFree'] == 0) {
                    echo "<alert>Parking Space Already Reserved!\n Please Choose Another One.</alert>";
                    echo '<script>setTimeout(function(){ location.reload(); }, 2000);</script>';
                }else {
                    $query = "INSERT INTO Reservations(fullname,email,parkingLot,parkingSpace,carNumber,carType,startTime,endTime) ";
                    $query .= "VALUES ('$fullName', '$email', '$parkingLot', '$parkingSpace', '$carNumber', '$carType', '$startTime', '$endTime')";

                    // echo "console.log($query);";

                    $result = mysqli_query($connection, $query);
                    if(!$result) {
                        header("Location: ErrorPage.php");
                        exit();   
                    }else {
                        $temp = "SELECT * FROM reservations WHERE fullname = '$fullName' AND email = '$email' AND startTime = '$startTime' AND endTime = '$endTime'";
                        $rrr = mysqli_query($connection, $temp);
                        $roro = mysqli_fetch_assoc($rrr);
                        $_SESSION['reservation_id'] = $roro['ID'];


                        $sql1 = "UPDATE parkingSpace SET isFree = 0 WHERE parkingSpaceName = '$parkingSpace' ";
                        $res1 = mysqli_query($connection, $sql1);
                        if(!$res1){
                            header("Location: ErrorPage.php");
                            exit();
                        }else{
                            header("Location: Payment.php");
                            exit();
                            // $sTime = DateTime::createFromFormat('H:i', $startTime);
                            // $eTime = DateTime::createFromFormat('H:i', $endTime);
                            // $timeDiff = $eTime->getTimestamp() - $sTime->getTimestamp();
                            // // header("Location: UserHomePage.php");
                            // header("Refresh: $timeDiff; url=UserHomePage.php?timeDiff=$timeDiff&parkingSpaceName=$parkingSpace");
                            // register_shutdown_function('freeParkingSpace()', $parkingSpace);
                            // exit;   
                        }
                        // $sql = "SELECT * FROM parkingSpace where parkingSpaceName = '$parkingSpace' ";
                        // $res = mysqli_query($connection, $sql);
                        // if(!$res){
                        //     die("QUERY FAILED" . mysqli_error($connection));
                        // }else{
                        // }
                    }
                }
            }
        }
    }
}

// function freeParkingSpace() {
//     // global $connection;
    
//     // $resID = $_SESSION['reservation_id'];
//     // $q = "SELECT * FROM reservations WHERE ID = '$resID'";
//     // $r = mysqli_query($connection, $q);

//     // if(mysqli_num_rows($r) == 0) {
//     //     header("Location: ErrorPage.php");
//     //     exit();
//     // } else {
//     //     $row = mysqli_fetch_assoc($r);
//     //     $parkingSpaceName = $row['parkingSpace'];
//     //     $query = "UPDATE parkingSpace SET isFree = 1 WHERE parkingSpaceName = '$parkingSpaceName'";
//     //     $result = mysqli_query($connection, $query);

//     //     if(!$result) {
//     //         header("Location: ErrorPage.php");
//     //         exit();
//     //     }
//     // }
    
//     // else {
//     //     $q = "UPDATE parkingSpace SET isFree = 1";
//     //     $r = mysqli_query($connection, $q);

//     //     if(!$r) {
//     //         die("QUERY FAILED" . mysqli_error($connection));
//     //     }
//     // }
// }

function OfficerReservationForAnotherDriver() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    $id = $_SESSION['user_id'];
    global $connection;

    if(isset($_POST['submit'])){
        $fullName = $_POST['driverName'];
        $email = $_POST['driverEmail'];
        $parkingLot = $_POST['parkingLot'];
        $parkingSpace = $_POST['parkingSpace'];
        $carNumber = $_POST['carNumber'];
        $carType = $_POST['carType'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $officerName = $_SESSION['user_name'];
        $officerID = $_SESSION['user_id'];

        $q = "SELECT * FROM parkingSpace WHERE parkingSpaceName = '$parkingSpace'";
        $r = mysqli_query($connection, $q);

        if(!$r) {
            header("Location: ErrorPage.php");
            exit();
        }else {
            $ro = mysqli_fetch_assoc($r);
            if($ro['isFree'] == 0) {
                echo "<script>alert('Parking Space Already Reserved!\n Please Choose Another One.');</script>";
                echo '<script>setTimeout(function(){ location.reload(); }, 2000);</script>';
            }else {
                $query = "INSERT INTO officersreservations(fullName, email, parkingLot, parkingSpace, carNumber, carType, startTime, endTime, officerName) ";
                $query .= "VALUES ('$fullName', '$email', '$parkingLot', '$parkingSpace', '$carNumber', '$carType', '$startTime', '$endTime', '$officerName')";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    header("Location: ErrorPage.php");
                    exit();   
                }else {
                    $temp = "SELECT * FROM officersreservations WHERE fullname = '$fullName' AND email = '$email'";
                    $rrr = mysqli_query($connection, $temp);
                    $roro = mysqli_fetch_assoc($rrr);
                    $_SESSION['reservation_id'] = $roro['ID'];

                    $sql1 = "UPDATE parkingSpace SET isFree = 0 WHERE parkingSpaceName = '$parkingSpace' ";
                    $res1 = mysqli_query($connection, $sql1);
                    if(!$res1){
                        header("Location: ErrorPage.php");
                        exit();
                    }else{
                        $qqqq = "SELECT * FROM officers WHERE ID = '$officerID' AND fullName = '$officerName'";
                        $rrrr = mysqli_query($connection, $qqqq);

                        if(mysqli_num_rows($rrrr) == 0) {
                            header("Location: ErrorPage.php");
                            exit();
                        }
                        $rowrow = mysqli_fetch_assoc($rrrr);
                        
                        $balanceBeforePay = $rowrow['amountForDriverPayment'];
                        $reservationPrice = caculatePrice($startTime, $endTime);

                        if($balanceBeforePay < $reservationPrice) {
                            echo "<script> alert('Your balance is not enoph!');</script>";
                            echo '<script>setTimeout(function(){ location.reload(); }, 2000);</script>';
                        }else {
                            $balanceAfterPay = $balanceBeforePay - $reservationPrice;

                            $qq = "UPDATE officers SET amountForDriverPayment = '$balanceAfterPay' WHERE ID = '$officerID'";
                            $rr = mysqli_query($connection, $qq);

                            if(!$rr){
                                header("Location: ErrorPage.php");
                                exit();
                            }
                        
                            $q = "UPDATE officerreservations SET isPaid = 1 WHERE ID = '$reservationID'";
                            $r = mysqli_query($connection, $q);
                        
                            if(!$r){
                                header("Location: ErrorPage.php");
                                exit();
                            }else {
                                header("Location: OfficerHomePage.php");
                                exit();
                            }
                        }

                        // $parkingSpaceName = $parkingSpace;
                        // $sTime = DateTime::createFromFormat('H:i', $startTime);
                        // $eTime = DateTime::createFromFormat('H:i', $endTime);
                        // $timeDiff = $eTime->getTimestamp() - $sTime->getTimestamp();
                        // // header("Location: UserHomePage.php");
                        // header("Refresh: $timeDiff; url=OfficerHomePage.php?timeDiff=$timeDiff&parkingSpaceName=$parkingSpaceName");
                        // register_shutdown_function('freeParkingSpace()', $parkingSpaceName);
                        // exit;   
                    }
                } 
            }
        }   
    }
}

function displayAvailableParkingSpaces() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    if (isset($_SESSION['parking_lot_name'])) {
        $name = $_SESSION['parking_lot_name'];
        $id = $_SESSION['user_id'];
    
        global $connection;
        
        // $selected_option = $_POST['option'];
        $query = "SELECT * FROM parkingLot WHERE parkingLotName = '$name'";
        $res = $connection->query($query);
        
        if(!$res){
            header("Location: ErrorPage.php");
            exit();
        }else {
            $ro = mysqli_fetch_assoc($res);
            $id = $ro['ID'];
            $sql = "SELECT * FROM parkingSpace WHERE parkingLotId = '$id' AND isFree = 1";
            $result = $connection->query($sql);
        
            if(!$result){
                header("Location: ErrorPage.php");
                exit();
            }else {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>". $row["ID"]. "</td>";
                    echo "<td>". $row["parkingSpaceName"]. "</td>";
                    echo "</tr>\n";
                }
            }
        }
    }
    

    // if (isset($_POST['option'])) {
    //     $selected_option = $_POST['option'];
    //     $query = "SELECT * FROM parkingLot WHERE option = '$selected_option'";
    //     $res = $connection->query($query);

    //     if(!$res){
    //         die('Query FAILED' . mysqli_error());
    //     }else {
    //         $parkingLotId = $res['parkingLotId'];
    //         $sql = "SELECT * FROM parkingSpac WHERE parkingLotId = '$parkingLotId' AND isFree = 1";
    //         $result = $connection->query($sql);

    //         if(!$result){
    //             die('Query FAILED' . mysqli_error());
    //         }else {
    //             while($row = $result->fetch_assoc()) {
    //                 echo "<tr>";
    //                 echo "<td>". $row["ID"]. "</td>";
    //                 echo "<td>". $row["parkingSpaceName"]. "</td>";
    //                 echo "</tr>\n";
    //             }
    //         }
    //     }
    // }
}

function displayReservedParkingSpaces() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
    $id = $_SESSION['user_id'];
    $name = $_SESSION['parking_lot_name'];
    global $connection;


    $query = "SELECT * FROM parkingLot WHERE parkingLotName = '$name'";
    $res = $connection->query($query);

    if(!$res){
        header("Location: ErrorPage.php");
        exit();
    }else {
        $ro = mysqli_fetch_assoc($res);
        $id = $ro['ID'];
        $sql = "SELECT * FROM parkingSpace WHERE parkingLotId = '$id' AND isFree = 0";
        $result = $connection->query($sql);

        if(!$result){
            header("Location: ErrorPage.php");
            exit();
        }else {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>". $row["ID"]. "</td>";
                echo "<td>". $row["parkingSpaceName"]. "</td>";
                echo "</tr>\n";
            }
        }
    }

    // if (isset($_POST['option'])) {
    //     $selected_option = $_POST['option'];
    //     $query = "SELECT * FROM parkingLot WHERE option = '$selected_option'";
    //     $res = $connection->query($query);

    //     if(!$result){
    //         die('Query FAILED' . mysqli_error());
    //     }else {
    //         $parkingLotId = $res['parkingLotId'];
    //         $sql = "SELECT * FROM parkingSpace WHERE parkingLotId = '$parkingLotId' AND isFree = 0";
    //         $result = $connection->query($sql);

    //         if(!$result){
    //             die('Query FAILED' . mysqli_error());
    //         }else {
    //             while($row = $result->fetch_assoc()) {
    //                 echo "<tr>";
    //                 echo "<td>". $row["ID"]. "</td>";
    //                 echo "<td>". $row["parkingSpaceName"]. "</td>";
    //                 echo "</tr>";
    //             }
    //         }
    //     }
    // }
}

function displayGivinViolations() {
    // if(isset($_SESSION['user_id'])) {
    //     header("Location: LogIn.php");
    //     exit();
    // }
    $id = $_SESSION['user_id'];
    $name = $_SESSION['user_name'];
    global $connection;

    $query = "SELECT * FROM violationticket WHERE officerName = '$name'";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        header("Location: ErrorPage.php");
        exit();
    } else {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["ID"]. "</td>";
            echo "<td>". $row["fullName"]. "</td>";
            echo "<td>". $row["email"]. "</td>";
            echo "<td>". $row["parkingLot"]. "</td>";
            echo "<td>". $row["parkingSpace"]. "</td>";
            echo "<td>". $row["carNumber"]. "</td>";
            echo "<td>". $row["carType"]. "</td>";
            echo "<td>". $row["date"]. "</td>";
            echo "<td>". $row["cause"]. "</td>";
            echo "<td>". $row["ticketAmount"]. "</td>";
            echo "<td>". $row["officerName"]. "</td>";
            echo "</tr>";
        }
    }
}

function displayRecievedViolations() {
    $id = $_SESSION['user_id'];
    $name = $_SESSION['user_name'];
    global $connection;

    $query = "SELECT * FROM violationticket WHERE fullName = '$name'";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        header("Location: ErrorPage.php");
        exit();
    } else {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["ID"]. "</td>";
            echo "<td>". $row["fullName"]. "</td>";
            echo "<td>". $row["email"]. "</td>";
            echo "<td>". $row["parkingLot"]. "</td>";
            echo "<td>". $row["parkingSpace"]. "</td>";
            echo "<td>". $row["carNumber"]. "</td>";
            echo "<td>". $row["carType"]. "</td>";
            echo "<td>". $row["date"]. "</td>";
            echo "<td>". $row["cause"]. "</td>";
            echo "<td>". $row["ticketAmount"]. "</td>";
            echo "<td>". $row["officerName"]. "</td>";
            echo "</tr>";
        }
    }
}

function retrieveParkingSpaces() {
    global $connection;
    $PNAME = $_SESSION['parking_lot_name'];
    // echo "<script>console.log($PNAME)</script>";
    // $id = $_SESSION['parkingLotID'];
    // echo "<script>console.log('ahmad')</script>";
    // echo "<script>console.log($PNAME)</script>";
    $q = "SELECT * FROM parkingLot WHERE parkingLotName = '$PNAME'";
    $r = mysqli_query($connection, $q);
    if(!$r){
        header("Location: ErrorPage.php");
        exit();
    }else {
        $ro = mysqli_fetch_array($r);
        $parkingLotID = $ro['ID'];
        // $query = "SELECT parkingLot.ID, parkingSpace.parkingSpaceName FROM parkingLot  INNER JOIN parkingSpace ON parkingLot.ID = parkingSpace.parkingLotID WHERE parkingSpace.isFree = 1 and parkingLotID = '$PID'";
        $query = "SELECT * FROM parkingSpace WHERE parkingLotID = '$parkingLotID'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            header("Location: ErrorPage.php");
            exit();
        }else {
            while($row = mysqli_fetch_assoc($result)) {
                $parking_space = $row['ID'];
                $parking_space_Name = $row['parkingSpaceName'];
                // $parkinglot = $parking_lot . "_" . $parking_lot_Name;
                echo "<option value='$parking_space_Name' style='color='#ff6105'>$parking_space_Name</option>";
            }
        }
    }
    // echo "<script>console.log($PID)</script>";
    
    // return json_encode($parkingSpaces);
    // if (!isset($_SESSION['user_id'])) {
    //     header('Location: login.php');
    //     exit;
    // }
    // $id = $_SESSION['user_id'];
    // $parkingLotID =  $_SESSION['parking_lot_id'];
    // global $connection;

    // $query = "SELECT * FROM parkingSpace WHERE parkingLotID = '$parkingLotID' AND isFree = 1";
    // $result = mysqli_query($connection, $query);

    // if(!$result){
    //     die('Query FAILED' . mysqli_error());
    // }else {
    //     while($row = mysqli_fetch_array($result)) {
    //         $parking_space = $row['parkingSpaceName'];
    //         echo "<option value='$parking_space' style='color=''#ff6105'>$parking_space</option>";
    //     }
    //     print_r($row);
    // }
}

function displayReservations() {
    // if(isset($_SESSION['user_id'])) {
    //     header("Location: LogIn.php");
    //     exit();
    // }
    // $id = $_SESSION['user_id'];
    // $name = $_SESSION['user_name'];
    global $connection;

    $query = "SELECT * FROM reservations";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        header("Location: ErrorPage.php");
        exit();
    } else {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["ID"]. "</td>";
            echo "<td>". $row["fullName"]. "</td>";
            echo "<td>". $row["email"]. "</td>";
            echo "<td>". $row["parkingLot"]. "</td>";
            echo "<td>". $row["parkingSpace"]. "</td>";
            echo "<td>". $row["carNumber"]. "</td>";
            echo "<td>". $row["carType"]. "</td>";
            echo "<td>". $row["startTime"]. "</td>";
            echo "<td>". $row["endTime"]. "</td>";
            echo "</tr>";
        }
    }
}

function getUserPic() {
    // if(isset($_SESSION['user_id'])) {
    //     header("Location: LogIn.php");
    //     exit();
    // }
    global $connection;
    $id = $_SESSION['user_id'];
    $name = $_SESSION['user_name'];

    $query = "SELECT * FROM user WHERE ID = '$id' and fullName = '$name'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 0) {
        $q = "SELECT * FROM officers WHERE ID = '$id' and fullName = '$name'";
        $r = mysqli_query($connection, $q);

        if(mysqli_num_rows($r) == 0) {
            $qu = "SELECT * FROM admins WHERE ID = '$id' and fullName = '$name'";
            $re = mysqli_query($connection, $qu);

            if(mysqli_num_rows($re) == 0) {
                header("Location: ErrorPage.php");
                exit();
            }else {
                $row = mysqli_fetch_assoc($re);
                $pic = $row['pic'];
            }
        }else {
            $row = mysqli_fetch_assoc($r);
            $pic = $row['pic'];
        }
    }else {
        $row = mysqli_fetch_assoc($result);
        $pic = $row['pic'];
    }
    $_SESSION['user_pic'] = $pic;
    echo $pic;
}

function viewMesseges() {
    global $connection;

    $query = "SELECT * FROM messeges";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 0) {
        header("Location: ErrorPage.php");
        exit();
    }else {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["ID"]. "</td>";
            echo "<td>". $row["name"]. "</td>";
            echo "<td>". $row["email"]. "</td>";
            echo "<td>". $row["subject"]. "</td>";
            echo "<td>". $row["messege"]. "</td>";
            echo "</tr>";
        }
    }
}

function removeTicket() {
    if(isset($_POST['submit'])) {
        global $connection;

        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $carNumber = $_POST['carNumber'];
        $carType = $_POST['carType'];
        $date = $_POST['date'];

        $query = "DELETE * from violationticket WHERE fullName = '$fullName' and email = '$email' and carNumber = '$carNumber' and carType = '$carType' and date = '$date'";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            header("Location: ErrorPage.php");
            exit();
        }else {
            echo "<script>alert('Vtiolation Ticket Removed Successfully')</script>";
        }
    }
}

function Payment() {
    if(isset($_POST['submit'])) {
        $cardHolderName = $_POST['cardHolderName'];
        $visaCardNumber = $_POST['visaCardNumber'];
        $CVVNumber = $_POST['CVVNumber'];
        $expirationDate = $_POST['expirationDate'];
        $pinNumber = $_POST['pinNumber'];
        $reservationID = $_SESSION['reservation_id'];
        global $connection;

        $query = "SELECT * FROM visa WHERE cardHolderName = '$cardHolderName' and visaCardNumber = '$visaCardNumber'";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 0) {
            echo "<script> alert('No cards found with the entered information!');</script>";
        }else {
            $row = mysqli_fetch_assoc($result);
            if($pinNumber == $row['pinNumber']) {
                $q = "SELECT * FROM reservations WHERE ID = '$reservationID'";
                $r = mysqli_query($connection, $q);

                if(mysqli_num_rows($r) == 0) {
                    header("Location: ErrorPage.php");
                    exit();
                }

                $resRow = mysqli_fetch_assoc($r);
                $startTime = $resRow['startTime'];
                $endTime = $resRow['endTime'];


                $balanceBeforePay = $row['balance'];
                $reservationPrice = caculatePrice($startTime, $endTime);
                $balanceAfterPay = $balanceBeforePay - $reservationPrice;

                $id = $row['ID'];

                $qq = "UPDATE visa SET balance = '$balanceAfterPay' WHERE ID = '$id'";
                $rr = mysqli_query($connection, $qq);

                if(!$rr){
                    header("Location: ErrorPage.php");
                    exit();
                }

                $email = $_SESSION['user_email'];
                
                $q = "UPDATE reservations SET isPaid = 1 WHERE ID = '$reservationID'";
                $r = mysqli_query($connection, $q);

                if(!$r){
                    header("Location: ErrorPage.php");
                    exit();
                }

                // $timer = new CustomTimer($startTime, $endTime);
                // $timer->start();

                $query = "SELECT * FROM user WHERE email='$email'";
                $result = mysqli_query($connection, $query);
                
                if(!mysqli_num_rows($result) > 0) {
                    $q = "SELECT * FROM officers WHERE email = '$email'";
                    $r = mysqli_query($connection, $q);
                    
                    if(!mysqli_num_rows($r) > 0) {
                        $qu = "SELECT * FROM admins WHERE email = '$email'";
                        $re = mysqli_query($connection, $qu);
                        
                        if(mysqli_num_rows($re) > 0) {
                            header("Location: AdminHomePage.php");
                            exit();
                        }
                    }else {
                        header("Location: OfficerHomePage.php");
                        exit();
                    }
                }else {
                    header("Location: UserHomePage.php");
                    exit();
                }
            }
        }
    }
}

function caculatePrice($startTime, $endTime) {
    global $parkingPrice;
    $sTime = strtotime($startTime);
    // print_r($sTime);
    $eTime = strtotime($endTime);
    // print_r($eTime);
    $timeDiff = $eTime - $sTime;
    // $timeDiffMinutes = $timeDiff / 60;
    $price = $timeDiffMinutes * $parkingPrice;

    return $price;
}

function AdminDiscount() {
    if(isset($_POST['submit'])) {
        $discountAmount = $_POST['discountAmount'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $timer = CustomDateTimer($startDate, $endDate, $discountAmount);
        $timer->start();

        header("Location: AdminHomePage.php");
        exit();
    }
}
?>