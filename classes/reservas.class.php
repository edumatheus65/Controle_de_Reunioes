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
        
        public function verificarDisponibilidade($data_inicio, $horario_inicio, $horario_de_fim)
    }

?>