<?php
include 'conn.php';

//Query para buscar "entrada" sin "salida" 

    $sql = "SELECT c.*
            FROM checador c
            JOIN (
                SELECT id_usuario, MAX(fecha) AS ultima_entrada
                FROM checador
                WHERE movimiento = 'entrada'
                AND DATE(fecha) = CURDATE()
                GROUP BY id_usuario
            ) ultimos ON c.id_usuario = ultimos.id_usuario AND c.fecha = ultimos.ultima_entrada
            ORDER BY c.fecha DESC";
    
    $result = mysqli_query($conn, $sql);

    while ($row = $result->fetch_assoc()) {
            
        // Verificar si ya existe una salida
        $check_sql = "SELECT movimiento  
                      FROM checador 
                      WHERE DATE(fecha) = CURDATE()
                      AND movimiento IN ('salida', 'salidaS')";
                      
        if (!mysqli_query($conn, $check_sql)->num_rows) {

            // Insertar salida automática si no existe
            $insert_sql = "INSERT INTO checador (id_usuario, fecha, movimiento) 
                           VALUES ({$row['id_usuario']}, NOW(), 'salidaS')";
            mysqli_query($conn, $insert_sql) or die("Error al insertar salida: " . $conn->error);
            
            $insert_sqlS = "INSERT INTO horasxdia (id_usuario, fecha, total_hrs) 
                            VALUES ({$row['id_usuario']}, NOW(), TIMESTAMPDIFF(MINUTE,(SELECT MAX(fecha) 
                            FROM checador WHERE id_usuario = {$row['id_usuario']} AND movimiento = 'entrada'), NOW())/60)";
                        
            mysqli_query($conn, $insert_sqlS) or die("Error al insertar salida: " . $conn->error);
        }
    }

//Query para total de horas
    $sql_horas = " UPDATE usuarios u
                    JOIN (
                        SELECT id_usuario, SUM(total_hrs) AS total_horas
                        FROM horasxdia
                        GROUP BY id_usuario) h 
                    ON u.id_usuario = h.id_usuario
                    SET u.hrs_completas = h.total_horas";
    
    $resSQL = mysqli_query($conn, $sql_horas);

$conn->close();
?>