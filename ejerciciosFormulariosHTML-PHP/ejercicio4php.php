<?php

$producto = $_REQUEST['productID'];
$peso = $_REQUEST['peso'];

if ($peso <= 10){

	$cadena="poco peso";

}
elseif ($peso > 10 and $peso <= 20){

	$cadena= "buen peso";

}

elseif ($peso > 20){

	$cadena = "gordofurro";

}
else{

	$cadena ="wtf";

}

echo $producto." ".$cadena;

?>
