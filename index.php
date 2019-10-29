<?php

$msg = null;
if(isset($_POST["login"]))
{
    $conexion = new mysqli('localhost', 'root', '', 'inyec');

    $email = $conexion->real_escape_string($_POST["email"]);
    $password = $conexion->real_escape_string($_POST["password"]);

    $sql = "SELECT email, password FROM users WHERE email='$email' AND password='$password'";
    $resultado = $conexion->query($sql);
    if($resultado->num_rows > 0)
    {
        $msg = "Bien sesión iniciada";
        header('Location: http://localhost/inyeccion/busqueda.php');
    }
    else
    {
        $msg = "Ha ocurrido un error al iniciar sesión";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inyeccion SQL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <h1>Inyección SQL</h1>
    <strong><?php echo $msg ?></strong>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <table>
        <td>Email:</td>
        <td><input type="text" name="email"></td>
        <td>Password:</td>
        <td><input type="text" name="password"></td>
        </table>
        <input type="hidden" name="login">
        <input type="submit" value="iniciar sesión">
    </form>
</body>
</html>