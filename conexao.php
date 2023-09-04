<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'pit';
$conn = "";

try {
    $conn = mysqli_connect($host, $user, $pass, $dbname);
} catch (mysqli_sql_exception $e) {
    echo "Não conseguiu conectar: " . $e->getMessage();
}
?>