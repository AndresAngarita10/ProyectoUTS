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
        include_once("../../modelo/historiaClinica/ModeloHistoriaClinica.php");
        include_once("../../modelo/historiaClinica/ObjetoHistoriaClinica.php");
        ?>
    <title></title>
</head>
<body>

    <style>
                
        
    </style>

<main>
        <section>
                <div id="busqueda" class="col-4 my-auto mx-auto">
                        <h1>Descargar Historia Clinica </h1>
                                <form class="form-inline my-2 my-lg-0" method="POST" action="../../controlador/medico/MedicoControl.php">
                                    <input class="form-control rounded-5 mr-sm-2" autocomplete="off" placeholder="Buscar por cedula" 
                                        type="search" name="numeroDocumento" id="numeroDocumento" aria-label="Search">
                                        
                                    <input class="form-control mr-sm-2" autocomplete="off" value="<?php echo ($_POST['ccMed']); ?>"
                                    type="search" name="ccMed" hidden id="ccMEd" aria-label="Search">   
                                        <button class="btn btn-info btn-success my-2 my-sm-0 rounded-5" type="submit"
                                        name="boton" id="boton" value="busCedulaDescHistoria">Buscar</button>
                                </form>
                                <form name='formSolicitudesTerminadas' action='../index/indexMedicoFinal.php' method='post'>
                                        <input type='text' hidden name='ccMed' id="ccMed" value='<?php echo($_POST['ccMed']);?>'/>

                                        <button class="btn btn-outline-danger  my-2 my-sm-0" style="margin-top: 10px;" type="submit"
                                    name="boton" id="boton" value="#">Salir</button>
                                        
                                </form>
                </div>
            
            <?php
            
    try {
                    $ModDatosRemision = new ModeloDatosRemision();
                    $ModRemision = new ModeloRemision();
                    $ModMedico = new ModeloMedico();
                    $ModPaciente = new ModeloPaciente();
                    $ModHistoriaF1 = new ModeloHistoriaClinica();
                    $tabla = $ModDatosRemision->getRemisionFase1();
                    $busqueda = 0;
                    $numeroDocumento = $_POST['numeroDocumento'];
                    //echo $numeroDocumento;
                    if (isset($_POST['busqueda'])){
                        $busqueda = $_POST['busqueda'];
                    }
                    //echo $busqueda;
                    if($busqueda == 0){
                        $historias = $ModHistoriaF1->getHistoriaF1xCedula($numeroDocumento);
                    }else {
                        $historias = $ModHistoriaF1->getHistoriaF1xCedula($numeroDocumento);
                    }
                    $pacientes = $ModPaciente->getPacientes(); 
                    //echo($_POST['ccAux']);
                   
                    foreach ($historias as $var) {   
                    $DatosPaciente = $ModPaciente->getPacientesXCedua($var->getidentificacionPaciente());
                    //echo($var->getId());
                    //echo("la direccion es".$DatosPaciente->getTelefono());
                ?>
            <form action="DescargarHistoriaClinica.php" method="post" enctype="multipart/form-data" name="form1">
                        <input type='text' hidden name='identificacionPaciente' value='<?php echo($var->getidentificacionPaciente()); ?>'/>
                        <input type='text' hidden name='ccMed' value='<?php echo($_POST['ccMed']); ?>'/>
                        <input type='text' hidden name='numeroHistoria' value='<?php echo($var->getnumeroHistoria()); ?>'/>
                        <?php if($var->getfinalizado()=="1"){ ?>
                                        <input type='text' hidden name='examen2' value='<?php echo("SI");  ?>'/>
                                        <?php } else { ?>
                                            
                                        <input type='text' hidden name='examen2' value='<?php echo("NO");  ?>'/>
                                        <?php } ?>
                <div class="field">
                        <label><font color="#006B74" size="4"> Numero Documento: </font> <?php echo($var->getidentificacionPaciente() );  ?> </label>
                        <label><font color="#006B74" size="4"> 
                            Paciente: </font> <?php echo($DatosPaciente->getPrimerNombre()." ".$DatosPaciente->getSegundoNombre()." "
                                    .$DatosPaciente->getPrimerApellido()." ".$DatosPaciente->getSegundoApellido()." ");   ?> </label>
                        <label><font color="#006B74" size="4"> Origen: </font> <?php echo($DatosPaciente->getCiudad());    ?> </label>
                </div>
                <div class="field">
                        <label><font color="#006B74" size="4"> EPS: </font> <?php echo($DatosPaciente->getEps());    ?>  </label>
                        <label><font color="#006B74" size="4"> Fecha: </font> <?php echo($var->getfrechaAgregado());    ?>  </label>
                </div>
                
                <div class="field">
                        <label><font color="#006B74" size="4"> Motivo Consulta: </font> <?php echo($var->getmotivoConsulta()); ?> </label>
                                        <br />
                        <button class="btn btn-info btn-success my-2 my-sm-0 rounded-5" type="submit"
                                        name="boton" id="boton" value="descaragrHistoria">Descargar Historia Clinica</button>
                </div>
                <div class="submit">
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