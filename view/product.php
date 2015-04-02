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
        <?php include $_SESSION['raiz']."/__BDM/resources/php/header.php"; ?>
        <div class="superContainer">
            <div class="leftSkyscraper">
                <?php include $_SESSION['raiz']."/__BDM/resources/php/categories.php"; ?>
            </div>
            <div class="centerSkyscraper">
                <div class="superProduct">
                    
                    <div class="mainTitleProduct">
                        iPhone 6
                    </div>
                    <div class="infoProduct">
                        <div class="descriptionProduct_1">
                            <div class="priceProduct">12,000</div>
                            <div class="descriptionProduct">iphone iphone iphone iphoneiphone iphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone</div>
                            <div class="dateProduct">12/Octubre/2016</div>
                            <div class="stockProduct">
                                <div class="stockTitleProduct">Existencia</div>
                                <div class="stockQuantityProduct">15</div>
                            </div>
                        </div>
                        <div class="mediaProduct">
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
                        
                    </div>
                    <div class="longDescriptionContainer">
                        iphone iphone iphone iphoneiphone iphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone iphone iphone iphoneiphone
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