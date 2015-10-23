<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Catalogo de Almacenes</title>
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body>
        <?php
            include '../php/administrador.php';
            if(isset($_REQUEST['guardarAdmin'])){
                $nombre = $_POST['nombre'];
                $paterno = $_POST['paterno'];
                $materno = $_POST['materno'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $correo = $_POST['correo'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $admin = new administrador($nombre,$paterno,$materno,$fechaNacimiento,$correo,$user,$pass);
                $admin->guardarAdministrador();
            }
        ?>
        
        
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Almacenes</h2>
                </div>
                <div class="panel-body">
                    <table id="miTabla" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Clave</th>
                                <th>Descripcion</th>
                                <th>No. Consecutivo</th>
                                <th>Fecha de Alta</th>
                            </tr>
                        </thead>
                    </table>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo">Agregar Almacen</button>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#nuevo">Modificar Almacen</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#nuevo">Eliminar Almacen</button>
                </div>
                
            </div>
            
        </div>
        <form name="frmAdministrador" action="" method="post">
        <div class="modal fade" role="dialog" id="nuevo">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                       <!-- <div class="modal-header"> -->
                            <button type="button" data-dismiss="modal" class="close"><span>&times;</span></button>
                            <h3>Registro de Almacenes</h3>
                       <!-- </div> -->
                    </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Clave :</label>
                                    <input name="nombre" class="form-control" type="text" placeholder="Clave">
                                </div>
                            <div class="form-group">
                                <label>Descripcion :</label>
                                <input name="paterno" class="form-control" type="text" placeholder="Descripcion">
                            </div>
                            <div class="form-group">
                                <label>No. Consecutivo :</label>
                                <input name="materno" class="form-control" type="text" placeholder="No. Consecutivo">
                            </div>
                            <div class="form-group">
                                <label>Fecha de Alta :</label>
                                <input name="noExterior" class="form-control" type="date">
                            </div>
                            
                        </div>
                        
                    </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button name="guardarAdmin" class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                        
                </div>
            </div>
        </div>
        </form>
        
    </body>
</html>