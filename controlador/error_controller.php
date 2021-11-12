<?php
class error_controller
{
    public static function error()
    {
        $email= " info@cudesi.com.pe";
        $cc = "gmalca@cudesi.com.pe";
        $subject = "Error en encuesta capilezza";
        $body = "'Ocurrio un error durante la ejecucion de la encuesta, codigo de error: '";
        $all = "mailto: $email?cc=$cc&subject=$subject&body=$body";

        include_once "vistas/public/error.php";
    }
}