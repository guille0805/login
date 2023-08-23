
 <html>
     <style>
     body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;padding:16px;}
        </style>
        <body>
            <form action="login.php" method="POST">
                <h3>Login de usuario </h3>
                <label for="txt1"> Usuario:</label>
                <input type="" name="t1" required>
                    <br>
                    <br>
                    <label form="txt1"> password:</label>
                <input type="" name="t2" required>
                    <br>
                    <input type="submit" name="" value="ingresar">
</form>
</body>
<?php
if($_POST){
    session_start();
    require('conexion.php');
    $u = $_POST['t1'];
    $p = $_POST['t2'];
    $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query=$conexion->prepare("SELECT * FROM usuario WHERE usuario=:u AND contraseña=:p");
    $query->bindParam(":u",$u);
    $query->bindParam(":p",$p);
    $query->execute();
    $usuario=$query->fetch(PDO::FETCH_ASSOC);
    if($usuario){
        $_SESSION["usuario"] = $usuario["contraseña"];
        //header("location.pagina_segura.php");

    }else{
        echo "usuario o password inalidos";

    }
}
?>
</html>
 
