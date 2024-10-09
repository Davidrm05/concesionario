<?php

    include "session.php";

    inicio_sesion();

    echo $_SESSION['anterior'];

    if(isset($_POST['modelo'])){
        $ruta = $_POST['modelo'];
        if($ruta == "logout"){
            logout();
            header("Location:landing.html");
        }
        if($ruta == "listado"){
            header("Location:$ruta.php");
        }
        if($ruta == "atras"){
            $anterior = leer_sesion("anterior");
            escribirSesion("anterior", "carrito.php");
            header("Location:$anterior");
        }else{
            $car = leer_sesion("carrito");

            unset($car[$ruta]);

            escribirSesion("carrito", $car);
        }
    }

    $carrito = leer_sesion("carrito");

    echo "<form action=carrito.php method=post>";

    foreach($carrito as $c)
    {
        echo "<span>$c</span> <button type=submit name=modelo value=$c>Eliminar</button> <br>";
    }

    echo "<button type=submit name=modelo value=atras>Atrás</button> <br>";
    
    echo "<button type=submit name=modelo value=listado>Marcas</button> <br>";

    echo "<button type=submit name=modelo value=logout>Desconectar</button> <br>";

    echo "</form>";

?>