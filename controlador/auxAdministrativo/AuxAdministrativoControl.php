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
        $ccAux = 1234;
        include_once("../../modelo/auxAdministrativo/ModeloAuxAdministrativo.php");
        include_once("../../modelo/auxAdministrativo/ObjetoAuxAdministrativo.php");
        include_once("../../modelo/auxAdministrativo/ModeloAuxAdministrativo.php");
        include_once("../../modelo/citas/ObjetoCitas.php");
        include_once("../../modelo/citas/ModeloCitas.php");
        include_once("../../modelo/paciente/Modelopaciente.php");
        include_once("../../modelo/paciente/ObjetoPaciente.php");
        include_once("../../modelo/medico/ModeloMedico.php");
        include_once("../../modelo/medico/ObjetoMedico.php");
        include_once("../../modelo/datosRemision/ModeloRemision.php");
        include_once("../../modelo/datosRemision/ObjetoDatosAdministrativos.php");
        include_once("../../modelo/Conexion.php");
        
        $ModAux = new ModeloAuxiliar();
        $Aux = new ObjetoAuxAdministrativo();

        $modo = $_POST['boton'];
        if ($modo == "Gu") {
            $Aux->setTipoDocumento(htmlentities(addslashes($_POST["tipoDocumento"])));
            $Aux->setNumeroDocumento(htmlentities(addslashes($_POST["numeroDocumento"])));
            $Aux->setPrimerNombre(htmlentities(addslashes($_POST["primerNombre"])));
            $Aux->setSegundoNombre(htmlentities(addslashes($_POST["segundoNombre"])));
            $Aux->setPrimerApellido(htmlentities(addslashes($_POST["primerApellido"])));
            $Aux->setSegundoApellido(htmlentities(addslashes($_POST["segundoApellido"])));
            $Aux->setCorreo(htmlentities(addslashes($_POST["correo"])));
            $Aux->setDireccion(htmlentities(addslashes($_POST["direccion"])));
            $Aux->setTelefono(htmlentities(addslashes($_POST["telefono"])));
            $Aux->setFechaAgregado(DATE("Y-m-d H:i:s"));
            $Aux->setActivo("1");
            $ModAux->insertar($Aux);
            echo $_POST["numeroDocumento"];
            header("Location: ../../vista/auxAdministrativo/MostrarAux.php");
            die();


        }else if ($modo == "buscedula"){
            $cedula = $_POST['cedula'];
            echo "cedula: ".$cedula;
            $Aux=null;
            $Aux = $ModAux->getAuxXCedula($cedula);
             //echo($paciente->getPrimerApellido());
             if($Aux==null){
                header("Location: ../../vista/auxAdministrativo/MostrarAux.php");
             }else {
            ?> 
            <title>Procesando...</title>
                    <script type='text/javascript'>
                        function enviarForm(){
                            document.Form.submit();
                        }
                    </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='Form' action='../../vista/auxAdministrativo/MostrarAux.php' method='POST'>
                        <input type='hidden' name='control' value='1'/>
                        <input type='hidden' name='id' value='<?php echo($Aux->getId()); ?>'/>
                        <input type='hidden' name='tipoDocumento' value='<?php echo($Aux->getTipoDocumento()); ?>'/>
                        <input type='hidden' name='numeroDocumento' value='<?php echo($Aux->getNumeroDocumento()); ?>'/>
                        <input type='hidden' name='nombre' value='<?php echo($Aux->getPrimerNombre()." - ".$Aux->getSegundoNombre()); ?>'/>
                        <input type='hidden' name='apellido' value='<?php echo($Aux->getPrimerApellido()." - ".$Aux->getSegundoApellido()); ?>'/>
                        <input type='hidden' name='correo' value='<?php echo($Aux->getCorreo()); ?>'/>
                        <input type='hidden' name='diireccion' value='<?php echo($Aux->getDireccion()); ?>'/>
                        <input type='hidden' name='telefono' value='<?php echo($Aux->getTelefono()); ?>'/>
                        <input type='hidden' name='activo' value='<?php echo($Aux->getActivo()); ?>'/>
                        <input type='hidden' name='fagregado' value='<?php echo($Aux->getFechaAgregado()); ?>'/>
                    </form>
                </body>
            <?php
        }
    }else if ($modo == "editar"){
        echo "entro a editar, identificacion ".$_POST['identificacion']." y cedula: ".$_POST['cedula'];
        $cedula = $_POST['cedula'];
        echo "cedula: ".$cedula;
        $Aux=null;
        $Aux = $ModAux->getAuxXCedula($cedula);
         //echo($paciente->getPrimerApellido());
        ?> 
        <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.Form.submit();
                    }
                </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='Form' action='../../vista/auxAdministrativo/NuevoAuxAdministrativo.php' method='POST'>
                    <input type='hidden' name='control' value='1'/>
                    <input type='hidden' name='id' value='<?php echo($Aux->getId()); ?>'/>
                    <input type='hidden' name='tipoDocumento' value='<?php echo($Aux->getTipoDocumento()); ?>'/>
                    <input type='hidden' name='numeroDocumento' value='<?php echo($Aux->getNumeroDocumento()); ?>'/>
                    <input type='hidden' name='primerNombre' value='<?php echo($Aux->getPrimerNombre()); ?>'/>
                    <input type='hidden' name='segundoNombre' value='<?php echo($Aux->getSegundoNombre()); ?>'/>
                    <input type='hidden' name='primerApellido' value='<?php echo($Aux->getPrimerApellido()); ?>'/>
                    <input type='hidden' name='segundoApellido' value='<?php echo($Aux->getSegundoApellido()); ?>'/>
                    <input type='hidden' name='correo' value='<?php echo($Aux->getCorreo()); ?>'/>
                    <input type='hidden' name='direccion' value='<?php echo($Aux->getDireccion()); ?>'/>
                    <input type='hidden' name='telefono' value='<?php echo($Aux->getTelefono()); ?>'/>
                    <input type='hidden' name='activo' value='<?php echo($Aux->getActivo()); ?>'/>
                    <input type='hidden' name='fagregado' value='<?php echo($Aux->getFechaAgregado()); ?>'/>
                </form>
            </body>
        <?php
    }else if ($modo == "guardarEdicion"){
        //echo($_POST["id"]);
        $ModAux = new ModeloAuxiliar();
                    $Aux = new ObjetoAuxAdministrativo();
                    $Aux->setId(htmlentities(addslashes($_POST["id"])));
                    $Aux->setTipoDocumento(htmlentities(addslashes($_POST["tipoDocumento"])));
                    $Aux->setNumeroDocumento(htmlentities(addslashes($_POST["numeroDocumento"])));
                    $Aux->setPrimerNombre(htmlentities(addslashes($_POST["primerNombre"])));
                    $Aux->setSegundoNombre(htmlentities(addslashes($_POST["segundoNombre"])));
                    $Aux->setPrimerApellido(htmlentities(addslashes($_POST["primerApellido"])));
                    $Aux->setSegundoApellido(htmlentities(addslashes($_POST["segundoApellido"])));
                    $Aux->setCorreo(htmlentities(addslashes($_POST["correo"])));
                    $Aux->setDireccion(htmlentities(addslashes($_POST["direccion"])));
                    $Aux->setTelefono(htmlentities(addslashes($_POST["telefono"])));
                    $Aux->setFechaAgregado(DATE("Y-m-d H:i:s"));
                    $Aux->setActivo("1");
                    //echo ($_POST["id"]);
                    $ModAux->actualizaAux($Aux);

                    $retorno = 2;
                    header("Location: ../../vista/auxAdministrativo/MostrarAux.php?pagina=1&&retorno=".$retorno);//&&xuypd=".$control);
                    die();
    
    }else if ($modo == "desactivarAux") {
        $id = $_POST["identificacion"];

        $ModAux = new ModeloAuxiliar();
        $ModAux->desabilitarAux($id);
        $retorno = 3;
        header("Location: ../../vista/auxAdministrativo/MostrarAux.php");
        die();


    }else if ($modo == "activarAux") {
        $id = $_POST["identificacion"];

        $ModAux = new ModeloAuxiliar();
        $ModAux->habilitarAux($id);
        $retorno = 3;
        header("Location: ../../vista/auxAdministrativo/MostrarAux.php");
        die();


    }else if ($modo == "validarFecha") {

        $numeroDocumento=$_POST['numeroDocumento'];
        $ccMed=$_POST['ccMed'];
        $idRemision=$_POST['idRemision'];
        $numeroHistoria=$_POST['numeroHistoria'];
        $fecha=$_POST['fechaCita'];
        $oficina=$_POST['oficina'];
        $ciudad=$_POST['ciudad'];
        $fechaCita=$_POST['fechaCita'];

        $ModeloCitas = new ModeloCitas();
        $CitasXFecha = $ModeloCitas->getCitasXFecha($fechaCita);
        $ContarCitasXFecha = $ModeloCitas->contadorCitasXFecha($fechaCita);
        if($CitasXFecha==null){
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/auxAdministrativo/VerificacionSolicitud.php' method='post'>
                            <input type='text' hidden name='activar' value='1'/>
                            <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                            <input type='text' hidden name='idRemision' value='<?php echo($idRemision);  ?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento);  ?>'/>
                            <input type='text' hidden name='numeroHistoria' value='<?php echo($numeroHistoria); ?>'/>
                            <input type='text' hidden name='fechaCita' value='<?php echo($fechaCita);  ?>'/>
                            <input type='text' hidden name='oficina' value='<?php echo($oficina);  ?>'/>
                            <input type='text' hidden name='ciudad' value='<?php echo($ciudad);  ?>'/>
                            <input type='text' hidden name='ccMed' value='<?php echo($ccMed);  ?>'/>
                    </form>
                </body>

                <?php
        }else {
            echo $ContarCitasXFecha;
            //foreach($CitasXFecha as $valor){
            //    echo ($valor->gethoraCita());
            //}
            if($ContarCitasXFecha==5){
                $retornor= 1;
                ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/auxAdministrativo/VerificacionSolicitud.php' method='post'>
                            <input type='text' hidden name='activar' value='0'/>
                            <input type='text' hidden name='noCitas' value='<?php echo($retornor);  ?>'/>
                            <input type='text' hidden name='idRemision' value='<?php echo($idRemision);  ?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento);  ?>'/>
                            <input type='text' hidden name='numeroHistoria' value='<?php echo($numeroHistoria); ?>'/>
                            <input type='text' hidden name='fechaCita' value='<?php echo($fechaCita);  ?>'/>
                            <input type='text' hidden name='oficina' value='<?php echo($oficina);  ?>'/>
                            <input type='text' hidden name='ciudad' value='<?php echo($ciudad);  ?>'/>
                            <input type='text' hidden name='ccMed' value='<?php echo($ccMed);  ?>'/>
                            <?php
                            foreach($CitasXFecha as $valor){?>
                                <input type='text' hidden name='<?php echo ($valor->gethoraCita());  ?>' value='<?php echo($valor->gethoraCita());  ?>'/>
                                
                           <?php  }  ?>
                    </form>
                </body>

                <?php
            }else if($ContarCitasXFecha<=5){
                
                ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/auxAdministrativo/VerificacionSolicitud.php' method='post'>
                            <input type='text' hidden name='activar' value='1'/>
                            <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                            <input type='text' hidden name='idRemision' value='<?php echo($idRemision);  ?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento);  ?>'/>
                            <input type='text' hidden name='numeroHistoria' value='<?php echo($numeroHistoria); ?>'/>
                            <input type='text' hidden name='fechaCita' value='<?php echo($fechaCita);  ?>'/>
                            <input type='text' hidden name='oficina' value='<?php echo($oficina);  ?>'/>
                            <input type='text' hidden name='ciudad' value='<?php echo($ciudad);  ?>'/>
                            <input type='text' hidden name='ccMed' value='<?php echo($ccMed);  ?>'/>
                            <?php
                            foreach($CitasXFecha as $valor){?>
                                <input type='text' hidden name='<?php echo ($valor->gethoraCita());  ?>' value='<?php echo($valor->gethoraCita());  ?>'/>
                                
                           <?php  }  ?>
                    </form>
                </body>

                <?php
            }
        }

    }else if ($modo == "asignarCita") {
        $numeroDocumento=$_POST['numeroDocumento'];
        $ccMed=$_POST['ccMed'];
        $idRemision=$_POST['idRemision'];
        $numeroHistoria=$_POST['numeroHistoria'];
        $oficina=$_POST['oficina'];
        $ciudad=$_POST['ciudad'];
        $fechaCita=$_POST['fechaCita'];
        $horaCita=$_POST['horaCita'];

        echo($ccMed);
        $ModPaciente = new ModeloPaciente();
        $paciente = $ModPaciente->getPacientesXCedua($numeroDocumento);
        $ModMedico = new ModeloMedico();
        $medico = $ModMedico->getMedicoXCedula($ccMed);
        $ModeloCitas = new ModeloCitas();
        $ObjetoCitas = new ObjetoCitas();
        $ObjetoCitas->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
        $ObjetoCitas->setNumeroHistoria(htmlentities(addslashes($numeroHistoria)));
        $ObjetoCitas->setnombrePaciente(htmlentities(addslashes($paciente->getPrimerNombre()." ".$paciente->getPrimerApellido())));
        $ObjetoCitas->settelefono(htmlentities(addslashes($paciente->getTelefono())));
        $ObjetoCitas->setciudad(htmlentities(addslashes($ciudad)));
        $ObjetoCitas->setOficina(htmlentities(addslashes($oficina)));
        $ObjetoCitas->setFechaCita(htmlentities(addslashes($fechaCita)));
        $ObjetoCitas->setHoraCita(htmlentities(addslashes($horaCita)));
        $ObjetoCitas->setCCMedico(htmlentities(addslashes($ccMed)));
        $ObjetoCitas->setFk_IdPaciente(htmlentities(addslashes($paciente->getId())));
        $ObjetoCitas->setFk_IdMedico(htmlentities(addslashes($medico->getId())));
        $ObjetoCitas->setFk_IdAuxAdmin(htmlentities(addslashes(1)));
        $ObjetoCitas->setFk_IdRemision(htmlentities(addslashes($idRemision)));
        $ObjetoCitas->setFechaAgregado(htmlentities(DATE("Y-m-d H:i:s")));
        $ObjetoCitas->setAsistioPaciente(htmlentities(addslashes(0)));

        $ModeloCitas->GuardarCita($ObjetoCitas);

        $ModeloRemision = new ModeloRemision();
        $ObjetoRemision = new ObjetoDatosAdministrativos();
        $ObjetoRemision->setTomada("1");
        $ModeloRemision->aplicarTomadaRemision($ObjetoRemision,$numeroHistoria);
        
        ?> 

        <title>Procesando...</title>
        <script type='text/javascript'>
            function enviarForm(){
                document.form.submit();
            }
        </script>
        </head>
        <body onLoad='javascript:enviarForm();'>
            <form name='form' action='../../vista/index/IndexAuxAdministrativo.php' method='post'>
                    <input type='text' hidden name='activar' value='1'/>
                    <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                    <input type='text' hidden name='idRemision' value='<?php echo($idRemision);  ?>'/>
                   
            </form>
        </body>

        <?php
    }else if ($modo == "validarcita") {
        $numeroDocumento = $_POST['numeroDocumento'];
        $ccAux = $_POST['ccAux'];
        $ModeloCitas = new ModeloCitas();
        
        echo $numeroDocumento;
        $consultaCita = $ModeloCitas->getCitasXCedula($numeroDocumento);
        if($consultaCita == null){
            ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/index/IndexAuxAdministrativo.php' method='post'>
                        <input type='text' hidden name='activar' value='1'/>
                        <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                        <input type='text' hidden name='ccAux' value='<?php echo($ccAux);?>'/>
                        <input type='text' hidden name='idRemision' value='<?php echo($idRemision);  ?>'/>
                    
                </form>
            </body>

            <?php
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
                <form name='form' action='../../vista/auxAdministrativo/ModificarCita.php' method='post'>
                        <input type='text' hidden name='idCita' value='<?php echo($consultaCita->getId());?>'/>
                        <input type='text' hidden name='ccAux' value='<?php echo($ccAux);?>'/>
                        <input type='text' hidden name='numeroDocumento' value='<?php echo($consultaCita->getNumeroDocumento());?>'/>
                        <input type='text' hidden name='nombrePaciente' value='<?php echo($consultaCita->getNombrePaciente());?>'/>
                        <input type='text' hidden name='ciudad' value='<?php echo($consultaCita->getCiudad());?>'/>
                        <input type='text' hidden name='oficina' value='<?php echo($consultaCita->getOficina());?>'/>
                        <input type='text' hidden name='telefono' value='<?php echo($consultaCita->getTelefono());?>'/>
                        <input type='text' hidden name='fecha' value='<?php echo($consultaCita->getFechaCita());?>'/>
                        <input type='text' hidden name='horaCita' value='<?php echo($consultaCita->getHoraCita());?>'/>
                        <input type='text' hidden name='confirmada' value='<?php echo($consultaCita->getConfirmada());?>'/>
                        <input type='text' hidden name='fechaAgregado' value='<?php echo($consultaCita->getFechaAgregado());?>'/>
                    
                </form>
            </body>

            <?php
        }
    }else if ($modo == "validarFecha2") {

        $numeroDocumento=$_POST['numeroDocumento'];
        $ccAux=$_POST['ccAux'];
        $idRemision=$_POST['idRemision'];
        $numeroHistoria=$_POST['numeroHistoria'];
        //$fecha=$_POST['fechaCita'];
        $oficina=$_POST['oficina'];
        $ciudad=$_POST['ciudad'];
        $fechaCita=$_POST['fechaCitaMod'];

        $ModeloCitas = new ModeloCitas();
        $CitasXFecha = $ModeloCitas->getCitasXFecha($fechaCita);
        $ContarCitasXFecha = $ModeloCitas->contadorCitasXFecha($fechaCita);
        $consultaCita = $ModeloCitas->getCitasXCedula($numeroDocumento);
        if($CitasXFecha==null){
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/auxAdministrativo/ModificarCita.php' method='post'>
                            <input type='text' hidden name='activar' value='1'/>
                        <input type='text' hidden name='idCita' value='<?php echo($consultaCita->getId());?>'/>
                        <input type='text' hidden name='ccAux' value='<?php echo($ccAux);?>'/>
                        <input type='text' hidden name='numeroDocumento' value='<?php echo($consultaCita->getNumeroDocumento());?>'/>
                        <input type='text' hidden name='nombrePaciente' value='<?php echo($consultaCita->getNombrePaciente());?>'/>
                        <input type='text' hidden name='ciudad' value='<?php echo($consultaCita->getCiudad());?>'/>
                        <input type='text' hidden name='oficina' value='<?php echo($consultaCita->getOficina());?>'/>
                        <input type='text' hidden name='telefono' value='<?php echo($consultaCita->getTelefono());?>'/>
                        <input type='text' hidden name='fecha' value='<?php echo($consultaCita->getFechaCita());?>'/>
                        <input type='text' hidden name='fechaCita' value='<?php echo($fechaCita);?>'/>
                        <input type='text' hidden name='horaCita' value='<?php echo($consultaCita->getHoraCita());?>'/>
                        <input type='text' hidden name='confirmada' value='<?php echo($consultaCita->getConfirmada());?>'/>
                        <input type='text' hidden name='fechaAgregado' value='<?php echo($consultaCita->getFechaAgregado());?>'/>
                    </form>
                </body>

                <?php
        }else {
            echo $ContarCitasXFecha;
            //foreach($CitasXFecha as $valor){
            //    echo ($valor->gethoraCita());
            //}
            if($ContarCitasXFecha==5){
                $retornor= 1;
                ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/auxAdministrativo/ModificarCita.php' method='post'>
                            <input type='text' hidden name='activar' value='0'/>
                            <input type='text' hidden name='idCita' value='<?php echo($consultaCita->getId());?>'/>
                            <input type='text' hidden name='ccAux' value='<?php echo($ccAux);?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($consultaCita->getNumeroDocumento());?>'/>
                            <input type='text' hidden name='nombrePaciente' value='<?php echo($consultaCita->getNombrePaciente());?>'/>
                            <input type='text' hidden name='ciudad' value='<?php echo($consultaCita->getCiudad());?>'/>
                            <input type='text' hidden name='oficina' value='<?php echo($consultaCita->getOficina());?>'/>
                            <input type='text' hidden name='telefono' value='<?php echo($consultaCita->getTelefono());?>'/>
                            <input type='text' hidden name='fecha' value='<?php echo($consultaCita->getFechaCita());?>'/>
                            <input type='text' hidden name='fechaCita' value='<?php echo($fechaCita);?>'/>
                            <input type='text' hidden name='horaCita' value='<?php echo($consultaCita->getHoraCita());?>'/>
                            <input type='text' hidden name='confirmada' value='<?php echo($consultaCita->getConfirmada());?>'/>
                            <input type='text' hidden name='fechaAgregado' value='<?php echo($consultaCita->getFechaAgregado());?>'/>
                            <?php
                            foreach($CitasXFecha as $valor){?>
                                <input type='text' hidden name='<?php echo ($valor->gethoraCita());  ?>' value='<?php echo($valor->gethoraCita());  ?>'/>
                                
                           <?php  }  ?>
                    </form>
                </body>

                <?php
            }else if($ContarCitasXFecha<=5){
                
                ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/auxAdministrativo/ModificarCita.php' method='post'>
                            <input type='text' hidden name='activar' value='1'/>
                            <input type='text' hidden name='idCita' value='<?php echo($consultaCita->getId());?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($consultaCita->getNumeroDocumento());?>'/>
                            <input type='text' hidden name='nombrePaciente' value='<?php echo($consultaCita->getNombrePaciente());?>'/>
                            <input type='text' hidden name='ciudad' value='<?php echo($consultaCita->getCiudad());?>'/>
                            <input type='text' hidden name='oficina' value='<?php echo($consultaCita->getOficina());?>'/>
                            <input type='text' hidden name='telefono' value='<?php echo($consultaCita->getTelefono());?>'/>
                            <input type='text' hidden name='fecha' value='<?php echo($consultaCita->getFechaCita());?>'/>
                            <input type='text' hidden name='fechaCita' value='<?php echo($fechaCita);?>'/>
                            <input type='text' hidden name='horaCita' value='<?php echo($consultaCita->getHoraCita());?>'/>
                            <input type='text' hidden name='confirmada' value='<?php echo($consultaCita->getConfirmada());?>'/>
                            <input type='text' hidden name='fechaAgregado' value='<?php echo($consultaCita->getFechaAgregado());?>'/>
                            <?php
                            foreach($CitasXFecha as $valor){?>
                                <input type='text' hidden name='<?php echo ($valor->gethoraCita());  ?>' value='<?php echo($valor->gethoraCita());  ?>'/>
                                
                           <?php  }  ?>
                    </form>
                </body>

                <?php
            }
        }

    }else if ($modo == "asignarCita2") {
        $numeroDocumento=$_POST['numeroDocumento'];
        $idCita=$_POST['idCita'];
        $fechaCita=$_POST['fechaCita'];
        $horaCita=$_POST['horaCita'];
        $numeroHistoria = $_POST['numeroHistoria'];

        //echo($ccMed);
        $ModPaciente = new ModeloPaciente();
        $paciente = $ModPaciente->getPacientesXCedua($numeroDocumento);
        $ModMedico = new ModeloMedico();
        //$medico = $ModMedico->getMedicoXCedula($ccMed);
        $ModeloCitas = new ModeloCitas();
        $citas = $ModeloCitas->getCitasXCedula($numeroDocumento);
        $ObjetoCitas = new ObjetoCitas();
        $ObjetoCitas->setId(htmlentities(addslashes($idCita)));
        $ObjetoCitas->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
        $ObjetoCitas->setNumeroHistoria(htmlentities(addslashes($citas->getnumeroHistoria())));
        $ObjetoCitas->setnombrePaciente(htmlentities(addslashes($paciente->getPrimerNombre()." ".$paciente->getPrimerApellido())));
        $ObjetoCitas->settelefono(htmlentities(addslashes($paciente->getTelefono())));
        $ObjetoCitas->setFechaCita(htmlentities(addslashes($fechaCita)));
        $ObjetoCitas->setHoraCita(htmlentities(addslashes($horaCita)));
        $ObjetoCitas->setFk_IdPaciente(htmlentities(addslashes($paciente->getId())));
        $ObjetoCitas->setFk_IdAuxAdmin(htmlentities(addslashes(1)));
        $ObjetoCitas->setFechaAgregado(htmlentities(DATE("Y-m-d H:i:s")));
        $ObjetoCitas->setAsistioPaciente(htmlentities(addslashes(0)));

        $ModeloCitas->actualizaCita($ObjetoCitas);

        //$ModeloRemision = new ModeloRemision();
        //$ObjetoRemision = new ObjetoDatosAdministrativos();
        //$Tomada = 1;
        //$ModeloRemision->aplicarTomadaRemision($Tomada,$citas->getnumeroHistoria());
        
            ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/index/IndexAuxAdministrativo.php' method='post'>
                        <input type='text' hidden name='activar' value='1'/>
                        <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                        
                </form>
            </body>

            <?php
       
    }else if ($modo == "cancelarCita"){
        $numeroDocumento = $_POST["identificacion"];
        $motivo = $_POST["motivo"];
        
        $ModeloCitas = new ModeloCitas();
        $ObjetoCitas = new ObjetoCitas();
        $ObjetoCitas->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
        $ObjetoCitas->setMotivoCancelacion(htmlentities(addslashes($motivo)));

        $ModeloCitas->cancelaCita($ObjetoCitas);
        $retorno = "Cita Cancelada";
        ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/index/IndexAuxAdministrativo.php' method='post'>
                        <input type='text' hidden name='activar' value='1'/>
                        <input type='text' hidden name='aceptada' value='<?php echo($retorno);?>'/>
                        
                </form>
            </body>

            <?php
    
    }else if ($modo == "noconfirmo"){
        $numeroDocumento = $_POST["numeroDocumento"];
        $idcita = $_POST["idcita"];
        
        $ModeloCitas = new ModeloCitas();
        $ObjetoCitas = new ObjetoCitas();
        $ObjetoCitas->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
        $ObjetoCitas->setId(htmlentities(addslashes($idcita)));

        $ModeloCitas->noconfirmo($ObjetoCitas);
        ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/formulariosSolicitud/verCitas.php' method='post'>
                        <input type='text' hidden name='activar' value='1'/>
                        <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                        <input type='text' hidden name='ccAux' value='<?php echo($ccAux);?>'/>
                        
                </form>
            </body>

            <?php
    
    }else if ($modo == "confirmo"){
        $numeroDocumento = $_POST["numeroDocumento"];
        $idcita = $_POST["idcita"];
        
        $ModeloCitas = new ModeloCitas();
        $ObjetoCitas = new ObjetoCitas();
        $ObjetoCitas->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
        $ObjetoCitas->setId(htmlentities(addslashes($idcita)));

        $ModeloCitas->confirmo($ObjetoCitas);
        ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/formulariosSolicitud/verCitas.php' method='post'>
                        <input type='text' hidden name='activar' value='1'/>
                        <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                        <input type='text' hidden name='ccAux' value='<?php echo($ccAux);?>'/>
                        
                </form>
            </body>

            <?php
    
    }else if($modo == "buscedulaSoliFin"){
        $numeroDocumento = $_POST["numeroDocumento"];
        $busqueda = 1;
        ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/auxAdministrativo/SolicitudesTerminadas.php' method='post'>
                        <input type='text' hidden name='activar' value='1'/>
                        <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento);?>'/>
                        <input type='text' hidden name='busqueda' value='<?php echo($busqueda);?>'/>
                        <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                        <input type='text' hidden name='ccAux' value='<?php echo($ccAux);?>'/>
                        
                </form>
            </body>

            <?php
    
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
                                <form name='form' action='../../controlador/datosRemision/DatosRemisionControl.php' method='post'>
                                    <input type='text' hidden id="boton" name='boton' value='null'/>
                                </form>
                            </body>
            <?php
    }
        ?>