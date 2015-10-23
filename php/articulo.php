<?php
include 'database.php';
class Articulo{
    
    private $clave;
    private $descripcion;
    private $noSerie;
    private $marca;
    private $precio;
    private $fotografia;
    
    function __construct($clave = NULL,$descripcion = NULL,$noSerie = NULL,$marca = NULL,$precio = NULL){
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $this->noSerie = $noSerie;
        $this->marca = $marca;
        $this->precio = $precio;
        
    }
    
    public function subirFoto(){
        $directory = "../images/articulos/";
        $target = $directory . basename($_FILES['archivos']['name']);
        if(!(move_uploaded_file($_FILES['archivos']['tmp_name'],$target))){
            echo "Error no se puede subir la imagen";
        }
        return $target;
    }
    
    public function guardarArticulo(){
        try {
            $this->fotografia = $this->subirFoto();
            $query = "insert into articulos(clave,descripcion,no_serie,marca,precio,fotografia) 
    values('$this->clave','$this->descripcion','$this->noSerie','$this->marca','$this->precio','$this->fotografia')";
            
            $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
            $db->conectaDB();
            $db->ejecutaSQL($query);
            $db->desconectaDB();
        } catch(Exception $e){
            echo "Error" . $e->getMessage();
            
        }
    }
    
    public function eliminarArticulo(){
        
    }
    
    public function mostrarArticulos(){
        echo "<table id='tablaArticulos' class='table table-bordered table-hover'>".
                "<thead>" .
                    "<tr>".
                        "<th>ID</th>" .
                        "<th>Clave</th>" .
                        "<th>Descripcion</th>" .
                        "<th>No Serie</th>" .
                        "<th>Marca</th>" .
                        "<th>Precio</th>" .
                    "</tr>" .
                "</thead>" .
                "<tbody>";
        $query = "select id_articulo,clave,descripcion,no_serie,marca,precio from articulos";
        $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
        $db->conectaDB();
        $resultado = mysql_query($query);
        while($dato = mysql_fetch_array($resultado)){
            echo "<tr>".
                    "<td>" . $dato['id_articulo'] . "</td>" .
                    "<td>" . $dato['clave'] . "</td>" .
                    "<td>" . $dato['descripcion'] . "</td>" .
                    "<td>" . $dato['no_serie'] . "</td>" .
                    "<td>" . $dato['marca'] . "</td>" .
                    "<td>" . $dato['precio'] . "</td>" .
                "</tr>";
        }
        echo "</tbody></table>";
        $db->desconectaDB();
    
        
    }
}
?>