<!DOCTYPE html>
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
    <title>Document</title>
    
</head>
<body>

    <style>
                
        
    </style>

<main>
        <section>
            <h1>Verifica y asigna la cita medica</h1>
            
            <?php
            
    try {

                    $ModDatosRemision = new ModeloDatosRemision();
                    $ModRemision = new ModeloRemision();
                    $ModMedico = new ModeloMedico();
                    $ModPaciente = new ModeloPaciente();
                    $ModHistoria = New ModeloHistoriaClinica();
                    //$tabla = $ModDatosRemision->getRemisionFase1();
                    $remision = $ModRemision->getRemisionXID($_POST['idRemision']);
                    $DatosPaciente = $ModPaciente->getPacientesXCedua($_POST['numeroDocumento']); 
                    //$Medico = $ModMedico->getMedicoID($_POST['ccMed']);
                    $Medico = $ModMedico->getMedicosBucaramanga();
                    $historiaF1 = $ModHistoria->getHistoriaF1($_POST['numeroHistoria']);
                    $historiaF2 = $ModHistoria->getHistoriaF2($_POST['numeroHistoria']);
                    $historiaF3 = $ModHistoria->getHistoriaF3($_POST['numeroHistoria']);
                    $historiaF4 = $ModHistoria->getHistoriaF4($_POST['numeroHistoria']);

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
                        <input type='text' hidden name='ccMed' value='<?php echo($_POST['ccMed']); ?>'/>
                        <input type='text' hidden name='idRemision' value='<?php echo($_POST['idRemision']); ?>'/> 
                        <input type='text' hidden name='numeroHistoria' value='<?php echo($_POST['numeroHistoria']); ?>'/>
                <div class="field">
                        <label><font color="#006B74" size="4"> Historia Clinica: </font> <?php echo($remision->getnumeroHistoria() );  ?> </label>
                        <label><font color="#006B74" size="4"> 
                            Paciente: </font> <?php echo($DatosPaciente->getPrimerNombre()." ".$DatosPaciente->getSegundoNombre()." "
                                    .$DatosPaciente->getPrimerApellido()." ".$DatosPaciente->getSegundoApellido()." ");   ?> </label>
                        <label><font color="#006B74" size="4"> Origen: </font> <?php echo($DatosPaciente->getCiudad());    ?> </label>
                        <label><font color="#006B74" size="4"> Destino: </font>  Bucaramanga</label>
                        <label><font color="#006B74" size="4"> Medico  Solicitante: </font> <?php echo($remision->getmedicosolicitante());   ?>  </label>
                        <label><font color="#006B74" size="5"> Telefono:  <?php echo($DatosPaciente->getTelefono());    ?> </font></label>
                </div>
                <div class="field">
                        <label><font color="#006B74" size="4"> Remite: </font> Medicina General </label>
                        <label><font color="#006B74" size="4"> Remitido: </font> <?php echo($remision->getEspecialidadRemitido());   ?>  </label>
                        <label><font color="#006B74" size="4"> EPS: </font> <?php echo($remision->getEntidadResponsablePago());    ?>  </label>
                        <label><font color="#006B74" size="4"> Fecha: </font> <?php echo($remision->getFechaAgregado());    ?>  </label>
                </div>
                
                <div class="field">
                        <label><font color="#006B74" size="4"> Observaciones: </font> <?php echo($remision->getobservaciones()); ?> </label>
                </div>






                
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <label><font color="#006B74" size="5"> Antecedentes Personales </font>
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="field">
                                <label><font color="#006B74" size="4"> AlcoholHT: </font> <?php echo($historiaF2->getalcoholHT()); ?> </label>
                                <label><font color="#006B74" size="4"> TabacoHT: </font> <?php echo($historiaF2->gettabacoHT());    ?> </label>
                                <label><font color="#006B74" size="4"> DrogasHT: </font>  <?php echo($historiaF2->getdrogasHT());    ?></label>
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
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <label><font color="#006B74" size="5"> Enfermedades </font> <?php    ?> </label>
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="field">
                                    
                                    <label><font color="#006B74" size="4"> Cardio Vascular: </font> <?php echo($historiaF3->getCV());?> </label>
                                    <label><font color="#006B74" size="4"> Respiratorio: </font> <?php echo($historiaF3->getrespiratorio()); ?> </label>
                                    <label><font color="#006B74" size="4"> Gastrointestinales: </font> <?php echo($historiaF3->getgastrointestinales()); ?> </label>
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
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <label><font color="#006B74" size="5"> Examen Fisico </font> <?php  ?> </label>
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
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
                        </div>
                        </div>
                    </div>
                    </div>




                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <label><font color="#006B74" size="5"> Seleccione Dia Cita Medica </font> </label>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="field">
                                <form action="../../controlador/auxAdministrativo/AuxAdministrativoControl.php" method="post" enctype="multipart/form-data" name="form2">
                                    <input type='text' hidden name='numeroDocumento' value='<?php echo($_POST['numeroDocumento']); ?>'/>
                                    <!-- <input type='text' hidden name='ccMed' value='<?php // echo($_POST['ccMed']); ?>'/> -->
                                    <input type='text' hidden name='idRemision' value='<?php echo($_POST['idRemision']); ?>'/> 
                                    <input type='text' hidden name='numeroHistoria' value='<?php echo($_POST['numeroHistoria']); ?>'/>

                                <?php    if(isset($_POST['noCitas'])==1){ ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Notificacion!</strong> No hay citas disponibles para el dia <?php echo ($_POST['fechaCita']); ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                    <?php

                                        } ?>
                                    <select id="especialidad" name="oficina" required style="width: 330px;">
                                        <option selected disabled>Seleccione un valor</option>
                                        
                                               <option selected value="Hospital Universitario"> Hospital Universitario </option>
                                    </select>
                                    <br />
                                    <select id="especialidad" name="ciudad" required style="width: 330px;">
                                        <option selected disabled>Seleccione un valor</option>
                                        
                                               <option selected value="Bucaramanga"> Bucaramanga </option>
                                    </select>
                                    
                                    <br />
                                    <input type="date" require name="fechaCita" id="fechaCita" value="<?php if(isset($_POST['fechaCita'])){ echo($fechaCita); }  ?>" placeholder="Introduce una fecha" style="width: 330px;" 
                                            required min=<?php $fecha_actual = date("d-m-Y"); $hoy=date("Y-m-d",strtotime($fecha_actual."+ 1 week"));  echo $hoy;?>
                                            >
                                    <br />
                                    <button class="btn btn-outline-info my-2 my-sm-0" value="validarFecha" name="boton" id="boton" style="max-width: 80px;" >Validar</button>
                                </form>
                                </div>    
                            </div>
                            </div>
                        </div><?php //if($activador=="activar"){ echo(""); }else{ echo("disabled");} ?> 
                        <div class="accordion-item " >
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                <label><font color="#006B74" size="5"> Seleccione Hora Cita Medica </font> </label>
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse <?php if($activador=="activar"){ echo("show"); }else{ echo("");} ?> " aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <form action="../../controlador/auxAdministrativo/AuxAdministrativoControl.php" method="post" enctype="multipart/form-data" name="form2">
                                    <?php if($activador=="activar"){ ?>
                                        <input type='text' hidden name='idRemision' value='<?php echo($_POST['idRemision']);  ?>'/>
                                        <input type='text' hidden name='numeroDocumento' value='<?php echo($_POST['numeroDocumento']);  ?>'/>
                                        <input type='text' hidden name='numeroHistoria' value='<?php echo($_POST['numeroHistoria']); ?>'/>
                                        <input type='text' hidden name='fechaCita' value='<?php echo($_POST['fechaCita']);  ?>'/>
                                        <input type='text' hidden name='oficina' value='<?php echo($_POST['oficina']);  ?>'/>
                                        <input type='text' hidden name='ciudad' value='<?php echo($_POST['ciudad']);  ?>'/>
                                        <input type='text' hidden id="ccMed"  name='ccMed'  value='<?php //echo($_POST['ccMed']);  ?>'/>
                                        <input type='text' hidden name='idAux' value='<?php echo($_POST['ccMed']);  ?>'/>
                                        <?php } ?>
                                <div class="field">
                                <label>Seleccione medico</label>
                                    <select id="Med" name="Med" onchange="mostrarValor(this.options[this.selectedIndex].innerHTML);" required style="width: 330px;">
                                        <option selected disabled>Seleccione un medico</option>
                                            <?php 
                                            foreach($Medico as $valor){
                                                ?>
                                                    <option  value="<?php  echo($valor->getNumeroDocumento()); ?>"> <?php echo($valor->getNumeroDocumento()." ". $valor->getPrimerNombre()." ". $valor->getPrimerApellido()." > ".$valor->getespecialidad()) ?> </option>
                                                <?php
                                            }
                                            ?>
                                               
                                    </select>
                                    
                                    <label><font color="#006B74" size="6"><?php if(isset($_POST['fechaCita'])){ echo($_POST['fechaCita']); }  ?></font></label>

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
                                                echo('<button class="btn btn-outline-info my-2 my-sm-0 disabled" value="asignarCita" name="boton" id="boton" style="max-width: 120px;" >Asignar cita y Salir</button>');  
                                                } else {
                                                    echo('<button class="btn btn-outline-info my-2 my-sm-0" value="asignarCita" name="boton" id="boton" style="max-width: 120px;" >Asignar cita y Salir</button>');
                                                    
                                                }}?>
                                
                                </div>  </form>  
                            </div>
                            </div>
                        </div>
                        <!--
                        <div class="submit">
                            <button>Finalizar</button>
                        </div>
                -->
                    </div>
                    

            </form>
            <?php 
        }catch (Exception $e) {
        die("Error: ". $e->getMessage());
    }?>
        </section>
    </main>
</body>

<javascrip>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
        var regex = /(\d+)/g;
        var mostrarValor = function(x){

            //var name="i_txt_7_14";
            //console.log(x.match(regex));

            document.getElementById('ccMed').value=x.match(regex);
            }
</script>

</javascrip>
</html>