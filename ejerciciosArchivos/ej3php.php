<?php

function pasarArchivoArray($archivo){
    $contador=0;
    while(!feof($archivo)){
        $num=fgets($archivo);
        $array[$contador]=$num;
        echo $num."<br/>";
        $contador++;
    }

    return $array;
}

$archivo = $_REQUEST['archivo'];
$file = fopen($archivo,"r");
$array=pasarArchivoArray($file);
echo "el array es ";
foreach($array as $indice=>$valor){
    echo "en el indice ".$indice." tiene un ".$valor;
}

fclose($file);

?>