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

$insert_query = "INSERT into vivendas(tipo, zona, dormitorios, precio, tamaño, extras) VALUES ('$tipo','$zona',$dormitorios,$precio,$tamaño,'$extras');";

If (mysqli_query($mysqli_link, $insert_query)) {
echo "<br>Foi todo ben na inserción";
}

mysqli_close($mysqli_link);

?>