<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pedidos de Clientes</title>
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body>
        <?php
            include '../php/articulo.php';
            if(isset($_REQUEST['guardarArticulo'])){
                $articulo = new Articulo();
                $articulo->subirFoto();
                $clave = $_POST['clave'];
                $descripcion = $_POST['descripcion'];
                $noSerie = $_POST['noSerie'];
                $marca = $_POST['marca'];
                $precio = $_POST['precio'];
                $articulo = new Articulo($clave,$descripcion,$noSerie,$marca,$precio);
                $articulo->guardarArticulo();
            }
        ?>
        
        
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Articulos</h2>
                </div>
                <div class="panel-body">
                <?php
                    $articulo = new Articulo();
                    $articulo->mostrarArticulos();
                ?>
                   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo">Hacer Pedido</button>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#nuevo">Modificar Pedido</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#nuevo">Eliminar Pedido</button>
                </div>
                
            </div>
            
        </div>
        <form name="frmAdministrador" action="" method="post" enctype="multipart/form-data">
        <div class="modal fade" role="dialog" id="nuevo">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                       <!-- <div class="modal-header"> -->
                            <button type="button" data-dismiss="modal" class="close"><span>&times;</span></button>
                            <h3>Registro de Pedidos</h3>
                       <!-- </div> -->
                    </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Clave :</label>
                                    <input id="clave" name="clave" class="form-control" type="text" placeholder="Clave">
                                </div>
                            <div class="form-group">
                                <label>Cantidad :</label>
                                <input id="descripcion" name="descripcion" class="form-control" type="text" placeholder="Cantidad">
                            </div>
                            <div class="form-group">
                                <label>Correo :</label>
                                <input id="noSerie" name="noSerie" class="form-control" type="text" placeholder="Correo">
                            </div>
                            
                        </div>
                        
                    </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button name="guardarArticulo" class="btn btn-success" type="submit">Realizar Pedido</button>
                    </div>
                        
                </div>
            </div>
        </div>
        </form>
        <script>
            $('#tablaArticulos tbody').on('click', 'tr', function(){
                if($(this).hasClass('warning')){
                    
                    $(this).removeClass('warning');
                    //$('#btnAgregar').prop('disabled','false');
                    $('input').val('');
                } else {
                    //$('#btnAgregar').prop('disabled','true');
                    
                    $('tr.warning').removeClass('warning');
                    $(this).addClass('warning');
                    var id_articulo,clave,descripcion,noSerie,marca,precio;
                    $(this).children('td').each(function(index2){
                    switch (index2){
                        case 0: id_articulo = $(this).text();break;
                        case 1: clave = $(this).text(); break;
                        //case 2: descripcion = $(this).text(); break;
                        //case 3: noSerie = $(this).text(); break;
                        //case 4: marca = $(this).text();break;
                        //case 5: precio = $(this).text(); break;
                    }
                });
                    $('#id_articulo').val(id_articulo);
                    $('#clave').val(clave);
                   // $('#descripcion').val(descripcion);
                    //$('#noSerie').val(noSerie);
                    //$('#marca').val(marca);
                    //$('#precio').val(precio);
                
                }
                
                
            });
        </script>
    </body>
</html>