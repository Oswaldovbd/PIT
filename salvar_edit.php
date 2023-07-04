<?php
session_start();
include_once('conexao.php');

if (isset($_POST['atualizar'])) {
    $end_id = $_POST['endereco_id'];
    $id = $_POST['usuario_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $complemento = $_POST['complemento'];

    $sqlInsert = "UPDATE usuario, endereco 
        SET nome='$nome',senha='$senha',email='$email', cpf='$cpf', telefone='$telefone',sexo='$sexo',data_nasc='$data_nasc',cidade='$cidade',estado='$estado',bairro='$bairro',rua='$rua',complemento='$complemento' 
        WHERE usuario_id='$id' AND endereco_id='$end_id'";
    $result = $conn->query($sqlInsert);
    print_r($result);
}
header('Location: home.php');

?>