<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Borrado Venda</title>

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

$select_query = "SELECT * from vehiculo_venda where modelo = '$modelo'";
$result = mysqli_query($mysqli_link, $select_query);
$num = $result->num_rows;


//primero comprueba si existe el modelo
if ($num == 1) {

    $select_query = "SELECT cantidade from vehiculo_venda where modelo = '$modelo'";
    $result = mysqli_query($mysqli_link, $select_query);

    while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $cantidad = $fila['cantidade'] - $cantidad;
        echo "$cantidad";
    }
    
//si se queda en positivo simplemente le cambia la cantidad a la nueva cantidad

    if ($cantidad > 0) {

        $update_query = "UPDATE `vehiculo_venda` SET cantidade='$cantidad' WHERE modelo='$modelo'";
        mysqli_query($mysqli_link, $update_query);
        echo "modificada la cantidad";


//si el modelo existe comprueba si la cantidad se queda en negativo, si se queda en negativo 

    } elseif ($cantidad <= 0) {

        $delete_query = "DELETE FROM `vehiculo_venda` WHERE modelo = '$modelo'";
        mysqli_query($mysqli_link, $delete_query);
        echo "borrado de la tabla";
    }
} else echo "no existe ese modelo";

echo "<a href='menu.php'>volver al menu</a>";

mysqli_close($mysqli_link)

?>