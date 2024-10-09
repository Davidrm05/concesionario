<?php
    function inicio_sesion(){
        session_start();
    }

    function cierre_sesion(){
        session_abort();
    }

    function login($nombre){
        inicio_sesion();
        $_SESSION['user'] = $nombre;
    }

    function logout(){
        unset($_SESSION);
        cierre_sesion();
    }

    function existeUsuario(){
        $respuesta = false;
        if(isset($_SESSION['user'])){
            $respuesta = true;
        }
        return $respuesta;
    }

    function leer_sesion($clave){
        if(isset($_SESSION[$clave])){
            $array = $_SESSION[$clave];
            return $array;
        }else{
            return "No existe";
        }
    }

    function escribirSesion($clave, $valor){
        inicio_sesion();
        $_SESSION[$clave] = $valor;
    } 

    
?>