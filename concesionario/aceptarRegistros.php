<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
?>

<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Aceptar Registros</title>

</head>

<body>

    <p style="color:blue;text-align:right;">
        <?php
        header("Content-Type: text/html;charset=utf-8");
        echo "Bienvenido " .
            $_SESSION['usuario'];
        ?>
    </p>

    <p>
        <?php
        header("Content-Type: text/html;charset=utf-8");
        if ($_SESSION['permisos'] == 0) {
            header("Location: menu.php");
        }
        ?>
    </p>
</body>

</html>
<?php
header("Content-Type: text/html;charset=utf-8");

$mysqli_link = mysqli_connect("localhost", "root", "", "frota");
mysqli_set_charset($mysqli_link, "utf8");

if (mysqli_connect_errno()) {
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}

echo '<form name="aceptarRegistros" method="post" action="registrosAceptados.php">';

//muestra los nuevos usuarios
$select_query = "SELECT * FROM `novo_rexistro`";
$result = mysqli_query($mysqli_link, $select_query);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $user = $fila['usuario'];
    $passwd = $fila['contrasinal'];
    $nome = $fila['nome'];
    $dir = $fila['direccion'];
    $tel = $fila['telefono'];
    $dni = $fila['nifdni'];
    $mail = $fila['email'];
    echo "$user<br>$passwd<br>$nome<br>$dir<br>$tel<br>$dni<br>$mail<br/>";
}

echo "<br/>";
echo ' <input type="submit" value="Aceptar registros" />
</form>';
mysqli_close($mysqli_link);
echo "<a href='menu.php'>volver al menu</a>";
?>