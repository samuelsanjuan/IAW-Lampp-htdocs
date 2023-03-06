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
	echo "Bienvenido ".
	$_SESSION['usuario'];
	?>
	</p>

	<p>
	<?php
header("Content-Type: text/html;charset=utf-8");
	if ($_SESSION['permisos']==0){
		header("Location: menu.php");
	}
	?>
	</p>

		<p>Estás en el menú de admins</p>
		<form name="aceptarRegistros" method="post" action="aceptarRegistros.php">

			<input type="submit" value="aceptar nuevos registros" />
		</form>
        <form name="añadirCocheAlquiler" method="post" action="meterVehiculosAlugar.php">

            <input type="submit" value="añadir vehiculo en aluguer"/>
        </form>

		<form name="añadirCocheVenta" method="post" action="meterVehiculosVenda.php">

            <input type="submit" value="Añadir vehiculo en venta"/>
        </form>

		<form name="DeletearVehiculoVenta" method="post" action="deletearVehiculosVenta.php">

            <input type="submit" value="deletear vehiculo venta"/>
        </form>

		<form name="DeletearVehiculoAluguer" method="post" action="deletearVehiculosAluguer.php">

			<input type="submit" value="deletear vehiculo aluguer"/>
		</form>

		<form name="enVenta" method="post" action="enVenta.php">
			<input type="submit" value="lista de vehiculos en venta" />
		</form>

        <form name="enAluguer" method="post" action="enAluguer.php">

            <input type="submit" value="lista de vehiculos en aluguer"/>
        </form>
		
		<form name="modifciarVenta" method="post" action="modificarVehiculoAlugados.php">

            <input type="submit" value="modificar vehiculos en aluguer"/>
        </form>
		
		<form name="modificarAluguer" method="post" action="modificarVehiculoVenta.php">

            <input type="submit" value="modificar vehiculo en venta"/>
        </form>
		
		<form name="enAluguer" method="post" action="pasarVehiculos.php">

            <input type="submit" value="pasar vehiculos devoltos"/>
        </form>

	</body>
</html>