<?php
// Conecta no banco de dados
$dsn = "mysql:dbname=tlc;host=127.0.0.1";//u721796719_tlc
$dbuser = 'root';//u721796719_tlc
$dbpass = '';

$bd = new PDO ($dsn, $dbuser, $dbpass);
//FIM Conecta no Banco de Dados