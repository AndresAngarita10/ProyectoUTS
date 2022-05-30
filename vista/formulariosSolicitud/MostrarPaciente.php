<?php

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
                        <h1 align="center" style="margin-top: 10px;" >Pacientes</h1>
                                
                                
                                
                                <div id="contenedor" class="row">
                                <div id="busqueda" class="col-4 my-auto mx-auto">
                                <form class="form-inline my-2 my-lg-0" method="POST" action="../../controlador/paciente/PacienteControl.php">
                                    <input class="form-control rounded-5 mr-sm-2" autocomplete="off" placeholder="Buscar por cedula" 
                                        type="search" name="cedula" id="cedula" aria-label="Search">

                                        <button class="btn btn-info  my-2 my-sm-0 rounded-5" type="submit"
                                        name="boton" id="boton" value="buscedula">Buscar</button>
                                </form>
                                </div>


                                <div id="" class="col-4 my-auto mx-auto">
                                <form class="form-inline my-2 my-lg-0" method="POST" action="NuevoPaciente.php">
                                    

                                        <button class="btn btn-info btn-success my-2 my-sm-0 rounded-5" type="submit"
                                        name="boton" id="boton"  value="agregarPaciente">Agregar Nuevo Paciente</button>
                                </form>
                                </div>

                                <div id="pais" class="col-8 my-auto mx-auto"> 
                                    <a  class="btn btn-primary btn-success my-2 my-sm-0 rounded-5" hidden href="AgregarProductoV.php" type="button">Agregar Nuevo Producto</a>
                                    <small id="emailHelp" class=" text-white" >-</small>                          
                                </div>
                            </div>
                            

                            
                        <table class="table table-responsive table-striped table-dark" border="1">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">Identificacion</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">F-Nacimiento</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Tipo Contribuyente</th>
                            <th scope="col">Eps <!-- <a type="button" style="margin-left: 100px;" class="btn btn-success rounded-5" href="VenderProducto.php?pagina=1&&cedula=<?php //echo($cedula); ?>">Finalizar</a> -->
                                
                                </th>
                            <th scope="col"><a type="button" style="height: 33px;" class="btn btn-info" href="../../vista/index/IndexAuxAdministrativo.php">Volver</a></th>
                            </tr>
                        </thead>
                        <?php if($valorControl==0){ ?>
                            
                        <?php
                            foreach ($tabla as $valor) { 
                        ?> 
                        <form method="POST" action="../../controlador/paciente/PacienteControl.php">
                            <tbody>
                                <tr>
                                <td><?php echo($valor->getTipoDocumento()); ?>
                                <input hidden id="identificacion" name="identificacion" value="<?php echo($valor->getNumeroDocumento()); ?>">
                                </td>
                                <td><?php echo($valor->getNumeroDocumento()); ?></td>
                                <td><?php echo($valor->getPrimerNombre()." - ".$valor->getSegundoNombre()); ?></td>
                                <td><?php echo($valor->getPrimerApellido()." - ".$valor->getSegundoApellido()); ?></td>
                                <td><?php echo($valor->getDepartamento());  ?></td>
                                <td><?php echo($valor->getCiudad());  ?></td>
                                <td><?php echo($valor->getFechaNacimiento());  ?></td>
                                <td><?php echo($valor->getCorreo());  ?></td>
                                <td><?php echo($valor->getTipoContribuyente());  ?></td>
                                <td><?php echo($valor->getEps());  ?></td>
                                <td>
                                <div>
                                    <div>
                                        <form method="POST" action="../../controlador/itemproductos/ItemProductosControl.php">
                                        <div class="input-group mb-0">
                                                    <input hidden id="identificacion" name="identificacion" value="<?php echo($valor->getId()); ?>">
                                                    <input hidden id="cedula" name="cedula" value="<?php echo($valor->getNumeroDocumento()); ?>">
                                                    <div >
                                                        <button class="btn btn-info"  type="submit" value="editar" id="boton" name="boton">Editar</button>

                                                        <button class="<?php if($valor->gethabilitado()==0){echo("btn btn-info");}else{echo("btn btn-danger");} ?>"
                                                          type="submit" value="<?php if($valor->getHabilitado()==0){echo("des");}else{echo("hab");} ?>" id="boton" name="boton">-</button>

                                                        <button class="btn btn-info">  
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
                    <?php }} else { ?>
                        <form method="POST" action="../../controlador/paciente/PacienteControl.php">
                            <tbody>
                                <tr>
                                <td><?php echo($_POST['tipoDocumento']); ?>
                                <input hidden id="identificacion" name="identificacion" value="<?php echo($_POST['numeroDocumento']); ?>">
                                </td>
                                <td><?php echo($_POST['numeroDocumento']); ?></td>
                                <td><?php echo($_POST['nombre']); ?></td>
                                <td><?php echo($_POST['apellido']); ?></td>
                                <td><?php echo($_POST['departamento']);  ?></td>
                                <td><?php echo($_POST['ciudad']);  ?></td>
                                <td><?php echo($_POST['fnaci']);  ?></td>
                                <td><?php echo($_POST['correo']);  ?></td>
                                <td><?php echo($_POST['contribuyente']);  ?></td>
                                <td><?php echo($_POST['eps']);  ?></td>
                                <td>
                                <div>
                                    <div>
                                        <form method="POST" action="../../controlador/paciente/PacienteControl.php">
                                        <?php  //echo("habilitado es ".$_POST['habilitado']); ?>
                                                <div class="input-group mb-0">
                                                    <input hidden id="identificacion" name="identificacion" value="<?php echo($_POST['id']); ?>">
                                                    <input hidden id="cedula" name="cedula" value="<?php echo($_POST['numeroDocumento']); ?>">
                                                    <div >
                                                        <button class="btn btn-primary"  type="submit" value="editar" id="boton" name="boton">Editar</button>

                                                        <button class="<?php if($_POST['habilitado']==0){echo("btn btn-danger");}else{echo("btn btn-success");} ?>"
                                                          type="submit" value="<?php if($_POST['habilitado']==0){echo("hab");}else{echo("des");} ?>" id="boton" name="boton">-</button>

                                                        <button class="<?php if($_POST['acompañante']==0){echo("btn btn-danger ");}else{echo("btn btn-success ");} ?>" 
                                                        <?php if($_POST['acompañante']==0){echo("disabled");} ?> type="submit" value="mostrarAcompa" id="boton" name="boton">

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
                    <?php } ?>
                    
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
