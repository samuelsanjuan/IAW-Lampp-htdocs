<?php
header("Content-Type: text/html;charset=utf-8");
session_start();

?>

<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Menu</title>

</head>

<body>

	<p style="color:blue;text-align:right;">
		<?php
		header("Content-Type: text/html;charset=utf-8");
		echo "Bienvenido " .	$_SESSION['usuario'];
		?>
	</p>

	<p>
		<?php
		header("Content-Type: text/html;charset=utf-8");
		if ($_SESSION['permisos'] == 1) {
			header("Location: menuAdmins.php");
		}
		?>
	</p>

	<form name="enVenta" method="post" action="enVenta.php">
		<input type="submit" value="lista de vehiculos en venta" />
	</form>
	<br /><br />

	<form name="enAluguer" method="post" action="enAluguer.php">

		<input type="submit" value="lista de vehiculos en aluguer" />
	</form>
	<br /><br />

	<form name="modificarPerfil" method="post" action="modificarPerfil.php">
		<input type="submit" value="modificar Perfil" />
	</form>
	<br /><br />

	<form name="alugar coche" method="post" action="alugar.php">
		<input type="submit" value="Alugar coche" />
	</form>
	<br /><br />

	<form name="devolver coche" method="post" action="devolucion.php">
		<input type="submit" value="Devolver coche" />
	</form>
	<br /><br />

	<form name="comprar coche" method="post" action="comprar.php">
		<input type="submit" value="Comprar coche" />
	</form>
	<br /><br />
</body>

</html>