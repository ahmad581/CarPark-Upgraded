<?php
    class ViolationTicketHandler {
        private Person $person;
        private Date $date;
        private Time $time;
        private static int $ID = 0;
        private ParkingLot $parkingLot;
        private ParkingSpace $parkingSpace;
        private string $carNum;
        private string $carType;
        private string $cause;
        private double $ticketAmount;
        private ConnectionHandler $connection;

        public function __construct(Person $person = null, Date $date = null, Time $time = null, ParkingLot $parkingLot = null, ParkingSpace $parkingSpace = null, string $carNum = "", string $carType = "", string $cause = "", double $ticketAmount) {
            $this->person->copyObject($person);
            $this->date = $date;
            $this->time = $time;
            $this->ID += 1;
            $this->parkingLot = $parkingLot;
            $this->parkingSpace = $parkingSpace;
            $this->carNum = $carNum;
            $this->carType = $carType;
            $this->cause = $cause;
            $this->ticketAmount = $ticketAmount;
        }

        public function getConnection() {
            $conn = $this->connection->getConnection();
        }

        public function saveDataIntoDB() {
            $personInfo = $this->person->getPersonInfo();

            $violationTicketInsertionQuery = "INSERT INTO violationticket(fullName,email,parkingLot,parkingSpace,carNumber,carType,date,cause,ticketAmount,officerName,ID)";
            $violationTicketInsertionQuery .= " VALUES(:fullName, :email, :parkingLot, :parkingSpace, :carNumber, :carType, :date, :cause, :ticketAmount, :officerName, :id)";

            $stmt = $conn->prepare($violationTicketInsertionQuery);
            mysqli_stmt_bind_param($conn, "ssssssssdsi", $personInfo['name'], $personInfo['email'], $this->parkingLot->getParkingLotName(), $this->parkingSpace->getParkingSpaceName(), $this->carNum, $this->carType, $this->cause, $this->ticketAmount, SESSION['user_name'], $this->ID);
            mysqli_stmt_execute($stmt);
        }

        public function deleteViolationTicketFromDB(int $ID) {
            $violationTicketDeletionQuery = "DELETE FROM violationticket WHERE ID = '$ID'";
            
            $stmt = $conn->prepare($violationTicketDeletionQuery);
            mysqli_stmt_execute($stmt);
        }
    }
?>