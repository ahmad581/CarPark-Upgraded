<?php 
    class Admin extends Person {
        private double $salary;
        // private Report $report;

        public function __construct(string $name, string $email, string $password, string $phoneNum, double $salay) {
            parent::__construct($this->name, $this->email, $this->password, $this->phoneNum);
            $this->salary = $salary;
            $this->report = new Report();
        }
        
        public function getSalary() { return $this->salary; }
        public function setSalary($salary) { $this->salary = $salary; }

        public function copyObject(Person $personToCopy) {
            if (!($personToCopy instanceof Admin)) {
                echo "<script>window.alert('Something Went Wrong!!! Please Try Again');</script>";
            } else {
                parent::copyObject($personToCopy);
                $this->salary = $personToCopy->getSalary();
            }
        }

        ////////////////handle the Report part here////////////////

        public function __toString() { parent::__toString(); }

    }
?>