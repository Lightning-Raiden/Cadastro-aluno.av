<?php
    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');  //Irá filtrar todos os novos valores do formulário e atribuí-los às variáveis.
    $idade = filter_input(INPUT_POST, 'idade');
    $contato = filter_input(INPUT_POST, 'contato');
    $endereco = filter_input(INPUT_POST, 'endereco');

    if($id && $name && $email && $idade && $contato && $endereco) {  //Irá checar se todos os valores existem.

        $sql = $pdo->prepare("UPDATE tbl_aluno SET nome =:name, email = :email, idade = :idade, contato = :contato, endereco = :endereco WHERE id= :id");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':idade', $idade);          //Atualiza o banco de dados com os novos valores.
        $sql->bindValue(':contato', $contato);
        $sql->bindValue(':endereco', $endereco);
        $sql->execute();

        header("Location: home.php");
        exit;

    } else {
        header("Location: editar.php");
        exit;
    }

?>