<?php 
include "conn/connect.php";
$idTipo = $_GET['id_tipo'];
$listaPorTipo = $conn->query("select * from vw_tbprodutos where id_tipo_produto");
$rowPorTipo = $listaPorTipo->fetch_assoc();
$numRows = $listaPorTipo -> num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Busca por tipo</title>
</head>
<body class="fundofixo">
    <?php include 'menu_publico.php' ?>
    <div class="container">
        <!-- mostrar se a consulta retorna vazio -->
        <?php if($numRows == 0) { ?>
            <h2 class="breadcrumb alert-danger">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <strong><?php echo $rowPorTipo['rotulo_tipo'];?></strong>
            </h2>
            <div class="row">
                <?php do{ ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="produto_detalhes.php?id_produto=<?php echo $rowPorTipo['id_produto']?>">
                                <img src="images/<?php echo $rowPorTipo['imagem_produto']?>" class="img-responsive img-rounded">
                            </a>
                            <div class="caption text-right">
                                <h3 class="text-danger">
                                    <strong><?php echo $rowPorTipo['descri_produto']?></strong>
                                </h3>
                                <p class="text-warning">
                                    <strong><?php echo $rowPorTipo['rotulo_tipo']?></strong>
                                </p>
                                <p class="text-left">
                                    <?php echo mb_strimwidth( $rowPorTipo['resumo_produto'],0,42,'...')?>
                                </p>
                                <p>
                                    <button class="btn btn-default disabled" role="button" style="cursor:default">
                                        <?php echo "R$ ".number_format($rowPorTipo['valor_produto'], 2,',',',')?>
                                    </button>
                                    <a href="">
                                        <span></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php }while($rowPorTipo = $listaPorTipo -> fetch_assoc()); ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>