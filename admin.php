<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CEDSANET</title>
        
        <!--Javascript -->
        <script src="js/jquery-2.1.4.js"></script> 
        <script src="js/bootstrap.js"></script>
        <script src="js/efectos.js"></script> 
        <script src="js/funciones.js"></script>
        
            <!-- Estilos css-->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/estilosmenus.css" rel="stylesheet">   

    </head>
    <body>
        <!--Barra de Navegacion -->
       <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h3><img src="images/cedsa.png" id="logo"></h3>
                </div>
                <div id="barra" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <img class="center-block img-circle" src="images/userpic.gif" alt="usuario" style="max-width:40px;" id="user">
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="usuario">Administrador<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="index.php" >Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li>
                            <a href="#" id="opAdministradores"><span class="glyphicon glyphicon-hdd"></span> Administradores</a>
                        </li>
                        <li>
                            <a href="#"  id="opClientes"><span class="glyphicon glyphicon-user"></span> Clientes</a>
                        </li>
                        <li>
                            <a href="#"  id="opTecnicos"><span class="glyphicon glyphicon-wrench"></span> Tecnicos</a>
                        </li>
                        <li>
                            <a href="#" id="opEmpresas"><span class="glyphicon glyphicon-tower"></span> Empresas</a>
                        </li>
                        
                        <li>
                            <a href="#"  id="opExistencias"><span class="glyphicon glyphicon-usd"></span> Existencias</a>
                        </li>
                        
                        <li>
                            <a href="#"  id="opAlmacenes"><span class="glyphicon glyphicon-th-list"></span> Almacenes</a>
                        </li>
                       
                        <li>
                            <a href="#"  id="opArticulos"><span class="glyphicon glyphicon-barcode"></span> Articulos</a>
                        </li>
                        
                        <li>
                            <a href="#"  id="opOrdenes"><span class="glyphicon glyphicon-list-alt"></span> Ordenes</a>
                        </li>
                        <li>
                            <a href="#" id="opGarantias"><span class="glyphicon glyphicon-file"></span> Garantias</a>
                        </li>
                        
                    </ul>
                </div>
                <div id="principal" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
                    <div id="area_trabajo">
                       <div id="letrero" class="jumbotron">
                           <h1>Sistema de Control CedsaNET</h1>
                           <p>Este sistema te permitira llevar a cabo la administracion de todos los procesos que llevamos acabo en la empresa y que nos dan una orientaccion sobre las actividades que realizamos con el cliente</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>