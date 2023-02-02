<?php 
include "conn/connect.php";
$listaPorDetalhes = $conn->query("select * from vw_tbprodutos where id_tipo_produto");
$rowPorDetalhes = $listaPorDetalhes->fetch_assoc();
$numRows = $listaPorDetalhes -> num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Detalhes</title>
</head>
