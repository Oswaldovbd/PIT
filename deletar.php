<?php
include_once('conexao.php');

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

    // Verifica se algum registro foi afetado pela exclusão
    if ($stmtDelete->affected_rows > 0 || $stmtDelete2->affected_rows > 0) {
        // Exclusão bem-sucedida
        // Faça qualquer outra ação necessária aqui

        $stmtDelete->close();
        $stmtDelete2->close();
        $conn->close();

        header('Location: ./html/landingpage.html');
        exit();
    } else {
        // Nenhum registro foi afetado pela exclusão
        // Faça qualquer tratamento de erro necessário aqui
        echo "Erro ao excluir o usuário.";
    }
} else {
    // O botão "Deletar" não foi acionado
    // Faça qualquer tratamento necessário aqui
    echo "Nenhuma solicitação de exclusão recebida.";
}
?>