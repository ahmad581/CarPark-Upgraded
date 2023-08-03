<?php
    class SSNGenerator {
        private int $ssn;

        public function __construct() {
            $this->ssn = rand(100000, 999999);
        }

        public function getSSN() { return $this->ssn; }
    }
?>