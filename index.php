<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SocialNet</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/efectos.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
        <link href="css/estilos2.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container-fluid">
           <div class="col-md-12">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#" id="opmenus">CEDSA S.A C.V</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        <li><a href="index.php" id="opmenus">INICIO <span class="sr-only">(current)</span></a></li>
                        <!--<li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="opmenus">RESGUARDOS GENERALES <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#" id="resguardosTecnicos">RESGUARDOS TECNICOS</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id="rceIn">RESGUARDOS CELULAS INTERNET</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id="repoEquipo">REPORTE DE EQUIPOS</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id="equipoDañados">EQUIPOS DAÑADOS</a></li>
                          </ul>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"id="opmenus">INFORMES GENERALES <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#"id="entsal">ENTRADAS Y SALIDAS DE EQUIPOS</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id="impco">IMPORTACIONES Y COMPRAS</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id="proveedores">PROVEEDORES</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id="garantias">GARANTIAS</a></li>
                          </ul>
                        </li>--->
                        <li><a href="#" id="almacen">ALMACEN</a></li>
                        <li><a href="#" id="articulos">CATALOGOS</a></li>
                        <li class="dropdown" id="usuarios">
                          <a href="sesion.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Usuario<img src="images/userpic.gif" id="imguser"> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="sesion.php">Iniciar Sesion</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                </nav>
           </div>
           <div class="col-md-12">
               <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                    <li data-target="#myCarousel" data-slide-to="5"></li>
                    <li data-target="#myCarousel" data-slide-to="6"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="images/ced1.png" alt="ced1">
                    </div>

                    <div class="item">
                      <img src="images/ced2.png" alt="ced2">
                    </div>

                    <div class="item">
                      <img src="images/ced3.png" alt="ced3">
                    </div>
                    
                    <div class="item">
                      <img src="images/ced4.png" alt="ced4">
                    </div>
                    <div class="item">
                      <img src="images/ub1.png" alt="ub1">
                    </div>
                    <div class="item">
                      <img src="images/header_images.png" alt="header" id="imagen1">
                    </div>
                    <div class="item">
                      <img src="../PaginaCedsa/imagenes/unifi-voip-overview.png" alt="unifi" id="imagen2">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
               <hr>
           </div>
           <div class="container-fluid">
               <div class="row">
                   <div class="12">
                       <div id="area_pagina">
                           <h2><span>LO MAS NUEVO EN ENLACES INALAMBRICOS...</span></h2>
                           <div class="row">
                                <div class="col-md-4">
                                   <div class="panel panel-default">
                                       <div class="panel-body">
                                           <img src="images/images_1.png" height="350" width="660">
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-4 col-md-offset-3">
                                   <p id="textoprincipal">El AirFiber ® 5 se ha diseñado específicamente para al aire libre, punto a punto de puente y de red de clase portadora viajes de regreso.<br> El AirFiber ® 5 opera en todo el mundo, y 5 GHz frecuencias libres de licencia. Los usuarios pueden desplegar airFiber5 casi en cualquier lugar que se elija (sujeto a las regulaciones locales del país).</p>
                               </div>
                           </div>
                           <div class="row">
                               <h2><span>ADMINISTRA TU RED INTERNA CON LO ULTIMO EN ACCES POINT</span></h2>
                               <div class="col-md-6">
                                   <p id="textoprincipal">Con un diseño industrial limpio, el UniFi ® AP puede integrarse perfectamente en cualquier superficie de la pared o en el techo (kits de montaje incluidos). El indicador LED simplifica la implementación y configuración.</p>
            <p id="textoprincipal">Configuración intuitiva y robusta, Control y Monitoreo
de forma instantánea prestación y configurar miles de Unifi ® AP. Gestionar rápidamente el tráfico del sistema. mapas personalizados y Google Mapas Subir imágenes de mapas personalizados o utilizar Google Maps para una representación visual de su red inalámbrica. Grupos WLAN Aproveche grupos WLAN para una configuración flexible de los despliegues grandes y permiten la conexión inalámbrica entre los puntos de acceso para extender el rango. Uno Unificado de red con cero Handoff Roaming Crear una gran red inalámbrica a través de múltiples puntos de acceso para que los usuarios pueden moverse sin problemas y mantener su conexión, ya que cambiar a la AP más cercano.</p>
                               </div>
                               <div class="col-md-3">
                                    <img src="images/images_2.png" id="imagenprincipal"/>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </body>
    <div class="container-fluid">
        <hr>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3" id="sociales">
                        <h2>REDES SOCIALES</h2>
                        <a id="social"><img src="images/twittericon.png" alt="" id="redSocial">Twitter</a><br>
                        <a id="social"><img src="images/facebookicon.png" alt="" id="redSocial">Facebook</a>
                    </div>
                    <div class="col-md-6 col-md-offset-3">
                        <h2>CONTACTANOS</h2>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <h4 id="direccion">Sucursal Torreon</h4><br>
                        <p id="direccion">Matriz: Paseo del Olimpo #1490</p><br>
                        <p id="direccion">Col. Campestre de la Rosita Torreon, Coahuila.</p><br>
                        <p id="direccion">Tel. 01(871)7204335 y 7059595</p>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <h4 id="direccion">Sucursal Durango</h4><br>
                        <p id="direccion">Sucursal Durango: C. Aquiles Serdan #218(Planta Alta)</p><br>
                        <p id="direccion">Col. Centro Durango Dgo. (Entre Patoni y Pasteur)</p><br>
                        <p id="direccion">Tel. 01(618)19222</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</html>