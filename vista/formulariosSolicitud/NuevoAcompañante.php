<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>

    <?php 
    include_once("../../modelo/departamentos/ObjetoDepartamentos.php");
    include_once("../../modelo/departamentos/ModeloDepartamentos.php");
    include_once("../../modelo/ciudades/ModeloCiudades.php");
    include_once("../../modelo/ciudades/ObjetoCiudades.php");
    include_once("../../modelo/eps/ModeloEps.php");
    include_once("../../modelo/eps/ObjetoEps.php");
    include_once("../../modelo/Conexion.php");


    //cargar departamentos
    $ControlModeloDep = new ModeloDepartamentos();
    $tabla = $ControlModeloDep->mostrardepartamentos();
    //foreach ($tabla as $valor) {
    //    echo($valor->getDepartamento());
    //}

    //cargar ciudades
    $ControlModeloCiu = new ModeloCiudades();
    $tabla2 = $ControlModeloCiu->mostrarciudad();
    //foreach ($tabla2 as $valor) {
    //    echo($valor->getmunicipio());
    //}
    //cargar eps
    $ControlModeloEps = new ModeloEps();
    $tabla3 = $ControlModeloEps->mostrareps();


    //Obtenemos el id del paciente
    $idPaciente = $_GET["idPaciente"];


    $valorControl=0;     
    if (isset($_POST['control'])) {
        $valorControl = $_POST['control'];
        echo ($valorControl);
        //$nombre = $_POST['nombre'];
    }
    ?>
    
    <h5 style="margin-left:2%;margin-right:2%;" class="p-2 bg-secondary text-white">Datos del acompañante</h5>
</head>

