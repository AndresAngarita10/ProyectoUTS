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

        
    include_once("../../modelo/especialidades/ModeloEspecialidad.php");
    include_once("../../modelo/especialidades/ObjetoEspecialidad.php");
    include_once("../../modelo/Conexion.php");


    //cargar especialidad
    $ControlModeloEsp = new ModeloEspecialidad();
    $tabla3 = $ControlModeloEsp->mostrarEspecialidad();
    //foreach ($tabla as $valor) {
    //    echo($valor->getDepartamento());
    //}


    $valorControl=0;     
    if (isset($_POST['control'])) {
        $valorControl = $_POST['control'];
        echo ($valorControl);
        //$nombre = $_POST['nombre'];
    }
    ?>
    
    <h5 style="margin-left:2%;margin-right:2%;" class="p-2 bg-secondary text-white">Datos del Medico</h5>
</head>

<body class="">
                    
            <br>
        <?php if($valorControl==0){ ?>
            <form action="../../controlador/medico/MedicoControl.php" method="post" enctype="multipart/form-data" name="form1">
            <div style="margin:0;width:100%;color:#0f4321;" class="container-fluid">

                <div class="row" style="display:flex">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="tipoDocumento">Tipo de documento:</label><br>
                            <select id="tipoDocumento" name="tipoDocumento">
                                <option value="CC">Cédula de Ciudadanía</option>
                                <option value="CE">Cédula de Extranjería</option>
                                <option value="PS">Pasaporte</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="numero">Numero de documento:</label><br>
                            <input type="text" name="numeroDocumento" id="numeroDocumento">
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

                <div class="row" style="display:flex;margin-top:1%;">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="pais">Pais:</label><br>
                            <select style="width:65%;" id="pais" name="pais">
                                <option value="colombia">Colombia</option>

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

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="especialidad">Especialidad:</label><br>
                            <select style="width:65%;" id="especialidad" name="especialidad">
                                <option value="ss">Seleccione...</option>
                                <?php
                                foreach ($tabla3 as $valor) {
                                    ?><option value="<?php echo($valor->getEspecialidad()); ?>"> <?php echo($valor->getEspecialidad()); ?> </option><?php
                                    
                                }
        ?>
                            </select>

                        </div>
                                    

                    </div>


                
                <br>
                <div class="m-0 row justify-content-center col-md-12 col-lg-12 ">
                    <br>
                        <button type="submit" name="boton" value="Gu" 
                      onclick="return confirm('Esta seguro de Enviar?')" >Guardar Medico</button>
                      <br>
                      <button type="submit" name="boton" value="VolverInicio" 
                      onclick="return confirm('Esta seguro de Enviar?')" >-volver</button>
                </div>
            </div>
        </form> 



        <?php } else {?>



            
            <form action="../../controlador/medico/MedicoControl.php" method="post" enctype="multipart/form-data" name="form1">
            <div style="margin:0;width:100%;color:#0f4321;" class="container-fluid">

                <div class="row" style="display:flex">
                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="tipoDocumento">Tipo de documento:</label><br>
                            <select id="tipoDocumento" name="tipoDocumento">
                                <option value="<?php echo($_POST['tipoDocumento']); ?>"> <?php echo($_POST['tipoDocumento']); ?> </option>
                                <option value="CC">Cedula de Ciudadania</option>
                                <option value="CE">Cedula de Extranjería</option>
                                <option value="PS">Pasaporte</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="numero">Numero de documento:</label><br>
                            <input hidden type="text" name="id" id="id" value="<?php echo($_POST['id']); ?>">
                            <input type="text" name="numeroDocumento" id="numeroDocumento" value="<?php echo($_POST['numeroDocumento']); ?>">
                            <input type="text" hidden name="id" id="id" value="<?php echo($_POST['id']); ?>">
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

                <div class="row" style="display:flex;margin-top:1%;">

                   

                    <div class="col-md-3 col-lg-3">
                    <div class="col-md-12 col-lg-12">
                            <label for="departamentop">Especialidad:</label><br>
                            <select style="width:65%;" id="eps" name="eps">
                                <option value="ss">Seleccione...</option>
                                <?php
                                foreach ($tabla3 as $valor) {
                                    ?><option value="<?php echo($valor->getEspecialidad()); ?>"> <?php echo($valor->getEspecialidad()); ?> </option><?php
                                    
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

                    <div class="col-md-3 col-lg-3">
                        <div class="col-md-12 col-lg-12">
                            <label for="especialidad">Especialidad:</label><br>
                            <select style="width:65%;" id="especialidad" name="especialidad">
                                <option value="<?php echo($_POST['especialidad']);  ?>"> <?php echo($_POST['especialidad']);  ?> </option>
                                <?php
                                foreach ($tabla3 as $valor) {
                                    ?><option value="<?php echo($valor->getEspecialidad()); ?>"> <?php echo($valor->getEspecialidad()); ?> </option><?php
                                    
                                }
        ?>
                            </select>

                        </div>
                                    

                    </div>

                <br>
                <div class="m-0 row justify-content-center col-md-12 col-lg-12 ">
                    <br>
                        <button type="submit" name="boton" value="guardarEdicion" 
                      onclick="return confirm('Esta seguro de Enviar?')" >Editar</button>
                      <button type="submit" name="boton" value="VolverInicio" 
                      onclick="return confirm('Esta seguro de Enviar?')" >volver</button>
                </div>
            </div>
        </form>                        
            <?php }?>
            
</body>
</html>