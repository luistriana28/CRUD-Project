<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Inicio de Sesion Cedsa</title>
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    </head>
    <body>
        <?php
            include '../php/login.php';
            if(isset($_REQUEST['ingresar'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $login = new Login($user,$pass);
                $login->verificaUsuario();
            }
        ?>
        <div class="container">
            <form method="post" action="">
                <div class="form-group">
                    <label class="form-control">Usuario :</label>
                    <input class="form-control" type="text" name="user">
                </div>
                <div class="form-group">
                    <label class="form-control">Password :</label>
                    <input class="form-control" type="text" name="pass">
                </div>
                <button class="btn btn-success" type="submit" name="ingresar">Iniciar Sesion</button>
            </form>
        </div>
    </body>
</html>