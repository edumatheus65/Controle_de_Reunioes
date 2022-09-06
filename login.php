<?php

session_start();




if(isset($_POST['email']) && empty($_POST['email']) ) {
    $email = $_POST['email'];
    $senha = $_POST['password'];

    
    
    
    
    $stmt = $conn->query("SELECT * FROM reservas WHERE email = '$email' AND senha = '$senha'");

    if($stmt->rowCount() > 0) {
        
        $dado = $stmt->fetch();

        $_SESSION['id'] = $dado['id'];

        header("Location: index.php");

        

    } 



}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My Css -->
    <link rel="stylesheet" href="./source/css/style.css">


    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous" defer></script>

    <title>Tela de Login</title>
</head>
<body class="bg">

<div class="container col-11 col-md-9" id="form-container">
    <div class="row align-items-center gx-5">
        <div class="col-md-6 order-md-2">
            <h2 class="title">CONTROLE DE REUNIÕES</h2>
            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email"
                    placeholder="Digite seu email">
                    <label for="email" class="form-label">Digite o e-mail</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password"
                    placeholder="Digite sua senha">
                    <label for="password" class="form-label">Digite sua senha</label>
                </div>
                <input type="submit" class="btn btn-primary" value="Entrar">
            </form>
        </div>
        <div class="col-md-6 order-md-01">
            <div class="col-12">
                <img src="source/img/meeting.png" alt="Entrar no sistema" class="img-fluid">
            </div>
            <div class="col-12" id="link-container">
                <!-- <a href="register.php">Ainda não tenho cadastro</a> -->
                <p class="mt-05">&copy; 2022-2022</p>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>