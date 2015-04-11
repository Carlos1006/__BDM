<?php

    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/model/Busqueda.php";
    include_once $_SERVER["DOCUMENT_ROOT"]."/__BDM/DAO/mysql.php";

    $post = isset( $_POST["set"] );
    $get  = isset( $_GET["set"]  );

    if($post) {
        busquedaAvanzada();
    } else if ($get) {
        busqueda();
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
        //getAvisosAvanzada()
    }

    function busqueda() {
        if(isset($_GET["barra"])) {
            $busqueda = new Busqueda();
            $busqueda->setBarraBuscadora($_GET["barra"]);
            //getAvisosBusqueda()
        } else if($_GET["top"]) {
            $busqueda = new Busqueda();
            $busqueda->setTop($_GET["top"]);
            //getAvisosTop()
        }
    }

?>