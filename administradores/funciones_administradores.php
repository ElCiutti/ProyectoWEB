<?php
function cargar_base(){
    #include("../database/db_conexion_local.php");
    include("../database/db_conexion_remota.php");
    return $conn;
}
function listado_administradores(){
    $conn=cargar_base();
    $sql="SELECT * FROM administradores";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
        $id_admin=$row['id_admin'];
        echo "<tr>";
        echo "<td>" . $row['id_admin'] . "</td>";
        echo "<td>" . $row['usuario'] . "</td>";
        echo "<td>" . $row['clave'] . "</td>";
        echo "
            <td>
                <form method='post' action='formulario_modificar_admin.php?id_admin=$id_admin'>        
                <button type='submit'>Modificar</button></form>
            </td>";
        echo "
            <td>
                <form method='post' action='borrar_admin.php?id_admin=$id_admin'>        
                <button type='submit'>Borrar</button></form>
            </td>";
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
function crear_sesion_admin($id_admin){
    session_start();
    $_SESSION['id_admin_actual'] = $id_admin;
}
function verificar_existe_sesion_admin() {
    session_start();
    if (isset($_SESSION['id_admin_actual'])) {
        $id_admin_actual = $_SESSION['id_admin_actual'];
        return $id_admin_actual; 
    }
}
function cerrar_sesion_admin(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}
?>