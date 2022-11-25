<?php
$horas = $_REQUEST['horas'];
$dias = $_REQUEST['dias'];
$sueldo = 10;

$salarioN=$horas*$dias*$sueldo*0.88;
echo "$salarioN" ;

?>
