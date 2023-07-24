<?php 
    class Person {
        protected string $name;
        protected string $email;
        protected string $password;
        protected string $phoneNum;
        protected array $violationTickets;

        public function __construct(string $name = "", string $email = "", string $password = "", string $phoneNum = "") {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->phoneNum = $phoneNum;
            $this->violationTickets = array( new ViolationTicket());
        }

        public function getName() { return $this->name; }
        public function getEmail() { return $this->email; }
        public function getPassword() { return $this->password; }
        public function getPhoneNum() { return $this->phoneNum; }
        public function getViolationTickets() { return $this->violationTickets; }

        public function setName(string $name) { $this->name = $name; }
        public function setEmail(string $email) { $this->email = $email; }
        public function setPassword(string $password) { $this->password = $password; }
        public function setPhoneNum(string $phoneNum) { $this->phoneNum = $phoneNum; }

        public function addViolationTicket(ViolationTicket $violationTicket) {
            $this->violationTickets[count($violationTickets)] = $violationTicket;
        }

        public function removeViolationTicket(ViolationTicket $violationTicket) {
            $count = 0;
            foreach ($this->violationTickets as $ticket) {
                if ($ticket->getID() === $violationTicket.getID()) {
                    unset($violationTickets[$count]);
                }
                $count += 1;
            }
            $count = 0;
        }

        public function forgotPassword($newPassword) {
            $this->password = $newPassword;
        }

        public function getInfo() {
            return array (
                "name" => $this->name,
                "email" => $this->email,
                "phoneNum" => $this->phoneNum
            );
        }

        public function copyObject(Person $personToCopy) {
            if (!($personToCopy instanceof Person)) {
                echo "<script>window.alert('Something Went Wrong!!! Please Try Again');</script>";
            } else {
                $this->name = $personToCopy->getName();
                $this->email = $personToCopy->getEmail();
                $this->password = $personToCopy->getPassword();
                $this->phoneNum = $personToCopy->getPhoneNum();
                $this->violationTickets = $personToCopy->getViolationTickets();
            }
        }

        public function __toString() {
            echo "this is " . $this->name;
        }
    }

?>