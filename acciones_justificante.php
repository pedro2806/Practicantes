<?php
include 'conn.php';
$accion = $_POST["accion"] ?? 0;

//Tabla JUSTIFICANTE
$id_just = $_POST["id_just"] ?? 0;
$fecha_inicio = $_POST["fecha_inicio"] ?? 0;
$fecha_fin =  $_POST["fecha_fin"] ?? 0;
$tipo = $_POST["tipo"] ?? 0;
$descripcion = $_POST["descripcion"] ?? 0;
$comentarios = $_POST["comentarios"] ?? 0;
$comentariosD = $_POST["comentariosD"] ?? 0;
$estatus = $_POST["estatus"] ?? 0;
$id_UScookie = $_COOKIE['id_usuario'] ?? 0;

/*---------------------------------------------------------------------------------------*/

//Crear Justificante
    if($accion == 'nuevo'){
        $sql = "INSERT INTO justificantes (id_usuario, descripcion, fecha_inicio, fecha_fin, fecha_solicitud, tipo,estatus, comentarios) 
                VALUES ($id_UScookie,'$descripcion', '$fecha_inicio','$fecha_fin',NOW(), '$tipo', 'Pendiente','')";
        
        if ($conn->query($sql)) { 
            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script>swal("¡Tu solicitud fue procesada con éxito!", "", "success");</script>';
                
                $sql_archi = "SELECT id FROM justificantes ORDER BY id DESC LIMIT 1;";
                $res2 = $conn->query($sql_archi);
                while ( $row2 = $res2->fetch_assoc()) { 
                    $idNuevoJust = $row2["id"];
                }
                
                //CREAR CARPETA Y SUBIR ARCHIVO O ARCHIVOS
                mkdir("Archivos/Justificantes/$idNuevoJust", 0700);
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {  //Validación de metodo POST
                    $uploadDir = "Archivos/Justificantes/$idNuevoJust";  //Donde se guardaran los archivos
                
                    //Ciclo para nombrar, leer y subir el archivo
                    foreach ($_FILES['archivo']['name'] as $key => $name) {
                        if ($_FILES['archivo']['error'][$key] == UPLOAD_ERR_OK) {
                            $tmp_name = $_FILES['archivo']['tmp_name'][$key];
                            $fichero_subido = "$uploadDir/" . basename($name);
                
                            if (file_exists($tmp_name)) {
                                if (move_uploaded_file($tmp_name, $fichero_subido)) {
                                    echo "Archivo $name subido correctamente.<br>";
                                } else {
                                    echo "Error al mover el archivo $name.<br>";
                                }
                            } else {
                                echo "El archivo temporal $tmp_name no existe.<br>";
                            }
                        } else {
                            echo "Error en el archivo $name. Código de error: " . $_FILES['archivo']['error'][$key] . "<br>";
                            echo '<script>window.location.assign("justificantes.php")</script>';
                        }
                    }
                    echo '<script>window.location.assign("ver_just.php?id='.$idNuevoJust.'")</script>';
                }
        }
    }
    
//Estatus del Justificante
    if($accion == 'respuestaJust'){
        $coment = $comentarios.$comentariosD;
        if($estatus == 'Aprobado'){
            $sql = "UPDATE justificantes SET estatus = 'Aprobado', comentarios = '$coment' WHERE id =$id_just"; 
        }
        if($estatus == 'Denegado'){
            $sql = "UPDATE justificantes SET estatus = 'Denegado', comentarios = '$coment' WHERE id =$id_just";
        }
            if ($conn->query($sql)) { 
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>swal("¡Tu solicitud fue procesada con éxito!", " ", "success");</script>';
                echo '<script>window.location.assign("ver_just.php?id='.$id_just.'")</script>';
            } else {
                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                echo '<script>swal("¡Tu solicitud fue procesada con éxito!", " ", "success");</script>';
                echo '<script>window.location.assign("ver_just.php?id='.$id_just.'")</script>';
            }
    }
    
?>