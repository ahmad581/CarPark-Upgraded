<?php 
    class ParkingSpace {
        private static int $spaceID = 0;
        private boolean $availability;
        private double $price;

        // public function __construct(int $spaceID, boolean $availability, double $price) {
            // $this->spaceID += 1;
            // $this->availability = true;
            // $this->price = 2.0;
        // }

        public function __construct() {
            $this->spaceID += 1;
            $this->availability = true;
            $this->price = 2.0;
        }

        public function getSpaceID() { return $this->spaceID; }
        public function getPrice() { return $this->price; }
        public function getAvailability() { return $this->availability; }
        public function changeAvailability() { $this->availability = !$availability; }

        public function setPrice(double $price) { $this->price = $price; }

        public function discount(double $amountOfDiscount) { $this->price -= $amountOfDiscount; }

        public function deleteDiscount() { $this->price = 2.0; }

        public function __toString() { 
            echo "This Is Parking Space Number " . $this->getSpaceID() . ", It Has a Price Of " . $this->getPrice() 
            . " And It Is " . $this->getAvailability() == true ? "Available" : "Not Available"; 
        }

        public function copyObject(ParkingSpace $parkingSpaceToCopy) {
            if(!($parkingSpaceToCopy instanceof ParkingSpace)) {
                echo "<script>window.alert('Something Went Wrong!!! Please Try Again');</script>";
            } else {
                $this->spaceID = $parkingSpaceToCopy->getSpaceID();
                $this->availability = $parkingSpaceToCopy->getAvailability();
                $this->price = $parkingSpaceToCopy->getPrice();
            }
        }
    }
?>