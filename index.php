<?php
// Redireccionar
require 'direccion.php';

require_once './conexion/conexion.php';

require_once 'modelo/user_model.php';
require_once 'modelo/user_session_model.php';
require_once 'controlador/user_controller.php';

require_once 'modelo/question_model.php';
require_once 'modelo/answer_model.php';
require_once 'controlador/question_controller.php';

require_once 'modelo/service_model.php';
require_once 'controlador/service_controller.php';

require_once 'modelo/result_model.php';
require_once 'controlador/result_controller.php';

require_once 'controlador/error_controller.php';

$uriSplit = explode('/', $_SERVER['REQUEST_URI']);
$code = explode('/', $_SERVER['REQUEST_URI']);

if (isset($uriSplit[1]) && isset($uriSplit[2])) {

    #Metodo
    $metodo = $uriSplit[2];

    #Controlador
    $controlador = $uriSplit[1];
    $uriSplit = explode('/', $_SERVER['REQUEST_URI']);

    switch ($controlador) {
        case "user":
            if (method_exists(new user_controller(), $metodo)) {
                user_controller::$metodo();
            } else {
                question_controller::index();
            }
            break;

        case "error":
            if (method_exists(new error_controller(), $metodo)) {
                error_controller::$metodo();
            } else {
                question_controller::index();
            }
            break;

        case "result":
            if (method_exists(new result_controller(), $metodo)) {
                result_controller::$metodo();
            } else {
                question_controller::index();
            }
            break;

        case "question":
            if (method_exists(new question_controller(), $metodo)) {
                question_controller::$metodo();
            } else {
                question_controller::index();
            }
            break;

        case "service":
            if (method_exists(new service_controller(), $metodo)) {
                service_controller::$metodo();
            } else {
                question_controller::index();
            }
            break;
        default:
            question_controller::index();
            break;
    }
} else {
    question_controller::index();
}
