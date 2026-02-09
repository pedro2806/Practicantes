<?php
include 'conn.php';
$accion = $_POST["accion"];

$id_UScookie = $_COOKIE['id_usuario'];

//Tabla ESCUELAS
$id_escuela = $_POST["id_escuela"];
$nombre_esc = $_POST["nombre_esc"];
$direccion = $_POST["direccion"];
$maestro = $_POST["maestro"];
$telefono = $_POST["tel_escuela"];
$correo_esc = $_POST["correo_esc"];
$horas_req = $_POST["hrs_requeridas"];
$estatus = $_POST["estatus"];

/*---------------------------------------------------------------------------------------*/

//AGREGAR Escuela 
    if($accion == "AgregarEsc"){
        
        $sqlAgregarEsc= "INSERT INTO escuelas (nombre_esc, direccion, maestro, tel_escuela, correo_esc, hrs_requeridas, estatus)
                         VALUES ('$nombre_esc', '$direccion', '$maestro', '$telefono', '$correo_esc', '$horas_req', '1' )";
        
        $ResAgregarEsc = $conn->query($sqlAgregarEsc);
        $exito = array();
        
        if ($ResAgregarEsc) {
            $exito [] = array(1);
            echo json_encode(['success' => true]);
        }
        else {
            echo $sqlAgregarEsc;
            echo json_encode(['error' => false]);
        }
    }

//LLENAR Tabla Escuelas Activas

    if($accion == "TablaEscAct"){
        
        $sqlTablaEscAct = "SELECT * FROM escuelas WHERE estatus = 1";
        $resTablaAct = $conn->query($sqlTablaEscAct);
        
        // Crear un array para almacenar los resultados
        $registros = [];
        
        while ($rowllenaTablaEscAct = $resTablaAct->fetch_assoc()) {
            $registros [] = array(
                'id_esc' => $rowllenaTablaEscAct["id_escuela"],
                'nombre_esc' => $rowllenaTablaEscAct["nombre_esc"],
                'direccion' => $rowllenaTablaEscAct["direccion"],
                'maestro' => $rowllenaTablaEscAct["maestro"],
                'tel_esc' => $rowllenaTablaEscAct["tel_escuela"],
                'hrs_req' => $rowllenaTablaEscAct["hrs_requeridas"],
                'estatus' => $rowllenaTablaEscAct["estatus"],
                'correo' => $rowllenaTablaEscAct["correo_esc"]
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($registros);
    }

//LLENAR Tabla Escuelas Baja

    if($accion == "TablaEscBaja"){
        
        $sqlTablaEscBaja = "SELECT * FROM escuelas WHERE estatus = 0";
        $resTablaBaja = $conn->query($sqlTablaEscBaja);
        
        // Crear un array para almacenar los resultados
        $registros = [];
        
        while ($rowllenaTablaEscBaja = $resTablaBaja->fetch_assoc()) {
            $registros [] = array(
                'id_esc' => $rowllenaTablaEscBaja["id_escuela"],
                'nombre_esc' => $rowllenaTablaEscBaja["nombre_esc"],
                'direccion' => $rowllenaTablaEscBaja["direccion"],
                'maestro' => $rowllenaTablaEscBaja["maestro"],
                'tel_esc' => $rowllenaTablaEscBaja["tel_escuela"],
                'hrs_req' => $rowllenaTablaEscBaja["hrs_requeridas"],
                'estatus' => $rowllenaTablaEscBaja["estatus"],
                'correo' => $rowllenaTablaEscBaja["correo_esc"]
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($registros);
    }
    
//Dar de BAJA una escuela   
    if ($accion == 'baja_estatus') {
        
        $sqlBaja_esc = "UPDATE escuelas SET estatus = 0 WHERE id_escuela = $id_escuela";
        $resBaja_esc = $conn->query($sqlBaja_esc);
        
        // Devolver la respuesta
        echo json_encode(['success' => $resBaja_esc]);
    }
    
//Dar de ALTA una escuela
     if ($accion == 'alta_estatus') {
        
        $sqlAlta_esc = "UPDATE escuelas SET estatus= 1 WHERE id_escuela= $id_escuela";
        $resAlta_esc = $conn->query($sqlAlta_esc);
        
        // Devolver la respuesta
        echo json_encode(['success' => $resAlta_esc]);
    }

//Informacion para Modificar Escuela
    if ($accion == "InfoEsc") {
        $sqlInfoEsc = "SELECT * FROM escuelas WHERE id_escuela = $id_escuela";
        $resultInfoEsc = $conn->query($sqlInfoEsc);
        
        $registros = [];
        while ($rowInfoEsc = $resultInfoEsc->fetch_assoc()) {
            $registros[] = array(
                'id_esc' => $rowInfoEsc["id_escuela"],
                'nombre' => $rowInfoEsc["nombre_esc"],
                'direccion' => $rowInfoEsc["direccion"],
                'maestro' => $rowInfoEsc["maestro"],
                'tel_escuela' => $rowInfoEsc["tel_escuela"],
                'hrs_requeridas' => $rowInfoEsc["hrs_requeridas"],
                'estatus' => $rowInfoEsc["estatus"],
                'correo' => $rowInfoEsc["correo_esc"]
            );
        }
        // Devolver los datos en formato JSON
        echo json_encode($registros);
    }
    
//Modificar Escuela
    if($accion == "modificar"){
        
        $sqlModificarEsc = "UPDATE escuelas 
                            SET nombre_esc='$nombre_esc', direccion='$direccion', maestro='$maestro', tel_escuela='$telefono', correo_esc='$correo_esc', hrs_requeridas='$horas_req' 
                            WHERE id_escuela='$id_escuela'";
        $resultModicarEsc = $conn->query($sqlModificarEsc);
        
        // Devolver los datos en formato JSON
        echo json_encode($resultModicarEsc);                       
    }

?>