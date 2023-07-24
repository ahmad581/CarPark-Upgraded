<?php 
    class User extends Person {
        private string $type;

        public function __construct(string $name, string $email, string $password, string $phoneNum, string $type) {
            parent::__construct($this->name, $this->email, $this->password, $this->phoneNum);
            $this->type = $type;
        }

        public function getType() { return $this->type; }
        public function setType($type) { $this->type = $type; }

        public function copyObject(Person $personToCopy) {
            if (!($personToCopy instanceof User)) {
                echo "<script>window.alert('Something Went Wrong!!! Please Try Again');</script>";
            } else {
                parent::copyObject($personToCopy);
                $this->type = $personToCopy->getType();
            }
        }

        public function __toString() { parent::__toString(); }
    }
?>