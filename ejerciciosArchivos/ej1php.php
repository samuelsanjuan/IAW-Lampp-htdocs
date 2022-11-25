<?php
$n1 = $_REQUEST['num1'];
$n2 = $_REQUEST['num2'];
$n3 = $_REQUEST['num3'];

$file=fopen("datosExercicio.txt","w+");
fputs($file,"$n1\n$n2\n$n3");
fclose($file);

?>
