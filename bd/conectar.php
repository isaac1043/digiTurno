<?php
//DEFINICION DE CREDENCIALES PARA LA BASE DE DATOS
$DB_HOST = ' localhost ';
$DB_USER = 'root@localhost';
$DB_PASS = '';
$DB_NAME  = '';
// CONEXION A LA BASE DE DATOS
$apto = new mysqli($DB_HOST, $DB_USER,$DB_PASS,$DB_NAME)     // con el new se crea un nuevo objeto 
if($apto->connect_errno){
    echo"Fallo al conectarce con la base de datos  usando MySQL".$apto->connect->error;      //el punto se usa para unir o concatenar
}
?>
```