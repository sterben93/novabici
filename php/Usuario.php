<?php

require './Table.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author rous
 */


class Usuario extends Table {

    public function __construct() {
        parent::__construct(TABLA_USUARIO);
    }

    public function login($email, $password) {
        $login ="select idUsuarios as login  " .
                "from Usuarios " .
                "where correo='" . $email . "' and password='" . $password . "';";
        return $this->query($login);
    }

    /**
     * Me permite obtener el nombre del Usuario que acaba de iniciar sesion
     * @param type $user
     * @return type
     */
    public function nombreUsuario($user) {
        $query = "select concat(concat(concat(concat(Nombre, ' '), Apellido_Paterno),' '),Apellido_Materno) As Nombre_Completo " .
                "from Administradores " .
                "where idAdministrador='" . $user . "';";
        return $this->query(utf8_decode($query));
    }

}
