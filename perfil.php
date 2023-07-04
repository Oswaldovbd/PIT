<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
}

$query = "SELECT * FROM usuario WHERE usuario_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $_SESSION['usuario_id']);
$stmt->execute();

$result = $stmt->get_result();

if (!$result) {
    header('Location: login.php');
}
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
    <h1>Perfil:</h1>
</body>

</html>