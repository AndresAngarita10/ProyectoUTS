<?php 

ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <?php //include '../layout/headerMedico.php'; 
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


        ?>
    <title>Historia Clincia</title>
</head>
<body>

    <style>
             



/*Main*/


section{
    padding: 2rem 0;/*margen superior*/
    /*background-color: #ABF6FC; */
    
}

h5{
    font-size: 1.5rem;
    font-weight: bold;/*poner en negrita*/

    text-align: center;
    text-transform: uppercase;/*pasar el texto a mayuscula*/
    color: #707070;
}

form{
    display: flex;
    flex-wrap: wrap;/*acopla lementos al tamaño del formilario*/
    justify-content: space-between;

    width: 100% ;/*ancho*/
    padding: 0 1rem;/*lateral, el cero es arriba y abajo */ 
    max-width: 1000px;

    margin-left: auto;
    margin-right: auto;
}

.field{
    
    display: flex;
    flex-direction: column;

    width: 20rem;
    margin: 0.5rem 0;
}

.field label{
    font-size: 0.9rem;
    margin-bottom: 0.2rem;

    color: #696969;
}

.field input{
    font-size: 1.1rem;
    height: 2.2rem; /*altura*/
    padding-left: 0.5rem;

    width: 70%; /*ancho */
    border: 2px solid #696969;
    border-radius: 5px;
}

.field select{
    font-size: 1.1rem;
    width: 12rem;
    height: 2.6rem;
    padding-left: 0.5rem;
    border-radius: 5px;
    border: 2px solid #696969;
}


.textbox{
    display: none;
    flex-direction: column;
    width: 30rem;
    margin: 0.75rem 0;
}

.textbox label {
    
    font-size: 0.9rem;
    margin-bottom: 0.2rem;

    color: #696969;
}

textarea{
    font-size: 1.1rem;

    max-width: 100%;
    height: 3rem;
    max-height: 15rem;
    padding-top: 0.5rem;/* margen para la escritura*/
    padding-left: 0.5rem;
    border-radius: 5px;
    border: 2px solid #696969;

}

textarea textbox{
    width: 10rem;
}



.submit{
    display: flex;
    justify-content: center;

    width: 100%;
    flex-direction: row;
    margin-left: auto;
    margin-right: auto;
    margin-top: 1rem;
}
.submit button{
    padding: 0.75rem 1.2rem;

    font-size: 1.3rem;
    border-radius: 5px;
    border: 2px solid #696969; 
}


   
        
    </style>

