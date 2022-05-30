<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/remisionPend.css" rel="stylesheet" type="text/css" />
    <link href="../../estilos/resets.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
    
  <?php include '../layout/headerMedico.php'; 
        include_once('../../modelo/datosRemision/ModeloDatosRemision.php');
        include_once('../../modelo/datosRemision/ModeloRemision.php');
        include_once('../../modelo/datosRemision/ObjetoDatosAdministrativos.php');
        include_once('../../modelo/medico/ModeloMedico.php');
        include_once("../../modelo/paciente/Modelopaciente.php");
        include_once("../../modelo/paciente/ObjetoPaciente.php");
        include_once("../../modelo/citas/ModeloCitas.php");
        include_once("../../modelo/citas/ObjetoCitas.php");
        ?>
    <title>Document</title>
    <?php 
        include_once("../../modelo/medico/ModeloMedico.php");
        $Med = new ModeloMedico;
        //echo $_POST['ccMed'];
        $validarMed = $Med->getMedicoXCedula($_POST['ccMed']);
        //echo ($validarMed->getPrimerNombre());
        if($validarMed==null){
            header("Location: ../../index.php");
        }
    ?>
</head>
<body>

    <style>
                
        
    </style>

<main>
        <section>
            <h1>Solicitudes Pendientes Por Remitir</h1>
            
            <?php
            
    try {
                    $ModDatosRemision = new ModeloDatosRemision();
                    $ModRemision = new ModeloRemision();
                    $ModMedico = new ModeloMedico();
                    $ModPaciente = new ModeloPaciente();
                    $ModCitas = new ModeloCitas();
                    $tabla = $ModDatosRemision->getRemisionFase1();
                    //$remision = $ModRemision->getRemisionFase1RR();
                    //echo date('d-m-Y');
                    $cita = $ModCitas->getCitasXFechaSinTomar(date('2022-05-31'), $_POST['ccMed']);
                    $pacientes = $ModPaciente->getPacientes(); 
                    //echo("remision".$remision[2]->getTelefono());
                   
                    foreach ($cita as $var) {   
                    $DatosPaciente = $ModPaciente->getPacientesXCedua($var->getNumeroDocumento());
                    $medico = $ModMedico->getMedicoCodigo($var->getFk_IdMedico());
                    $remision = $ModRemision->getRemisionXHistoria($var->getnumeroHistoria());
                    //echo($var->getId());
                    //echo("la direccion es".$DatosPaciente->getTelefono());
                ?>
            <form action="../../controlador/medico/MedicoControl.php" method="post" enctype="multipart/form-data" name="form1">
                        <input type='text' hidden name='numeroDocumento' value='<?php  echo($var->getNumeroDocumento()); ?>'/>
                        <input type='text' hidden name='ccMed' value='<?php echo($_POST['ccMed']); ?>'/>
                        <input type='text' hidden name='idRemision' value='<?php echo($remision->getId()); ?>'/>
                        <input type='text' hidden name='numeroHistoria' value='<?php echo($var->getnumeroHistoria()); ?>'/>
                        <input type='text' hidden name='idCita' value='<?php echo($var->getId()); ?>'/>
                <div class="field">
                        <label><font color="#006B74" size="4"> Numero Documento: </font> <?php echo($var->getNumeroDocumento() );  ?> </label>
                        <label><font color="#006B74" size="4"> 
                            Paciente: </font> <?php echo($DatosPaciente->getPrimerNombre()." ".$DatosPaciente->getSegundoNombre()." "
                                    .$DatosPaciente->getPrimerApellido()." ".$DatosPaciente->getSegundoApellido()." ");   ?> </label>
                        <label><font color="#006B74" size="4"> Origen: </font> <?php echo($DatosPaciente->getCiudad());    ?> </label>
                        <label><font color="#006B74" size="4"> Destino: </font>  Bucaramanga</label>
                        <label><font color="#006B74" size="4"> Medico  Solicitante: </font> <?php //echo($var->getmedicosolicitante());   ?>  </label>
                </div>
                <div class="field">
                        <label><font color="#006B74" size="4"> Remitido: </font> <?php echo($remision->getEspecialidadRemitido());   ?>  </label>
                        <label><font color="#006B74" size="4"> EPS: </font> <?php echo($remision->getEntidadResponsablePago());    ?>  </label>
                        <label><font color="#006B74" size="4"> Fecha Cita: </font> <?php echo($var->getFechaCita());    ?>  </label>
                        <label><font color="#006B74" size="4"> Hora Cita: </font> <?php echo($var->gethoraCita());    ?>  </label>
                </div>
                
                <div class="field">
                        <label><font color="#006B74" size="4"> Observaciones: </font> <?php echo($remision->getobservaciones()); ?> </label>
                </div>
                <div class="submit">
                    <button style="margin-bottom: 60px;" name="boton" id="boton" value="AbrirCita">Abrir Cita</button>
                    
                    <button style="margin-left: 150px; margin-bottom: 60px; background-color: #E0560C;" id="boton" name="boton" value="NoAsistio">No Asistio</button>
                </div>
            </form>
            <?php }
        }catch (Exception $e) {
        die("Error: ". $e->getMessage());
    }?>
        </section>
    </main>
</body>
</html>