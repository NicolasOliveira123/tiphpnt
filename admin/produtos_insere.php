<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if($_POST){
    if(isset($_POST['enviar'])){
        $nome_img = $_FILES['imagem_produto'] ['name'];
        $tmp_img = $_FILES['imagem_produto'] ['tmp_name'];
        $dir_img = "../img/".$nome_img;
        move_uploaded_file($tmp_img, $dir_img);    
    }
    $id_tipo_produto = $_POST['id_tipo_produto'];
    $destaque_produto = $_POST['destaque_produto'];
    $descri_produto = $_POST['descri_produto'];
    $resumo_produto = $_POST['resumo_produto'];
    $valor_produto = $_POST['valor_produto'];
    $imagem_produto = $_FILES['imagem_produto'] ['name'];

    $insereProd = "INSERT INTO tbprodutos
                    (id_tipo_produto, destaque_produto, descri_produto, valor_produto, valor_produto, imagem_produto)
                    VALUES
                    ('$id_tipo_produto', '$destaque_produto', '$descri_produto', '$resumo_produto', '$valor_produto', '$imagem_produto');
                    ";
    $resultado = $conn->query($insereProd);
    // após a gravação bem sucedida do produto, volta (atualiza) lista.
    if(mysqli_insert_id($conn)){
        header('location: produtos_lista.php');
    }

    // selecionar os dados de chave estrangeira (lista de tipos de produto)
    $consulta_fk = "select * from tbtipos order by rotulo_tipo asc";
    $lista_fk = $conn->query($consulta_fk);
    $row_fk = $lista_fk->fetch_assoc();
    $nlinhas = $lista_fk->num_rows;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Produto - Insere</title>
</head>
<body>
    <?php include "menu_adm.php";?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-4 col-sm-6 col-md-4">
                <h2 class="breadcrumb text-danger">
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Produtos
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="produtos_insere.php" method="post" 
                         name="form_produto_insere" enctype="multipart/form-data" id="form_produto_insere">
                            <label for="id_tipo_produto">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
                                    <?php do { ?>
                                    <option value="<?php echo $row_fk['id_tipo']; ?>">
                                        <?php echo $row_fk['rotulo_tipo']; ?>
                                    </option>
                                    <?php } while($row_fk=$lista_fk->fetch_assoc()); ?>
                                </select>
                            </div>
                            <label for="destaque_produto">Destaque:</label>
                            <div class="input-group">
                                <label for="destaque_produto_s" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Sim">Sim
                                </label>
                                <label for="destaque_produto_n" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Não" checked>Não
                                </label>
                            </div>

                            <label for="descri_produto">Descrição</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="descri_produto" id="descri_produto" 
                                  class="form-control" placeholder="Digite a descrição do produto"
                                  maxlength="100" required>
                            </div>

                            <label for="resumo_produto">Resumo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <textarea name="resumo_produto" id="resumo_produto"
                                  cols="30" rows="8"
                                  class="form-control" placeholder="Digite os detalhes do produto"
                                  maxlength="100" required>
                                </textarea>
                            </div>

                            <label for="valor_produto">Valor:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="number" name="valor_produto" id="valor_produto"
                                 class="form-control" required min="0" step="0.01">
                            </div>

                            <label for="imagem_produto">Imagem:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <img src="" name="imagem" id="imagem" class="img-responsive">
                                <input type="file" name="imagem_produto" id="imagem_produto" class="form-control" accept="image/*">
                            </div>
                            <br>
                            <br>
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block" value="Cadastrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!-- script para imagem -->
    <script>
        document.getElementById("imagem_produto").onchange = function(){
            var reader = new FileReader();
            if(this.files[0].size>528385){
                alert("A imagem deve ter no máximo 500KB");
                $("#imagem").attr("src", "blank");
                $("#imagem").hide();
                $("#imagem_produto").wrap('<form>').closet('form').get(0).reset();
                $("imagem_produto").unwrap();
            }
            if(this.files[0].type.indexOf("image")==1){
                alert("formato inválido, escolha uma imagem!");
                $("#imagem").attr("src", "blank");
                $("#imagem").hide();
                $("#imagem_produto").wrap('<form>').closet('form').get(0).reset();
                $("imagem_produto").unwrap();
                return false
            }
            reader.onload = function(e){
                document.getElementById("imagem").src = e.target.result
                $("#imagem").show();
            }
            raeder.readAsDataURL(this.files[0]);
        }
    </script>

</body>
</html>

