<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Alugar</title>

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
$mysqli_link = mysqli_connect("localhost", "root", "", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

//solo te muestra los vehiculos que tengan stock, sino obviamente no lo puedes alquilar
$select_query = "SELECT * FROM vehiculo_aluguer where cantidade>0";
$result = mysqli_query($mysqli_link, $select_query);

echo '<form name="register" method="post" action="alugado.php">';

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "Modelo:" . $fila['modelo'] . "<br/>";
    echo "Cantidade:" . $fila['cantidade'] . "<br/>";
    echo "Descricion:" . $fila['descricion'] . "<br/>";
    echo "Marca:" . $fila['marca'] . "<br/>";
    echo "Prezo:" . $fila['prezo'] . "<br/>";
    echo $fila['foto'] . "<br/>";
    $modelo = $fila['modelo'];
    echo "<input type='radio' name='radio' value='" . $modelo . "' /> Alquilar " . $fila['modelo'] . "</br>";
    echo "<br/>";
}
echo ' <input type="submit" value="alugar" />
</form>';

mysqli_close($mysqli_link);

echo '<a href="menu.php">Volver</a>';

?>