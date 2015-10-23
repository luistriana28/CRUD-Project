<?php
include 'database.php';

class Administrador {
    private $nombre;
    private $paterno;
    private $materno;
    private $fechaNacimiento;
    private $correo;
    private $user;
    private $password;
    
    
    
    public function __construct($nombre = NULL,$paterno = NULL,$materno = NULL,$fechaNacimiento = NULL,$correo = NULL,$user = NULL,$password = NULL){
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->correo = $correo;
        $this->user = $user;
        $this->password = $password;
    }
    
    public function guardarAdministrador($id){
        try {
            $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
            $db->conectaDB();
            $query;
            $numeros = mysql_query("select count(*) from administradores where id_administrador = '$id' ");
            $verifica = mysql_fetch_row($numeros);
            //echo $verifica[0];
            if($verifica[0] > 0){
                $query = "UPDATE administradores set nombre = '$this->nombre',paterno = '$this->paterno',materno = '$this->materno',fecha_nacimiento = '$this->fechaNacimiento',correo = '$this->correo',user = '$this->user',pass = '$this->password' where id_administrador = '$id'";
            } else {
                $query = "insert into administradores(nombre,paterno,materno,fecha_nacimiento,correo,user,pass) " .
                     "values('$this->nombre','$this->paterno','$this->materno','$this->fechaNacimiento','$this->correo','$this->user','$this->password')";
            }
            
            $db->ejecutaSQL($query);
            $db->desconectaDB();
        } catch(Exception $e){
            echo "Error" . $e->getMessage();
            
        }
        
    }
    
    public function mostrarAdministradores($query){
        //$resultado = mysql_query($query);
        $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
        $db->conectaDB();
        $resultado = mysql_query($query);
        echo "<table id='tablaAdministradores' class='table table-bordered table-hover'>" .
             "<thead>" .
                "<tr>" .
                    "<th id='id'>ID</th>" .
                    "<th>Nombre</th>" .
                    "<th>A. Paterno</th>" .
                    "<th>A. Materno</th>" .
                    "<th>Fecha de Nacimiento</th>" .
                    "<th>Correo</th>" .
                    "<th>Usuario</th>" .
                    "<th>Password</th>" .
                "</tr>" .
            "</thead>" .
            "<tbody>";
            
        while($dato = mysql_fetch_array($resultado)){
            echo "<tr>" .
                    "<td>" . $dato["id_administrador"] . "</td>" .
                    "<td>" . $dato["nombre"] . "</td>" .
                    "<td>" . $dato["paterno"] . "</td>" .
                    "<td>" . $dato["materno"] . "</td>" .
                    "<td>" . $dato["fecha_nacimiento"] . "</td>" .
                    "<td>" . $dato["correo"] . "</td>" .
                    "<td>" . $dato["user"] . "</td>" .
                    "<td>" . $dato["pass"] . "</td>" .
                "</tr>";
        }
        echo "</tbody></table>";
        $db->desconectaDB();
    }
    
    public function eliminarAdministrador($id){
        $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
        $db->conectaDB();
        $query = "delete from administradores where id_administrador = '$id'";
        $db->ejecutaSQL($query);
        $db->desconectaDB();
    }
    
}
?>