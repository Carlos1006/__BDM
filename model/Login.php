<?php

class Login {

    var $usernameLogin = null;
    var $passwordLogin = null;
    var $emailLogin    = null;

    function __construct($password) {
        $this->passwordLogin = $password;
    }

    function setEmail($email) {
        $this->emailLogin = $email;
    }

    function setUsername($username) {
        $this->usernameLogin = $username;
    }

    function getUsernameLogin() { return $this->usernameLogin;  }
    function getPasswordLogin() { return $this->passwordLogin;  }
    function getEmailLogin()    { return $this->emailLogin;     }

}

?>