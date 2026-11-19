<?php

    require_once("../conexao.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM veiculos WHERE id = :id";

    $resultado = $con->prepare($sql);

    $resultado->bindParam(":id", $id);

    $resultado->execute();

    header("Location: index_veiculo.php");

?>