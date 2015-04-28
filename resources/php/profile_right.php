<div class="superInfo" id="superShowProfile">
    <?php
        if(isset($_SESSION["sesion"])) {
            $usuario = unserialize($_SESSION["sesion"]);
    ?>
            <div id="usuarioActivo" style="display:none;"><?php echo $usuario->getIdUsuario();?></div>
            <div class="infoHeader">
                <?php echo $usuario->getNicknameUsuario(); ?>
            </div>
            <div class="infoImage">
                <img class="infoImageSrc"
                     src="data:image/png;base64,<?php echo $usuario->getAvatarUsuario();?>"/>
            </div>
            <div class="infoContainer">
                <div class="infoHead name">Nombre</div>
                <div class="infoBody"><?php echo $usuario->getNombreUsuario(); ?></div>
            </div>
            <div class="infoContainer">
                <div class="infoHead last">Apellido</div>
                <div class="infoBody"><?php echo $usuario->getApellidoUsuario(); ?></div>
            </div>
            <div class="infoContainer">
                <div class="infoHead email">E-mail</div>
                <div class="infoBody"><?php echo $usuario->getEmailUsuario(); ?></div>
            </div>
            <div class="infoContainer">
                <div class="infoHead phone">Telefono</div>
                <div class="infoBody"><?php echo $usuario->getTelefonoUsuario(); ?></div>
            </div>
    <?php
        } else {
    ?>
            <div id="usuarioActivo" style="display:none;">0</div>
            <div class="infoHeader">
                Usuario Anonimo
            </div>
            <div class="infoImage">
                <img class="infoImageSrc"
                     src="/__BDM/img/icons/no-user.png"/>
            </div>
            <div class="infoContainer">
                <div class="infoHead name">Nombre</div>
                <div class="infoBody">Anonimo</div>
            </div>
            <div class="infoContainer">
                <div class="infoHead last">Apellido</div>
                <div class="infoBody">Anonimo</div>
            </div>
            <div class="infoContainer">
                <div class="infoHead email">E-mail</div>
                <div class="infoBody">no_mail@anon.com</div>
            </div>
            <div class="infoContainer">
                <div class="infoHead phone">Telefono</div>
                <div class="infoBody">0000000000</div>
            </div>
    <?php
        }
    ?>
</div>