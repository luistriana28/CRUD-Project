<?php
class database {
    private $server;
    private $db;
    private $user;
    private $pass;
    private $connection;
    
    public function __construct($server,$db,$user,$pass){
        $this->server = $server;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
    }
    
    public function conectaDB(){
        $this->connection = mysql_connect($this->server,$this->user,$this->pass) or die(mysql_error());
        mysql_set_charset('utf8',$this->connection);
        mysql_select_db($this->db,$this->connection) or die(mysql_error());
        
    }
    
      public function ejecutaSQL($query){
          try{
            mysql_query($query) or die(mysql_error());
          } catch(Exception $e){
            echo "Error " . $e->getMessage();
          }
      }
    
    public function mostrarTabla($query){
        
          $resultado = mysql_query($query);
          echo "<div class='table-responsive'><table class='table table-basic'><table class='table table-striped table-bordered table-hover'><thead><td>ID Usuario</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Usuario</td><td>Tipo</td></tr>";
          while($dato = mysql_fetch_array($resultado)){
            echo "<tr>";
              echo "<td>" . $dato['id_usuario'] . "</td>";
              echo "<td>" . $dato['nombre'] . "</td>";
              echo "<td>" . $dato['apellido_paterno'] . "</td>";
              echo "<td>" . $dato['apellido_materno'] . "</td>";
              echo "<td>" . $dato['user'] . "</td>";
              echo "<td>" . $dato['tipo'] . "</td>";
            echo "</tr>";
          }
          echo "</tbody></table></div>";
      
    }
    
    public function desconectaDB(){
        mysql_close($this->connection) or die(mysql_error());
    }
    
    
}
?>