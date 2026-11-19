<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        require_once("../conexao.php");

        $sql = "SELECT * FROM veiculos WHERE id = :id";

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
    <title>Dados do Veículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

<div class="container py-3">

    <h1>Dados do Veículo</h1>

    <form method="post">

        <div class="mb-3">
            <label for="ano" class="form-label">Informe o ano</label>
            <input value="<?= $dados['ano']?>" type="number" id="ano" name="ano" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="placa" class="form-label">Informe a placa</label>
            <input value="<?= $dados['placa']?>" type="text" id="placa" name="placa" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Informe o modelo</label>
            <input value="<?= $dados['modelo']?>" type="text" id="modelo" name="modelo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cor" class="form-label">Informe a cor</label>
            <input value="<?= $dados['cor']?>" type="text" id="cor" name="cor" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Alterar</button>

        <a href="excluir_veiculo.php?id=<?= $dados['id'] ?>" class="btn btn-danger">Excluir</a>

    </form>

    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $ano = $_POST['ano'];

            $placa = $_POST['placa'];

            $modelo = $_POST['modelo'];

            $cor = $_POST['cor'];

            $id = $_GET['id'];

            require_once("../conexao.php");

            $sql = "UPDATE veiculos SET ano = :ano, placa = :placa, modelo = :modelo, cor = :cor WHERE id = :id";

            $resultado = $con->prepare($sql);

            $resultado->bindParam(":ano", $ano);

            $resultado->bindParam(":placa", $placa);

            $resultado->bindParam(":modelo", $modelo);

            $resultado->bindParam(":cor", $cor);

            $resultado->bindParam(":id", $id);

            if($resultado->execute())

                header("Location: index_veiculo.php");

            else

                echo "<p>Erro ao inserir!</p>";

        }

    ?>

    <a href="index_veiculo.php">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>
</html>