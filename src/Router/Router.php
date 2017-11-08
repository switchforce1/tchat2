<?php

namespace Tchat2\Router;

use Tchat2\Exception\RouterException;

/**
 * Description of Router
 *
 * @author switchforce1
 */
class Router
{
    /*
     * 
     */
    private $url;
    
    /**
     *
     * @var type 
     */
    private $routes = array();
    
    /**
     * The constructor
     * 
     * @param type $url
     */
    function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Manage get url
     * 
     * @param type $path
     * @param type $callable
     */
    public function get($path, $callable)
    {
        return $this->add($path, $callable, 'GET');
    }
    
    /**
     * Manage post url
     * 
     * @param type $path
     * @param type $callable
     */
    public function post($path, $callable)
    {
        return $this->add($path, $callable, 'POST');
    }
    
    /**
     * 
     * @param type $path
     * @param type $callable
     * @param type $method
     * 
     * @return \Tchat2\Router\Route
     */
    private function add($path, $callable, $method)
    {
        $route = new Route($path, $callable);        
        //add new route
        $this->routes[$method][] = $route;
        
        return $route;
    }


    public function run()
    {
        //Check if the routes array contains the current method
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException("The method not exist");
        }
        //print_r($this->routes) ;
        
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            $url = str_replace("index.php", "", $this->url);
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                $url.="/".$this->postSubUrl();
            }
            //if the route match
            if($route->match($url)){
                //execute the request
                return $route->call();
            }
        }
        
        throw new RouterException("the url not mathing");        
    }
    
    /**
     * Post value with slashes
     */
    private function postSubUrl()
    {
       return implode("/", $_POST);
    }
}
