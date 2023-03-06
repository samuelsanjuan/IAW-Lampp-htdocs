<?php
header("Content-Type: text/html;charset=utf-8");
$name = $_REQUEST['name'];
$passwd = $_REQUEST['passwd'];
$user = $_REQUEST['user'];
$email = $_REQUEST['email'];
$telf= $_REQUEST['telf'];
$dni= $_REQUEST['dni'];
$direccion = $_REQUEST['direccion'];

$error=0;
$repetido=0;

if (strlen($name)>60){
    echo "el nombre $name es demaisado largo, ponle 60 caracteres maximo";
    $error=1;

}elseif (strlen($passwd)>8){
    echo "la contraseña $passwd es demaisado larga, ponle 8 caracteres maximo";
    $error=1;

}elseif (strlen($user)>24){
    echo "el nombre de usuario $user es demaisado largo, ponle 24 caracteres maximo";
    $error=1;

}elseif (strlen($telf)>9){
    echo "el telefono $telf es demaisado largo, ponle 9 caracteres maximo";
    $error=1;

}elseif (strlen($dni)>9){
    echo "el dni $dni es demaisado largo, ponle 9 caracteres maximo";
    $error=1;

}elseif (strlen($email)>30){
    echo "el email $email es demaisado largo, ponle 30 caracteres maximo";
    $error=1;

}elseif (strlen($direccion)>90){
    echo "la direccion $direccion es demaisado larga, ponle 90 caracteres maximo";
    $error=1;

}elseif (strlen($name)<1){
    echo "el nombre $name es demaisado corto, escribe algo";
    $error=1;

}elseif (strlen($passwd)<1){
    echo "la contraseña $passwd es demaisado corta, escribe algo";
    $error=1;

}elseif (strlen($user)<1){
    echo "el nombre de usuario $user es demaisado corto, escribe algo";
    $error=1;

}elseif (strlen($telf)<1){
    echo "el telefono $telf es demaisado corto, escribe algo";
    $error=1;

}elseif (strlen($dni)<1){
    echo "el dni $dni es demaisado corto, escribe algo";
    $error=1;

}elseif (strlen($email)<1){
    echo "el email $email es demaisado corto, escribe algo";
    $error=1;

}elseif (strlen($direccion)<1){
    echo "la direccion $direccion es demaisado corta, escribe algo";
    $error=1;

}elseif (!(is_numeric($telf))&&strlen($telf)>0&&strlen($telf)<=9){
    echo "el telefono debe ser un numero sin letras";
    $error=1;

}

$mysqli_link = mysqli_connect("localhost","root","", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()){
    printf("MySQL connection failed with the error: %s",mysqli_connect_error());
    exit; 
}     

$select_query = "SELECT * FROM `usuario` WHERE usuario='$user'";
$result = mysqli_query($mysqli_link, $select_query);
$repetido=$result->num_rows;


$select_query = "SELECT * FROM `novo_rexistro` WHERE usuario='$user'";
$result = mysqli_query($mysqli_link, $select_query);

$repetido=$result->num_rows;


if ($repetido>0){
    echo "usuario repetido";
    $error=1;
}
    
if($error==0){

    $insert_query = "INSERT into novo_rexistro(usuario, contrasinal, nome, direccion, telefono, nifdni, email) VALUES ('$user','$passwd','$name','$direccion',$telf,'$dni','$email');";
    If (mysqli_query($mysqli_link, $insert_query)) {
        echo "peticion de creacion de nuevo usuario envidada <br>";
        echo '<a href="index.html">volver al inicio</a>';
    }

}elseif ($error==1){
        
    echo '<br><a href="register.html">try again</a>';
}

mysqli_close($mysqli_link);


?>