<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Modificar Perfil</title>

</head>

<body>


    <p style="color:blue;text-align:right;">
        <?php
        header("Content-Type: text/html;charset=utf-8");
        session_start();
        echo "Bienvenido " .
            $_SESSION['usuario'];
        ?>
    </p>

    <p>Escribe solo en los campos que quieras modificar</p>

    <form name="modificarPerfil" method="post" action="PerfilModificado.php">

        contraseña: <input type="text" name="passwd" value="">
        <br />
        nombre:<input type="text" name="name" value="">
        <br />
        direccion:<input type="text" name="direccion" value="">
        <br />
        telefono:<input type="text" name="telf" value="">
        <br />
        nifdni:<input type="text" name="dni" value="">
        <br />
        email:<input type="text" name="email" value="">
        <br />

        <input type="submit" value="modificarPerfil" />
    </form>

    <br /><br />

    <a href="menu.php">volver al menu</a>
</body>

</html>