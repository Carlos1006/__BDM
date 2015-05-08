<!DOCTYPE HTML>
<html>
    <head>
        <?php 
                session_start();
                include $_SESSION['raiz']."/__BDM/resources/php/include.php";
                include_once $_SESSION['raiz']."/__BDM/model/Producto.php";
                include_once $_SESSION['raiz']."/__BDM/model/Imagen.php";
                include_once $_SESSION['raiz']."/__BDM/model/Video.php";
                include_once $_SESSION['raiz']."/__BDM/model/Aviso.php";
                include_once $_SESSION['raiz']."/__BDM/model/Pregunta.php";
                include_once $_SESSION['raiz']."/__BDM/model/Respuesta.php";
                $aviso = new Aviso(null,null,null,null,null,null,null,null,null);
                if(isset($_SESSION["avisoVer"])) {
                    $aviso = unserialize($_SESSION["avisoVer"]);
                }
        ?>
        <title>Ad</title>
        <script src="/__BDM/resources/js/ad.js"></script>
    </head>
    <body>
        <?php  include $_SESSION['raiz']."/__BDM//resources/php/header.php"; ?>
        <div class="superContainer">
            <div class="leftSkyscraper">
                <?php include $_SESSION['raiz']."/__BDM/resources/php/categories.php"; ?>
            </div>
            <div class="centerSkyscraper">
                <div class="superAd">
                    <div class="categoriePath">
                        <div class="categoriaAd">
                            <?php echo $aviso->getNombreCatAviso(); ?>&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="subcategorieAd">
                            <?php echo $aviso->getNombreSubAviso(); ?>
                        </div>
                    </div>
                    <div class="mainTitleAd">
                        <?php echo $aviso->getDescripcionAviso(); ?>
                    </div>
                    <div class="infoAd">
                        <div class="mediaAd">
                            <div class="slideshowContainer">
                                <div class="slideshow">
                                    <div class="absoluteSlide">
                                        <?php
                                        foreach($aviso->getImagenesAviso() as $imagen) {
                                            if($imagen->getIdImagen() != 0) {
                                                ?>
                                                <div class="media">
                                                    <img class="mediaSrc" src="<?php echo $imagen->getPathImagen(); ?>"/>
                                                </div>
                                            <?php
                                            }
                                        }
                                        foreach($aviso->getVideosAviso() as $video) {
                                            if($video->getIdVideo() != 0) {
                                                ?>
                                                <div class="media">
                                                    <video class="mediaSrc" controls>
                                                        <source src="<?php echo $video->getPathVideo(); ?>" type="video/mp4">
                                                    </video>

                                                </div>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="rightSlide">&gt;</div>
                                    <div class="leftSlide">&lt;</div>
                                </div>
                            </div>
                        </div>
                        <div class="descriptionAd_1">
                            <div class="priceAd"><?php echo number_format($aviso->getPrecioAviso()); ?></div>
                            <div class="descriptionAd"><?php echo $aviso->getDescripcionLargaAviso(); ?></div>
                            <div class="dateAd"><?php echo $aviso->getVigenciaAviso(); ?></div>
                            <div class="buyAd">
                                <div class="stockAd">
                                    <div class="-Button_1">-</div>
                                    <div class="-stock" id="mainStock" maxStock="<?php echo $aviso->getCantidadAviso(); ?>"></div>
                                    <div class="-Button_2">+</div>
                                </div>
                                <div class="buyButton">
                                    <div class="buyButtonInput">Comprar</div>
                                </div>
                            </div>
                        </div>
                        <!-- continuar aqui -->
                    </div>
                    <div class="questionHeader">
                        <?php
                            if(isset($_SESSION["sesion"])) {
                                $usuario = unserialize($_SESSION["sesion"]);
                                $idUsuarioSesion = $usuario->getIdUsuario();
                                $idUsuarioAviso =  $aviso->getUsuarioAviso();
                                if($idUsuarioAviso == $idUsuarioSesion) {
                        ?>
                                    <input type="text" class="form-control questionAdInput" placeholder="No puedes hacer preguntas en tus avisos..." disabled/>
                        <?php
                                } else{
                        ?>
                                    <input type="text" class="form-control questionAdInput" placeholder="Pregunta al vendedor..."/>
                        <?php
                                }
                            } else {
                        ?>
                                <input type="text" class="form-control questionAdInput" placeholder="Registrate o inicia sesion para hacer preguntas..." disabled/>
                        <?php
                            }
                        ?>
                        <div class="questionButton">Enviar Pregunta</div>
                    </div>
                    <div class="questionsContainer">
                        <?php
                            foreach($aviso->getPreguntasAviso() as $pregunta) {
                        ?>
                                <div class="questionAd">
                                    <div class="question">
                                        <?php echo utf8_encode($pregunta->getDescripcionPregunta()); ?>
                                    </div>
                                    <div class="answer">
                                        <?php echo utf8_encode($pregunta->getRespuesta()); ?>
                                    </div>
                                </div>
                        <?php
                            }
                            if(count($aviso->getPreguntasAviso()) == 0) {
                        ?>
                                <div class="questionAd">
                                    <div class="question">
                                        Sin preguntas
                                    </div>
                                    <div class="answer">
                                        Se el primero en realizar una pregunta
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="rightSkyscraper">
                <?php   include $_SESSION['raiz']."/__BDM/resources/php/profile_right.php";
                        include $_SESSION['raiz']."/__BDM/resources/php/profileEdit.php"; ?>
            </div>
            <div class="errorBox"></div>
        </div>
        <div class="errorBox">
                <div class="superError"></div>
        </div>
        <div class="superSale" style="display:none;">
            <div class="saleContainer">
                <div class="headerSale">Iphone 6</div>
                <div class="sale">
                    <div class="leftColumnSale">
                        <div class="imgSale">
                            <img class="imgSaleSrc" src="http://upload.wikimedia.org/wikipedia/commons/3/3b/NASA-SpiralGalaxyM101-20140505.jpg" />
                        </div>
                    </div>
                    <div class="rightColumnSale">
                        <div class="saleInfo">
                            <div class="body1SaleInfo">Cantidad</div>
                            <div class="body2SaleInfo textSale">10</div>
                        </div>
                        <div class="saleInfo">
                            <div class="body1SaleInfo">Subtotal</div>
                            <div class="body2SaleInfo textSale moneySale">120000</div>
                        </div>
                        <div class="saleInfo">
                            <div class="body1SaleInfo">Total</div>
                            <div class="body2SaleInfo textSale moneySale">150000</div>
                        </div>
                        <div class="saleInfo">
                            <div class="body1SaleInfo">Metodo de pago</div>
                            <div class="body2SaleInfo">
                                <select class="selectPay form-control"></select>
                            </div>
                        </div>
                        
                        <div class="saleAction">
                            <div class="action1SaleInfo">Cancelar</div>
                            <div class="action2SaleInfo">Aceptar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>