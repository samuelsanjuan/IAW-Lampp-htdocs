<?php

$tipo=$_REQUEST["tipo"];

$mysqli_link = mysqli_connect("localhost","root","", "Inmobiliaria");

if (mysqli_connect_errno()){
    printf("MySQL connection failed with the error: %s",mysqli_connect_error());
    exit; 
}

$select_query = "SELECT * FROM vivendas where tipo='$tipo'";

$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "Tipo:" . $fila['tipo'] . "<br/>";
    echo "Precio:" . $fila['precio'] . "<br/>";
    echo "Zona:" . $fila['zona'] . "<br/>";
    echo "Tamaño:" . $fila['tamaño'] . "<br/>";
    echo "Dormitorios:" . $fila['dormitorios'] . "<br/>";
    echo "Extras:" . $fila['extras'] . "<br/>";
    echo "<br/>";
}

mysqli_close($mysqli_link);
?>