<body class="">
                    
            <br>
        <?php if($valorControl==0){ ?>
            <form action="../../controlador/paciente/PacienteControl.php" method="post" enctype="multipart/form-data" name="form1">
            <div style="margin:0;width:100%;color:#0f4321;" class="container-fluid">

                <div class="row" style="display:flex">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="tipoDocumento">Tipo de documento:</label><br>
                            <select id="tipoDocumento" name="tipoDocumento">
                                <option value="ss">Seleccione...</option>
                                <option value="cc">Cédula de Ciudadanía</option>
                                <option value="ce">Cédula de Extranjería</option>
                                <option value="ps">Pasaporte</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="numero">Numero de documento:</label><br>
                            <input type="text" name="numeroDocumento" id="numeroDocumento">
                            <input type="text" hidden value="<?php echo($idPaciente); ?>" name="idPaciente" id="idPaciente">
                        </div>


                    </div>
                </div>


                <div class="row" style="display:flex;margin-top:1%;">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="primernombrep">Primer Nombre:</label><br>
                            <input type="text" name="primerNombre" id="primerNombre">
                        </div>

                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="segundonombp">Segundo Nombre:</label><br>
                            <input type="text" name="segundoNombre" id="segundoNombre">
                        </div>


                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="primerapellip">Primer Apellido:</label><br>
                            <input type="text" name="primerApellido" id="primerApellido">
                        </div>

                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="segundoapellip">Segundo Apellido:</label><br>
                            <input type="text" name="segundoApellido" id="segundoApellido">
                        </div>

                    </div>


                </div>

                

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="ciudadp">Ciudad:</label><br />
                            <select style="width:65%;" id="ciudad" name="ciudad">
                                <option value="ss">Seleccione...</option>
                                <?php
                                foreach ($tabla2 as $valor) {
                                    ?><option value="<?php echo($valor->getmunicipio()); ?>"> <?php echo($valor->getmunicipio()); ?> </option><?php
                                    
                                }
        ?>
                            </select>

                        </div>


                    </div>


                </div>


                <div class="row" style="display:flex;margin-top:1%;">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="correo">Correo:</label><br>
                            <input type="text" name="correo" id="correo">
                        </div>

                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="col-md-12 col-lg-12">

                            <label for="direccion">Direccion:</label><br>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <input style="width:100%;" type="text" name="direccion" id="direccion">
                        </div>


                    </div>



                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12 text-center" >
                            <label for="telefono">Telefono:</label><br>
                            <input type="text" name="telefono" id="telefono">
                        </div>
                        
                    </div>
                     

                    <div class="row" style="display:flex;margin-top:1%;">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="parentesco">Parentesco:</label>
                        </div>

                    </div>
                     
                    </div>
                </div>
                    <div class="m-4 row justify-content-center col-md-6 col-lg-3 ">
                    <select style="width:65%;" id="parentesco" name="parentesco">
                                    <option value="subsidiado">Padre</option>
                                    <option value="subsidiado">Madre</option>
                                    <option value="subsidiado">Hermano/a</option>
                                    <option value="subsidiado">Tio/a</option>
                                    <option value="subsidiado">Abuelo/a</option>
                                    <option value="subsidiado">Amigo/a</option>
                                    <option value="subsidiado">Esposo/a</option>

                            </select>
                    </div>
                
                
                
                <br>
                <div class="m-0 row justify-content-center col-md-12 col-lg-12 ">
                    <br>
                        <button type="submit" name="boton" value="GuardarAcompañante" 
                      onclick="return confirm('Esta seguro de Enviar?')" >Guardar Acompañante</button>
                      <br>
                      
                </div>
            </div>
        </form> 



        <?php } else {?>




            
            <form action="../../controlador/paciente/PacienteControl.php" method="post" enctype="multipart/form-data" name="form1">
            <div style="margin:0;width:100%;color:#0f4321;" class="container-fluid">

                <div class="row" style="display:flex">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="tipoDocumento">Tipo de documento:</label><br>
                            <select id="tipoDocumento" name="tipoDocumento">
                                <option value="<?php echo($_POST['tipoDocumento']); ?>"> <?php echo($_POST['tipoDocumento']); ?> </option>
                                <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                                <option value="Cedula de Extranjería">Cedula de Extranjería</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="numero">Numero de documento:</label><br>
                            <input hidden type="text" name="id" id="id" value="<?php echo($_POST['id']); ?>">
                            <input type="text" name="numeroDocumento" id="numeroDocumento" value="<?php echo($_POST['numeroDocumento']); ?>">
                        </div>


                    </div>
                </div>


                <div class="row" style="display:flex;margin-top:1%;">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="primernombrep">Primer Nombre:</label><br>
                            <input type="text" name="primerNombre" id="primerNombre" value="<?php echo($_POST['primerNombre']); ?>">
                        </div>

                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="segundonombp">Segundo Nombre:</label><br>
                            <input type="text" name="segundoNombre" id="segundoNombre" value="<?php echo($_POST['segundoNombre']); ?>"> 
                        </div>


                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="primerapellip">Primer Apellido:</label><br>
                            <input type="text" name="primerApellido" id="primerApellido" value="<?php echo($_POST['primerApellido']); ?>">
                        </div>

                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="segundoapellip">Segundo Apellido:</label><br>
                            <input type="text" name="segundoApellido" id="segundoApellido" value="<?php echo($_POST['segundoApellido']); ?>">
                        </div>

                    </div>


                </div>

                

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="ciudadp">Ciudad:</label><br />
                            <select style="width:65%;" id="ciudad" name="ciudad">
                            <option value="<?php echo($_POST['ciudad']); ?>"> <?php echo($_POST['ciudad']); ?> </option>
                                <?php
                                foreach ($tabla2 as $valor) {
                                    ?><option value="<?php echo($valor->getmunicipio()); ?>"> <?php echo($valor->getmunicipio()); ?> </option><?php
                                    
                                }
        ?>
                            </select>

                        </div>


                    </div>

                </div>


                <div class="row" style="display:flex;margin-top:1%;">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="correo">Correo:</label><br>
                            <input type="text" name="correo" id="correo" value="<?php echo($_POST['correo']); ?>">
                        </div>

                    </div>

                    <div class="col-md-6 col-lg-6">
                        <div class="col-md-12 col-lg-12">

                            <label for="direccion">Direccion:</label><br>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <input style="width:100%;" type="text" name="direccion" id="direccion" value="<?php echo($_POST['direccion']); ?>">
                        </div>


                    </div>



                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12 text-center" >
                            <label for="telefono">Telefono:</label><br>
                            <input type="text" name="telefono" id="telefono" value="<?php echo($_POST['telefono']); ?>"> 
                        </div>
                        
                    </div>

                    

                    <div class="row" style="display:flex;margin-top:1%;">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="parentesco">Parentesco:</label>
                        </div>

                    </div>
                     

                </div>
                <div class="m-4 row justify-content-center col-md-6 col-lg-3 ">
                <select style="width:65%;" id="parentesco" name="parentesco">
                                <option value="<?php echo($_POST['contribuyente']); ?>"> <?php echo($_POST['contribuyente']); ?> </option>
                                <option value="subsidiado">Padre</option>
                                <option value="subsidiado">Madre</option>
                                <option value="subsidiado">Hermano/a</option>
                                <option value="subsidiado">Tio/a</option>
                                <option value="subsidiado">Abuelo/a</option>
                                <option value="subsidiado">Amigo/a</option>
                                <option value="subsidiado">Esposo/a</option>

                        </select>
                </div>
                
                <br>
                <div class="m-0 row justify-content-center col-md-12 col-lg-12 ">
                    <br>
                        <button type="submit" name="boton" value="guardarEdicionAcompañante" 
                      onclick="return confirm('Esta seguro de Enviar?')" >Editar</button>
                </div>
            </div>
        </form>                        
            <?php }?>
            
</body>
</html>