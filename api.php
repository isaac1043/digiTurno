<?php
include ('bd/conectar.php');
$metodo = $_SERVER['REQUEST_METHOD'];
//Prueba
switch ($metodo) {
        case 'GET':
            if (isset($_GET['OP']) && $_GET['OP'] != '') {
                $OP = $_GET['OP'];
                if ($OP == 'digi') {
                    $consulta = "SELECT tipo_turnos.tt_nombre AS modul, datos_digi.dd_turno FROM tipo_turnos INNER JOIN datos_digi ON tipo_turnos.tt_id = datos_digi.tt_id WHERE datos_digi.dd_atendido = 0";
                    $conect = mysqli_query($apto, $consulta);
                    $coleccion = mysqli_fetch_array($conect);
                    echo json_decode($coleccion)

                } else if ($OP == 'secret') {
                    $consulta = "SELECT dd_fecha_ing AS fecha, dd_hora_ing, dd_turno, dd_atendido FROM datos_digi WHERE dd_atendido = 0";
                }
            }
            break;
    case 'POST':
        if (isset($_POST['OP']) && $_POST['OP'] != '') {
            $OP = $_POST['OP'];
            if ($OP == 'tipo') {
                $tt = $_POST['tt'];
                $f = date("y-m-d");
                $h = date("h:i:s");
                $turno = "001";
                $consulta = "INSERT INTO datos_digi (dd_fecha_ing, dd_hora_ing, dd_turno, tt_id, dd_atendido) VALUES ('$f', '$h', '$turno', $tt, 0)";
            } 
        }
        break;

    case 'PUT':
        if (isset($_PUT['OP'])&& $_PUT['OP'] !='') {
            $OP = $_PUT['OP'];
            if ($OP == 'secre') {
                $iden = $_POST['identificacion'];
                $nombre = $_POST['nombre'];
                $email = $_POST['correo'];
                $tel = $_POST['telefono'];
                $consulta = "UPDATE datos_digi SET dd_nombre = '$nombre', dd_email = '$email', dd_cel = '$tel' WHERE dd_id = '$iden'";
            }             
        }
        break;
        case 'DELETE':
            if (isset($_DELETE['id']) && $_GET['id'] != '') {
                $idToDelete = $_GET['id'];
                $consulta = "DELETE FROM datos_digi WHERE dd_id = '$idToDelete'";
            } else {
                // Manejar el caso en el que no se proporciona el ID a eliminar
                $mensajeError = "No se proporcionó el ID para eliminar el registro.";
                // Puedes mostrar un mensaje de error, enviar una respuesta JSON, o cualquier otra acción que desees
                // Por ejemplo:
                echo json_encode(array("error" => $mensajeError));
                http_response_code(400); // Código de respuesta de error 400 Bad Request
            }
            break;
            case 'DELETE';
            $consulta ="DELETE FROM datos_digi;";
            $consulta2 = "DELETE FROM tipo_turno";
            break;
    default:
}
?>