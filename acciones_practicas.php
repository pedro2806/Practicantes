<?php
include 'conn.php';
$accion = $_POST["accion"];

$id_UScookie = $_COOKIE["id_usuario"];

//Tabla de CHECADOR
$entrada = $_POST["entrada"] ?? null;
$salida = $_POST["salida"] ?? null;
$id_usuario = $_POST["usuario"] ?? null;
$fecha = $_POST["fRegistro"] ?? null;
$movimiento = $_POST["movimiento"] ?? null;

//Tabla Actividades
$actividad = $_POST["actividad"] ?? null;
$duracion = $_POST["duracion"] ?? null;
$hrs_completas = $_POST["hrs_completas"] ?? null;
/*---------------------------------------------------------------------------------------*/

//Funcion para ENTRADA Y SALIDA
    if ($accion == 'chequeo') {

        $QUsuarios = "SELECT movimiento FROM checador WHERE id_usuario = $id_usuario ORDER BY fecha DESC LIMIT 1";
        $res2 = $conn->query($QUsuarios);
        $UltimoMovimiento = null;
        while ($row2 = $res2->fetch_assoc()) {
            $UltimoMovimiento = $row2["movimiento"];
        }
            $nr = mysqli_num_rows($res2);
            
            if ($nr == 1) {
                if($UltimoMovimiento == "entrada"){
                    $movimientoNuevo ="salida";
                }
                else{
                    $movimientoNuevo ="entrada";
                }
            } 
            else if ($nr  ==  0)
            {
                $movimientoNuevo ="entrada";
            }
            
        // validacion de movimiento
        if ($UltimoMovimiento === 'entrada') {
            $sql = "INSERT INTO checador (id_usuario, fecha, movimiento, id_entrada) 
                VALUES ('$id_usuario', '$fecha', '$movimientoNuevo', (SELECT MAX(ch.id) FROM checador ch WHERE ch.id_usuario = $id_usuario AND ch.movimiento = 'entrada'))";
        }else {
            $sql = "INSERT INTO checador (id_usuario, fecha, movimiento) 
                VALUES ('$id_usuario', '$fecha', '$movimientoNuevo')";
        }

        //registro de horasxdia al hacer salida
        if($movimientoNuevo === 'salida'){
                $fechaSalida = $fecha;
            $sqlc ="INSERT INTO horasxdia (id_usuario, fecha, total_hrs) 
                    VALUES ($id_usuario, NOW(), TIMESTAMPDIFF(MINUTE,(SELECT MAX(fecha) 
                    FROM checador 
                    WHERE id_usuario = $id_usuario AND movimiento = 'entrada'), '$fechaSalida')/60)";
                if ($conn->query($sqlc)) {
                    echo 'si ok';
                }
                else{ 
                    echo 'no ok';
                }       
        }
        
        if ($conn->query($sql)) {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>swal("¡Tu solicitud fue procesada con éxito!", " ", "success");</script>';
            echo '<script>window.location.assign("inicio.php")</script>';
        } else {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>swal("¡Tu solicitud fue procesada con éxito!", " ", "success");</script>';
            echo '<script>window.location.assign("inicio.php")</script>';
        }
} 
    
//TABLA HORARIO   
    if($accion == "llenaTablaHorario"){
        
        $sql = "SELECT DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, checador.id_usuario,
                       DATE_FORMAT(MIN(CASE WHEN LOWER(movimiento) = 'entrada' THEN fecha END), '%d-%m-%Y %H:%i:%s') AS primera_entrada,
                       DATE_FORMAT(MAX(CASE WHEN LOWER(movimiento) = 'salida' THEN fecha END), '%d-%m-%Y %H:%i:%s') AS ultima_salida,
                       u.nombre
                FROM checador
                INNER JOIN usuarios u ON checador.id_usuario = u.id_usuario
                WHERE u.id_usuario = $id_UScookie
                GROUP BY DATE(fecha), checador.id_usuario
                ORDER BY fecha, checador.id_usuario";
        
        $res2 = $conn->query($sql);      
        
                // Crear un array para almacenar los resultados
                $registros = [];
                while ($row2 = $res2->fetch_assoc()) {
                    
                    $registros[] = array(
                        'fecha' => $row2["fecha"],
                        'id_usuario' => $row2["id_usuario"],
                        'primera_entrada' => $row2["primera_entrada"],
                        'ultima_salida' => $row2["ultima_salida"],
                        'nombre' => $row2["nombre"],
                    );
                    
                }
                echo json_encode($registros);
    }
    
// Total de Horas
    if ($accion == 'total_horas') {
        
        $sql_horas = "SELECT ROUND (SUM(total_hrs),2) AS total_horas FROM horasxdia WHERE id_usuario = '$id_usuario'";
        $result_horas = $conn->query($sql_horas);

            $registros3 = [];
            while ($row3 = $result_horas->fetch_assoc()) {
                $registros3[] = array('total_horas' => $row3["total_horas"] ?? 0);

        }
        echo json_encode($registros3);
    }
    
//Bitacora
    if($accion == 'guardar_actividad'){
        
        $id_usuarioC = $_COOKIE['id'] ?? 0;
        $sqlActividades = "INSERT INTO actividades (id_usuario, actividad, fecha, duracion, estatus)
                           VALUES ('$id_usuarioC', '$actividad', NOW(), '$duracion', 'Pendiente')";
                           
        if ($conn->query($sqlActividades)) {
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>swal("¡Tu solicitud fue creada con éxito!", "", "success");</script>';
        }
    }
?>