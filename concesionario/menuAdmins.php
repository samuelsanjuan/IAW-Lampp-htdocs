<?php
session_start();
?>

<html>
	<head>
		<title>Menu Admins</title>
		<meta charset="utf-8">
	</head>
	<body>
	
	<p style="color:blue;text-align:right;">
	<?php
	echo "Bienvenido ".
	$_SESSION['usuario'];
	?>
	</p>

	<p>
	<?php
	if ($_SESSION['permisos']==0){
		header("Location: menu.php");
	}
	?>
	</p>

		<form name="login" method="post" action="enVenta.php">

			<input type="submit" value="lista de vehiculos en venta" />
		</form>

        <br/><br/>

        <form name="register" method="post" action="enAluguer.php">

            <input type="submit" value="lista de vehiculos en aluguer"/>
        </form>

		<br/><br/>

		<form name="modificarPerfil" method="post" action="modificarPerfil.html">
			<input type="submit" value="modificar Perfil" />
		</form>

        <br/><br/>

		<form name="alugar coche" method="post" action="alugar.php">
			<input type="submit" value="Alugar coche" />
		</form>

        <br/><br/>

	</body>
</html>