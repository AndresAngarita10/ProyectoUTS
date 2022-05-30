<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/nuevaHistoria.css" rel="stylesheet" type="text/css" />
    <link href="../../estilos/resets.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
  <?php include '../layout/headerMedico.php'; 
  ?>

    <?php 
        include_once("../../modelo/usuarios/ModeloUsuarios.php");
        $mod = 0;
        if(isset($_POST['mod'])){
            $mod = $_POST['mod'];
        }
        //echo $mod;
        $Usu = new ModeloUsuarios;
        //echo $_POST['ccMed'];
        //$validarUsu = $Usu->getAdminXCedula($_POST['ccAdmin']);
        //echo ($validarUsu->getPrimerNombre());
       // if($validarUsu==null){
        //    header("Location: ../../index.php");
        //}
    ?>
<style>
    
.field{
    display: flex;
    flex-direction: column;

    width: 30rem;
    margin: 0.5rem 0;
}
</style>

<?php 
    include_once('../../modelo/especialidades/ModeloEspecialidad.php');
    include_once('../../modelo/especialidades/ObjetoEspecialidad.php');
    include_once("../../modelo/Conexion.php");
    include_once("../../modelo/ciudades/ModeloCiudades.php");
    include_once("../../modelo/ciudades/ObjetoCiudades.php");

    
        //cargar especialidad
        $ControlModeloEsp = new ModeloEspecialidad();
        $tabla3 = $ControlModeloEsp->mostrarEspecialidad();

            
        //cargar ciudades
        $ControlModeloCiu = new ModeloCiudades();
        $tabla2 = $ControlModeloCiu->mostrarciudad();
?>

    <main>
        <section>
            <h1>Registrar Medico</h1>
            <form action="../../controlador/usuarios/UsuariosControl.php" method="post" enctype="multipart/form-data" name="form1">
                
                    <input type='text' hidden name='ccAdmin' value='<?php echo($_POST['ccAdmin']); ?>'/>

                    <div class="field">
                        <select id="tipoDocumento" name="tipoDocumento"  required style="width: 350px;">
                                        <option selected disabled>Seleccione Tipo Documento</option>
                                        <option value="cc" >CC</option>
                                        <option value="ce" >CE</option>
                                        
                        <?php if($mod == 0){ ?>
                                        <?php }else {
                                            ?><option selected value="<?php echo($_POST['tipoDocumento']); ?>"> <?php echo($_POST['tipoDocumento']); ?> </option><?php
                                        } ?>
                                               
                        </select>
                    </div>
                    <div class="field">
                        <label>Numero Documento</label>
                        <input type="text" name="numeroDocumento" id="numeroDocumento" required 
                        value="<?php if($mod == "1"){ echo($_POST['numeroDocumento']);} ?> ">
                    </div>
                    <div class="field">
                        <label>Primer Nombre</label>
                        <input type="text" name="primerNombre" id="primerNombre" required 
                        value="<?php if($mod == "1"){ echo($_POST['primerNombre']);} ?> ">
                    </div>
                    <div class="field">
                        <label>Segundo Nombre</label>
                        <input type="text" name="segundoNombre" id="segundoNombre" required 
                        value="<?php if($mod == "1"){ echo($_POST['segundoNombre']);} ?> ">
                    </div>
                    <div class="field">
                        <label>Primer Apellido</label>
                        <input type="text" name="primerApellido" id="primerApellido" required 
                        value="<?php if($mod == "1"){ echo($_POST['primerApellido']);} ?> ">
                    </div>
                    <div class="field">
                        <label>Segundo Apellido</label>
                        <input type="text" name="segundoApellido" id="segundoApellido" required 
                        value="<?php if($mod == "1"){ echo($_POST['segundoApellido']);} ?> ">
                    </div>

                
                    <hr width="85%" size="2" />

                    <div class="field">
                        <label>Correo</label>
                        <input type="email" name="correo" id="correo" required 
                        value="<?php if($mod == "1"){ echo($_POST['correo']);} ?> ">
                    </div>
                    <div class="field">
                        <select id="ciudadT" name="ciudadT"  required style="width: 350px;">
                                        <option selected disabled>Ciudad de trabajo</option>
                                <?php
                                foreach ($tabla2 as $valor) {
                                    ?><option value="<?php echo($valor->getmunicipio()); ?>"> <?php echo($valor->getmunicipio()); ?> </option><?php
                                    
                                } if($mod == "1"){
                                    ?><option selected value="<?php echo($_POST['ciudad']); ?>"> <?php echo($_POST['ciudad']); ?> </option><?php
                                }
        ?>             
                        </select>
                    </div>
                    <div class="field">
                        <label>Direccion</label>
                        <input type="text" name="direccion" id="direccion" required 
                        value="<?php if($mod == "1"){ echo($_POST['direccion']);} ?> ">
                    </div>
                    <div class="field">
                        <label>Telefono</label>
                        <input type="text" name="telefono" id="telefono" required 
                        value="<?php if($mod == "1"){ echo($_POST['telefono']);} ?> ">
                    </div>
                    <div class="field">
                        <select id="especialidad" name="especialidad"  required style="width: 350px;">
                                        <option selected disabled>Especialidad</option>
                                <?php
                                        foreach ($tabla3 as $valor) {
                                            ?><option value="<?php echo($valor->getEspecialidad()); ?>"> <?php echo($valor->getEspecialidad()); ?> </option><?php
                                            
                                        }
                                        if($mod == "1"){

                                       
                                            ?><option selected  value="<?php echo($_POST['especialidad']); ?>"> <?php echo($_POST['especialidad']); ?> </option><?php
                                        }
                                ?>
                                               
                        </select>
                    </div>

                

                
                    <?php if($mod == "1"){
                    ?>
                      <button class="btn btn-info btn-success my-2 my-sm-0 rounded-2" name="boton" value="ActualizarMedico" 
                      onclick="return confirm('Esta seguro de Enviar?')">Actualizar</button>
                    <?php

                } else { ?>                    
                
                    <button class="btn btn-info btn-success my-2 my-sm-0 rounded-2" name="boton" value="GuardarMedico" 
                      onclick="return confirm('Esta seguro de Enviar?')">Enviar</button>

                      <?php } ?>
            </form>
        </section>
    </main>
</body>
</html>