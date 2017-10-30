<?php
namespace Tchat2\Repository;

use Tchat2\Helper\SQLHelper;
use Tchat2\Model\User;

/**
 * UserRepository
 *
 * @author switchforce1
 */
class UserRepository extends AbstractRepository implements RepositoryInterface
{
    
    private static $_instance = null ;
    
    /**
     * Return the class' instance
     */
    public static function getInstance()
    {
        //si pas d'instance
        if(is_null(self::$_instance)) {
          self::$_instance = new UserRepository();  
        }

        return self::$_instance;
    }
    
    /**
     * The default constructor
     */
    private function __construct()
    {   
    }
    
    /**
     * @inheritence
     */
    public function getTableName()
    {
        return 'user';
    }

    /**
     * @inheritence
     */
    public function getClassName()
    {
        return User::class;
    }

     /**
     * return all elements
     * 
     * @return array
     */
    public function findAll()
    {
        return parent::findAll(self::getTableName());
    }
    
    /**
     * 
     * @param type $id
     * @param type $table
     */
    public function findById($id)
    {
        return parent::findById($id, self::getTableName());
    }
    
    /**
     * 
     * @param type $array
     * @param type $table
     * 
     * @return array
     */
    public function findBy($array)
    {
        return parent::findBy($array, self::getTableName());
    }
    
    
    /**
     * Check the authetication
     * 
     * @param string $login
     * @param string $password
     * 
     * @return boolean
     */
    public function checkAuthentication($login, $password)
    {
        $data  = $this->findBy(array(
            'login' => $login,
            'password' => $password));
        
        return count($data)== 0?false:true;
    }
}