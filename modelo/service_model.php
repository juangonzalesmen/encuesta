<?php
class service_model
{
   
    public static function getServices()
    {
        return $data=Database::query("SELECT * FROM IMR_SERVICE ORDER BY TYPE",array());
    }
    
    public static function createservice($Service)
    {
        Database::queryChange("INSERT INTO IMR_SERVICE(TYPE,DESCRIPTION,STATUS)VALUES (?,?,?)",array($Service['TYPE'],$Service['DESCRIPTION'], 1));
    }
    public static function deleteService($id)
    {
        Database::queryChange("DELETE FROM IMR_SERVICE WHERE ID = ?",array($id));
    }
    public static function getService($id)
    {
        return $data=Database::queryOne("SELECT * FROM IMR_SERVICE WHERE ID = ?",array($id));
    }
    public static function getServiceDescription($id)
    {
        return $data=Database::queryOne("SELECT DESCRIPTION FROM IMR_SERVICE WHERE ID = ?",array($id));
    }
    public static function updateservice($Service)
    {
        Database::queryChange("UPDATE IMR_SERVICE SET  TYPE=?,DESCRIPTION=? WHERE ID = ?",array($Service['TYPE'],$Service['DESCRIPTION'], $Service['ID']));
    }
    public static function changeStatusService($id,$status)
    {
        Database::queryChange("UPDATE IMR_SERVICE SET STATUS=? WHERE ID = ?",array($status,$id));
    }
}
