<?php
include 'database.php';
class login {
    private $user;
    private $pass;
    
    function __construct($user,$pass){
        $this->user = $user;
        $this->pass = $pass;
    }
    
    public function verificaUsuario(){
        $db = new database('127.0.0.1:3307','cedsa','root','');
        $db->conectaDB();
        $resultadoAdmin = mysql_query("select count(*) from administradores where user = '$this->user' and pass = '$this->pass'");
        $resultadoUser = mysql_query("select count(*) from clientes where user = '$this->user' and pass = '$this->pass'");
        
        $verificaA = mysql_fetch_row($resultadoAdmin);
        $verificaU = mysql_fetch_row($resultadoUser);
        
        if($verificaA[0] > 0){
            echo "<script type='text/javascript'>
                    window.location='admin.html';
                 </script>";
            //header("Location:../admin.html");
        } else if($verificaU[0] > 0){
            echo "<script type='text/javascript'>
                    window.location='clientes.html';
                 </script>";
        } else {
            echo "Usuario o Contraseña Invalidos";
        }
        $db->desconectaDB();
    }
}
?>