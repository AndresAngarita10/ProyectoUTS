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
        if ($modo == "Gu") {
            $Medico->setTipoDocumento(htmlentities(addslashes($_POST["tipoDocumento"])));
            $Medico->setNumeroDocumento(htmlentities(addslashes($_POST["numeroDocumento"])));
            $Medico->setPrimerNombre(htmlentities(addslashes($_POST["primerNombre"])));
            $Medico->setSegundoNombre(htmlentities(addslashes($_POST["segundoNombre"])));
            $Medico->setPrimerApellido(htmlentities(addslashes($_POST["primerApellido"])));
            $Medico->setSegundoApellido(htmlentities(addslashes($_POST["segundoApellido"])));
            $Medico->setCorreo(htmlentities(addslashes($_POST["correo"])));
            $Medico->setDireccion(htmlentities(addslashes($_POST["direccion"])));
            $Medico->setTelefono(htmlentities(addslashes($_POST["telefono"])));
            $Medico->setFechaAgregado(DATE("Y-m-d H:i:s"));
            $Medico->setEspecialidad(htmlentities(addslashes($_POST["especialidad"])));
            $Medico->setActivo("1");
            $ModMedico->insertar($Medico);
            echo $_POST["numeroDocumento"];
            header("Location: ../../vista/medico/MostrarMedico.php");
            die();


        }else if ($modo == "buscedula"){
            $cedula = $_POST['cedula'];
            echo "cedula: ".$cedula;
            $Medico=null;
            $Medico = $ModMedico->getMedicoXCedula($cedula);
             //echo($paciente->getPrimerApellido());
             if($Medico==null){
                header("Location: ../../vista/medico/MostrarMedico.php");
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
                    <form name='Form' action='../../vista/medico/MostrarMedico.php' method='POST'>
                        <input type='hidden' name='control' value='1'/>
                        <input type='hidden' name='id' value='<?php echo($Medico->getId()); ?>'/>
                        <input type='hidden' name='tipoDocumento' value='<?php echo($Medico->getTipoDocumento()); ?>'/>
                        <input type='hidden' name='numeroDocumento' value='<?php echo($Medico->getNumeroDocumento()); ?>'/>
                        <input type='hidden' name='nombre' value='<?php echo($Medico->getPrimerNombre()." - ".$Medico->getSegundoNombre()); ?>'/>
                        <input type='hidden' name='apellido' value='<?php echo($Medico->getPrimerApellido()." - ".$Medico->getSegundoApellido()); ?>'/>
                        <input type='hidden' name='correo' value='<?php echo($Medico->getCorreo()); ?>'/>
                        <input type='hidden' name='diireccion' value='<?php echo($Medico->getDireccion()); ?>'/>
                        <input type='hidden' name='telefono' value='<?php echo($Medico->getTelefono()); ?>'/>
                        <input type='hidden' name='especialidad' value='<?php echo($Medico->getEspecialidad()); ?>'/>
                        <input type='hidden' name='activo' value='<?php echo($Medico->getActivo()); ?>'/>
                        <input type='hidden' name='fagregado' value='<?php echo($Medico->getFechaAgregado()); ?>'/>
                    </form>
                </body>
            <?php
        }
    }else if ($modo == "editar"){
        echo "entro a editar, identificacion ".$_POST['identificacion']." y cedula: ".$_POST['cedula'];
        $cedula = $_POST['cedula'];
        echo "cedula: ".$cedula;
        $paciente=null;
        $paciente = $ModMedico->getMedicoXCedula($cedula);
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
                <form name='Form' action='../../vista/medico/NuevoMedico.php' method='POST'>
                    <input type='hidden' name='control' value='1'/>
                    <input type='hidden' name='id' value='<?php echo($paciente->getId()); ?>'/>
                    <input type='hidden' name='tipoDocumento' value='<?php echo($paciente->getTipoDocumento()); ?>'/>
                    <input type='hidden' name='numeroDocumento' value='<?php echo($paciente->getNumeroDocumento()); ?>'/>
                    <input type='hidden' name='primerNombre' value='<?php echo($paciente->getPrimerNombre()); ?>'/>
                    <input type='hidden' name='segundoNombre' value='<?php echo($paciente->getSegundoNombre()); ?>'/>
                    <input type='hidden' name='primerApellido' value='<?php echo($paciente->getPrimerApellido()); ?>'/>
                    <input type='hidden' name='segundoApellido' value='<?php echo($paciente->getSegundoApellido()); ?>'/>
                    <input type='hidden' name='correo' value='<?php echo($paciente->getCorreo()); ?>'/>
                    <input type='hidden' name='direccion' value='<?php echo($paciente->getDireccion()); ?>'/>
                    <input type='hidden' name='telefono' value='<?php echo($paciente->getTelefono()); ?>'/>
                    <input type='hidden' name='especialidad' value='<?php echo($paciente->getEspecialidad()); ?>'/>
                    <input type='hidden' name='activo' value='<?php echo($paciente->getActivo()); ?>'/>
                    <input type='hidden' name='fagregado' value='<?php echo($paciente->getFechaAgregado()); ?>'/>
                </form>
            </body>
        <?php
    }else if ($modo == "guardarEdicion"){
        //echo($_POST["id"]);
        $ModMedico = new ModeloMedico();
                    $Medico = new ObjetoMedico();
                    $Medico->setId(htmlentities(addslashes($_POST["id"])));
                    $Medico->setTipoDocumento(htmlentities(addslashes($_POST["tipoDocumento"])));
                    $Medico->setNumeroDocumento(htmlentities(addslashes($_POST["numeroDocumento"])));
                    $Medico->setPrimerNombre(htmlentities(addslashes($_POST["primerNombre"])));
                    $Medico->setSegundoNombre(htmlentities(addslashes($_POST["segundoNombre"])));
                    $Medico->setPrimerApellido(htmlentities(addslashes($_POST["primerApellido"])));
                    $Medico->setSegundoApellido(htmlentities(addslashes($_POST["segundoApellido"])));
                    $Medico->setCorreo(htmlentities(addslashes($_POST["correo"])));
                    $Medico->setDireccion(htmlentities(addslashes($_POST["direccion"])));
                    $Medico->setTelefono(htmlentities(addslashes($_POST["telefono"])));
                    $Medico->setFechaAgregado(DATE("Y-m-d H:i:s"));
                    $Medico->setEspecialidad(htmlentities(addslashes($_POST["especialidad"])));
                    $Medico->setActivo("1");
                    $ModMedico->actualizaMedico($Medico);

                    $retorno = 2;
                    header("Location: ../../vista/medico/MostrarMedico.php?pagina=1&&retorno=".$retorno);//&&xuypd=".$control);
                    die();
    
    }else if ($modo == "desactivarMedico") {
        $id = $_POST["identificacion"];

        $ModMedico = new ModeloMedico();
        $ModMedico->desabilitarMedico($id);
        $retorno = 3;
        header("Location: ../../vista/medico/MostrarMedico.php");
        die();


    }else if ($modo == "activarMedico") {
        $id = $_POST["identificacion"];

        $ModMedico = new ModeloMedico();
        $ModMedico->habilitarMedico($id);
        $retorno = 3;
        header("Location: ../../vista/medico/MostrarMedico.php");
        die();


    }else if($modo == "GuardarHistoriaFase1"){
            $ccMed = $_POST['ccMed'];
            $paciente = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
            $random = rand(1, 100);
            $numeroHistoria = $_POST["numeroDocumento"] . $random;

            $HistoriaF1->setnumeroHistoria(htmlentities(addslashes($numeroHistoria)));
            $HistoriaF1->setidentificacionPaciente(htmlentities(addslashes($_POST["numeroDocumento"])));
            $HistoriaF1->setidentificacionMedico(htmlentities(addslashes($ccMed)));
            $HistoriaF1->setmotivoConsulta(htmlentities(addslashes($_POST["motivoConsulta"])));
            $HistoriaF1->setenfermedadActual(htmlentities(addslashes($_POST["enfermedadActual"])));
            $HistoriaF1->setantecedentesEnfActual(htmlentities(addslashes($_POST["antEnfermedadActual"])));
            $HistoriaF1->setfk_IdPaciente(htmlentities(addslashes($paciente->getId())));
            $HistoriaF1->setfrechaAgregado(DATE("Y-m-d H:i:s"));

            $ModHistoria->guardarHistoriaF1($HistoriaF1);

            $validarexistencia = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
            $historia = $ModHistoria->validarHistoriaxPaciente($_POST["numeroDocumento"]);
            ?> 
                
            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/formulariosSolicitud/NuevoAntecedentesPersonales.php' method='post'>
                        <input type='text' hidden name='control' value='2'/>
                        <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                        <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                        $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                        <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                        <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                        <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                        <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                        <input type='text' hidden name='numeroHistoria' value='<?php echo($numeroHistoria); ?>'/>
                        <input type='text' hidden name='fechaAgregado' value='<?php echo($historia->getfrechaAgregado()); ?>'/>
                        <input type='text' hidden name='motivoConsulta' value='<?php echo($historia->getmotivoConsulta()); ?>'/>
                        <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                </form>
            </body>
            <?php
        
    }else if($modo == "GuardarHistoriaFase2"){
            $ccMed = $_POST['ccMed'];
            $paciente = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
            $random = rand(1, 100);
            //$numeroHistoria = $_POST["numeroHistoria"] ;
            $historia = $ModHistoria->validarHistoriaxPaciente($_POST["numeroDocumento"]);

            $Antecedentes->setnumeroHistoria(htmlentities(addslashes($historia->getnumeroHistoria())));
            $Antecedentes->setidentificacionPaciente(htmlentities(addslashes($_POST["numeroDocumento"])));
            $Antecedentes->setalcoholHT(htmlentities(addslashes($_POST["alcoholHT"])));
            $Antecedentes->settabacoHT(htmlentities(addslashes($_POST["tabacoHT"])));
            $Antecedentes->setdrogasHT(htmlentities(addslashes($_POST["drogasHT"])));
            $Antecedentes->setinfucionesHT(htmlentities(addslashes($_POST["infucionesHT"])));
            $Antecedentes->setalimentacionHF(htmlentities(addslashes($_POST["alimentacionHF"])));
            $Antecedentes->setdiuresisHF(htmlentities(addslashes($_POST["diuresisHF"])));
            $Antecedentes->setcatarsisHF(htmlentities(addslashes($_POST["catarsisHF"])));
            $Antecedentes->setsueñoHF(htmlentities(addslashes($_POST["sueñoHF"])));
            $Antecedentes->setsexualidadHF(htmlentities(addslashes($_POST["sexualidadHF"])));
            $Antecedentes->setotrosHF(htmlentities(addslashes($_POST["otrosHF"])));
            $Antecedentes->setenfermedadesInfancia(htmlentities(addslashes($_POST["enfermedadesInfancia"])));
            $Antecedentes->setantecedentesHeredados(htmlentities(addslashes($_POST["antecedentesHeredados"])));
            $Antecedentes->setfk_IdHistoriaClinica(htmlentities(addslashes($historia->getId())));
            $Antecedentes->setfrechaAgregado(DATE("Y-m-d H:i:s"));

            $ModHistoria->guardarHistoriaF2($Antecedentes);

            $validarexistencia = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
            ?> 
                
            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/formulariosSolicitud/NuevoEnfermedades.php' method='post'>
                        <input type='text' hidden name='control' value='2'/>
                        <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                        <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                        $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                        <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                        <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                        <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                        <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                        <input type='text' hidden name='numeroHistoria' value='<?php echo($historia->getnumeroHistoria()); ?>'/>
                        <input type='text' hidden name='fechaAgregado' value='<?php echo($historia->getfrechaAgregado()); ?>'/>
                        <input type='text' hidden name='motivoConsulta' value='<?php echo($historia->getmotivoConsulta()); ?>'/>
                        <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                </form>
            </body>
            <?php
    }else if($modo == "GuardarHistoriaFase3"){
        $ccMed = $_POST['ccMed'];
        $paciente = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
        $random = rand(1, 100);
        //$numeroHistoria = $_POST["numeroHistoria"] ;
        $historia = $ModHistoria->validarHistoriaxPaciente($_POST["numeroDocumento"]);

        $Enfermedades->setnumeroHistoria(htmlentities(addslashes($historia->getnumeroHistoria())));
        $Enfermedades->setidentificacionPaciente(htmlentities(addslashes($_POST["numeroDocumento"])));
        $Enfermedades->setCV(htmlentities(addslashes($_POST["cv"])));
        $Enfermedades->setrespiratorio(htmlentities(addslashes($_POST["respiratorio"])));
        $Enfermedades->setgastrointestinales(htmlentities(addslashes($_POST["gastrointestinales"])));
        $Enfermedades->setnefrourologicos(htmlentities(addslashes($_POST["nefrourologicos"])));
        $Enfermedades->setneurologicos(htmlentities(addslashes($_POST["neurologicos"])));
        $Enfermedades->sethematologicos(htmlentities(addslashes($_POST["hematologicos"])));
        $Enfermedades->setginecologicos(htmlentities(addslashes($_POST["ginecologicos"])));
        $Enfermedades->setinfectologicos(htmlentities(addslashes($_POST["infectologicos"])));
        $Enfermedades->setendocrinologicos(htmlentities(addslashes($_POST["endocrinologicos"])));
        $Enfermedades->setquirurgicos(htmlentities(addslashes($_POST["quirurgicos"])));
        $Enfermedades->settraumatologicos(htmlentities(addslashes($_POST["traumatologicos"])));
        $Enfermedades->setalergicos(htmlentities(addslashes($_POST["alergicos"])));
        $Enfermedades->setfk_IdHistoriaClinica(htmlentities(addslashes($historia->getId())));
        $Enfermedades->setfrechaAgregado(DATE("Y-m-d H:i:s"));

        $ModHistoria->guardarHistoriaF3($Enfermedades);

        $validarexistencia = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
        ?> 
            
        <title>Procesando...</title>
        <script type='text/javascript'>
            function enviarForm(){
                document.form.submit();
            }
        </script>
        </head>
        <body onLoad='javascript:enviarForm();'>
            <form name='form' action='../../vista/formulariosSolicitud/NuevoExamenFisico.php' method='post'>
                    <input type='text' hidden name='control' value='2'/>
                    <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                    <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                    $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                    <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                    <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                    <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                    <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                    <input type='text' hidden name='numeroHistoria' value='<?php echo($historia->getnumeroHistoria()); ?>'/>
                    <input type='text' hidden name='fechaAgregado' value='<?php echo($historia->getfrechaAgregado()); ?>'/>
                    <input type='text' hidden name='motivoConsulta' value='<?php echo($historia->getmotivoConsulta()); ?>'/>
                    <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
            </form>
        </body>
        <?php
    }else if($modo == "GuardarHistoriaFase4"){
        $ccMed = $_POST['ccMed'];
        $paciente = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
        //$numeroHistoria = $_POST["numeroHistoria"] ;
        $historia = $ModHistoria->validarHistoriaxPaciente($_POST["numeroDocumento"]);

        $Examen->setnumeroHistoria(htmlentities(addslashes($historia->getnumeroHistoria())));
        $Examen->setidentificacionPaciente(htmlentities(addslashes($_POST["numeroDocumento"])));
        $Examen->setTA(htmlentities(addslashes($_POST["ta"])));
        $Examen->setFC(htmlentities(addslashes($_POST["fc"])));
        $Examen->setFR(htmlentities(addslashes($_POST["fr"])));
        $Examen->settemperatura(htmlentities(addslashes($_POST["temperatura"])));
        $Examen->setpeso(htmlentities(addslashes($_POST["peso"])));
        $Examen->setaltura(htmlentities(addslashes($_POST["altura"])));
        $Examen->setimc(htmlentities(addslashes($_POST["imc"])));
        $Examen->setimpresionGeneral(htmlentities(addslashes($_POST["impresionGeneral"])));
        $Examen->setconstitucion(htmlentities(addslashes($_POST["constitucion"])));
        $Examen->setfacies(htmlentities(addslashes($_POST["facies"])));
        $Examen->setactitud(htmlentities(addslashes($_POST["actitud"])));
        $Examen->setdecubito(htmlentities(addslashes($_POST["decubito"])));
        $Examen->setmarcha(htmlentities(addslashes($_POST["marcha"])));
        $Examen->setaspecto(htmlentities(addslashes($_POST["aspecto"])));
        $Examen->setlesiones(htmlentities(addslashes($_POST["lesiones"])));
        $Examen->setfk_IdHistoriaClinica(htmlentities(addslashes($historia->getId())));
        $Examen->setfrechaAgregado(DATE("Y-m-d H:i:s"));

        $ModHistoria->guardarHistoriaF4($Examen);

        $validarexistencia = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
        ?> 
            
        <title>Procesando...</title>
        <script type='text/javascript'>
            function enviarForm(){
                document.form.submit();
            }
        </script>
        </head>
        <body onLoad='javascript:enviarForm();'>
            <form name='form' action='../../vista/formulariosSolicitud/NuevosDatosRemision.php' method='post'>
                    <input type='text' hidden name='control' value='2'/>
                    <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                    <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                    $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                    <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                    <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                    <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                    <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                    <input type='text' hidden name='numeroHistoria' value='<?php echo($historia->getnumeroHistoria()); ?>'/>
                    <input type='text' hidden name='fechaAgregado' value='<?php echo($historia->getfrechaAgregado()); ?>'/>
                    <input type='text' hidden name='motivoConsulta' value='<?php echo($historia->getmotivoConsulta()); ?>'/>
                    <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
            </form>
        </body>
        <?php
    }else if($modo == "guardarRemisionMedico"){

        $ccMed = $_POST['ccMed'];
        $historia = $_POST["numeroDocumento"];
        $paciente = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
        //$numeroHistoria = $_POST["numeroHistoria"] ;
        $historia = $ModHistoria->validarHistoriaxPaciente($_POST["numeroDocumento"]);
        $consultaMedico = $ModMedico->getMedicoXCedula($ccMed);
        $validarRemision = $ModRemision->validarRemisionActiva($_POST['numeroHistoria']);
        echo($_POST['numeroHistoria']);
        $validacion = 3;
        foreach ($validarRemision as $valor){
            echo($valor->getFinalizado());
            if($valor->getFinalizado()==0){
                $validacion = $valor->getFinalizado();
            }
        }
        if($validarRemision!=null){
            
            if($validacion==0){
                $retorno = "Ya existe una remision activa para este paciente y historia clinica";
                ?>
                                <title>Procesando...</title>
                    <script type='text/javascript'>
                        function enviarForm(){
                            document.form.submit();
                        }
                    </script>
                    </head>
                    <body onLoad='javascript:enviarForm();'>
                        <form name='form' action='../../vista/index/IndexMedico.php' method='post'>
                                <input type='text' hidden name='retorno' value='<?php echo($retorno);?>'/>
                                <input type='text' hidden name='ccMed' value='<?php echo($ccMed);?>'/>
                        </form>
                    </body>

                    <?php
            }else {
                $DatosRemision->setTipoSolicitud(htmlentities(addslashes("remision")));
                $DatosRemision->setnumeroHistoria(htmlentities(addslashes($historia->getnumeroHistoria())));
                $DatosRemision->setidentificacionPaciente(htmlentities(addslashes($_POST["numeroDocumento"])));
                $DatosRemision->setMedicoSolicitante(htmlentities(addslashes($consultaMedico->getPrimerNombre()."-".$consultaMedico->getPrimerApellido())));
                $DatosRemision->setServicioRemite(htmlentities(addslashes("revisar")));
                $DatosRemision->setServicioRemitido(htmlentities(addslashes("revisar")));
                $DatosRemision->setEntidadResponsablePago(htmlentities(addslashes($paciente->getEps())));
                $DatosRemision->setTelefono(htmlentities(addslashes($paciente->getTelefono())));
                $DatosRemision->setEspecialidadRemite(htmlentities(addslashes($consultaMedico->getEspecialidad())));
                $DatosRemision->setEspecialidadRemitido(htmlentities(addslashes($_POST["especialidad"])));
                $DatosRemision->setobservaciones(htmlentities(addslashes($_POST["observaciones"])));
                $DatosRemision->setFechaAgregado(DATE("Y-m-d H:i:s"));
                $DatosRemision->setfkIdMedico(htmlentities(addslashes($consultaMedico->getId())));
                $DatosRemision->setFinalizado(htmlentities(addslashes(0)));
    
                $ModHistoria->guardarRemision($DatosRemision);
                
                $retorno = "Guardada la Nueva Remision";
                ?> 

                <title>Procesando...</title>
                    <script type='text/javascript'>
                        function enviarForm(){
                            document.form.submit();
                        }
                    </script>
                    </head>
                    <body onLoad='javascript:enviarForm();'>
                        <form name='form' action='../../vista/index/IndexMedico.php' method='post'>
                                <input type='text' hidden name='retorno' value='<?php echo($retorno);?>'/>
                                <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                        </form>
                    </body>

                <?php
        }
            }else {
                $DatosRemision->setTipoSolicitud(htmlentities(addslashes("remision")));
                $DatosRemision->setnumeroHistoria(htmlentities(addslashes($historia->getnumeroHistoria())));
                $DatosRemision->setidentificacionPaciente(htmlentities(addslashes($_POST["numeroDocumento"])));
                $DatosRemision->setMedicoSolicitante(htmlentities(addslashes($consultaMedico->getPrimerNombre()."-".$consultaMedico->getPrimerApellido())));
                $DatosRemision->setServicioRemite(htmlentities(addslashes("revisar")));
                $DatosRemision->setServicioRemitido(htmlentities(addslashes("revisar")));
                $DatosRemision->setEntidadResponsablePago(htmlentities(addslashes($paciente->getEps())));
                $DatosRemision->setTelefono(htmlentities(addslashes($paciente->getTelefono())));
                $DatosRemision->setEspecialidadRemite(htmlentities(addslashes($consultaMedico->getEspecialidad())));
                $DatosRemision->setEspecialidadRemitido(htmlentities(addslashes($_POST["especialidad"])));
                $DatosRemision->setobservaciones(htmlentities(addslashes($_POST["observaciones"])));
                $DatosRemision->setFechaAgregado(DATE("Y-m-d H:i:s"));
                $DatosRemision->setfkIdMedico(htmlentities(addslashes($consultaMedico->getId())));
                $DatosRemision->setFinalizado(htmlentities(addslashes(0)));
    
                $ModHistoria->guardarRemision($DatosRemision);
                
                $retorno = "Guardada la Nueva Remision";
                ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/index/IndexMedico.php' method='post'>
                            <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                            <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                    </form>
                </body>

                <?php
            }

        
    }else if($modo == "AbrirCita"){

        $ccMed = $_POST['ccMed'];
        $numeroDocumento = $_POST["numeroDocumento"];
        $idRemision = $_POST["idRemision"];
        $numeroHistoria = $_POST["numeroHistoria"];
        $idCita = $_POST["idCita"];

        $ModCitas = new ModeloCitas();
        $ObjetoCitas = new ObjetoCitas();
        $ObjetoCitas->setId(htmlentities(addslashes($idCita)));
        $ObjetoCitas->setAsistioPaciente(htmlentities(addslashes(1)));
        $ObjetoCitas->setTomoMedico(htmlentities(addslashes(1)));
        $ObjetoCitas->setCedulaMedicoFinal(htmlentities(addslashes($ccMed)));
        
        $ModCitas->TomarCitaXMedicoFinal($ObjetoCitas);


        $paciente = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
        $historia = $ModHistoria->validarHistoriaxPaciente($_POST["numeroDocumento"]);
        $validarexistencia = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);

        ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/formulariosSolicitud/NuevoExamenFisico2.php' method='post'>

                    <input type='text' hidden name='control' value='2'/>
                    <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                    <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                    $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                    <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                    <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                    <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                    <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                    <input type='text' hidden name='numeroHistoria' value='<?php echo($historia->getnumeroHistoria()); ?>'/>
                    <input type='text' hidden name='fechaAgregado' value='<?php echo($historia->getfrechaAgregado()); ?>'/>
                    <input type='text' hidden name='motivoConsulta' value='<?php echo($historia->getmotivoConsulta()); ?>'/>
                    <input type='text' hidden name='idRemision' value='<?php echo($idRemision); ?>'/>
                    <input type='text' hidden name='idCita' value='<?php echo($idCita); ?>'/>
                    <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                </form>
            </body>

        <?php
    }else if($modo == "GuardarHistoriaFase5"){
        

        $ccMed = $_POST['ccMed'];
        $numeroDocumento = $_POST['numeroDocumento'];
        $idCita = $_POST['idCita'];
        $idRemision = $_POST['idRemision'];
        $numeroHistoria = $_POST['numeroHistoria'];
        $paciente = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
        //$numeroHistoria = $_POST["numeroHistoria"] ;
        $historia = $ModHistoria->validarHistoriaxPaciente($_POST["numeroDocumento"]);

        $Examen->setnumeroHistoria(htmlentities(addslashes($numeroHistoria)));
        $Examen->setidentificacionPaciente(htmlentities(addslashes($_POST["numeroDocumento"])));
        $Examen->setTA(htmlentities(addslashes($_POST["ta"])));
        $Examen->setFC(htmlentities(addslashes($_POST["fc"])));
        $Examen->setFR(htmlentities(addslashes($_POST["fr"])));
        $Examen->settemperatura(htmlentities(addslashes($_POST["temperatura"])));
        $Examen->setpeso(htmlentities(addslashes($_POST["peso"])));
        $Examen->setaltura(htmlentities(addslashes($_POST["altura"])));
        $Examen->setimc(htmlentities(addslashes($_POST["imc"])));
        $Examen->setimpresionGeneral(htmlentities(addslashes($_POST["impresionGeneral"])));
        $Examen->setconstitucion(htmlentities(addslashes($_POST["constitucion"])));
        $Examen->setfacies(htmlentities(addslashes($_POST["facies"])));
        $Examen->setactitud(htmlentities(addslashes($_POST["actitud"])));
        $Examen->setdecubito(htmlentities(addslashes($_POST["decubito"])));
        $Examen->setmarcha(htmlentities(addslashes($_POST["marcha"])));
        $Examen->setaspecto(htmlentities(addslashes($_POST["aspecto"])));
        $Examen->setlesiones(htmlentities(addslashes($_POST["lesiones"])));
        $Examen->setfk_IdHistoriaClinica(htmlentities(addslashes($historia->getId())));
        $Examen->setSegundoExamen(htmlentities(addslashes(1)));
        $Examen->setfrechaAgregado(DATE("Y-m-d H:i:s"));

        $ModHistoria->guardarSegundoExamenFisico($Examen);

        $validarexistencia = $ModPaciente->getPacientesXCedua($_POST["numeroDocumento"]);
        ?> 
            
        <title>Procesando...</title>
        <script type='text/javascript'>
            function enviarForm(){
                document.form.submit();
            }
        </script>
        </head>
        <body onLoad='javascript:enviarForm();'>
            <form name='form' action='../../vista/medico/FormulacionMedica.php' method='post'>
                    <input type='text' hidden name='control' value='2'/>
                    <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                    <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                    $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                    <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                    <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                    <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                    <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                    <input type='text' hidden name='numeroHistoria' value='<?php echo($numeroHistoria); ?>'/>
                    <input type='text' hidden name='fechaAgregado' value='<?php echo($historia->getfrechaAgregado()); ?>'/>
                    <input type='text' hidden name='motivoConsulta' value='<?php echo($historia->getmotivoConsulta()); ?>'/>
                    <input type='text' hidden name='idRemision' value='<?php echo($idRemision); ?>'/>
                    <input type='text' hidden name='idCita' value='<?php echo($idCita); ?>'/>
                    <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
            </form>
        </body>
        <?php
    }else if($modo == "FormulacionMedica"){

        
        $ccMed = $_POST['ccMed'];
        $numeroDocumento = $_POST['numeroDocumento'];
        $idCita = $_POST['idCita'];
        $idRemision = $_POST['idRemision'];
        $numeroHistoria = $_POST['numeroHistoria'];
        $observaciones = $_POST['observaciones'];

        $paciente = $ModPaciente->getPacientesXCedua($numeroDocumento);
        $medico = $ModMedico->getMedicoXCedula($ccMed);

        $ModHistoria->finalizarHistoria($numeroHistoria);

        $ModDatosRemision = new ModeloRemision();
        $ModDatosRemision->finalizarDatosRemision($idRemision);

        $ModResgistroSolicitud = new ModeloRegistroSolicitud();
        $ObjetoRegistroSolicitud = new ObjetoRegistroSolicitud();
        $nombrePaciente= $paciente->getPrimerNombre()." ".$paciente->getSegundoNombre()." ".$paciente->getPrimerApellido()." ".$paciente->getSegundoApellido();
        $nombreMedico = $medico->getPrimerNombre()." ".$medico->getSegundoNombre()." ".$medico->getPrimerApellido()." ".$medico->getSegundoApellido();
        $ObjetoRegistroSolicitud->setCedulaPaciente(htmlentities(addslashes($numeroDocumento)));
        $ObjetoRegistroSolicitud->setNombrePaciente(htmlentities(addslashes($nombrePaciente)));
        $ObjetoRegistroSolicitud->setIdSolicitudRemision(htmlentities(addslashes($idRemision)));
        $ObjetoRegistroSolicitud->setMedicoSolicitante(htmlentities(addslashes($nombreMedico)));
        $ObjetoRegistroSolicitud->setCedulaMedico(htmlentities(addslashes($ccMed)));
        $ObjetoRegistroSolicitud->setObservacion(htmlentities(addslashes($observaciones)));
        $ObjetoRegistroSolicitud->setHistoriaClinica(htmlentities(addslashes($numeroHistoria)));
        $ObjetoRegistroSolicitud->setCedAcompañante(htmlentities(addslashes(0)));
        $ObjetoRegistroSolicitud->setfkIdPaciente(htmlentities(addslashes($paciente->getId())));
        $ObjetoRegistroSolicitud->setfkIdDatosRemision(htmlentities(addslashes($idRemision)));
        $ObjetoRegistroSolicitud->setFechaAgregado(htmlentities(addslashes(DATE("Y-m-d H:i:s"))));
        $ObjetoRegistroSolicitud->setUsuarioTerminooSolicitud(htmlentities(addslashes("none")));

        $ModResgistroSolicitud->insertar($ObjetoRegistroSolicitud);
        ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/index/indexMedicoFinal.php' method='post'>
                            <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                            <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                    </form>
                </body>

                <?php
}else if ($modo == "validarccHistoria"){
    $numeroDocumento = $_POST['identificacion'];
    $ccMed = $_POST['ccMed'];
    $HistoriaCliF1 = new ModeloHistoriaClinica();
    $validarHistorias = $HistoriaCliF1->getHistoriaF1xCedula($numeroDocumento);
    if(empty($HistoriaCliF1->getHistoriaF1xCedula($numeroDocumento))){
        echo "vacio";
        ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/index/indexMedicoFinal.php' method='post'>
                            <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                            <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                    </form>
                </body>

                <?php
    }else{
        ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/medico/HistoriasClinicas.php' method='post'>
                            <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento);?>'/>
                            <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                    </form>
                </body>

                <?php
    }

}else if($modo == "busCedulaDescHistoria"){
    $numeroDocumento = $_POST['numeroDocumento'];
    $ccMed = $_POST['ccMed'];
    $HistoriaCliF1 = new ModeloHistoriaClinica();
    $validarHistorias = $HistoriaCliF1->getHistoriaF1xCedula($numeroDocumento);
    if(empty($HistoriaCliF1->getHistoriaF1xCedula($numeroDocumento))){
        echo "vacio";
        ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/index/indexMedicoFinal.php' method='post'>
                            <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                            <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                    </form>
                </body>

                <?php
    }else{
        ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/medico/HistoriasClinicas.php' method='post'>
                            <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento);?>'/>
                            <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
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
                                <form name='form' action='../../controlador/notasAdministrativas/NotasAdministraticasControl.php' method='post'>
                                    <input type='text' hidden id="boton" name='boton' value='null'/>
                                </form>
                            </body>
            <?php
}
?>