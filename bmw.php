<?php
    include "session.php";

    inicio_sesion();

    $modelos = ["Serie 3", "X3"];

    if(isset($_POST['modelo'])){
        $carrito;
        if(isset($_SESSION["carrito"])){
            $carrito = $_SESSION["carrito"];
        }else{
            $carrito = [];
        }

        var_dump($carrito);

        if($carrito == ""){
            $carrito = [];
        }

        $modelo = $_POST['modelo'];

        $strg = "$modelo";

        $carrito[$strg] = $strg;

        $_SESSION["carrito"] = $carrito;
    }

    if(isset($_POST['accion'])){
        $anterior = leer_sesion("anterior");
        escribirSesion("anterior", "bmw.php");
        $ruta = $_POST['accion'];
        if($ruta == "atras"){
            header("Location:$anterior");
        }else{
            header("Location:$ruta.php");
        }
    }

    echo "<form action=bmw.php method=post>";

    foreach($modelos as $m)
    {
        
        echo "<span>$m</span> <button type=submit name=modelo value=$m>Añadir al carrito</button> <br>";

    }

    echo "<button type=submit name=accion value=carrito>Ver carrito</button> <br>";

    echo "<button type=submit name=accion value=atras>Atrás</button> <br>";

    echo "</form>";
?>