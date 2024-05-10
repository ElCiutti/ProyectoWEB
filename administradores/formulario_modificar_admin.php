
<!-- http://localhost/administradores/formulario_modificar_admin.php?id_admin=1  -->

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
        $id_admin = $_REQUEST["id_admin"];
    }
    include('funciones_administradores.php');
    $resultados = get_admin($id_admin);
    $usuario = $resultados[0];
    $clave = $resultados[1];    
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
                <div id="login" style="display: block;">
                    <div id="formularioValidacion">
                        <h2>Modificar admin</h2>
                        <form action="modificar_admin.php" method="get">
                            <div class="form-group">
                                <label class="col-form-label" for="usuario">Usuario:</label>
                                <input class="form-control" type="text" id="usuario" name="usuario" value="<?php echo $usuario ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="clave">clave:</label>
                                <input class="form-control" type="clave" id="clave" name="clave" value="<?php echo $clave ?>" maxlength="8" required>
                            </div>
                            <input type="hidden" id="id_admin" name="id_admin" value="<?php echo $id_admin ?>" >
                            <br>
                            <button class="btn btn-primary" type="submit">Salvar</button>
                        </form>
                    </div>
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