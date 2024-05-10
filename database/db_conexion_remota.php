<?php
$servername = "localhost"; 
$username = "id22116410_moises"; 
$database = "id22116410_db_web"; 
$password = "BaseDatos/7"; 
// Crear una nueva conexión
$conn = new mysqli($servername, $username, $password, $database);
// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>