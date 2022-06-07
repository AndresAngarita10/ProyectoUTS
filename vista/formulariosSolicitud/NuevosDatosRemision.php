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
  <?php include '../layout/headerMedico.php';  ?>

    <style>
        select{
            font-size: 1.1rem;
            width: 25rem;
            height: 3rem;
            padding-left: 0.5rem;
            border-radius: 5px;
            border: 2px solid #696969;
        }
    </style>

    <?php 
        include_once("../../modelo/especialidades/ModeloEspecialidad.php");
        include_once("../../modelo/especialidades/ObjetoEspecialidad.php");
        include_once("../../modelo/Conexion.php");
        include_once("../../modelo/medico/ModeloMedico.php");
        $Med = new ModeloMedico;
        //echo $_POST['ccMed'];
        $validarMed = $Med->getMedicoXCedula($_POST['ccMed']);
        //echo ($validarMed->getPrimerNombre());
        if($validarMed==null){
            header("Location: ../../index.php");
        }
    


        //cargar especialidad
        $ControlModeloEsp = new ModeloEspecialidad();
        $tabla3 = $ControlModeloEsp->mostrarEspecialidad();
        ?>


    <main>
        <section>
            <h1>Formulario de Registro Remision</h1>
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
                    <label>Motivo de consulta</label>
                    <?php echo($_POST['motivoConsulta']); ?>
                </div>  


                <div class="textbox">
                    <label>Especialidad a remitir Paciente</label>
                    <select require id="especialidad" name="especialidad" required>
                        <option selected disabled>Seleccione un valor</option>
                        <?php
                                foreach ($tabla3 as $valor) {
                                    ?><option value="<?php echo($valor->getEspecialidad()); ?>"> <?php echo($valor->getEspecialidad()); ?> </option><?php
                                    
                                }
                        ?>
                    </select>
                </div>  


                <div class="textbox">
                    <label>Obseervaciones de la Remision</label>
                    <textarea id="observaciones" name="observaciones" required></textarea>
                </div>  

                
                <div class="submit">
                    <button name="boton" value="guardarRemisionMedico" 
                      onclick="return confirm('Esta seguro de Enviar?')">Enviar</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>