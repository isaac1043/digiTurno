<!DOCTYPE html>
<html>
<head>
    <title>Resultados de la Consulta</title>
</head>
<body>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Observación</th>
    </tr>
    
    <?php
    //DEFINICION DE CREDENCIALES PARA LA BASE DE DATOS
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME  = 'isaac';
// CONEXION A LA BASE DE DATOS
$apto = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($apto->connect_errno) {
    echo "Fallo al conectarce con la base de datos  usando MySQL" . $apto->connect_error;     //el punto se usa para unir o concatenar
} else {
    echo "Conexión exitosa a la base de datos.<br>";
}
$result = $apto->query("SELECT * FROM tipo_turno");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["tt__id"] . "</td>";
            echo "<td>" . $row["tt_nombre"] . "</td>";
            echo "<td>" . $row["tt_fecha"] . "</td>";
            echo "<td>" . $row["tt_obs"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>0 resultados</td></tr>";
    }
    ?>
</table>

</body>
</html>

 


