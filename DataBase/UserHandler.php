<?php
    class UserHandler extends PersonHandler {
        private string $type;
        private ConnectionHandler $connection;

        public function __construct(Person $person, string $type) {
            parent::__construct($person);
            $this->type = $type;
        }

        public function saveDataIntoDB() {
            $conn = $this->connection->getConnection();
            $query = "INSERT INTO user(fullname,email,password,type) ";
            $query .= "VALUES (:fullname, :email, :password, :type)";
            
            $stmt = $conn->prepare($query);
            mysqli_stmt_bind_param($stmt, 'ssss', $this->person->getName(), $this->person->getEmail(), $this->person->getPassword(), $this->person->getType());
            mysqli_stmt_execute($stmt);
            
        }

        public function logIn() {

        }

        public function logOut() {
            $this->connection->logOut();
        }
    }
?>