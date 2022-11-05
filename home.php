<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'head.php';

    $lista = [];  //Cria uma variável que irá conter um array.
    $sql = $pdo->query("SELECT * FROM tbl_aluno");  //Atribui à variável o query selecionando tudo da tabela aluno.

    if($sql->rowCount() > 0) {  //Chega se a variável recebeu algum valor.
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);  //Se sim, atribui esse(s) valor(es) ao array.
    }

    if(!isset($_SESSION['id'], $_SESSION['nome'])) {  //Se não existe uma sessão ativa neste momento, redireciona para o index(página inicial).
        header("Location: index.php");
        exit;
    }

?>

<body style="margin-top: 2rem">  <!-- Lista dos alunos -->
    <div class="container">

        <div>
            <h1> Alunos </h1><br/>    
        </div>

        <div>
            <a class="btn btn-danger" href="logout.php"> Logout </a>
            <a class="btn btn-primary" href="registrar_aluno.php"> Registrar Aluno </a><br/><br/>
        </div>

        <div>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th>Contato</th>
                    <th>Endereço</th>
                </tr>
                <?php foreach($lista as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id'] ?></td>
                        <td><?php echo $usuario['nome'] ?></td>
                        <td><?php echo $usuario['email'] ?></td>
                        <td><?php echo $usuario['idade'] ?></td>
                        <td><?php echo $usuario['contato'] ?></td>
                        <td><?php echo $usuario['endereco'] ?></td>
                        <td>
                            <a 
                            href="editar.php?id=<?=$usuario['id']; ?>"
                            class="btn btn-success"
                            >
                            Editar
                            </a>
                            <a 
                            href="excluir.php?id=<?=$usuario['id']; ?>"
                            onclick="return confirm('Tem certeza que deseja excluir:')"
                            class="btn btn-danger"
                            >
                            Excluir
                            </a>
                            <a 
                            href="perfil.php?id=<?=$usuario['id']; ?>"
                            class="btn btn-primary"
                            >
                            Perfil
                        </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        
    </div>
</body>