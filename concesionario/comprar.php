<?php
session_start();
$user=$_SESSION['usuario'];
$mysqli_link = mysqli_connect("localhost","root","", "frota");

if (mysqli_connect_errno()){
    printf("MySQL connection failed with the error: %s",mysqli_connect_error());
    exit; 
}

$select_query = "SELECT * FROM vehiculo_venda where cantidade>0";

$result = mysqli_query($mysqli_link, $select_query);


echo '<form name="comprar" method="post" action="tickets/ticket.php">';


while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "Modelo:" . $fila['modelo'] . "<br/>";
    echo "Cantidade:" . $fila['cantidade'] . "<br/>";
    echo "Descricion:" . $fila['descricion'] . "<br/>";
    echo "Marca:" . $fila['marca'] . "<br/>";
    echo "Prezo:" . $fila['prezo'] . "<br/>";
    echo $fila['foto'] . "<br/>";
    $modelo=$fila['modelo'];
    echo "<input type='radio' name='radio' value='".$modelo."' /> Comprar ".$fila['modelo']."</br>";  
    echo "<br/>";
}
echo ' <input type="submit" value="comprar" />
</form>';

mysqli_close($mysqli_link);

echo '<a href="menu.php">Volver</a>';





$date("d-m-y G:i:s");




?>
