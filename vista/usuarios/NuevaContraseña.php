<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
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
            $numeroDocumento = $_POST['numeroDocumento'];
            $nombre = $_POST['nombre'];
            //echo $numeroDocumento;
        ?>
        <div class="ventana" id="ventan">
            <div class="alert alert-success alert-dismissible fade show" style="width: 100%; height: auto; margin-left: auto; margin-right: auto; margin-top: -90px; margin-bottom: 15px;" role="alert">
              <strong><?php echo $nombre; ?></strong> <?php echo(" Cedula: ".$numeroDocumento); ?>
          </div>
            <form class="form-inline my-6 my-lg-0" method="POST" action="../../controlador/usuarios/UsuariosControl.php">

                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $numeroDocumento; ?>"
                    type="search" name="numeroDocumento" hidden id="numeroDocumento" aria-label="Search">
                    
                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $nombre; ?>"
                    type="search" name="nombre" hidden id="nombre" aria-label="Search">

                    <br />

                    <input type="password" class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="Ingrese Contraseña " 
                    type="search" name="clave1" id="clave1" aria-label="Search" style="margin-top: 30px;">
                    <br>
                    <input type="password" class="form-control mr-sm-2" style="margin-top: 10px;" autocomplete="off" required autofocus placeholder="Ingrese Contraseña " 
                    type="search" name="clave2" id="clave2" aria-label="Search">
                    <br />
                    <button class="btn btn-info  my-2 my-sm-0" style="margin-top: 100px;" type="submit"
                    name="boton" id="boton" value="guardarPass2">Modificar</button>
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