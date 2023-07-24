<?php 
    class ParkingSpace {
        private static int $SpaceID = 0;
        private boolean $availability;
        private double $price;

        public function __construct(int $SpaceID, boolean $availability, double $price) {
            $this->spaceID += 1;
            $this->availability = true;
            $this->price = 2.0;
        }

        public function getSpaceID() { return $this->spaceID; }
        public function getPrice() { return $this->price; }

        public function getAvailability() { return $this->availability; }
        public function changeAvailability() { $this->availability = !$availability; }

        public function __toString() { 
            echo "This Is Parking Space Number " . $this->getSpaceID() . ", It Has a Price Of " . $this->getPrice() 
            . " And It Is " . $this->getAvailability() == true ? "Available" : "Not Available"; 
        }
    }
?>