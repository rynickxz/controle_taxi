<?php

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        require_once("../conexao.php");

        $sql = "SELECT * FROM viagens WHERE id = :id";

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
    <title>Dados da Viagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

<div class="container py-3">

    <h1>Dados da Viagem</h1>

    <form method="post">

        <div class="mb-3">
            <label for="valor" class="form-label">Informe o valor</label>
            <input value="<?= $dados['valor']?>" type="number" step="0.01" id="valor" name="valor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="destino" class="form-label">Informe o destino</label>
            <input value="<?= $dados['destino']?>" type="text" id="destino" name="destino" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="motorista" class="form-label">Informe o motorista</label>
            <input value="<?= $dados['motorista']?>" type="text" id="motorista" name="motorista" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="veiculo" class="form-label">Informe o veículo</label>
            <input value="<?= $dados['veiculo']?>" type="text" id="veiculo" name="veiculo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Alterar</button>

        <a href="excluir_viagem.php?id=<?= $dados['id'] ?>" class="btn btn-danger">Excluir</a>

    </form>

    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $valor = $_POST['valor'];
            $destino = $_POST['destino'];
            $motorista = $_POST['motorista'];
            $veiculo = $_POST['veiculo'];
            $id = $_GET['id'];

            require_once("../conexao.php");

            $sql = "UPDATE viagens SET valor = :valor, destino = :destino, motorista = :motorista, veiculo = :veiculo WHERE id = :id";

            $resultado = $con->prepare($sql);
            $resultado->bindParam(":valor", $valor);
            $resultado->bindParam(":destino", $destino);
            $resultado->bindParam(":motorista", $motorista);
            $resultado->bindParam(":veiculo", $veiculo);
            $resultado->bindParam(":id", $id);

            if($resultado->execute())

                header("Location: index_viagem.php");
            else
                echo "<p>Erro ao inserir!</p>";

        }

    ?>

    <a href="index_viagem.php">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>
</html>