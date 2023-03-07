<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Modificar Vehiculo Aluguer</title>

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


    <form name="modificarVehiculoAluguer" method="post" action="modificarVehiculoAluguer.php">
        <p>Escribe el nombre del modelo que quieres modificar</p>
        <input type="text" name="modelo" value="">
        <br>
        <p>Escribe solo en los campos que quieras modificar</p>
        <br />
        cantidade:<input type="text" name="cantidade" value="">
        <br />
        descricion:<input type="text" name="descricion" value="">
        <br />
        marca:<input type="text" name="marca" value="">
        <br />
        prezo:<input type="text" name="prezo" value="">
        <br />
        foto:<input type="text" name="foto" value="">
        <br />

        <input type="submit" value="modificarVehiculoAluguer" />
    </form>

    <br /><br />

    <a href="menu.php">volver al menu</a>
</body>

</html>