<?php
    session_start();
    if(isset($_SESSION["sesion"])) {
        unset($_SESSION["sesion"]);
    }
    header('Location: /__BDM/view/main.php');
?>