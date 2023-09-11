<?php
session_start();
include 'conexao.php';
include 'verifica_conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Alone Admin Page</title>
</head>

<body>
    <h1>Bem vindo a página de administrador!</h1> <br>
    <a href="logout.php">Logout</a>
    <br>
    <?php
    $sql = "SELECT DISTINCT usuario_id, endereco_id,  nome FROM usuario, endereco";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $end_id = $row['endereco_id'];
            $id = $row['usuario_id'];
            echo "id: " . $id . " - Nome: " . $row["nome"] .
                "<form action='deletar.php' method='POST' class='form'>
                   <input type='hidden' name='usuario_id' value='" . $id . "'>
                   <input type='hidden' name='endereco_id' value='" . $end_id . "'>
                   <button type='submit' name='deletar' id='deletar'>Deletar</button>
               </form>" . "<br>";
        }
    } else {
        echo "0 resultados";
    }

    ?>
</body>

</html>