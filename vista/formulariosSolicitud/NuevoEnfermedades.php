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
            <h1>Formulario de Registro Enfermedades del Paciente</h1>
            <form action="../../controlador/medico/MedicoControl.php" method="post" enctype="multipart/form-data" name="form1">
            <div class="textbox">
                    <label>Paciente: <?php echo($_POST['nombres']); ?> </label>
                    <label>Cedula: <?php echo($_POST['numeroDocumento']); ?> </label>
                    <input type='text' hidden name='numeroDocumento' value='<?php echo($_POST['numeroDocumento']); ?>'/>
                    <input type='text' hidden name='ccMed' value='<?php echo($_POST['ccMed']); ?>'/>
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
                    <label>Cardio Vascular</label>
                    <div>
                    <a class="btn btn-outline-info " name="Cv" id="Cv" onclick="ponNo1()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="cv" id="cv" required >
                    </div>
                </div>
                <div class="field">
                    <label>Respiratorio  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Respiratorio" id="Respiratorio" onclick="ponNo2()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="respiratorio" id="respiratorio" required >
                    </div>
                </div>
                <div class="field">
                    <label>Gastrointestinales  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Gastrointestinales" id="Gastrointestinales" onclick="ponNo3()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="gastrointestinales" id="gastrointestinales" required >
                    </div>
                </div>
                <div class="field">
                    <label>Nefrourologicos  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Nefrourologicos" id="Nefrourologicos" onclick="ponNo4()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="nefrourologicos" id="nefrourologicos" required >
                    </div>
                </div>
                <div class="field">
                    <label>Neurologicos  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Neurologicos" id="Neurologicos" onclick="ponNo5()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="neurologicos" id="neurologicos" required >
                    </div>
                </div>
                <div class="field">
                    <label>Hematologicos  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Hematologicos" id="Hematologicos" onclick="ponNo6()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="hematologicos" id="hematologicos" required >
                    </div>
                </div>
                <div class="field">
                    <label>Ginecologicos  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Ginecologicos" id="Ginecologicos" onclick="ponNo7()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="ginecologicos" id="ginecologicos" required >
                    </div>
                </div>
                <div class="field">
                    <label>Infectologicos  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Infectologicos" id="Infectologicos" onclick="ponNo8()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="infectologicos" id="infectologicos" required >
                    </div>
                </div>
                <div class="field">
                    <label>Endocrinologicos  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Endocrinologicos" id="Endocrinologicos" onclick="ponNo9()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="endocrinologicos" id="endocrinologicos" required >
                    </div>
                </div>
                <div class="field">
                    <label>Quirurgicos  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Quirurgicos" id="Quirurgicos" onclick="ponNo10()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="quirurgicos" id="quirurgicos" required >
                    </div>
                </div>
                <div class="field">
                    <label>Traumatologicos  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Traumatologicos" id="Traumatologicos" onclick="ponNo11()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="traumatologicos" id="traumatologicos" required >
                    </div>
                </div>
                <div class="field">
                    <label>Alergicos  </label>
                    <div>
                    <a class="btn btn-outline-info " name="Alergicos" id="Alergicos" onclick="ponNo12()" style="max-height: 40px; max-width: 45px; margin-top: -8px;" type="submit" href="#">NO</a>
                    <input type="text" name="alergicos" id="alergicos" required >
                    </div>
                </div>
               
                

                <div class="submit">
                     <button name="boton" value="GuardarHistoriaFase3" 
                      onclick="return confirm('Esta seguro de Enviar?')">Enviar</button>
                </div>
            </form>
        </section>
    </main>
</body>
    <script>
            function ponNo1(){
                document.getElementById('cv').value="NO";

                }

                
            function ponNo2(){
                document.getElementById('respiratorio').value="NO";

                }

                
            function ponNo3(){
                document.getElementById('gastrointestinales').value="NO";

                }

                
            function ponNo4(){
                document.getElementById('nefrourologicos').value="NO";

                } 

            function ponNo5(){
                document.getElementById('neurologicos').value="NO";

                }

                
            function ponNo6(){
                document.getElementById('hematologicos').value="NO";

                }

                
            function ponNo7(){
                document.getElementById('ginecologicos').value="NO";

                }

                
            function ponNo8(){
                document.getElementById('infectologicos').value="NO";

                } 

            function ponNo9(){
                document.getElementById('endocrinologicos').value="NO";

                }

                
            function ponNo10(){
                document.getElementById('quirurgicos').value="NO";

                }

                
            function ponNo11(){
                document.getElementById('traumatologicos').value="NO";

                }

                
            function ponNo12(){
                document.getElementById('alergicos').value="NO";

                } 
    </script>
</html>