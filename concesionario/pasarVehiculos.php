<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>pasar vehiculos en devolucion</title>

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

$mysqli_link = mysqli_connect("localhost","root","", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()){
    printf("MySQL connection failed with the error: %s",mysqli_connect_error());
    exit; 
}

echo '<form name="DevolverVehiculos" method="post" action="vehiculosPasados.php">';
$select_query = "SELECT * FROM `vehiculo_devolto`";
$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    $modelo=$fila['modelo'];
    $descricion=$fila['descricion'];
    $cantidade=$fila['cantidade'];
    $marca=$fila['marca'];
    $foto=$fila['foto'];  
    echo $modelo."</br>".$descricion."</br>".$cantidade."</br>".$marca."</br>".$foto."<br><br>";

}

echo "<br/>";
mysqli_close($mysqli_link);
echo ' <input type="submit" value="Aceptar vehiculos devueltos" />
</form>';

echo "<a href='menu.php'>volver al menu</a>";

?>