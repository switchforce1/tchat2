<?php

namespace Tchat2\Model\Repository;

use Tchat2\Model\ModelInterface;

/**
 *
 * @author switchforce1
 */
interface RepositoryInterface
{
    /**
     * return all elements
     * 
     * @return array
     */
    public function findAll();
    
    /**
     * 
     * @param int $id
     */
    public function findById($id);
    
    /**
     * 
     * @param array $array
     * 
     * @return array
     */
    public function findBy($array);
    
    /**
     * return the table name
     */
    public function getTableName();
    
    /**
     * Return the classe name
     */
    public function getClassName();
    
    /**
     * Create the new model
     * 
     * @param ModelInterface $model
     */
    public function create(ModelInterface $model);
    
    /**
     * Save the model
     * 
     * @param ModelInterface $model
     */
    public function save(ModelInterface $model);
    
    /**
     * Update the model
     * 
     * @param ModelInterface $model
     */
    public function update(ModelInterface $model);
    
    /**
     * Delete the model by the given id
     * 
     * @param type $id
     */
    public function delete($id);
}