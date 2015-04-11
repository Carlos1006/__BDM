<?php
    include $_SESSION['raiz']."/__BDM/model/Categoria.php";
?>
<div class="superCategories">
    <?php
        $categorias = unserialize($_SESSION['categoria']);
        foreach($categorias as $categoria) {
            if($categoria->activoCategoria==1) {
    ?>
                <div idCategoria="<?php echo $categoria->getIdCategoria(); ?>" class="categorie"><?php echo $categoria->getNombreCategoria() ?></div>
    <?php
            }
        }
    ?>
</div>