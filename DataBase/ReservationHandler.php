<?php
    class ReservationHandler {
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

        public function reserveForMe() {
            // $reservationForMeQuery = "INSERT INTO "
        }
    }
?>