<?php
session_start();

$usuario = $_REQUEST['user'];
$contraseña = $_REQUEST['passwd'];

if ($usuario != "" && $usuario != NULL){

    $mysqli_link = mysqli_connect("localhost","root","", "frota");
    
    if (mysqli_connect_errno()){
        printf("MySQL connection failed with the error: %s",mysqli_connect_error());
        exit; 
    }
    
    $select_query = "SELECT COUNT(*) FROM `usuario` WHERE usuario='$usuario'";
    
    $result = mysqli_query($mysqli_link, $select_query);
    
    while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $contador= $fila['COUNT(*)'];
    }
    
    if ($contador>0 && $contador<2){

        $select_query = "SELECT COUNT(*) FROM `usuario` WHERE usuario='$usuario' and contrasinal='$contraseña'";
        $result = mysqli_query($mysqli_link, $select_query);

        while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $contador2= $fila['COUNT(*)'];
        }

        if ($contador2==1){

            $select_query = "SELECT tipo_usuario FROM `usuario` WHERE usuario='$usuario' and contrasinal='$contraseña'";
            $result = mysqli_query($mysqli_link, $select_query);

            while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                if ($fila['tipo_usuario']==1){

                    header("Location: menu.php");
                    $_SESSION['usuario']=$_REQUEST['user'];
                    $_SESSION['permisos']=1;
                    
                }elseif($fila['tipo_usuario']==0){

                    header("Location: menu.php");
                    $_SESSION['usuario']=$_REQUEST['user'];
                    $_SESSION['permisos']=0;

                }else{
                    echo "problema con los permisos de usuario ";
                    echo '<a href="index.html">Volver</a>';
                }
            
                
            }
            header("menu.html");
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