
<?php
class Database
{
  private static $dbName = 'heroku_2a2a0a1a2f962c9' ;
  private static $dbHost = 'us-cdbr-east-03.cleardb.com' ;
  private static $port = "3306";
  private static $dbUsername = 'b06347c778138d';
  private static $dbUserPassword = 'b76d359d';

    private static $cont  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {
       if ( null == self::$cont )
       {
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
          self::$cont->query("SET NAMES 'utf8';");
        }
        catch(PDOException $e)
        {
          die($e->getMessage());
        }
       }
       return self::$cont;
    }
    public static function query($query, $params = array()) {
      $stmt = self::connect()->prepare($query);
      $stmt->execute($params);
      $data = $stmt->fetchAll();
      return $data;
    }
    public static function queryOne($query, $params = array()) {
      $stmt = self::connect()->prepare($query);
      $stmt->execute($params);
      $data = $stmt->fetch();
      return $data;
    }

    public static function queryChange($query, $params = array()) {
      $stmt = self::connect()->prepare($query);
      $stmt->execute($params);
      self::disconnect();
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>