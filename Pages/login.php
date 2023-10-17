<?php
include "../Components/conexao.php";
include 'header.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<body id="login">
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
    <?php
    include 'footer.php';
    ?>
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <script src="../Components/script.js"> </script>
</body>

</html>