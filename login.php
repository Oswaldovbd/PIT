<?php
include "conexao.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Alone</title>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="iconecasa.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body id="login">
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
            <il class="textonav"> <a href="cadastro.php">Cadastro</a> </il>
            <il class="textonav"> Login </il>
        </ul>
    </div>

    <div class="box3">
        <form action="" method="POST" class="formlogin">
            <h1 class="titulo2"> Login </h1>
            <div class="inputBox">
                <label for="user" class="labelInput">Nome de Usuário:</label><br>
                <input type="text" name="username" class="inputUser"><br>
            </div>
            <div class="inputBox">
                <label for="pass" class="labelInput">Senha:</label><br>
                <input type="text" name="password" class="inputUser"><br>
                <br>
                <?php
                if (isset($_POST['username']) && isset($_POST['password'])) {

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if (empty($username)) {
                        echo "<p class='labelInput'>" . "Digite o Nome de Usuário" . "<p>";
                    } elseif (empty($password)) {
                        echo "<p class='labelInput'>" . "Digite a Senha" . "<p>";
                    } else {
                        $sql = "SELECT usuario_id, nome, senha FROM usuario WHERE nome = '$username' AND senha = '$password'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) === 1) {
                            $row = mysqli_fetch_assoc($result);

                            if ($row['nome'] == 'adm' && $row['senha'] == 123) {
                                $_SESSION['usuario_id'] = $row['usuario_id'];
                                header('Location: adm.php');
                            } elseif ($row['nome'] === $username && $row['senha'] == $password) {
                                $_SESSION['usuario_id'] = $row['usuario_id'];
                                $_SESSION['nome_usuario'] = $_POST['username'];
                                header('Location: home.php');
                            }
                        } else {
                            echo "Usuário ou senha incorretos!";
                        }
                    }
                }
                ?>
            </div> <br> <br>
            <button type="submit" id="submit">ENTRAR</button>

        </form>
    </div>
    <div class="rodape">
        <img src="./img/logo.png" alt="" id="logo">
        <div class="footertxt">
            <ul class="listafooter">
                <il class="txtfooter"> Home </il>
                <il class="txtfooter"> Sobre nós </il>
                <il class="txtfooter"> Contato </il>
                <il class="txtfooter"><br><br><br> </il>
                <il class="txtfooter"> ©Todos Direitos Reservados HomeAlone </il>
            </ul>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <script src="script.js"> </script>
</body>

</html>