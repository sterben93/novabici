<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Este archivo PHP es para almacenar variables constantes relacionados con la base de datos de Centro de idiomas
 */
define('USER', "root");
define('HOST', "localhost");
define('PASSWORD', "archer93");
define('USE_DATABASE', "mydb");

/* Tabla del administrador */
define('TABLA_USUARIO', "Usuarios");
define('ID_USUARIO', "idUsuarios");
define('NOMBRE', "nombre");
define('APELLIDO_PATERNO', "apPat");
define('APELLIDO_MATERNO', "apMat");
define('CORREO', "correo");
define('TELEFONO', "telefono");
define('PASSWORD1', "password");

/* Tabla de idiomas */
define('TABLA_PRODUCTOS', "Productos");
define('ID_PRODUCTO', "idProductos");
define('DESCRIPCION', "descripcion");
define('PRECIO', "precio");
define('USUARIO_ID_USUARIO', "Usuarios_idUsuarios");

/* Tabla de Docentes */
define('TABLA_NOTIFICACIONES', "Notificaciones");
define('ID_NOTIFICACIONES', "idNotificaciones");
define('NOMBRE_CLIENTES', "nombreCliente");
define('APELLIDO_PATERNO_CLIENTE', "apPatCliente");
define('APELLIDO_MATERNO_CLIENTE', "apMatCliente");
define('MENSAJE', "mensaje");
define('PRODUCTOS_ID_PRODUCTOS', "Productos_idProductos");

define('URLHOST', "http://localhost/novabici/php/");
//define('', "");
//define('', "");
//define('', "");
//define('', "");
//define('', "");
//define('', "");
//define('', "");
//define('', "");
//define('', "");
//define('', "")
