<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    <?php include("funciones.php");?>
    <h1>Página de prueba PHP</h1>
    <?php
        echo "Hola Mundo";
        echo "<h2 style='color:blue'> Hola Mundo </h2>";
        print("<h3 style='color:red'> Hola Mundo </h3>");

        $foo = array( 5, 0.0,
        "Hola", false, '' );
        var_dump( $foo );
        writeMsg();

    ?>
</body>
</html>