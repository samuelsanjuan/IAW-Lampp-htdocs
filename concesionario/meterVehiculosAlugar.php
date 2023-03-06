<!DOCTYPE html>
<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
?>

<html>

<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Menu Admins</title>
    
</head>

<body>

    <p style="color:blue;text-align:right;">
        <?php
header("Content-Type: text/html;charset=utf-8");
        echo "Bienvenido " .
            $_SESSION['usuario'];
        ?>
    </p>

    <p>
        <?php
header("Content-Type: text/html;charset=utf-8");
        if ($_SESSION['permisos'] == 0) {
            header("Location: menu.php");
        }
        ?>
    </p>
</body>

</html>
<html>
	<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Añadir Vehiculos Aluguer</title>
		
	</head>
	<body>

        <p>Añadir vehiculo a aluguer</p>
		<form name="meterVehiculoAluguer" method="post" action="meterVehiculosAluguer.php">

            modelo:<input type="text" name="modelo" value="">
            <br/> 
            cantidade: <input type="text" name="cantidade" value="">
            <br/> 
            descricion:<input type="text" name="descricion" value="">
            <br/> 
            marca:<input type="text" name="marca" value="">
            <br/> 
            prezo:<input type="text" name="prezo" value="">
            <br/> 
            foto:<input type="text" name="foto" value="">
            <br/> 

			<input type="submit" value="novoAluguer" />
		</form>

		<br/><br/>
		<a href="menu.php">volver al menu</a>
	</body>
</html>