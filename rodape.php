<?php ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rodapé</title>
</head>
<body class="fundofixo">
    <div class="row panel-footer fundo-rodape">
        <!-- area de localização -->
        <div class="col-sm-6 col-md-4">
            <div class="panel-footer" style="background: none;">
                <img src="tiphpnt-master/fonts/pexels-daniel-nettesheim-1162361.jpg">
                <br>
                <i>O melhor churrasco da zona leste</i>
                <address>
                    <i>Avenida Itaquera, 8266 - Itaquera - São Paulo - SP - CEP 08295000</i>
                    <br>
                    <span class="glyphicon glyphicon-phone-alt"></span>
                    (11) 2185-9200
                    <br>
                    <span class="glyphicon glyphicon-envelope"></span>
                    &nbsp;
                    <a href="mailto:contato@chuletaquente.com.br?subject=Contato do Site&cc=nicolas.oreis">
                        contato@chuletaquente.com.br
                    </a>
                </address>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3657.7947097421197!2d-46.45865274900203!3d-23.539884984618446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1674235681348!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <!-- final area de localização -->
        <div class="col-sm-6 col-md-4">
            <div class="panel-footer">
                <h4>Links</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="index.php#home" class="text-danger">
                            <span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php#destaques" class="text-danger">
                            <span class="glyphicon glyphicon-ok-sign" aria-hidden="true">&nbsp;Destaques</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php#produtos" class="text-danger">
                            <span class="glyphicon glyphicon-cutlery" aria-hidden="true">&nbsp;Produtos</span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php#contato" class="text-danger">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;Contato</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin/index.php" class="text-danger">
                            <span class="glyphicon glyphicon-users" aria-hidden="true">&nbsp;Administração</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- area de contatos -->
        <div class="col-sm-6 col-md-4">
            <div  class="panel-footer" style="background: none;">
                <h4>Contato</h4>
                <form action="rodape_contato_envia.php" name="form_contato" method="post">
                    <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" name="nome_contato" placeholder="digite seu nome" aria-describedby="basic-addon1" class="form-control" required>
                        </span>
                    </p>

                    <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" name="email_contato" placeholder="digite seu email" aria-describedby="basic-addon2" class="form-control" required>
                        </span>
                    </p>

                    <p>
                        <span class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" name="comentario_contato" placeholder="digite seu comentário" aria-describedby="basic-addon3" class="form-control" required>
                        </span>
                    </p>
                    
                    <p>
                        <button class="btn btn-danger btn-block" aria-label="enviar" role="button">
                            Enviar
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        </button>
                    </p>
                </form>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="panel-footer" style="background: none;">
                <h6 class="text-danger text-center">
                    Desenvolvido por Nicolas&O.R; 2023
                    <br>
                    <a href="https://www.softkleen.com.br" target="_blank">softkleen.com.br</a>
                </h6>
            </div>
        </div>
    </div>
</body>
</html>
