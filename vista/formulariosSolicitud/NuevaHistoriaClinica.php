<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/nuevaHistoria.css" rel="stylesheet" type="text/css" />
    <link href="../../estilos/resets.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">

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
        include_once("../../modelo/medico/ModeloMedico.php");
        $Med = new ModeloMedico;
        //echo $_POST['ccMed'];
        $validarMed = $Med->getMedicoXCedula($_POST['ccMed']);
        //echo ($validarMed->getPrimerNombre());
        if($validarMed==null){
            header("Location: ../../index.php");
        }
    ?>


    <main>
        <section>
            <h1>Formulario de Registro Historia</h1>
            <form action="../../controlador/medico/MedicoControl.php" method="post" enctype="multipart/form-data" name="form1">
                
                <div class="textbox">
                    <label>Paciente: <?php echo($_POST['nombres']); ?> </label>
                    <label>Cedula: <?php echo($_POST['numeroDocumento']); ?> </label>
                    <input type='text' hidden name='numeroDocumento' value='<?php echo($_POST['numeroDocumento']); ?>'/>
                    <input type='text' hidden name='ccMed' value='<?php echo($_POST['ccMed']); ?>'/>
                    <label>Origen: <?php echo($_POST['ciudad']); ?> </label>
                    <label>Eps: <?php echo($_POST['eps']); ?> </label>
                    <label>Tipo Contribuyente: <?php echo($_POST['tipoC']); ?> </label>

                </div>
                
                <div class="textbox">
                    <label>Motivo de consulta</label>
                    <textarea id="motivoConsulta" name="motivoConsulta"></textarea>
                </div>  


                <div class="textbox">
                    <label>Enfermedad Actual</label>
                    <textarea id="enfermedadActual" name="enfermedadActual"></textarea>
                </div>  


                <div class="textbox">
                    <label>Antecedentes Enfermedad Actual</label>
                    <textarea id="antEnfermedadActual" name="antEnfermedadActual"></textarea>
                </div>  

                
                <div class="submit">
                    <button  name="boton" value="GuardarHistoriaFase1" 
                      onclick="return confirm('Esta seguro de Enviar?')">Enviar</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>