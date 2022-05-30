<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="preload" href="css/normalize.css" as="style">
        <!-- libreria que normaliza nuestros estilos, siempre debe ser la primera libreria-->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- libreria que normaliza nuestros estilos, siempre debe ser la primera libreria-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <!--fuentes-->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!--fuentes-->
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
        <!--fuentes-->
        <link rel="preload" href="css/style.css" as="style">
        <!--estilo-->
        <link href="css/style.css" rel="stylesheet">

        
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    </head>
    <body>
        <?php
            $error = 0;
            if(isset($_POST['error'])){
                $error = $_POST['error'];
            }

            if($error == "1"){
                echo "usuario o Contraseña Incorrecto";
            }

            
            
           // $pass = "clave11";    
            //$passHash = password_hash($pass, PASSWORD_BCRYPT);
            //echo $passHash;
        ?>

        <script>

            function deshabilitaRetroceso(){
                window.location.hash="no-back-button";
                window.location.hash="Again-No-back-button" //chrome
                window.onhashchange=function(){window.location.hash="";}
            }
        </script>
        <header>
            <h1 class="titulo">Referencia & contrarreferencia</h1>
        </header>
        <body onload="deshabilitaRetroceso()">
        <section>
            <form class="formulario" action="../../controlador/usuarios/UsuariosControl.php" method="post" enctype="multipart/form-data" name="form2">
                <!-- Creamos la class formulario con la cual llamaremos nuestros estilos-->
                <fieldset>
                    <legend>Login</legend>
                    <div class="contenedor-campos">
                        <!-- Creamos este Div y llamamos la class contenedor-campo para que aplique a todos estos div nuestros estilos-->
                        <div class="campo">
                            <label>Cedula</label>
                            <input style="max-width: 600px;" name="cedula" id="cedula" class="input-text" type="text" placeholder="">
                        </div><div></div>
                        <div class="campo">
                            <label>Contraseña</label>
                            <input style="max-width: 435px;" name="pass" id="pass" class="input-text" type="password" placeholder="">
                        </div>
                    </div>
                    <div class="enviar"> 
                        <button class="btn btn-info btn-success my-4 my-sm-0 rounded-2" name="boton" value="login" >Ingresar</button>
                    </div>
                </fieldset>
            </form>
        </section>
    </body>

    <script type= text/javascript>
/* AQUI COLOCAMOS LA URL BASE, ES DECIR LA QUE TE LLEVA AL LOGIN*/
  if(window.history.replaceState) {
    window.history.replaceState(null,null,'<?php echo "login.php";?>');
  }
</script>
</html>