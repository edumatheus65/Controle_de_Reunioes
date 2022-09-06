<?php




session_start();



if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

    
    header("Location: index.php");
    
} else {
    header("Location: login.php");
}
?>

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
        $data1 = date('d/m/y', strtotime($item['data_inicio']));
        echo $item['pessoa'] . ' reservou a sala de reunião na data ' . $item['data_inicio'] . ' no hoario das ' . $item['horario_inicio'] . ' ás ' . $item['horario_de_fim'];
    }