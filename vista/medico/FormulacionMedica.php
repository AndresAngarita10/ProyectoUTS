<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/nuevaHistoria.css" rel="stylesheet" type="text/css" />
    <link href="../../estilos/resets.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <header>
        <a href="" class="logo">
            <img src="../../imagenes/img3.png" />
        </a>
        <nav>
            <a class="ultimos" href="">Ultimos articulos</a>
            <a href="">Popular</a>
            <a href="">Tecnologia</a>
        </nav>
        <div class="options" >
            <img src="../../imagenes/img1.jpg" />
            <img src="../../imagenes/img2.png" />
        </div>
    </header>

    <?php 
        include_once('../../modelo/datosRemision/ModeloDatosRemision.php');
        include_once('../../modelo/datosRemision/ModeloRemision.php');
        include_once('../../modelo/datosRemision/ObjetoDatosAdministrativos.php');
        include_once('../../modelo/medico/ModeloMedico.php');
        include_once('../../modelo/historiaClinica/ModeloHistoriaClinica.php');
        include_once("../../modelo/paciente/Modelopaciente.php");
        include_once("../../modelo/paciente/ObjetoPaciente.php");
        include_once("../../modelo/medico/ModeloMedico.php");
        $Med = new ModeloMedico;
        //echo $_POST['ccMed'];
        $validarMed = $Med->getMedicoXCedula($_POST['ccMed']);
        //echo ($validarMed->getPrimerNombre());
        if($validarMed==null){
            header("Location: ../../index.php");
        }


        $ModDatosRemision = new ModeloDatosRemision();
        $ModRemision = new ModeloRemision();
        $ModMedico = new ModeloMedico();
        $ModPaciente = new ModeloPaciente();
        $ModHistoria = New ModeloHistoriaClinica();
        $historiaF1 = $ModHistoria->getHistoriaF1($_POST['numeroHistoria']);
        $historiaF2 = $ModHistoria->getHistoriaF2($_POST['numeroHistoria']);
        $historiaF3 = $ModHistoria->getHistoriaF3($_POST['numeroHistoria']);
        $historiaF4 = $ModHistoria->getHistoriaF4($_POST['numeroHistoria']);
    ?>


    <main>
        <section>
            <h1>Complete el tratamiento o medicamentos que se asignaran al paciente</h1>
            <form action="../../controlador/medico/MedicoControl.php" method="post" enctype="multipart/form-data" name="form1">
                
                <div class="textbox">
                    <label>Paciente: <?php echo($_POST['nombres']); ?> </label>
                    <label>Cedula: <?php echo($_POST['numeroDocumento']); ?> </label>
                    <input type='text' hidden name='numeroDocumento' value='<?php echo($_POST['numeroDocumento']); ?>'/>
                    <input type='text' hidden name='ccMed' value='<?php echo($_POST['ccMed']); ?>'/>
                    <input type='text' hidden name='idCita' value='<?php echo($_POST['idCita']); ?>'/>
                    <input type='text' hidden name='idRemision' value='<?php echo($_POST['idRemision']); ?>'/>
                    <input type='text' hidden name='numeroHistoria' value='<?php echo($_POST['numeroHistoria']); ?>'/>
                    <label>Origen: <?php echo($_POST['ciudad']); ?> </label>
                    <label>Eps: <?php echo($_POST['eps']); ?> </label>
                    <label>Tipo Contribuyente: <?php echo($_POST['tipoC']); ?> </label>

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


                </div>
                
                <div class="textbox">
                    <label>Receta Medica</label>
                    <textarea style="height: 100px;" id="observaciones" name="observaciones"></textarea>
                    <div class="submit">
                    <button  name="boton" value="FormulacionMedica" 
                      onclick="return confirm('Esta seguro de Enviar?')">Enviar</button>
                    </div>
                </div>  


                
                
            </form>
        </section>
    </main>
</body>
<javascrip>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</javascrip>
</html>