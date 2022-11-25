<?php
$diametro = $_REQUEST['diam'];
$altura = $_REQUEST['altu'];
$radio = $diametro/2;
$Pi = 3.141593;
$volumen = $Pi*$radio*$radio*$altura;
echo "<br/> O volume do cilindro é de ". $volumen. " metros cúbicos";
?>
