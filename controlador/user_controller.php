<?php
class user_controller
{
    public static function login()
    {   //ingreso a formulario de login
        $valor = 1;
        $userSession = new user_session_model();
        if (isset($_SESSION['user'])) {

            include_once "vistas/admin/admin_config/admin_index.php";
        }else{
            include_once "vistas/admin/admin_config/admin_login.php";
        }
        
    }
    public static function enter()
    {
        $userSession = new user_session_model();

        if (isset($_SESSION['user'])) {
            header("Location:" . $GLOBALS['BASE_URL'] . "user/login");
        } else if (isset($_REQUEST['form-username']) && isset($_REQUEST['form-password'])) {
            $usuarioForm = $_REQUEST['form-username'];
            $passwordForm = $_REQUEST['form-password'];

            if (user_model::findUserByUsuarioPassword($usuarioForm, $passwordForm)) {

                $finduser = user_model::getUserByUsuarioPassword($usuarioForm, $passwordForm);
                user_session_model::setCurrentUser($usuarioForm, $finduser);

                header("Location:" . $GLOBALS['BASE_URL'] . "user/login");
            } else {
                $valor = 0;
                include_once "vistas/admin/admin_config/admin_login.php";
            }
        } else {

            $valor = 1;
            include_once "vistas/admin/admin_config/admin_login.php";
        }
    }
    public static function salir()
    {
        $userSession = new user_session_model();
        user_session_model::closeSession();

        header("Location:" . $GLOBALS['BASE_URL']);
    }
    public static function admin_user()
    {
        $userSession = new user_session_model();

        if (isset($_SESSION['user'])) {
            $users_list = user_model::getUsers();

            include_once "vistas/admin/admin_user/"."admin_user.php";
        }else{
            header("Location:" . $GLOBALS['BASE_URL'] . "user/login");
        }
        
    }
   
    ## Funciones de proyecto

    public static function admin_createuser()
    {
        $userSession = new user_session_model();
        if (isset($_SESSION['user'])) {
            include_once "vistas/admin/admin_user/"."admin_user_create.php";
        }else{
            header("Location:" . $GLOBALS['BASE_URL'] . "user/login");
        }
        
        
    }

    public static function admincreateuseragree()
    {
        $userSession = new user_session_model();
        if (isset($_SESSION['user'])) {
            $use['USER'] = $_REQUEST['USER'];
            $use['NAME'] = $_REQUEST['NAME'];

            $use['PASSWORD'] = $_REQUEST['PASSWORD'];

        
            user_model::createUser($use);

            echo "success";
        }else{
            header("Location:" . $GLOBALS['BASE_URL'] . "user/login");
        }
        
    }

    public static function adminedituser()
    {
        $userSession = new user_session_model();
        if (isset($_SESSION['user'])) { 
            $uriSplit = explode('/', $_SERVER['REQUEST_URI']);
            $user_id = $uriSplit[3];
            $user = user_model::getUserById($user_id);
            include_once "vistas/admin/admin_user/".
                     "admin_user_edit.php";
        }else{
            header("Location:" . $GLOBALS['BASE_URL'] . "user/login");
        }
    }

    public static function adminedituseragree()
    {
        $userSession = new user_session_model();
        if (isset($_SESSION['user'])) {
            $use['USER'] = $_REQUEST['USER'];
            $use['EMAIL'] = $_REQUEST['EMAIL'];
            $use['PASSWORD'] = $_REQUEST['PASSWORD'];
            $use['ID'] = $_REQUEST['ID'];
            
            user_model::updateUser($use);

            echo "success";
        }else{
            header("Location:" . $GLOBALS['BASE_URL'] . "user/login");
        }
    }

    public static function adminchangestateuser()
    {
        $userSession = new user_session_model();
        if (isset($_SESSION['user'])) {
            $uriSplit = explode('/', $_SERVER['REQUEST_URI']);
            $user_id = $uriSplit[3];
            $status = $uriSplit[4];
            user_model::changeStatusUser($user_id,$status);
            header("Location:" . $GLOBALS['BASE_URL'] . "user/admin_user");
        }else{
            header("Location:" . $GLOBALS['BASE_URL'] . "user/login");
        }
    }

    

    public static function admindeleteuser()
    {
        $userSession = new user_session_model();
        if (isset($_SESSION['user'])) {
            $uriSplit = explode('/', $_SERVER['REQUEST_URI']);
            $user_id = $uriSplit[3];
            user_model::deleteUser($user_id);
            header("Location:" . $GLOBALS['BASE_URL'] . "user/admin_user");
        }else{
            header("Location:" . $GLOBALS['BASE_URL'] . "user/login");
        }
    }
}