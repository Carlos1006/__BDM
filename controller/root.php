<?php
    session_start();
    $_SESSION['raiz'] = $_SERVER["DOCUMENT_ROOT"]; 
    header('Location: /__BDM/view/main.php');
?>