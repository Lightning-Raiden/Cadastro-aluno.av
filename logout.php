<?php
session_start();
ob_start();
unset($_SESSION['id'], $_SESSION['nome']);  //Irá matar a sessão.

$_SESSION['msg'] = "<p style='color: green'>Deslogado com sucesso!</p>";  //Mensagem de confirmação.

header("Location: index.php");  //Redirecionamento.
exit;
?>