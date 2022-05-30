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
        include_once("../../modelo/paciente/ObjetoPaciente.php");
        include_once("../../modelo/paciente/ObjetoPaciente.php");
        include_once("../../modelo/paciente/Modelopaciente.php");
        include_once("../../modelo/acompañante/ObjetoAcompañante.php");
        include_once("../../modelo/acompañante/ModeloAcompañante.php");
        include_once("../../modelo/historiaClinica/ModeloHistoriaClinica.php");
        include_once("../../modelo/Conexion.php");
        
        $ModPaciente = new ModeloPaciente();
        $ModAcompañante = new ModeloAcompañante();
        $Paciente = new ObjetoPaciente();
        $acompañante = new ObjetoAcompañante();
        $ModHistoria = new ModeloHistoriaClinica;

        $modo = $_POST['boton'];
        if ($modo == "Gu") {
            $Paciente->setTipoDocumento(htmlentities(addslashes($_POST["tipoDocumento"])));
            $Paciente->setNumeroDocumento(htmlentities(addslashes($_POST["numeroDocumento"])));
            $Paciente->setPrimerNombre(htmlentities(addslashes($_POST["primerNombre"])));
            $Paciente->setSegundoNombre(htmlentities(addslashes($_POST["segundoNombre"])));
            $Paciente->setPrimerApellido(htmlentities(addslashes($_POST["primerApellido"])));
            $Paciente->setSegundoApellido(htmlentities(addslashes($_POST["segundoApellido"])));
            $Paciente->setPais(htmlentities(addslashes($_POST["pais"])));
            $Paciente->setDepartamento(htmlentities(addslashes($_POST["departamento"])));
            $Paciente->setCiudad(htmlentities(addslashes($_POST["ciudad"])));
            $Paciente->setFechaNacimiento(htmlentities(addslashes($_POST["fechaNacimiento"])));
            $Paciente->setCorreo(htmlentities(addslashes($_POST["correo"])));
            $Paciente->setDireccion(htmlentities(addslashes($_POST["direccion"])));
            $Paciente->setTelefono(htmlentities(addslashes($_POST["telefono"])));
            $Paciente->setEps(htmlentities(addslashes($_POST["eps"])));
            $Paciente->setTipoContribuyente(addslashes($_POST["tipoContribuyente"]));
            $Paciente->setFechaAgregado(DATE("Y-m-d H:i:s"));
            $Paciente->setAcompañante("0");
            $Paciente->setHabilitado("1");
            $ModPaciente->insertar($Paciente);
            echo $_POST["numeroDocumento"];
            header("Location: ../../vista/formulariosSolicitud/MostrarPaciente.php");
            die();


        }else if ($modo == "buscedula"){
            $cedula = $_POST['cedula'];
            echo "cedula: ".$cedula;
            $paciente=null;
            $paciente = $ModPaciente->getPacientesXCedua($cedula);
             //echo($paciente->getPrimerApellido());
             if($paciente==null){
                header("Location: ../../vista/formulariosSolicitud/MostrarPaciente.php");
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
                    <form name='Form' action='../../vista/formulariosSolicitud/MostrarPaciente.php' method='POST'>
                        <input type='hidden' name='control' value='1'/>
                        <input type='hidden' name='id' value='<?php echo($paciente->getId()); ?>'/>
                        <input type='hidden' name='tipoDocumento' value='<?php echo($paciente->getTipoDocumento()); ?>'/>
                        <input type='hidden' name='numeroDocumento' value='<?php echo($paciente->getNumeroDocumento()); ?>'/>
                        <input type='hidden' name='nombre' value='<?php echo($paciente->getPrimerNombre()." - ".$paciente->getSegundoNombre()); ?>'/>
                        <input type='hidden' name='apellido' value='<?php echo($paciente->getPrimerApellido()." - ".$paciente->getSegundoApellido()); ?>'/>
                        <input type='hidden' name='departamento' value='<?php echo($paciente->getDepartamento()); ?>'/>
                        <input type='hidden' name='ciudad' value='<?php echo($paciente->getCiudad()); ?>'/>
                        <input type='hidden' name='fnaci' value='<?php echo($paciente->getFechaNacimiento()); ?>'/>
                        <input type='hidden' name='correo' value='<?php echo($paciente->getCorreo()); ?>'/>
                        <input type='hidden' name='diireccion' value='<?php echo($paciente->getDireccion()); ?>'/>
                        <input type='hidden' name='telefono' value='<?php echo($paciente->getTelefono()); ?>'/>
                        <input type='hidden' name='eps' value='<?php echo($paciente->getEps()); ?>'/>
                        <input type='hidden' name='contribuyente' value='<?php echo($paciente->getTipoContribuyente()); ?>'/>
                        <input type='hidden' name='fagregado' value='<?php echo($paciente->getFechaAgregado()); ?>'/>
                        <input type='hidden' name='acompañante' value='<?php echo($paciente->getAcompañante()); ?>'/>
                        <input type='hidden' name='habilitado' value='<?php echo($paciente->getHabilitado()); ?>'/>
                    </form>
                </body>
            <?php
        }
    }else if ($modo == "editar"){
        echo "entro a editar, identificacion ".$_POST['identificacion']." y cedula: ".$_POST['cedula'];
        $cedula = $_POST['cedula'];
        echo "cedula: ".$cedula;
        $paciente=null;
        $paciente = $ModPaciente->getPacientesXCedua($cedula);
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
                <form name='Form' action='../../vista/formulariosSolicitud/NuevoPaciente.php' method='POST'>
                    <input type='hidden' name='control' value='1'/>
                    <input type='hidden' name='id' value='<?php echo($paciente->getId()); ?>'/>
                    <input type='hidden' name='tipoDocumento' value='<?php echo($paciente->getTipoDocumento()); ?>'/>
                    <input type='hidden' name='numeroDocumento' value='<?php echo($paciente->getNumeroDocumento()); ?>'/>
                    <input type='hidden' name='primerNombre' value='<?php echo($paciente->getPrimerNombre()); ?>'/>
                    <input type='hidden' name='segundoNombre' value='<?php echo($paciente->getSegundoNombre()); ?>'/>
                    <input type='hidden' name='primerApellido' value='<?php echo($paciente->getPrimerApellido()); ?>'/>
                    <input type='hidden' name='segundoApellido' value='<?php echo($paciente->getSegundoApellido()); ?>'/>
                    <input type='hidden' name='pais' value='<?php echo($paciente->getPais()); ?>'/>
                    <input type='hidden' name='departamento' value='<?php echo($paciente->getDepartamento()); ?>'/>
                    <input type='hidden' name='ciudad' value='<?php echo($paciente->getCiudad()); ?>'/>
                    <input type='hidden' name='fnaci' value='<?php echo($paciente->getFechaNacimiento()); ?>'/>
                    <input type='hidden' name='correo' value='<?php echo($paciente->getCorreo()); ?>'/>
                    <input type='hidden' name='direccion' value='<?php echo($paciente->getDireccion()); ?>'/>
                    <input type='hidden' name='telefono' value='<?php echo($paciente->getTelefono()); ?>'/>
                    <input type='hidden' name='eps' value='<?php echo($paciente->getEps()); ?>'/>
                    <input type='hidden' name='contribuyente' value='<?php echo($paciente->getTipoContribuyente()); ?>'/>
                    <input type='hidden' name='fagregado' value='<?php echo($paciente->getFechaAgregado()); ?>'/>
                </form>
            </body>
        <?php
    }else if ($modo == "guardarEdicion"){
        //echo($_POST["id"]);
        $ModPaciente = new ModeloPaciente();
                    $Paciente = new ObjetoPaciente();
                    $Paciente->setId(htmlentities(addslashes($_POST["id"])));
                    $Paciente->setTipoDocumento(htmlentities(addslashes($_POST["tipoDocumento"])));
                    $Paciente->setNumeroDocumento(htmlentities(addslashes($_POST["numeroDocumento"])));
                    $Paciente->setPrimerNombre(htmlentities(addslashes($_POST["primerNombre"])));
                    $Paciente->setSegundoNombre(htmlentities(addslashes($_POST["segundoNombre"])));
                    $Paciente->setPrimerApellido(htmlentities(addslashes($_POST["primerApellido"])));
                    $Paciente->setSegundoApellido(htmlentities(addslashes($_POST["segundoApellido"])));
                    $Paciente->setPais(htmlentities(addslashes($_POST["pais"])));
                    $Paciente->setDepartamento(htmlentities(addslashes($_POST["departamento"])));
                    $Paciente->setCiudad(htmlentities(addslashes($_POST["ciudad"])));
                    $Paciente->setFechaNacimiento(htmlentities(addslashes($_POST["fechaNacimiento"])));
                    $Paciente->setCorreo(htmlentities(addslashes($_POST["correo"])));
                    $Paciente->setDireccion(htmlentities(addslashes($_POST["direccion"])));
                    $Paciente->setTelefono(htmlentities(addslashes($_POST["telefono"])));
                    $Paciente->setEps(htmlentities(addslashes($_POST["eps"])));
                    $Paciente->setTipoContribuyente(addslashes($_POST["tipoContribuyente"]));
                    $ModPaciente->actualizaPaciente($Paciente);

                    $retorno = 2;
                    header("Location: ../../vista/formulariosSolicitud/MostrarPaciente.php?pagina=1&&retorno=".$retorno);//&&xuypd=".$control);
                    die();
    
    }else if ($modo == "GuAcomp") {
        $Paciente->setTipoDocumento(htmlentities(addslashes($_POST["tipoDocumento"])));
        $Paciente->setNumeroDocumento(htmlentities(addslashes($_POST["numeroDocumento"])));
        $Paciente->setPrimerNombre(htmlentities(addslashes($_POST["primerNombre"])));
        $Paciente->setSegundoNombre(htmlentities(addslashes($_POST["segundoNombre"])));
        $Paciente->setPrimerApellido(htmlentities(addslashes($_POST["primerApellido"])));
        $Paciente->setSegundoApellido(htmlentities(addslashes($_POST["segundoApellido"])));
        $Paciente->setPais(htmlentities(addslashes($_POST["pais"])));
        $Paciente->setDepartamento(htmlentities(addslashes($_POST["departamento"])));
        $Paciente->setCiudad(htmlentities(addslashes($_POST["ciudad"])));
        $Paciente->setFechaNacimiento(htmlentities(addslashes($_POST["fechaNacimiento"])));
        $Paciente->setCorreo(htmlentities(addslashes($_POST["correo"])));
        $Paciente->setDireccion(htmlentities(addslashes($_POST["direccion"])));
        $Paciente->setTelefono(htmlentities(addslashes($_POST["telefono"])));
        $Paciente->setEps(htmlentities(addslashes($_POST["eps"])));
        $Paciente->setTipoContribuyente(addslashes($_POST["tipoContribuyente"]));
        $Paciente->setFechaAgregado(DATE("Y-m-d H:i:s"));
        $Paciente->setAcompañante("1");
        $Paciente->setHabilitado("1");
        $ModPaciente->insertar($Paciente);
        echo $_POST["numeroDocumento"];
        $idPaciente = $ModPaciente->getPacientesID($_POST["numeroDocumento"]);
        header("Location: ../../vista/formulariosSolicitud/NuevoAcompañante.php?idPaciente=".$idPaciente->getId()."&paciente=".$_POST["numeroDocumento"]);
        die();


    }else if($modo == "GuardarAcompañante"){
        $acompañante->setTipoDocumento(htmlentities(addslashes($_POST["tipoDocumento"])));
        $acompañante->setNumeroDocumento(htmlentities(addslashes($_POST["numeroDocumento"])));
        $acompañante->setPrimerNombre(htmlentities(addslashes($_POST["primerNombre"])));
        $acompañante->setSegundoNombre(htmlentities(addslashes($_POST["segundoNombre"])));
        $acompañante->setPrimerApellido(htmlentities(addslashes($_POST["primerApellido"])));
        $acompañante->setSegundoApellido(htmlentities(addslashes($_POST["segundoApellido"])));
        $acompañante->setCorreo(htmlentities(addslashes($_POST["correo"])));
        $acompañante->setDireccion(htmlentities(addslashes($_POST["direccion"])));
        $acompañante->setTelefono(htmlentities(addslashes($_POST["telefono"])));
        $acompañante->setParentesco(htmlentities(addslashes($_POST["parentesco"])));
        $acompañante->setFechaAgregado(DATE("Y-m-d H:i:s"));
        $acompañante->setfkPacienteId(htmlentities(addslashes($_POST["idPaciente"])));
        //$acompañante->setHabilitado("1");
        $ModAcompañante->insertar($acompañante);
        echo $_POST["numeroDocumento"];
        header("Location: ../../vista/formulariosSolicitud/MostrarPaciente.php");
        die();
    }else if ($modo == "AgregarAcompañante"){

        $ModPaciente->actualizarEstadoAcompañante(1,$_POST["id"]);
        header("Location: ../../vista/formulariosSolicitud/NuevoAcompañante.php?idPaciente=".$_POST["id"]."&paciente=".$_POST["numeroDocumento"]);
        die();

    }else if ($modo == "des") {
        $id = $_POST["identificacion"];

        $ModPaciente = new ModeloPaciente();
        $ModPaciente->desabilitarPaciente($id);
        $retorno = 3;
        header("Location: ../../vista/formulariosSolicitud/MostrarPaciente.php");
        die();


    }else if ($modo == "hab") {
        $id = $_POST["identificacion"];

        $ModPaciente = new ModeloPaciente();
        $ModPaciente->habilitarPaciente($id);
        $retorno = 3;
        header("Location: ../../vista/formulariosSolicitud/MostrarPaciente.php");
        die();


    }else if ($modo == "validarpaciente"){
        $id = $_POST["identificacion"];
        $ccMed = $_POST["ccMed"];
        $ModPaciente = new ModeloPaciente();
        $validarexistencia = $ModPaciente->getPacientesXCedua($id);
            //$result = $ModItemProducto->validarVentasActivasCliente($id);
        if($validarexistencia==null){ 
            header("Location: ../../vista/formulariosSolicitud/NuevoPaciente.php");
            }else {
            $validarHisFase1 = $ModHistoria->validarHistoriaxPaciente($_POST["identificacion"]);
            $validarHisFase2 = $ModHistoria->validarAntecedentes($_POST["identificacion"]);
            $validarHisFase3 = $ModHistoria->validarEnfermedades($_POST["identificacion"]);
            $validarHisFase4 = $ModHistoria->validarExamenFisico($_POST["identificacion"]);
            
            if($validarHisFase1!=null){
                if($validarHisFase2!=null){
                    if($validarHisFase3!=null){
                        if($validarHisFase4!=null){
                            
                            header("Location: ../../vista/formulariosSolicitud/MostrarEror.php");

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
                                <form name='form' action='../../vista/formulariosSolicitud/NuevoExamenFisico.php' method='post'>
                                    <input type='text' hidden name='control' value='2'/>
                                    <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                                    <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                                    $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                                    <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                                    <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                                    <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                                    <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                                    <input type='text' hidden name='numeroHistoria' value='<?php echo($validarHisFase1->getnumeroHistoria()); ?>'/>
                                    <input type='text' hidden name='fechaAgregado' value='<?php echo($validarHisFase1->getfrechaAgregado()); ?>'/>
                                    <input type='text' hidden name='motivoConsulta' value='<?php echo($validarHisFase1->getmotivoConsulta()); ?>'/>
                                    <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                                </form>
                            </body>
                            <?php
                        }
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
                            <form name='form' action='../../vista/formulariosSolicitud/NuevoEnfermedades.php' method='post'>
                            <input type='text' hidden name='control' value='2'/>
                                <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                                <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                                $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                                <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                                <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                                <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                                <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                                <input type='text' hidden name='numeroHistoria' value='<?php echo($validarHisFase1->getnumeroHistoria()); ?>'/>
                                <input type='text' hidden name='fechaAgregado' value='<?php echo($validarHisFase1->getfrechaAgregado()); ?>'/>
                                <input type='text' hidden name='motivoConsulta' value='<?php echo($validarHisFase1->getmotivoConsulta()); ?>'/>
                                <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                            </form>
                        </body>
                        <?php
                    }
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
                        <form name='form' action='../../vista/formulariosSolicitud/NuevoAntecedentesPersonales.php' method='post'>
                                <input type='text' hidden name='control' value='2'/>
                                <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                                <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                                $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                                <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                                <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                                <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                                <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                                <input type='text' hidden name='numeroHistoria' value='<?php echo($validarHisFase1->getnumeroHistoria()); ?>'/>
                                <input type='text' hidden name='fechaAgregado' value='<?php echo($validarHisFase1->getfrechaAgregado()); ?>'/>
                                <input type='text' hidden name='motivoConsulta' value='<?php echo($validarHisFase1->getmotivoConsulta()); ?>'/>
                                <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                        </form>
                    </body>
                    <?php
                }
            }else { 
                //if($result == null){
                    ?> 
                    
                        <title>Procesando...</title>
                    <script type='text/javascript'>
                        function enviarForm(){
                            document.form.submit();
                        }
                    </script>
                    </head>
                    <body onLoad='javascript:enviarForm();'>
                        <form name='form' action='../../vista/formulariosSolicitud/NuevaHistoriaClinica.php' method='post'>
                                <input type='text' hidden name='control' value='2'/>
                                <input type='text' hidden id="id" name='iditem' value='<?php echo($validarexistencia->getId()); ?>'/>
                                <input type='text' hidden name='nombres' value='<?php echo($validarexistencia->getPrimerNombre()." ".
                                $validarexistencia->getSegundoNombre()." ".$validarexistencia->getPrimerApellido()." ".$validarexistencia->getSegundoApellido()); ?>'/>
                                <input type='text' hidden name='numeroDocumento' value='<?php echo($validarexistencia->getNumeroDocumento()); ?>'/>
                                <input type='text' hidden id="ciudad" name='ciudad' value='<?php echo($validarexistencia->getCiudad()); ?>'/>
                                <input type='text' hidden name='eps' value='<?php echo($validarexistencia->getEps()); ?>'/>
                                <input type='text' hidden name='tipoC' value='<?php echo($validarexistencia->getTipoContribuyente()); ?>'/>
                                <input type='text' hidden name='ccMed' value='<?php echo($ccMed); //?Medico= echo($ccMed); ?>'/>
                        </form>
                    </body>
                    <?php
                    //header("Location: ../../vistas/productos/MostrarProductosCliente.php");
                }
        } //else {
           // $cliente = $modeloCliente->buscarCliente($id);
           // header("Location: ../../vistas/productos/VenderProducto.php?pagina=1&&cedula=".$cliente->getCedula()."&&nombre=".$cliente->getNombre());
       // }
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
                                <form name='form' action='../../controlador/registroSolicitud/RegistroSolicitudControl.php' method='post'>
                                    <input type='text' hidden id="boton" name='boton' value='null'/>
                                </form>
                            </body>
            <?php
    }



        ?>
    <h1>  </h1>
</body>
</html>