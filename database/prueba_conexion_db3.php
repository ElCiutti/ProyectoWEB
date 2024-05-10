<?php
$servername = "localhost"; 
$username = "id22087941_admin"; 
$database = "id22087941_db_web"; 
$password = "%Admin24"; 


// Crear una nueva conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}


?>