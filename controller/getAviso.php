<?php
    session_start();
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Busqueda.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/avisoDAO.php";
    $_SESSION['aviso'] = null;
    $post = isset( $_POST["set"] );
    $get  = isset( $_GET["set"]  );
    $get2 = isset( $_GET["idSubcategoria"]  );

    if($post) {
        busquedaAvanzada();
    } else if ($get) {
        busqueda();
    } else if ($get2) {
        busquedaSubcategoria();
    }

    function busquedaAvanzada() {
        $texto        = mysql::verifySet( $_POST["texto"]        );
        $fecha        = mysql::verifySet( $_POST["fecha"]        );
        $nickname     = mysql::verifySet( $_POST["nickname"]     );
        $fechaRango1  = mysql::verifySet( $_POST["fechaRango1"]  );
        $fechaRango2  = mysql::verifySet( $_POST["fechaRango2"]  );
        $precioRango1 = mysql::verifySet( $_POST["precioRango1"] );
        $precioRango2 = mysql::verifySet( $_POST["precioRango2"] );

        $busqueda  = new Busqueda();
        $busqueda->setAvanzada($texto,$fecha,$nickname,array($fechaRango1,$fechaRango2),array($precioRango1,$precioRango2));
        $_SESSION['aviso'] = serialize(avisoDao::getAvisosBusquedaAvanzada($busqueda));
    }

    function busqueda() {
        if(isset($_GET["barra"])) {
            $busqueda = new Busqueda();
            $busqueda->setBarraBuscadora($_GET["barra"]);
            $_SESSION['aviso'] = serialize(avisoDao::getAvisosBusqueda($busqueda));
        } else if($_GET["top"]) {
            $busqueda = new Busqueda();
            $busqueda->setTop($_GET["top"]);
            $_SESSION['aviso'] = serialize(avisoDao::getAvisosTop($busqueda));
        }
    }

    function busquedaSubcategoria() {
        if(isset($_GET["idSubcategoria"])) {
            $busqueda = new Busqueda();
            $busqueda->setIdSubcategoria($_GET["idSubcategoria"]);
            $_SESSION['aviso'] = serialize(avisoDao::getAvisosSubcategoria($busqueda));
        }
    }
    //var_dump(unserialize($_SESSION['aviso']));
    header('Location: /__BDM/view/main.php');
?>