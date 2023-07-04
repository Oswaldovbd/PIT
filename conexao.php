<?php
$host = 'database-1.cm7g52exoeut.sa-east-1.rds.amazonaws.com';
$user = 'admin';
$pass = 'fnzjS0&tD4Or1b4o44z5';
$dbname = 'pit';
$conn = "";

try {
    $conn = mysqli_connect($host, $user, $pass, $dbname);
} catch (mysqli_sql_exception $e) {
    echo "Não conseguiu conectar: " . $e->getMessage();
}
?>