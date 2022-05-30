<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/remisionPend.css" rel="stylesheet" type="text/css" />
    <link href="../../estilos/resets.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    
  <?php include '../layout/headerMedico.php'; 
        include_once('../../modelo/datosRemision/ModeloDatosRemision.php');
        include_once('../../modelo/datosRemision/ModeloRemision.php');
        include_once('../../modelo/datosRemision/ObjetoDatosAdministrativos.php');
        include_once('../../modelo/medico/ModeloMedico.php');
        include_once("../../modelo/paciente/Modelopaciente.php");
        include_once("../../modelo/paciente/ObjetoPaciente.php");
        include_once("../../modelo/citas/ModeloCitas.php");
        include_once("../../modelo/citas/ObjetoCitas.php");

    /*
        echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");
        echo "------- la fecha actual es " . date("l") . " del " . date("l") . " de " . date("l");
        $ahora = time();
        $unDiaEnSegundos = 24 * 60 * 60;   
        $manana = $ahora + $unDiaEnSegundos;
        //echo "----- ". date("Y-m-d", $manana);
        //echo "----- ". date("l", $manana);
        $nombreDiaSemana = date("l", $manana);
        if ($nombreDiaSemana == "Saturday"){
            echo "  mañana es sabado ". date("Y-m-d", $manana);
            $manana = $ahora + $unDiaEnSegundos*2;
            $nombreDiaSemana = date("l", $manana);
            echo "----- "."eco sabado ---";
        }
        if ($nombreDiaSemana == "Sunday"){
            echo "----   domingo ". date("Y-m-d", $manana);
            $manana = $ahora + $unDiaEnSegundos*3;
            $nombreDiaSemana = date("l", $manana);
            echo "-----! ". date("Y-m-d", $manana);
            echo "-- ". $nombreDiaSemana;
        }
        */
        ?>
    <title>Document</title>
</head>
<body>

    <style>
                
        
    </style>

<main>
        <section>
            <h1>Citas Para Dia Habil Siguiente</h1>
            
            <?php
            
    try {
                    $ModDatosRemision = new ModeloDatosRemision();
                    $ModRemision = new ModeloRemision();
                    $ModeloCitas = new ModeloCitas();
                    $ModMedico = new ModeloMedico();
                    $ModPaciente = new ModeloPaciente();
                    $tabla = $ModDatosRemision->getRemisionFase1();
                    $remision = $ModRemision->getRemisionFase1RR();
                    $pacientes = $ModPaciente->getPacientes(); 
                    $citasxLlamar = $ModeloCitas->citasxllamar();
                    //echo("remision".$remision[2]->getTelefono());
                   
                    foreach ($citasxLlamar as $var) {   
                       // echo ("-- ".$var->getNumeroDocumento()." --");
                    $DatosPaciente = $ModPaciente->getPacientesXCedua($var->getNumeroDocumento());
                    $rem = $ModRemision->getRemisionXCedula($var->getNumeroDocumento());
                    $medico = $ModMedico->getMedicoCodigo($rem->getfkIdMedico());
                    //echo($var->getId());
                    //echo("la direccion es".$DatosPaciente->getTelefono());
                ?>
            <form action="../../controlador/auxAdministrativo/AuxAdministrativoControl.php" method="post" enctype="multipart/form-data" name="form1">
                        <input type='text' hidden name='numeroDocumento' value='<?php echo($var->getNumeroDocumento()); ?>'/>
                        <input type='text' hidden name='ccMed' value='<?php echo( ""); ?>'/>
                        <input type='text' hidden name='idRemision' value='<?php echo($var->getId()); ?>'/>
                        <input type='text' hidden name='numeroHistoria' value='<?php echo($var->getnumeroHistoria()); ?>'/>
                        <input type='text' hidden name='idcita' value='<?php echo($var->getId()); ?>'/>
                <div class="field">
                        <label><font color="#006B74" size="4"> 
                            Paciente: </font> <?php echo($var->getNombrePaciente());   ?> </label>
                        <label><font color="#006B74" size="4"> Origen: </font> <?php echo($DatosPaciente->getCiudad());    ?> </label>
                        <label><font color="#006B74" size="4"> Destino: </font>  Bucaramanga</label>
                        <label><font color="#006B74" size="4"> Medico  Solicitante: </font> <?php echo($medico->getPrimerNombre()." ".$medico->getSegundoApellido());   ?>  </label>
                        <label><font color="#006B74" size="5"> Telefono:  <?php echo($DatosPaciente->getTelefono());   ?>  </font></label>
                </div>
                <div class="field">
                        <label><font color="#006B74" size="4"> EPS: </font> <?php echo( $DatosPaciente->getEps());    ?>  </label>
                        <label><font color="#006B74" size="4"> Fecha Cita: </font> <?php echo($var->getFechaCita());    ?>  </label>
                        <label><font color="#006B74" size="4"> Hora Cita: </font> <?php echo($var->getHoraCita());    ?>  </label>
                </div>
                
                <div class="field">
                    <button class="btn btn-outline-success" style="margin-bottom: 10px;" name="boton" id="boton"
                    onclick="return confirm('Esta seguro de confirmar cita?')" value="confirmo">Confirmo</button>
                    <button class="btn btn-outline-danger" name="boton" id="boton"
                    onclick="return confirm('Esta seguro?')" value="noconfirmo"> No Confirmo</button>
                    
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