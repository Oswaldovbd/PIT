<?php
session_start();
include '../Components/conexao.php';
include '../Components/verifica_conexao.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    echo "Bem vindo! " . $_SESSION['nome_usuario'];
    ?>
    <br>
    <a href="editar.php">Editar Perfil</a>
    <br>
    <a href="../Components/logout.php">Logout</a>
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <script src="../Components/script.js"> </script>
</body>

</html>