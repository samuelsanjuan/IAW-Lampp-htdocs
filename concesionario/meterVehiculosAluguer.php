<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>meter vehiculos en aluguer</title>

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

$error=0;
$repetido=0;

function comprobarValores($valor,$numeroMax){

    global $error;
    if (strlen($_REQUEST[$valor])>$numeroMax){
        echo "el nuevo $valor es demasiado largo, $numeroMax caracteres maximo<br/>";
        $error=1;
    }elseif (strlen($_REQUEST[$valor])>0){
        return $_REQUEST[$valor];
    }else{
        echo "tienes que meter algun valor en $valor";
        $error=1;
    }
}

$modelo = comprobarValores('modelo',80); //80
$cantidade = comprobarValores('cantidade',11); //11
$descricion = comprobarValores('descricion',120); //120
$marca = comprobarValores('marca',24); //24
$prezo= comprobarValores('prezo',11); //11
$foto= comprobarValores('foto',1000); //1000

if (!(is_numeric($cantidade))&&strlen($cantidade)>0&&strlen($cantidade)<=11){
    echo "la cantidad debe ser un numero sin letras<br>";
    $error=1;
}

if (!(is_numeric($prezo))&&strlen($prezo)>0&&strlen($prezo)<=11){
    echo "el precio debe ser un numero sin letras<br>";
    $error=1;
}

if ($error==0){
$mysqli_link = mysqli_connect("localhost","root","", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()){
    printf("MySQL connection failed with the error: %s",mysqli_connect_error());
    exit; 
}     
$select_query = "SELECT * FROM `vehiculo_aluguer` WHERE modelo='$modelo'";
$result = mysqli_query($mysqli_link, $select_query);

$repetido=$result->num_rows;


if ($repetido>0){
    echo "vehiculo repetido";
    $error=1;
}
    
if($error==0){
    $cadenaImg='<img src="imagenes/'.$foto.'.jpg" id="'.$foto.'.jpg" width="500px" height="300px">';
    $insert_query = "INSERT into vehiculo_aluguer(modelo, cantidade, descricion, marca, prezo, foto) VALUES ('$modelo',$cantidade,'$descricion','$marca',$prezo,'$cadenaImg');";
    If (mysqli_query($mysqli_link, $insert_query)) {
        echo "nuevo vehiculo disponible en alguer <br>";
        echo '<a href="menu.php">volver al menu</a>';
    }

}elseif ($error==1){
    echo '<br><a href="meterVehiculosAlugar.php">try again</a>';
}

mysqli_close($mysqli_link);

}else
echo '<br><a href="meterVehiculosAlugar.php">try again</a>';
?>