<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Deleteado Aluguer</title>

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

$modelo = $_REQUEST['modelo'];
$cantidad = $_REQUEST['cantidade'];

$mysqli_link = mysqli_connect("localhost", "root", "", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

$select_query = "SELECT * from vehiculo_aluguer where modelo = '$modelo'";
$result = mysqli_query($mysqli_link, $select_query);
$num = $result->num_rows;


if ($num == 1) {

    $select_query = "SELECT cantidade from vehiculo_aluguer where modelo = '$modelo'";
    $result = mysqli_query($mysqli_link, $select_query);

    while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $cantidad = $fila['cantidade'] - $cantidad;
        echo "$cantidad";
    }

    if ($cantidad > 0) {

        $update_query = "UPDATE `vehiculo_aluguer` SET cantidade='$cantidad' WHERE modelo='$modelo'";
        mysqli_query($mysqli_link, $update_query);
        echo "modificada la cantidad";
    } elseif ($cantidad <= 0) {

        $delete_query = "DELETE FROM `vehiculo_aluguer` WHERE modelo = '$modelo'";
        mysqli_query($mysqli_link, $delete_query);
        echo "borrado de la tabla";
    }
} else echo "no existe ese modelo";

echo "<a href='menu.php'>volver al menu</a>";

mysqli_close($mysqli_link)

?>