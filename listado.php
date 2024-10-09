<?php
include "session.php";

inicio_sesion();

if(isset($_POST['usuario']) && isset($_POST['contrasenia'])){
    if($_POST['usuario'] == "manolo"){
        login($_POST['usuario']);
        listar_marcas();
    }
}
else
{
    if($_SESSION['user'] == "manolo"){
        listar_marcas();
    }
}
if(isset($_POST['accion'])){
    $ruta = $_POST['accion'];

    $anterior = leer_sesion("anterior");
    escribirSesion("anterior", "listado.php");

    if($ruta == "atras"){
        header("Location:$anterior");
    }else{
        if($ruta == "logout"){
            logout();
            header("Location:landing.html");
        }else{
            header("Location:$ruta.php");
        }
    }
}

function listar_marcas(){
    $fichero = "marcas.php";
    $actual = file_get_contents($fichero);

    $arr = explode("\n", $actual);

    echo "<form action=listado.php method=post>";

    foreach($arr as $v)
    {
        $aux = strtolower(trim($v));
        
        echo "<span name=marca>$v</span> <button type=submit name=accion value=$aux>Ver modelos</button> <br>";
        
    }

    echo "<button type=submit name=accion value=carrito>Ver carrito</button> <br>";

    echo "<button type=submit name=accion value=atras>Atrás</button> <br>";

    echo "<button type=submit name=accion value=logout>Desconectar</button> <br>";

    echo "</form>";

}


?>