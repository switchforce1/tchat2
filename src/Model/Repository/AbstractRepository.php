<?php

namespace Tchat2\Model\Repository;

use Tchat2\Config\DataBaseConnexion;
use Tchat2\Helper\SQLHelper;
use Tchat2\Model\ModelInterface;

/**
 * Description of AbstractRepository
 *
 * @author switchforce1
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * Find an entity with the given ID 
     */
    public function findById($id)
    {
        $table = $this->getTableName();
        
        $query = sprintf("select * from %s where id=?",$table);
        
        $result = DataBaseConnexion::getConnexion()->prepare($query);
        $result->execute([$id]);
        return $result->fetchObject($this->getClassName());
    }
    
    /**
     * find entities by criterias
     * 
     * @param array $array
     */
    public function findBy($array)
    {
        if(!is_array($array)){
            return null;
        }
        //nom de la table
        $table = $this->getTableName();
        $num = 0;
        $query = sprintf("SELECT * FROM %s WHERE ",$table);
        foreach ($array as $key => $value){
            if(SQLHelper::normaliseString($value)){
                switch ($num){
                    case 0:
                        $query.= sprintf(" %s='%s'",$key,$value);
                        break;
                    default :
                        $query.= sprintf(" AND %s='%s'",$key,$value);
                }
                
                $num ++;
            }
        }
        //var_dump($query);die();
        
        $result = DataBaseConnexion::getConnexion()->prepare($query);
        try {
            $result->execute();
        } catch (Exception $ex){
            return null;
        }
        return $result->fetchObject($this->getClassName());
    }
    
    /**
     * @inheritence
     */
    public function findAll()
    {
        $table = $this->getTableName();
        
        $query = sprintf("select * from %s",$table);
        
        $result = DataBaseConnexion::getConnexion()->prepare($query);
        $result->execute();
        
        return $result->fetchAll(\PDO::FETCH_CLASS, $this->getClassName());
    }
    
    /**
     * 
     * @param ModelInterface $model
     * 
     * @return ModelInterface $model
     */
    public function save(ModelInterface $model)
    {
        if($model->getId()){
            $model->update($model);
        }else{
            $model->create($model);
        }
        
        return $model;
    }
    
    /**
     * 
     * @param integer $id
     */
    public function delete($id)
    {
        $query = "DELETE FROM message WHERE id=".$id.";";
        
        return DataBaseConnexion::getConnexion()->exec($query);
    }
}