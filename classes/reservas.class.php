<?php

    class Reservas {

        private $conn;

        public function __construct($conn) {
        $this->conn = $conn;

    }
        
        public function getReservas() {
            $array = array();

            $stmt = "SELECT * FROM reservas";
            $stmt = $this->conn->query($stmt);

            if($stmt->rowCount() > 0) {
                $array = $stmt->fetchAll();
            }

            return $array;
        }
    }

?>