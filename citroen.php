<?php
    include "session.php";

    inicio_sesion();

    $modelos = ["C5", "XSARA"];

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
        escribirSesion("anterior", "citroen.php");
        $ruta = $_POST['accion'];
        if($ruta == "atras"){
            header("Location:$anterior");
        }else{
            header("Location:$ruta.php");
        }
    }

    echo leer_sesion("anterior");
    
    echo "<form action=citroen.php method=post>";

    foreach($modelos as $m)
    {
        
        echo "<span>$m</span> <button type=submit name=modelo value=$m>Añadir al carrito</button> <br>";

    }

    echo "<button type=submit name=accion value=carrito>Ver carrito</button> <br>";

    echo "<button type=submit name=accion value=atras>Atrás</button> <br>";

    echo "</form>";
?>