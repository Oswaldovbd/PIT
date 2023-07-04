<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
}

$query = "SELECT * FROM usuario, endereco WHERE usuario_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $_SESSION['usuario_id']);
$stmt->execute();

$result = $stmt->get_result();

if (!$result) {
    header('Location: login.php');
}

$row = mysqli_fetch_array($result);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Editar Perfil:</h1>

    <div class="box">
        <form action="salvar_edit.php" method="POST">
            <fieldset>
                <br>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome completo:</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required autocomplete="off"
                        value="<?php echo $row['nome']; ?>">

                </div>
                <br>
                <div class="inputBox">
                    <label for="senha" class="labelInput">Senha:</label>
                    <input type="text" name="senha" id="senha" class="inputUser" required autocomplete="off"
                        value="<?php echo $row['senha']; ?>">

                </div>
                <br><br>
                <div class="inputBox">
                    <label for="email" class="labelInput">Email:</label>
                    <input type="text" name="email" id="email" class="inputUser" required autocomplete="off"
                        value="<?php echo $row['email']; ?>">

                </div>
                <br><br>
                <div class="inputBox">
                    <label for="cpf" class="labelInput">CPF:</label>
                    <input type="text" maxlength="14" name="cpf" id="cpf" class="inputUser" required autocomplete="off"
                        value="<?php echo $row['cpf']; ?>" oninput=mascara_cpf()>

                </div>
                <br><br>
                <div class="inputBox">
                    <label for="telefone" class="labelInput">Telefone</label>
                    <input type="tel" maxlength="15" name="telefone" id="telefone" class="inputUser" required
                        value="<?php echo $row['telefone']; ?>" autocomplete="off" oninput=mascara_telefone()>

                </div>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo $row['sexo'] == 'feminino' ? 'checked' : '' ?> required autocomplete="off">
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo $row['sexo'] == 'masculino' ? 'checked' : '' ?> required autocomplete="off">
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" <?php echo $row['sexo'] == 'outro' ? 'checked' : '' ?> required autocomplete="off">
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $row['data_nasc']; ?>"
                    required autocomplete="off">
                <br><br><br>
                <div class="inputBox">
                    <label for="cidade" class="labelInput">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="inputUser" required autocomplete="off"
                        value="<?php echo $row['cidade']; ?>">
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="estado" class="labelInput">Estado:</label>
                    <input type="text" name="estado" id="estado" class="inputUser" required autocomplete="off"
                        value="<?php echo $row['estado']; ?>">
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="estado" class="labelInput">Rua:</label>
                    <input type="text" name="rua" id="rua" class="inputUser" required autocomplete="off"
                        value="<?php echo $row['rua']; ?>">
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="bairro" class="labelInput">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" class="inputUser" required autocomplete="off"
                        value="<?php echo $row['bairro']; ?>">
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="complemento" class="labelInput">Complemento:</label>
                    <input type="text" name="complemento" id="complemento" class="inputUser" required
                        value="<?php echo $row['complemento']; ?>" autocomplete="off">
                </div>
                <br><br>
                <input type="hidden" name="usuario_id" value="<?php echo $row['usuario_id'] ?>">
                <button type="submit" name="atualizar" id="atualizar">Atualizar</button>
            </fieldset>
        </form>
    </div>
</body>

</html>