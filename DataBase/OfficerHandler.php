<?php
    class OfficerHandler extends PersonHandler {
        private double $salary;
        private double $reservationBalanceForOthers;

        public function __construct(Person $person, double $salary, double $reservationBalanceForOthers) {
            parent::__construct($person);
            $this->salary = $salary;
            $this->reservationBalanceForOthers = $reservationBalanceForOthers;
        }

        public function getConnection() {
            $conn = $this->connection->getConnection();
        }

        public function saveDataIntoDB() {
            $query = "INSERT INTO officers(fullname,email,password,ssn,amountForDriverPayment,salary) ";
            $query .= "VALUES (:fullname, :email, :password, :ssn, :amountForDriverPayment, :salary)";

            $ssn = new SSNGenerator();
            
            $stmt = $conn->prepare($query);
            mysqli_stmt_bind_param($stmt, 'sssi', $this->person->getName(), $this->person->getEmail(), $this->person->getPassword(), $this->ssn->getSSN(), 250, 250);
            mysqli_stmt_execute($stmt);
        }

        public function logIn() {
            $emailQuery = "SELECT * FROM offcers WHERE email = ':email'";
            $stmt = $conn->prepare($emailQuery);
            mysqli_stmt_bind_param($stmt, 's', $this->person->getEmail());
            $emailQueryResult = mysqli_stmt_execute($stmt);

            if(mysqli_num_rows($emailQueryResult) == 0) {
                echo "<script>alert('Email Or Password Are Not Correct!<br> Please Try Again.');</script>";
            }else {
                $passwprdQuery = "SELECT * FROM officers WHERE password = ':password'";
                $stmt = $conn->prepare($passwprdQuery);
                mysqli_stmt_bind_param($stmt, 's', $this->person->getPassword());
                $passwprdQueryResult = mysqli_stmt_execute($stmt);

                if(mysqli_num_rows($passwprdQueryResult) == 0) {
                    echo "<script>alert('Email Or Password Are Not Correct!<br> Please Try Again.');</script>";
                }else {
                    header("Location: AdminHomePage.php");
                    exit();
                }
            }
        }

        public function logOut() {
            $this->connection->logOut();
        }
    }
?>