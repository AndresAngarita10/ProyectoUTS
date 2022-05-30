<?php

use Dompdf\Css\Style;

if(isset($_GET['retorno'])){
    $var = $_GET['retorno'];
    if($var==1){
        echo 'guardado con exito, ';
    }else if ($var==2){
        echo 'editado con exito, ';
    }else if ($var==3){
        echo 'eliminado con exito, ';
    }else if ($var==4){
        echo 'habilitado con exito, ';
    }else if ($var==5){
        echo 'desabilitado con exito, ';
    }
}

    $valorControl=0;     
    if (isset($_POST['control'])) {
        $valorControl = $_POST['control'];
        echo ($valorControl);
        $nombre = $_POST['nombre'];
    }

    if(isset($_POST['cedula'])){
        $cedula = $_POST['cedula'];
        //echo $cedula;
    }

    if(isset($_GET['cedula'])){
        $cedula = $_GET['cedula'];
        //echo $cedula;
    }

    //include '../nav/nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Paciente</title>
    
    <?php // include '../layout/nav.php'; ?>

    <style>
        .ventana{
            background: rgba(128,128,128,0.8);
            width: 25%;
            height: 0%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            text-align: center;
            padding: 33px;
            min-height: 150px;
            border-radius: 22px;
            position: absolute;
            left: 34%;
            top: 20%;
            display: none;
        }
        .html,body{
            /* Para que funcione correctamente en Smarthpones y Tablets */
            height:100vh;
        }
        body {
            /* Ruta relativa o completa a la imagen */
            background-image: url(../wallpaper.jpg);
            /* Centramos el fondo horizontal y verticalmente */
            background-position: center center;
            /* El fonde no se repite */
            background-repeat: no-repeat;
            /* Fijamos la imagen a la ventana para que no supere el alto de la ventana */
            background-attachment: fixed;
            /* El fonde se re-escala automáticamente */
            background-size: cover;
            /* Color de fondo si la imagen no se encuentra o mientras se está cargando */
            background-color: #FFF;
            /* Fuente para el texto */
            text-align: center;
            color: #000;
            font-family: "Times New Roman", Times, serif;
        }
        h1{
            background-color:#ABF6FC;
        }
    </style>
</head>
<body>
<?php 
    include_once("../../modelo/paciente/ObjetoPaciente.php");
    include_once("../../modelo/paciente/Modelopaciente.php");
    include_once("../../modelo/Conexion.php");
    try {
        $ControlModelo = new ModeloPaciente();
        $tabla = $ControlModelo->getPacientes();
        
                ?>
            <div id="fomr" class="d-flex justify-content-center align-items-center">
                <div>
                    <div id="contenedor" class="row">
                        <div id="naranja" class="col-12 my-auto mx-auto">
                        <h1 align="center" style="margin-top: 10px;" >Usuario</h1>
                                
                                
                            

                            
                        <table class="table table-responsive table-striped table-dark" border="1">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Identificacion</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Tipo Usuario</th>
                            <th scope="col">Fecha Agregado</th>
                            <th scope="col">Habilitado</th>
                            <th scope="col"><a type="button" style="height: 33px;" class="btn btn-info" href="../../vista/index/IndexAdministrador.php">Volver</a></th>
                            </tr>
                        </thead>
                        <form method="POST" action="../../controlador/usuarios/UsuariosControl.php">
                            <tbody>
                                <tr>
                                <input hidden id="identificacion" name="identificacion" value="<?php echo($_POST['cedula']); ?>">
                                </td>
                                <td><?php echo($_POST['cedula']); ?></td>
                                <td><?php echo($_POST['nombre']); ?></td>
                                <td><?php echo($_POST['tipoUsuario']);  ?></td>
                                <td><?php echo($_POST['fechaAgregado']);  ?></td>
                                <td> <?php  if($_POST['habilitado']==0){echo("Deshabiliado");}else{echo("Habilitado");} ?> </td>
                                <td>
                                <div>
                                    <div>
                                        <form method="POST" action="../../controlador/paciente/PacienteControl.php">
                                        <?php  //echo("habilitado es ".$_POST['habilitado']); ?>
                                                <div class="input-group mb-0">
                                                    <input hidden id="ccAdmin" name="ccAdmin" value="<?php echo($_POST['ccAdmin']); ?>">
                                                    <input hidden id="numeroDocumento" name="numeroDocumento" value="<?php echo($_POST['cedula']); ?>">
                                                    <input hidden id="tipoUsuario" name="tipoUsuario" value="<?php echo($_POST['tipoUsuario']); ?>">
                                                    <div >
                                                        <button class="btn btn-primary"  type="submit" value="editarUsuario" id="boton" name="boton">Editar</button>
                                                        
                                                        <button class="<?php if($_POST['habilitado']==0){echo("btn btn-danger");}else{echo("btn btn-success");} ?>"
                                                          type="submit" value="<?php if($_POST['habilitado']==0){echo("hab");}else{echo("des");} ?>" id="boton" name="boton">-</button>

                                                          
                                                        <button class="btn btn-success"
                                                          type="submit" value="<?php if($_POST['habilitado']==0){echo("hab");}else{echo("des");} ?>" id="boton" name="boton">Pass</button>

                                                        
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                            </svg>
                                                        </button>
                                                        <br>
                                                    </div>
                                                    
                                                    
                                                
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>    
                                </td>
                                </tr>
                            </form>
                            </tbody>
                    
                        </div>
                    </div>
                </div>
            </div>
            
            
        
            <?php
        } catch (Exception $e) {
        die("Error: ". $e->getMessage());
    }
    
?>


  
</body>
</html>
