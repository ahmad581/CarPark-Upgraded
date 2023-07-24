<?php 
    class Reservation {
        private ParkingLot $parkingLot;
        private ParkingSpace $parkingSpace;
        private string $carNum;
        private string $carType;
        private Time $startTime;
        private Time $endTime;
        private DateTime $date;

        public function __construct(ParkingLot $parkingLot = null, ParkingSpace $parkingSpace = null, string $carNum = "", string $carType = "", Time $startTime = null, Time $endTime = null, Date $date = null) {
            $this->parkingLot->copyObject($parkingLot);
            $this->parkingSpace->copyObject($parkingSpace);
            $this->carNum = $carNum;
            $this->carType = $carType;
            $this->startTime = $startTime;
            $this->endTime = $endTime;
            $this->date = new DateTime();
        }

         public function getParkingLot() { return $this->parkingLot; }
         public function getParkingSpace() { return $this->parkingSpace; }
         public function getCarNum() { return $this->carNum; }
         public function getCarType() { return $this->carType; }
         public function getStartTime() { return $this->startTime; }
         public function getEndTime() { return $this->endTime; }

         public function setParkingLot($parkingLot) { $this->parkingLo->copyObject($parkingLot); }
         public function setParkingSpace($parkingSpace) { $this->parkingSpace->copyObject($parkingSpace); }
         public function setCarNum($carNum) { $this->carNum = $carNum; }
         public function setCarType($carType) { $this->carType = $carType; }
         public function setStartTime($startTime) { $this->startTime = $startTime; }
         public function setEndTime($endTime) { $this->endTime = $endTime; }
    }
?>