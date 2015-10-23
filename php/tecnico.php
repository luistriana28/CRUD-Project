<?php
include 'database.php';

class Tecnico {
    private $nombre;
    private $paterno;
    private $materno;
    private $fechaNacimiento;
    private $fechaIngreso;
    
    public function __construct($nombre = NULL,$paterno = NULL,$materno = NULL,$fechaNacimiento = NULL,$fechaIngreso = NULL){
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->fechaIngreso = $fechaIngreso;
    }
    
    public function guardarTecnico($id){
        try {
            $query;
            $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
            $db->conectaDB();
            $resultado = mysql_query("select count(*) from tecnicos where id_tecnico = '$id'");
            $verifica = mysql_fetch_row($resultado);
            if($verifica[0] > 0){
                $query = "update tecnicos set nombre = '$this->nombre',paterno = '$this->paterno',materno = '$this->materno',fecha_nacimiento = '$this->fechaNacimiento',fecha_ingreso = '$this->fechaIngreso' where id_tecnico = '$id'";
            } else {
            $query = "insert into tecnicos(nombre,paterno,materno,fecha_nacimiento,fecha_ingreso) " .
                     "values('$this->nombre','$this->paterno','$this->materno','$this->fechaNacimiento','$this->fechaIngreso')";
            }
            
            $db->ejecutaSQL($query);
            $db->desconectaDB();
        } catch(Exception $e){
            echo "Error" . $e->getMessage();
            
        }
    }
    
    public function mostrarTecnicos($query){
        $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
        $db->conectaDB();
        $resultado = mysql_query($query);
        echo "<table id='tablaTecnicos' class='table table-bordered table-hover'>" .
             "<thead>" .
                "<tr>" .
                    "<th>ID</th>" .
                    "<th>Nombre</th>" .
                    "<th>A. Paterno</th>" .
                    "<th>A. Materno</th>" .
                    "<th>Fecha de Nacimiento</th>" .
                    "<th>Fecha de Ingreso</th>" .
                "</tr>" .
            "</thead>" .
            "<tbody>";
            
        while($dato = mysql_fetch_array($resultado)){
            echo "<tr>" .
                    "<td>" . $dato["id_tecnico"] . "</td>" .
                    "<td>" . $dato["nombre"] . "</td>" .
                    "<td>" . $dato["paterno"] . "</td>" .
                    "<td>" . $dato["materno"] . "</td>" .
                    "<td>" . $dato["fecha_nacimiento"] . "</td>" .
                    "<td>" . $dato["fecha_ingreso"] . "</td>" .
                "</tr>";
        }
        echo "</tbody></table>";
        $db->desconectaDB();
    }
    
    public function cargarTecnico($query,$name){
            $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
            $db->conectaDB();
            $resultado = mysql_query($query);
            echo "<select class='form-control' name='.$name.'>";
            while($dato = mysql_fetch_array($resultado)){
               echo '<option>' . $dato[0] . '</option>';
            }
            echo '</select>';
            $db->desconectaDB();
       }
    
    public function eliminarTecnico($id){
        try{
            $query = "delete from tecnicos where id_tecnico = '$id'";
            $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
            $db->conectaDB();
            $db->ejecutaSQL($query);
            $db->desconectaDB();
        } catch(Exception $e){
            "Error" . $e->getMessage();
        }
        
    }
}
?>
