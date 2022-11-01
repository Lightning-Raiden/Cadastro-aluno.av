<?php
    require 'config.php';

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  //Filtra todos os valores enviados ao formulário.
    $idade = filter_input(INPUT_POST, 'idade');
    $contato = filter_input(INPUT_POST, 'contato');
    $endereco = filter_input(INPUT_POST, 'endereco');

    if($name && $email && $idade && $contato && $endereco) {  //Chega se todos os valores são existentes.

        $sql = $pdo->prepare("INSERT INTO tbl_aluno (nome, email, idade, contato, endereco) VALUES (:name, :email, :idade, :contato, :endereco)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':idade', $idade);            //Insere os dados na tabela aluno.
        $sql->bindValue(':contato', $contato);
        $sql->bindValue(':endereco', $endereco);
        $sql->execute();

        header("Location: home.php");
        exit;

    } else {
        header("Location: registrar_aluno.php");
        exit;
    }

?>