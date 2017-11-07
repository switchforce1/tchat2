<?php
namespace Tchat2\Model;

/**
 * AbstractModel
 *
 * @author switchforce1
 */
abstract class AbstractModel implements ModelInterface
{
    /**
     * Return the entity table name
     * 
     * @return string 
     */
    public function getTableName()
    {
        $className  = get_class($this);
        
        return strtolower($className);
    }
}