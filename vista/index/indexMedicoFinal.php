<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <?php include '../layout/headerMedico.php'; 
  include_once("../../modelo/medico/ModeloMedico.php");
  $Medico = new ModeloMedico();
  //echo $_POST['ccMed'];
  $ccMed = $_POST['ccMed'];
  $validarMed= $Medico->getMedicoXCedula($_POST['ccMed']);
  //echo ($validarMed->getPrimerNombre());
  $ccMEd = $validarMed->getNumeroDocumento();
  //echo $ccMed;
  if($validarMed==null){
      header("Location: ../../index.php");
  }
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
    <div class="p-5 my-auto">
        <center>
            <img width="200px" height="160px" 
            src="https://cdn.pixabay.com/photo/2017/05/15/23/47/stethoscope-icon-2316460_960_720.png">
        </center>
        
      <h1 class="display-5 mt-3 mb-2">Bienvenido 
      <h3><?php //echo($validarMed->getPrimerNombre()); ?></h3>
      <div class="p-5 my-auto" style="margin-top: -100px;">
        <a class="btn btn-outline-info " style="margin-top: -10px; max-width: 147px;" type="submit" href="javascript:abrirCitasHoy()"> Citas Hoy </a> 
      </div>
      <div class="p-5 my-auto">
        <a class="btn btn-outline-info " style="margin-top: -150px; max-width: 200px;" type="submit" href="javascript:abrir()">Imprimir Historia Clinica </a>
      </div>

        
        <a class="btn btn-outline-warning rounded-4" style="margin-top: -10px; max-width: 147px;" type="submit" href="../../controlador/acompañante/AcompañanteControl.php">Salir </a>
    </div>
  </div>
  <div class="col-md-7 center col-sm-2  text-white p-5" style="background-color:#C4F4F8;">
        <div class="grid">
            <div class="grid-item " >
                <img src="../../imagenes/imgMed/med1.jpg"
                width="800" height="162">
            </div>
            <div class="grid-item">
                <img src="../../imagenes/imgMed/med2.jpg"
                width="800" height="162"></div>
            <div class="grid-item">
                <img src="../../imagenes/imgMed/med1.jpg"
                width="800" height="162">
                </div>
            <div class="grid-item">
                <img src="../../imagenes/imgMed/med2.jpg"
                width="800" height="162">
                </div>
            
        </div>
    </div>
</div>




        <div class="ventana" id="ventan">
            <form class="form-inline my-2 my-lg-0" method="POST" action="../../controlador/medico/MedicoControl.php">
                    <input class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="Cedula del Paciente" 
                    type="search" name="identificacion" id="identificacion" aria-label="Search">

                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo $ccMEd; ?>"
                    type="search" name="ccMed" hidden id="ccMEd" aria-label="Search">

                    <button class="btn btn-outline-info  my-2 my-sm-0" type="submit"
                    name="boton" id="boton" value="validarccHistoria">Buscar</button>
            </form>
                <br />
                <a  class="btn btn-outline-danger my-2 my-sm-0" href="IndexMedicoFinal.php" type="button">Salir</a>


        </div>

        <div class="ventanaagg" id="ventanagg">

            <form class="form-inline my-2 my-lg-0" method="POST" action="#">
                <input class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="    " 
                type="search" name="codigobarras" id="codigobarras" aria-label="Search">

                <button class="btn btn-primary  my-2 my-sm-0" type="submit"
                name="boton" id="boton" value="validarexistenciaCB">Buscar </button>
            </form>
            <br />
            <a  class="btn btn-primary  my-2 my-sm-0" href="#" type="button"> </a>
            <a  class="btn btn-primary btn-danger my-2 my-sm-0" href="../../controlador/acompañante/AcompañanteControl.php" type="button">Salir</a>


        </div>
        <script>
            function abrir(){
            document.getElementById("ventan").style.display="block"
            }

            function abrir2(){
            document.getElementById("ventanagg").style.display="block"
            }
            
            function abrirCitasHoy(){
                    document.formSolicitudesTerminadas.submit();
                
            }
            

    </script>

        <title>Procesando...</title>
            <script type='text/javascript'>
                
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='formSolicitudesTerminadas' action='../../vista/medico/CitasHoy.php' method='post'>
                        <input type='text' hidden name='ccMed' value='<?php echo($ccMEd);?>'/>
                        
                </form>
            </body>
</body>
</html>


<script type= text/javascript>
/* AQUI COLOCAMOS LA URL BASE, ES DECIR LA QUE TE LLEVA AL LOGIN*/
  if(window.history.replaceState) {
    window.history.replaceState(null,null,'<?php echo "login.php";?>');
  }