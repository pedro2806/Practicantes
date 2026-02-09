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
        
        $sqlUsuarios = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password' AND estatus = 1";
        $resUsuarios = $conn->query($sqlUsuarios);
        
        // Verificar si la consulta fue exitosa
        if ($resUsuarios === false) {
            die('Error en la consulta: ' . $conn->error);
        }
        
        // Obtener el nè´‚mero de filas
        $nr = mysqli_num_rows($resUsuarios);
        
        // Verificar si se encontrè´— un usuario
        if ($nr == 1) {
            $registros = []; 
            while ($row = $resUsuarios->fetch_assoc()) {
                $registros [] = array(
                    'usuario' => $row["usuario"],
                    'apellidos' => $row["apellidos"],
                    'nombre' => $row["nombre"],
                    'id_usuario' => $row["id_usuario"],
                    'rol' => $row["rol"],  
                );
            }
            echo json_encode($registros);
        } else if ($nr  ==  0){
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>swal("Usuario o contrase√±a incorrectos!", "Vuelve a intentar!", "error");</script>';
        }
    }    
?>