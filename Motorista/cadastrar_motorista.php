<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Motorista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

<div class="container py-3">

    <h1>Novo Motorista</h1>

    <form method="post">

        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">Informe o CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cnh" class="form-label">Informe a CNH</label>
            <input type="text" id="cnh" name="cnh" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Informe o telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

    <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            $nome = $_POST['nome'];

            $cpf = $_POST['cpf'];

            $cnh = $_POST['cnh'];

            $telefone = $_POST['telefone'];

            require_once("../conexao.php");

            $sql = "INSERT INTO motoristas (nome, cpf, cnh, telefone)
                    VALUES (:nome, :cpf, :cnh, :telefone)";

            $resultado = $con->prepare($sql);

            $resultado->bindParam(":nome", $nome);

            $resultado->bindParam(":cpf", $cpf);

            $resultado->bindParam(":cnh", $cnh);

            $resultado->bindParam(":telefone", $telefone);

            if($resultado->execute())

                echo "<p>Inserido com sucesso!</p>";

            else

                echo "<p>Erro ao inserir!</p>";

        }

    ?>

    <a href="index_motorista.php">Voltar</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>
</html>