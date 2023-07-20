<?php include "db.php"; ?>
<?php
function SignUpAsAProffesor() {
    if(isset($_POST['submit'])){
        global $connection;
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];

        $sql = "SELECT * FROM user WHERE email='$email'";
        $res = mysqli_query($connection, $sql);

        if(mysqli_num_rows($res) == 1){
            echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
        }else {
            $q = "SELECT * FROM officers WHERE email='$email'";
            $r = mysqli_query($connection, $q);

            if(mysqli_num_rows($r) == 1) {
                echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
            }else {
                $qu = "SELECT * FROM admins WHERE email='$email'";
                $re = mysqli_query($connection, $qu);

                if(mysqli_num_rows($re) == 1) {
                    echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
                }else {
                    if($confirmedPassword === $password){
                        $fullName = mysqli_real_escape_string($connection, $fullName);
                        $email = mysqli_real_escape_string($connection, $email);
                        $password = mysqli_real_escape_string($connection, $password);
            
                        $query = "INSERT INTO user(fullname,email,password,type) ";
                        $query .= "VALUES ('$fullName', '$email', '$password', 'Professor')";
            
                        $result = mysqli_query($connection, $query);
                        if(!$result){
                            header("Location: ErrorPage.php");
                            exit();
                        }else{
                            $sqlQuery = "SELECT * FROM user WHERE email='$email'";
                            $result1 = mysqli_query($connection, $sqlQuery);
        
                            if(mysqli_num_rows($result1) == 1){
                                $row = mysqli_fetch_assoc($result1);
                                // session_start();
                                $_SESSION['user_id'] = $row['ID'];
                                $_SESSION['user_name'] = $row['fullName'];
                                header("Location: UserHomePage.php");
                                exit;
                            }else{}
                        }
                    }else {
                        echo "<script>alert('Your Password Does Not Match Your Confirmation Password! Please Try Again.');</script>";
                    }
                }
            }
        }
    }
}

function SignUpAsOfficer() {
    if(isset($_POST['submit'])){
        global $connection;
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        // $ssn = $_POST['ssn'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];

        $sql = "SELECT * FROM officers WHERE email='$email'";
        $res = mysqli_query($connection, $sql);

        if(mysqli_num_rows($res) == 1){
            echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
        }else {
            $q = "SELECT * FROM user WHERE email='$email'";
            $r = mysqli_query($connection, $q);

            if(mysqli_num_rows($r) == 1){
                echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
            }else {
                $qu = "SELECT * FROM admins WHERE email='$email'";
                $re = mysqli_query($connection, $qu);

                if(mysqli_num_rows($re) == 1) {
                    echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
                }else {
                    if($confirmedPassword === $password){
                        $fullName = mysqli_real_escape_string($connection, $fullName);
                        $email = mysqli_real_escape_string($connection, $email);
                        // $ssn = mysqli_real_escape_string($connection, $ssn);
                        $ssn = rand(100000, 999999);
                        $password = mysqli_real_escape_string($connection, $password);
            
                        $query = "INSERT INTO officers(fullName,email,ssn,password,amountForDriverPayment,salary) ";
                        $query .= "VALUES ('$fullName', '$email', '$ssn', '$password', '250', '250')";
            
                        $result = mysqli_query($connection, $query);
                        if(!$result){
                            header("Location: ErrorPage.php");
                            exit();
                        }else{
                            $sqlQuery = "SELECT * FROM officers WHERE email='$email'";
                            $result1 = mysqli_query($connection, $sqlQuery);
        
                            if(mysqli_num_rows($result1) == 1){
                                // $row = mysqli_fetch_assoc($result1);
                                // // session_start();
                                // $_SESSION['user_id'] = $row['ID'];
                                // $_SESSION['user_name'] = $row['fullName'];
                                header("Location: OfficerHomePage.php");
                                exit;
                            }else{}
                        }
                    }else {
                        echo "<script>alert('Your Password Does Not Match Your Confirmation Password! Please Try Again.');</script>";
                    }
                }
            }
        }
    }
}

