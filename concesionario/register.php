<?php
$name = $_REQUEST['name'];
$passwd = $_REQUEST['passwd'];
$user = $_REQUEST['user'];
$email = $_REQUEST['email'];
$telf= $_REQUEST['telf'];
$dni= $_REQUEST['dni'];
$direccion = $_REQUEST['direccion'];

if (strlen($name)>60){
    echo "el nombre $name es demaisado largo, ponle 60 caracteres maximo";

}elseif (strlen($passwd)>8){
    echo "la contraseña $passwd es demaisado larga, ponle 8 caracteres maximo";

}elseif (strlen($user)>24){
    echo "el nombre de usuario $user es demaisado largo, ponle 24 caracteres maximo";

}elseif (strlen($telf)>11){
    echo "el telefono $telf es demaisado largo, ponle 11 caracteres maximo";

}elseif (strlen($dni)>9){
    echo "el dni $dni es demaisado largo, ponle 9 caracteres maximo";

}elseif (strlen($email)>30){
    echo "el email $email es demaisado largo, ponle 30 caracteres maximo";

}elseif (strlen($direccion)>90){
    echo "la direccion $direccion es demaisado larga, ponle 90 caracteres maximo";

}elseif (strlen($name)<1){
    echo "el nombre $name es demaisado corto, escribe algo";

}elseif (strlen($passwd)<1){
    echo "la contraseña $passwd es demaisado corta, escribe algo";

}elseif (strlen($user)<1){
    echo "el nombre de usuario $user es demaisado corto, escribe algo";

}elseif (strlen($telf)<1){
    echo "el telefono $telf es demaisado corto, escribe algo";

}elseif (strlen($dni)<1){
    echo "el dni $dni es demaisado corto, escribe algo";

}elseif (strlen($email)<1){
    echo "el email $email es demaisado corto, escribe algo";

}elseif (strlen($direccion)<1){
    echo "la direccion $direccion es demaisado corta, escribe algo";

}else {
                 
    $mysqli_link = mysqli_connect("localhost","root","", "frota");

    if (mysqli_connect_errno()){
        printf("MySQL connection failed with the error: %s",mysqli_connect_error());
        exit; 
    }       

    $insert_query = "INSERT into novo_rexistro(usuario, contrasinal, nome, direccion, telefono, nifdni, email) VALUES ('$user','$passwd','$name','$direccion',$telf,'$dni','$email');";
                            
    If (mysqli_query($mysqli_link, $insert_query)) {
        echo "<br>Foi todo ben na inserción";
    }

    mysqli_close($mysqli_link);

}

?>