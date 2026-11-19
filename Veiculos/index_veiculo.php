<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Veículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

<div class="container py-3">

    <h1>Lista de Veículos</h1>

    <?php

        require_once("../conexao.php");

        $sql = "SELECT * FROM veiculos";

        $resultado = $con->query($sql);

        $dados = $resultado->fetchAll();

        foreach ($dados as $d){

            echo "<p>Modelo: ".$d['modelo']."
            | Placa: ".$d['placa']."

            <a href='consulta_veiculo.php?id=".$d['id']."'>Consultar</a></p>";

        }

    ?>

    <a href="cadastrar_veiculo.php" class="btn btn-primary">
        Novo Veículo
    </a>
    <a href="../index.php" class="btn btn-secondary">
        Voltar ao Controle de Táxi
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>
</html>