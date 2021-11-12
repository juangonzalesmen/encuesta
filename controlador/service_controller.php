<?php 
class service_controller 
{
    public static function admin_service(){
        $userSession = new user_session_model();
        if (isset($_SESSION['user'])) {
            $service_list = service_model::getServices();
            include_once "vistas/admin/admin_service/admin_service.php";
        }
    }
    
    ## Funciones JQuery
    function getservices()
    {
        $m_service = new service_model();
        $services_list = service_model::getservices();
        $services = array();
        while ($fila = $services_list->fetch(PDO::FETCH_ASSOC)) {
            $arr_service = array(
                'nombre' => $fila['nombre'],
                'imagen' => $fila['imagen'],
                'idtipo_servicio' => $fila['idtipo_servicio'],
                'estado' => $fila['estado'],
                'descripcion' => $fila['descripcion']
            );
            $services[] = $arr_service;
        }
        echo json_encode($services);
    }

    ## Funciones de proyecto

    public static function createservice()
    {

        include_once "vistas/admin/admin_service/".
        "admin_service_create.php";
    }

    public static function createserviceagree()
    {
        
        $serv['TYPE'] = $_REQUEST['TYPE'];
        $serv['DESCRIPTION'] = $_REQUEST['DESCRIPTION'];
        service_model::createservice($serv);

        echo "success";
    }

    public static function editservice()
    {
        $m_service = new service_model();
        $uriSplit = explode('/', $_SERVER['REQUEST_URI']);
        $service_id = $uriSplit[3];
        $service = service_model::getservice($service_id);
        include_once "vistas/admin/admin_service/"."admin_service_edit.php";
    }

    public static function editserviceagree()
    {
        
        
        $serv['TYPE'] = $_REQUEST['TYPE'];
        $serv['DESCRIPTION'] = $_REQUEST['DESCRIPTION'];
        $serv['ID'] = $_REQUEST['ID'];
        
        service_model::updateservice($serv);

        echo "success";
    }

    public static function changestateservice()
    {
        $uriSplit = explode('/', $_SERVER['REQUEST_URI']);
        $service_id = $uriSplit[3];
        $status = $uriSplit[4];
        service_model::changeStatusservice($service_id,$status);
        header("Location:" . $GLOBALS['BASE_URL'] . "service/admin_service");
    }

    

    public static function deleteservice()
    {
        $uriSplit = explode('/', $_SERVER['REQUEST_URI']);
        $service_id = $uriSplit[3];
        service_model::deleteservice($service_id);
        header("Location:" . $GLOBALS['BASE_URL'] . "service/admin_service");
    }
}

?>