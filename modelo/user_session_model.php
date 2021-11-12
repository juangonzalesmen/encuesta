<?php
class user_session_model{
    function __construct(){
        session_start();
    }
    public static function setCurrentUser($usuario,$user){
        $_SESSION['user'] = $usuario;
        $_SESSION['escogido']=$user;
    }
    public static function getCurrentUser(){
        return $_SESSION['user'];
    }
    public static function closeSession(){ 
        unset($_SESSION['user']);
        unset($_SESSION['escogido']);
        if(count($_SESSION)== 0){
            session_destroy();
        }
    }
}
?>