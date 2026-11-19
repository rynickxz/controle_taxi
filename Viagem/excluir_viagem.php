<?php

    require_once("../conexao.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM viagens WHERE id = :id";

    $resultado = $con->prepare($sql);

    $resultado->bindParam(":id", $id);

    $resultado->execute();

    header("Location: index_viagem.php");

?>