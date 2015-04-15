<!DOCTYPE HTML>
<html>
    <head>
        <title>Main</title>
        <?php  
                session_start();
                include $_SESSION['raiz']."/__BDM/resources/php/include.php";
                include $_SESSION['raiz']."/__BDM/model/Aviso.php";
        ?>
        <script src="/__BDM/resources/js/main.js"></script>
    </head>
    <body>
        <?php include $_SESSION['raiz']."/__BDM/resources/php/header.php"; ?>
        <div class="superContainer">
            <div class="leftSkyscraper">
                <?php include $_SESSION['raiz']."/__BDM/resources/php/categories.php"; ?>
            </div>
            <div class="centerSkyscraper">
                <div class="superAds">
                    <div class="adHeader">
                        <div class="headerImagen">Imagen</div>
                        <div class="headerDescripcion" >Descripcion</div>
                        <div class="headerPrecio" >Precio</div>
                        <div class="headerNickname" >Vendedor</div>
                        <div class="headerFecha" >Fecha</div>
                        <div class="headerHora" >Hora</div>
                    </div>
                    <div class="adsContainer">
                        <?php
                            $avisos = null;
                            if(isset($_SESSION['aviso'])) {
                                $avisos = unserialize($_SESSION['aviso']);
                                unset($_SESSION['aviso']);
                            } else {
                                $avisos = unserialize($_SESSION['default']);
                            }

                            if (count($avisos) == 0) {
                        ?>
                                <div class='noResultAd'>Sin resultados <div class='btn returnBtn' id='returnBtn'>Cargar avisos Recientes</div> </div>
                        <?php
                            }
                            foreach($avisos as $aviso) {
                                if(file_exists ( $aviso->getPathThumbnail() )) {
                                    $url = $aviso->getPathThumbnail();
                                } else {
                                    $url = "/__BDM/img/404/dino.png";
                                }
                        ?>
                                <div class="ad" idAviso="<?php echo $aviso->getIdAviso(); ?>">
                                    <div class="imagen">
                                        <img class="adImagen" src="<?php echo $url; ?>" alt="<?php echo $url; ?>"/>
                                    </div>
                                    <div class="descripcion">
                                        <div class="adDescripcion"><?php echo $aviso->getDescripcionAviso(); ?></div>
                                    </div>
                                    <div class="precio">
                                        <div class="adPrecio"><?php echo $aviso->getPrecioAviso(); ?></div>
                                    </div>
                                    <div class="nickname">
                                        <div class="adNickname"><?php echo $aviso->getUsuarioAviso(); ?></div>
                                    </div>
                                    <div class="fecha">
                                        <div class="adFecha"><?php echo $aviso->getFechaAviso(); ?></div>
                                    </div>
                                    <div class="hora">
                                        <div class="adHora"><?php echo $aviso->getHoraAviso(); ?></div>
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
    </body>
</html>