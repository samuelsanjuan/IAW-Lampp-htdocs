<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>vehiculos pasados</title>

</head>

<body>

    <p style="color:blue;text-align:right;">
        <?php
        header("Content-Type: text/html;charset=utf-8");
        session_start();
        echo "Bienvenido " .
            $_SESSION['usuario'];
        ?>
    </p>
</body>

</html>
<?php
header("Content-Type: text/html;charset=utf-8");


$mysqli_link = mysqli_connect("localhost","root","", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()){
    printf("MySQL connection failed with the error: %s",mysqli_connect_error());
    exit; 
}     

$select_query = "SELECT * FROM `vehiculo_devolto`";
$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){


    $modelo=$fila['modelo'];
    $cantidade=$fila['cantidade'];
    $usuario=$fila['usuario'];

    echo $modelo.$cantidade.$usuario;


    $update_query="UPDATE `vehiculo_aluguer` SET `cantidade`=`cantidade`+$cantidade WHERE modelo='$modelo'";
    mysqli_query($mysqli_link, $update_query);
    echo $modelo.$cantidade.$usuario;

    $delete_query= "DELETE FROM `vehiculo_devolto` WHERE modelo = '$modelo' and usuario = '$usuario'";
    mysqli_query($mysqli_link,$delete_query);
}

mysqli_close($mysqli_link);
echo "<a href='menu.php'>volver al menu</a>";

?>