<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="Latin1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/css/formato.css">
    <link rel="stylesheet" href="styles/css/login.css">
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_REQUEST["error"])) {
            $error = $_REQUEST["error"];
            if ($error > 0) {
                $error_message = "<p>Error de validación de los datos del usuario<p>";
            }
        } else {
            $error_message = "";
            $error = 0;
        }
    }
    ?>
    <header>
        <div id="header">
          <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php"><img src="styles/img/LogoUnam.png" style="max-height: 5rem;" ></a>
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
        <div id="container">
            <div class="acceso" style="display: flex; justify-content: center;">
                <div id="login" class="card" style="width: 25rem; padding: 2rem 1rem;">
                    <div id="formularioValidacion">
                        <h2>Iniciar Sesión</h2>
                        <form action="validar_login.php" method="get">
                            <div class="form-group">
                                <label for="usuario" class="col-form-label">Usuario:</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="clave" class="col-form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="clave" name="clave" maxlength="8" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="tipo-usuario">Tipo de usuario:</label>
                                <select class="form-select" name="tipo_usuario" id="tipo_usuario">
                                    <option value="1">Administrador</option>
                                    <option value="2">Profesor</option>
                                    <option value="3">Alumno</option>
                                  </select>
                                
                            </div>
                            <?php
                                if ($error > 0) {
                                    echo $error_message;
                                }
                            ?>
                            <br>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
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