<?php
session_start();
include_once 'conexao.php';
include 'verifica_conexao.php';

if (isset($_POST['deletar'])) {
    $end_id = $_POST['endereco_id'];
    $id = $_POST['usuario_id'];

    $sqlDelete = "DELETE FROM usuario WHERE usuario_id=?";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param('i', $id);
    $stmtDelete->execute();

    $sqlDelete2 = "DELETE FROM endereco WHERE endereco_id=?";
    $stmtDelete2 = $conn->prepare($sqlDelete2);
    $stmtDelete2->bind_param('i', $end_id);
    $stmtDelete2->execute();


    if ($stmtDelete->affected_rows > 0 || $stmtDelete2->affected_rows > 0) {

        $stmtDelete->close();
        $stmtDelete2->close();
        $conn->close();

        header('Location: ./html/landingpage.html');
        exit();
    } else {
        echo "Erro ao excluir o usuário.";
    }
} else {
    echo "Nenhuma solicitação de exclusão recebida.";
}
?>