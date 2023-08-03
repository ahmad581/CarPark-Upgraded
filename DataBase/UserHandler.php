<?php
    class UserHandler extends PersonHandler {
        private string $type;
        private ConnectionHandler $connection;
        private $conn;

        public function __construct(Person $person, string $type) {
            parent::__construct($person);
            $this->type = $type;
        }

        public function getConnection() {
            $conn = $this->connection->getConnection();
        }

        public function saveDataIntoDB() {
            $query = "INSERT INTO user(fullname,email,password,type) ";
            $query .= "VALUES (:fullname, :email, :password, :type)";
            
            $stmt = $conn->prepare($query);
            mysqli_stmt_bind_param($stmt, 'ssss', $this->person->getName(), $this->person->getEmail(), $this->person->getPassword(), $this->person->getType());
            mysqli_stmt_execute($stmt);
        }

        public function logIn() {
            $emailQuery = "SELECT * FROM user WHERE email = ':email'";
            $stmt = $conn->prepare($emailQuery);
            mysqli_stmt_bind_param($stmt, 's', $this->person->getEmail());
            $emailQueryResult = mysqli_stmt_execute($stmt);

            if(mysqli_num_rows($emailQueryResult) == 0) {
                echo "<script>alert('Email Or Password Are Not Correct!<br> Please Try Again.');</script>";
            }else {
                $passwprdQuery = "SELECT * FROM user WHERE password = ':password'";
                $stmt = $conn->prepare($passwprdQuery);
                mysqli_stmt_bind_param($stmt, 's', $this->person->getPassword());
                $passwprdQueryResult = mysqli_stmt_execute($stmt);

                if(mysqli_num_rows($passwprdQueryResult) == 0) {
                    echo "<script>alert('Email Or Password Are Not Correct!<br> Please Try Again.');</script>";
                }else {
                    header("Location: UserHomePage.php");
                    exit();
                }
            }
        }

        public function logOut() {
            $this->connection->logOut();
        }
    }
?>