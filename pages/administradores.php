<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Administradores</title>
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body> -->
        <?php
            include '../php/administrador.php';
            if(isset($_REQUEST['guardarAdmin'])){
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $paterno = $_POST['paterno'];
                $materno = $_POST['materno'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $correo = $_POST['correo'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $admin = new Administrador($nombre,$paterno,$materno,$fechaNacimiento,$correo,$user,$pass);
                $admin->guardarAdministrador($id);
                
            }
            if(isset($_REQUEST['eliminarAdmin'])){
                $id_elimina = $_POST['id'];
                $admin = new Administrador();
                $admin->eliminarAdministrador($id_elimina);
            }
        ?>
        
        
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Administradores</h2>
                </div>
                <div class="panel-body">
                <?php
                    //include '../php/administrador.php';
                    $admin = new Administrador();
                    $admin->mostrarAdministradores("select id_administrador,nombre,paterno,materno,fecha_nacimiento,correo,user,pass from administradores");
                ?>
                <div class="row">
                    <form name="frmAdministrador" action="" method="post">
                        <button id="btnAgregar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo">Agregar Admin</button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#nuevo" >Modificar Admin</button>
                        <button type="submit" name="eliminarAdmin" class="btn btn-danger">Eliminar Admin</button>
                        <div class="modal fade" role="dialog" id="nuevo">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="panel panel-primary">
                                    <div class="panel-heading">
                                       <!-- <div class="modal-header"> -->
                                            <button type="button" data-dismiss="modal" class="close"><span>&times;</span></button>
                                            <h3>Registro de Administradores</h3>
                                       <!-- </div> -->
                                    </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre :</label>
                                                    <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Nombre">
                                                </div>
                                            <div class="form-group">
                                                <label>A. Paterno :</label>
                                                <input id="paterno" name="paterno" class="form-control" type="text" placeholder="Apellido Paterno">
                                            </div>
                                            <div class="form-group">
                                                <label>A. Materno :</label>
                                                <input id="materno" name="materno" class="form-control" type="text" placeholder="Apellido Materno">
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de Nacimiento :</label>
                                                <input id="fechaNacimiento" name="fechaNacimiento" class="form-control" type="date">
                                            </div>
                                            <div class="form-group">
                                                <label>Correo :</label>
                                                <input id="correo" name="correo" class="form-control" type="text" placeholder="Correo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>User :</label>
                                                <input id="user" name="user" class="form-control" type="text" placeholder="User">
                                            </div>
                                            <div class="form-group">
                                                <label>Password :</label>
                                                <input id="pass" name="pass" class="form-control" type="password" placeholder="Password">
                                            </div>
                                            <input type="hidden" id="id_administrador" name="id" value="">
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
                </div>
                                    
            </div>
                
        </div>
            
    </div>
        
        <script>
           $('#tablaAdministradores tbody').on('click', 'tr', function(){
                if($(this).hasClass('warning')){
                    
                    $(this).removeClass('warning');
                    //$('#btnAgregar').prop('disabled','false');
                    $('input').val('');
                } else {
                    //$('#btnAgregar').prop('disabled','true');
                    
                    $('tr.warning').removeClass('warning');
                    $(this).addClass('warning');
                    var id_administrador,nombre,paterno,materno,fechaNacimiento,correo,user,pass;
                    $(this).children('td').each(function(index2){
                    switch (index2){
                        case 0: id_administrador = $(this).text();break;
                        case 1: nombre = $(this).text(); break;
                        case 2: paterno = $(this).text(); break;
                        case 3: materno = $(this).text(); break;
                        case 4: fechaNacimiento = $(this).text();break;
                        case 5: correo = $(this).text(); break;
                        case 6: user = $(this).text();break;
                        case 7: pass = $(this).text();break;    
                    }
                });
                    $('#id_administrador').val(id_administrador);
                    $('#id2').val(id_administrador);
                    $('#nombre').val(nombre);
                    $('#paterno').val(paterno);
                    $('#materno').val(materno);
                    $('#fechaNacimiento').val(fechaNacimiento);
                    $('#correo').val(correo);
                    $('#user').val(user);
                    $('#pass').val(pass);
                }
                
                
            });
        </script>
<!--
    </body>
</html> -->