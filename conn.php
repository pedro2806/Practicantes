<?php 
/*
                                    //USUARIO               CONTRASENIA         BD tickets*2024
$conn = mysqli_connect("localhost", "mess_tickets", "tickets*2024", "mess_practicantes");

    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }else{
    //echo "Connected successfully";
    }
*/

// Crear conexión
$conn = new mysqli("localhost", "mess_tickets", "tickets*2024", "mess_practicantes");
// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
    
}
?>