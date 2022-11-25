<?php
$tipo = $_REQUEST['tipo'];
$zona = $_REQUEST['zona'];
$dormitorios = $_REQUEST['dormitorios'];
$precio = $_REQUEST['precio'];
$tamaño= $_REQUEST['tamaño'];
$extras= $_REQUEST['extras'];

echo "$tipo, $zona, $dormitorios, $precio, $tamaño, $extras";

$mysqli_link = mysqli_connect("localhost","root","", "Inmobiliaria");

if (mysqli_connect_errno()){
    printf("MySQL connection failed with the error: %s",mysqli_connect_error());
    exit; 
}

$delete_query = "DELETE FROM vivendas WHERE tipo='$tipo' and zona='$zona' and dormitorios=$dormitorios and precio=$precio and tamaño=$tamaño and extras='$extras';";

If (mysqli_query($mysqli_link, $delete_query)) {
    echo "Foi todo ben na eliminación";
}

mysqli_close($mysqli_link);

?>