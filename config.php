<?php

$db_name = "avaliacao_1";  //Nome do banco de dados.
$db_host = "localhost";  //Nome do host.
$db_user = "root";  //Nome do usuário.
$db_pass = "";  //Senha.

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);  //Criando o objeto "PDO", que contém todas as informações acima.

?>