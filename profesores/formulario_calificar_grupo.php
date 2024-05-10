<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="Latin1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/css/formato.css">
</head>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    $id_grupo = $_REQUEST["id_grupo"];
    }
    include('funciones_profesores.php');
?>

<body>
    <header>
        <div id="header">
          <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="../index.php"><img src="../styles/img/LogoUnam.png" style="max-height: 5rem;" ></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" href="index.php">Inicio</a>
                  <a class="nav-link" href="#">Iniciar Sesion</a>
                  <a class="nav-link disabled" aria-disabled="true">Avisos</a>
                </div>
            </div>
        </div>
          </nav>
        </div>
    </header><!--Fin header-->

    <main>
        <div id="container" style="min-height: 90vh;">
            <div id="contenido" style="display: flex; justify-content: center;">
                <table>
                    <tr>
                        <th>Alumno</th>
                        <th>Calificaion</th>
                        <th>Asistencia</th>
                    </tr>
                    <tr>
                        <tbody>
                            <?php
                                listado_grupos_profesor($id_grupo);
                            ?>
                        </tbody>
                    </tr>
                </table>    
            </div>
        </div><!--Fin container-->
    </main><!--Fin main-->
    
    <footer>
        <div id="footer">
            <p>Todos los derechos reservados ©</p>
      </div>
    </footer><!--Fin footer-->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body><!--Fin body-->

</html><!--Fin html-->
