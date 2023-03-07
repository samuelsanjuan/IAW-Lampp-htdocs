<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
$user = $_SESSION['usuario'];
$date = date("d-m-y_G:i:s");
$nombreArchivo = $user . "_" . $date . ".txt";



$mysqli_link = mysqli_connect("localhost", "root", "", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

$select_query = "SELECT * FROM usuario where usuario = '$user'";

$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $name = $fila['nome'];
    $direccion =  $fila['direccion'];
    $tel = $fila['telefono'];
    $dni = $fila['nifdni'];
    $email = $fila['email'];
}

$modelo = $_REQUEST['radio'];
$select_query = "SELECT * FROM vehiculo_venda where modelo = '$modelo'";
$result = mysqli_query($mysqli_link, $select_query);
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $modelo = $fila['modelo'];
    $descr = $fila['descricion'];
    $marca = $fila['marca'];
    $prezo = $fila['prezo'];
}

$select_query = "SELECT cantidade FROM vehiculo_venda where modelo='$modelo'";

$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $cantidad = $fila['cantidade'] - 1;
    echo $cantidad;
}

$update_query = "UPDATE `vehiculo_venda` SET cantidade=$cantidad WHERE modelo = '$modelo'";

if (mysqli_query($mysqli_link, $update_query)) {
}

mysqli_close($mysqli_link);

$cadena = "gracias $name por haber comprado el vehiculo $modelo
a continuacion le adjuntamos los detalles de su compra\n
$name con dni $dni direccion $direccion telefono $tel y email $email
compro $modelo $marca ($descr) por $prezo €";

$file = fopen("$nombreArchivo", "a+");
fputs($file, $cadena);
fclose($file);

echo "$nombreArchivo generado<br><br>";


echo '<a href="' . $nombreArchivo . '" target="_blank">Ver ticket</a><br>';
echo '<a href="../menu.php">Volver</a>';
?>