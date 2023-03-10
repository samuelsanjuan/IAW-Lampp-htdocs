<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Vehiculo devolto</title>

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
</body>

</html>
<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
$user = $_SESSION['usuario'];

$cocheDevolto = $_REQUEST['radio'];

$mysqli_link = mysqli_connect("localhost", "root", "", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

$select_query = "SELECT * FROM vehiculo_alugado where modelo='$cocheDevolto' and usuario='$user'";

$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $modelo = $fila['modelo'];
    $cantidade = $fila['cantidade'];
    $descr = $fila['descricion'];
    $marca = $fila['marca'];
    $foto = $fila['foto'];
}

//le resta 1 a la cantidad en vehiculo alugado

$select_query = "SELECT cantidade FROM vehiculo_alugado where modelo='$modelo' and usuario = '$user'";

$result = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $cantidad = $fila['cantidade'] - 1;
}
//si la cantidad es 0 lo borra de la tabla vehiculos en aluguer
if ($cantidad < 1) {

    $delete_query = "DELETE FROM `vehiculo_alugado` WHERE modelo = '$modelo' and usuario = '$user'";

    if (mysqli_query($mysqli_link, $delete_query)) {
    }
//si la cantidad es mayor a 0 le resta 1 a los vehiculos que tenga el usuario de ese modelo en propiedad
} else {

    $update_query = "UPDATE `vehiculo_alugado` SET cantidade=$cantidad WHERE modelo = '$modelo' and usuario='$user'";

    if (mysqli_query($mysqli_link, $update_query)) {
    }
}



$select_query = "SELECT * FROM vehiculo_devolto where modelo='$modelo' and descricion='$descr' and marca='$marca' and foto = '$foto' and usuario = '$user'";
$result = mysqli_query($mysqli_link, $select_query);
$num = $result->num_rows;

//si no existe hace un insert
if ($num == 0) {

    $insert_query = "INSERT INTO `vehiculo_devolto` (`modelo`, `cantidade`, `descricion`, `marca`, `foto`,`usuario`) VALUES ('$modelo', 1, '$descr', '$marca', '$foto','$user')";

    if (mysqli_query($mysqli_link, $insert_query)) {
    }
    echo "insercion terminada";
//si existe hace un update de la cantidade
} elseif ($num == 1) {

    $select_query = "SELECT cantidade FROM vehiculo_devolto where modelo='$modelo' and usuario = '$user'";

    $result = mysqli_query($mysqli_link, $select_query);

    while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $cantidad = $fila['cantidade'] + 1;
    }

    $update_query = "UPDATE `vehiculo_devolto` SET cantidade=$cantidad WHERE usuario='$user' and modelo = '$modelo'";

    if (mysqli_query($mysqli_link, $update_query)) {
    }
} else {
    echo "wtf hermano como llegaste aqui";
}

echo $modelo . "<br/>" . $foto . "<br/>";
echo "vehiculo devolto <br/>";
echo '<a href="menu.php">Volver</a>';
?>