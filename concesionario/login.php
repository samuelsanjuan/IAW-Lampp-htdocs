<?php
header("Content-Type: text/html;charset=utf-8");
session_start();

$usuario = $_REQUEST['user'];
$contraseña = $_REQUEST['passwd'];

if ($usuario != "" && $usuario != NULL){

    $mysqli_link = mysqli_connect("localhost","root","", "frota");
mysqli_set_charset($mysqli_link, "utf8");
    
    if (mysqli_connect_errno()){
        printf("MySQL connection failed with the error: %s",mysqli_connect_error());
        exit; 
    }
    
    $select_query = "SELECT * FROM `usuario` WHERE usuario='$usuario'";
    
    $result = mysqli_query($mysqli_link, $select_query);
    $contador=$result->num_rows;

    
    if ($contador>0 && $contador<2){

        $select_query = "SELECT * FROM `usuario` WHERE usuario='$usuario' and contrasinal='$contraseña'";
        $result = mysqli_query($mysqli_link, $select_query);
        $contador2=$result->num_rows;


        if ($contador2==1){

            $select_query = "SELECT tipo_usuario FROM `usuario` WHERE usuario='$usuario' and contrasinal='$contraseña'";
            $result = mysqli_query($mysqli_link, $select_query);

            while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                if ($fila['tipo_usuario']=='a'){

                    $_SESSION['usuario']=$_REQUEST['user'];
                    $_SESSION['permisos']=1;
                    header("Location: menu.php");
                    
                }elseif($fila['tipo_usuario']=='u'){

                    $_SESSION['usuario']=$_REQUEST['user'];
                    $_SESSION['permisos']=0;
                    header("Location: menu.php");

                }else{
                    echo "problema con los permisos de usuario ";
                    echo '<a href="index.html">Volver</a>';
                }
            }
            header("menu.php");
        }else{
            echo "error no es esa la passwd ";
            echo '<a href="index.html">Volver</a>';
        }
        
    }
    
else{
    echo "usuario $usuario no registrado ";
    echo '<a href="index.html">Volver</a>';
}

mysqli_close($mysqli_link);
}
else{
    echo "tienes que escribir algo en usuario ";
    echo '<a href="index.html">Volver</a>';
}
?>