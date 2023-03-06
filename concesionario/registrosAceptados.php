<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Nuevos registros aceptados</title>

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

$select_query = "SELECT * FROM `novo_rexistro`";
$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    $user=$fila['usuario'];
    $passwd=$fila['contrasinal'];
    $nome=$fila['nome'];
    $dir=$fila['direccion'];
    $tel=$fila['telefono'];
    $dni=$fila['nifdni'];
    $mail=$fila['email'];  


    $insert_query = "INSERT into usuario(usuario, contrasinal, nome, direccion, telefono, nifdni, email, tipo_usuario) VALUES ('$user','$passwd','$nome','$dir',$tel,'$dni','$mail', 'u')";
    mysqli_query($mysqli_link, $insert_query);
    

    $delete_query= "DELETE FROM `novo_rexistro` WHERE usuario = '$user'; ";
    mysqli_query($mysqli_link,$delete_query);
}

mysqli_close($mysqli_link);
echo "<a href='menu.php'>volver al menu</a>";

?>