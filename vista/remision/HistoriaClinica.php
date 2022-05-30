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
        include_once("../../modelo/registroSolicitud/ModeloRegistroSolicitud.php");
        include_once("../../modelo/registroSolicitud/ObjetoRegistroSolicitud.php");


        
        $ccAuditor = $_POST['ccAuditor'];
        $identificacionPaciente = $_POST['identificacionPaciente'];
        $idRemision = $_POST['idRemision'];
        $numeroHistoria = $_POST['numeroHistoria'];
        $examen2 = $_POST['examen2'];
        ?>
    <title>Historia Clincia</title>
</head>
<body>

    <style>
                
        
    </style>

<main>
        <section>
                <div id="busqueda" class="col-4 my-auto mx-auto">
                        <h1>Historia Clinica </h1>
                        <form class="form-inline my-2 my-lg-0" method="POST" action="DesacargarHistoriaClinica.php">
                                    <input hidden class="form-control rounded-5 mr-sm-2" autocomplete="off" placeholder="" value="<?php echo $_POST['numeroHistoria']; ?>"
                                        type="search" name="numeroDocumento" id="numeroDocumento" aria-label="Search">
                                <?php 
                    if($_POST['examen2']== "SI"){ ?>
                                        
                                        <input type='text' hidden name='ccAuditor' value='<?php echo($ccAuditor);  ?>'/>
                                        <input type='text' hidden name='numeroHistoria' value='<?php echo($numeroHistoria);  ?>'/>
                                        <input type='text' hidden name='identificacionPaciente' value='<?php echo($identificacionPaciente);  ?>'/>
                                        <input type='text' hidden name='idRemision' value='<?php echo($idRemision);  ?>'/>
                                        <input type='text' hidden name='examen2' value='<?php echo($examen2);  ?>'/>
                                        <button class="btn btn-info btn-success my-2 my-sm-0 rounded-5" type="submit"
                                        name="boton" id="boton" value="buscedulaSoliFin" style="margin-left: 120px;">Descargar Historia Clinica</button>
                                
                                <?php } ?>
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

                    //echo $_POST['numeroHistoria'];

                    $ModHistoria = New ModeloHistoriaClinica();
                    //$tabla = $ModDatosRemision->getRemisionFase1();
                    $remision = $ModRemision->getRemisionXID($_POST['idRemision']);
                    $DatosPaciente = $ModPaciente->getPacientesXCedua($_POST['identificacionPaciente']); 
                    //$Medico = $ModMedico->getMedicoID($_POST['ccMed']);
                    $Medico = $ModMedico->getMedicosBucaramanga();
                    $historiaF1 = $ModHistoria->getHistoriaF1($_POST['numeroHistoria']);
                    $historiaF2 = $ModHistoria->getHistoriaF2($_POST['numeroHistoria']);
                    $historiaF3 = $ModHistoria->getHistoriaF3($_POST['numeroHistoria']);
                    $historiaF4 = $ModHistoria->getHistoriaF4($_POST['numeroHistoria']);

                    if($_POST['examen2']== "SI"){
                        $registroSolicitud = new ModeloRegistroSolicitud();
                        $registro = $registroSolicitud->getAllRegistros($_POST['idRemision']);
                        $historiaF5 = $ModHistoria->getHistoriaF5($_POST['numeroHistoria']);
                    }


                    
                    //echo($var->getId());
                    //echo("la direccion es".$DatosPaciente->getTelefono());
                ?>
            <form action="../auxAdministrativo/VerificacionSolicitud.php" method="post" enctype="multipart/form-data" name="form1">
                        <input type='text' hidden name='numeroDocumento' value='<?php  echo($DatosPaciente->getNumeroDocumento()); ?>'/>
                        <input type='text' hidden name='ccMed' value='<?php //  echo($medico->getNumeroDocumento()); ?>'/>
                        <input type='text' hidden name='idRemision' value='<?php  echo($remision->getId()); ?>'/>
                        <input type='text' hidden name='numeroHistoria' value='<?php  echo($remision->getnumeroHistoria()); ?>'/>
                <div class="field">
                        <label><font color="#006B74" size="4"> Tipo Solicitud: </font> <?php  echo("Remision" );  ?> </label>
                        <label><font color="#006B74" size="4"> Numero Documento: </font> <?php  echo($DatosPaciente->getNumeroDocumento() );  ?> </label>
                        <label><font color="#006B74" size="4"> 
                            Paciente: </font> <?php  echo($DatosPaciente->getPrimerNombre()." ".$DatosPaciente->getSegundoNombre()." "
                                     .$DatosPaciente->getPrimerApellido()." ".$DatosPaciente->getSegundoApellido()." ");   ?> </label>
                        <label><font color="#006B74" size="4"> Origen: </font> <?php  echo($DatosPaciente->getCiudad());    ?> </label>
                        <label><font color="#006B74" size="4"> Destino: </font>  Bucaramanga</label>
                        <label><font color="#006B74" size="4"> Medico  Solicitante: </font> <?php  echo($remision->getmedicosolicitante());   ?>  </label>
                </div>
                <div class="field">
                        <label><font color="#006B74" size="4"> Remite: </font> <?php  echo("Medicina General");    ?> </label>
                        <label><font color="#006B74" size="4"> Remitido: </font> <?php  echo($remision->getEspecialidadRemitido());   ?>  </label>
                        <label><font color="#006B74" size="4"> EPS: </font> <?php  echo($DatosPaciente->getEps());    ?>  </label>
                        <label><font color="#006B74" size="4"> Fecha Remision: </font> <?php  echo($remision->getFechaAgregado());    ?>  </label>
                </div>
                
                <div class="field">
                        <label><font color="#006B74" size="4"> Observaciones: </font> <?php echo($remision->getobservaciones()); ?> </label>
                        
                </div>
                <div id="busqueda" class="col-6 my-auto mx-auto">
                        <h1>Primer Examen Medico</h1>
                                
                </div>
                <hr width="85%" size="2" />
                
                <div class="field">
                                <label><font color="#006B74" size="4"> AlcoholHT: </font> <?php  echo($historiaF2->getalcoholHT()); ?> </label>
                                <label><font color="#006B74" size="4"> TabacoHT: </font> <?php  echo($historiaF2->gettabacoHT());    ?> </label>
                                <label><font color="#006B74" size="4"> DrogasHT: </font>  <?php  echo($historiaF2->getdrogasHT());    ?></label>
                                <label><font color="#006B74" size="4"> InfucionesHT:   </font> <?php echo($historiaF2->getinfucionesHT()); ?></label>
                                <label><font color="#006B74" size="4"> AlimentacionHF: </font> <?php echo($historiaF2->getalimentacionHF()); ?> </label>
                                <label><font color="#006B74" size="4"> DiuresisHF: </font> <?php echo($historiaF2->getdiuresisHF());    ?> </label>
                                <label><font color="#006B74" size="4"> CatarsisHF: </font>  <?php echo($historiaF2->getcatarsisHF());    ?></label>
                                <label><font color="#006B74" size="4"> SueñoHF:  </font> <?php echo($historiaF2->getsueñoHF()); ?></label>
                                <label><font color="#006B74" size="4"> SexualidadHF: </font> <?php echo($historiaF2->getsexualidadHF()); ?> </label>
                                <label><font color="#006B74" size="4"> OtrosHF: </font> <?php echo($historiaF2->getotrosHF());    ?> </label>
                                <label><font color="#006B74" size="4"> Enf Infacia: </font>  <?php echo($historiaF2->getenfermedadesInfancia());    ?></label>
                                <label><font color="#006B74" size="4"> Ant Heredados: </font> <?php echo($historiaF2->getantecedentesHeredados()); ?></label>
                </div>

                <div class="field">
                                    
                                    <label><font color="#006B74" size="4"> Cardio Vascular: </font> <?php echo($historiaF3->getCV());?> </label>
                                    <label><font color="#006B74" size="4"> Respiratorio: </font> <?php echo($historiaF3->getrespiratorio()); ?> </label>
                                    <label><font color="#006B74" size="4"> Gastrointestinales: </font> <?php  echo($historiaF3->getgastrointestinales()); ?> </label>
                                    <label><font color="#006B74" size="4"> Nefrourologicos: </font> <?php echo($historiaF3->getnefrourologicos());?> </label>
                                    <label><font color="#006B74" size="4"> Neurologicos: </font> <?php echo($historiaF3->getneurologicos()); ?> </label>
                                    <label><font color="#006B74" size="4"> Hematologicos: </font> <?php echo($historiaF3->gethematologicos()); ?> </label>
                                    <label><font color="#006B74" size="4"> Ginecologicos: </font> <?php echo($historiaF3->getginecologicos());?> </label>
                                    <label><font color="#006B74" size="4"> Infectologicos: </font> <?php echo($historiaF3->getinfectologicos()); ?> </label>
                                    <label><font color="#006B74" size="4"> Endocrinologicos: </font> <?php echo($historiaF3->getendocrinologicos()); ?> </label>
                                    <label><font color="#006B74" size="4"> Quirurgicos: </font> <?php echo($historiaF3->getquirurgicos());?> </label>
                                    <label><font color="#006B74" size="4"> Traumatologicos: </font> <?php echo($historiaF3->gettraumatologicos()); ?> </label>
                                    <label><font color="#006B74" size="4"> Alergicos: </font> <?php echo($historiaF3->getalergicos()); ?> </label>
                    </div>
                    <div class="field">
                                
                                <label><font color="#006B74" size="4"> TA: </font> <?php echo($historiaF4->getTA());?> <font color="#006B74" size="4"> FC: </font> <?php echo($historiaF4->getFC());?> <font color="#006B74" size="4"> FR: </font> <?php echo($historiaF4->getFR());?> </label>
                                <label><font color="#006B74" size="4"> Temperatura: </font> <?php echo($historiaF4->gettemperatura()); ?> </label>
                                <label><font color="#006B74" size="4"> Peso: </font> <?php echo($historiaF4->getpeso()); ?> </label>
                                <label><font color="#006B74" size="4"> Altura: </font> <?php echo($historiaF4->getaltura());?> </label>
                                <label><font color="#006B74" size="4"> IMC: </font> <?php echo($historiaF4->getimc()); ?> </label>
                                <label><font color="#006B74" size="4"> Impresion General: </font> <?php echo($historiaF4->getimpresionGeneral()); ?> </label>
                                <label><font color="#006B74" size="4"> Constitucion: </font> <?php echo($historiaF4->getconstitucion());?> </label>
                                <label><font color="#006B74" size="4"> Facies: </font> <?php echo($historiaF4->getfacies()); ?> </label>
                                <label><font color="#006B74" size="4"> Actitud: </font> <?php echo($historiaF4->getactitud()); ?> </label>
                                <label><font color="#006B74" size="4"> Decubito: </font> <?php echo($historiaF4->getdecubito());?> </label>
                                <label><font color="#006B74" size="4"> Marcha: </font> <?php echo($historiaF4->getmarcha()); ?> </label>
                                <label><font color="#006B74" size="4"> Aspecto: </font> <?php echo($historiaF4->getaspecto()); ?> </label>
                                <label><font color="#006B74" size="4"> Lesiones: </font> <?php echo($historiaF4->getlesiones()); ?> </label>
                    </div>
                    <?php 
                    if($_POST['examen2']== "SI"){  ?>

                    <div id="busqueda" class="col-12 my-auto mx-auto">
                        <h1>Segundo Examen Fisico y Formulacion Medica</h1>
                                
                </div>
                <hr width="85%" size="2" />
                <div class="field">
                                
                                <label><font color="#006B74" size="4"> TA: </font> <?php echo($historiaF5->getTA());?> <font color="#006B74" size="4"> FC: </font> <?php //echo($historiaF4->getFC());?> <font color="#006B74" size="4"> FR: </font> <?php //echo($historiaF4->getFR());?> </label>
                                <label><font color="#006B74" size="4"> Temperatura: </font> <?php echo($historiaF5->gettemperatura()); ?> </label>
                                <label><font color="#006B74" size="4"> Peso: </font> <?php echo($historiaF5->getpeso()); ?> </label>
                                <label><font color="#006B74" size="4"> Altura: </font> <?php echo($historiaF5->getaltura());?> </label>
                                <label><font color="#006B74" size="4"> IMC: </font> <?php echo($historiaF5->getimc()); ?> </label>
                                <label><font color="#006B74" size="4"> Impresion General: </font> <?php echo($historiaF5->getimpresionGeneral()); ?> </label>
                                <label><font color="#006B74" size="4"> Constitucion: </font> <?php echo($historiaF5->getconstitucion());?> </label>
                                <label><font color="#006B74" size="4"> Facies: </font> <?php echo($historiaF5->getfacies()); ?> </label>
                                <label><font color="#006B74" size="4"> Actitud: </font> <?php echo($historiaF5->getactitud()); ?> </label>
                                <label><font color="#006B74" size="4"> Decubito: </font> <?php echo($historiaF5->getdecubito());?> </label>
                                <label><font color="#006B74" size="4"> Marcha: </font> <?php echo($historiaF5->getmarcha()); ?> </label>
                                <label><font color="#006B74" size="4"> Aspecto: </font> <?php echo($historiaF5->getaspecto()); ?> </label>
                                <label><font color="#006B74" size="4"> Lesiones: </font> <?php echo($historiaF5->getlesiones()); ?> </label>
                </div>
                <div class="field">
                        <label><font color="#006B74" size="4"> Formulacion Medica: </font> <?php  echo($registro->getObservacion()); ?> </label>
                        
                </div>
                <?php } ?>
            </form>
            <?php 
        }catch (Exception $e) {
        die("Error: ". $e->getMessage());
    }?>
        </section>
    </main>
</body>
</html>

<?php 

?>