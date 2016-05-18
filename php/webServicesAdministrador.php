<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Me permite realizar operaciones de un administrador a partir de una opcion
 * obtenida mediante un metodo Post
 * @author rous
 */
ob_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(E_ALL);
error_reporting(-1);
error_reporting(E_ALL | E_STRICT);
error_reporting(0);
ini_set('error_reporting', E_ALL);
require './Usuario.php';
require './class_imgUpldr.php';

$opcion = $_POST['salida'];

switch ($opcion) {
    //Login del usuario
    case 1:
        $email = $_POST[CORREO];
        $password = $_POST[PASSWORD1];
        $user = new Usuario();
        $user->conectar();
        $user->select_database();
        $resultado = mysqli_fetch_array($user->login($email, $password));
        if ($resultado['login'] != 0) {
            $id = $resultado['login'];
            header("Location: http://localhost/novabici/index.html#$id");
        } else {
            header('Location: http://localhost/novabici/login.html#errorLogin');
        }
        $user->close();
        break;

    //Registro de un Usuario
    case 2:
        $user = new Usuario();
        $user->conectar();
        $user->select_database();
        $user->set(NOMBRE, $_POST[NOMBRE]);
        $user->set(APELLIDO_PATERNO, $_POST[APELLIDO_PATERNO]);
        $user->set(APELLIDO_MATERNO, $_POST[APELLIDO_MATERNO]);
        $user->set(CORREO, $_POST[CORREO]);
        $user->set(TELEFONO, $_POST[TELEFONO]);
        $user->set(PASSWORD1, $_POST[PASSWORD1]);
        $resultado = $user->insertar();
        $user->close();
        if ($resultado != "0") {
            header('Location: http://localhost/novabici/login.html#registro');
        } else {
            header('Location: http://localhost/novabici/login.html#errorRegistro');
        }
        break;
    //registro de un producto
    case 4:
        $t_Productos = new Table(TABLA_PRODUCTOS);
        $t_Productos->conectar();
        $t_Productos->select_database();
        $t_Productos->set(NOMBRE, $_POST[NOMBRE]);
        $t_Productos->set(DESCRIPCION, $_POST[DESCRIPCION]);
        $t_Productos->set(PRECIO, $_POST[PRECIO]);
        $t_Productos->set(USUARIO_ID_USUARIO, (int) $_POST[USUARIO_ID_USUARIO]);
        $imagen = $_FILES['url'];
        $subir = new imgUpldr;
        $url = $subir->init($imagen, 'image/productos/');
        $t_Productos->set('url', URLHOST . $url);
        $t_Productos->insertar();
        $t_Productos->close();
        header('Location: http://localhost/novabici/proNot.html#productos');
        break;

    //obtengo el nombre del usuario
    case 5:
        $t_Productos = new Table(TABLA_PRODUCTOS);
        $t_Productos->conectar();
        $t_Productos->select_database();
        $query = 'select * from ' . $t_Productos->nombre_Table() . ';';
        $resultado = $t_Productos->query($query);
        $json = array();
        while ($row1 = mysqli_fetch_array($resultado)) {
            $json[] = [ID_PRODUCTO => $row1[ID_PRODUCTO],
                NOMBRE => utf8_encode($row1[NOMBRE]),
                DESCRIPCION => utf8_encode($row1[DESCRIPCION]),
                PRECIO => utf8_encode($row1[PRECIO]),
                USUARIO_ID_USUARIO => utf8_encode($row1[USUARIO_ID_USUARIO]),
                'url' => utf8_encode($row1['url'])];
        }
        echo json_encode(array_values($json));
        break;
    //agregar notificaion
    case 6:
        $t_Notificaciones = new Table(TABLA_NOTIFICACIONES);
        $t_Notificaciones->conectar();
        $t_Notificaciones->select_database();
        // `apPatCliente`, `apMatCliente`, `correo`, `telefono`, `mensaje`, `Productos_idProductos`
        $t_Notificaciones->set(NOMBRE_CLIENTES, $_POST[NOMBRE_CLIENTES]);
        $t_Notificaciones->set(APELLIDO_PATERNO_CLIENTE, $_POST[APELLIDO_PATERNO_CLIENTE]);
        $t_Notificaciones->set(APELLIDO_MATERNO_CLIENTE, $_POST[APELLIDO_MATERNO_CLIENTE]);
        $t_Notificaciones->set(CORREO, $_POST[CORREO]);
        $t_Notificaciones->set(TELEFONO, $_POST[TELEFONO]);
        $t_Notificaciones->set(MENSAJE, $_POST[MENSAJE]);
        $t_Notificaciones->set(PRODUCTOS_ID_PRODUCTOS, $_POST[PRODUCTOS_ID_PRODUCTOS]);
        $t_Notificaciones->insertar();
        $t_Notificaciones->close();
        break;
    case 7:
        $t_Notificaciones = new Table(TABLA_NOTIFICACIONES);
        $t_Notificaciones->conectar();
        $t_Notificaciones->select_database();
        $id= (int)$_POST['id'];
        $query = "SELECT N.nombreCliente, N.apPatCliente, N.apMatCliente, N.correo,N.telefono, N.mensaje, P.nombre
                    FROM Usuarios AS U, Productos AS P, Notificaciones AS N
                    WHERE U.idUsuarios= $id and U.idUsuarios = P.Usuarios_idUsuarios
                    AND P.idProductos = N.Productos_idProductos";
        $resultado = $t_Notificaciones->query($query);
        $json = array();
        while ($row1 = mysqli_fetch_array($resultado)) {
            $json[] = [NOMBRE_CLIENTES => utf8_encode($row1[NOMBRE_CLIENTES]),
                APELLIDO_PATERNO_CLIENTE => utf8_encode($row1[APELLIDO_PATERNO_CLIENTE]),
                APELLIDO_MATERNO_CLIENTE => utf8_encode($row1[APELLIDO_MATERNO_CLIENTE]),
                CORREO => utf8_encode($row1[CORREO]),
                TELEFONO => utf8_encode($row1[TELEFONO]),
                MENSAJE => utf8_encode($row1[MENSAJE]),
                NOMBRE => utf8_encode($row1[NOMBRE])];
        }
        echo json_encode(array_values($json));
        break;
}

ob_flush();

?>
