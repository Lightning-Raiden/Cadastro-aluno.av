<?php
    require 'config.php';
    include 'head.php';
?>

<body style="margin-top: 2rem">  <!-- Formulário que resgata os valores para registro de um aluno -->
    <div class="container">

        <div>
            <h1> Registrar </h1><br/>
        </div>

        <form method="post" action="registrar_action.php">
            <label for="">
                Nome: <br/>
                <input type="text" name="name" class="form-control">
            </label><br/><br/>

            <label for="">
                E-mail: <br/>
                <input type="email" name="email" class="form-control">
            </label><br/><br/>

            <label for="">
                Idade:
                <input type="number" name="idade" class="form-control">
            </label><br/><br/>

            <label for="">
                Contato: <br/>
                <input type="number" name="contato" class="form-control">
            </label><br/><br/>

            <label for="">
                Endereço: <br/>
                <input type="text" name="endereco" class="form-control">
            </label><br/><br/>

            <input type="submit" value="Registrar" class="btn btn-primary">
            <a href="home.php" class="btn btn-danger"> Cancelar </a>
        </form>

    </div>
</body>