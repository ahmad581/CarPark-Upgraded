<?php 
    class Officer extends Person {
        private double $salary;
        private double $reservationBalanceForOthers;

        public function __construct(string $name, string $email, string $password, string $phoneNum, double $salary, double $reservationForOthersBalance) {
            parent::__construct($this->name, $this->email, $this->password, $this->phoneNum);
            $this->salary = $salary;
            $this->reservationBalanceForOthers = $reservationBalanceForOthers;
        }

        public function getSalary() { return $this->salary; }
        public function getReservationBalanceForOthers() { return $this->reservationBalanceForOthers; }

        public function setSalary(double $slary) { $this->salary = $salary; }
        public function setReservationBalanceForOthers(double $reservationBalanceForOthers) { $this->reservationBalanceForOthers = $reservationBalanceForOthers; }

        public function copyObject(Person $personToCopy) {
            if (!($personToCopy instanceof Officer)) {
                echo "<script>window.alert('Something Went Wrong!!! Please Try Again');</script>";
            } else {
                parent::copyObject($personToCopy);
                $this->salary = $personToCopy->getSalary();
                $this->reservationBalanceForOthers = $personToCopy->getReservationBalanceForOthers();
            }
        }

        public function __toString() { parent::__toString(); }
    }
?>