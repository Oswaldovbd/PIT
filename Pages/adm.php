<?php
session_start();
include '../Components/conexao.php';
include '../Components/verifica_conexao.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="nav">
        <div class="boxadm">
            <h1 class="titulo">Bem vindo a página de administrador!</h1> <br>
            <a href="../Components/logout.php" class="texto" id="none">Logout</a>
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
                   <input type='hidden' name='usuario_id' value='" . $id . "' class='texto'>
                   <input type='hidden' name='endereco_id' value='" . $end_id . "' class='texto'>
                   <button type='submit' name='deletar' id='deletar'>Deletar</button>
               </form>" . "<br>";
                }
            } else {
                echo "0 resultados";
            }

            ?>
            <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
            <script src="../script.js"> </script>
        </div>
</body>

</html>