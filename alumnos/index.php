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
    include('funciones_alumnos.php'); 
    $id_alumno=verificar_existe_sesion();
?>

<body>
    <header>
        <div id="header">
          <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php"><img src="../styles/img/LogoUnam.png" style="max-height: 5rem;" ></a>
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
                <div style="display: block;">
                    <h1>Bienvenido alumno</h1>
                    <table id="tabla_grupos_inscritos">
                    <thead>
                        <tr><th>materia</th><th>profesor</th><th>grupo</th></tr>
                    </thead>
                    <tbody>
                        <?php  listar_grupos_alumno($id_alumno); ?>    
                    </tbody>
                    </table>
                    <br>
                    <br>
                    <table id="tabla_calificaciones">
                    <thead>
                        <tr><th>grupo</th><th>materia</th><th>profesor</th></tr>
                    </thead>
                    <tbody>
                        <?php  listar_calificaciones($id_alumno); ?>    
                    </tbody>
                    </table>
                    <br>
                    <br>
                    <table id="tabla_certificados">
                    <thead>
                        <tr><th>materia</th><th>calificacion</th><th>asistencia</th></tr>
                    </thead>
                    <tbody>
                        <?php  listar_certificados($id_alumno); ?>    
                    </tbody>
                    </table>
                    <form method='post' action='cerrar_sesion_alumnos.php'>        
                        <button class="btn btn-primary" type='submit'>Cerrar Sesión</button>
                    </form>
                </div>    
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