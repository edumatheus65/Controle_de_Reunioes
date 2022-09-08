<?php




session_start();





if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {

    
    
    
} else {
    header("Location: login.php");
}
?>

<?php




require 'config.php';
require 'classes/reservas.class.php';


if(isset($_SESSION['msg'])) {
    $printMSG = $_SESSION['msg'];
    $_SESSION['msg'] = '';
  }




//Injeção de dependecia
$reservas = new Reservas($conn);
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

    <title>Controle de reuniões</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="./index.php">
                <img src="./source/img/logo.svg" alt="Agenda">
            </a>
            <div>       
                <div class="navbar-nav">
                    <a class="nav-link active" id="home-link" href='index.php'>Agenda </a>
                    <a class="nav-link active" id="home-link" href="reservar.php"> Adicionar Reserva</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <?php if(isset($printMSG) && $printMSG != ''): ?>
            <p id="msg"><?= $printMSG ?></p>        
        <?php endif; ?>

        <h1 id="main-title">RESERVAS</h1>

        <?php $lista = $reservas->getReservas(); ?>

        <table class="table" id="contacts-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data</th>
                    <th scope="col">Horaio de Inicio</th>
                    <th scope="col">Horaio de Fim</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $item):
                    $data1 = date('d/m/Y', strtotime($item['data_inicio'])); ?>
                    <tr>
                    <td scope="row" class="col-id"><?= $item["id"] ?></td>
                        <td scope="row"><?= $item['pessoa'] ?></td>
                        <td scope="row"><?= $data1 ?></td>
                        <td scope="row"><?= $item['horario_inicio'] ?></td>
                        <td scope="row"><?= $item['horario_de_fim'] ?></td>
                    </tr>
                <?php endforeach ?> 
            </tbody>
        </table>
       


    </div>

    
    
</body>
</html>



