<?php
class result_controller
{

    public static function results()
    {

        $cadena_get = question_controller::decoding();
        
        foreach ($cadena_get as $value) {
            $val_gets = explode("=", $value);
            $_GET[$val_gets[0]] = utf8_decode($val_gets[1]);
        }

        if ($_GET['id']) {
            $id = $_GET['id'];
            $tip_zero = result_model::get_result_to_form($_GET['id']);
            $tip_others = result_model::get_tips_to_form($_GET['id']);

            if ($tip_zero == null && $tip_others == null) {

                $error = "404SD";
                include_once "vistas/public/error.php";
            } else {
                
                include_once "vistas/public/results.php";
            }

        } else {

            $error = "404IDN";
            include_once "vistas/public/error.php";
        }

    }

    public static function result_stored()
    {
        $cadena_get = question_controller::decoding();

        foreach ($cadena_get as $value) {
            $val_gets = explode("=", $value);
            $_GET[$val_gets[0]] = utf8_decode($val_gets[1]);
        }

        if ($_GET['id']) {

            $tip_zero = result_model::get_result_to_form($_GET['id']);
            $tip_others = result_model::get_tips_to_form($_GET['id']);

            if ($tip_zero == null && $tip_others == null) {
                $error = "404SD";
                include_once "vistas/public/error.php";
            } else {
                include_once "vistas/public/results.php";
            }

        } else {
            $error = "404IDN";
            include_once "vistas/public/error.php";
        }

    }

}
