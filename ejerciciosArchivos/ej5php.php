<?php
$nombre = $_REQUEST['nombre'];
$apellido1 = $_REQUEST['apellido1'];
$apellido2 = $_REQUEST['apellido2'];
$contraseña = $_REQUEST['contraseña'];

if (isset($_REQUEST['checkbox'])=="checkbox"){
    $cadenaCheck="O usuario desexa recibir información";

}else{
    $cadenaCheck="O usuario non desexa recibir información";
}

$cadena="O nome de usuario é: $nombre\nO primero apelido do usuario é:$apellido1\nO segundo apelido do usuario é:$apellido2\nO contrasinal do usuario é:$contraseña\n$cadenaCheck";

$file=fopen("datosUsuario.txt","w+");

fputs($file,"$cadena");

fclose($file);
echo "done";

?>
