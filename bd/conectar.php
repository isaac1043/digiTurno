<?php
//DEFINICION DE CREDENCIALES PARA LA BASE DE DATOS
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME  = 'digi2023';
// CONEXION A LA BASE DE DATOS
$apto = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($apto->connect_errno) {
    echo "Fallo al conectarce con la base de datos  usando MySQL" . $apto->connect_error;     //el punto se usa para unir o concatenar
} else {
    echo "Conexión exitosa a la base de datos.";
}
