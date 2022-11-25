<?php

function obtenerSuma($archivo){
    $suma = 0;
    while(!feof($archivo)){
        $num=fgets($archivo);
        $suma+=$num;
        echo $num."<br/>";
    }

    return $suma;
}

$archivo = $_REQUEST['archivo'];
$file = fopen($archivo,"r");

echo "la suma de los numeros del archivo es igual a ".obtenerSuma($file);

fclose($file);

?>