function SignUpAsStudent(){
    if(isset($_POST['submit'])){
        global $connection;
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $stdID = $_POST['stdID'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        
        $sql = "SELECT * FROM user WHERE email='$email'";
        $res = mysqli_query($connection, $sql);

        if(mysqli_num_rows($res) == 1){
            echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
        }else {
            $q = "SELECT * FROM officers WHERE email='$email'";
            $r = mysqli_query($connection, $q);

            if(mysqli_num_rows($r) == 1){
                echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
            }else {
                $qu = "SELECT * FROM admins WHERE email='$email'";
                $re = mysqli_query($connection, $qu);

                if(mysqli_num_rows($re) == 1){
                    echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
                }else {
                    if($confirmedPassword === $password){
                        $fullName = mysqli_real_escape_string($connection, $fullName);
                        $email = mysqli_real_escape_string($connection, $email);
                        $password = mysqli_real_escape_string($connection, $password);
            
                        $query = "INSERT INTO user(fullname,email,stdID,password,type) ";
                        $query .= "VALUES ('$fullName', '$email', '$stdID', '$password', 'Student')";
            
                        $result = mysqli_query($connection, $query);
                        if(!$result){
                            header("Location: ErrorPage.php");
                            exit();
                        }else{
                            $sqlQuery = "SELECT * FROM user WHERE email='$email'";
                            $result1 = mysqli_query($connection, $sqlQuery);
        
                            if(mysqli_num_rows($result1) == 1){
                                $row = mysqli_fetch_assoc($result1);
                                $_SESSION['user_id'] = $row['ID'];
                                $_SESSION['user_name'] = $row['fullName'];
                                header("Location: UserHomePage.php");
                                exit;
                            }else{}
                        }
                    }else {
                        echo "<script>alert('Your Password Does Not Match Your Confirmation Password! Please Try Again.');</script>";
                    }
                }
            }
        }
    }
}

function SignUpAsAdmin() {
    if(isset($_POST['submit'])){
        global $connection;
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        // $ssn = $_POST['ssn'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];

        $sql = "SELECT * FROM officers WHERE email='$email'";
        $res = mysqli_query($connection, $sql);

        if(mysqli_num_rows($res) == 1){
            echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
        }else {
            $q = "SELECT * FROM user WHERE email='$email'";
            $r = mysqli_query($connection, $q);

            if(mysqli_num_rows($r) == 1){
                echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
            }else {
                $qu = "SELECT * FROM admins WHERE email='$email'";
                $re = mysqli_query($connection, $qu);

                if(mysqli_num_rows($re) == 1) {
                    echo "<script>alert('This EMAIL Has Been Registered! Please Try Again Using Another Email.');</script>";
                }else {
                    if($confirmedPassword === $password){
                        $fullName = mysqli_real_escape_string($connection, $fullName);
                        $email = mysqli_real_escape_string($connection, $email);
                        // $ssn = mysqli_real_escape_string($connection, $ssn);
                        $ssn = rand(100000, 999999);
                        $password = mysqli_real_escape_string($connection, $password);
            
                        $query = "INSERT INTO admins(fullName,email,ssn,password) ";
                        $query .= "VALUES ('$fullName', '$email', '$ssn', '$password')";
            
                        $result = mysqli_query($connection, $query);
                        if(!$result){
                            header("Location: ErrorPage.php");
                            exit();
                        }else{
                            $sqlQuery = "SELECT * FROM officers WHERE email='$email'";
                            $result1 = mysqli_query($connection, $sqlQuery);
        
                            if(mysqli_num_rows($result1) == 1){
                                // $row = mysqli_fetch_assoc($result1);
                                // // session_start();
                                // $_SESSION['user_id'] = $row['ID'];
                                // $_SESSION['user_name'] = $row['fullName'];
                                header("Location: OfficerHomePage.php");
                                exit;
                            }else{}
                        }
                    }else {
                        echo "<script>alert('Your Password Does Not Match Your Confirmation Password! Please Try Again.');</script>";
                    }
                }
            }
        }
    }
}

function LogIn() {
    if(isset($_POST['submit'])){
        global $connection;
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if (!$connection) {
            header("Location: ErrorPage.php");
            exit();
        }else {
            $query = "SELECT * FROM user WHERE email='$email'";
            $result = mysqli_query($connection, $query);
            
            if(!mysqli_num_rows($result) > 0) {
                $q = "SELECT * FROM officers WHERE email = '$email'";
                $r = mysqli_query($connection, $q);
                
                if(!mysqli_num_rows($r) > 0) {
                    $qu = "SELECT * FROM admins WHERE email = '$email'";
                    $re = mysqli_query($connection, $qu);
                    
                    if(!mysqli_num_rows($re) > 0) {
                        echo "<script>alert('This EMAIL Has Not Been Registered! Please Try Again Using Another Email.');</script>";
                    }else {
                        $row = mysqli_fetch_assoc($re);
                        
                        if($row['password'] == $password) {
                            $_SESSION['user_id'] = $row['ID'];
                            $_SESSION['user_name'] = $row['fullName'];
                            $_SESSION['user_email'] = $row['email'];
                            $_SESSION['user_pic'] = $row['pic'];
                            // Password is correct, log in user
                            header("Location: AdminHomePage.php");
                            exit();
                        }else{
                            echo "<script>alert('officer Invalid email or password!');</script>";
                        }
                    }
                }else {
                    $row = mysqli_fetch_assoc($r);
                    Print_r( $row );
                    if($row['password'] == $password) {
                        $_SESSION['user_id'] = $row['ID'];
                        $_SESSION['user_name'] = $row['fullName'];
                        $_SESSION['user_email'] = $row['email'];
                        $_SESSION['user_pic'] = $row['pic'];
                        // Password is correct, log in user
                        header("Location: OfficerHomePage.php");
                        exit();
                    }else{
                        echo "<script>alert('admin Invalid email or password!');</script>";
                    }
                }
            }else {
                $row = mysqli_fetch_assoc($result);

                if($row['password'] == $password) {
                    $_SESSION['user_id'] = $row['ID'];
                    $_SESSION['user_name'] = $row['fullName'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_pic'] = $row['pic'];
                    // Password is correct, log in user
                    // $_SESSION['user_id'] = $row['ID'];
                    // $_SESSION['user_name'] = $row['fullName'];
                    header("Location: UserHomePage.php");
                    exit();
                }else{
                    echo "<script>alert('user Invalid email or password!');</script>";
                }
            }
            
            // Check if the query returned a row
            // if(mysqli_num_rows($result) == 1){
            //     $row = mysqli_fetch_assoc($result);
                
            //     if($row['password'] == $password) {
            //         // Password is correct, log in user
            //         $_SESSION['user_id'] = $row['ID'];
            //         $_SESSION['user_name'] = $row['fullName'];
            //         header("Location: UserHomePage.php");
            //         exit();
            //     }else{
            //         echo "<script>alert('Invalid email or password!');</script>";
            //     }
            // }else {
            //     $sql = "SELECT * FROM officers WHERE email = '$email'";
            //     $result = $connection->query($sql);
                
            //     if ($result->num_rows > 0) {
            //         $row = mysqli_fetch_assoc($result);
            
            //         if($row['password'] == $password) {
            //             // Password is correct, log in user
            //             $_SESSION['user_id'] = $row['ID'];
            //             $_SESSION['user_name'] = $row['fullName'];
            //             header("Location: OfficerHomePage.php");
            //             exit();
            //         }else{
            //             echo "<script>alert('Invalid email or password!');</script>";
            //         }
            //     }
            // }
        }
    }
}

// function logOut() {
//     // session_destroy();
// }

function EditProfile() {
    if(isset($_POST['submit'])) {
        global $connection;
        $newFullName = $_POST['newFullName'];
        $newEmail = $_POST['newEmail'];
        $newPassword = $_POST['newPassword'];
        $confirmNewPassword = $_POST['confirmNewPassword'];
        
        if($confirmNewPassword === $newPassword){
            $id = $_SESSION['user_id'];
            $name = $_SESSION['user_name'];

            $sql = "SELECT * FROM user WHERE ID = '$id' and fullName = '$name'";
            $res = mysqli_query($connection, $sql);

            // $rrrr = mysqli_fetch_array($res);
            // print_r($rrrr);
            // echo "<script>console.log($rrrr);</script>";

            if(!mysqli_num_rows($res) > 0) {
                $qu = "SELECT * FROM admins WHERE ID = '$id' and fullName = '$name'";
                $re = mysqli_query($connection, $qu);

                if(!mysqli_num_rows($re) > 0) {
                    $t = "SELECT * FROM officers WHERE email = '$newEmail'";
                    $t1 = mysqli_query($connection, $t);

                    if(!mysqli_num_rows($t1) > 0) {
                        $q = "UPDATE officers SET ";
                        $q .= "fullName = '$newFullName', ";
                        $q .= "email = '$newEmail', ";
                        $q .= "password = '$newPassword' ";

                        $r = mysqli_query($connection, $q);
                        if(!$r) {
                            header("Location: ErrorPage.php");
                            exit();
                        }else {
                            $_SESSION['user_name'] = $newFullName;

                            $qr = "UPDATE reservations SET ";
                            $qr .= "fullName = '$newFullName', ";
                            $qr .= "email = '$newEmail' WHERE ";
                            $qr .= "fullName = '$name'";

                            $rr = mysqli_query($connection, $qr);
                            if(!$rr) {
                                header("Location: ErrorPage.php");
                                exit();
                            }else {
                                $qv = "UPDATE violationticket SET ";
                                $qv .= "officerName = '$newFullName' WHERE ";
                                $qv .= "fullName = '$name'";

                                $rv = mysqli_query($connection, $qv);
                                // if(!$rv) {
                            //     die("QUERY FAILED" . mysqli_error($connection));
                                // }else {
                                header("Location: OfficerHomePage.php");
                                exit();
                                // }
                            } 
                        }
                    }else {
                        echo "<script>alert('This EMAIL Has Been Registered as officer! Please Try Again Using Another Email.');</script>";
                    }
                } else {
                    $t = "SELECT * FROM admins WHERE email = '$newEmail'";
                    $t1 = mysqli_query($connection, $t);
                    
                    if(!mysqli_num_rows($t1) > 0) {
                        $q = "UPDATE admins SET ";
                        $q .= "fullName = '$newFullName', ";
                        $q .= "email = '$newEmail', ";
                        $q .= "password = '$newPassword' ";

                        $r = mysqli_query($connection, $q);
                        if(!$r) {
                            header("Location: ErrorPage.php");
                            exit();
                        }else {
                            $_SESSION['user_name'] = $newFullName;

                            $qr = "UPDATE reservations SET ";
                            $qr .= "fullName = '$newFullName', ";
                            $qr .= "email = '$newEmail' WHERE ";
                            $qr .= "fullName = '$name'";

                            $rr = mysqli_query($connection, $qr);
                            if(!$rr) {
                                header("Location: ErrorPage.php");
                                exit();
                            }else {
                                $qv = "UPDATE violationticket SET ";
                                $qv .= "officerName = '$newFullName' WHERE ";
                                $qv .= "fullName = '$name'";

                                $rv = mysqli_query($connection, $qv);
                                // if(!$rv) {
                                //     die("QUERY FAILED" . mysqli_error($connection));
                                // }else {
                                header("Location: AdminHomePage.php");
                                exit();
                                // }
                            } 
                        }
                    }else {
                        echo "<script>alert('This EMAIL Has Been Registered as admin! Please Try Again Using Another Email.');</script>";
                    }
                }
            }else {
                $t = "SELECT * FROM user WHERE email = '$newEmail'";
                $t1 = mysqli_query($connection, $t);

                if(!mysqli_num_rows($t1) > 0) {
                    $query = "UPDATE user SET ";
                    $query .= "fullName = '$newFullName', ";
                    $query .= "email = '$newEmail', ";
                    $query .= "password = '$newPassword' ";
                    
                    $result = mysqli_query($connection, $query);
                    if(!$result) {
                        header("Location: ErrorPage.php");
                        exit();
                    }else {
                        $_SESSION['user_name'] = $newFullName;
                        
                        $qr = "UPDATE reservations SET ";
                        $qr .= "fullName = '$newFullName', ";
                        $qr .= "email = '$newEmail' WHERE ";
                        $qr .= "fullName = '$name'";
                    
                        $rr = mysqli_query($connection, $qr);
                        if(!$rr) {
                            header("Location: ErrorPage.php");
                            exit();
                        }else {
                            $qv = "UPDATE violationticket SET ";
                            $qv .= "fullName = '$newFullName', ";
                            $qv .= "email = '$newEmail' WHERE ";
                            $qv .= "fullName = '$name'";

                            $rv = mysqli_query($connection, $qv);
                            // if(!$rv) {
                            //     die("QUERY FAILED" . mysqli_error($connection));
                            // }else {
                                header("Location: UserHomePage.php");
                                exit();
                            // }
                        } 
                    }
                }else {
                    echo "<script>alert('This EMAIL Has Been Registered as user! Please Try Again Using Another Email.');</script>";
                }
            }
            // $query = "UPDATE user SET ";
            // $query .= "fullName = '$newFullName', ";
            // $query .= "email = '$newEmail', ";
            // $query .= "password = '$newPassword' ";
            
            // $result = mysqli_query($connection, $query);
            // if(!$result) {
            //     // die("QUERY FAILED" . mysqli_error($connection));
                
            // }else {
            //     $qr = "UPDATE reservations SET ";
            //     $qr .= "fullName = '$newFullName', ";
            //     $qr .= "email = '$newEmail' ";

            //     $rr = mysqli_query($connection, $qr);
            //     if(!$rr) {
            //         die("QUERY FAILED" . mysqli_error($connection));
            //     }else {
            //         $qv = "UPDATE violationticket SET ";
            //         $qv .= "fullName = '$newFullName', ";
            //         $qv .= "email = '$newEmail' ";
            //         $rv = mysqli_query($connection, $qv);
            //         // if(!$rv) {
            //         //     die("QUERY FAILED" . mysqli_error($connection));
            //         // }else {
            //             header("Location: UserHomePage.php");
            //             exit();
            //         // }
            //     } 
            // }
        }else {
            echo "<script>alert('passwords do not match!!');</script>";
        }
        
        // $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        // $result = mysqli_query($connection, $query);
        
        // if(mysqli_num_rows($result) == 1){
        //     // $_SESSION['username'] = $username;
        //     while($row = mysqli_fetch_assoc($result)) {
        //         $type = $row["type"];
        //     }
        //     if($type.strcasecmp("officer")){
        //         header("Location: OfficerHomePage.php");
        //         exit();
        //     }elseif($type.strcasecmp("profissor") || $type.strcasecmp("student") || $type.strcasecmp("other")){
        //         header("Location: UserHomePage.php");
        //         exit();
        //     }
        // } else {
        //     echo "<script>alert('Invalid email or password!');</script>";
        // }
    }
}
?>