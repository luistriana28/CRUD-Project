<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Catalogo de Tecnicos</title>
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body>
        <?php
            include '../php/tecnico.php';
            if(isset($_REQUEST['guardarTecnico'])){
                $id_tecnico = $_POST['id_tecnico'];
                $nombre = $_POST['nombre'];
                $paterno = $_POST['paterno'];
                $materno = $_POST['materno'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $fechaIngreso = $_POST['fechaIngreso'];
                $tecnico = new Tecnico($nombre,$paterno,$materno,$fechaNacimiento,$fechaIngreso);
                $tecnico->guardarTecnico($id_tecnico);
            }
            if(isset($_REQUEST['eliminarTecnico'])){
                $id_tecnico = $_POST['id_tecnico'];
                $tecnico = new Tecnico();
                $tecnico->eliminarTecnico($id_tecnico);
            }
        ?>
        
        
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Tecnicos</h2>
                </div>
                <div class="panel-body">
                    <?php
                        $tecnico = new Tecnico();
                        $tecnico->mostrarTecnicos("select id_tecnico,nombre,paterno,materno,fecha_nacimiento,fecha_ingreso from tecnicos");
                    ?>
            <form name="frmTecnico" action="" method="post">                       
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo">Agregar Tecnico</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#nuevo">Modificar Tecnico</button>
                    <button name="eliminarTecnico" type="submit" class="btn btn-danger" >Eliminar Tecnico</button>
            
            <div class="modal fade" role="dialog" id="nuevo">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                       <!-- <div class="modal-header"> -->
                            <button type="button" data-dismiss="modal" class="close"><span>&times;</span></button>
                            <h3>Registro de Tecnicos</h3>
                       <!-- </div> -->
                    </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nombre :</label>
                                    <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Nombre">
                                </div>
                            <div class="form-group">
                                <label>A. Paterno :</label>
                                <input id="paterno" name="paterno" class="form-control" type="text" placeholder="A. Paterno">
                            </div>
                            <div class="form-group">
                                <label>A. Materno :</label>
                                <input id="materno" name="materno" class="form-control" type="text" placeholder="A. Materno">
                            </div>
                            <div class="form-group">
                                <label>Fecha de Nacimiento :</label>
                                <input id="fechaNacimiento" name="fechaNacimiento" class="form-control" type="date">
                            </div>
                            <div class="form-group">
                                <label>Fecha de Ingreso :</label>
                                <input id="fechaIngreso" name="fechaIngreso" class="form-control" type="date">
                            </div>
                            <input type="hidden" name="id_tecnico" id="id_tecnico">
                        </div>
                        
                    </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button name="guardarTecnico" class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                        
                </div>
            </div>
        </div>
        </form>
                        
                </div>
                
            </div>
            
        </div>
        
        <script>
           $('#tablaTecnicos tbody').on('click', 'tr', function(){
                if($(this).hasClass('warning')){
                    
                    $(this).removeClass('warning');
                    //$('#btnAgregar').prop('disabled','false');
                    $('input').val('');
                } else {
                    //$('#btnAgregar').prop('disabled','true');
                    
                    $('tr.warning').removeClass('warning');
                    $(this).addClass('warning');
                    var id_tecnico,nombre,paterno,materno,fechaNacimiento,fechaIngreso;
                    $(this).children('td').each(function(index2){
                    switch (index2){
                        case 0: id_tecnico = $(this).text();break;
                        case 1: nombre = $(this).text(); break;
                        case 2: paterno = $(this).text(); break;
                        case 3: materno = $(this).text(); break;
                        case 4: fechaNacimiento = $(this).text();break;
                        case 5: fechaIngreso = $(this).text(); break;
                    }
                });
                    $('#id_tecnico').val(id_tecnico);
                    $('#nombre').val(nombre);
                    $('#paterno').val(paterno);
                    $('#materno').val(materno);
                    $('#fechaNacimiento').val(fechaNacimiento);
                    $('#fechaIngreso').val(fechaIngreso);
                }
                
                
            });
        </script>
    </body>
</html>