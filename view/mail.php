<!DOCTYPE HTML>
<html>
    <head>
        <title>Aviso</title>
        <?php  
                session_start();
                include $_SESSION['raiz']."/__BDM/resources/php/include.php";
                if(isset($_SESSION['insercion'])) {
                    $mensaje = $_SESSION['insercion'];
                    unset($_SESSION['insercion']);
                } else {
                    $mensaje = 500;
                }
        ?>
        <script src="/__BDM/resources/js/mail.js" ></script>
    </head>
    <body>
        <?php include $_SESSION['raiz']."/__BDM/resources/php/header.php"; ?>
        <div class="superContainer">
            <div class="leftSkyscraper">
                <?php include $_SESSION['raiz']."/__BDM/resources/php/categories.php"; ?>
            </div>
            <div class="centerSkyscraper">
                <div class="superMessage">
                    <div class="messageHeader">
                        <div class="headerMessage">Aviso</div>
                    </div>
                    <div class="messageContainer">
                        <?php
                            if ($mensaje == 1) {
                        ?>
                                <div class='messageAd'>
                                    Revisa tu email para confirmar tu nuevo usuario!.
                                    <div class='btn goToMainBtn' id='goToMain'>
                                        Cargar avisos Recientes
                                    </div>
                                    <div class='btn countToRefresh' id='countToRefresh'>
                                        10
                                    </div>
                                </div>
                                <div class='messageAd'>
                                    <div class='btn goToMail' url="https://accounts.google.com/ServiceLogin">
                                        <img src="/__BDM/img/icons/gmail.png" class="btnMailImage">
                                    </div>
                                    <div class='btn centerMailBtn goToMail' url="http://www.outlook.com">
                                        <img src="/__BDM/img/icons/outlook.png" class="btnMailImage">
                                    </div>
                                    <div class='btn goToMail' url="http://www.ymail.com">
                                        <img src="/__BDM/img/icons/yahoo.png" class="btnMailImage">
                                    </div>
                                </div>
                        <?php
                            }else if($mensaje == 0) {
                        ?>
                                <div class='messageAd'>
                                    El usuario no pudo crearse, trata mas tarde.
                                    <div class='btn goToMainBtn' id='goToMain'>
                                        Cargar avisos Recientes
                                    </div>
                                    <div class='btn countToRefresh' id='countToRefresh'>
                                        10
                                    </div>
                                </div>
                        <?php
                            }else if($mensaje == 2) {
                        ?>
                                <div class='messageAd'>
                                    Usuario confirmado correctamente.
                                    <div class='btn goToMainBtn' id='goToMain'>
                                        Cargar avisos Recientes
                                    </div>
                                    <div class='btn countToRefresh' id='countToRefresh'>
                                        10
                                    </div>
                                </div>
                        <?php
                            }else if($mensaje == 3) {
                        ?>
                                <div class='messageAd'>
                                    La confirmacion del usuario fallo.
                                    <div class='btn goToMainBtn' id='goToMain'>
                                        Cargar avisos Recientes
                                    </div>
                                    <div class='btn countToRefresh' id='countToRefresh'>
                                        10
                                    </div>
                                </div>
                        <?php
                            } else{
                        ?>
                                <div class='messageAd'>
                                    <div class='btn goToMainBtn' id='goToMain'>
                                        Cargar avisos Recientes
                                    </div>
                                    <div class='btn countToRefresh' id='countToRefresh'>
                                        10
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="rightSkyscraper">
                <div class="superInfo"></div>
            </div>
            <div class="errorBox"></div>
        </div>
        <div class="errorBox">
                <div class="superError"></div>
        </div>
    </body>
</html>