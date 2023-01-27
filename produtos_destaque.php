<?php 
include "conn/connect.php";
$idDestaque = $_GET['id_tipo'];
$listaPorDestaque = $conn->query("select * from vw_tbprodutos where id_tipo_produto");
$rowPorDestaque = $listaPorDestaque->fetch_assoc();
$numRows = $listaPorDestaque -> num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Destaques</title>
</head>
<body>
    <div class="container">
        <!-- mostrar se a consulta retorna vazio -->
        <?php if($numRows == 0) { ?>
            <h2 class="breadcrumb alert-danger">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <strong><?php echo $rowPorDestaque['rotulo_tipo'];?></strong>
            </h2>
            <div class="row">
                <?php do{ ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="produto_detalhes.php?id_produto=<?php echo $rowPorDestaque['id_produto']?>">
                                <img src="img/pexels-pixabay-carne-236887.jpg" responsive>
                            </a>
                            <div class="caption text-right">
                                <h3 class="text-danger">
                                    <strong><?php echo $rowPorDestaque['descri_produto']?></strong>
                                </h3>
                                <p class="text-warning">
                                    <strong><?php echo $rowPorDestaque['rotulo_tipo']?></strong>
                                </p>
                                <p class="text-left">
                                    <?php echo mb_strimwidth( $rowPorDestaque['resumo_produto'],0,42,'...')?>
                                </p>
                                <p>
                                    <button class="btn btn-default disabled" role="button" style="cursor:default">
                                        <?php echo "R$ ".number_format($rowPorDestaque['valor_produto'], 2,',',',')?>
                                    </button>
                                    <a href="">
                                        <span></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php }while($rowPorDestaque = $listaPorDestaque -> fetch_assoc()); ?>
            </div>
        <?php } ?>
    </div>
</body>