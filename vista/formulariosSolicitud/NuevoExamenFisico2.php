<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/nuevaHistoria.css" rel="stylesheet" type="text/css" />
    <link href="../../estilos/resets.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">

    <style>
        
        textarea{
            width: 14rem;
            max-width: 20rem;
            height: 2rem;
        }

    </style>
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


    <title>Document</title>
</head>
<body>   
    <main>
        <section>
            <h1>Formulario de Registro de Segundo Examen Fisico del Paciente</h1>
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
                    <label>ID Historia Clinica: <?php echo($_POST['numeroHistoria']); ?></label>
                    <label>Fecha de creacion: <?php echo($_POST['fechaAgregado']); ?></label>

                </div>


                <div class="textbox">
                    <label>Motivo Consulta: <?php echo($_POST['motivoConsulta']); ?>
                </div>


                <div class="field">
                    <label>Tension Aarterial</label>
                    <input type="text" name="ta" id="ta" required >
                </div>
                <div class="field">
                    <label>Frecuencua Cardiaca  </label>
                    <input type="text" name="fc" id="fc" required >
                </div>
                <div class="field">
                    <label>Frecuencia Respiratoria  </label>
                    <input type="text" name="fr" id="fr" required >
                </div>
                <div class="field">
                    <label>Temperatura (Grados Centigrados)  </label>
                    <input type="text" name="temperatura" id="temperatura" required >
                </div>
                <div class="field">
                    <label>Peso (KG) </label>
                    <input type="text" name="peso" id="peso" required >
                </div>
                <div class="field">
                    <label>Altura (M) </label>
                    <input type="text" name="altura" id="altura" required >
                </div>
                <div class="field">
                            <div>
                                <label>IMC  </label>
                                <a  name="IMC" id="IMC" onclick="ponN13()" style="max-height: 30px; max-width: 35px; margin-top: -8px; content: center; text-justify: auto;" type="submit" > ✔</a>
                            </div>
                    <input type="text" name="imc" id="imc" required >
                </div>
                <div class="field">
                            <div>
                                <label>Constitucion  </label>
                                <a  name="Constitucion" id="Constitucion" onclick="ponN14()" style="max-height: 30px; max-width: 35px; margin-top: -8px; content: center; text-justify: auto;" type="submit" > ✔</a>
                            </div>
                    <input type="text" name="constitucion" id="constitucion" required >
                </div>
                <div class="field">
                            <div>
                                <label>Facies  </label>
                                <a  name="Facies" id="Facies" onclick="ponN15()" style="max-height: 30px; max-width: 35px; margin-top: -8px; content: center; text-justify: auto;" type="submit" > ✔</a>
                            </div>
                    <input type="text" name="facies" id="facies" required >
                    
                </div>
                <div class="field">
                    
                    <div>
                        <div class="textbox" id="texto1">
                            <div>
                                <label>Actitud  </label>
                                <a  name="Actitud" id="Actitud" onclick="ponN1()" style="height: 30px; width: 35px; margin-top: -8px; content: center; text-justify: auto;"  > ✔</a>
                            </div>
                            <textarea name="actitud" id="actitud"></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="field">
                    
                    <div>
                        <div class="textbox" id="texto1">
                            <div>
                                <label>Decubito  </label>
                                <a  name="Decubito" id="Decubito" onclick="ponN2()" style="max-height: 30px; max-width: 35px; margin-top: -8px; content: center; text-justify: auto;" type="submit" > ✔</a>
                            </div>
                            <textarea name="decubito" id="decubito"></textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="field">
                    
                    <div>
                        <div class="textbox" id="texto1">
                            <div>
                                <label>Marcha  </label>
                                <a  name="Marcha" id="Marcha" onclick="ponN3()" style="max-height: 30px; max-width: 35px; margin-top: -8px; content: center; text-justify: auto;" type="submit" > ✔</a>
                            </div>
                            <textarea name="marcha" id="marcha"></textarea>
                        </div>
                    </div>
                    
                </div>


                <div class="field">
                    
                    <div>
                        <div class="textbox" id="texto1">
                            <div>
                                <label>Aspecto  </label>
                                <a  name="Aspecto" id="Aspecto" onclick="ponN4()" style="max-height: 30px; max-width: 35px; margin-top: -8px; content: center; text-justify: auto;" type="submit"> ✔</a>
                            </div>
                            <textarea name="aspecto" id="aspecto"></textarea>
                        </div>
                    </div>
                    
                </div>

                
                <div class="field">
                    
                    <div>
                        <div class="textbox" id="texto1">
                            <div>
                                <label>Lesiones  </label>
                                <a  name="Lesiones" id="Lesiones" onclick="ponN5()" style="max-height: 30px; max-width: 35px; margin-top: -8px; content: center; text-justify: auto;" type="submit" > ✔</a>
                            </div>
                            <textarea name="lesiones" id="lesiones"></textarea>
                        </div>
                    </div>
                    
                </div>

                <div class="field">
                    
                    <div>
                        <div class="textbox" id="texto1">
                            <div>
                                <label>Impresion General  </label>
                                <a  name="Impresion" id="Impresion" onclick="ponN6()" style="max-height: 30px; max-width: 35px; margin-top: -8px; content: center; text-justify: auto;" type="submit"> ✔</a>
                            </div>
                            <textarea name="impresionGeneral" id="impresionGeneral"></textarea>
                        </div>
                    </div>
                    
                </div>
               
                

                <div class="submit">
                    <button name="boton" value="GuardarHistoriaFase5" 
                      onclick="return confirm('Esta seguro de Enviar?')">Enviar</button>
                </div>
            </form>
        </section>
    </main>
</body>
<script>
            function ponN1(){
                document.getElementById('actitud').value="BUENA";

                }

                
            function ponN2(){
                document.getElementById('decubito').value="NORMAL";

                }

                
            function ponN3(){
                document.getElementById('marcha').value="NORMAL";

                }

                
            function ponN4(){
                document.getElementById('aspecto').value="BUENO";

                } 

            function ponN5(){
                document.getElementById('lesiones').value="NO TIENE";

                }

                
            function ponN6(){
                document.getElementById('impresionGeneral').value="BUENA";

                }


                
            function ponN13(){
                document.getElementById('peso');
                document.getElementById('altura');
                console.log(document.getElementById('altura').value);
                var imc = document.getElementById('peso').value / document.getElementById('altura').value;

                document.getElementById('imc').value=imc;

                }
            function ponN14(){
                document.getElementById('constitucion').value="BUENA";

                }
            function ponN15(){
                document.getElementById('facies').value="NORMAL";

                }
    </script>
</html>