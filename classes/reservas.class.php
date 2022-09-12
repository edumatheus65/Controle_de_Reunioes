<?php

    // include('./config.php');

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

        // Esse método retorna um boolean, true(se estiver disponivel) or false(se não estiver)
        public function verificarDisponibilidade($data_inicio, $horario_inicio, $horario_de_fim) {

            $stmt = "SELECT * FROM reservas WHERE data_inicio  :data_inicio AND ( NOT ( horario_inicio > :horario_de_fim OR horario_de_fim < :horario_inicio))";

            $stmt = $this->conn->prepare($stmt);
            $stmt->bindValue(":data_inicio", $data_inicio);
            $stmt->bindValue(":horario_inicio", $horario_inicio);
            $stmt->bindValue(":horario_de_fim", $horario_de_fim);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                return false;

            } else {
                return true;
            }


        }

        public function reservar($pessoa, $data_inicio, $horario_inicio, $horario_de_fim) {

            $stmt = "INSERT INTO reservas SET (id, pessoa, data_inicio, horario_inicio, horario_de_fim) VALUES (:pessoa, :data_inicio, :horario_inicio, :horario_de_fim)";
            $stmt = $this->conn->prepare($stmt);
            $stmt->bindValue(":pessoa", $pessoa);
            $stmt->bindValue(":data_inicio", $data_inicio);
            $stmt->bindValue(":horario_inicio", $horario_inicio);
            $stmt->bindValue(":horario_de_fim", $horario_de_fim);
            $stmt->execute();


        }
    }

?>