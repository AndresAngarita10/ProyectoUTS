<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<?php 
        include_once("../../modelo/medico/ModeloMedico.php");
        include_once("../../modelo/medico/ObjetoMedico.php");
        include_once("../../modelo/auxAdministrativo/ModeloAuxAdministrativo.php");
        include_once("../../modelo/auxAdministrativo/ObjetoAuxAdministrativo.php");
        include_once("../../modelo/auditor/ModeloAuditor.php");
        include_once("../../modelo/auditor/ObjetoAuditor.php");
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
        include_once("../../modelo/usuarios/ModeloUsuarios.php");
        include_once("../../modelo/usuarios/ObjetoUsuarios.php");
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
        if ($modo == "Medico") {
            $ccAdmin = $_POST['ccAdmin'];
            ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/usuarios/CrearMedico.php' method='post'>
                        <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                        <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                </form>
            </body>

            <?php
        }else if ($modo == "Auxiliar") {
            $ccAdmin = $_POST['ccAdmin'];
            ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/usuarios/CrearAuxiliar.php' method='post'>
                        <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                        <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                </form>
            </body>

            <?php

        }else if ($modo == "Auditor") {
            $ccAdmin = $_POST['ccAdmin'];
            ?> 

            <title>Procesando...</title>
            <script type='text/javascript'>
                function enviarForm(){
                    document.form.submit();
                }
            </script>
            </head>
            <body onLoad='javascript:enviarForm();'>
                <form name='form' action='../../vista/usuarios/CrearAuditor.php' method='post'>
                        <input type='text' hidden name='control' value='<?php echo($retorno);?>'/>
                        <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                </form>
            </body>

            <?php

        }else if($modo == "buscarUsuarioCC"){
            $ccAdmin = $_POST['ccAdmin'];
            $cedula = $_POST['cedula'];
            $usuario = new ModeloUsuarios();

            $resultado = $usuario->getUsuariosXCedua($cedula);
            if($resultado!=null){
                ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/usuarios/MostrarUsuario.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
    
                            <input type='text' hidden name='id' value='<?php echo($resultado->getId());?>'/>
                            <input type='text' hidden name='nombre' value='<?php echo($resultado->getNombre());?>'/>
                            <input type='text' hidden name='cedula' value='<?php echo($resultado->getCedula());?>'/>
                            <input type='text' hidden name='tipoUsuario' value='<?php echo($resultado->getTipoUsuario());?>'/>
                            <input type='text' hidden name='roles' value='<?php echo($resultado->getRolesActivos());?>'/>
                            <input type='text' hidden name='habilitado' value='<?php echo($resultado->getHabilitado());?>'/>
                            <input type='text' hidden name='fechaAgregado' value='<?php echo($resultado->getFechaAgregado());?>'/>
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
                    <form name='form' action='../../vista/index/IndexAdministrador.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
    
                    </form>
                </body>
    
                <?php

            }
            
        
        }else if($modo == "GuardarMedico"){
            $ccAdmin = $_POST['ccAdmin'];
            $tipoDocumento = $_POST['tipoDocumento'];
            $numeroDocumento = $_POST['numeroDocumento'];
            $primerNombre = $_POST['primerNombre'];
            $segundoNombre = $_POST['segundoNombre'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $correo = $_POST['correo'];
            $ciudadT = $_POST['ciudadT'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $especialidad = $_POST['especialidad'];

            $modeloMedico = new ModeloMedico();
            $medico = new ObjetoMedico();
            $medico->setTipoDocumento(htmlentities(addslashes($tipoDocumento)));
            $medico->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
            $medico->setPrimerNombre(htmlentities(addslashes($primerNombre)));
            $medico->setSegundoNombre(htmlentities(addslashes($segundoNombre)));
            $medico->setPrimerApellido(htmlentities(addslashes($primerApellido)));
            $medico->setSegundoApellido(htmlentities(addslashes($segundoApellido)));
            $medico->setCorreo(htmlentities(addslashes($correo)));
            $medico->setCiudadTrabajo(htmlentities(addslashes($ciudadT)));
            $medico->setDireccion(htmlentities(addslashes($direccion)));
            $medico->setTelefono(htmlentities(addslashes($telefono)));
            $medico->setEspecialidad(htmlentities(addslashes($especialidad)));
            $medico->setActivo("1");
            $medico->setFechaAgregado(DATE("Y-m-d H:i:s"));
            $modeloMedico->insertar($medico);
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/usuarios/AsignarContraseña.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                            <input type='text' hidden name='nombres' value='<?php echo($primerNombre." ".$primerApellido); ?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento); ?>'/>
                            <input type='text' hidden name='tipoUsuario' value='<?php echo("medico"); ?>'/>
                            <input type='text' hidden name='fkIdRol' value='<?php echo("1"); ?>'/>
                            <input type='text' hidden name='rolesActivos' value='<?php echo("medico"); ?>'/>
    
    
    
                    </form>
                </body>
    
                <?php

        }else if($modo == "GuardarAuxiliar"){
            $ccAdmin = $_POST['ccAdmin'];
            $tipoDocumento = $_POST['tipoDocumento'];
            $numeroDocumento = $_POST['numeroDocumento'];
            $primerNombre = $_POST['primerNombre'];
            $segundoNombre = $_POST['segundoNombre'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];

            $modeloAuxiliar = new ModeloAuxiliar();
            $aux = new ObjetoAuxAdministrativo();
            $aux->setTipoDocumento(htmlentities(addslashes($tipoDocumento)));
            $aux->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
            $aux->setPrimerNombre(htmlentities(addslashes($primerNombre)));
            $aux->setSegundoNombre(htmlentities(addslashes($segundoNombre)));
            $aux->setPrimerApellido(htmlentities(addslashes($primerApellido)));
            $aux->setSegundoApellido(htmlentities(addslashes($segundoApellido)));
            $aux->setCorreo(htmlentities(addslashes($correo)));
            $aux->setDireccion(htmlentities(addslashes($direccion)));
            $aux->setTelefono(htmlentities(addslashes($telefono)));
            $aux->setActivo("1");
            $aux->setFechaAgregado(DATE("Y-m-d H:i:s"));
            $modeloAuxiliar->insertar($aux);
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/usuarios/AsignarContraseña.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                            <input type='text' hidden name='nombres' value='<?php echo($primerNombre." ".$primerApellido); ?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento); ?>'/>
                            <input type='text' hidden name='tipoUsuario' value='<?php echo("auxiliar"); ?>'/>
                            <input type='text' hidden name='fkIdRol' value='<?php echo("2"); ?>'/>
                            <input type='text' hidden name='rolesActivos' value='<?php echo("auxiliar"); ?>'/>
    
    
    
                    </form>
                </body>
    
                <?php

        }else if($modo == "GuardarAuditor"){
            $ccAdmin = $_POST['ccAdmin'];
            $tipoDocumento = $_POST['tipoDocumento'];
            $numeroDocumento = $_POST['numeroDocumento'];
            $primerNombre = $_POST['primerNombre'];
            $segundoNombre = $_POST['segundoNombre'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $correo = $_POST['correo'];
            $ciudadT = $_POST['ciudadT'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];

            $ModeloAuditor = new ModeloAuditor();
            $aditor = new ObjetoAuditor();
            $aditor->setTipoDocumento(htmlentities(addslashes($tipoDocumento)));
            $aditor->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
            $aditor->setPrimerNombre(htmlentities(addslashes($primerNombre)));
            $aditor->setSegundoNombre(htmlentities(addslashes($segundoNombre)));
            $aditor->setPrimerApellido(htmlentities(addslashes($primerApellido)));
            $aditor->setSegundoApellido(htmlentities(addslashes($segundoApellido)));
            $aditor->setCorreo(htmlentities(addslashes($correo)));
            $aditor->setCiudad(htmlentities(addslashes($ciudadT)));
            $aditor->setDireccion(htmlentities(addslashes($direccion)));
            $aditor->setTelefono(htmlentities(addslashes($telefono)));
            $aditor->setHabilitado("1");
            $aditor->setFechaAgregado(DATE("Y-m-d H:i:s"));
            $ModeloAuditor->insertar($aditor);
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/usuarios/AsignarContraseña.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                            <input type='text' hidden name='nombres' value='<?php echo($primerNombre." ".$primerApellido); ?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento); ?>'/>
                            <input type='text' hidden name='tipoUsuario' value='<?php echo("auditor"); ?>'/>
                            <input type='text' hidden name='fkIdRol' value='<?php echo("3"); ?>'/>
                            <input type='text' hidden name='rolesActivos' value='<?php echo("auditor"); ?>'/>
    
    
    
                    </form>
                </body>
    
                <?php

        }else if($modo == "guardarP"){
            $ccAdmin = $_POST['ccAdmin'];
            $numeroDocumento = $_POST['numeroDocumento'];
            $nombres = $_POST['nombres'];
            $tipoUsuario = $_POST['tipoUsuario'];
            $fkIdRol = $_POST['fkIdRol'];
            $rolesActivos = $_POST['rolesActivos'];
            $clave1 = $_POST['clave1'];
            $clave2 = $_POST['clave2'];//password_verify($pass, $passHash)
            
            if($clave1==$clave2){
                $pass = $_POST['clave1'];    
                $passHash = password_hash($pass, PASSWORD_BCRYPT);
                //echo $passHash;
                
                $ModeloUsuario = new ModeloUsuarios();
                $Usuario = new ObjetoUsuarios();
                $Usuario->setNombre(htmlentities(addslashes($nombres)));
                $Usuario->setCedula(htmlentities(addslashes($numeroDocumento)));
                $Usuario->setClave(htmlentities(addslashes($passHash)));
                $Usuario->setTipoUsuario(htmlentities(addslashes($tipoUsuario)));
                $Usuario->setfkIdRol(htmlentities(addslashes($fkIdRol)));
                $Usuario->setFechaAgregado(DATE("Y-m-d H:i:s"));
                $Usuario->setRolesActivos(htmlentities(addslashes($rolesActivos)));
                $Usuario->setHabilitado(htmlentities(addslashes("1")));
                $ModeloUsuario->insertar($Usuario);
                ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/index/IndexAdministrador.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
    
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
                    <form name='form' action='../../vista/usuarios/AsignarContraseña.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                            <input type='text' hidden name='nombres' value='<?php echo($nombres); ?>'/>
                            <input type='text' hidden name='numeroDocumento' value='<?php echo($numeroDocumento); ?>'/>
                            <input type='text' hidden name='tipoUsuario' value='<?php echo("medico"); ?>'/>
                            <input type='text' hidden name='fkIdRol' value='<?php echo("1"); ?>'/>
                            <input type='text' hidden name='rolesActivos' value='<?php echo("medico"); ?>'/>
    
    
    
                    </form>
                </body>
    
                <?php
            }
        }else if($modo == "editarUsuario"){
            $ccAdmin = $_POST['ccAdmin'];
            $numeroDocumento = $_POST['numeroDocumento'];
            $tipoUsuario = $_POST['tipoUsuario'];

            if($tipoUsuario == "medico"){
                $modeloMedico = new ModeloMedico();
                $Med = $modeloMedico->getMedicoXCedula($numeroDocumento);
                ?> 

                    <title>Procesando...</title>
                    <script type='text/javascript'>
                        function enviarForm(){
                            document.form.submit();
                        }
                    </script>
                    </head>
                    <body onLoad='javascript:enviarForm();'>
                        <form name='form' action='../../vista/usuarios/CrearMedico.php' method='post'>
                                <input type='text' hidden name='mod' value='<?php echo("1"); ?>'/>
                                <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                                <input type='text' hidden name='tipoDocumento' value='<?php echo($Med->getTipoDocumento()); ?>'/>
                                <input type='text' hidden name='numeroDocumento' value='<?php echo($Med->getNumeroDocumento()); ?>'/>
                                <input type='text' hidden name='primerNombre' value='<?php echo($Med->getPrimerNombre()); ?>'/>
                                <input type='text' hidden name='segundoNombre' value='<?php echo($Med->getSegundoNombre()); ?>'/>
                                <input type='text' hidden name='primerApellido' value='<?php echo($Med->getPrimerApellido()); ?>'/>
                                <input type='text' hidden name='segundoApellido' value='<?php echo($Med->getSegundoApellido()); ?>'/>
                                <input type='text' hidden name='correo' value='<?php echo($Med->getCorreo()); ?>'/>
                                <input type='text' hidden name='ciudad' value='<?php echo($Med->getCiudadTrabajo()); ?>'/>
                                <input type='text' hidden name='direccion' value='<?php echo($Med->getDireccion()); ?>'/>
                                <input type='text' hidden name='telefono' value='<?php echo($Med->getTelefono()); ?>'/>
                                <input type='text' hidden name='especialidad' value='<?php echo($Med->getEspecialidad()); ?>'/>
        
        
        
                        </form>
                    </body>
        
                    <?php
            }else if($tipoUsuario == "auxiliar"){
                $modeloAuxiliar = new ModeloAuxiliar();
                $aux = new ObjetoAuxAdministrativo();
                $auxR = $modeloAuxiliar->getAuxXCedula($numeroDocumento);
                ?> 

                    <title>Procesando...</title>
                    <script type='text/javascript'>
                        function enviarForm(){
                            document.form.submit();
                        }
                    </script>
                    </head>
                    <body onLoad='javascript:enviarForm();'>
                        <form name='form' action='../../vista/usuarios/CrearAuxiliar.php' method='post'>
                                <input type='text' hidden name='mod' value='<?php echo("1"); ?>'/>
                                <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                                <input type='text' hidden name='numeroDocumento' value='<?php echo($auxR->getNumeroDocumento()); ?>'/>
                                <input type='text' hidden name='primerNombre' value='<?php echo($auxR->getPrimerNombre()); ?>'/>
                                <input type='text' hidden name='segundoNombre' value='<?php echo($auxR->getSegundoNombre()); ?>'/>
                                <input type='text' hidden name='primerApellido' value='<?php echo($auxR->getPrimerApellido()); ?>'/>
                                <input type='text' hidden name='segundoApellido' value='<?php echo($auxR->getSegundoApellido()); ?>'/>
                                <input type='text' hidden name='correo' value='<?php echo($auxR->getCorreo()); ?>'/>
                                <input type='text' hidden name='direccion' value='<?php echo($auxR->getDireccion()); ?>'/>
                                <input type='text' hidden name='telefono' value='<?php echo($auxR->getTelefono()); ?>'/>
        
        
        
                        </form>
                    </body>
        
                    <?php

            }else if ($tipoUsuario == "auditor"){
                $ModeloAuditor = new ModeloAuditor();
                $Aud = $ModeloAuditor->getAuditorXCedula($numeroDocumento);
                ?> 

                    <title>Procesando...</title>
                    <script type='text/javascript'>
                        function enviarForm(){
                            document.form.submit();
                        }
                    </script>
                    </head>
                    <body onLoad='javascript:enviarForm();'>
                        <form name='form' action='../../vista/usuarios/CrearAuditor.php' method='post'>
                                <input type='text' hidden name='mod' value='<?php echo("1"); ?>'/>
                                <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
                                <input type='text' hidden name='numeroDocumento' value='<?php echo($Aud->getNumeroDocumento()); ?>'/>
                                <input type='text' hidden name='primerNombre' value='<?php echo($Aud->getPrimerNombre()); ?>'/>
                                <input type='text' hidden name='segundoNombre' value='<?php echo($Aud->getSegundoNombre()); ?>'/>
                                <input type='text' hidden name='primerApellido' value='<?php echo($Aud->getPrimerApellido()); ?>'/>
                                <input type='text' hidden name='segundoApellido' value='<?php echo($Aud->getSegundoApellido()); ?>'/>
                                <input type='text' hidden name='correo' value='<?php echo($Aud->getCorreo()); ?>'/>
                                <input type='text' hidden name='ciudad' value='<?php echo($Aud->getciudad()); ?>'/>
                                <input type='text' hidden name='direccion' value='<?php echo($Aud->getDireccion()); ?>'/>
                                <input type='text' hidden name='telefono' value='<?php echo($Aud->getTelefono()); ?>'/>
        
        
        
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
                    <form name='form' action='../../vista/index/IndexAdministrador.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
    
                    </form>
                </body>
    
                <?php

            }


        }else if ($modo == "ActualizarAditor"){
            $ccAdmin = $_POST['ccAdmin'];
            $tipoDocumento = $_POST['tipoDocumento'];
            $numeroDocumento = $_POST['numeroDocumento'];
            $primerNombre = $_POST['primerNombre'];
            $segundoNombre = $_POST['segundoNombre'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $correo = $_POST['correo'];
            $ciudadT = $_POST['ciudadT'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            //echo $primerNombre;

            $ModeloAuditor = new ModeloAuditor();
            $auditor = new ObjetoAuditor();
            $auditor->setTipoDocumento(htmlentities(addslashes($tipoDocumento)));
            $auditor->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
            $auditor->setPrimerNombre(htmlentities(addslashes($primerNombre)));
            $auditor->setSegundoNombre(htmlentities(addslashes($segundoNombre)));
            $auditor->setPrimerApellido(htmlentities(addslashes($primerApellido)));
            $auditor->setSegundoApellido(htmlentities(addslashes($segundoApellido)));
            $auditor->setCorreo(htmlentities(addslashes($correo)));
            $auditor->setCiudad(htmlentities(addslashes($ciudadT)));
            $auditor->setDireccion(htmlentities(addslashes($direccion)));
            $auditor->setTelefono(htmlentities(addslashes($telefono)));
            $ModeloAuditor->actualizaAuditor($auditor);
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/index/IndexAdministrador.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
    
                    </form>
                </body>
    
                <?php
        }else if($modo == "ActualizarMedico"){
            $ccAdmin = $_POST['ccAdmin'];
            $tipoDocumento = $_POST['tipoDocumento'];
            $numeroDocumento = $_POST['numeroDocumento'];
            $primerNombre = $_POST['primerNombre'];
            $segundoNombre = $_POST['segundoNombre'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $correo = $_POST['correo'];
            $ciudadT = $_POST['ciudadT'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $especialidad = $_POST['especialidad'];

            $modeloMedico = new ModeloMedico();
            $medico = new ObjetoMedico();
            $medico->setTipoDocumento(htmlentities(addslashes($tipoDocumento)));
            $medico->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
            $medico->setPrimerNombre(htmlentities(addslashes($primerNombre)));
            $medico->setSegundoNombre(htmlentities(addslashes($segundoNombre)));
            $medico->setPrimerApellido(htmlentities(addslashes($primerApellido)));
            $medico->setSegundoApellido(htmlentities(addslashes($segundoApellido)));
            $medico->setCorreo(htmlentities(addslashes($correo)));
            $medico->setCiudadTrabajo(htmlentities(addslashes($ciudadT)));
            $medico->setDireccion(htmlentities(addslashes($direccion)));
            $medico->setTelefono(htmlentities(addslashes($telefono)));
            $medico->setEspecialidad(htmlentities(addslashes($especialidad)));
            $modeloMedico->actualizaMedico($medico);
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/index/IndexAdministrador.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
    
                    </form>
                </body>
    
                <?php

        }else if($modo == "ActualizarAuxiliar"){
            $ccAdmin = $_POST['ccAdmin'];
            $tipoDocumento = $_POST['tipoDocumento'];
            $numeroDocumento = $_POST['numeroDocumento'];
            $primerNombre = $_POST['primerNombre'];
            $segundoNombre = $_POST['segundoNombre'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];

            $modeloAuxiliar = new ModeloAuxiliar();
            $aux = new ObjetoAuxAdministrativo();
            $aux->setTipoDocumento(htmlentities(addslashes($tipoDocumento)));
            $aux->setNumeroDocumento(htmlentities(addslashes($numeroDocumento)));
            $aux->setPrimerNombre(htmlentities(addslashes($primerNombre)));
            $aux->setSegundoNombre(htmlentities(addslashes($segundoNombre)));
            $aux->setPrimerApellido(htmlentities(addslashes($primerApellido)));
            $aux->setSegundoApellido(htmlentities(addslashes($segundoApellido)));
            $aux->setCorreo(htmlentities(addslashes($correo)));
            $aux->setDireccion(htmlentities(addslashes($direccion)));
            $aux->setTelefono(htmlentities(addslashes($telefono)));
            $modeloAuxiliar->actualizaAux($aux);
            ?> 

                <title>Procesando...</title>
                <script type='text/javascript'>
                    function enviarForm(){
                        document.form.submit();
                    }
                </script>
                </head>
                <body onLoad='javascript:enviarForm();'>
                    <form name='form' action='../../vista/index/IndexAdministrador.php' method='post'>
                            <input type='text' hidden name='ccAdmin' value='<?php echo($ccAdmin); //?Medico= echo($ccMed); ?>'/>
    
                    </form>
                </body>
    
                <?php

        }else if ($modo == "login"){
            $cedula = $_POST['cedula'];
            $pass = $_POST['pass'];
            $ModeloUsuario = new ModeloUsuarios();
            $modeloMedico = new ModeloMedico();
            $usuario = $ModeloUsuario->getUsuariosXCedua($cedula);
            $passHash = $usuario->getClave();
            if(password_verify($pass, $passHash)== true){
                //echo "correcto";
                if($usuario->getTipoUsuario()=="medico"){
                        $medico = $modeloMedico->getMedicoXCedula($cedula);
                       if($medico->getCiudadTrabajo()=="bucaramanga"){
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
                                        <input type='text' hidden name='ccMEd' value='<?php echo($usuario->getCedula()); //?Medico= echo($ccMed); ?>'/>
                
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
                                <form name='form' action='../../vista/index/IndexMedico.php' method='post'>
                                        <input type='text' hidden name='ccMEd' value='<?php echo($usuario->getCedula()); //?Medico= echo($ccMed); ?>'/>
                
                                </form>
                            </body>
                
                            <?php

                       }
                }else if($usuario->getTipoUsuario()=="auditor"){
                    ?> 

                            <title>Procesando...</title>
                            <script type='text/javascript'>
                                function enviarForm(){
                                    document.form.submit();
                                }
                            </script>
                            </head>
                            <body onLoad='javascript:enviarForm();'>
                                <form name='form' action='../../vista/index/IndexAuditor.php' method='post'>
                                        <input type='text' hidden name='ccAuditor' value='<?php echo($usuario->getCedula()); //?Medico= echo($ccMed); ?>'/>
                
                                </form>
                            </body>
                
                            <?php
                
                }else if($usuario->getTipoUsuario()=="auxiliar"){
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
                                        <input type='text' hidden name='ccAux' value='<?php echo($usuario->getCedula()); //?Medico= echo($ccMed); ?>'/>
                
                                </form>
                            </body>
                
                            <?php
                }else if($usuario->getTipoUsuario()=="admin"){
                    ?> 

                            <title>Procesando...</title>
                            <script type='text/javascript'>
                                function enviarForm(){
                                    document.form.submit();
                                }
                            </script>
                            </head>
                            <body onLoad='javascript:enviarForm();'>
                                <form name='form' action='../../vista/index/IndexAdministrador.php' method='post'>
                                        <input type='text' hidden name='ccAdmin' value='<?php echo($usuario->getCedula()); //?Medico= echo($ccMed); ?>'/>
                
                                </form>
                            </body>
                
                            <?php

                }


            }else{
                header("Location: ../../vista/inicio/login.php?error=1");
                die();
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
                                <form name='form' action='../../vista/inicio/login.php' method='post'>
                                    <input type='text' hidden id="boton" name='boton' value='null'/>
                                </form>
                            </body>
            <?php
        }


        ?>