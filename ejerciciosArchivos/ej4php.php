<?php

function pasarArchivoArray($archivo){
    $contador=0;
    while(!feof($archivo)){
        $num=fgets($archivo);
        $array[$contador]=$num;
        $contador++;
    }

    return $array;
}

function obtenerSuma($archivo){
    $suma = 0;
    while(!feof($archivo)){
        $num=fgets($archivo);
        $suma+=$num;
    }

    return $suma;
}

$n1 = 2;
$n2 = 8;
$n3 = 14;

$file=fopen("datosExercicio.txt","w+");
fputs($file,"$n1\n$n2\n$n3");
fclose($file);

$archivo = fopen("datosExercicio.txt","r");
echo "la suma de los numeros del archivo es igual a ".obtenerSuma($archivo)." ";

fclose($archivo);

$archivo = fopen("datosExercicio.txt","r");

$array=pasarArchivoArray($archivo);
echo "el array es ";
foreach($array as $indice=>$valor){
    echo "en el indice ".$indice." tiene un ".$valor;
}
fclose($archivo);

?>