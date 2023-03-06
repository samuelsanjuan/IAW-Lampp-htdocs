<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>alugado</title>

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

//recojemos de la sesion el nombre de usuario
session_start();
$user = $_SESSION['usuario'];

//recojemos del php anterior (alugar.php) el modelo del coche
$cocheAlquilado = $_REQUEST['radio'];


$mysqli_link = mysqli_connect("localhost", "root", "", "frota");
mysqli_set_charset($mysqli_link, "utf8");
if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

$select_query = "SELECT * FROM vehiculo_aluguer where modelo='$cocheAlquilado'";
$result = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $modelo = $fila['modelo'];
    $cantidade = $fila['cantidade'];
    $descr = $fila['descricion'];
    $marca = $fila['marca'];
    $foto = $fila['foto'];
}

//update cantidade -1 en vehiculo_aluguer

$select_query = "SELECT cantidade FROM vehiculo_aluguer where modelo='$modelo'";

$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $cantidad = $fila['cantidade'] - 1;
}

$update_query = "UPDATE `vehiculo_aluguer` SET cantidade=$cantidad WHERE modelo = '$modelo' and marca='$marca'";

if (mysqli_query($mysqli_link, $update_query)) {
}


//upadte cantidade +1 alugado

$select_query = "SELECT * FROM vehiculo_alugado where modelo='$modelo' and descricion='$descr' and marca='$marca' and foto = '$foto' and usuario = '$user'";
$result = mysqli_query($mysqli_link, $select_query);
$num = $result->num_rows;




//si hay 0 filas la inserta

if ($num == 0) {

    $insert_query = "INSERT INTO `vehiculo_alugado` (`modelo`, `cantidade`, `descricion`, `marca`, `foto`, `usuario`) VALUES ('$modelo', 1, '$descr', '$marca', '$foto', '$user')";

    if (mysqli_query($mysqli_link, $insert_query)) {
    }


    //si hay 1 fila le hace un update al campo cantidad + 1

} elseif ($num == 1) {

    $select_query = "SELECT cantidade FROM vehiculo_alugado where modelo='$modelo' and usuario = '$user'";

    $result = mysqli_query($mysqli_link, $select_query);

    while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $cantidad = $fila['cantidade'] + 1;
    }

    $update_query = "UPDATE `vehiculo_alugado` SET cantidade=$cantidad WHERE usuario='$user' and modelo = '$modelo'";

    if (mysqli_query($mysqli_link, $update_query)) {
    }
} else {
    echo "error in database";
}

echo $modelo . "<br/>" . $foto . "<br/>";
echo "gracias $user por haber alquilado el coche <br/>";
echo '<a href="menu.php">Volver</a>';
?>