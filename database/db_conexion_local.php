<?php

$servername = "localhost"; // Cambiar a "127.0.0.1" si no funciona con "localhost"
$username = "root"; // Usuario por defecto en Laragon
$password = ""; // Contraseña por defecto en Laragon
$database = "db_web"; // Reemplaza "nombre_de_tu_base_de_datos" por el nombre de tu base de datos creada en Laragon

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 

?>

