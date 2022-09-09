<?php

session_start();

require("config.php");

require('classes/reservas.class.php');

$reservas = new Reservas($conn);



if(!empty($_POST['name'])) {
    $pessoa = $_POST['pessoa'];
    $email = $_POST['email'];
    $data_inicio = explode('/', $_POST['data_inicio']);
    $horario_inicio = $_POST['horario_inicio'];
    $horario_de_fim = $_POST['horario_de_fim'];

    $data_inicio = $data_inicio[2] . '-' . $data_inicio[1] . '-' . $data_inicio[0];

    if($reservas->verificarDisponibilidade($data_inicio, $horario_inicio, $horario_de_fim)) {
        
        $reservas->reservar($data_inicio, $horario_inicio, $horario_de_fim, $pessoa, $email);

    } else {
        echo "Este horário já está reservado neste período";
    }

    


}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous"/>

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

     <!-- My Css -->
     <link rel="stylesheet" href="./source/css/style.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <h1 id="main-title">Criar Contato</h1>

        <form id="creat-form" method="POST" action="">
            <input type="hidden" name="type" value="creat" >
            <div class="form-group">
                <label for="name">Nome do Reservante</label>
                <input type="text" class="form-control" placeholder="Digite o nome do reservante">
            </div>
            <div class="form-group">
                <label for="email">Digite seu email</label>
                <input type="email" class="form-control" placeholder="Digite o email do reservante">
            </div>
            <div class="form-group">
                <label for="date">Digite a data desejada</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="time_start">Horario de Inicio</label>
                <input type="time" class="form-control">
            </div>
            <div class="form-group">
                <label for="time_end">Horario de Fim</label>
                <input type="time" class="form-control">
            </div>
            <div>
                <input type="text" class="btn btn-primary" value="Reservar">
            </div>


        </form>
    </div>
    
</body>
</html>






