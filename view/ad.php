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
                include_once $_SESSION['raiz']."/__BDM/model/MetodoPago.php";
                $aviso = new Aviso(null,null,null,null,null,null,null,null,null);
                if(isset($_SESSION["avisoVer"])) {
                    $aviso = unserialize($_SESSION["avisoVer"]);
                }
        ?>
        <title>Ad</title>
        <script src="/__BDM/resources/js/ad.js"></script>
        <script src="/__BDM/resources/js/actions/ad_actions.js"></script>
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
                                        $urlSale = "/__BDM/img/404/dino.png";
                                        $once    = true;
                                        foreach($aviso->getImagenesAviso() as $imagen) {
                                            if($imagen->getIdImagen() != 0) {
                                                if($once) {
                                                    $once = false;
                                                    $urlSale = $imagen->getPathImagen();
                                                }
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
                            <div class="priceAd" id="priceAdToBuy"><?php echo number_format($aviso->getPrecioAviso()); ?></div>
                            <div class="descriptionAd"><?php echo $aviso->getDescripcionLargaAviso(); ?></div>
                            <div class="dateAd"><?php echo $aviso->getVigenciaAviso(); ?></div>
                            <div class="buyAd">
                                <div class="stockAd">
                                    <div class="-Button_1">-</div>
                                    <div class="-stock" id="mainStock" maxStock="<?php echo $aviso->getCantidadAviso(); ?>"></div>
                                    <div class="-Button_2">+</div>
                                </div>
                                <div class="buyButton">
                                    <?php
                                    if(isset($_SESSION["sesion"])) {
                                        $usuario = unserialize($_SESSION["sesion"]);
                                        $idUsuarioSesion = $usuario->getIdUsuario();
                                        $idUsuarioAviso =  $aviso->getUsuarioAviso();
                                        $stock = $aviso->getCantidadAviso();
                                        if($idUsuarioAviso == $idUsuarioSesion) {
                                    ?>
                                            <div class="buyButtonInput btn" disabled>Comprar</div>
                                    <?php
                                        } else if($stock>0){
                                    ?>
                                            <div class="buyButtonInput btn" id="buyAdBtn">Comprar</div>
                                    <?php
                                        } else {
                                    ?>
                                            <div class="buyButtonInput btn" disabled>Comprar</div>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                        <div class="buyButtonInput btn" disabled>Comprar</div>
                                    <?php
                                    }
                                    ?>
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
                                    <input type="text" name="pregunta" id="questionForm" class="form-control questionAdInput" placeholder="Pregunta al vendedor..."/>
                        <?php
                                }
                            } else {
                        ?>
                                <input type="text" class="form-control questionAdInput" placeholder="Registrate o inicia sesion para hacer preguntas..." disabled/>
                        <?php
                            }
                        ?>
                        <div class="questionButton" id="sendAnswer">Enviar Pregunta</div>
                    </div>
                    <div class="questionsContainer">
                        <?php
                            foreach($aviso->getPreguntasAviso() as $pregunta) {
                        ?>
                                <div class="questionAd">
                                    <div class="question">
                                        <?php echo $pregunta->getDescripcionPregunta(); ?>
                                    </div>
                                    <div class="answer">
                                        <?php echo $pregunta->getRespuesta(); ?>
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
                <div class="headerSale" id="headerConfirmation"><?php echo $aviso->getDescripcionAviso(); ?>&nbsp;&nbsp;&nbsp;</div>
                <div class="sale">
                    <div class="leftColumnSale">
                        <div class="imgSale">
                            <img class="imgSaleSrc" src="<?php echo $urlSale; ?>" />
                        </div>
                    </div>
                    <div class="rightColumnSale">
                        <div class="saleInfo">
                            <div class="body1SaleInfo">Cantidad</div>
                            <div class="body2SaleInfo textSale" id="stockToBuy"></div>
                        </div>
                        <div class="saleInfo">
                            <div class="body1SaleInfo">Subtotal</div>
                            <div class="body2SaleInfo textSale moneySale"><?php echo $aviso->getPrecioAviso(); ?></div>
                        </div>
                        <div class="saleInfo">
                            <div class="body1SaleInfo">Total</div>
                            <div class="body2SaleInfo textSale moneySale" id="totalToPay"></div>
                        </div>
                        <div class="saleInfo">
                            <div class="body1SaleInfo">Metodo de pago</div>
                            <div class="body2SaleInfo">
                                <select class="selectPay form-control" id="paymentSelect">
                                    <option value="0" selected disabled>Elige un metodo de pago</option>
                                    <?php
                                        foreach($aviso->getMetodosPagoAviso() as $metodo) {
                                    ?>
                                            <option value="<?php echo $metodo->getIdMetodoPago(); ?>"><?php echo $metodo->getNombreMetodoPago(); ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="saleAction">
                            <div class="action1SaleInfo" id="cancelBuyAd">Cancelar</div>
                            <div class="action2SaleInfo" id="okBuyAd">Aceptar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>