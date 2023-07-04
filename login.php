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
            <input type="text" name="username"><br>
            <label for="pass">Senha:</label><br>
            <input type="text" name="password"><br>
            <button type="submit">Entrar</button>
        </form>
    </div>
    <?php
    if (isset($_POST['username']) && isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username)) {
            echo "Digite o Nome de Usuário";
        } elseif (empty($password)) {
            echo "Digite a Senha";
        } else {
            $sql = "SELECT usuario_id, nome, senha FROM usuario WHERE nome = '$username' AND senha = '$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                if ($row['nome'] === $username && $row['senha'] == $password) {
                    $_SESSION['usuario_id'] = $row['usuario_id'];
                    header('Location: home.php');
                }
            } else {
                echo "Usuário ou senha incorretos!";
            }
        }
    }
    ?>
</body>

</html>