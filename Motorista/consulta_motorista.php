<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        require_once("../conexao.php");

        $sql = "SELECT * FROM motoristas WHERE id = :id";

        $resultado = $con->prepare($sql);

        $resultado->bindParam(':id', $id);

        $resultado->execute();

        $dados = $resultado->fetch();

        if (!$dados){

            die("Registro não encontrado!");

        }

    } else {

        die("Não é possível abrir o arquivo!");

    }

?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dados do Motorista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

<div class="container py-3">

    <h1>Dados do Motorista</h1>

    <form method="post">

        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome</label>
            <input value="<?= $dados['nome']?>" type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">Informe o CPF</label>
            <input value="<?= $dados['cpf']?>" type="text" id="cpf" name="cpf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cnh" class="form-label">Informe a CNH</label>
            <input value="<?= $dados['cnh']?>" type="text" id="cnh" name="cnh" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Informe o telefone</label>
            <input value="<?= $dados['telefone']?>" type="text" id="telefone" name="telefone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Alterar</button>

        <a href="excluir_motorista.php?id=<?= $dados['id'] ?>" class="btn btn-danger">Excluir</a>

    </form>

    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $nome = $_POST['nome'];

            $cpf = $_POST['cpf'];

            $cnh = $_POST['cnh'];

            $telefone = $_POST['telefone'];

            $id = $_GET['id'];

            require_once("../conexao.php");

            $sql = "UPDATE motoristas SET nome = :nome, cpf = :cpf, cnh = :cnh, telefone = :telefone WHERE id = :id";

            $resultado = $con->prepare($sql);

            $resultado->bindParam(":nome", $nome);

            $resultado->bindParam(":cpf", $cpf);

            $resultado->bindParam(":cnh", $cnh);

            $resultado->bindParam(":telefone", $telefone);

            $resultado->bindParam(":id", $id);

            if($resultado->execute())

                header("Location: index_motorista.php");

            else

                echo "<p>Erro ao inserir!</p>";

        }

    ?>

    <a href="index_motorista.php">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>
</html>