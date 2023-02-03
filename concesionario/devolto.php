<?php
session_start();
$user=$_SESSION['usuario'];

$cocheDevolto=$_REQUEST['radio'];

$mysqli_link = mysqli_connect("localhost","root","", "frota");

if (mysqli_connect_errno()){
    printf("MySQL connection failed with the error: %s",mysqli_connect_error());
    exit; 
}

$select_query = "SELECT * FROM vehiculo_alugado where modelo='$cocheDevolto' and usuario='$user'";

$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $modelo= $fila['modelo'];
    $cantidade= $fila['cantidade'];
    $descr= $fila['descricion'];
    $marca= $fila['marca'];
    $foto= $fila['foto'];

}


$select_query= "SELECT cantidade FROM vehiculo_alugado where modelo='$modelo' and usuario = '$user'";

$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $cantidad=$fila['cantidade']-1;

}

if ($cantidad<1){

    $delete_query = "DELETE FROM `vehiculo_alugado` WHERE modelo = '$modelo' and usuario = '$user'";
    
    if (mysqli_query($mysqli_link, $delete_query)) {
    }

}else{

    $update_query = "UPDATE `vehiculo_alugado` SET cantidade=$cantidad WHERE modelo = '$modelo' and usuario='$user'";
   
    If (mysqli_query($mysqli_link, $update_query)) {
    }

}



$select_query= "SELECT count(*) FROM vehiculo_devolto where modelo='$modelo' and descricion='$descr' and marca='$marca' and foto = '$foto' and usuario = '$user'";
$result = mysqli_query($mysqli_link, $select_query);
echo "guayaba";
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

   $num=$fila['count(*)'];

}
echo "$num";

if ($num==0){

    $insert_query="INSERT INTO `vehiculo_devolto` (`modelo`, `cantidade`, `descricion`, `marca`, `foto`,`usuario`) VALUES ('$modelo', 1, '$descr', '$marca', '$foto','$user')";

    If (mysqli_query($mysqli_link, $insert_query)) {
    }
    echo "insercion terminada";

}elseif($num==1){

    $select_query= "SELECT cantidade FROM vehiculo_devolto where modelo='$modelo' and usuario = '$user'";

    $result = mysqli_query($mysqli_link, $select_query);

    while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $cantidad=$fila['cantidade']+1;
    }

    $update_query = "UPDATE `vehiculo_devolto` SET cantidade=$cantidad WHERE usuario='$user' and modelo = '$modelo'";

    If (mysqli_query($mysqli_link, $update_query)) {
    
    }

}else{
    echo "wtf hermano";
}
 
echo $modelo."<br/>".$foto."<br/>";
echo "vehiculo devolto <br/>";
echo '<a href="menu.php">Volver</a>';
?>