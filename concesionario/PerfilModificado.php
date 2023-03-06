<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Borrado Venda</title>

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

session_start();
$user = $_SESSION['usuario'];

$error=0;
$actualizacion=0;
$errortelf=0;

$mysqli_link = mysqli_connect("localhost","root","", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()){
    printf("MySQL connection failed with the error: %s",mysqli_connect_error());
    exit; 
}

function asignarValor($valor,$numeroMax){

    global $error,$actualizacion;
    if (strlen($_REQUEST[$valor])>$numeroMax){
        echo "el nuevo $valor es demasiado largo, $numeroMax caracteres maximo, $valor no actualizado<br/>";
        $error=1;
    }elseif (strlen($_REQUEST[$valor])>0){
        $actualizacion++;
        return $_REQUEST[$valor];
    }
}

$name=asignarValor("name",60);
$passwd =asignarValor("passwd",8);
$email = asignarValor("email",30);
$telf= asignarValor("telf",9);
$dni= asignarValor("dni",9);
$direccion = asignarValor("direccion",90);

if (!(is_numeric($telf))&&strlen($telf)>0&&strlen($telf)<=9){
    echo "el telefono debe ser un numero sin letras";
    echo '<br/><a href="menu.php">volver al menu</a>';
    $errortelf=1;
}

$select_query = "SELECT * FROM `usuario` WHERE usuario = '$user';";

$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
    if (strlen($name)==0){
        $name = $fila['nome'];
    }

    if (strlen($passwd)==0){
        $passwd = $fila['contrasinal'];
    }

    if (strlen($email)==0){
        $email = $fila['email'];
    }

    if (strlen($telf)==0 && $errortelf==0){
        $telf= $fila['telefono'];
    }

    if (strlen($dni)==0){
        $dni= $fila['nifdni'];
    }

    if (strlen($direccion)==0){
        $direccion = $fila['direccion'];
    }
}

$update_query = "UPDATE `usuario` SET `contrasinal`='$passwd',`nome`='$name',`direccion`='$direccion',`telefono`='$telf',`nifdni`='$dni',`email`='$email' WHERE usuario='$user'";
If (mysqli_query($mysqli_link, $update_query)) {
    if ($error==0 && $actualizacion>0){
        echo "<br/>Foi todo ben na actualización";
        echo '<br/><a href="menu.php">volver al menu</a>';
    }elseif ($error>0 && $actualizacion>0) {
        echo "<br/>se han actualizado los campos sin errores";
        echo '<br/><a href="menu.php">volver al menu</a>';
    }elseif($error>0 && $actualizacion==0){
        echo "<br/>no se ha actualizado ningun campo";
        echo '<br/><a href="menu.php">volver al menu</a>';
    }
}

mysqli_close($mysqli_link);

?>