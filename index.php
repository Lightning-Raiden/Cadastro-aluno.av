<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'head.php';

    if(isset($_SESSION['id'], $_SESSION['nome'])) {  //Checa se a session já está ativa. Se estiver, redireciona o usuário para a página Home.
        header("Location: home.php");
        exit;
    }
?>

<body style="padding: 5rem">  <!-- Página principal para o Login ou Cadastro de conta. -->

    <div>
        <h1> Seja bem-vindo! </h1><br/>
    </div>

    <div>
        <a class="btn btn-primary" href="inscrever.php"> Criar uma conta </a>
        <a class="btn btn-success" href="login.php"> Login </a><br/><br/>
    </div>

</div>