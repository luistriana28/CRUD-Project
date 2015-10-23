$(document).ready(function(){
        
    //---------Funciones de los menus--------------------------//
    function menu(urls,id){
    $('#'+id+'').click( function(){
                
       $.ajax({
           url: urls,
           success: function(data){
               $('#area_trabajo').html(data);
           }
       });
    });
    }
    
    menu('pages/administradores.php','opAdministradores');
    menu('pages/empresas.php','opEmpresas');
    menu('pages/clientes.php','opClientes');
    menu('pages/tecnicos.php','opTecnicos');
    menu('pages/ordenes.php','opOrdenes');
    menu('pages/articulos.php','opArticulos');
    menu('pages/garantias.php','opGarantias');
    menu('pages/almacenes.php','opAlmacenes');
    menu('pages/articulosCliente.php','opartcliente');
    
   
});

