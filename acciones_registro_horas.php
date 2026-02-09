<?php
include 'conn.php';
$accion = $_POST["accion"] ?? 0;

$id_UScookie = $_COOKIE['id_usuario'] ?? 0;
$rol = $_COOKIE["rol"] ?? 0;

$id_usuario = $_POST["usuario"] ?? 0;
$dia= $_POST["dia"] ?? 0;
$entrada= $_POST["entrada"] ?? 0;
$salida= $_POST["salida"] ?? 0;
$homeoffice = isset($_POST['home_office']) ? intval($_POST['home_office']) : 0; //Se usa "intval()" para que el valor se interprete como un número entero
/*----------------------------------------------------------------------------*/
//Crear Horario
error_log("Datos recibidos: usuario=$id_usuario, dia=$dia, entrada=$entrada, salida=$salida, home_office=$homeoffice");

    if($accion == 'creaHorario'){
        
        // Validar si ya existe un horario para un mismo usuario
        $check_query = "SELECT * FROM horario WHERE id_usuario = '$id_usuario' AND dia = '$dia'";
        $check_result = $conn->query($check_query);
        
        if (mysqli_num_rows($check_result) > 0) {
            // Si ya existe el horario para el usuario
            echo "Existe";
        } else {
            // Si no existe,guarda el nuevo horario
            $sql_horarioNew = "INSERT INTO horario (id_usuario, dia, entrada, salida, home_office) 
                               VALUES ('$id_usuario', '$dia', '$entrada', '$salida', '$homeoffice')";
                               
            if ($conn->query($sql_horarioNew)) { 
                echo "NoExiste";
            } else {
                echo "NoSeGuardo";
            }
        }
    }
    
//Llenar tabla Horario
    
    if($accion == 'datosTablaHorario'){
        
        //ROL Administrador
        if($rol == 0){
            $sql_horario = "SELECT  DATE_FORMAT(SEC_TO_TIME(TIME_TO_SEC(salida) - TIME_TO_SEC(entrada)), '%H:%i') AS hrsxdia, h.*, 
                             (SELECT nombre 
                              FROM usuarios 
                              WHERE id_usuario = h.id_usuario) AS nombre                           
                              FROM horario h";
        }
        
        //ROL Jefe de Area
        else if($rol == 1){
            $sql_horario = "SELECT  DATE_FORMAT(SEC_TO_TIME(TIME_TO_SEC(salida) - TIME_TO_SEC(entrada)), '%H:%i') AS hrsxdia, h.*, CONCAT(u.nombre, ' ', u.apellidos) AS nombre, u.id_usuario, u.id_area
                            FROM horario h
                            INNER JOIN usuarios u ON u.id_usuario = h.id_usuario
                            WHERE u.id_area IN (
                                SELECT id_area
                                FROM usuarios
                                WHERE rol = 1)
                            ";
        }
        
        //ROL Usuario
        else if ($rol == 2) {
            $sql_horario = "SELECT  DATE_FORMAT(SEC_TO_TIME(TIME_TO_SEC(salida) - TIME_TO_SEC(entrada)), '%H:%i') AS hrsxdia, h.*, 
                                (SELECT u.nombre 
                                 FROM usuarios u 
                                 WHERE u.id_usuario = h.id_usuario) AS nombre                           
                            FROM horario h
                            WHERE id_usuario IN ('$id_cookie');
                             ";
        } 
        $result_horario = $conn->query($sql_horario);
       
        //Crear un arrreglo para almacenar los resultados
        $registros = [];
        while ($rowTablaHorario = $result_horario->fetch_assoc()) {
            $registros [] = array(

                'usuario' => $rowTablaHorario["nombre"],
                'dia' => $rowTablaHorario["dia"],
                'entrada' => $rowTablaHorario["entrada"],
                'salida' => $rowTablaHorario["salida"],
                'horas_completas' => $rowTablaHorario["hrsxdia"],
                'home_office' => $rowTablaHorario["home_office"],
            );
        }
        
        // Devolver los datos en formato JSON
        echo json_encode($registros);
    }
    
//Mostrar solo usuarios del mismo area
    
    if ($accion == 'cargarUsuarios'){
        
        //Administrador
        if ($rol == 0) { 
            $sql_usuario = "SELECT u.nombre AS nombre, u.id_usuario, u.id_area
                            FROM horario h
                            INNER JOIN usuarios u ON u.id_usuario = h.id_usuario
                            GROUP BY u.id_usuario";        
        }
        
        //Jefe de área
        elseif ($rol == 1) { 
            $sql_usuario = "SELECT u.nombre AS nombre, u.id_usuario, u.id_area
                            FROM horario h
                            INNER JOIN usuarios u ON u.id_usuario = h.id_usuario
                            WHERE u.id_area = (
                                SELECT id_area
                                FROM usuarios
                                WHERE id_usuario = '$id_UScookie')
                            GROUP BY u.id_usuario";
        }
        
        //Usuario 
        elseif ($rol == 2) { 
            $sql_usuario = "SELECT u.nombre AS nombre, u.id_usuario, u.id_area
                            FROM usuarios u
                            WHERE u.id_usuario = $id_UScookie";
        }
        
        $result_usuario = $conn->query($sql_usuario);
        
        $registros_usuario = [];
        while ($row_usuario = $result_usuario->fetch_assoc()) {
            $registros_usuario [] = array(
                'usuario' => $row_usuario["nombre"],
                'id_usuario' => $row_usuario["id_usuario"],
                'id_area' => $row_usuario["id_area"]
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($registros_usuario);
    }
?>