<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <title>Document</title>
    <style> 
        body{
            background: #ABF6FC;
        }
        .ventana{
            background: rgba(128,128,128,0.8);
            width: 30%;
            height: 25%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            text-align: center;
            padding: 33px;
            min-height: 150px;
            border-radius: 22px;
            position: fixed;
            left: 34%;
            top: 35%;
        }
    </style>
</head>
<body>  <?php 
            $ccAdmin = $_POST['ccAdmin'];
            $nombres = $_POST['nombres'];
            $numeroDocumento = $_POST['numeroDocumento'];
            $tipoUsuario = $_POST['tipoUsuario'];
            $fkIdRol = $_POST['fkIdRol'];
            $rolesActivos = $_POST['rolesActivos'];
        ?>
        <div class="ventana" id="ventan">
            <form class="form-inline my-6 my-lg-0" method="POST" action="../../controlador/usuarios/UsuariosControl.php">

                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $ccAdmin; ?>"
                    type="search" name="ccAdmin" hidden id="ccAdmin" aria-label="Search">
                    <br />
                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $nombres; ?>"
                    type="search" name="nombres" hidden id="nombres" aria-label="Search">

                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $numeroDocumento; ?>"
                    type="search" name="numeroDocumento" hidden id="numeroDocumento" aria-label="Search">

                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $tipoUsuario; ?>"
                    type="search" name="tipoUsuario" hidden id="tipoUsuario" aria-label="Search">

                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $fkIdRol; ?>"
                    type="search" name="fkIdRol" hidden id="fkIdRol" aria-label="Search">

                    <input  class="form-control mr-sm-2" autocomplete="off" value="<?php echo $rolesActivos; ?>"
                    type="search" name="rolesActivos" hidden id="rolesActivos" aria-label="Search">

                    <input type="password" class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="Ingrese Contraseña " 
                    type="search" name="clave1" id="clave1" aria-label="Search">
                    <br>
                    <input type="password" class="form-control mr-sm-2" style="margin-top: 10px;" autocomplete="off" required autofocus placeholder="Ingrese Contraseña " 
                    type="search" name="clave2" id="clave2" aria-label="Search">
                    <br />
                    <button class="btn btn-info  my-2 my-sm-0" style="margin-top: 100px;" type="submit"
                    name="boton" id="boton" value="guardarP">Asignar</button>
                    <?php 
                    if (isset($_POST['error'])) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" style="width: 100%; margin-left: auto; margin-right: auto;" role="alert">
                         <?php echo($_POST['error']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php

                }
                ?>
            </form>
                <br />


        </div>
</body>
</html>