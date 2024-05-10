<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    // Capturar las variables enviadas por POST o GET
    $usuario = $_REQUEST["usuario"];
    $clave = $_REQUEST["clave"];
    $tipo_usuario = $_REQUEST["tipo_usuario"];
}
#include("database/db_conexion_local.php");
include("database/db_conexion_remota.php");
if ($tipo_usuario==1){
    $sql="SELECT id_admin FROM administradores where usuario='$usuario'  and clave='$clave'";
    $result = mysqli_query($conn, $sql);
 
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id_admin = $row['id_admin']; // Capturar el id_admin
 
        include('administradores/funciones_administradores.php');
        crear_sesion_admin($id_admin);

        header("Location: administradores/index.php?id_admin=$id_admin"); 
    } else {
        //echo "El Admin no existe.";
        header("Location: login.php?error=1"); 
    }

}
if ($tipo_usuario==2){
    $sql="SELECT id_profesor FROM profesores where usuario='$usuario'  and clave='$clave'";
    $result = mysqli_query($conn, $sql);
 
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id_profesor = $row['id_profesor']; // Capturar el id_alumnos
        include('profesores/funciones_profesores.php');
        crear_sesion_profesores($id_profesor);
        header("Location: profesores/index.php?id_profesor=$id_profesor"); 
    } else {
        //echo "El Admin no existe.";
        header("Location: login.php?error=1"); 
    }
}
if ($tipo_usuario==3){
    $sql="SELECT id_alumno FROM alumnos where usuario='$usuario'  and clave='$clave'";
    $result = mysqli_query($conn, $sql);
 
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id_alumno = $row['id_alumno']; // Capturar el id_alumnos
        include('alumnos/funciones_alumnos.php');
        crear_sesion_alumnos($id_alumno);
        header("Location: alumnos/index.php?id_alumno=$id_alumno"); 
    } else {
        //echo "El Admin no existe.";
        header("Location: login.php?error=1"); 
    }
}
?>