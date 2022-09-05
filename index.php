<?php



require 'config.php';
require 'classes/reservas.class.php';

//Injeção de dependecia
$reservas = new Reservas($conn);

?>

<h1>RESERVAS</h1>
<?php
    
    $lista = $reservas->getReservas();

    foreach($lista as $item) {
        echo $item['pessoa'] . ' reservou a sala de reunião na data ' . $item['data_inicio'] . ' no hoario das ' . $item['horario_inicio'] . ' ás ' . $item['horario_de_fim'];
    }