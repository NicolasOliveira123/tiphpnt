<?php 
include "conn/connect.php";
$id_detalhes = $_GET['id_detalhes'];
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
<body>
    <div class="container">
        <!-- mostrar se a consulta retorna vazio -->
        <?php if($numRows == 0) { ?>
            <h2 class="breadcrumb alert-danger">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <strong><?php echo $rowPorDetalhes['rotulo_detalhe'];?></strong>
            </h2>
            <div class="row">
                <?php do{ ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="index.php?id_detalhe=<?php echo $rowPorDetalhes['id_detalhe']?>">
                                <img src="images/<?php echo $rowPorDetalhes['imagem_produto']?>" class="img-responsive img-rounded">
                            </a>
                            <div class="caption text-right">
                                <h3 class="text-danger">
                                    <strong><?php echo $rowPorDetalhes['descri_detalhe']?></strong>
                                </h3>
                                <p class="text-warning">
                                    <strong><?php echo $rowPorDetalhes['rotulo_detalhe']?></strong>
                                </p>
                                <p class="text-left">
                                    <?php echo mb_strimwidth( $rowPorDetalhes['resumo_detalhe'],0,42,'...')?>
                                </p>
                                <p>
                                    <button class="btn btn-default disabled" role="button" style="cursor:default">
                                        <?php echo "R$ ".number_format($rowPorDetalhes['valor_detalhe'], 2,',',',')?>
                                    </button>
                                    <a href="">
                                        <span></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php }while($rowPorDetalhes = $listaPorDetalhes -> fetch_assoc()); ?>
            </div>
        <?php } ?>
    </div>
</body>