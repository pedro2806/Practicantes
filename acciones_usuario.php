<?php
header('Content-Type: application/json');
include 'conn.php';
$accion = $_POST["accion"];

//Tabla USUARIOS
$id_usuario = $_POST["usuario"];
$fecha = $_POST["fRegistro"];
$movimiento = $_POST["movimiento"];
$usuario = $_POST ["usuario"];
$nombre = $_POST["nombre"];
$apellidos_us = $_POST["apellidos"];
$id_area_us = $_POST["id_area"];
$correo_us = $_POST["correo"];
$tel_us = $_POST["telefono"];
$sexo = $_POST["sexo"];
$contrasena = $_POST["password"];
$rol = $_POST["rol"];
$hrs_completas = $_POST["hrs_completas"];
$inicio_p= $_POST['inicio_p'];
$fin_p = $_POST['fin_p'];
$id_escuela = $_POST['id_escuela'];
$estatus = $_POST['estatus'];
$nss = $_POST['nss'];
$rfc = $_POST['rfc'];
$curp = $_POST['curp']; 
$id_jefe = $_POST['id_jefe'];

$fechaAct=$_POST['fecha'];

$id_UScookie = $_COOKIE['id_usuario'];
$rol = $_COOKIE['rol'];

//Prueba AREA
$CDAREA = $_POST['CDAREA'];
$P_S = $_POST['P_S'];
$CDFAM = $_POST['CDFAM'];
$CDTIPO = $_POST['CDTIPO'];
$AREA = $_POST['AREA'];
/*----------------------------------------------------------------------------*/

//Crear Usuario
    if($accion == "nuevo_usuario"){
        
        $sql_registroUs= "INSERT INTO usuarios (nombre, apellidos, id_area, id_escuela, correo, telefono, sexo, usuario, password, rol, estatus, inicio_periodo, fin_periodo, nss, rfc, curp, id_jefe)
                  VALUES ('$nombre', '$apellidos_us', $id_area_us, $id_escuela, '$correo_us', '$tel_us', '$sexo', '$usuario', '$contrasena', '2', '1', '$inicio_p', '$fin_p', '$nss', '$rfc', '$curp', '$id_jefe')";
        $Registros = "";         
        
        if ($conn->query($sql_registroUs)) {
            $Registros = 'Registro exitoso';
        }else {
            $Registros = 'Error: ' . $conn->error;
        }
        echo json_encode($Registros);
    }
    
//MODIFICAR Usuario 
    if($accion == "guardarC") {
     
    $sqlmodificar_us = "UPDATE usuarios 
                        SET nombre = '$nombre', apellidos = '$apellidos_us', id_area = '$id_area_us', id_escuela = '$id_escuela', correo = '$correo_us', telefono = '$tel_us', sexo = '$sexo', nss = '$nss', rfc = '$rfc', curp = '$curp', id_jefe = '$id_jefe'
                        WHERE id_usuario='$id_usuario'";
    $resultmodificar_us = $conn->query($sqlmodificar_us);
        
    // Devolver los datos en formato JSON
    echo json_encode($resultmodificar_us);     
}

