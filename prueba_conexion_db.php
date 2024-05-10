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
} else {
    echo "Conexión exitosa";
}

$sql="SELECT * FROM administradores";
$result = mysqli_query($conn,$sql);

echo "<br><br>";
echo "<table border=1>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id_admin'] . "</td>";
    echo "<td>" . $row['usuario'] . "</td>";
    echo "<td>" . $row['clave'] . "</td>";

    echo "</tr>";
  }
  echo "</table>";
  
  mysqli_close($conn);


?>
