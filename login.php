<?php
    session_start();  //Irá iniciar a sessão.
    ob_start();
    require 'head.php';  //Traz o head.php para usá-lo no código.
    require 'config.php';  //Faz o mesmo que o de cima, porém trazendo o config.php.

    if(isset($_SESSION['id'], $_SESSION['nome'])) {  //Vai checar se a sessão já está iniciada. Se estiver, irá mandar o usuário até a página Home.
        header("Location: home.php");
        exit;
    } 

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    if(!empty($dados['Logar'])) {  //Irá chegar se o campo $dados *não está vazio*. Se não estiver, irá trazer da tabela usuario o email. 

        $sql = $pdo->prepare("SELECT * FROM tbl_usuario WHERE email = :email");
        $sql->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $sql->execute();

        if(($sql) && ($sql->rowCount() != 0)) {  //Se $sql e seu rowCount forem diferentes de zero, irá atribuir à $resultado os valores encontrados, sem duplicá-los.
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            //var_dump($resultado);
            if(password_verify($dados['senha'], $resultado['senha'])) {  //Se a senha do campo $dados e a senha atribuída à $resultado forem a mesma, irá iniciar a Sessão.
                $_SESSION['id'] = $resultado['id'];
                $_SESSION['nome'] = $resultado['nome'];
                header("Location: home.php");
                exit;

            } else {
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválidos!<p/>";  //Se forem diferentes, irá imprimir uma mensagem de erro.
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválidos!<p/>";  //Se forem igual a zero, irá imprimir uma mensagem de erro.
        }

        if(isset($_SESSION['msg'])) {  //Nesta parte, checa se a mensagem de erro tem algum valor. Se estiver, irá mostrá-la e depois matá-la.
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

    } 

?>

<body style="margin-top: 2rem"> <!-- Este é o formulário que irá resgatar os valores do login. -->
    <div class="container">

        <div>
            <h1> Login </h1>
        </div>

        <form action="" method="post">

            <label for="">
                E-mail: <br/>
                <input type="email" name="email" class="form-control" value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>" required>
            </label><br/><br/>

            <label for="">
                Senha: <br/>
                <input type="password" name="senha" class="form-control" required>
            </label><br/><br/>

            <input type="submit" value="Logar" name="Logar" class="btn btn-primary">

            <a href="index.php" class="btn btn-danger"> Cancelar </a><br/><br/>

            <h4> Não tem uma conta? Crie a sua agora mesmo! </h4>
            <a href="inscrever.php" class="btn btn-success"> Criar uma conta </a>

        </form>

    </div>
</body>