//Llebar Tabla Usuarios
    if($accion == "LlenarTablaUs"){
        
        //ROL administrador
        if($_COOKIE['rol']== 0){
            $sqlLlenarTabla = "SELECT id_usuario, nombre, apellidos, id_area, id_escuela, correo, telefono, hrs_completas
                               FROM usuarios
                               WHERE estatus = 1
                               ORDER BY id_usuario DESC"; 
        }
        
        //ROL jefe de area
        else if($_COOKIE['rol']== 1){
            $sqlLlenarTabla = "SELECT id_usuario, nombre, apellidos, id_area, id_escuela, correo, telefono, hrs_completas
                               FROM usuarios
                               WHERE estatus = 1 AND id_area =(
                                     SELECT id_area
                                     FROM usuarios
                                     WHERE id_usuario = ".$_COOKIE['id_usuario'].")";
        }
        $resultLlenarTabla = $conn->query($sqlLlenarTabla);
        
        // Crear un array para almacenar los resultados
        
        while ($rowllenaTabla = $resultLlenarTabla->fetch_assoc()) {
            $registros [] = array(
                'id_usuario' => $rowllenaTabla["id_usuario"],
                'nombre' => $rowllenaTabla["nombre"],
                'apellidos' => $rowllenaTabla["apellidos"],
                'id_area' => $rowllenaTabla["id_area"],
                'id_escuela' => $rowllenaTabla["id_escuela"],
                'correo' => $rowllenaTabla["correo"],
                'telefono' => $rowllenaTabla["telefono"],
                'hrs_completas' => $rowllenaTabla["hrs_completas"],  
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($registros);
    }
    
//Llenar Modal de Usuarios
    if($accion == "LlenarModal"){
        
        $sqlLlenarModal = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario ";
        $resultModal = $conn->query($sqlLlenarModal);
        
        $registros = [];
        while ($rowllenaTabla = $resultModal->fetch_assoc()) {
            $registros[] = array(
                'id_usuario' => $rowllenaTabla["id_usuario"],
                'nombre' => $rowllenaTabla["nombre"],
                'apellidos' => $rowllenaTabla["apellidos"],
                'id_area' => $rowllenaTabla["id_area"],
                'id_escuela' => $rowllenaTabla["id_escuela"],
                'id_jefe' => $rowllenaTabla["id_jefe"],
                'fin_periodo' => $rowllenaTabla["fin_periodo"],
                'correo' => $rowllenaTabla["correo"],
                'telefono' => $rowllenaTabla["telefono"], 
                );
        }
        echo json_encode($registros);
    }
    
//Llenar Tabla HorasXDía
    if($accion == "LlenarTablaHorasxDia"){
        
        $sqlActividades = "SELECT *
                           FROM horasxdia
                           WHERE id_usuario = $id_usuario
                           ORDER BY id DESC";   
        $resultActividades = $conn->query($sqlActividades);
        
        $registros = [];
        
        while ($rowAct = $resultActividades->fetch_assoc()) {
            $registros [] = array(
                'id' => $rowAct["id"],
                'fecha' => $rowAct["fecha"],
                'total_hrs' => $rowAct["total_hrs"],
            );
        }
        echo json_encode($registros);
    }

//Llenar Tabla Actividades
    if($accion == "LlenarTablaAct"){
        
        $sqlActividades = "SELECT *
                           FROM actividades act
                           INNER JOIN horasxdia hd ON hd.fecha = act.fecha
                           WHERE act.fecha = '$fechaAct' AND act.id_usuario = $id_usuario";   
        $resultActividades = $conn->query($sqlActividades);

        $registros = [];
        while ($rowAct = $resultActividades->fetch_assoc()) {
            $registros [] = array(
                'fecha' => $rowAct["fecha"],
                'actividad' => $rowAct["actividad"],
                'duracion' => $rowAct["duracion"],
            );
        }
        echo json_encode($registros);
    }
    
//Dar de BAJA Usuario
    if($accion == 'baja_usuario'){
        $sqlBajaUs = "UPDATE usuarios SET estatus= 0 WHERE id_usuario = $id_usuario";
        $resultBajaUs = $conn->query($sqlBajaUs);
        
        echo json_encode($resultBajaUs);   
    }
    
// Obtener datos de areas
    if($accion == 'cargarArea'){
        
        $sql_areas = "SELECT id, CDAREA, AREA FROM areas ORDER BY AREA";
        $result_areas = $conn->query($sql_areas);
        
        if (!$result_areas) {
            die("Error en la consulta de áreas: " . mysqli_error($conn));
        }
        
        $Registros = [];
        while ($row = $result_areas->fetch_assoc()) {
            $Registros [] = array(
                'id_area' => $row["id"],
                'CDAREA' => $row["CDAREA"],
                'AREA' => $row["AREA"]
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($Registros);
    }  
    
// Obtener datos de jefes
    if($accion == 'cargarJefe'){
        
        $sql_jefe = "SELECT id_usuario, nombre FROM mess_rrhh.usuarios WHERE rol = 3";
        $result_jefe = $conn->query($sql_jefe);
        if (!$result_jefe) {
            echo json_encode(['error' => $conn->error]);
            exit;
        }
        
        $Registros = [];
        while ($row = $result_jefe->fetch_assoc()) {
            $Registros [] = array(
                'id_usuario' => $row["id_usuario"],
                'nombre' => $row["nombre"]
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($Registros);
    }
// Obtener datos de escuelas
    if($accion == 'cargarEsc'){
        
        $sql_esc = "SELECT id_escuela, nombre_esc FROM escuelas ORDER BY id_escuela";
        $result_esc = $conn->query($sql_esc);
        
        if (!$result_esc) {
            die("Error en la consulta de escuelas: " . mysqli_error($conn));
        }
        
        $Registros = [];
        while ($row = $result_esc->fetch_assoc()) {
            $Registros [] = array(
                
                'id_escuela' => $row["id_escuela"],
                'nombre_esc' => $row["nombre_esc"]
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($Registros);
    }
?>