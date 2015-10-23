<?php
include 'database.php';
class Empresa{
    
    private $razonSocial;
    private $rfc;
    private $calle;
    private $noExterior;
    private $colonia;
    private $ciudad;
    private $estado;
    private $telOficina;
    private $email;
    private $maestro;
    
    public function __construct($razonSocial = NULL,$rfc = NULL,$calle = NULL,$noExterior = NULL,$colonia = NULL,$ciudad = NULL,$estado = NULL,$telOficina = NULL,$email = NULL,$maestro = NULL){
        $this->razonSocial = $razonSocial;
        $this->rfc = $rfc;
        $this->calle = $calle;
        $this->noExterior = $noExterior;
        $this->colonia = $colonia;
        $this->ciudad = $ciudad;
        $this->estado = $estado;
        $this->telOficina = $telOficina;
        $this->email = $email;
        $this->maestro = $maestro;
    }
    
    public function guardarEmpresa($id){
        try {
            $query;
            $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
            $db->conectaDB();
            $resultado = mysql_query("select count(*) from empresas where id_empresa = '$id'");
            $verifica = mysql_fetch_row($resultado);
            if($verifica[0] > 0){
                $query = "update empresas set razon_social = '$this->razonSocial',rfc = '$this->rfc',calle = '$this->calle',no_exterior = '$this->noExterior',colonia = '$this->colonia',ciudad = '$this->ciudad',estado = '$this->estado',tel_oficina = '$this->telOficina',email = '$this->email',consecutivo_maestro = '$this->maestro' where id_empresa = '$id'";
            } else {
            $query = "insert into empresas(razon_social,rfc,calle,no_exterior,colonia,ciudad,estado,tel_oficina,email,consecutivo_maestro) 
    values('$this->razonSocial','$this->rfc','$this->calle','$this->noExterior','$this->colonia','$this->ciudad','$this->estado','$this->telOficina','$this->email','$this->maestro')";
            }
            
            $db->ejecutaSQL($query);
            $db->desconectaDB();
        } catch(Exception $e){
            echo "Error" . $e->getMessage();
            
        }
    }
    
    public function mostrarEmpresas(){
        echo "<table id='tablaEmpresas' class='table table-bordered table-hover'>" .
                "<thead>".
                    "<tr>" .
                        "<th>ID Empresa</th>".
                        "<th>Razon Social</th>".
                        "<th>RFC</th>".
                        "<th>Calle</th>".
                        "<th>No. Exterior</th>".
                        "<th>Colonia</th>".
                        "<th>Ciudad</th>".
                        "<th>Estado</th>".
                        "<th>Telefono</th>".
                        "<th>Email</th>".
                        "<th>Consecutivo</th>".
                    "</tr>" .
                "</thead>" .
                "<tbody>";
        $query = "select id_empresa,razon_social,rfc,calle,no_exterior,colonia,ciudad,estado,tel_oficina,email,consecutivo_maestro from empresas";
        $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
        $db->conectaDB();
        $resultado = mysql_query($query);
        while($dato = mysql_fetch_array($resultado)){
            echo "<tr>".
                    "<td>" . $dato['id_empresa'] . "</td>".
                    "<td>" . $dato['razon_social'] . "</td>".
                    "<td>" . $dato['rfc'] . "</td>".
                    "<td>" . $dato['calle'] . "</td>".
                    "<td>" . $dato['no_exterior'] . "</td>".
                    "<td>" . $dato['colonia'] . "</td>".
                    "<td>" . $dato['ciudad'] . "</td>".
                    "<td>" . $dato['estado'] . "</td>".
                    "<td>" . $dato['tel_oficina'] . "</td>".
                    "<td>" . $dato['email'] . "</td>".
                    "<td>" . $dato['consecutivo_maestro'] . "</td>".
                "</tr>";
        }
        echo "</tbody></table>";
        $db->desconectaDB();
    }
    public function eliminarEmpresa($id){
        try{
            $query = "delete from empresas where id_empresa = '$id'";
            $db = new database('127.0.0.1:3307','cedsa','root','mat23net90');
            $db->conectaDB();
            $db->ejecutaSQL($query);
            $db->desconectaDB();
        
        } catch(Exception $e){
            echo "Error" . $e->getMessage();
        }
    }
}
?>