<?php

class Usuario{
    var $idUsuario;
    var $emailUsuario;
    var $passwordUsuario;
    var $nicknameUsuario;
    var $apellidoUsuario;
    var $nombreUsuario;
    var $telefonoUsuario;
    var $avatarUsuario;
    var $confirmadoUsuario;
    var $activoUsuario;
    
    function __construct($email,$password,$nickname,$apellido,$nombre,$telefono,$avatar,$confirmado,$activo){
        $this->emailUsuario         = $email;
        $this->passwordUsuario      = $password;
        $this->nicknameUsuario      = $nickname;
        $this->apellidoUsuario      = $apellido;
        $this->nombreUsuario        = $nombre;
        $this->telefonoUsuario      = $telefono;
        $this->avatarUsuario        = $avatar;
        $this->confirmadoUsuario    = $confirmado;
        $this->activoUsuario        = $activo;
    }
    
    function __construct($id,$email,$password,$nickname,$apellido,$nombre,$telefono,$avatar,$confirmado,$activo){
        $this->idUsuario            = $id;
        $this->emailUsuario         = $email;
        $this->passwordUsuario      = $password;
        $this->nicknameUsuario      = $nickname;
        $this->apellidoUsuario      = $apellido;
        $this->nombreUsuario        = $nombre;
        $this->telefonoUsuario      = $telefono;
        $this->avatarUsuario        = $avatar;
        $this->confirmadoUsuario    = $confirmado;
        $this->activoUsuario        = $activo;
    }
    
    function getIdUsuario           (){ return $this->idUsuario;         }
    function getEmailUsuario        (){ return $this->emailUsuario;      }
    function getPasswordUsuario     (){ return $this->passwordUsuario;   }
    function getNicknameUsuario     (){ return $this->nicknameUsuario;   }
    function getApellidoUsuario     (){ return $this->apellidoUsuario;   }
    function getNombreUsuario       (){ return $this->nombreUsuario;     }
    function getTelefonoUsuario     (){ return $this->telefonoUsuario;   }
    function getAvatarUsuario       (){ return $this->avatarUsuario;     }
    function getConfirmadoUsuario   (){ return $this->confirmadoUsuario; }
    function getActivoUsuario       (){ return $this->activoUsuario;     }
    function getUsuario             (){ return $this; }
}

?>