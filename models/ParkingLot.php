<?php 
    class ParkingLot {
        private int $ID;
        private string $parkingLotName;
        private int $numOfParkingSpaces;
        private array $parkingSpaces;

        public function __construct(int $ID, string $parkingLotName, int $numOfParkingSp) {
            $this->ID = $ID;
            $this->parkingLotName = $parkingLotName;
            $this->numOfParkingSpaces = $numOfParkingSp;
            $this->pakingSpaces = array(new ParkingSpace());
        }

        public function getParkingLotID() { return $this->ID; }
        public function getParkingLotName() { return $this->parkingLotName; }
        public function getNumOfParkingSpaces() { return $this->numOfParkingSpaces; }
        public function getParkingSpaces() { return $this->parkingSpaces; }

        public function setParkingLotID($ID) { $this->ID = $ID; }
        public function setParkingLotName($parkingLotName) { $this->parkingLotName = $parkingLotName; }
        public function setNumOfParkingSpaces($numOfParkingSpaces) { $this->numOfParkingSpaces = $numOfParkingSpaces; }

        public function __toString() {
            echo "This Is Parking Lot Number " . $this->getParkingLotID() 
            . "And It Has " . $this->getNumOfParkingSpaces() . "Parking Spaces"; 
        }

    }
?>