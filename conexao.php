<?php
 $host = 'localhost';
 $user = 'root';
 $pass = '';
 $dbname = 'pit';
 $conn = "";

try {
     $conn = mysqli_connect($host,$user,$pass,$dbname);
}
catch(mysqli_sql_exception){
    echo "Não conseguiu conectar";
}