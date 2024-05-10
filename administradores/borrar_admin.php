<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
        $id_admin = $_REQUEST["id_admin"];
    }
    include('funciones_administradores.php');
    cargar_base();
    $conn=cargar_base();
    $sql = "DELETE FROM administradores WHERE id_admin = $id_admin";
    $result = mysqli_query($conn, $sql);
    header("Location: index.php"); 
?>