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
                <img class="infoImageSrc_view toResize"
                     id="sessionImage"
                     src="data:image/png;base64,<?php echo $usuario->getAvatarUsuario();?>"
                     />
            </div>
            <div class="infoContainer">
                <div class="infoHead name">Nombre</div>
                <div class="infoBody" id="sessionName"><?php echo $usuario->getNombreUsuario(); ?></div>
            </div>
            <div class="infoContainer">
                <div class="infoHead last">Apellido</div>
                <div class="infoBody" id="sessionLast"><?php echo $usuario->getApellidoUsuario(); ?></div>
            </div>
            <div class="infoContainer">
                <div class="infoHead email">E-mail</div>
                <div class="infoBody" id="sessionEmail"><?php echo $usuario->getEmailUsuario(); ?></div>
            </div>
            <div class="infoContainer">
                <div class="infoHead phone">Telefono</div>
                <div class="infoBody" id="sessionPhone"><?php echo $usuario->getTelefonoUsuario(); ?></div>
            </div>
    <?php
        } else {
    ?>
            <div id="usuarioActivo" style="display:none;">0</div>
            <div class="infoHeader">
                Usuario Anonimo
            </div>
            <div class="infoImage">
                <img class="infoImageSrc_default toResize"
                     id="sessionImage"
                     src="/__BDM/img/icons/no-user.png"/>
            </div>
            <div class="infoContainer">
                <div class="infoHead name">Nombre</div>
                <div class="infoBody" id="sessionName">Anonimo</div>
            </div>
            <div class="infoContainer">
                <div class="infoHead last">Apellido</div>
                <div class="infoBody" id="sessionLast">Anonimo</div>
            </div>
            <div class="infoContainer">
                <div class="infoHead email">E-mail</div>
                <div class="infoBody" id="sessionEmail">no_mail@anon.com</div>
            </div>
            <div class="infoContainer">
                <div class="infoHead phone">Telefono</div>
                <div class="infoBody" id="sessionPhone">0000000000</div>
            </div>
    <?php
        }
    ?>
</div>