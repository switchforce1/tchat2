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
     */
    public function getTableName()
    {
        $className  = get_class($this);
        
        return strtolower($className);
    }

    /**
     * Gets the id
     * 
     * @return int
     */
    public abstract function getId();
    
    /**
     * 
     * @return true 
     */
    public function delete()
    {
        
    }

    /**
     * 
     * @return \Tchat2\Model\ModelInterface $model
     */
    public function save()
    {
        if($this->getId()){
            $this->update($this);
        }else{
            $this->create($this);
        }
        
        return $this;
    }

}