<?php 
    class ConnectionHandler {
        private $connection;

        public function __construct() {
            checkSession();
            $connection = mysqli_connect('localhost', 'root', '', 'carpark');
            if(!$connection){
                header("Location: ErrorPage.php");
                exit();
            }
        }

        public function getConnectionVar() { return $this->connection; }

        public function checkSession() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }

        public function logOut() {
            session_unset();
            session_destroy();
            header("Location: logIn.php");
            exit();
        }
    }
?>