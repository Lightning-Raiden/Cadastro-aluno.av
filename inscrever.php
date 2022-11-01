<?php
    require 'config.php';
    include 'head.php';

    if(isset($_SESSION['id'], $_SESSION['nome'])) {  //Checa a session. Se estiver ativa, redireciona o usuário para a Home.
        header("Location: home.php");
        exit;
    }
?>

<body style="margin-top: 2rem">  <!-- Formulário que pega os valores para o cadástro do usuário. -->
    <div class="container">

        <div>
            <h1> Cadastrar Usuário </h1>
        </div>

        <form action="cadastrar_login.php" method="post">
            <label for="">
                Nome:
                <input type="text" name="name" class="form-control" required>
            </label><br/><br/>

            <label for="">
                Email:
                <input type="email" name="email" class="form-control" required>
            </label><br/><br/>

            <label for="">
                Senha:
                <input type="password" name="senha" class="form-control" required>
            </label><br/><br/>

            <label for="">
                Confirmar senha:
                <input type="password" name="confirm_senha" class="form-control" required>
            </label><br/><br/>

            <input type="submit" value="Cadastrar" class="btn btn-primary">
            <a href="home.php" class="btn btn-danger"> Cancelar </a>
        </form>

    </div>
</body>