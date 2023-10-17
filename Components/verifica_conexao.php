<?php
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../Pages/login.php');
}
?>