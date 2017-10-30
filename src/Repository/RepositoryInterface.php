<?php

namespace Tchat2\Repository;

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
     * return the classe name
     */
    public function getClassName();
}