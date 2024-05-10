<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    // Capturar las variables enviadas por POST o GET
    $calificacion = $_REQUEST["calificacion"];
    $asistencia = $_REQUEST["asistencia"];
    $id_alumno_grupo = $_REQUEST["id_alumno_grupo"];
    $id_grupo = $_REQUEST["id_grupo"];

}
include('funciones_profesores.php');
cargar_base();
$conn=cargar_base();

$sql="UPDATE alumnos_grupo SET calificacion='$calificacion', asistencia='$asistencia' WHERE id_alumno_grupo=$id_alumno_grupo;";
$result = mysqli_query($conn, $sql);
header("Location: formulario_calificar_grupo.php?id_grupo=$id_grupo");
    
?>