<main>
        <section>
                <div id="busqueda" class="col-4 my-auto mx-auto">
                        <h5 style="margin-top: -60px; margin-bottom: -20px;">Historia Clinica </h5>
                        <form class="form-inline my-2 my-lg-0" method="POST" action="../../controlador/auxAdministrativo/AuxAdministrativoControl.php">
                                    <input hidden class="form-control rounded-5 mr-sm-2" autocomplete="off" placeholder="" value="<?php echo $_POST['numeroHistoria']; ?>"
                                        type="search" name="numeroDocumento" id="numeroDocumento" aria-label="Search">
                                <?php 
                    if($_POST['examen2']== "SI"){ ?>
                                       <!-- <button class="btn btn-info btn-success my-2 my-sm-0 rounded-5" type="submit"
                                        name="boton" id="boton" value="buscedulaSoliFin" style="margin-left: 120px;">Descargar Historia Clinica</button>
                    -->
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
                        $remision = $ModRemision->getRemisionXHistoria($_POST['numeroHistoria']);
                    $DatosPaciente = $ModPaciente->getPacientesXCedua($_POST['identificacionPaciente']); 
                    //$Medico = $ModMedico->getMedicoID($_POST['ccMed']);
                    $Medico = $ModMedico->getMedicosBucaramanga();
                    $historiaF1 = $ModHistoria->getHistoriaF1($_POST['numeroHistoria']);
                    $historiaF2 = $ModHistoria->getHistoriaF2($_POST['numeroHistoria']);
                    $historiaF3 = $ModHistoria->getHistoriaF3($_POST['numeroHistoria']);
                    $historiaF4 = $ModHistoria->getHistoriaF4($_POST['numeroHistoria']);

                    if($_POST['examen2']== "SI"){
                        $registroSolicitud = new ModeloRegistroSolicitud();
                        $registro = $registroSolicitud->getAllRegistros($remision->getID());
                        
                        $historiaF5 = $ModHistoria->getHistoriaF5($_POST['numeroHistoria']);
                    }


                    
                    //echo($var->getId());
                    //echo("la direccion es".$DatosPaciente->getTelefono());
                    
                ?>
                
                <table>
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label><font color="#006B74" size="4"> Tipo Solicitud: </font> <?php  echo("Remision" );  ?> </label>
                                <label><font color="#006B74" size="4"> Numero Documento: </font> <?php  echo($DatosPaciente->getNumeroDocumento() );  ?> </label>
                                <label><font color="#006B74" size="4"> 
                                Paciente: </font> <?php  echo($DatosPaciente->getPrimerNombre()." ".$DatosPaciente->getSegundoNombre()." "
                                        .$DatosPaciente->getPrimerApellido()." ".$DatosPaciente->getSegundoApellido()." ");   ?> </label>
                               <label><font color="#006B74" size="4"> Origen: </font> <?php  echo($DatosPaciente->getCiudad());    ?> </label>
                                <label><font color="#006B74" size="4"> Destino: </font>  Bucaramanga</label>
                    
                            </td>
                            <td>
                                <label><font color="#006B74" size="4"> Medico: </font> <?php  echo($remision->getmedicosolicitante());   ?>  </label>
                                <label><font color="#006B74" size="4"> Remite: </font> <?php  echo("Medicina General");    ?> </label>
                                <label><font color="#006B74" size="4"> Remitido: </font> <?php  echo($remision->getEspecialidadRemitido());   ?>  </label>
                                <label><font color="#006B74" size="4"> EPS: </font> <?php  echo($DatosPaciente->getEps());    ?>  </label>
                                <label><font color="#006B74" size="4"> Fecha Remision: </font> <?php  echo($remision->getFechaAgregado());    ?>  </label>
                    
                            </td>
                            <td>
                                <label style="margin-top: -80px;"><font color="#006B74" size="4"> Observaciones: </font> <?php echo($remision->getobservaciones()); ?> </label>
               
                            </td>
                        </tr>
                    </tbody>
                </table>



            
                        <h5>Primer Examen Medico</h5>
                                
                <hr width="85%" size="2" />
                
                <table>
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
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
                    
                            </td>
                            <td style="margin-left: 100px;">
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
                    
                            </td>
                            <td style="margin-left: 100px;">
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
                        
                            </td>
                        </tr>
                    </tbody>
                </table>
                <style>
                    #salto{
                        page-break-after: always;
                        border: none;
                        margin: 0;
                        padding: 0;
                    }
                </style>

                <hr id="salto"> <!-- Salto de página -->
                    <?php 
                    if($_POST['examen2']== "SI"){  ?>

                        <h5>Segundo Examen Fisico y Formulacion Medica</h5>
                                
                <hr width="85%" size="2" />
                
                <table>
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label><font color="#006B74" size="4"> TA: </font> <?php echo($historiaF5->getTA());?> <font color="#006B74" size="4"> FC: </font> <?php //echo($historiaF4->getFC());?> <font color="#006B74" size="4"> FR: </font> <?php //echo($historiaF4->getFR());?> </label><br />
                                <label><font color="#006B74" size="4"> Temperatura: </font> <?php echo($historiaF5->gettemperatura()); ?> </label><br />
                                <label><font color="#006B74" size="4"> Peso: </font> <?php echo($historiaF5->getpeso()); ?> </label>
                                <label><font color="#006B74" size="4"> Altura: </font> <?php echo($historiaF5->getaltura());?> </label>
                                <label><font color="#006B74" size="4"> IMC: </font> <?php echo($historiaF5->getimc()); ?> </label>
                                <label><font color="#006B74" size="4"> Impresion General: </font> <?php echo($historiaF5->getimpresionGeneral()); ?> </label><br />
                                <label><font color="#006B74" size="4"> Constitucion: </font> <?php echo($historiaF5->getconstitucion());?> </label><br />
                                <label><font color="#006B74" size="4"> Facies: </font> <?php echo($historiaF5->getfacies()); ?> </label><br />
                                <label><font color="#006B74" size="4"> Actitud: </font> <?php echo($historiaF5->getactitud()); ?> </label><br />
                                <label><font color="#006B74" size="4"> Decubito: </font> <?php echo($historiaF5->getdecubito());?> </label><br />
                                <label><font color="#006B74" size="4"> Marcha: </font> <?php echo($historiaF5->getmarcha()); ?> </label><br />
                                <label><font color="#006B74" size="4"> Aspecto: </font> <?php echo($historiaF5->getaspecto()); ?> </label><br />
                                <label><font color="#006B74" size="4"> Lesiones: </font> <?php echo($historiaF5->getlesiones()); ?> </label>
                            </td>
                            
                            <td>
                                <label style="margin-top: -190px;"><font color="#006B74" size="4"> Formulacion Medica: </font> <?php  echo($registro->getObservacion()); ?> </label>
                        
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="field">
                                
                                
                </div>
                <div class="field">
                        
                </div>
                <?php } ?>
            <?php 
        }catch (Exception $e) {
        die("Error: ". $e->getMessage());
    }?>
        </section>
    </main>
</body>
</html>

<?php 

    $html=ob_get_clean();
    //echo $html;

    require_once '../../libreria/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $option = $dompdf->getOptions();
    $option->set(array('isRemoteEnabled' => true));//activar las imagenes de ser necesarias en el documento
    $dompdf->setOptions($option);

    $dompdf->loadhtml($html);

    $dompdf->setPaper('letter');
    //$dompdf->setPaper('A4', 'landscape'); //sirve para  hoja en A4 y en horizontal

    $dompdf->render();//pone todo lo que puso en el objeto en visible

    $dompdf->stream($remision->getFechaAgregado()."CC:".$DatosPaciente->getNumeroDocumento()
    ."-".$DatosPaciente->getPrimerNombre()."-".$DatosPaciente->getPrimerApellido().".pdf", array("Attachment"=>true));//$DatosPaciente->getNumeroDocumento()."-".$historiaF1->getfrechaAgregado().
?>