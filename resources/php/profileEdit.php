<div class="superInfo_edit" id="superEditProfile" style="display:none;">
    <?php
      if(isset($_SESSION["sesion"])) {
        $usuario = unserialize($_SESSION["sesion"]);
    ?>
        <form   class="formUsuarioEdicion" 
                id="editUserForm" 
                method="POST" 
                enctype="multipart/form-data" 
                action="/__BDM/controller/resetUsuario.php">
            <div id="usuarioActivoEdicion" style="display:none;"><?php echo $usuario->getIdUsuario();?></div>
            <div class="infoImageEdit">
                <img class="infoImageSrc_change toResize" src="data:image/png;base64,<?php echo $usuario->getAvatarUsuario();?>" />
            </div>
            <div class="infoContainer">
                <div class="infoHeadEdit nick">Nickname <div class="verifyUserEdit" id="vUNick"></div> </div>
                <div class="infoBodyEdit">
                    <input type="text" class="form-control userUpload" placeholder="nuevo nickname" id="uNick" name="updateNickname">
                </div>
            </div>

            <div class="infoContainer">
                <div class="infoHeadEdit image">Imagen <div class="verifyUserEdit" id="vUImage"></div> </div>
                <div class="infoBodyEdit">
                    <label class="fileInput fileInputUserUpload" for="file_7" id="label7">Archivo...</label>
                    <input type="file" name="file" id="file_7" number="7"/>
                </div>
            </div>

            <div class="infoContainer">
                <div class="infoHeadEdit name">Nombre <div class="verifyUserEdit" id="vUFirst"></div> </div>
                <div class="infoBodyEdit">
                    <input type="text" class="form-control userUpload" placeholder="nuevo nickname" id="uFirst" name="updateNombre">
                </div>
            </div>
            <div class="infoContainer">
                <div class="infoHeadEdit last">Apellido <div class="verifyUserEdit" id="vULast"></div> </div>
                <div class="infoBodyEdit">
                    <input type="text" class="form-control userUpload" placeholder="nuevo nickname" id="uLast" name="updateApellido">
                </div>
            </div>
            <div class="infoContainer">
                <div class="infoHead email">E-mail <div class="verifyUserEdit" id="vUEmail"></div> </div>
                <div class="infoBodyEdit">
                    <input type="text" class="form-control userUpload" placeholder="nuevo nickname" id="uEmail" name="updateEmail">
                </div>
            </div>
            <div class="infoContainer">
                <div class="infoHeadEdit phone">Telefono <div class="verifyUserEdit" id="vUPhone"></div> </div>
                <div class="infoBodyEdit">
                    <input type="text" class="form-control userUpload" placeholder="nuevo nickname" id="uPhone" name="updateTelefono">
                </div>
            </div>

            <div class="infoContainerExtra">
                <div class="infoHeadEdit password">Contraseña <div class="verifyUserEdit" id="vUPassword"></div> </div>
                <div class="infoBodyEditExtra">
                    <input type="password" class="form-control userUpload" placeholder="nueva contraseña" id="uPassword_1" name="updatePassword">
                </div>
                <div class="infoBodyEditExtra">
                    <input type="password" class="form-control userUpload" placeholder="repite contraseña" id="uPassword_2">
                </div>
            </div>

            <div class="actionEditUser">
                <div class="cancel" id="cancelNewUser">Cancelar</div>
                <div class="ok btn" id="okNewUser">Guardar</div>
            </div>
            <div class="actionEditUser">
                <div class="deleteUser" id="unsetUser">Dar de baja usuario</div>
            </div>
        </form>
    <?php
        }
    ?>
</div>