<?php 
    class ViolationTicket {
        private Person $person;
        private Date $date;
        private Time $time;
        private static int $ID = 0;
        private ParkingLot $parkingLot;
        private ParkingSpace $parkingSpace;

        public function __construct(Person $person = null, Date $date = null, Time $time = null, ParkingLot $parkingLot = null, ParkingSpace $parkingSpace = null) {
            $this->person->copyObject($person);
            $this->date = $date;
            $this->time = $time;
            $this->ID += 1;
            $this->parkingLot = $parkingLot;
            $this->parkingSpace = $parkingSpace;
        }

        public function getDate() { return $this->date; }
        public function getTime() { return $this->time; }
        public function getID() { return $this->ID; }
        public function getParkingLot() { return $this->parkingLot; }
        public function getParkingSpace() { return $this->parkingSpace; }

        public function setDate(Date $date) { $this->date = $date; }
        public function setTime(Date $time) { $this->time = $time; }
        public function setParkingLot(ParkingLot $parkingLot) { $this->parkingLot = $parkingLot; }
        public function setParkingSpace(ParkingSpace $parkingSpace) { $this->parkingSpace = $parkingSpace; }


        public function getPersonInfo() { $this->person_>getInfo(); }

        public function generateTicket() {
            return array (
                "name" => $person->getName(),
                "email" => $person->getEmail(),
                "ID" => $thisgetID(),
                "date" => $this->date,
                "time" => $this->time,
                "parkingLot" => $this->parkingLot,
                "parkingSpace" => $this->parkingSpace
            );
        }

        public function addTicket() { $this->persin->addViolationTicket($this); }

        public function removeTicket() { $this->persin->removeViolationTTicket($this); }
    }
?>