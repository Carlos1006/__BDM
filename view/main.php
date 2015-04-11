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
                            foreach($avisos as $aviso) {
                        ?>
                                <div class="ad" idAviso="<?php echo $aviso->getIdAviso(); ?>">
                                    <div class="imagen">
                                        <img class="adImagen" src="<?php echo $aviso->getPathThumbnail(); ?>"/>
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
                        <div class="ad" idAviso="1">
                            <div class="imagen">
                                <img class="adImagen" src="http://guiamexico.com.mx/Imagenes/b/201139757-1-refri-mar.jpeg"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Refrigerador plateado nuevo, sin abrir.</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">5000.00</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">Naker21</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">06/Octubre/2015</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">15:38:65</div>
                            </div>
                        </div>
                        <div class="ad" idAviso="2">
                            <div class="imagen">
                                <img class="adImagen" src="http://www.listofimages.com/wp-content/uploads/2013/08/mitsubishi-lancer-evo-x-red-car.jpg"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Automovil seminuevo, poco kilometraje.</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">135000.50</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">Daniel1911</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">13/Marzo/2011</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">21:58:02</div>
                            </div>
                        </div>

                        <div class="ad" idAviso="3">
                            <div class="imagen">
                                <img class="adImagen" src="http://core0.staticworld.net/images/article/2013/05/microsoft_sculpt_mobile_mouse_left_2013-100038808-orig.jpg"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Mouse marca microsoft.</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">375.80</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">Carlos0694</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">15/Septiembre/1970</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">03:30:45</div>
                            </div>
                        </div>

                        <div class="ad" idAviso="4">
                            <div class="imagen">
                                <img class="adImagen" src="http://www.kiabi.es/images/camisa-de-algodon-de-sarga-con-acabado-a-contraste-uva-joven-nino-et591_2_zc1.jpg"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Camisa casual color morado, talla chica.</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">850.50</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">Wawawiwa1234</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">01/Enero/2000</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">03:30:42</div>
                            </div>
                        </div>

                        <div class="ad" idAviso="5">
                            <div class="imagen">
                                <img class="adImagen" src="http://s3.amazonaws.com/rapgenius/filepicker%2F5jTDmubSTnCREE8BIe5w_nike_shoes.jpg"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Tennis nike color negro.</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">1000.00</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">TennisNike1595</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">18/Mayo/2005</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">01:00:00</div>
                            </div>
                        </div>

                        <div class="ad" idAviso="6">
                            <div class="imagen">
                                <img class="adImagen" src="http://images.amazon.com/images/G/01/electronics/apple/apple-imac2011_q2-270-main-lg.jpg"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Computadora iMac seminueva.</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">35000</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">Daniel1234</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">05/Octubre/2015</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">00:05:35</div>
                            </div>
                        </div>

                        <div class="ad" idAviso="7">
                            <div class="imagen">
                                <img class="adImagen" src="http://img2.wikia.nocookie.net/__cb20110624182104/eldragonverde/es/images/1/15/Anillo_unico.jpg"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Anillo unico de suaron (autentico).</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">15000.68</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">Sauron818</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">27/Noviembre/2011</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">15:05:05</div>
                            </div>
                        </div>

                        <div class="ad" idAviso="8">
                            <div class="imagen">
                                <img class="adImagen" src="http://media4.liverpool.com.mx/web/images/products/es_MX/xl/1012231535.jpg"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Reloj de pulsera a prueba de agua.</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">250.00</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">CarlosDGZZ</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">05/Diciembre/2011</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">17:22:23</div>
                            </div>
                        </div>

                        <div class="ad" idAviso="9">
                            <div class="imagen">
                                <img class="adImagen" src="http://store.storeimages.cdn-apple.com/4134/as-images.apple.com/is/image/AppleInc/aos/published/images/i/ph/iphone6/plus/iphone6-plus-box-silver-2014_GEO_EMEA_LANG_EN?wid=478&hei=595&fmt=png-alpha&qlt=95&.v=1410266281976"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Celular iPhone 6 completamente nuevo.</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">12000</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">EstevanTrabajos159</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">01/Septiembre/2014</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">03:25:42</div>
                            </div>
                        </div>

                        <div class="ad" idAviso="10">
                            <div class="imagen">
                                <img class="adImagen" src="http://store.storeimages.cdn-apple.com/4134/as-images.apple.com/is/image/AppleInc/aos/published/images/i/ph/iphone6/plus/iphone6-plus-box-silver-2014_GEO_EMEA_LANG_EN?wid=478&hei=595&fmt=png-alpha&qlt=95&.v=1410266281976"/>
                            </div>
                            <div class="descripcion">
                                <div class="adDescripcion">Celular iPhone 6 seminuevo.</div>
                            </div>
                            <div class="precio">
                                <div class="adPrecio">10000</div>
                            </div>
                            <div class="nickname">
                                <div class="adNickname">QuinientosDos502</div>
                            </div>
                            <div class="fecha">
                                <div class="adFecha">05/Febereo/2013</div>
                            </div>
                            <div class="hora">
                                <div class="adHora">23:00:11</div>
                            </div>
                        </div>
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