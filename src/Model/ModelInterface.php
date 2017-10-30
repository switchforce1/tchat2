<?php
namespace Tchat2\Model;

/**
 *
 * @author switchforce1
 */
interface ModelInterface
{
    //put your code here
    /**
     * 
     * @param ModelInterface $model
     */
    public function create();
    
    /**
     * 
     * @param ModelInterface $model
     */
    public function save();
    
    /**
     * 
     * @param ModelInterface $model
     */
    public function update();
    
    /**
     * 
     * @param ModelInterface $model
     */
    public function delete();
}