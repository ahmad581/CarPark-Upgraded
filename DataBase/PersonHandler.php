<?php
    class PersonHandler {
        protected ConnectionHandler $connection;
        protected string $name;
        protected string $email;
        protected string $password;
        protected string $phoneNum;
        protected array $violationTickets;

        public function __construct(Person $person) {
            $this->name = $person->getName();
            $this->email = $person->getEmail();
            $this->password = $person->getPassword();
            $this->phoneNum = $person->getPhoneNum();
            $this->violationTickets = $person->getViolationTickets();
        }

        public function saveDataIntoDB() {

        }

        public function logIn() {

        }

        public function logOut() {
            $this->connection->logOut();
        }
    }
?>