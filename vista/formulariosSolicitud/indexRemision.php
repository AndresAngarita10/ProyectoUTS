<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Bienvenido</title>

  <style>
        .ventana{
            background: rgba(128,128,128,0.8);
            width: 30%;
            height: 0%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            text-align: center;
            padding: 33px;
            min-height: 150px;
            border-radius: 22px;
            position: fixed;
            left: 34%;
            top: 35%;
            display: none;
        }
        .ventanaagg{
            background: rgba(128,128,128,0.8);
            width: 30%;
            height: 0%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
            text-align: center;
            padding: 33px;
            min-height: 150px;
            border-radius: 22px;
            position: fixed;
            left: 34%;
            top: 35%;
            display: none;
        }
    </style>
  
</head>
<body>
<div class="row" style="height: 100vh;">
  <div class="col-md-5 col-sm-9 bg-light">
    <div class="p-5 my-auto">
        <center>
            <img width="200px" height="150px" 
            src="https://sites.google.com/site/papeleriamatices/_/rsrc/1529628005416/home/logo-Papelería-Escolar.jpg">
        </center>
        
      <h1 class="display-5 mt-3 mb-2">Bienvenido 
      <h3>recuerda que estamos siempre comprometidos con nuestros clientes</h3>
      <div class="p-5 my-auto" style="margin-top: -100px;">
        <a class="btn btn-primary " style="margin-right: 10px; margin-top: -10px; max-width: 147px;" type="submit" href="javascript:abrir2()">Agregar Producto</a>
        <a class="btn btn-primary " style="margin-top: -10px; max-width: 147px;" type="submit" href="vistas/clientes/AgregarCliente.php">Agregar Cliente</a>
      </div>
      <div class="p-5 my-auto">
        <a class="btn btn-primary " style="margin-right: 10px; margin-top: -150px; max-width: 147px;" type="submit" href="vistas/productos/MostrarProductos.php">Mostrar Remisiones</a>
        <a class="btn btn-primary " style="margin-top: -150px; max-width: 147px;" type="submit" href="javascript:abrir()">Crear Remision </a>
        <a class="btn btn-primary " style="margin-top: -100px; max-width: 147px;" type="submit" href="vistas/clientes/MostrarClientes.php">Mostrar Clientes </a>
      </div>

        <p class="small mt-2 text-secondary" style="margin-top: 80px;">*Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        
        <a class="btn btn-danger rounded-4" style="margin-top: -10px; max-width: 147px;" type="submit" href="index.php">Salir </a>
    </div>
  </div>
  <div class="col-md-7 center col-sm-3 bg-primary text-white p-5">
        <div class="grid">
            <div class="grid-item " >
                <img src="vistas/imagenes/inicio/land1.jpg"
                width="800" height="162">
            </div>
            <div class="grid-item">
                <img src="vistas/imagenes/inicio/land2.jpg"
                width="800" height="162"></div>
            <div class="grid-item">
                <img src="vistas/imagenes/inicio/land3.jpg"
                width="800" height="162">
                </div>
            <div class="grid-item">
                <img src="vistas/imagenes/inicio/land4.jpg"
                width="800" height="162">
                </div>
            
        </div>
    </div>
</div>
        <div class="ventana" id="ventan">
            <form class="form-inline my-2 my-lg-0" method="POST" action="controlador/itemproductos/ItemProductosControl.php">
                    <input class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="Ingrese Cedula Cliente" 
                    type="search" name="identificacion" id="identificacion" aria-label="Search">

                    <button class="btn btn-primary  my-2 my-sm-0" type="submit"
                    name="boton" id="boton" value="validarcliente">Buscar</button>
            </form>
                <br />
                <a  class="btn btn-primary  my-2 my-sm-0" href="vistas/clientes/AgregarCliente.php" type="button">Agregar Cliente</a>
                <a  class="btn btn-primary btn-danger my-2 my-sm-0" href="index2.php" type="button">Salir</a>


        </div>

        <div class="ventanaagg" id="ventanagg">

            <form class="form-inline my-2 my-lg-0" method="POST" action="controlador/itemproductos/ItemProductosControl.php">
                <input class="form-control mr-sm-2" autocomplete="off" required autofocus placeholder="Ingrese Codigo de Barras " 
                type="search" name="codigobarras" id="codigobarras" aria-label="Search">

                <button class="btn btn-primary  my-2 my-sm-0" type="submit"
                name="boton" id="boton" value="validarexistenciaCB">Buscar </button>
            </form>
            <br />
            <a  class="btn btn-primary  my-2 my-sm-0" href="vistas/productos/AgregarProductoV.php" type="button">Agregar Producto</a>
            <a  class="btn btn-primary btn-danger my-2 my-sm-0" href="index2.php" type="button">Salir</a>


        </div>
        <script>
            function abrir(){
            document.getElementById("ventan").style.display="block"
            }

            function abrir2(){
            document.getElementById("ventanagg").style.display="block"
            }
            
    </script>
</body>
</html>