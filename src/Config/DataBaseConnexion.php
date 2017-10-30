<?php
namespace Tchat2\Config;

/**
 * DataBaseConnexion
 *
 * @author switchforce1
 */
class DataBaseConnexion 
{
    /**
     *
     * @var type 
     */
    private static $_instance = null;

    /**
     *
     * @var \PDO 
     */
    private static $connexion = null;

    /**
     * Return the class' instance
     */
    public static function getInstance()
    {
        //si pas d'instance
        if(is_null(self::$_instance)) {
          self::$_instance = new DataBaseConnexion();  
        }

        return self::$_instance;
    }
    
    /**
     * The default constructor
     */
    private function __construct()
    {   
        $host = '127.0.0.1';
        $db   = 'tchat2';
        $user = 'tchat';
        $pass = 'switch2017';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try{
            self::$connexion = new \PDO($dsn, $user, $pass, $opt);
            
        } catch(\PDOException $err) {
            die($err->getMessage());
        }
    }
    
    /**
     * Gets current connexion
     * 
     * @return \PDO
     */
    public static function getConnexion()
    {
        self::$_instance = self::getInstance();
        return self::$connexion;
    }  
    
}