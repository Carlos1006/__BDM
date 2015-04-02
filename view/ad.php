<!DOCTYPE HTML>
<html>
    <head>
        <?php 
                session_start();
                include $_SESSION['raiz']."/__BDM/resources/php/include.php"; 
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
                            Electronicos&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="subcategorieAd">
                            Celulares
                        </div>
                    </div>
                    <div class="mainTitleAd">
                        iPhone 6 64Gb multiples colores.
                    </div>
                    <div class="infoAd">
                        <div class="mediaAd">
                            <div class="slideshowContainer">
                                <div class="slideshow">
                                    <div class="absoluteSlide">
                                        <div class="media">
                                            <img class="mediaSrc" src="http://images.nationalgeographic.com/wpf/media-live/photos/000/010/cache/messier-81_1086_600x450.jpg"/>
                                        </div>
                                        <div class="media">
                                            <img class="mediaSrc" src="http://www.ultimateuniverse.net/images/galaxy3.gif"/>
                                        </div>
                                        <div class="media">
                                            <img class="mediaSrc" src="http://www.esa.int/var/esa/storage/images/esa_multimedia/videos/2013/11/guide_to_our_galaxy/13409760-3-eng-GB/Guide_to_our_Galaxy_video_production_full.png"/>
                                        </div>
                                        <div class="media">
                                            <img class="mediaSrc" src="http://ewallpaperhub.com/wp-content/uploads/2015/01/galaxy-wallpaper-hd.jpg"/>
                                        </div>
                                    </div>
                                    <div class="rightSlide">&gt;</div>
                                    <div class="leftSlide">&lt;</div>
                                </div>
                            </div>
                        </div>
                        <div class="descriptionAd_1">
                            <div class="priceAd">12,000</div>
                            <div class="descriptionAd">iphone iphone iphone iphoneiphone iphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone</div>
                            <div class="dateAd">12/Octubre/2016</div>
                            <div class="buyAd">
                                <div class="stockAd">
                                    <div class="-Button_1">-</div>
                                    <div class="-stock"></div>
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
                        <input type="text" class="form-control questionAdInput" placeholder="Pregunta al vendedor..."/>
                        <div class="questionButton">Enviar Pregunta</div>
                    </div>
                    <div class="questionsContainer">
                        <div class="questionAd">
                            <div class="question">
                                De que color es?
                            </div>
                            <div class="answer">
                                Negro
                            </div>
                        </div>
                        <div class="questionAd">
                            <div class="question">
                                De que color es?
                            </div>
                            <div class="answer">
                                Negro
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