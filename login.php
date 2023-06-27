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
    <title>Login</title>
</head>

<body>
    <div>
        <form action="" method="POST">
            <h2>Login</h2>
            <label for="user">Nome de Usuário:</label><br>
            <input type="text" name="username_login"><br>
            <label for="pass">Senha:</label><br>
            <input type="password" name="pass_login"><br>
            <button type="submit">Entrar</button>
        </form>
    </div>
    <?php
    if (isset($_POST['username_login']) && isset($_POST['pass_login'])) {

        $username_login = $_POST['username_login'];
        $pass_login = $_POST['pass_login'];

        if (empty($username_login)) {
            echo "Digite o Nome de Usuário";
        } elseif (empty($pass_login)) {
            echo "Digite a Senha";
        } else {
            $sql = "SELECT nome, senha FROM usuario WHERE nome = '$username_login' AND senha = '$pass_login'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if ($row['nome'] === $username_login && $row['senha'] == $pass_login) {
                    echo "Logado com sucesso!";
                }
            } else {
                echo "Usuário ou senha incorretos!";
            }
        }
    }
    ?>
</body>

</html>