<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/nuevaHistoria.css" rel="stylesheet" type="text/css" />
    <link href="../../estilos/resets.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">

    <style>
        
        textarea{
            width: 14rem;
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
            <h1>Formulario de Registro Antecedentes Personales</h1>
            <form action="../../controlador/medico/MedicoControl.php" method="post" enctype="multipart/form-data" name="form1">
            <div class="textbox">
                    <label>Paciente: <?php echo($_POST['nombres']); ?> </label>
                    <label>Cedula: <?php echo($_POST['numeroDocumento']); ?> </label>
                    <input type='text' hidden name='numeroDocumento' value='<?php echo($_POST['numeroDocumento']); ?>'/>
                    <input type='text' hidden name='ccMed' value='<?php echo($_POST['ccMed']); ?>'/>
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
                    <label>Alcohol Habito Toxico</label>
                    <div>
                    <a class="btn btn-outline-info " name="alcohol" id="alcohol" onclick="ponNo1()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">No</a>
                    <input type="text"  name="alcoholHT" id="alcoholHT" required >

                    </div>

                </div>
                <div class="field">
                    <label>Tabaco Habito Toxico</label>
                    <div>
                    <a class="btn btn-outline-info " name="tabaco" id="tabaco" onclick="ponNo2()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">No</a>
                    <input type="text" name="tabacoHT" id="tabacoHT" required >
                    </div>
                </div>


                <div class="field">
                    <label>Drogas Habito Toxico</label>
                    <div>
                    <a class="btn btn-outline-info " name="drogas" id="drogas" onclick="ponNo3()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">No</a>
                    <input type="text" name="drogasHT" id="drogasHT" required >
                    </div>
                </div>


                <div class="field">
                    <label>Infuciones Habito Toxico</label>
                    <div>
                    <a class="btn btn-outline-info " name="infuciones" id="infuciones" onclick="ponNo4()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">No</a>
                    <input type="text" name="infucionesHT" id="infucionesHT" required >
                    </div>
                </div>


                <div class="field">
                    <label>Alimentacion Habito Fisiologico</label>
                    <div>
                    <a class="btn btn-outline-info " name="alimentacion" id="alimentacion" onclick="ponR1()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">H</a>
                    <input type="text" name="alimentacionHF" id="alimentacionHF" required >
                    </div>
                </div>

                <div class="field">
                    <label>Diuresis Habito Fisiologico</label>
                    <div>
                    <a class="btn btn-outline-info " name="diuresis" id="diuresis" onclick="ponR2()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">H</a>
                    <input type="text" name="diuresisHF" id="diuresisHF" required >
                    </div>
                </div>
                <div class="field">
                    <label>Catarsis Habito Fisiologico</label>
                    <div>
                    <a class="btn btn-outline-info " name="Catarsis" id="Catarsis" onclick="ponR3()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">H</a>
                    <input type="text" name="catarsisHF" id="catarsisHF" required >
                    </div>
                </div>
                <div class="field">
                    <label>Sueño Habito Fisiologico</label>
                    <div>
                    <a class="btn btn-outline-info " name="Sueño" id="Sueño" onclick="ponR4()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">H</a>
                    <input type="text" name="sueñoHF" id="sueñoHF" required >
                    </div>
                </div>
                <div class="field">
                    <label>Sexualidad Habito Fisiologico</label>
                    <div>
                    <a class="btn btn-outline-info " name="Sexualidad" id="Sexualidad" onclick="ponR5()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">H</a>
                    <input type="text" name="sexualidadHF" id="sexualidadHF" required >
                    </div>
                </div>
                <div class="field">
                    <label>Otros Habito Fisiologico</label>
                    <input type="text" name="otrosHF" id="otrosHF" required >
                    
                </div>
               
                <div class="field">
                    
                    <div>
                        <div class="textbox" id="texto1">
                            <label>Enfermedades de Infancia</label>
                            <textarea id="enfermedadesInfancia" name="enfermedadesInfancia"></textarea>
                        </div>
                    </div>
                    
                </div>

                
                <div class="field">
                    
                    <div>
                        <div class="textbox" id="texto1">
                            <label>Antecedentes Heredados</label>
                            <textarea id="antecedentesHeredados" name="antecedentesHeredados"></textarea>
                        </div>
                    </div>
                    
                </div>

                <div class="submit">
                    <button name="boton" value="GuardarHistoriaFase2" 
                      onclick="return confirm('Esta seguro de Enviar?')">Enviar</button>
                </div>
            </form>
        </section>
    </main>
</body>

        <script>
            function ponNo1(){
                document.getElementById('alcoholHT').value="NO";

                }

                
            function ponNo2(){
                document.getElementById('tabacoHT').value="NO";

                }

                
            function ponNo3(){
                document.getElementById('drogasHT').value="NO";

                }

                
            function ponNo4(){
                document.getElementById('infucionesHT').value="NO";

                }  

            function ponR1(){
                document.getElementById('alimentacionHF').value="Habitual";

                }
            function ponR2(){
                document.getElementById('diuresisHF').value="Habitual";

                }
            function ponR3(){
                document.getElementById('catarsisHF').value="Habitual";

                }
            function ponR4(){
                document.getElementById('sueñoHF').value="Habitual";

                }
            function ponR5(){
                document.getElementById('sexualidadHF').value="Habitual";

                }
            function ponR6(){
                document.getElementById('alimentacionHF').value="Habitual";

                }
            function ponR7(){
                document.getElementById('alimentacionHF').value="Habitual";

                }
            function ponR8(){
                document.getElementById('alimentacionHF').value="Habitual";

                }
            
            
        </script>
</html>