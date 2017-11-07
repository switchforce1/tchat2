<?php

namespace Tchat2\Router;

use App\Exception\NoRouteFoundException;

/**
 * Description of Router
 *
 * @author switchforce1
 */
class Router
{
    private $url;
    
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
        $route = new Route($path, $callable);
        
        //add new route
        $this->routes['GET'][] = $route;
    }
    
    /**
     * Manage post url
     * 
     * @param type $path
     * @param type $callable
     */
    public function post($path, $callable)
    {
        $route = new Route($path, $callable);
        
        //add new route
        $this->routes['POST'][] = $route;
    }
    
    public function run()
    {
        //Check if the routes array contains the current method
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new NoRouteFoundException("The method not exist");
        }
               
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            print("\n \n");
            //if the route match
            if($route->match($this->url)){
                //execute the request
                $route->call();
            }
        }
        
        throw new NoRouteFoundException("the url not mathing");
        
    }
}
