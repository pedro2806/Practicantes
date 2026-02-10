<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
include 'conn.php';
$accion = $_POST["accion"] ?? 0;

$usuario = $_POST['usuario'] ?? 0; 
$password = $_POST['password'] ?? 0;;

$id_usuario = $_POST['id_usuario'] ?? 0;;
$apellidos = $_POSt['apellidos'] ?? 0;;
$rol = $_POST['rol'] ?? 0;;
/*----------------------------------------------------------------------------*/
//Inicio de Sesion
    if ($accion == 'InicioSesion'){
        
        $sqlUsuarios = "SELECT usuario, apellidos, nombre, id_usuario, rol, correo FROM usuarios WHERE usuario = '$usuario' AND password = '$password' AND estatus = 1";
        $resUsuarios = $conn->query($sqlUsuarios);
        
        if ($resUsuarios === false) {
            echo json_encode(['ok' => false, 'message' => 'Error en la consulta']);
            exit;
        }
        
        $nr = mysqli_num_rows($resUsuarios);
        
        if ($nr == 1) {
            $row = $resUsuarios->fetch_assoc();
            echo json_encode(['ok' => true, 'data' => $row]);
        } else {
            echo json_encode(['ok' => false, 'message' => 'Usuario o contraseña incorrectos']);
        }
    }
?>