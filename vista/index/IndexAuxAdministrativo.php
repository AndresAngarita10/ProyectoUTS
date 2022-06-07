<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <?php include '../layout/headerMedico.php'; 
    include_once("../../modelo/auxAdministrativo/ModeloAuxAdministrativo.php");
    $Auxiliar = new ModeloAuxiliar();

    //$validarAux= $Auxiliar->getAuxXCedula($_POST['ccAux']);
    //$ccAux = $validarAux->getNumeroDocumento();
    //echo $ccAux;
    //echo ($validarMed->getPrimerNombre());
    //if($validarAux==null){
    //    header("Location: ../../index.php");
    //}
  ?>
  <title>Bienvenido</title>

  <style>
        .ventana{
            background: rgba(128,128,128,0.8);
            width: 30%;
            height: 0%;
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
            display: none;
        }
        .ventanaagg{
            background: rgba(128,128,128,0.8);
            width: 30%;
            height: 0%;
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
            display: none;
        }

        .btn{

            margin-top: 1rem;

            font-size: 1rem;
            border-radius: 5px;
            background-color: #F7EFED;
            border: 2px solid #696969; 
        }
    </style>
  
</head>
<body>
<div class="row" style="height: 100vh; background-color: gray;">
  <div class="col-md-5 col-sm-9 bg-light">
    <?php 
        if (isset($_POST['error'])) {
          ?>
          <div class="alert alert-warning alert-dismissible fade show" style="width: 100%; margin-left: auto; margin-right: auto;" role="alert">
              <strong>Hola!</strong> <?php echo($_POST['error']); ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php

      }
      ?>
      <?php 
          if (isset($_POST['aceptada'])) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" style="width: 100%; margin-left: auto; margin-right: auto;" role="alert">
                <strong>Hola!</strong> <?php echo($_POST['aceptada']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
  
        }
        ?>
    <div class="p-5 my-auto">
        <center>
            <img width="200px" height="180px" 
            src="https://cdn.pixabay.com/photo/2017/05/15/21/58/drug-icon-2316244__340.png">
        </center>
        
      <h1 class="display-5 mt-3 mb-2">Bienvenido 
      <h3><?php //echo($validarAux->getPrimerNombre()); ?></h3>
      <div class="p-5 my-auto" style="margin-top: -100px;">
        <a class="btn btn-outline-info  " style="margin-top: -10px; max-width: 200px;" type="submit" href="../remision/SolicitudesPendientesF1.php">Solicitudes Pendientes</a>
        <a class="btn btn-outline-info " style="margin-top: -10px; max-width: 147px;" type="submit" href="javascript:abrirCambioCita()"> Modificar Cita </a> 
      </div>
      <div class="p-5 my-auto">
       <!--  <a class="btn btn-outline-info" style="margin-right: 10px; margin-top: -150px; max-width: 200px;" type="submit" href="javascript:abrir()">Solicitudes por Paciente</a> -->
        <a class="btn btn-outline-info " style="margin-top: -150px; max-width: 180px;" type="submit" href="javascript:abrirSolFinal()">Solicitudes Finalizadas </a>
        <a class="btn btn-outline-info " style="margin-top: -150px; max-width: 147px;" type="submit" href="../formulariosSolicitud/verCitas.php"> Visualizar Citas </a> 
        
      </div>
      <div class="p-5 my-auto">
      <a class="btn btn-outline-info " style="margin-top: -290px; max-width: 147px;" type="submit" href="../formulariosSolicitud/MostrarPaciente.php"> Pacientes </a> 
      
        </div>
        <a class="btn btn-outline-warning rounded-4" style="margin-top: -100px; max-width: 147px;" type="submit" href="../../controlador/acompañante/AcompañanteControl.php">Salir </a>
    </div>
  </div>
  <div class="col-md-7 center col-sm-2  text-white p-5" style="background-color:#C4F4F8;">
        <div class="grid">
            <div class="grid-item " >
                <img src="../../imagenes/imgAuxIndex/med1.jpg"
                width="800" height="162">
            </div>
            <div class="grid-item">
                <img src="../../imagenes/imgAuxIndex/med5.jpg"
                width="800" height="162"></div>
            <div class="grid-item">
                <img src="../../imagenes/imgAuxIndex/med2.jpg"
                width="800" height="162">
                </div>
            <div class="grid-item">
                <img src="../../imagenes/imgAuxIndex/med5.jpg"
                width="800" height="162">
                </div>
            
        </div>
    </div>
</div>




        <div class="ventana" id="ventan">
            <form class="form-inline my-2 my-lg-0" method="POST" action="../../controlador/paciente/PacienteControl.php">
                    <input class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="Cedula del Paciente" 
                    type="search" name="identificacion" id="identificacion" aria-label="Search">

                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $ccAux; ?>"
                    type="search" name="ccAux" hidden id="ccAux" aria-label="Search">

                    <button class="btn btn-outline-info  my-2 my-sm-0" type="submit"
                    name="boton" id="boton" value="validarpaciente">Buscar</button>
            </form>
                <br />
                <a  class="btn btn-outline-danger my-2 my-sm-0" href="IndexAuxAdministrativo.php" type="button">Salir</a>


        </div>


        <div class="ventana" id="ventanCambio">
            <form class="form-inline my-2 my-lg-0" method="POST" action="../../controlador/auxAdministrativo/AuxAdministrativoControl.php">
                    <input class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="Cedula del Paciente" 
                    type="search" name="numeroDocumento" id="numeroDocumento" aria-label="Search">

                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $ccAux; ?>"
                    type="search" name="ccAux" hidden id="ccAux" aria-label="Search">

                    <button class="btn btn-outline-info  my-2 my-sm-0" type="submit"
                    name="boton" id="boton" value="validarcita">Buscar citas</button>
            </form>
                <br />
                <a  class="btn btn-outline-danger my-2 my-sm-0" href="IndexAuxAdministrativo.php" type="button">Salir</a>


        </div>









        <script type='text/javascript'>
            function abrir(){
            document.getElementById("ventan").style.display="block"
            }
            
            function abrirCambioCita(){
            document.getElementById("ventanCambio").style.display="block"
            }

            function abrirSolFinal(){
                    document.formSolicitudesTerminadas.submit();
                
            }
            

    </script>

        <title>Procesando...</title>
            <script type='text/javascript'>
                
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='formSolicitudesTerminadas' action='../../vista/auxAdministrativo/SolicitudesTerminadas.php' method='post'>
                        <input type='text' hidden name='activar' value='1'/>
                        <input type='text' hidden name='ccAux' value='<?php echo $ccAux; ?>'/>
                        
                </form>
            </body>

</body>
</html>


<script type= text/javascript>
/* AQUI COLOCAMOS LA URL BASE, ES DECIR LA QUE TE LLEVA AL LOGIN*/
  if(window.history.replaceState) {
    window.history.replaceState(null,null,'<?php echo "login.php";?>');
  }