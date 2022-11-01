<?php
    require 'config.php';
    require 'head.php';

    $info = [];  //Cria uma variável que contém um array.

    $id = filter_input(INPUT_GET, 'id');  //Filtra os valores de ID no fomulário.

    if($id) {
        $sql = $pdo->prepare("SELECT * FROM tbl_aluno WHERE id = :id");  //Seleciona todos os dados da tabela aluno onde ID possui um valor definido.
        $sql->bindValue(':id', $id);  //Atribui esse valor à variável.
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);  //Coloca os valores, sem duplicá-los, no array criando anteriormente.

        } else {
            header("Location: home.php");
            exit;
        }
    } else {
        header("Location: home.php");
        exit;
    }

?>
<div class="container">  <!-- Formulário que irá editar os valores do Aluno. -->
    <h1> Editar </h1>

    <form action="editar_action.php" method="post">
        <input type="hidden" name="id" value="<?=$info['id']; ?>" />
        <div class="mb-3">
            <label for="" class="form-label">
                Nome: <br/>
                <input type="text" name="name" value="<?=$info['nome']; ?>" class="form-control">
            </label><br/><br/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                E-mail: <br/>
                <input type="email" name="email" value="<?=$info['email']; ?>" class="form-control">
            </label><br/><br/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                Idade: <br/>
                <input type="number" name="idade" value="<?=$info['idade']; ?>" class="form-control">
            </label><br/><br/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                Contato: <br/>
                <input type="number" name="contato" value="<?=$info['contato']; ?>" class="form-control">
            </label><br/><br/>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                Endereço: <br/>
                <input type="text" name="endereco" value="<?=$info['endereco']; ?>" class="form-control">
            </label><br/><br/>
        </div>

        <input type="submit" value="Salvar" class="btn btn-primary">
        <a href="home.php" class="btn btn-danger"> Cancelar </a>
    </form>
</div>