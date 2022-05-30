<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/remisionPend.css" rel="stylesheet" type="text/css" />
    <link href="../../estilos/resets.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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
                <div id="busqueda" class="col-4 my-auto mx-auto">
                        <h1>Solicitudes Finalizadas</h1>
                                <form class="form-inline my-2 my-lg-0" method="POST" action="../../controlador/auxAdministrativo/AuxAdministrativoControl.php">
                                    <input class="form-control rounded-5 mr-sm-2" autocomplete="off" placeholder="Buscar por cedula" 
                                        type="search" name="numeroDocumento" id="numeroDocumento" aria-label="Search">

                                        <button class="btn btn-info btn-success my-2 my-sm-0 rounded-5" type="submit"
                                        name="boton" id="boton" value="buscedulaSoliFin">Buscar</button>
                                </form>
                </div>
            
            <?php
            
    try {
                    $ModDatosRemision = new ModeloDatosRemision();
                    $ModRemision = new ModeloRemision();
                    $ModMedico = new ModeloMedico();
                    $ModPaciente = new ModeloPaciente();
                    $tabla = $ModDatosRemision->getRemisionFase1();
                    $busqueda = 0;
                    if (isset($_POST['busqueda'])){
                        $busqueda = $_POST['busqueda'];
                    }
                    if($busqueda == 0){
                        $remision = $ModRemision->getRemisionFinalizada();
                    }else {
                        $numeroDocumento = $_POST['numeroDocumento'];
                        $remision = $ModRemision->getAllRemisionCedula($numeroDocumento);
                    }
                    $pacientes = $ModPaciente->getPacientes(); 
                    //echo($_POST['ccAux']);
                   
                    foreach ($remision as $var) {   
                    $DatosPaciente = $ModPaciente->getPacientesXCedua($var->getidentificacionPaciente());
                    $medico = $ModMedico->getMedicoCodigo($var->getfkIdMedico());
                    //echo($var->getId());
                    //echo("la direccion es".$DatosPaciente->getTelefono());
                ?>
            <form action="../remision/DesacargarHistoriaClinica.php" method="post" enctype="multipart/form-data" name="form1">
                        <input type='text' hidden name='identificacionPaciente' value='<?php echo($var->getidentificacionPaciente()); ?>'/>
                        <input type='text' hidden name='ccMed' value='<?php echo($medico->getNumeroDocumento()); ?>'/>
                        <input type='text' hidden name='idRemision' value='<?php echo($var->getId()); ?>'/>
                        <input type='text' hidden name='examen2' value='<?php echo("SI");  ?>'/>
                        <input type='text' hidden name='numeroHistoria' value='<?php echo($var->getnumeroHistoria()); ?>'/>
                <div class="field">
                        <label><font color="#006B74" size="4"> Tipo Solicitud: </font> <?php echo($var->getTipoSolicitud() );  ?> </label>
                        <label><font color="#006B74" size="4"> Numero Documento: </font> <?php echo($var->getidentificacionPaciente() );  ?> </label>
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
                        
                        <button class="btn btn-info btn-success my-2 my-sm-0 rounded-5" type="submit"
                                        name="boton" id="boton" value="descaragrHistoria">Descargar Historia Clinica</button>
                                        <br />
            </form>
                            <form action="#" method="POST">
                                    <button disabled class="btn btn-info btn-success my-2 my-sm-0 rounded-5" type="submit"
                                    name="boton" id="boton" value="verificar">Verificado</button>

                            </form>
                </div>
                <div class="submit">
                </div>
                
                <hr width="85%" size="2" />
            <?php }
        }catch (Exception $e) {
        die("Error: ". $e->getMessage());
    }?>
        </section>
    </main>
</body>
</html>