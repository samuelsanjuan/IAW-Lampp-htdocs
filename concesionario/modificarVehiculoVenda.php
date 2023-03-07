<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>modificar vehiculo en venta</title>

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

$error = 0;
$actualizacion = 0;
$actualizarFoto = 1;
$modelo = $_REQUEST['modelo'];
function asignarValor($valor, $numeroMax)
{

    global $error, $actualizacion;
    if (strlen($_REQUEST[$valor]) > $numeroMax) {
        echo "el nuevo $valor es demasiado largo, $numeroMax caracteres maximo<br/>";
        $error = 1;
    } elseif (strlen($_REQUEST[$valor]) > 0) {
        $actualizacion++;
        return $_REQUEST[$valor];
    }
}

$cantidade = asignarValor('cantidade', 11); //11
$descricion = asignarValor('descricion', 120); //120
$marca = asignarValor('marca', 24); //24
$prezo = asignarValor('prezo', 11); //11
$foto = asignarValor('foto', 1000); //1000

if (strlen($cantidade) > 0 && !(is_numeric($cantidade))) {
    echo "la cantidad debe ser un numero sin letras<br>";
    $error = 1;
}

if (strlen($prezo) > 0 && !(is_numeric($prezo))) {
    echo "el precio debe ser un numero sin letras<br>";
    $error = 1;
}


if ($error == 0) {
    $mysqli_link = mysqli_connect("localhost", "root", "", "frota");
    mysqli_set_charset($mysqli_link, "utf8");


    if (mysqli_connect_errno()) {
        printf("MySQL connection failed with the error: %s", mysqli_connect_error());
        exit;
    }

    $select_query = "SELECT * FROM `vehiculo_venda` WHERE modelo = '$modelo';";

    $result = mysqli_query($mysqli_link, $select_query);

    $num=$result->num_rows;

    if ($num != 1) {
        echo "no existe ese modelo";
        echo '<br><a href="modificarVehiculoVenda.php">try again</a>';
        $error=1;
    } else {

        $select_query = "SELECT * FROM `vehiculo_venda` WHERE modelo = '$modelo'";
        $result = mysqli_query($mysqli_link, $select_query);
        while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            if (strlen($cantidade) == 0) {
                $cantidade = $fila['cantidade'];
            }

            if (strlen($prezo) == 0) {
                $prezo = $fila['prezo'];
            }

            if (strlen($descricion) == 0) {
                $descricion = $fila['descricion'];
            }

            if (strlen($marca) == 0) {
                $marca = $fila['marca'];
            }

            if (strlen($foto) == 0) {
                $foto = $fila['foto'];
                $actualizarFoto = 0;
            }
        }

        if ($actualizarFoto == 1) {
            $foto = '<img src="imagenes/' . $foto . '.jpg" id="' . $foto . '.jpg" width="500px" height="300px">';
        }

        $update_query = "UPDATE `vehiculo_venda` SET `cantidade`=$cantidade,`descricion`='$descricion',`foto`='$foto',`prezo`=$prezo,`marca`='$marca' WHERE modelo='$modelo'";
        if (mysqli_query($mysqli_link, $update_query)) {

            echo "<br/>Foi todo ben na actualización";
            echo '<br/><a href="menu.php">volver al menu</a>';
        }
    }
    mysqli_close($mysqli_link);
} else {
    echo '<br><a href="modificarVehiculoVenda.php">try again</a>';
}
?>