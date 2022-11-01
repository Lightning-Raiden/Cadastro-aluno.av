<?php
    require 'config.php';

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);   //Atribui às variáveis os valores filtrados do formulário.
    $senha = filter_input(INPUT_POST, 'senha');
    $confirm_senha = filter_input(INPUT_POST, 'confirm_senha');

    if($name && $email && $senha && $confirm_senha) {  //Irá checar se todos os valores existem.

        $sql = $pdo->prepare("SELECT * FROM tbl_usuario WHERE email = :email");  //Seleciona todos os valores da tabela usuario onde email possui um valor definido.
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() === 0) {

            if($senha === $confirm_senha) {  //Checa se a senha e a confirmação da senha são iguais. Se sim, executa as instruções.

                $password_hash = password_hash($senha, PASSWORD_DEFAULT); //Atribui à variável o hash da senha.

                $sql = $pdo->prepare("INSERT INTO tbl_usuario (nome, email, senha) VALUES (:name, :email, :senha)");  //Irá inserir os valores na tabela usuario.
                $sql->bindValue(':name', $name);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':senha', $password_hash);
                $sql->execute();

                 header("Location: login.php");
                 exit;
            } else {
                header("Location: inscrever.php");
                exit;
            }
        } else {
            header("Location: inscrever.php");
            exit;
        }
    } else {
        header("Location: inscrever.php");
        exit;
    }

?>