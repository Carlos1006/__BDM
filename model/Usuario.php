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
    
    public function setIdUsuario($id){
        $this->idUsuario            = $id;
    }
    
    public function getIdUsuario           (){ return $this->idUsuario;         }
    public function getEmailUsuario        (){ return $this->emailUsuario;      }
    public function getPasswordUsuario     (){ return $this->passwordUsuario;   }
    public function getNicknameUsuario     (){ return $this->nicknameUsuario;   }
    public function getApellidoUsuario     (){ return $this->apellidoUsuario;   }
    public function getNombreUsuario       (){ return $this->nombreUsuario;     }
    public function getTelefonoUsuario     (){ return $this->telefonoUsuario;   }
    public function getAvatarUsuario       (){ return $this->avatarUsuario;     }
    public function getConfirmadoUsuario   (){ return $this->confirmadoUsuario; }
    public function getActivoUsuario       (){ return $this->activoUsuario;     }
    public function getUsuario             (){ return $this; }
}

?>