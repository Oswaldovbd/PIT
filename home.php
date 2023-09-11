<?php
session_start();
include 'conexao.php';
include 'verifica_conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="iconecasa.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <div class="nav">
        <a href="./html/landingpage.html"> <img src="./img/logo.png" alt="" id="logo"> </a>
        <ul id="lista1">
            <il class="textonav"> Sobre </il>
            <il class="textonav"> All Alone </il>
            <il class="textonav"> Visitante </il>
            <il>
                <div>
                    <input type="checkbox" class="checkbox" id="chk" />
                    <label class="label" for="chk">
                        <i class="fas fa-moon"></i>
                        <i class="fas fa-sun"></i>
                        <div class="ball"> </div>
                    </label>
                </div>
            </il>
            <il><img src="./img/loginicon.png" alt="" width="60px">
            </il>
        </ul>
    </div>
    <?php
    echo "Bem vindo! " . $_SESSION['nome_usuario'];
    ?>
    <br>
    <a href="editar.php">Editar Perfil</a>
    <br>
    <a href="logout.php">Logout</a>
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <script src="script.js"> </script>
</body>

</html>