<?php
function cargar_base(){
    #include("../database/db_conexion_local.php");
    include("../database/db_conexion_remota.php");
    return $conn;
}
function listar_grupos_alumno($id_alumno){
    $conn = cargar_base();
    $sql = "SELECT g.id_grupo, m.nombre AS materia, p.nombre AS profesor
        FROM grupos g
        INNER JOIN materias m ON g.id_materia = m.id_materia
        INNER JOIN profesores p ON g.id_profesor = p.id_profesor
        INNER JOIN alumnos_grupo ag ON g.id_grupo = ag.id_grupo
        WHERE ag.id_alumno = 1";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_grupo'] . "</td>";
        echo "<td>" . $row['materia'] . "</td>";
        echo "<td>" . $row['profesor'] . "</td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}
function listar_calificaciones($id_alumno){
    $conn = cargar_base();
    $sql = "SELECT m.nombre AS materia, g.id_grupo, ag.calificacion
    FROM grupos g
    INNER JOIN materias m ON g.id_materia = m.id_materia
    INNER JOIN alumnos_grupo ag ON g.id_grupo = ag.id_grupo
    WHERE ag.id_alumno = 1;";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_grupo'] . "</td>";
        echo "<td>" . $row['materia'] . "</td>";
        echo "<td>" . $row['calificacion'] . "</td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}
function listar_certificados($id_alumno){
    $conn = cargar_base();
    $sql = "SELECT m.nombre AS materia, ag.calificacion, ag.asistencia
    FROM grupos g
    INNER JOIN materias m ON g.id_materia = m.id_materia
    INNER JOIN alumnos_grupo ag ON g.id_grupo = ag.id_grupo
    WHERE ag.id_alumno = 1
    AND ag.calificacion > 8
    AND ag.asistencia > 90;";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['materia'] . "</td>";
        echo "<td>" . $row['calificacion'] . "</td>";
        echo "<td>" . $row['asistencia'] . "</td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}
function agregar_administrador(){
    $conn=cargar_base();
    $sql = "INSERT INTO administradores (usuario, clave) VALUES ('$usuario', '$clave')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: index.php");
}
function get_admin($id_admin) {
    $conn=cargar_base();
    $sql = "select * from administradores where id_admin=$id_admin; ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        $usuario=$row['usuario'];
        $clave=$row['clave'];
    }
    mysqli_close($conn);
    return array($usuario, $clave);
}
function crear_sesion_alumnos($id_admin){
    session_start();
    $_SESSION['id_admin_actual'] = $id_admin;
}
function verificar_existe_sesion() {
    session_start();
    if (isset($_SESSION['id_admin_actual'])) {
        $id_admin_actual = $_SESSION['id_admin_actual'];
        return $id_admin_actual; 
    }
}
function cerrar_sesion_alumnos(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}
?>