<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Veículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

<div class="container py-3">

    <h1>Novo Veículo</h1>

    <form method="post">

        <div class="mb-3">
            <label for="ano" class="form-label">Informe o ano</label>
            <input type="number" id="ano" name="ano" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="placa" class="form-label">Informe a placa</label>
            <input type="text" id="placa" name="placa" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Informe o modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cor" class="form-label">Informe a cor</label>
            <input type="text" id="cor" name="cor" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $ano = $_POST['ano'];

            $placa = $_POST['placa'];

            $modelo = $_POST['modelo'];

            $cor = $_POST['cor'];

            require_once("../conexao.php");

            $sql = "INSERT INTO veiculos (ano, placa, modelo, cor)
                    VALUES (:ano, :placa, :modelo, :cor)";

            $resultado = $con->prepare($sql);

            $resultado->bindParam(":ano", $ano);

            $resultado->bindParam(":placa", $placa);

            $resultado->bindParam(":modelo", $modelo);

            $resultado->bindParam(":cor", $cor);

            if($resultado->execute())

                echo "<p>Inserido com sucesso!</p>";

            else

                echo "<p>Erro ao inserir!</p>";

        }

    ?>

    <a href="index_veiculo.php">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>
</html>