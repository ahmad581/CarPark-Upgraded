<?php 
    class Officer extends Person {
        private double $salary;
        private double $reservationForOthersBalance;

        public function __construct(string $name, string $email, string $password, string $phoneNum, double $salary, double $reservationForOthersBalance) {
            parent::__construct($this->name, $this->email, $this->password, $this->phoneNum);
            $this->salary = $salary;
            $this->reservationForOthersBalance = $reservationForOthersBalance;
        }

        public function getSalary() { return $this->salary; }
        public function getReservationForOthersBalance() { return $this->reservationForOthersBalance; }

        public function setSalary(double $slary) { $this->salary = $salary; }
        public function setReservationForOthersBalance(double $reservationForOthersBalance) { $this->reservationForOthersBalance = $reservationForOthersBalance; }

        public function copyObject(Person $personToCopy) {
            if (!($personToCopy instanceof Officer)) {
                echo "<script>window.alert('Something Went Wrong!!! Please Try Again');</script>";
            } else {
                parent::copyObject($personToCopy);
                $this->salary = $personToCopy->getSalary();
                $this->reservationForOthersBalance = $personToCopy->getReservationForOthersBalance();
            }
        }

        public function __toString() { parent::__toString(); }
    }
?>