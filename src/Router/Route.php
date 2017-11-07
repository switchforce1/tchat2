<?php

namespace Tchat2\Router;

/**
 * Description of Route
 *
 * @author switchorce1
 */
class Route
{
    /**
     * The path
     *
     * @var string 
     */
    private $path;
    
    /**
     * Execution callable
     * 
     * @var type 
     */
    private $callable;
    
    /**
     * The constructor.
     * 
     * @param type $path
     * @param type $callable
     */
    function __construct($path, $callable)
    {
        $this->path = trim($path, "/");
        $this->callable = $callable;
    }

    /**
     * Chech if an url match with the current route
     * 
     * @param type $url
     */
    public function match($url)
    {
        $url = trim($url, "/");
        //Replace parameters in the url
        $path = preg_replace("#:([\w]+)#","([^/]+)", $this->path);
        
        //regex from the begining(^) to the end($)
        $regex = "#^$path$#";
        var_dump( "\n** * *Regex **** ".$regex);
        var_dump( "\n** * *Url **** ".$url);
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        var_dump( "** * * **** ".$regex);
        
        var_dump($matches);
        return true;
    }
    
}
