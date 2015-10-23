<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Iniciar Sesion - SocialNet</title>
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
            include 'php/login.php';
            if(isset($_REQUEST['ingresar'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $login = new Login($user,$pass);
                $login->verificaUsuario();
            }
        ?>
        <form method="post" action="" autocomplete="off">
           <div class="container" id="panel">
              <label id="titulo">CedsaNet</label>
               <div class="col-md-3 col-md-offset-4">
                    <label for="usuario" id="user">Usuario:</label>
                    <input type="text" name="user" id="usuario" class="form-control">
               </div>
               <div class="col-md-3 col-md-offset-4">
                    <label for="password" id="pass">Contraseña:</label>
                    <input type="password" name="pass" id="password" autocomplete="off" class="form-control">
                </div>
                <div class="col-md-3 col-md-offset-4">
                    <div class="form-group">
                        <button type="submit" name="ingresar" class="btn btn-success">Iniciar Sesion</button>
                    </div>
                    
                </div>
                <div class="col-md-3 col-md-offset-4">
                    <a id="casa" href="index.php">Volver a la Pagina Principal</a>
                </div>
            </div>
        </form>
    </body>
</html>