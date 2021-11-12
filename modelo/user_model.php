<?php 
class user_model{
    public static function getUsers()
    {
        
        return $data=Database::query("SELECT * FROM CAP_USER",array());

    }
    public static function createUser($user)
    {
        Database::queryChange("INSERT INTO CAP_USER(USR_USER,USR_NAME,USR_PASSWORD,USR_STATUS)VALUES (?,?,?,?)",
                array($user['USER'],$user['NAME'],$user['PASSWORD'], 1));
    }
    public static function deleteUser($id)
    {
        Database::queryChange("DELETE FROM CAP_USER WHERE usr_id = ?",array($id));
    }
    public static function getUserById($id)
    {
        return $data=Database::queryOne("SELECT * FROM CAP_USER where usr_id = ?",array($id));
    }
    public static function updateUser($user)
    {
        Database::queryChange("UPDATE CAP_USER SET  USR_USER=?,USR_PASSWORD=? WHERE usr_id = ?",array($user['USER'],$user['PASSWORD'], $user['ID']));
        
    }
    public static function changeStatusUser($id,$status)
    {
        Database::queryChange("UPDATE CAP_USER SET usr_status=? WHERE usr_id = ?",array($status,$id));
    }
    public static function findUserByUsuarioPassword($usuario,$password){
        $data=Database::query("SELECT * FROM CAP_USER WHERE USR_USER = ? AND USR_PASSWORD = ? AND USR_STATUS = 1",array($usuario,$password));
        if(count($data)>0){
            return true;
        }else{
            return false;
        }
    }
    public static function getUserByUsuarioPassword($usuario,$password){
        return $data=Database::queryOne("SELECT * FROM CAP_USER WHERE USR_USER = ? AND USR_PASSWORD = ?",array($usuario,$password));

    }
}

?>