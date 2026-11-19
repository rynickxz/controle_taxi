<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova Viagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

<div class="container py-3">

    <h1>Nova Viagem</h1>

    <form method="post">

        <div class="mb-3">
            <label for="valor" class="form-label">Informe o valor</label>
            <input type="number" step="0.01" id="valor" name="valor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="destino" class="form-label">Informe o destino</label>
            <input type="text" id="destino" name="destino" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="motorista" class="form-label">Informe o motorista</label>
            <input type="text" id="motorista" name="motorista" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="veiculo" class="form-label">Informe o veículo</label>
            <input type="text" id="veiculo" name="veiculo" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $valor = $_POST['valor'];
            $destino = $_POST['destino'];
            $motorista = $_POST['motorista'];
            $veiculo = $_POST['veiculo'];
            require_once("../conexao.php");

            $sql = "INSERT INTO viagens (valor, destino, motorista, veiculo)
                    VALUES (:valor, :destino, :motorista, :veiculo)";

            $resultado = $con->prepare($sql);
            $resultado->bindParam(":valor", $valor);
            $resultado->bindParam(":destino", $destino);
            $resultado->bindParam(":motorista", $motorista);
            $resultado->bindParam(":veiculo", $veiculo);

            if($resultado->execute())
                echo "<p>Inserido com sucesso!</p>";
            else
                echo "<p>Erro ao inserir!</p>";

        }

    ?>

    <a href="index_viagem.php">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>
</html>