<!DOCTYPE HTML>
<html>
    <head>
        <?php 
                session_start();
                include $_SESSION['raiz']."/__BDM/resources/php/include.php"; 
        ?>
        <script src="/__BDM/resources/js/ad.js"></script>
        <title>Product</title>
    </head>
    <body>
        <?php   include $_SESSION['raiz']."/__BDM/resources/php/header.php";
                include_once $_SESSION['raiz']."/__BDM/model/Producto.php";
                include_once $_SESSION['raiz']."/__BDM/model/Imagen.php";
                include_once $_SESSION['raiz']."/__BDM/model/Video.php";
                $producto = new Producto(null,null,null,null,null,null,null,null,null,null);
                if($_SESSION["productoVer"]) {
                    $producto = unserialize($_SESSION["productoVer"]);
                }
        ?>
        <div class="superContainer">
            <div class="leftSkyscraper">
                <?php include $_SESSION['raiz']."/__BDM/resources/php/categories.php"; ?>
            </div>
            <div class="centerSkyscraper">
                <div class="superProduct">
                    
                    <div class="mainTitleProduct">
                        <?php echo $producto->getNombreProducto(); ?>
                    </div>
                    <div class="infoProduct">
                        <div class="descriptionProduct_1">
                            <div class="priceProduct"><?php echo number_format($producto->getPrecioProducto()); ?></div>
                            <div class="descriptionProduct"><?php echo $producto->getDescripcionProducto(); ?></div>
                            <div class="dateProduct"><?php echo $producto->getVigenciaProducto(); ?></div>
                            <div class="stockProduct">
                                <div class="stockTitleProduct">Existencia</div>
                                <div class="stockQuantityProduct"><?php echo $producto->getExistenciaProducto(); ?></div>
                            </div>
                        </div>
                        <div class="mediaProduct">
                            <div class="slideshowContainer">
                                <div class="slideshow">
                                    <div class="absoluteSlide">
                                        <?php
                                            foreach($producto->getImagenesProducto() as $imagen) {
                                                if($imagen->getIdImagen() != 0) {
                                        ?>
                                                    <div class="media">
                                                        <img class="mediaSrc" src="<?php echo $imagen->getPathImagen(); ?>"/>
                                                    </div>
                                        <?php
                                                }
                                            }
                                            foreach($producto->getVideosProducto() as $video) {
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
                        
                    </div>
                    <div class="longDescriptionContainer">
                        <?php echo $producto->getCaracteristicaProducto(); ?>
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