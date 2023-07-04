<?php
include "conexao.php";
session_start();
ini_set('default_charset', 'utf-8');
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];

    $sql = "INSERT INTO usuario(nome,senha,email,telefone,sexo,cpf,data_nasc) VALUES('$nome','$senha','$email','$telefone','$sexo','$cpf','$data_nasc')";
    mysqli_query($conn, $sql);

    $sql = "INSERT INTO endereco(cidade,rua,estado,bairro,complemento) VALUES ('$cidade', '$rua','$estado','$bairro', '$complemento')";
    mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>

</head>

<body>

    <div class="box">
        <form action="home.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Usuários</b></legend>
                <br>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome completo:</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required autocomplete="off">

                </div>
                <br>
                <div class="inputBox">
                    <label for="senha" class="labelInput">Senha:</label>
                    <input type="text" name="senha" id="senha" class="inputUser" required autocomplete="off">

                </div>
                <br><br>
                <div class="inputBox">
                    <label for="email" class="labelInput">Email:</label>
                    <input type="text" name="email" id="email" class="inputUser" required autocomplete="off">

                </div>
                <br><br>
                <div class="inputBox">
                    <label for="cpf" class="labelInput">CPF:</label>
                    <input type="text" maxlength="14" name="cpf" id="cpf" class="inputUser" required autocomplete="off"
                        oninput=mascara_cpf()>

                </div>
                <br><br>
                <div class="inputBox">
                    <label for="telefone" class="labelInput">Telefone</label>
                    <input type="tel" maxlength="15" name="telefone" id="telefone" class="inputUser" required
                        autocomplete="off" oninput=mascara_telefone()>

                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required autocomplete="off">
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required autocomplete="off">
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required autocomplete="off">
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required autocomplete="off">
                <br><br><br>
                <div class="inputBox">
                    <label for="cidade" class="labelInput">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="inputUser" required autocomplete="off">
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="estado" class="labelInput">Estado:</label>
                    <input type="text" name="estado" id="estado" class="inputUser" required autocomplete="off">
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="estado" class="labelInput">Rua:</label>
                    <input type="text" name="rua" id="rua" class="inputUser" required autocomplete="off">
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="bairro" class="labelInput">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" class="inputUser" required autocomplete="off">
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="complemento" class="labelInput">Complemento:</label>
                    <input type="text" name="complemento" id="complemento" class="inputUser" required
                        autocomplete="off">
                </div>
                <br><br>
                <button type="submit" name="submit" id="submit">Enviar</button>
            </fieldset>
        </form>
    </div>
    <script src="script.js"> </script>
</body>

</html>