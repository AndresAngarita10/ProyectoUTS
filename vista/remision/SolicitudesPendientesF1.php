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
        ?>
    <title>Document</title>
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
                    $tabla = $ModDatosRemision->getRemisionFase1();
                    $remision = $ModRemision->getRemisionFase1RR();
                    $pacientes = $ModPaciente->getPacientes(); 
                    //echo("remision".$remision[2]->getTelefono());
                   
                    foreach ($remision as $var) {   
                    $DatosPaciente = $ModPaciente->getPacientesXCedua($var->getidentificacionPaciente());
                    $medico = $ModMedico->getMedicoCodigo($var->getfkIdMedico());
                    //echo($var->getId());
                    //echo("la direccion es".$DatosPaciente->getTelefono());
                ?>
            <form action="../auxAdministrativo/VerificacionSolicitud.php" method="post" enctype="multipart/form-data" name="form1">
                        <input type='text' hidden name='numeroDocumento' value='<?php echo($var->getidentificacionPaciente()); ?>'/>
                        <input type='text' hidden name='ccMed' value='<?php echo($medico->getNumeroDocumento()); ?>'/>
                        <input type='text' hidden name='idRemision' value='<?php echo($var->getId()); ?>'/>
                        <input type='text' hidden name='numeroHistoria' value='<?php echo($var->getnumeroHistoria()); ?>'/>
                <div class="field">
                        <label><font color="#006B74" size="4"> Tipo Solicitud: </font> <?php echo($var->getTipoSolicitud() );  ?> </label>
                        <label><font color="#006B74" size="4"> 
                            Paciente: </font> <?php echo($DatosPaciente->getPrimerNombre()." ".$DatosPaciente->getSegundoNombre()." "
                                    .$DatosPaciente->getPrimerApellido()." ".$DatosPaciente->getSegundoApellido()." ");   ?> </label>
                        <label><font color="#006B74" size="4"> Origen: </font> <?php echo($DatosPaciente->getCiudad());    ?> </label>
                        <label><font color="#006B74" size="4"> Destino: </font>  Bucaramanga</label>
                        <label><font color="#006B74" size="4"> Medico  Solicitante: </font> <?php echo($var->getmedicosolicitante());   ?>  </label>
                </div>
                <div class="field">
                        <label><font color="#006B74" size="4"> Remite: </font> <?php echo($var->getEspecialidadRemite());    ?> </label>
                        <label><font color="#006B74" size="4"> Remitido: </font> <?php echo($var->getEspecialidadRemitido());   ?>  </label>
                        <label><font color="#006B74" size="4"> EPS: </font> <?php echo($var->getEntidadResponsablePago());    ?>  </label>
                        <label><font color="#006B74" size="4"> Fecha: </font> <?php echo($var->getFechaAgregado());    ?>  </label>
                </div>
                
                <div class="field">
                        <label><font color="#006B74" size="4"> Observaciones: </font> <?php echo($var->getobservaciones()); ?> </label>
                </div>
                <div class="submit">
                    <button>Acceder</button>
                </div>
                
                <hr width="85%" size="2" />
            </form>
            <?php }
        }catch (Exception $e) {
        die("Error: ". $e->getMessage());
    }?>
        </section>
    </main>
</body>
</html>