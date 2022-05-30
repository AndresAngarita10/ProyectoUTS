<?php 
    //echo($_POST['horaCita']);
    //echo($_POST['13h']);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/remisionPend.css" rel="stylesheet" type="text/css" />
    <link href="../../estilos/resets.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
  <?php include '../layout/headerMedico.php'; 
        include_once('../../modelo/datosRemision/ModeloDatosRemision.php');
        include_once('../../modelo/datosRemision/ModeloRemision.php');
        include_once('../../modelo/datosRemision/ObjetoDatosAdministrativos.php');
        include_once('../../modelo/medico/ModeloMedico.php');
        include_once('../../modelo/historiaClinica/ModeloHistoriaClinica.php');
        include_once("../../modelo/paciente/Modelopaciente.php");
        include_once("../../modelo/paciente/ObjetoPaciente.php");
        ?>
    <title>Modificar Cita</title>

    
</head>
<body>

    <style>
     .ventana{
            background: rgba(128,128,128,0.8);
            width: 30%;
            height: 30%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            text-align: center;
            padding: 25px;
            min-height: 150px;
            border-radius: 15px;
            position: fixed;
            left: 34%;
            top: 35%;
            display: none;
        }           
        
    </style>

<main>
        <section>
            <h1>Verifica y Modifica la cita medica</h1>
            
            <?php
            
    try {

                    $ModDatosRemision = new ModeloDatosRemision();
                    $ModRemision = new ModeloRemision();
                    $ModMedico = new ModeloMedico();
                    $ModPaciente = new ModeloPaciente();
                    $ModHistoria = New ModeloHistoriaClinica();
                    //$tabla = $ModDatosRemision->getRemisionFase1();
                    //$remision = $ModRemision->getRemisionXID($_POST['idRemision']);
                    $DatosPaciente = $ModPaciente->getPacientesXCedua($_POST['numeroDocumento']); 
                    //$Medico = $ModMedico->getMedicoID($_POST['ccMed']);

                    $activador = "desactivar";
                    $noCitas=isset($_POST['noCitas']);
                    echo $noCitas;
                    if(isset($_POST['activar'])=="1"){
                        $activador="activar";
                    }

                    //echo("remision".$remision[2]->getTelefono());
                   
                    //echo($var->getId());
                    //echo("la direccion es".$DatosPaciente->getTelefono());
                ?>
            <form action="../../controlador/auxAdministrativo/AuxAdministrativoControl.php" method="post" enctype="multipart/form-data" name="form1">
                        <input type='text' hidden name='numeroDocumento' value='<?php echo($_POST['numeroDocumento']); ?>'/>
                        <input type='text' hidden name='ccAux' value='<?php echo($_POST['ccAux']); ?>'/>
                        <input type='text' hidden name='idRemision' value='<?php //echo($_POST['idRemision']); ?>'/> 
                        <input type='text' hidden name='numeroHistoria' value='<?php //echo($_POST['numeroHistoria']); ?>'/>
                <div class="field">
                        <label><font color="#006B74" size="4"> 
                            Paciente: </font> <?php echo($_POST['nombrePaciente']);   ?> </label>
                        <label><font color="#006B74" size="4"> Cedula: </font> <?php echo($_POST['numeroDocumento']);    ?> </label>
                        <label><font color="#006B74" size="4"> Telefono: </font> <?php echo($_POST['telefono']);    ?> </label>
                        <label><font color="#006B74" size="4"> Ciudad Cita: </font>  <?php echo($_POST['ciudad']);    ?> </label>
                        <label><font color="#006B74" size="4"> Oficina Cita: </font> <?php echo($_POST['oficina']);    ?> </label>
                        <label><font color="#006B74" size="4">Fecha Cita:</font> <?php echo($_POST['fecha']);    ?> </label>
                        <label><font color="#006B74" size="4">Hora Cita:</font> <?php echo($_POST['horaCita']);    ?> </label>
                        <label><font color="#006B74" size="4"> Fecha Agregado: </font> <?php echo($_POST['fechaAgregado']);   ?> </label>
                </div>
                <div class="field">
                    <form action="../../controlador/auxAdministrativo/AuxAdministrativoControl.php" method="post" enctype="multipart/form-data" name="form2">
                                    <input type='text' hidden name='numeroDocumento' value='<?php echo($_POST['numeroDocumento']); ?>'/>
                                    <input type='text' hidden name='idCita' value='<?php echo($_POST['idCita']); ?>'/>
                                    <? echo ($_POST['idCita']); ?>

                                    <?php    if(isset($_POST['noCitas'])==1){ ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Notificacion!</strong> No hay citas disponibles para el dia <?php echo ($_POST['fechaCita']); ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                    <?php

                                        } ?>
                                    <select id="especialidad" name="oficina" required style="width: 200px;">
                                        <option selected disabled>Seleccione un valor</option>
                                        
                                               <option selected value="Bucaramanga"> Hospital Universitario </option>
                                    </select>
                                    <br />
                                    <select id="especialidad" name="ciudad" required style="width: 200px;">
                                        <option selected disabled>Seleccione un valor</option>
                                        
                                               <option selected value="Bucaramanga"> Bucaramanga </option>
                                    </select>
                                    <br />
                                    <input type="date" require name="fechaCitaMod" id="fechaCitaMod" value="<?php if(isset($_POST['fechaCita'])){ echo($fechaCita); }  ?>" placeholder="Introduce una fecha" style="width: 200px;" 
                                             min=<?php $fecha_actual = date("d-m-Y"); $hoy=date("Y-m-d",strtotime($fecha_actual."+ 1 week"));  echo $hoy;?>
                                            >
                                    <br />
                                    <div>
                                        
                                    <button class="btn btn-outline-info my-2 my-sm-0" value="validarFecha2" name="boton" id="boton" style="max-width: 80px;" >Validar</button>
                                    <a class="btn btn-outline-danger my-2 my-sm-0" type="submit" href="javascript:cancelacion()" onclick="return confirm('Esta seguro de Cancelar?')">Cancelar Cita</a>
                                    </div>


                                    <?php if($activador=="activar"){ ?>
                                        <input type='text' hidden name='idCita' value='<?php echo($_POST['idCita']);  ?>'/>
                                        <input type='text' hidden name='fechaCita' value='<?php echo($_POST['fechaCita']);  ?>'/>
                                        <input type='text' hidden name='ccAux' value='<?php echo($_POST['ccAux']); ?>'/>
                                        
                                        <?php } //echo $_POST['ccAux'];?>
                                    
                                    <label><font color="#006B74" size="6"><?php if(isset($_POST['fechaCita'])){ echo( $_POST['fechaCita']); }  ?></font></label>

                                    <select <?php if($activador=="activar"){ echo(""); }else{ echo("disabled");} ?>  id="horaCita" name="horaCita" required>
                                        <option selected disabled>Seleccione una Hora</option>
                                        
                                        <option <?php if(isset($_POST['13h'])=="13h"){ ?> disabled <?php } ?> value="13h"> 13:00 </option>
                                        <option <?php if(isset($_POST['14h'])=="14h"){ ?> disabled <?php } ?> value="14h"> 14:00 </option>
                                        <option <?php if(isset($_POST['15h'])=="15h"){ ?> disabled <?php } ?> value="15h"> 15:00 </option>
                                        <option <?php if(isset($_POST['16h'])=="16h"){ ?> disabled <?php } ?> value="16h"> 16:00 </option>
                                        <option <?php if(isset($_POST['17h'])=="17h"){ ?> disabled <?php } ?> value="17h"> 17:00 </option>
                                    </select>
                                    <br />
                                    <?php if($activador=="activar"){ 
                                        if($noCitas == 1){ 
                                                echo('<button class="btn btn-outline-info my-2 my-sm-0 disabled" value="asignarCita2" name="boton" id="boton" style="max-width: 120px;" >Asignar cita y Salir</button>');  
                                                } else {
                                                    echo('<button class="btn btn-outline-info my-2 my-sm-0" value="asignarCita2" name="boton" id="boton" style="max-width: 120px;" >Asignar cita y Salir</button>');
                                                    
                                                }}?>
                                </form>



                                
                </div>
                
                







                    
                    

            </form>
            <?php 
        }catch (Exception $e) {
        die("Error: ". $e->getMessage());
    }?>
        </section>
    </main>

</body>

<div class="ventana" id="ventan">
            <form class="form-inline my-2 my-lg-0" method="POST" action="../../controlador/auxAdministrativo/AuxAdministrativoControl.php">
                    <input class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="Cedula del Paciente" 
                    type="search" name="identificacion" id="identificacion" aria-label="Search">

                    <input class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="Motivo Cancelacion" 
                    type="search" name="motivo" id="motivo" aria-label="Search"
                    style="margin-top: 10px; margin-bottom: 10px;">

                    <input class="form-control mr-sm-2" autocomplete="off" value="1095"
                    type="search" name="ccAux" hidden id="ccAux" aria-label="Search">

                    <button class="btn btn-outline-danger  my-2 my-sm-0" type="submit"
                    name="boton" id="boton" value="cancelarCita" >Cancelar Cita</button>
            </form>
                <a  class="btn btn-outline-info my-2 my-sm-0" href="../index/IndexAuxAdministrativo.php" type="button">Salir</a>


        </div>

        

<javascrip>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script type='text/javascript'>
            function cancelacion(){
            document.getElementById("ventan").style.display="block"
            }

</script>
</javascrip>
</html>