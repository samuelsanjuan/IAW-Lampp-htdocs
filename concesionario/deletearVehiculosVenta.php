<!DOCTYPE html>


<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Deletear Venta</title>

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

	<p>Escribe el modelo y la cantidad del coche que quieras deletear</p>

	<form name="deletearVehiculo" method="post" action="deleteadoVenta.php">

		Modelo: <input type="text" name="modelo" value="">
		<br />
		Cantidad: <input type="text" name="cantidade" value="">
		<br />

		<input type="submit" value="Deletear" />
	</form>

	<br /><br />

	<a href="menu.php">volver al menu</a>
</body>

</html>