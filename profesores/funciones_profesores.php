<?php
function cargar_base(){
    #include("../database/db_conexion_local.php");
    include("../database/db_conexion_remota.php");
    return $conn;
}

function agregar_administrador(){
    $conn=cargar_base();
    $sql = "INSERT INTO administradores (usuario, clave) VALUES ('$usuario', '$clave')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: index.php");
}
function get_profesor($id_profesor) {
    $conn=cargar_base();
    $sql = "select * from administradores where id_admin=$id_profesor; ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        $usuario=$row['usuario'];
        $clave=$row['clave'];
    }
    mysqli_close($conn);
    return array($usuario, $clave);
}
function crear_sesion_profesores($id_profesor){
    session_start();
    $_SESSION['id_profesor_actual'] = $id_profesor;
}
function verificar_existe_sesion_profesor() {
    session_start();
    if (isset($_SESSION['id_profesor_actual'])) {
        $id_profesor_actual = $_SESSION['id_profesor_actual'];
        return $id_profesor_actual; 
    }
}
function cerrar_sesion_profesor(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}
function listado_grupos($id_profesor){
    $conn = cargar_base();
    $sql = "SELECT DISTINCT g.id_grupo, m.nombre, m.clave FROM `grupos` AS g
    JOIN materias AS m ON m.id_materia = g.id_materia
    WHERE g.id_profesor = 1;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $id_grupo = $row['id_grupo'];
        echo "<tr>";
        echo "<td>" . $row['id_grupo'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['clave'] . "</td>";
        echo "
            <td>
                <form method='post' action='formulario_calificar_grupo.php?id_grupo=$id_grupo'>        
                <button type='submit'>Calificar</button></form>
            </td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}
function listado_grupos_profesor($id_grupo){
    $conn=cargar_base();
    $sql="SELECT ag.id_alumno_grupo, a.nombre, ag.calificacion, ag.asistencia FROM `alumnos_grupo` as ag
    JOIN alumnos as a on a.id_alumno=ag.id_alumno
    WHERE id_grupo=$id_grupo;";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
        $id_alumno_grupo=$row['id_alumno_grupo'];
        echo "<tr>";
        echo "<form method='post' action='calificar_alumno.php'>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td> <input type='number' name='calificacion' value='$row[calificacion]' required> </input> </td>";
        echo "<td> <input type='number' name='asistencia' value='$row[asistencia]'> </input> </td>";
        echo "<td> <input type='hidden' name='id_alumno_grupo' value='$row[id_alumno_grupo]'> </input> </td>";
        echo "<td> <input type='hidden' name='id_grupo' value='$id_grupo'> </input> </td>";
        echo "
            <td>      
                <button type='submit'>Calificar</button></form>
            </td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}
?>