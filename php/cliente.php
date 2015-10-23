<?php
include 'database.php';
class Cliente{
    
    private $razonSocial;
    private $rfc;
    private $calle;
    private $noExterior;
    private $colonia;
    private $ciudad;
    private $estado;
    private $tel_oficina;
    private $email;
    private $user;
    private $pass;
    
    public function __construct($razonSocial = NULL,$rfc = NULL,$calle = NULL,$noExterior = NULL,$colonia = NULL,$ciudad = NULL,$estado = NULL,$tel_oficina = NULL,$email = NULL,$user = NULL,$pass = NULL){
        $this->razonSocial = $razonSocial;
        $this->rfc = $rfc;
        $this->calle = $calle;
        $this->noExterior = $noExterior;
        $this->colonia = $colonia;
        $this->ciudad = $ciudad;
        $this->estado = $estado;
        $this->tel_oficina = $tel_oficina;
        $this->email = $email;
        $this->user = $user;
        $this->pass = $pass;
    }
    
    public function guardarCliente($id){
        try {
            $query = "";
            $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
            $db->conectaDB();
            $resultado = mysql_query("select count(*) from clientes where id_cliente = '$id'");
            $verifica = mysql_fetch_row($resultado);
            if($verifica[0] > 0){
                $query = "update clientes set razonSocial = '$this->razonSocial',rfc = '$this->rfc',calle = '$this->calle',no_exterior = '$this->noExterior',colonia = '$this->colonia',ciudad = '$this->ciudad',estado = '$this->estado',tel_oficina = '$this->tel_oficina',email = '$this->email',user = '$this->user',pass = '$this->pass' where id_cliente = '$id'";
            } else {
            $query = "insert into clientes(razonSocial,rfc,calle,no_exterior,colonia,ciudad,estado,tel_oficina,email,user,pass) 
    values('$this->razonSocial','$this->rfc','$this->calle','$this->noExterior','$this->colonia','$this->ciudad','$this->estado','$this->tel_oficina','$this->email','$this->user','$this->pass')";
            }
            
            $db->ejecutaSQL($query);
            $db->desconectaDB();
        } catch(Exception $e){
            echo "Error" . $e->getMessage();
            
        }
    }
    
    public function mostrarClientes($query){
        $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
        $db->conectaDB();
        $resultado = mysql_query($query);
        echo "<table id='tablaClientes' class='table table-bordered table-hover'>" .
             "<thead>" .
                "<tr>" .
                    "<th>ID</th>" .
                    "<th>RazonSocial</th>" .
                    "<th>RFC</th>" .
                    "<th>Calle</th>" .
                    "<th>No. Exterior</th>" .
                    "<th>Colonia</th>" .
                    "<th>Ciudad</th>" .
                    "<th>Estado</th>" .
                    "<th>Telefono</th>" .
                    "<th>Email</th>" .
                    "<th>User</th>" .
                    "<th>Pass</th>" .
                "</tr>" .
            "</thead>" .
            "<tbody>";
            
        while($dato = mysql_fetch_array($resultado)){
            echo "<tr>" .
                    "<td>" . $dato["id_cliente"] . "</td>" .
                    "<td>" . $dato["razonSocial"] . "</td>" .
                    "<td>" . $dato["rfc"] . "</td>" .
                    "<td>" . $dato["calle"] . "</td>" .
                    "<td>" . $dato["no_exterior"] . "</td>" .
                    "<td>" . $dato["colonia"] . "</td>" .
                    "<td>" . $dato["ciudad"] . "</td>" .
                    "<td>" . $dato["estado"] . "</td>" .
                    "<td>" . $dato["tel_oficina"] . "</td>" .
                    "<td>" . $dato["email"] . "</td>" .
                    "<td>" . $dato["user"] . "</td>" .
                    "<td>" . $dato["pass"] . "</td>" .
                "</tr>";
        }
        echo "</tbody></table>";
        $db->desconectaDB();
    }
    
    public function eliminarCliente($id){
        $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
        $db->conectaDB();
        $query = "delete from clientes where id_cliente = '$id'";
        $db->ejecutaSQL($query);
        $db->desconectaDB();
    }
}
?>