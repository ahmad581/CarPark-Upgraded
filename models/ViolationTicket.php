<?php 
    class ViolationTicket {
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

        public function getDate() { return $this->date; }
        public function getTime() { return $this->time; }
        public function getID() { return $this->ID; }
        public function getParkingLot() { return $this->parkingLot; }
        public function getParkingSpace() { return $this->parkingSpace; }
        public function getCarNum() { return $this->carNum; }
        public function getCarType() { return $this->carType; }
        public function getCause() { return $this->cause; }
        public function getTicketAmount() { return $this->ticketAmount; }

        public function setDate(Date $date) { $this->date = $date; }
        public function setTime(Date $time) { $this->time = $time; }
        public function setParkingLot(ParkingLot $parkingLot) { $this->parkingLot = $parkingLot; }
        public function setParkingSpace(ParkingSpace $parkingSpace) { $this->parkingSpace = $parkingSpace; }
        public function setCarNum(string $carNum) { $this->carNum = $carNum; }
        public function setCarType(string $carType) { $this->carType = $carType; }
        public function setCause(string $cause) { $this->cause = $cause; }
        public function setTicketAmount(double $ticketAmount) { $this->ticketAmount = $ticketAmount; }

        public function getPersonInfo() { $this->person_>getInfo(); }

        public function getTicketInfo() {
            return array (
                "name" => $person->getName(),
                "email" => $person->getEmail(),
                "ID" => $thisgetID(),
                "date" => $this->date,
                "time" => $this->time,
                "parkingLot" => $this->parkingLot,
                "parkingSpace" => $this->parkingSpace,
                "carNum" => $this->carNum,
                "carType" => $this->carType,
                "cause" => $this->cause,
                "ticketAmount" => $this->ticketAmount
            );
        }

        public function addTicket() { $this->persin->addViolationTicket($this); }

        public function removeTicket() { $this->persin->removeViolationTTicket($this); }
    }
?>