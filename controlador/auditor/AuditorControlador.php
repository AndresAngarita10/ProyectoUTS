<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
        include_once("../../modelo/medico/ModeloMedico.php");
        include_once("../../modelo/medico/ObjetoMedico.php");
        include_once("../../modelo/medico/ModeloMedico.php");
        //include_once("../../modelo/acompañante/ObjetoAcompañante.php");
        //include_once("../../modelo/acompañante/ModeloAcompañante.php");
        include_once("../../modelo/historiaClinica/ObjetoHistoriaClinica.php");
        include_once("../../modelo/historiaClinica/ObjetoAntecedentesPersonales.php");
        include_once("../../modelo/historiaClinica/ObjetoEnfermedades.php");
        include_once("../../modelo/historiaClinica/ObjetoExamenFisico.php");
        include_once("../../modelo/historiaClinica/ModeloHistoriaClinica.php");
        include_once("../../modelo/datosRemision/ObjetoDatosAdministrativos.php");
        include_once("../../modelo/datosRemision/ModeloDatosRemision.php");
        include_once("../../modelo/paciente/Modelopaciente.php");
        include_once("../../modelo/citas/ModeloCitas.php");
        include_once("../../modelo/citas/ObjetoCitas.php");
        include_once("../../modelo/registroSolicitud/ModeloRegistroSolicitud.php");
        include_once("../../modelo/registroSolicitud/ObjetoRegistroSolicitud.php");
        include_once("../../modelo/datosRemision/ModeloRemision.php");
        include_once("../../modelo/Conexion.php");
        
        $ModMedico = new ModeloMedico();
        $Medico = new ObjetoMedico();
        $HistoriaF1 = new ObjetoHistoriaClinica();
        $Antecedentes = new ObjetoAntecedentesPersonales();
        $Enfermedades = new ObjetoEnfermedades();
        $Examen = new ObjetoExamenFisico();
        $DatosRemision = new ObjetoDatosAdministrativos();
        $ModPaciente = new ModeloPaciente();
        $ModRemision = new ModeloDatosRemision();
        $ModHistoria = new ModeloHistoriaClinica();

        $modo = $_POST['boton'];
        if ($modo == "DireccionarReferenciaTerminada") {
            $ccAuditor = $_POST['ccAuditor'];
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/auditor/RefYContraRefTerminado.php' method='post'>
                            <input type='text' hidden name='ccAuditor' value='<?php echo($ccAuditor);  ?>'/>
                    </form>
                </body>

                <?php

        }else if ($modo == "DireccionarReferencia") {
            $ccAuditor = $_POST['ccAuditor'];
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/auditor/RefYContraRef.php' method='post'>
                            <input type='text' hidden name='ccAuditor' value='<?php echo($ccAuditor);  ?>'/>
                    </form>
                </body>

                <?php


        }else if ($modo == "verHistoriaC"){
            $ccAuditor = $_POST['ccAuditor'];
            $identificacionPaciente = $_POST['identificacionPaciente'];
            $idRemision = $_POST['idRemision'];
            $numeroHistoria = $_POST['numeroHistoria'];
            $examen2 = $_POST['examen2'];

            if($examen2 == "SI"){

            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/remision/HistoriaClinica.php' method='post'>
                            <input type='text' hidden name='ccAuditor' value='<?php echo($ccAuditor);  ?>'/>
                            <input type='text' hidden name='numeroHistoria' value='<?php echo($numeroHistoria);  ?>'/>
                            <input type='text' hidden name='identificacionPaciente' value='<?php echo($identificacionPaciente);  ?>'/>
                            <input type='text' hidden name='idRemision' value='<?php echo($idRemision);  ?>'/>
                            <input type='text' hidden name='examen2' value='<?php echo($examen2);  ?>'/>
                    </form>
                </body>

                <?php
                
            }else if ($examen2 == "NO"){
                ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/remision/HistoriaClinica.php' method='post'>
                            <input type='text' hidden name='ccAuditor' value='<?php echo($ccAuditor);  ?>'/>
                            <input type='text' hidden name='numeroHistoria' value='<?php echo($numeroHistoria);  ?>'/>
                            <input type='text' hidden name='identificacionPaciente' value='<?php echo($identificacionPaciente);  ?>'/>
                            <input type='text' hidden name='idRemision' value='<?php echo($idRemision);  ?>'/>
                            <input type='text' hidden name='examen2' value='<?php echo($examen2);  ?>'/>
                    </form>
                </body>

                <?php
                
            }
        }else {
?>
            <title>Procesando...</title>
                            <script type='text/javascript'>
                                function enviarForm(){
                                    document.form.submit();
                                }
                            </script>
                            </head>
                            <body onLoad='javascript:enviarForm();'>
                                <form name='form' action='../../controlador/auxAdministrativo/AuxAdministrativoControl.php' method='post'>
                                    <input type='text' hidden id="boton" name='boton' value='null'/>
                                </form>
                            </body>
            <?php
        }