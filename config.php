<?php

    $db = "sistema_de_reservas";
    $host = "localhost";
    $user = "eduardo";
    $pass = "";

    try {
        $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass)
    } catch (PDOException $e) {
        echo "DEU RUIM", $e->getMessage();
        exit;
    }

?>