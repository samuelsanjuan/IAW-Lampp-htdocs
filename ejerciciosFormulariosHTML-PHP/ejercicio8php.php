<?php
$n1 = $_REQUEST['num1'];
$n2 = $_REQUEST['num2'];
$switch=0;
if (is_numeric($n1)){
	echo "$n1 es un numero";
}else {
	$switch=1;
	echo "$n1 necesita ser un numero";
}
echo "<br/>";
if (is_numeric($n2)){
	echo "$n2 es un numero";
}else {
	$switch=1;
	echo "$n2 necesita ser un numero";
}
echo "<br/>";
if ($switch==0){
	$suma = $n1 + $n2;
	$resta = $n1 - $n2;
	$multiplicacion = $n1 * $n2;
	$division = $n1 / $n2;
	echo "suma : $suma  <br/> resta : $resta <br/> multiplicacion : $multiplicacion <br/> division : $division";
}
?>
