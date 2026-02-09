<?php
include 'conn.php';
$accion = $_POST["accion"] ?? 0;

$apellido = $_COOKIE['apellidos'] ?? 0;
$rol = $_COOKIE['rol'] ?? 0;
$usuario = $_COOKIE['nombre'] ?? 0;
$id_usuario = $_COOKIE['id_usuario'] ?? 0;

$id_just = $_POST['id_just'] ?? 0;
$estatus = $_POST['estatus'] ?? 0;
$comentarios = $_POST['comentarios'] ?? 0;
$comentariosD = $_POST['comentariosD'] ?? 0;
/*---------------------------------------------------------------------------------------*/

//Llenar tabla Mis justificantes Practicantes
    
    if($accion == 'llenaTablaMisJust'){
        
        //ROL administrador
        if($_COOKIE['rol']== 0){
            $sqlllenaTablaMisJust = "SELECT CONCAT(U.nombre, ' ', U.apellidos) as usuario, U.id_usuario, J.fecha_solicitud, J.descripcion, J.fecha_inicio ,J.fecha_fin, J.estatus ,J.tipo, J.id
                                     FROM justificantes J
                                     INNER JOIN usuarios U ON J.id_usuario = U.id_usuario 
                                     ORDER BY J.id DESC";
        }
        
        //ROL jefe de area
        else if($_COOKIE['rol']== 1){
            $sqlllenaTablaMisJust = "SELECT CONCAT(U.nombre, ' ', U.apellidos)as usuario, U.id_usuario, U.id_area, J.fecha_solicitud, J.descripcion, J.fecha_inicio ,J.fecha_fin, J.estatus ,J.tipo, J.id
                                     FROM justificantes J
                                     INNER JOIN usuarios U ON J.id_usuario = U.id_usuario
                                     WHERE U.id_area  IN (
                                     SELECT U.id_area
                                     FROM usuarios
                                     WHERE id_usuario = ".$_COOKIE['id_usuario'].")
                                     AND U.rol != 0
                                     ORDER BY J.id DESC";
        }
        
        //ROL practicante
        else if($_COOKIE['rol']== 2){
            $sqlllenaTablaMisJust = "SELECT CONCAT(U.nombre, ' ', U.apellidos)as usuario, U.id_usuario, J.fecha_solicitud, J.descripcion, J.fecha_inicio ,J.fecha_fin, J.estatus ,J.tipo, J.id
                                     FROM justificantes J
                                     INNER JOIN usuarios U ON J.id_usuario = U.id_usuario
                                     WHERE U.id_usuario = $id_usuario
                                     ORDER BY J.id DESC";
        }
        
        $resllenaTablaMisJust = $conn->query($sqlllenaTablaMisJust);
       
        // Crear un array para almacenar los resultados
        $registros = []; 
        while ($rowllenaTablaMisJust = $resllenaTablaMisJust->fetch_assoc()) {
            $registros [] = array(
                'id' => $rowllenaTablaMisJust["id"],
                'usuario' => $rowllenaTablaMisJust["usuario"],
                'fecha_solicitud' => $rowllenaTablaMisJust["fecha_solicitud"],
                'tipo' => $rowllenaTablaMisJust["tipo"],
                'periodo' => $rowllenaTablaMisJust["periodo"],
                'descripcion' => $rowllenaTablaMisJust["descripcion"],
                'estatus' => $rowllenaTablaMisJust["estatus"],
                'fecha_inicio' => $rowllenaTablaMisJust["fecha_inicio"],
                'fecha_fin' => $rowllenaTablaMisJust["fecha_fin"]
                
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($registros);
    }

//Estatus del Justificante
    if($accion == 'respuestaJust'){ 
        $coment = $comentarios.$comentariosD;
        
        if($estatus == 'Aprobado'){
            $sql = "UPDATE justificantes SET estatus = 'Aprobado', comentarios = '$coment' WHERE id =$id_just"; 
            echo "La consulta SQL está siendo ejecutada...";
        }
        else if($estatus == 'Denegado'){
            $sql = "UPDATE justificantes SET estatus = 'Denegado', comentarios = '$coment' WHERE id =$id_just";
        }
            if ($conn->query($sql)) {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>swal("¡Tu solicitud fue procesada con éxito!", " ", "success");</script>';
                echo '<script>window.location.assign("ver_just.php?id='.$id_just.'")</script>';
            } else {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>swal("¡Tu solicitud fue procesada con éxito!", " ", "success");</script>';
                echo '<script>window.location.assign("mis_just.php")</script>';
            }
    }

//Llenar datos para "Ver Justificante"
    if($accion == "llenaDatosJust"){
        
        $sql_ver_just = "SELECT J.id, J.id_usuario, J.descripcion, J.comentarios, J.fecha_inicio, J.fecha_fin, J.fecha_solicitud, J.tipo, J.estatus, U.nombre, U.apellidos
                         FROM justificantes J
                         INNER JOIN usuarios U ON J.id_usuario = U.id_usuario 
                         WHERE id = $id_just";      
                         
        $result = $conn->query($sql_ver_just);
        
        $registros = [];
        while ($rowllenaTablaMisJust = $result->fetch_assoc()) {
            $registros [] = array(
                'id' => $rowllenaTablaMisJust["id"],
                'id_usuario' => $rowllenaTablaMisJust["id_usuario"],
                'fecha_inicio' => $rowllenaTablaMisJust["fecha_inicio"],
                'fecha_fin' => $rowllenaTablaMisJust["fecha_fin"],
                'fecha_solicitud' => $rowllenaTablaMisJust["fecha_solicitud"],
                'tipo' => $rowllenaTablaMisJust["tipo"],
                'comentarios' => $rowllenaTablaMisJust["comentarios"],
                'descripcion' => $rowllenaTablaMisJust["descripcion"],
                'estatus' => $rowllenaTablaMisJust["estatus"],
                'nombre' => $rowllenaTablaMisJust["nombre"],
                'apellidos' => $rowllenaTablaMisJust["apellidos"]
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($registros);
    }
?>