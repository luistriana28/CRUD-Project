<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Catalogo de Clientes</title>
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body>
        <?php
            include '../php/cliente.php';
            if(isset($_REQUEST['guardarCliente'])){
                $id_cliente = $_POST['id_cliente'];
                $razonSocial = $_POST['razonSocial'];
                $rfc = $_POST['rfc'];
                $calle = $_POST['calle'];
                $noExterior = $_POST['noExterior'];
                $colonia = $_POST['colonia'];
                $ciudad = $_POST['ciudad'];
                $estado = $_POST['estado'];
                $telOficina = $_POST['telOficina'];
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $cliente = new Cliente($razonSocial,$rfc,$calle,$noExterior,$colonia,$ciudad,$estado,$telOficina,$email,$user,$pass);
                $cliente->guardarCliente($id_cliente);
            }
            if(isset($_REQUEST['eliminarCliente'])){
                $id_cliente = $_POST['id_cliente'];
                $cliente = new Cliente();
                $cliente->eliminarCliente($id_cliente);
            }
        ?>
        
        
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Clientes</h2>
                </div>
                <div class="panel-body">
                    <?php
                        $cliente = new Cliente();
                        $cliente->mostrarClientes("select id_cliente,razonSocial,rfc,calle,no_exterior,colonia,ciudad,estado,tel_oficina,email,user,pass from clientes");
                    ?>
                    
                    <form name="frmAdministrador" action="" method="post">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo">Agregar Cliente</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#nuevo">Modificar Cliente</button>
                    <button class="btn btn-danger" name="eliminarCliente" type="submit">Eliminar Cliente</button>
        <div class="modal fade" role="dialog" id="nuevo">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                       <!-- <div class="modal-header"> -->
                            <button type="button" data-dismiss="modal" class="close"><span>&times;</span></button>
                            <h3>Registro de Clientes</h3>
                       <!-- </div> -->
                    </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Razon Social :</label>
                                    <input id="razonSocial" name="razonSocial" class="form-control" type="text" placeholder="Razon Social">
                                </div>
                            <div class="form-group">
                                <label>RFC :</label>
                                <input id="rfc" name="rfc" class="form-control" type="text" placeholder="RFC">
                            </div>
                            <div class="form-group">
                                <label>Calle :</label>
                                <input id="calle" name="calle" class="form-control" type="text" placeholder="Calle">
                            </div>
                            <div class="form-group">
                                <label>No Exterior :</label>
                                <input id="noExterior" name="noExterior" class="form-control" type="text" placeholder="No Exterior">
                            </div>
                            <div class="form-group">
                                <label>Colonia :</label>
                                <input id="colonia" name="colonia" class="form-control" type="text" placeholder="Colonia">
                            </div>
                            <div class="form-group">
                                <input id="id_cliente" name="id_cliente" class="form-control" type="hidden">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ciudad :</label>
                                <input id="ciudad" name="ciudad" class="form-control" type="text" placeholder="Ciudad">
                            </div>
                            <div class="form-group">
                                <label>Estado :</label>
                                <input id="estado" name="estado" class="form-control" type="text" placeholder="Estado">
                            </div>
                            <div class="form-group">
                                <label>Tel. Oficina :</label>
                                <input id="telOficina" name="telOficina" class="form-control" type="text" placeholder="TelOficina">
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input id="email" name="email" class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Usuario :</label>
                                <input id="user" name="user" class="form-control" type="text" placeholder="Usuario">
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input id="pass" name="pass" class="form-control" type="password" placeholder="Password">
                            </div>
                        </div>
                    </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button name="guardarCliente" class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                        
                </div>
            </div>
        </div>
        </form>
                </div>
                
            </div>
            
        </div>
        
        <script>
           $('#tablaClientes tbody').on('click', 'tr', function(){
                if($(this).hasClass('warning')){
                    
                    $(this).removeClass('warning');
                    //$('#btnAgregar').prop('disabled','false');
                    $('input').val('');
                } else {
                    //$('#btnAgregar').prop('disabled','true');
                    
                    $('tr.warning').removeClass('warning');
                    $(this).addClass('warning');
                    var id_cliente,razonSocial,rfc,calle,noExterior,colonia,ciudad,estado,telOficina,email,user,pass;
                    $(this).children('td').each(function(index2){
                    switch (index2){
                        case 0: id_cliente = $(this).text();break;
                        case 1: razonSocial = $(this).text(); break;
                        case 2: rfc = $(this).text(); break;
                        case 3: calle = $(this).text(); break;
                        case 4: noExterior = $(this).text();break;
                        case 5: colonia = $(this).text(); break;
                        case 6: ciudad = $(this).text();break;
                        case 7: estado = $(this).text();break;
                        case 8: telOficina = $(this).text();break;
                        case 9: email = $(this).text();break;
                        case 10: user = $(this).text();break;
                        case 11: pass = $(this).text();break;
                    }
                });
                    $('#id_cliente').val(id_cliente);
                    $('#razonSocial').val(razonSocial);
                    $('#rfc').val(rfc);
                    $('#calle').val(calle);
                    $('#noExterior').val(noExterior);
                    $('#colonia').val(colonia);
                    $('#ciudad').val(ciudad);
                    $('#estado').val(estado);
                    $('#telOficina').val(telOficina);
                    $('#email').val(email);
                    $('#user').val(user);
                    $('#pass').val(pass);
                }
                
                
            });
        </script>
    </body>
</html>