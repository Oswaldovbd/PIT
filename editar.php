<?php
session_start();
include 'conexao.php';
include 'verifica_conexao.php';

$query = "SELECT * FROM usuario, endereco WHERE usuario_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $_SESSION['usuario_id']);
$stmt->execute();

$result = $stmt->get_result();

if (!$result) {
    header('Location: login.php');
}

if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
        $end_id = $user_data['endereco_id'];
        $id = $user_data['usuario_id'];
        $nome = $user_data['nome'];
        $senha = $user_data['senha'];
        $email = $user_data['email'];
        $cpf = $user_data['cpf'];
        $telefone = $user_data['telefone'];
        $sexo = $user_data['sexo'];
        $data_nasc = $user_data['data_nasc'];
        $cidade = $user_data['cidade'];
        $estado = $user_data['estado'];
        $bairro = $user_data['bairro'];
        $rua = $user_data['rua'];
        $complemento = $user_data['complemento'];

    }
} else {
    header('Location: home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="iconecasa.png">
    <title>Home Alone</title>
</head>

<body>
    <div class="box2">
        <form action="salvar_edit.php" method="POST" class="form">
            <h1 class="titulo2">Editar Perfil:</h1>
            <br>
            <div class="inputBox">
                <label for="nome" class="labelInput">Nome completo:</label> <br>
                <input type="text" name="nome" id="nome" class="inputUser" required autocomplete="off"
                    value="<?php echo $nome; ?>">

            </div>
            <br>
            <div class="inputBox">
                <label for="senha" class="labelInput">Senha:</label> <br>
                <input type="text" name="senha" id="senha" class="inputUser" required autocomplete="off"
                    value="<?php echo $senha; ?>">

            </div>
            <br>
            <div class="inputBox">
                <label for="email" class="labelInput">Email:</label> <br>
                <input type="text" name="email" id="email" class="inputUser" required autocomplete="off"
                    value="<?php echo $email; ?>">

            </div>
            <br>
            <div class="inputBox">
                <label for="cpf" class="labelInput">CPF:</label> <br>
                <input type="text" maxlength="14" name="cpf" id="cpf" class="inputUser" required autocomplete="off"
                    value="<?php echo $cpf; ?>" oninput=mascara_cpf()>

            </div>
            <br>
            <div class="inputBox">
                <label for="telefone" class="labelInput">Telefone</label> <br>
                <input type="tel" maxlength="15" name="telefone" id="telefone" class="inputUser" required
                    value="<?php echo $telefone; ?>" autocomplete="off" oninput=mascara_telefone()>

            </div>
            <div class="inputBox">
                <p class="labelInput">Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo $sexo == 'feminino' ? 'checked' : '' ?> required autocomplete="off">
                <label for="feminino" class="labelInput">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo $sexo == 'masculino' ? 'checked' : '' ?> required autocomplete="off">
                <label for="masculino" class="labelInput">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" <?php echo $sexo == 'outro' ? 'checked' : '' ?>
                    required autocomplete="off">
                <label for="outro" class="labelInput">Outro</label>
                <br><br>
            </div>

            <div class="datanasc"> <label for="data_nascimento"><b class="labelInput">Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nasc; ?>"
                    required autocomplete="off">
                <br><br>
            </div>

            <div class="inputBox">
                <label for="cidade" class="labelInput">Cidade:</label> <br>
                <input type="text" name="cidade" id="cidade" class="inputUser" required autocomplete="off"
                    value="<?php echo $cidade; ?>">
            </div>
            <br>
            <div class="inputBox">
                <label for="estado" class="labelInput">Estado:</label> <br>
                <input type="text" name="estado" id="estado" class="inputUser" required autocomplete="off"
                    value="<?php echo $estado; ?>">
            </div>
            <br>
            <div class="inputBox">
                <label for="estado" class="labelInput">Rua:</label> <br>
                <input type="text" name="rua" id="rua" class="inputUser" required autocomplete="off"
                    value="<?php echo $rua; ?>">
            </div>
            <br>
            <div class="inputBox">
                <label for="bairro" class="labelInput">Bairro:</label> <br>
                <input type="text" name="bairro" id="bairro" class="inputUser" required autocomplete="off"
                    value="<?php echo $bairro; ?>">
            </div>
            <br>
            <div class="inputBox">
                <label for="complemento" class="labelInput">Complemento:</label> <br>
                <input type="text" name="complemento" id="complemento" class="inputUser" required
                    value="<?php echo $complemento; ?>" autocomplete="off">
            </div>
            <br><br>
            <input type="hidden" name="usuario_id" value="<?php echo $id ?>">
            <input type="hidden" name="endereco_id" value="<?php echo $end_id ?>">
            <button type="submit" name="atualizar" id="atualizar">Atualizar</button>
        </form>
        <form action="deletar.php" method="POST" class="form">
            <input type="hidden" name="usuario_id" value="<?php echo $id ?>">
            <input type="hidden" name="endereco_id" value="<?php echo $end_id ?>">
            <button type="submit" name="deletar" id="deletar">Deletar</button>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <script src="script.js"> </script>
</body>

</html>