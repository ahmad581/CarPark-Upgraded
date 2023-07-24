<?php include "db.php"; ?>
<?php 
    global $connection;
    
    $query = "SELECT * FROM reservations";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            $now = time();
            $endTime = $row['endTime'];
            $parkingSpace = $row['parkingSpace'];
            $stampEndTime = strtotime($endTime);

            if($stampEndTime < $now) {
                $q = "UPDATE parkingSpace SET isFree = 1 WHERE parkingSpaceName = '$parkingSpace'";
                $r = mysqli_query($connection, $q);
            }
        }
    }

    $query = "SELECT * FROM officersreservations";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            $now = time();
            $endTime = $row['endTime'];
            $parkingSpace = $row['parkingSpace'];
            $stampEndTime = strtotime($endTime);
            
            if($stampEndTime < $now) {
                $q = "UPDATE parkingSpace SET isFree = 1 WHERE parkingSpaceName = '$parkingSpace'";
                $r = mysqli_query($connection, $q);
            }
        }
    }






    // class CustomTimer extends Thread {
    //     public function __construct($startTimer, $endTimer) {
    //         $this->startTimer = $startTimer;
    //         $this->endTimer = $endTimer;
    //         $Now = new DateTime();
    //     }

    //     public function run() {
    //         while (!($Now->format('H:i:s') == $this->endTimer->format('H:i:s'))) {
    //             sleep(1);
    //         }

    //         freeParkingSpace();
    //     }
    // }

    // class CustomDateTimer extends Thread {
    //     public function __construct($startTimer, $endTimer, $discountAmount) {
    //         $this->startTimer = $startTimer;
    //         $this->endTimer = $endTimer;
    //         $this->discountAmount = $discountAmount;
    //         $Now = new DateTime();
    //     }

    //     public function calculateNewPrice() {
    //         global $parkingPrice;
    //         $newPrice = $parkingPrice - $this->discountAmount;

    //         return $newPrice;
    //     }
    //     public function run() {
    //         $newPrice = $this->calculateNewPrice();
    //         $parkingPrice = $newPrice;
    //         while (!($Now->format('H:i:s') == $this->endTimer->format('H:i:s'))) {
    //             sleep(1);
    //         }

    //         $parkingPrice = 3.33333333;
    //     }
    // }
?>
