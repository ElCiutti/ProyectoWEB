<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
        $id_alumno = $_REQUEST["id_alumno"];
        $usuario = $_REQUEST["usuario"];
        $clave = $_REQUEST["clave"];

    }
    include('funciones_alumnos.php');
    cargar_base();
    $conn=cargar_base();
    
    $sql = "UPDATE administradores SET usuario='$usuario', clave='$clave' WHERE id_admin=$id_admin;";

    $result = mysqli_query($conn, $sql);
?>