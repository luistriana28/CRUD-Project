<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Catalogo de Empresas</title>
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    </head>
    <body>
        <?php
            include '../php/empresa.php';
            if(isset($_REQUEST['guardarEmpresa'])){
                $id_empresa = $_POST['id_empresa'];
                $razonSocial = $_POST['razonSocial'];
                $rfc = $_POST['rfc'];
                $calle = $_POST['calle'];
                $noExterior = $_POST['noExterior'];
                $colonia = $_POST['colonia'];
                $ciudad = $_POST['ciudad'];
                $estado = $_POST['estado'];
                $tel_oficina = $_POST['tel_oficina'];
                $email = $_POST['email'];
                $maestro = $_POST['maestro'];
                $emp = new empresa($razonSocial,$rfc,$calle,$noExterior,$colonia,$ciudad,$estado,$tel_oficina,$email,$maestro);
                $emp->guardarEmpresa($id_empresa);
            }
            if(isset($_REQUEST['eliminarEmpresa'])){
                $id_empresa = $_POST['id_empresa'];
                $empresa = new Empresa();
                $empresa->eliminarEmpresa($id_empresa);
            }
        ?>
        
        
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Empresas</h2>
                </div>
                <div class="panel-body">
                <?php
                    $empresa = new Empresa();
                    $empresa->mostrarEmpresas();
                ?>
                    <form name="frmEmpresa" action="" method="post">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevo">Agregar Empresa</button>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#nuevo">Modificar Empresa</button>
                    <button class="btn btn-danger" type="submit" name="eliminarEmpresa">Eliminar Empresa</button>
        <div class="modal fade" role="dialog" id="nuevo">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                       <!-- <div class="modal-header"> -->
                            <button type="button" data-dismiss="modal" class="close"><span>&times;</span></button>
                            <h3>Registro de Empresas</h3>
                       <!-- </div> -->
                    </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Razon Social :</label>
                                    <input name="razonSocial" class="form-control" id="razonSocial" type="text" placeholder="Razon Social">
                                </div>
                            <div class="form-group">
                                <label>RFC :</label>
                                <input name="rfc" class="form-control" type="text" placeholder="RFC" id="rfc">
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
                                <input id="telOficina" name="tel_oficina" class="form-control" type="text" placeholder="TelOficina">
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input id="email" name="email" class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Consecutivo Maestro :</label>
                                <input id="maestro" name="maestro" class="form-control" type="text" placeholder="No Consecutivo">
                            </div>
                            <input type="hidden" id="id_empresa" name="id_empresa">
                        </div>
                    </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button name="guardarEmpresa" class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                        
                </div>
            </div>
        </div>
        </form>
                    
                </div>
                
            </div>
            
        </div>
        <script>
            $('#tablaEmpresas tbody').on('click', 'tr', function(){
                if($(this).hasClass('warning')){
                    
                    $(this).removeClass('warning');
                    //$('#btnAgregar').prop('disabled','false');
                    $('input').val('');
                } else {
                    //$('#btnAgregar').prop('disabled','true');
                    
                    $('tr.warning').removeClass('warning');
                    $(this).addClass('warning');
                    var id_empresa,razonSocial,rfc,calle,noExterior,colonia,ciudad,estado,telOficina,email,maestro;
                    $(this).children('td').each(function(index2){
                    switch (index2){
                        case 0: id_empresa = $(this).text();break;
                        case 1: razonSocial = $(this).text(); break;
                        case 2: rfc = $(this).text(); break;
                        case 3: calle = $(this).text(); break;
                        case 4: noExterior = $(this).text();break;
                        case 5: colonia = $(this).text(); break;
                        case 6: ciudad = $(this).text();break;
                        case 7: estado = $(this).text();break;
                        case 8: telOficina = $(this).text();break;
                        case 9: email = $(this).text();break;
                        case 10: maestro = $(this).text();break;
                        
                    }
                });
                    $('#id_empresa').val(id_empresa);
                    $('#razonSocial').val(razonSocial);
                    $('#rfc').val(rfc);
                    $('#calle').val(calle);
                    $('#noExterior').val(noExterior);
                    $('#colonia').val(colonia);
                    $('#ciudad').val(ciudad);
                    $('#estado').val(estado);
                    $('#telOficina').val(telOficina);
                    $('#email').val(email);
                    $('#maestro').val(maestro);
                    
                }
                
                
            });
        </script>
        
    </body>
</html>